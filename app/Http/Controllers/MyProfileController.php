<?php

namespace App\Http\Controllers;

use App\Http\Helpers\UtilsHelper;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Modules\Account\Http\Requests\CreatePutProfileRequest;

class MyProfileController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return view('one.myProfile.outputData', [
                'profile' => UtilsHelper::myProfile(),
            ])->render();
        }
        return view('one.myProfile.index');
    }

    public function edit($id)
    {
        $profile = Profile::with('users')->find($id);
        return view('one.myProfile.form', compact('profile'));
    }


    public function update(CreatePutProfileRequest $request, $id)
    {
        // users
        $password_db = Hash::make($request->input('password'));
        if ($request->input('password') == null) {
            $password_db = $request->input('password_old');
        }
        $data =  [
            'email' => $request->input('email_profile'),
            'name' => $request->input('nama_profile'),
            'password' => $password_db
        ];
        User::find($id)->update($data);

        // profile
        $getProfile = Profile::where('users_id', $id)->first();
        $gambar_profile = UtilsHelper::uploadFile($request->file('gambar_profile'), 'profile', $getProfile->id, 'profile', 'gambar_profile');
        $data = $request->except(['gambar_profile', 'password', 'password_old', 'password_confirm']);

        $data = array_merge(
            $data,
            [
                'gambar_profile' => $gambar_profile,
            ],
        );
        Profile::find($getProfile->id)->update($data);
        return response()->json('Berhasil mengubah data', 200);
    }
}
