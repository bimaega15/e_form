<?php

namespace App\Http\Controllers;

use App\Http\Helpers\UtilsHelper;
use App\Http\Requests\CreateForwardRequest;
use App\Http\Requests\CreateTransaksiPutRequest;
use App\Http\Requests\CreateTransaksiRequest;
use App\Models\MetodePembayaran;
use App\Models\Product;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Transaction;
use App\Models\TransactionApprovel;
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
                    $usersIdAtasan = $row->users_id_review;
                    $getUsers = User::with('profile', 'profile.jabatan')->find($usersIdAtasan);
                    $color = '';
                    $keterangan = '';
                    $profileText = $getUsers->profile->nama_profile . ' ' . $getUsers->profile->jabatan->nama_jabatan;
                    if ($row->status_transaction == 'menunggu') {
                        $color = 'text-primary font-bold';
                        $keterangan = 'Menunggu Approval: ' . $profileText;
                    }
                    if ($row->status_transaction == 'ditolak') {
                        $color = 'text-danger font-bold';
                        $keterangan = 'Ditolak Oleh: ' . $profileText;
                    }
                    if ($row->status_transaction == 'disetujui') {
                        $color = 'text-success font-bold';
                        $keterangan = 'Disetujui ' . $profileText;
                    }
                    $output = '<span class="' . $color . '">' . $keterangan . '</span>';
                    return $output;
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
                    $ppn = $row->valueppn_transaction;
                    $totalPrice = 0;
                    if ($ppn != null) {
                        $totalPrice = $row->totalprice_transaction * $ppn / 100;
                    }
                    $totalPrice = $totalPrice + $row->totalprice_transaction;
                    $total = number_format($totalPrice, 0, ',', '.');
                    return $total;
                })
                ->addColumn('action', function ($row) {
                    $usersReview = $row->users_id_review;
                    $idLogin = Auth::id();
                    $buttonReview = false;

                    $buttonNext = false;
                    if ($row->status_transaction == 'menunggu') {
                        $buttonNext = true;
                    }
                    if ($row->status_transaction == 'ditolak') {
                        $buttonNext = false;
                    }
                    if ($row->status_transaction == 'disetujui') {
                        $buttonNext = false;
                    }

                    if ($usersReview == $idLogin && $buttonNext) {
                        $buttonReview = true;
                    }

                    $listButton = '';
                    if ($buttonReview) {
                        $listButton = '
                        <li> <a data-id="' . $row->id . '" href="' . route('transaksi.viewApproval', $row->id) . '" class="dropdown-item btn-approval">Approve Pengajuan</a> </li>';
                    }

                    $buttonHistory = false;
                    $listButtonHistory = '';
                    $getTransactionApprovel = TransactionApprovel::where('transaction_id', $row->id)
                        ->where('users_id', Auth::id())
                        ->orWhere('users_id_forward', Auth::id())
                        ->get()->count();
                    if ($getTransactionApprovel > 0) {
                        $buttonHistory = true;
                    }

                    if ($buttonHistory) {
                        $listButtonHistory = '
                        <li> <a data-id="' . $row->id . '" href="' . route('transaksi.viewHistory', $row->id) . '" class="dropdown-item btn-history">History Pengajuan</a> </li>
                        ';
                    }

                    $output = '
                <div class="dropdown"> <button class="dropdown-toggle btn btn-primary" aria-expanded="false" data-tw-toggle="dropdown">Action</button>
                    <div class="dropdown-menu w-40">
                        <ul class="dropdown-content">
                            <li> <a href="' . route('transaksi.edit', $row->id) . '" class="dropdown-item btn-edit">Edit Data</a> </li>
                            <li> <a href="#" data-url="' . url('transaksi/' . $row->id . '?_method=delete') . '" class="dropdown-item btn-delete">Delete Data</a> </li>
                            ' . $listButton . '
                            ' . $listButtonHistory . '
                        </ul>
                    </div>
                </div>
                ';

                    return $output;
                })
                ->rawColumns(['action', 'status_transaction'])
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
        $attachment_transaction = UtilsHelper::uploadFile($request->file('attachment_transaction'), 'transaction', null, 'transaction', 'attachment_transaction');
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
            'users_id' => Auth::id(),

            'purposedivisi_transaction' => $request->input('purposedivisi_transaction'),
            'isppn_transaction' => $request->input('isppn_transaction'),
            'valueppn_transaction' => $request->input('valueppn_transaction'),
            'attachment_transaction' => $attachment_transaction,

        ]);
        $transaction_id = $transaction->id;

        $products_id = json_decode($request->input('products_id'), true);
        $qty_detail = json_decode($request->input('qty_detail'), true);
        $price_detail = json_decode($request->input('price_detail'), true);
        $subtotal_detail = json_decode($request->input('subtotal_detail'), true);
        $remarks_detail = json_decode($request->input('remarks_detail'), true);

        $dataDetail = [];
        foreach ($products_id as $key => $value) {
            $dataDetail[] = [
                'transaction_id' => $transaction_id,
                'products_id' => $products_id[$key],
                'qty_detail' => $qty_detail[$key],
                'price_detail' => $price_detail[$key],
                'subtotal_detail' => $subtotal_detail[$key],
                'remarks_detail' => $remarks_detail[$key],
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
        $attachment_transaction = UtilsHelper::uploadFile($request->file('attachment_transaction'), 'transaction', $id, 'transaction', 'attachment_transaction');
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

            'purposedivisi_transaction' => $request->input('purposedivisi_transaction'),
            'isppn_transaction' => $request->input('isppn_transaction'),
            'valueppn_transaction' => $request->input('valueppn_transaction'),
            'attachment_transaction' => $attachment_transaction,
        ]);
        $transactionDetail = TransactionDetail::where('transaction_id', $id)->get()->count();
        if ($transactionDetail > 0) {
            TransactionDetail::where('transaction_id', $id)->delete();
        }

        $products_id = json_decode($request->input('products_id'), true);
        $qty_detail = json_decode($request->input('qty_detail'), true);
        $price_detail = json_decode($request->input('price_detail'), true);
        $subtotal_detail = json_decode($request->input('subtotal_detail'), true);
        $remarks_detail = json_decode($request->input('remarks_detail'), true);

        $dataDetail = [];
        foreach ($products_id as $key => $value) {
            $dataDetail[] = [
                'transaction_id' => $id,
                'products_id' => $products_id[$key],
                'qty_detail' => $qty_detail[$key],
                'price_detail' => $price_detail[$key],
                'subtotal_detail' => $subtotal_detail[$key],
                'remarks_detail' => $remarks_detail[$key],
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
        UtilsHelper::deleteFile($id, 'transaction', 'transaction', 'attachment_transaction');
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

    // approval
    public function viewApproval($id)
    {
        $getUsers = User::with('profile', 'profile.jabatan');
        $getTransaction = Transaction::with('users', 'users.profile', 'users.profile.jabatan', 'users.profile.unit', 'users.profile.categoryOffice', 'metodePembayaran')->find($id);
        $getTransactionRequest = TransactionDetail::with('transaction', 'products')->where('transaction_id', $id)->get();
        $getTransactionApprove = TransactionApprovel::where('transaction_id', $id)->get();
        return view('one.transaksi.viewApproval', [
            'getUsers' => $getUsers,
            'getTransaction' => $getTransaction,
            'getTransactionRequest' => $getTransactionRequest,
            'getTransactionApprove' => $getTransactionApprove,
        ]);
    }

    public function viewHistory($id)
    {
        $getTransactionApprove = TransactionApprovel::where('transaction_id', $id)->get();
        return view('one.transaksi.viewHistory', [
            'getTransactionApprove' => $getTransactionApprove,
        ]);
    }

    public function forwardApproval(CreateForwardRequest $request)
    {
        $transaction_id = $request->input('transaction_id');
        $users_id_forward = $request->input('users_id_forward');
        $data = [
            'transaction_id' => $transaction_id,
            'users_id' => Auth::id(),
            'tanggal_approvel' => Carbon::now(),
            'keterangan_approvel' => $request->input('keterangan_approvel'),
            'users_id_forward' => $users_id_forward,
            'status_transaction' => 'menunggu'
        ];
        TransactionApprovel::create($data);

        Transaction::find($transaction_id)->update([
            'users_id_review' => $users_id_forward,
            'status_transaction' => 'menunggu'
        ]);
        return response()->json('Berhasil approve form', 201);
    }

    public function finishApproval(Request $request)
    {
        $transaction_id = $request->input('transaction_id');
        $type = $request->input('type');

        $data = [
            'transaction_id' => $transaction_id,
            'users_id' => Auth::id(),
            'tanggal_approvel' => Carbon::now(),
            'keterangan_approvel' => $request->input('keterangan_approvel') == null ? '-' : $request->input('keterangan_approvel'),
            'users_id_forward' => null,
            'status_transaction' => $type
        ];
        TransactionApprovel::create($data);

        Transaction::find($transaction_id)->update([
            'users_id_review' => Auth::id(),
            'status_transaction' => $type
        ]);
        return response()->json('Berhasil approve form', 201);
    }
}
