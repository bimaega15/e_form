<?php

namespace Modules\Master\Http\Controllers;

use App\Http\Helpers\UtilsHelper;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Master\Http\Requests\CreatePostProductRequest;
use App\Models\Product;
use App\Models\TypeProduct;
use DataTables;
use Modules\Master\Http\Requests\CreateUpdateProductRequest;

class ProductController extends Controller
{

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Product::query();
            return DataTables::eloquent($data)
                ->addColumn('gambar_product', function ($row) {
                    $output = '
                    <a class="photoviewer" href="' . asset('upload/product/' . $row->gambar_product) . '" data-gallery="photoviewer" data-title="' . $row->gambar_product . '" target="_blank">
                        <img src="' . asset('upload/product/' . $row->gambar_product) . '" alt="Upload gambar" height="100px" class="rounded">
                    </a>   
                    ';
                    return $output;
                })
                ->addColumn('action', function ($row) {
                    $buttonUpdate = '';
                    $buttonUpdate = '
                    <a href="' . route('master.product.edit', $row->id) . '" class="btn btn-warning btn-edit btn-sm">
                        <i class="zmdi zmdi-edit"></i>
                    </a>
                    ';
                    $buttonDelete = '';
                    $buttonDelete = '
                    <button type="button" class="btn-delete btn btn-danger btn-sm" data-url="' . url('master/product/' . $row->id . '?_method=delete') . '">
                        <i class="zmdi zmdi-delete"></i>
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
                ->rawColumns(['action', 'gambar_product'])
                ->toJson();
        }
        return view('master::product.index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $typeProduct = TypeProduct::all();
        return view('master::product.form', compact('typeProduct'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(CreatePostProductRequest $request)
    {
        //
        $gambar_product = UtilsHelper::uploadFile($request->file('gambar_product'), 'product', null, 'products', 'gambar_product');
        $data = $request->except(['gambar_product']);
        $data = array_merge(
            $data,
            [
                'code_product' => UtilsHelper::generateCodeProduct(),
                'gambar_product' => $gambar_product,
            ],
        );
        Product::create($data);
        return response()->json('Berhasil menambahkan data', 201);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('master::product.form');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $typeProduct = TypeProduct::all();
        return view('master::product.form', compact('product', 'typeProduct'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(CreateUpdateProductRequest $request, $id)
    {
        //
        $gambar_product = UtilsHelper::uploadFile($request->file('gambar_product'), 'product', $id, 'products', 'gambar_product');
        $data = $request->except(['gambar_product', '_method']);
        $data = array_merge(
            $data,
            [
                'code_product' => UtilsHelper::generateCodeProduct(),
                'gambar_product' => $gambar_product,
            ],
        );

        Product::find($id)->update($data);
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
        UtilsHelper::deleteFile($id, 'products', 'product', 'gambar_product');
        Product::destroy($id);
        return response()->json('Berhasil menghapus data', 200);
    }
}
