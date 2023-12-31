<?php

namespace App\Http\Controllers;

use App\Http\Helpers\UtilsHelper;
use App\Http\Requests\CreateForwardRequest;
use App\Http\Requests\CreateTransaksiPutRequest;
use App\Http\Requests\CreateTransaksiRequest;
use App\Models\DataStatis;
use App\Models\MetodePembayaran;
use App\Models\OverBooking;
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
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Hash;

class TransaksiController extends Controller
{

    public $jenisOverBooking;
    public function __construct()
    {
        $this->jenisOverBooking = Config::get('datastatis.overbooking');
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Transaction::query();
            return DataTables::eloquent($data)
                ->addColumn('metode_pembayaran_id', function ($row) {
                    $metodePembayaran = MetodePembayaran::find($row->metode_pembayaran_id);
                    return $metodePembayaran->nama_metode_pembayaran;
                })
                ->addColumn('pengajuan_transaction', function ($row) {
                    $profileText = $row->users->profile->nama_profile . ' ' . $row->users->profile->jabatan->nama_jabatan;
                    $output = '<a href="' . route('transaksi.viewTransactionPengajuan', $row->id) . '" class="text-primary btn-detail-pengajuan">' . $profileText . '</a>';
                    return $output;
                })
                ->addColumn('status_transaction', function ($row) {
                    $usersIdAtasan = $row->users_id_review;
                    $color = '';
                    $keterangan = '';
                    if ($row->status_transaction == 'menunggu') {
                        $color = 'text-primary font-bold';
                        $keterangan = 'Menunggu Approval';
                    }
                    if ($row->status_transaction == 'ditolak') {
                        $color = 'text-danger font-bold';
                        $keterangan = 'Ditolak Oleh';
                    }
                    if ($row->status_transaction == 'disetujui') {
                        $color = 'text-success font-bold';
                        $keterangan = 'Disetujui';
                    }
                    $output = '<span class="' . $color . '">' . $keterangan . '</span>';
                    return $output;
                })
                ->addColumn('oleh_transaction', function ($row) {
                    $usersIdAtasan = $row->users_id_review;
                    $getUsers = User::with('profile', 'profile.jabatan')->find($usersIdAtasan);
                    $color = '';
                    $profileText = $getUsers->profile->nama_profile . ' ' . $getUsers->profile->jabatan->nama_jabatan;
                    if ($row->status_transaction == 'menunggu') {
                        $color = 'text-primary font-bold';
                    }
                    if ($row->status_transaction == 'ditolak') {
                        $color = 'text-danger font-bold';
                    }
                    if ($row->status_transaction == 'disetujui') {
                        $color = 'text-success font-bold';
                    }
                    $output = '<span class="' . $color . '">' . $profileText . '</span>';
                    return $output;
                })
                ->addColumn('code_transaction', function ($row) {
                    $output = '<a href="' . route('transaksi.viewTransactionDetail', $row->id) . '" class="text-primary btn-detail-transaksi">' . $row->code_transaction . '</a>';
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
                    $transactionApprovel = $row->transactionApprovel()->count();
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

                    $isAdmin = Auth::user()->hasRole('Admin');
                    $listButton = '';

                    if (($buttonReview || $isAdmin) && ($row->status_transaction != 'disetujui' && $row->status_transaction != 'ditolak') && $row->is_expired != true || $row->status_transaction == 'direvisi') {
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

                    if ($buttonHistory || $isAdmin) {
                        $listButtonHistory = '
                        <li> <a data-id="' . $row->id . '" href="' . route('transaksi.viewHistory', $row->id) . '" class="dropdown-item btn-history">History Pengajuan</a> </li>
                        ';
                    }

                    $buttonDelete = '';
                    if ($transactionApprovel == null) {
                        $buttonDelete = '
                    <li> <a href="#" data-url="' . url('transaksi/' . $row->id . '?_method=delete') . '" class="dropdown-item btn-delete">Delete Data</a> </li>
                    ';
                    }

                    $buttonEdit = '';
                    if ($transactionApprovel == null || $row->status_transaction == 'direvisi') {
                        $buttonEdit = '
                        <li> <a href="' . route('transaksi.edit', $row->id) . '" class="dropdown-item btn-edit">Edit Data</a> </li>
                    ';
                    }

                    $generatePdf = '';
                    if ($row->status_transaction == 'disetujui') {
                        $generatePdf = '
                        <a data-id="' . $row->id . '" href="' . route('laporan.generatePdf', $row->id) . '" class="btn btn-danger btn-generate mt-1">PDF</a>
                        ';
                    }

                    $output = '
                <div class="dropdown"> <button class="dropdown-toggle btn btn-primary" aria-expanded="false" data-tw-toggle="dropdown">Action</button>
                    <div class="dropdown-menu w-40">
                        <ul class="dropdown-content">
                            ' . $buttonEdit . '
                            ' . $buttonDelete . '
                            ' . $listButton . '
                            ' . $listButtonHistory . '
                        </ul>
                    </div>
                </div>
                ';

                    return '
                    <div class="text-center">
                    ' . $output . ' ' . $generatePdf . '
                    </div>';
                })
                ->rawColumns(['status_transaction', 'pengajuan_transaction', 'oleh_transaction', 'code_transaction', 'action'])
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
        $bankPenerima = DataStatis::byJenisreferensiDatastatis('rekening')->get();
        $mataUang = DataStatis::byJenisreferensiDatastatis('mata_uang')->get();
        $jenisOverBooking = $this->jenisOverBooking;

        return view('one.transaksi.form', [
            'metodePembayaran' => $metodePembayaran,
            'product' => Product::all(),
            'bankPenerima' => $bankPenerima,
            'mataUang' => $mataUang,
            'jenisOverBooking' => $jenisOverBooking
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
        $overbooking_transaction = $request->input('overbooking_transaction');

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
            'totalppn_transaction' => $request->input('totalppn_transaction'),
            'subtotal_transaction' => $request->input('subtotal_transaction'),
            'users_id_review' => $getAtasan->profile->usersid_atasan,
            'status_transaction' => 'menunggu',
            'users_id' => Auth::id(),

            'purposedivisi_transaction' => $request->input('purposedivisi_transaction'),
            'isppn_transaction' => $request->input('isppn_transaction'),
            'valueppn_transaction' => $request->input('valueppn_transaction'),
            'attachment_transaction' => $attachment_transaction,

            'nomorvirtual_transaction' => $request->input('nomorvirtual_transaction') == 'null' ? null : $request->input('nomorvirtual_transaction'),
            'accept_transaction' => $request->input('accept_transaction') == 'null' ? null : $request->input('accept_transaction'),
            'bank_transaction' => $request->input('bank_transaction') == 'null' ? null : $request->input('bank_transaction'),

            'overbooking_transaction' => $overbooking_transaction,

        ]);
        $transaction_id = $transaction->id;

        $jenis_over_booking = $request->input('jenis_over_booking');
        $darirekening_booking = $request->input('darirekening_booking');
        $pemilikrekening_booking = $request->input('pemilikrekening_booking');
        $tujuanrekening_booking = $request->input('tujuanrekening_booking');
        $pemiliktujuan_booking = $request->input('pemiliktujuan_booking');
        $nominal_booking = $request->input('nominal_booking');

        if ($overbooking_transaction != true) {
            $products_id = json_decode($request->input('products_id'), true);
            $qty_detail = json_decode($request->input('qty_detail'), true);
            $price_detail = json_decode($request->input('price_detail'), true);
            $subtotal_detail = json_decode($request->input('subtotal_detail'), true);
            $remarks_detail = json_decode($request->input('remarks_detail'), true);
            $matauang_detail = json_decode($request->input('matauang_detail'), true);
            $kurs_detail = json_decode($request->input('kurs_detail'), true);

            $dataDetail = [];
            foreach ($products_id as $key => $value) {
                $dataDetail[] = [
                    'transaction_id' => $transaction_id,
                    'products_id' => $products_id[$key],
                    'qty_detail' => $qty_detail[$key],
                    'price_detail' => $price_detail[$key],
                    'subtotal_detail' => $subtotal_detail[$key],
                    'remarks_detail' => $remarks_detail[$key],
                    'matauang_detail' => $matauang_detail[$key],
                    'kurs_detail' => $kurs_detail[$key],
                ];
            }
            TransactionDetail::insert($dataDetail);
        }

        if ($overbooking_transaction == true) {
            $dataOver = [
                'transaction_id' => $transaction_id,
                'jenis_over_booking' => $jenis_over_booking,
                'darirekening_booking' => $darirekening_booking,
                'pemilikrekening_booking' => $pemilikrekening_booking,
                'tujuanrekening_booking' => $tujuanrekening_booking,
                'pemiliktujuan_booking' => $pemiliktujuan_booking,
                'nominal_booking' => $nominal_booking,
            ];
            OverBooking::create($dataOver);
        }

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
    public function edit(Request $request, $id)
    {

        if ($request->ajax()) {
            $typeRequest = $request->input('typeRequest');
            if ($typeRequest == 'from_json') {
                return response()->json(true);
            }
        }
        $transaction = Transaction::find($id);
        $metodePembayaran = MetodePembayaran::all();
        $product = Product::all();
        $bankPenerima = DataStatis::byJenisreferensiDatastatis('rekening')->get();
        $mataUang = DataStatis::byJenisreferensiDatastatis('mata_uang')->get();
        $jenisOverBooking = $this->jenisOverBooking;


        return view('one.transaksi.form', compact('transaction', 'metodePembayaran', 'product', 'bankPenerima', 'mataUang', 'jenisOverBooking'));
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

        $overbooking_transaction = $request->input('overbooking_transaction');

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
            'totalppn_transaction' => $request->input('totalppn_transaction'),
            'subtotal_transaction' => $request->input('subtotal_transaction'),

            'purposedivisi_transaction' => $request->input('purposedivisi_transaction'),
            'isppn_transaction' => $request->input('isppn_transaction'),
            'valueppn_transaction' => $request->input('valueppn_transaction'),
            'attachment_transaction' => $attachment_transaction,

            'nomorvirtual_transaction' => $request->input('nomorvirtual_transaction') == 'null' ? null : $request->input('nomorvirtual_transaction'),
            'accept_transaction' => $request->input('accept_transaction') == 'null' ? null : $request->input('accept_transaction'),
            'bank_transaction' => $request->input('bank_transaction') == 'null' ? null : $request->input('bank_transaction'),
            'overbooking_transaction' => $overbooking_transaction
        ]);
        $transactionDetail = TransactionDetail::where('transaction_id', $id)->get()->count();
        if ($transactionDetail > 0) {
            TransactionDetail::where('transaction_id', $id)->delete();
        }

        $jenis_over_booking = $request->input('jenis_over_booking');
        $darirekening_booking = $request->input('darirekening_booking');
        $pemilikrekening_booking = $request->input('pemilikrekening_booking');
        $tujuanrekening_booking = $request->input('tujuanrekening_booking');
        $pemiliktujuan_booking = $request->input('pemiliktujuan_booking');
        $nominal_booking = $request->input('nominal_booking');

        if ($overbooking_transaction != true) {
            $products_id = json_decode($request->input('products_id'), true);
            $qty_detail = json_decode($request->input('qty_detail'), true);
            $price_detail = json_decode($request->input('price_detail'), true);
            $subtotal_detail = json_decode($request->input('subtotal_detail'), true);
            $remarks_detail = json_decode($request->input('remarks_detail'), true);
            $matauang_detail = json_decode($request->input('matauang_detail'), true);
            $kurs_detail = json_decode($request->input('kurs_detail'), true);

            $dataDetail = [];
            foreach ($products_id as $key => $value) {
                $dataDetail[] = [
                    'transaction_id' => $id,
                    'products_id' => $products_id[$key],
                    'qty_detail' => $qty_detail[$key],
                    'price_detail' => $price_detail[$key],
                    'subtotal_detail' => $subtotal_detail[$key],
                    'remarks_detail' => $remarks_detail[$key],
                    'matauang_detail' => $matauang_detail[$key],
                    'kurs_detail' => $kurs_detail[$key],
                ];
            }
            TransactionDetail::insert($dataDetail);
        } else {
            $dataOver = [
                'transaction_id' => $id,
                'jenis_over_booking' => $jenis_over_booking,
                'darirekening_booking' => $darirekening_booking,
                'pemilikrekening_booking' => $pemilikrekening_booking,
                'tujuanrekening_booking' => $tujuanrekening_booking,
                'pemiliktujuan_booking' => $pemiliktujuan_booking,
                'nominal_booking' => $nominal_booking,
            ];
            OverBooking::where('transaction_id', $id)->update($dataOver);
        }
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
        $getTransaction = Transaction::with('users', 'users.profile', 'users.profile.jabatan', 'users.profile.unit', 'users.profile.categoryOffice', 'metodePembayaran')->find($id);
        $getTransactionRequest = TransactionDetail::with('transaction', 'products')->where('transaction_id', $id)->get();
        $getTransactionApprove = TransactionApprovel::where('transaction_id', $id)->get();
        $countTransactionApprove = $getTransactionApprove->count();
        $setJabatan = UtilsHelper::setJabatan($countTransactionApprove);

        return view('one.transaksi.viewApproval', [
            'getTransaction' => $getTransaction,
            'getTransactionRequest' => $getTransactionRequest,
            'getTransactionApprove' => $getTransactionApprove,
            'setJabatan' => $setJabatan
        ]);
    }

