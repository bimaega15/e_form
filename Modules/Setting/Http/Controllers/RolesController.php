<?php

namespace Modules\Setting\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Setting\Http\Requests\CreatePostRolesRequest;
use Spatie\Permission\Models\Role;
use DataTables;
use Spatie\Permission\Models\Permission;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $data = Role::query();
            return DataTables::eloquent($data)
                ->addColumn('action', function ($row) {
                    $buttonUpdate = '';
                    $buttonUpdate = '
                    <a href="' . route('autentikasi.roles.edit', $row->id) . '" class="btn btn-warning btn-edit btn-sm">
                        <i class="zmdi zmdi-edit"></i>
                    </a>
                    ';
                    $buttonDelete = '';
                    $buttonDelete = '
                    <button type="button" class="btn-delete btn btn-danger btn-sm" data-url="' . url('autentikasi/roles/' . $row->id . '?_method=delete') . '">
                        <i class="zmdi zmdi-delete"></i>
                    </button>
                    ';
                    $buttonAuth = '';
                    $buttonAuth = '
                    <a href="' . route('autentikasi.roles.show', $row->id) . '" class="btn btn-info btn-auth btn-sm">
                        <i class="zmdi zmdi-lock"></i>
                    </a>
                    ';
                    $button = '
                <div class="text-center">
                    ' . $buttonUpdate . '
                    ' . $buttonDelete . '
                    ' . $buttonAuth . '
                </div>
                ';

                    return $button;
                })
                ->rawColumns(['action'])
                ->toJson();
        }
        return view('setting::roles.index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('setting::roles.form');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(CreatePostRolesRequest $request)
    {
        //
        $insert = Role::create($request->all());
        return response()->json('Berhasil menambahkan data', 201);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $role = Role::find($id);
        $permissions = Permission::all();
        return view('setting::roles.accessRoles', compact('role', 'permissions'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $roles = Role::find($id);
        return view('setting::roles.form', compact('roles'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(CreatePostRolesRequest $request, $id)
    {
        //
        $data = $request->except(['_method']);
        Role::find($id)->update($data);
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
        Role::destroy($id);
        return response()->json('Berhasil menghapus data', 200);
    }
}
