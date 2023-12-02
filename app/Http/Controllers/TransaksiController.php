<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTransaksiPutRequest;
use App\Http\Requests\CreateTransaksiRequest;
use App\Models\MetodePembayaran;
use App\Models\Product;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use App\Models\User;
use Carbon\Carbon;
use DataTables;
use Illuminate\Support\Facades\Auth;

class TransaksiController extends Controller
{

    public function index(Request $request)
    {
        if ($request->ajax()) {

            $data = Transaction::query();
            return DataTables::eloquent($data)
                ->addColumn('metode_pembayaran_id', function ($row) {
                    $metodePembayaran = MetodePembayaran::find($row->metode_pembayaran_id);
                    return $metodePembayaran->nama_metode_pembayaran;
                })
                ->addColumn('status_transaction', function ($row) {
                    return ucwords($row->status_transaction);
                })
                ->addColumn('tanggal_transaction', function ($row) {
                    $dateNow = $row->tanggal_transaction;
                    $tanggal = Carbon::parse($dateNow);
                    $formattedDate = $tanggal->format('j F Y');
                    return $formattedDate;
                })
                ->addColumn('expired_transaction', function ($row) {
                    $dateNow = $row->expired_transaction;
                    $tanggal = Carbon::parse($dateNow);
                    $formattedDate = $tanggal->format('j F Y');
                    return $formattedDate;
                })
                ->addColumn('totalproduct_transaction', function ($row) {
                    $total = number_format($row->totalproduct_transaction, 0, ',', '.');
                    return $total;
                })
                ->addColumn('totalprice_transaction', function ($row) {
                    $total = number_format($row->totalprice_transaction, 0, ',', '.');
                    return $total;
                })
                ->addColumn('action', function ($row) {
                    $buttonUpdate = '';
                    $buttonUpdate = '
                    <a href="' . route('transaksi.edit', $row->id) . '" class="btn btn-warning btn-edit btn-sm">
                        <i class="fa-solid fa-pencil"></i>
                    </a>
                    ';
                    $buttonDelete = '';
                    $buttonDelete = '
                    <button type="button" class="btn-delete btn btn-danger btn-sm" data-url="' . url('transaksi/' . $row->id . '?_method=delete') . '">
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
                ->rawColumns(['action'])
                ->toJson();
        }
        return view('one.transaksi.index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $metodePembayaran = MetodePembayaran::all();
        return view('one.transaksi.form', [
            'metodePembayaran' => $metodePembayaran,
            'product' => Product::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(CreateTransaksiRequest $request)
    {
        //
        $getAtasan = User::with('profile')->find(Auth::id());
        $transaction = Transaction::create([
            'code_transaction' => $request->input('code_transaction'),
            'tanggal_transaction' => $request->input('tanggal_transaction'),
            'paidto_transaction' => $request->input('paidto_transaction'),
            'metode_pembayaran_id' => $request->input('metode_pembayaran_id'),
            'paymentterms_transaction' => $request->input('paymentterms_transaction'),
            'expired_transaction' => $request->input('expired_transaction'),
            'purpose_transaction' => $request->input('purpose_transaction'),
            'totalproduct_transaction' => $request->input('totalproduct_transaction'),
            'totalprice_transaction' => $request->input('totalprice_transaction'),
            'users_id_review' => $getAtasan->profile->usersid_atasan,
            'status_transaction' => 'menunggu',
        ]);
        $transaction_id = $transaction->id;

        $products_id = json_decode($request->input('products_id'), true);
        $qty_detail = json_decode($request->input('qty_detail'), true);
        $price_detail = json_decode($request->input('price_detail'), true);
        $subtotal_detail = json_decode($request->input('subtotal_detail'), true);

        $dataDetail = [];
        foreach ($products_id as $key => $value) {
            $dataDetail[] = [
                'transaction_id' => $transaction_id,
                'products_id' => $products_id[$key],
                'qty_detail' => $qty_detail[$key],
                'price_detail' => $price_detail[$key],
                'subtotal_detail' => $subtotal_detail[$key],
                'remarks_detail' => '',
            ];
        }
        TransactionDetail::insert($dataDetail);
        return response()->json('Berhasil menambahkan data', 201);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('one.transaksi.form');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $transaction = Transaction::find($id);
        $metodePembayaran = MetodePembayaran::all();
        $product = Product::all();
        return view('one.transaksi.form', compact('transaction', 'metodePembayaran', 'product'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(CreateTransaksiPutRequest $request, $id)
    {
        //
        $transaction = Transaction::find($id)->update([
            'code_transaction' => $request->input('code_transaction'),
            'tanggal_transaction' => $request->input('tanggal_transaction'),
            'paidto_transaction' => $request->input('paidto_transaction'),
            'metode_pembayaran_id' => $request->input('metode_pembayaran_id'),
            'paymentterms_transaction' => $request->input('paymentterms_transaction'),
            'expired_transaction' => $request->input('expired_transaction'),
            'purpose_transaction' => $request->input('purpose_transaction'),
            'totalproduct_transaction' => $request->input('totalproduct_transaction'),
            'totalprice_transaction' => $request->input('totalprice_transaction'),
        ]);
        $transactionDetail = TransactionDetail::where('transaction_id', $id)->get()->count();
        if ($transactionDetail > 0) {
            TransactionDetail::where('transaction_id', $id)->delete();
        }

        $products_id = json_decode($request->input('products_id'), true);
        $qty_detail = json_decode($request->input('qty_detail'), true);
        $price_detail = json_decode($request->input('price_detail'), true);
        $subtotal_detail = json_decode($request->input('subtotal_detail'), true);

        $dataDetail = [];
        foreach ($products_id as $key => $value) {
            $dataDetail[] = [
                'transaction_id' => $id,
                'products_id' => $products_id[$key],
                'qty_detail' => $qty_detail[$key],
                'price_detail' => $price_detail[$key],
                'subtotal_detail' => $subtotal_detail[$key],
                'remarks_detail' => '',
            ];
        }
        TransactionDetail::insert($dataDetail);
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
        Transaction::destroy($id);
        return response()->json('Berhasil menghapus data', 200);
    }

    public function getProduct($id)
    {
        return response()->json([
            'status' => 200,
            'messasge' => 'Berhasil ambil data',
            'result' => Product::with('typeProduct')->find($id),
        ], 200);
    }
}