    public function viewTransactionPengajuan($id)
    {
        $getTransaction = Transaction::with('users', 'users.profile', 'users.profile.jabatan', 'users.profile.unit', 'users.profile.categoryOffice', 'metodePembayaran')->find($id);

        return view('one.transaksi.viewTransactionPengajuan', [
            'getTransaction' => $getTransaction,
        ]);
    }
    public function viewTransactionDetail($id)
    {
        $getTransactionRequest = TransactionDetail::with('transaction', 'products')->where('transaction_id', $id)->get();
        $getOverBooking = OverBooking::where('transaction_id', $id)->first();
        $getTransaction = Transaction::find($id);
        return view('one.transaksi.viewTransactionDetail', [
            'getTransactionRequest' => $getTransactionRequest,
            'getOverBooking' => $getOverBooking,
            'getTransaction' => $getTransaction
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

    public function changeBuy(Request $request)
    {
        $metode_pembayaran = $request->input('metode_pembayaran');
        $bankPenerima = DataStatis::byJenisreferensiDatastatis('rekening')->get();
        return view('one.transaksi.changeBuy', compact('metode_pembayaran', 'bankPenerima'))->render();
    }

    public function getMataUang()
    {
        $mataUang = DataStatis::byJenisreferensiDatastatis('mata_uang')->get();
        return response()->json($mataUang);
    }
}
