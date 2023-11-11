<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\ResetPassword;
use Illuminate\Support\Facades\Hash;

class AutentikasiController extends Controller
{
    public function checkTemplate()
    {
        return view('one.autentikasi.checkTemplate', [
            'email' => 'arthaduta@gmail.com',
            'token' => '123456'
        ]);
    }
    public function forgotPassword(Request $request)
    {
        return view('one.autentikasi.forgot');
    }

    public function storeForgotPassword(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
        ], [
            'required' => ':attribute wajib diisi',
            'email' => ':attribute anda tidak valid'
        ]);

        $verify = User::where('email', $request->all()['email'])->exists();

        if ($verify) {
            $verify2 =  DB::table('password_resets')->where([
                ['email', $request->all()['email']]
            ]);

            if ($verify2->exists()) {
                $verify2->delete();
            }

            $token = random_int(100000, 999999);
            $password_reset = DB::table('password_resets')->insert([
                'email' => $request->all()['email'],
                'token' =>  $token,
                'created_at' => Carbon::now()
            ]);

            if ($password_reset) {
                Mail::to($request->all()['email'])->send(new ResetPassword($token, $request->all()['email']));

                session()->flash('success', 'Reset password berhasil dikirim ke email');
                return redirect()->to(url('forgotPassword'));
            }
        } else {
            session()->flash('error', 'Email tidak ditemukan');
            return redirect()->to(url('forgotPassword'));
        }
    }


    public function verifyResetPassword(Request $request)
    {

        $check = DB::table('password_resets')->where([
            ['email', $request->all()['email']],
            ['token', $request->all()['token']],
        ]);

        if ($check->exists()) {
            $difference = Carbon::now()->diffInSeconds($check->first()->created_at);
            if ($difference > 3600) {
                session()->flash('error', 'Token anda sudah expired');
                return redirect()->to(route('forgotPassword.resetPassword'));
            }

            DB::table('password_resets')->where([
                ['email', $request->all()['email']],
                ['token', $request->all()['token']],
            ])->delete();

            session()->put('email', $request->all()['email']);
            session()->put('token', $request->all()['token']);

            session()->flash('success', 'Berhasil verifikasi token reset password');
            return redirect()->to(route('forgotPassword.resetPassword'));
        } else {
            session()->flash('error', 'Token anda tidak tersedia');
            return redirect()->to(route('forgotPassword.index'));
        }
    }

    public function resetPassword(Request $request)
    {
        return view('one.autentikasi.resetPassword');
    }

    public function storeResetPassword(Request $request)
    {
        $request->validate([
            'password' => ['required'],
            'password_confirm' => ['required', 'same:password'],
        ], [
            'required' => ':attribute wajib diisi',
            'same' => 'Password anda tidak sama'
        ]);

        $user = User::where('email', session()->get('email'));
        $user->update([
            'password' => Hash::make($request->password)
        ]);

        session()->forget('email');
        session()->forget('token');


        session()->flash('success', 'Berhasil reset password, Silahka login');
        return redirect()->to(route('login'));
    }
}
