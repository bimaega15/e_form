<?php

namespace Modules\Setting\Http\Controllers;

use App\Http\Helpers\UtilsHelper;
use App\Models\CategoryOffice;
use App\Models\Jabatan;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Profile;
use App\Models\Unit;
use App\Models\User;
use DataTables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Modules\Setting\Http\Requests\CreatePostProfileRequest;
use Modules\Setting\Http\Requests\CreatePutProfileRequest;

class UsersController extends Controller
{

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Profile::query()->with('users', 'jabatan');
            return DataTables::eloquent($data)
                ->addColumn('gambar_profile', function ($row) {
                    $output = '
                <a class="photoviewer" href="' . asset('upload/users/' . $row->gambar_profile) . '" data-gallery="photoviewer" data-title="' . $row->gambar_profile . '" target="_blank">
                    <img src="' . asset('upload/users/' . $row->gambar_profile) . '" alt="Upload gambar" height="100px" class="rounded">
                </a>   
                ';
                    return $output;
                })
                ->addColumn('usersid_atasan', function ($row) {
                    $output = '-';
                    if ($row->usersid_atasan != null) {
                        $getUsers = User::with('profile', 'profile.jabatan')->find($row->usersid_atasan);
                        $output = $getUsers->profile->nama_profile . ' | ' . $getUsers->profile->jabatan->nama_jabatan;
                    }

                    return $output;
                })
                ->addColumn('action', function ($row) {
                    $buttonUpdate = '';
                    $buttonUpdate = '
                    <a href="' . route('setting.users.edit', $row->id) . '" class="btn btn-warning btn-edit btn-sm">
                    <i class="fa-solid fa-pencil"></i>
                    </a>
                    ';
                    $buttonDelete = '';
                    $buttonDelete = '
                    <button type="button" class="btn-delete btn btn-danger btn-sm" data-url="' . url('setting/users/' . $row->id . '?_method=delete') . '">
                    <i class="fa-solid fa-trash"></i>
                    </button>
                    ';

                    $buttonAccess = '
                    <a href="' . url('setting/access?users_id=' . $row->users_id) . '" class="btn btn-info btn-access btn-sm" data-users_id="' . $row->users_id . '">
                    <i class="fa-solid fa-lock"></i>
                    </a>
                    ';

                    $button = '
                <div class="text-center">
                    ' . $buttonUpdate . '
                    ' . $buttonDelete . '
                    ' . $buttonAccess . '
                </div>
                ';

                    return $button;
                })
                ->rawColumns(['action', 'gambar_profile'])
                ->toJson();
        }
        return view('setting::users.index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $unit = Unit::all();
        $jabatan = Jabatan::all();
        $categoryOffice = CategoryOffice::all();
        $usersIdAtasan = User::with('profile', 'profile.jabatan')->get();
        return view('setting::users.form', compact('unit', 'jabatan', 'categoryOffice', 'usersIdAtasan'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(CreatePostProfileRequest $request)
    {
        // users

        $data =  [
            'email' => $request->input('email_profile'),
            'name' => $request->input('nama_profile'),
            'password' => Hash::make($request->input('password'))
        ];

        $insertUsers = User::create($data);
        $users_id = $insertUsers->id;

        // profile
        $request->request->add([
            'users_id' => $users_id
        ]);
        $gambar_profile = UtilsHelper::uploadFile($request->file('gambar_profile'), 'profile', null, 'profile', 'gambar_profile');
        $data = $request->except(['gambar_profile', 'password', 'password_old', 'password_confirm']);

        $data = array_merge(
            $data,
            [
                'gambar_profile' => $gambar_profile,
            ],
        );
        Profile::create($data);
        return response()->json('Berhasil menambahkan data', 201);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('setting::users.form');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $profile = Profile::find($id);
        return view('setting::users.form', compact('profile'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
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

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
        UtilsHelper::deleteFile($id, 'profile', 'profile', 'gambar_profile');
        Profile::destroy($id);
        return response()->json('Berhasil menghapus data', 200);
    }

    public function getUsersProfile(Request $request)
    {
        $search = $request->input('search');
        $limit = 10;
        $page = $request->input('page');
        $endPage = $page * $limit;
        $firstPage = $endPage - $limit;

        $data = User::join('profile', 'profile.users_id', '=', 'users.id')
            ->join('jabatan', 'jabatan.id', '=', 'profile.jabatan_id');
        $countData = User::join('profile', 'profile.users_id', '=', 'users.id')
            ->join('jabatan', 'jabatan.id', '=', 'profile.jabatan_id')
            ->get()
            ->count();

        if ($search != null) {
            $data->where('nama_profile', 'like', '%' . $search . '%')
                ->orWhere('nama_jabatan', 'like', '%' . $search . '%');
        }
        $data = $data->offset($firstPage)
            ->limit($limit)
            ->get();

        $result = [];
        foreach ($data as $key => $v_data) {
            $result['results'][] =
                [
                    'id' => $v_data->id,
                    'text' =>  $v_data->nama_profile . ' | ' . $v_data->nama_jabatan,
                ];
        }
        if ($search != null) {
            $countData = count($result);
        }

        $result['count_filtered'] = $countData;
        return $result;
    }
}
