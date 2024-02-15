<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Helpers\UtilsHelper;
use App\Models\Profile;
use App\Models\RoleUser;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        try {
            $data = User::with('profile', 'profile.jabatan', 'profile.unit', 'profile.categoryOffice')->find(Auth::id());
            $usersAtasan = $data->profile->usersid_atasan;
            $getUsersAtasan = null;
            if ($usersAtasan != null) {
                $dataAtasan = User::with('profile', 'profile.jabatan', 'profile.unit', 'profile.categoryOffice')->find($usersAtasan);
                $getUsersAtasan = $dataAtasan;
            }
            return response()->json([
                'status' => 200,
                'message' => 'Berhasil ambil data',
                'result' => [
                    'profile' => $data,
                    'atasan' => $getUsersAtasan,
                ]
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'status' => 500,
                'message' => 'Terjadi kesalahan data',
                'result' => $e->getMessage()
            ], 500);
        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $validator = Validator::make($request->all(), [
            'email_profile' => [
                'required', function ($attribute, $value, $fail) use ($request, $id) {
                    $email = $request->input('email');
                    $checkEmail = User::where('email', $email)
                        ->where('id', '!=', $id)
                        ->count();
                    if ($checkEmail > 0) {
                        $fail('Email sudah digunakan');
                    }
                }
            ],
            'nik_profile' => [
                'required', function ($attribute, $value, $fail) use ($request, $id) {
                    $nik_profile = $request->input('nik_profile');
                    $checkNikProfile = Profile::where('nik_profile', $nik_profile)
                        ->where('users_id', '!=', $id)
                        ->count();
                    if ($checkNikProfile > 0) {
                        $fail('NIK sudah digunakan');
                    }
                }
            ],
            'nama_profile' => 'required',
            'nohp_profile' => 'required|numeric',
            'jeniskelamin_profile' => 'required',

        ], [
            'required' => ':attribute wajib diisi',
            'numeric' => ':attribute harus berupa angka',
            'email' => ':attribute tidak valid',
            'image' => ':attribute harus berupa gambar',
            'max' => ':attribute tidak boleh lebih dari :max',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'message' => 'invalid form validation',
                'result' => $validator->errors()
            ], 400);
        }
        $dataUsers = [
            'name' => $request->input('nama_profile'),
            'email' => $request->input('email_profile'),
        ];
        $user_id = User::find($id)->update($dataUsers);

        // biodata
        $dataBiodata = [
            'users_id' => $id,
            'nik_profile' => $request->input('nik_profile'),
            'nama_profile' => $request->input('nama_profile'),
            'email_profile' => $request->input('email_profile'),
            'alamat_profile' => $request->input('alamat_profile'),
            'nohp_profile' => $request->input('nohp_profile'),
            'jeniskelamin_profile' => $request->input('jeniskelamin_profile'),
        ];
        $profile = Profile::where('users_id', $id)->update($dataBiodata);

        if ($user_id || $profile) {
            return response()->json([
                'status' => 200,
                'message' => 'Berhasil update data',
                'result' => $request->all(),
            ], 200);
        } else {
            return response()->json([
                'status' => 400,
                'message' => 'Gagal update data',
            ], 400);
        }
    }

    public function updateImage(Request $request, $id)
    {
        //
        $validator = Validator::make($request->all(), [
            'gambar_profile' => 'required|image|max:2048',
        ], [
            'required' => ':attribute harus di upload',
            'image' => ':attribute harus berupa gambar',
            'max' => ':attribute tidak boleh lebih dari :max',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'message' => 'invalid form validation',
                'result' => $validator->errors()
            ], 400);
        }
        $getProfile = Profile::where('users_id', $id)->first();
        $gambar_profile = UtilsHelper::uploadFile($request->file('gambar_profile'), 'profile', $getProfile->id, 'profile', 'gambar_profile');
        $dataBiodata = [
            'gambar_profile' => $gambar_profile,
        ];
        $profile = Profile::where('users_id', $id)->update($dataBiodata);

        if ($profile) {
            return response()->json([
                'status' => 200,
                'message' => 'Berhasil update data',
                'result' => $request->all(),
            ], 200);
        } else {
            return response()->json([
                'status' => 400,
                'message' => 'Gagal update data',
            ], 400);
        }
    }

    public function updatePassword(Request $request, $id)
    {
        //
        $validator = Validator::make($request->all(), [
            'password_old' => [function ($attribute, $value, $fail) use ($request, $id) {
                $password_old = $request->input('password_old');
                $getUsers = User::find($id);

                if(!Hash::check($password_old, $getUsers->password)){
                    $fail('Password lama tidak sesuai');
                }
                if($password_old == '' || $password_old == null){
                    $fail('Password lama wajib diisi');
                }
            },],
            'password' => [function ($attribute, $value, $fail) use ($request) {
                $password = $request->input('password');
                $password_confirm = $request->input('password_confirm');
                if ($password != null && $password_confirm != null) {
                    if ($password_confirm != $password) {
                        $fail('Password tidak sama dengan password confirmation');
                    }
                }

                if($password == '' || $password == null){
                    $fail('Password wajib diisi');
                }
            },],
            'password_confirm' => [function ($attribute, $value, $fail) use ($request) {
                $password = $request->input('password');
                $password_confirm = $request->input('password_confirm');
                if ($password != null && $password_confirm != null) {
                    if ($password_confirm != $password) {
                        $fail('Password tidak sama dengan password confirmation');
                    }
                }

                if($password_confirm == '' || $password_confirm == null){
                    $fail('Konfirmasi password wajib diisi');
                }
            },],
        ], [
            'image' => ':attribute harus berupa gambar',
            'max' => ':attribute tidak boleh lebih dari :max',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'message' => 'invalid form validation',
                'result' => $validator->errors()
            ], 400);
        }

        $password = $request->input('password');
        $dataUsers = [
            'password' => Hash::make($password),
        ];
        $updateUser = User::find($id)->update($dataUsers);


        if ($updateUser) {
            return response()->json([
                'status' => 200,
                'message' => 'Berhasil update data',
                'result' => $request->all(),
            ], 200);
        } else {
            return response()->json([
                'status' => 400,
                'message' => 'Gagal update data',
            ], 400);
        }
    }
}
