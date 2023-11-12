<?php

namespace Modules\Master\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Master\Http\Requests\CreatePostJabatanRequest;
use App\Models\Jabatan;
use DataTables;

class JabatanController extends Controller
{

    public function index(Request $request)
    {
        if ($request->ajax()) {

            $data = Jabatan::query();
            return DataTables::eloquent($data)
                ->addColumn('is_node', function ($row) {
                    $output = '
                    <span class="badge badge-success">
                        <i class="fa-solid fa-check text-success"></i>
                    </span>';
                    if ($row->is_node == 0 || $row->is_node == null) {
                        $output = '
                    <span class="badge badge-danger">
                        <i class="fa-solid fa-circle-xmark text-danger"></i>
                    </span>';
                    }

                    return $output;
                })
                ->addColumn('is_children', function ($row) {
                    $output = '
                    <span class="badge badge-success">
                        <i class="fa-solid fa-check text-success"></i>
                    </span>';
                    if ($row->is_children == 0 || $row->is_children == null) {
                        $output = '
                    <span class="badge badge-danger">
                        <i class="fa-solid fa-circle-xmark text-danger"></i>
                    </span>';
                    }
                    return $output;
                })

                ->addColumn('action', function ($row) {
                    $buttonUpdate = '';
                    $buttonUpdate = '
                    <a href="' . route('master.jabatan.edit', $row->id) . '" class="btn btn-warning btn-edit btn-sm">
                        <i class="fa-solid fa-pencil"></i>
                    </a>
                    ';
                    $buttonDelete = '';
                    $buttonDelete = '
                    <button type="button" class="btn-delete btn btn-danger btn-sm" data-url="' . url('master/jabatan/' . $row->id . '?_method=delete') . '">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                    ';

                    $button = '
                <div class="text-center">
                    ' . $buttonUpdate . '
                    ' . $buttonDelete . '
                </div>
                ';

                    return $button;
                })
                ->rawColumns(['action', 'is_node', 'is_children'])
                ->toJson();
        }
        return view('master::jabatan.index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('master::jabatan.form');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(CreatePostJabatanRequest $request)
    {
        //
        Jabatan::create($request->all());
        return response()->json('Berhasil menambahkan data', 201);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('master::jabatan.form');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $jabatan = Jabatan::find($id);
        return view('master::jabatan.form', compact('jabatan'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(CreatePostJabatanRequest $request, $id)
    {
        //
        $data = $request->except(['_method']);
        Jabatan::find($id)->update($data);
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
        Jabatan::destroy($id);
        return response()->json('Berhasil menghapus data', 200);
    }
}
