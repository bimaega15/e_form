<?php

namespace App\Http\Controllers\Api\Product;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Exception;



class ProductController extends Controller
{
    public function index(Request $request)
    {
        //
        try {
            $search = $request->input('search');
            $result = Product::query();
            if($search != null){
                $result->where('code_product','like', '%'.$search.'%')
                ->orWhere('name_product', 'like', '%'.$search.'%')
                ->orWhere('capacity_product', 'like', '%'.$search.'%');
            }
            $result = $result->paginate(10);


            return response()->json([
                'status' => 200,
                'message' => "Berhasil ambil data",
                'result' => $result,
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'status' => 500,
                'message' => 'Terjadi kesalahan data',
                'result' => $e->getMessage()
            ], 500);
        }
    }
}
