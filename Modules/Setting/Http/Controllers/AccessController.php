<?php

namespace Modules\Setting\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class AccessController extends Controller
{

    public function index(Request $request)
    {
        $roles = Role::all();
        $users_id = $request->input('users_id');
        $getProfile = User::with('profile')->find($users_id);
        return view('setting::access.index', compact('roles', 'getProfile'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('setting::access.form');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $value = $request->input('value');
        $id = $request->input('id');
        $users_id = $request->input('users_id');

        $roles = Role::find($id);
        $users = User::find($users_id);
        $permission = $roles->permissions()->get()->pluck('name')->toArray();

        if ($value != null) {
            $getDataRoles = $users->roles()->get()->pluck('name')->toArray();
            $data = $getDataRoles;
            array_push($data, $roles->name);
            $users->syncRoles($data);

            $dataPermission = $users->permissions()->get()->pluck('name')->toArray();
            array_push($dataPermission, $permission);
            $users->syncPermissions($permission);
        } else {
            if ($users->hasRole($roles->name)) {
                $users->removeRole($roles->name);
                $users->revokePermissionTo($permission);

                $getUsers = User::find($users_id);
                $countUsers = $getUsers->roles()->get()->count();
                if ($countUsers > 0) {
                    $dataPermissions = $roles->permissions()->get()->pluck('name')->toArray();
                    $users->syncPermissions($dataPermissions);
                }
            }
        }
        return response('Berhasil menambahkan access', 200);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('setting::access.form');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('setting::access.form', compact('access'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
