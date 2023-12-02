<?php

namespace App\Http\Controllers;

use App\Http\Helpers\UtilsHelper;
use App\Http\Requests\CreateProfileUpdateRequest;
use App\Models\CategoryOffice;
use App\Models\Jabatan;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Profile;
use App\Models\Unit;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class MyProfileController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return view('one.myProfile.outputData', [
                'profile' => UtilsHelper::myProfile(),
            ])->render();
        }
        return view('one.myProfile.index', [
            'profile' => UtilsHelper::myProfile()
        ]);
    }

    public function edit($id)
    {
        $profile = Profile::where('users_id', $id)->first();
        $unit = Unit::all();
        $jabatan = Jabatan::all();
        $categoryOffice = CategoryOffice::all();
        $usersIdAtasan = User::with('profile', 'profile.jabatan')->get();
        return view('one.myProfile.form', compact('profile', 'unit', 'jabatan', 'categoryOffice', 'usersIdAtasan'));
    }

    public function update(CreateProfileUpdateRequest $request, $id)
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
