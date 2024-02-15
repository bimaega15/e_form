<?php

namespace App\Http\Controllers\Api\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Helpers\UtilsHelper;
use App\Http\Requests\CreateTransaksiPutRequest;
use App\Http\Requests\CreateTransaksiRequest;
use App\Models\DataStatis;
use App\Models\MetodePembayaran;
use App\Models\OverBooking;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\TransactionApprovel;
use App\Models\TransactionDetail;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class TransaksiController extends Controller
{
    public function index(Request $request)
    {
        //
        try {
            $tanggal_awal = $request->input('tanggal_awal');
            $tanggal_akhir = $request->input('tanggal_akhir');
            $is_transaksi_expired = $request->input('is_transaksi_expired');

            $totalWaiting = Transaction::where('status_transaction', 'menunggu')
                ->where('users_id', Auth::id())
                ->get()->count();
            $totalSuccess = Transaction::where('status_transaction', 'disetujui')
                ->where('users_id', Auth::id())
                ->get()->count();
            $totalReject = Transaction::where('status_transaction', 'ditolak')
                ->where('users_id', Auth::id())
                ->get()->count();

            $totalWaitingAccesor = TransactionApprovel::where('status_transaction', 'menunggu')
                ->where('users_id', Auth::id())
                ->get()->count();
            $totalSuccessAccesor = TransactionApprovel::where('status_transaction', 'disetujui')
                ->where('users_id', Auth::id())
                ->get()->count();
            $totalRejectAccesor = TransactionApprovel::where('status_transaction', 'ditolak')
                ->where('users_id', Auth::id())
                ->get()->count();

            $dataDashboard = Transaction::with([
                'usersApproval' => function ($query) {
                    $query
                        ->join('users', 'users.id', '=', 'transaction_approvel.users_id')
                        ->join('profile', 'profile.users_id', '=', 'users.id')
                        ->leftJoin('users as forward_users', 'forward_users.id', '=', 'transaction_approvel.users_id_forward')
                        ->leftJoin('profile as forward_profile', 'forward_profile.users_id', '=', 'forward_users.id')
                        ->leftJoin('jabatan as forward_jabatan', 'forward_jabatan.id', '=', 'forward_profile.jabatan_id')
                        ->select('transaction_approvel.id', 'transaction_approvel.transaction_id', 'transaction_approvel.tanggal_approvel as tanggalApprovel', 'transaction_approvel.keterangan_approvel as keteranganApprovel', 'transaction_approvel.status_transaction as statusTransaction', 'transaction_approvel.users_id_forward', 'transaction_approvel.users_id', 'profile.nama_profile as requestPeople', 'forward_users.name as forwardPeople', 'forward_users.email as forwardEmailPeople', 'forward_jabatan.nama_jabatan as forwardJabatan', 'profile.gambar_profile as profileApprovel');
                },
                'products' => function ($query) {
                    $query->join('products', 'products.id', '=', 'transaction_detail.products_id')
                        ->select('transaction_detail.id', 'transaction_detail.transaction_id', 'products.name_product as name', 'transaction_detail.qty_detail as qty', 'transaction_detail.price_detail as price', 'transaction_detail.subtotal_detail as totalPrice', 'transaction_detail.remarks_detail as remarks', 'transaction_detail.subtotal_detail as subTotal', 'transaction_detail.matauang_detail as currency', 'transaction_detail.kurs_detail as curs', 'products.code_product', 'products.capacity_product', 'products.id as products_id');
                },
                'transactionApprovel', 'transactionApprovel.users', 'transactionApprovel.users.profile',  'transactionApprovel.users.profile.jabatan', 'transactionApprovel.usersForward', 'transactionApprovel.usersForward.profile', 'transactionApprovel.usersForward.profile.jabatan', 'overBooking','usersReview', 'usersReview.profile', 'usersReview.profile.jabatan'
            ])
                ->join('users', 'users.id', '=', 'transaction.users_id')
                ->join('profile', 'profile.users_id', '=', 'users.id')
                ->join('jabatan', 'jabatan.id', '=', 'profile.jabatan_id')
                ->join('unit', 'unit.id', '=', 'profile.unit_id')
                ->join('category_office', 'category_office.id', '=', 'profile.category_office_id')
                ->join('metode_pembayaran', 'transaction.metode_pembayaran_id', '=', 'metode_pembayaran.id')
                ->where('transaction.users_id', Auth::id())
                ->orWhereIn('transaction.users_id', function ($query) {
                    $query->select('users_id')
                        ->from('transaction_approvel')
                        ->where('users_id', Auth::id());
                });
                if ($tanggal_awal != null) {
                    $dataDashboard->where('transaction.tanggal_transaction', '>=', $tanggal_awal);
                }
                if ($tanggal_akhir != null) {
                    $dataDashboard->where('transaction.tanggal_transaction', '<=', $tanggal_akhir);
                }
                if ($is_transaksi_expired == 'true') {
                    $dataDashboard->where('transaction.status_transaction', '!=', 'disetujui')
                        ->where('transaction.expired_transaction', '<', now());
                }
                $dataDashboard = $dataDashboard->select('transaction.code_transaction as noReq', 'transaction.tanggal_transaction as reqDate', 'profile.nama_profile as reqBy', 'jabatan.nama_jabatan as position', 'category_office.nama_category_office as categoryOffice', 'transaction.paidto_transaction as paidTo', 'metode_pembayaran.nama_metode_pembayaran as paymentMethod', 'transaction.expired_transaction as expDate', 'transaction.purpose_transaction as purposeTransaction', 'transaction.purposedivisi_transaction as purposeDivisi', 'transaction.totalproduct_transaction as totalProduct', 'transaction.totalprice_transaction as totalAmount', 'transaction.isppn_transaction as ppn', 'transaction.valueppn_transaction as amountPpn', 'transaction.status_transaction as status', 'transaction.attachment_transaction as attachment', 'transaction.id', 'profile.gambar_profile as gambarProfile', 'unit.nama_unit as unitName', 'profile.alamat_profile as address', 'transaction.paymentterms_transaction as paymentTerms', 'transaction.overbooking_transaction', 'transaction.metode_pembayaran_id', 'transaction.nomorvirtual_transaction', 'transaction.accept_transaction', 'transaction.bank_transaction', 'transaction.totalppn_transaction', 'transaction.subtotal_transaction', 'transaction.users_id_review', 'transaction.is_expired')
                ->selectSub(function ($query) {
                    // Subquery to get approvalBy from the related table
                    $query->select('name')->from('users')
                        ->whereRaw('users.id = transaction.users_id_review');
                }, 'approvalBy')
                ->orderBy('transaction.tanggal_transaction','desc')
                ->limit(5)
                ->get();


            return response()->json([
                'status' => 200,
                'message' => "Berhasil ambil data",
                'result' => [
                    'totalWaiting' => $totalWaiting,
                    'totalSuccess' => $totalSuccess,
                    'totalReject' => $totalReject,

                    'totalWaitingAccesor' => $totalWaitingAccesor,
                    'totalSuccessAccesor' => $totalSuccessAccesor,
                    'totalRejectAccesor' => $totalRejectAccesor,

                    'data' => $dataDashboard,
                ],
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'status' => 500,
                'message' => 'Terjadi kesalahan data',
                'result' => $e->getMessage()
            ], 500);
        }
    }

    public function getPaginate(Request $request)
    {
        try {
            $transaction = new Transaction();
            $paginate = $transaction->getTransactionData(
                $request->input('status_transaction'), 
            $request->input('search'), $request);
            return response()->json([
                'status' => 200,
                'message' => 'berhasil ambil data',
                'result' => $paginate
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'status' => 500,
                'message' => 'Terjadi kesalahan data',
                'result' => $e->getMessage()
            ], 500);
        }
    }

    public function store(Request $request)
    {
        try {
            //
            $validator = Validator::make($request->all(), [
                'code_transaction' => 'required|unique:transaction,code_transaction',
                'tanggal_transaction' => 'required',
                'metode_pembayaran_id' => 'required',
                'expired_transaction' => 'required',
                'purpose_transaction' => 'required',
                'attachment_transaction' => 'max:2048',
            ], [
                'required' => ':attribute wajib diisi',
                'unique' => ':attribute harus unik',
                'image' => ':attribute harus berupa gambar',
                'max' => ':attribute tidak boleh lebih dari :max',
            ]);
            if ($validator->fails()) {
                return response()->json([
                    'status' => 400,
                    'message' => 'invalid form validation',
                    'result' => $validator->errors()
                ], 400);
            }

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

            if ($overbooking_transaction != 1) {
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

            if ($overbooking_transaction == 1) {
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
            return response()->json([
                'status' => 201,
                'message' => 'Berhasil insert data',
                'result' => $request->all()
            ], 201);
        } catch (Exception $e) {
            return response()->json([
                'status' => 500,
                'message' => 'Terjadi kesalahan data',
                'result' => $e->getMessage()
            ], 500);
            Log::info(response()->json([
                'status' => 500,
                'message' => 'Terjadi kesalahan data',
                'result' => $e->getMessage()
            ], 500));
        }
    }

    public function edit($id)
    {
        $transaction = new Transaction();
        return response()->json([
            'status' => 200,
            'message' => 'Berhasil ambil data',
            'result' => $transaction->editTransaction($id),
        ], 200);
    }

    public function static()
    {
        $metodePembayaran = MetodePembayaran::all();
        $product = Product::all();
        $users = User::with('profile', 'profile.jabatan', 'profile.unit', 'profile.categoryOffice')->get();
        $jenisOverBooking = Config::get('datastatis.overbooking');
        $mataUang = DataStatis::byJenisreferensiDatastatis('mata_uang')->get();
        $rekening = DataStatis::byJenisreferensiDatastatis('rekening')->get();


        return response()->json([
            'status' => 200,
            'message' => 'Berhasil ambil data',
            'result' => [
                'metodePembayaran' => $metodePembayaran,
                'product' => $product,
                'users' => $users,
                'jenisOverBooking' => $jenisOverBooking,
                'mataUang' => $mataUang,
                'rekening' => $rekening
            ]
        ], 200);
    }

    public function update(Request $request, $id)
    {
        //
        $validator = Validator::make($request->all(), [
            'code_transaction' => 'required|unique:transaction,code_transaction,' . request()->route('id'),
            'tanggal_transaction' => 'required',
            'metode_pembayaran_id' => 'required',
            'expired_transaction' => 'required',
            'purpose_transaction' => 'required',
            'attachment_transaction' => 'max:2048',
        ], [
            'required' => ':attribute wajib diisi',
            'unique' => ':attribute harus unik',
            'image' => ':attribute harus berupa gambar',
            'max' => ':attribute tidak boleh lebih dari :max',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'message' => 'invalid form validation',
                'result' => $validator->errors()
            ], 400);
        }

        try {
            $overbooking_transaction = $request->input('overbooking_transaction');

            $attachment_transaction = UtilsHelper::uploadFile($request->file('attachment_transaction'), 'transaction', $id, 'transaction', 'attachment_transaction');
            Transaction::find($id)->update([
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
            if ($overbooking_transaction != 1) {
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

            return response()->json([
                'status' => 200,
                'message' => 'Berhasil ubah data',
                'result' => $request->all()
            ], 200);
        } catch (Exception $e) {
            Log::info($e->getMessage());
            return response()->json([
                'status' => 500,
                'message' => 'Terjadi kesalahan data',
                'result' => $e->getMessage()
            ], 500);
        }
    }

    public function destroy($id)
    {
        //
        UtilsHelper::deleteFile($id, 'transaction', 'transaction', 'attachment_transaction');
        Transaction::destroy($id);
        return response()->json('Berhasil menghapus data', 200);
    }

    // approval
    public function viewApproval($id)
    {
        $getTransaction = Transaction::with('users', 'users.profile', 'users.profile.jabatan', 'users.profile.unit', 'users.profile.categoryOffice', 'metodePembayaran')->find($id);
        $getTransactionRequest = TransactionDetail::with('transaction', 'products')->where('transaction_id', $id)->get();
        $getTransactionApprove = TransactionApprovel::where('transaction_id', $id)
            ->join('users', 'users.id', '=', 'transaction_approvel.users_id')
            ->join('profile', 'profile.users_id', '=', 'users.id')
            ->join('jabatan', 'profile.jabatan_id', '=', 'jabatan.id')
            ->leftJoin('users as forward_users', 'forward_users.id', '=', 'transaction_approvel.users_id_forward')
            ->select('transaction_approvel.*', 'profile.nama_profile as acc_approval', 'forward_users.name as forward_approval', 'jabatan.nama_jabatan as acc_jabatan')
            ->get();

        return response()->json([
            'status' => 200,
            'message' => 'Berhasil ambil data',
            'result' => [
                'getTransaction' => $getTransaction,
                'getTransactionRequest' => $getTransactionRequest,
                'getTransactionApprove' => $getTransactionApprove,
                'getOverBooking' => $getTransaction->overBooking
            ]
        ], 200);
    }

    public function viewHistory($id)
    {
        $getTransactionApprove = TransactionApprovel::where('transaction_id', $id)
            ->join('users', 'users.id', '=', 'transaction_approvel.users_id')
            ->join('profile', 'profile.users_id', '=', 'users.id')
            ->join('jabatan', 'profile.jabatan_id', '=', 'jabatan.id')
            ->leftJoin('users as forward_users', 'forward_users.id', '=', 'transaction_approvel.users_id_forward')
            ->select('transaction_approvel.*', 'profile.nama_profile as acc_approval', 'forward_users.name as forward_approval', 'jabatan.nama_jabatan as acc_jabatan')
            ->get();

        return response()->json([
            'status' => 200,
            'message' => 'Berhasil ambil data',
            'result' => $getTransactionApprove
        ], 200);
    }

    public function forwardApproval(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'users_id_forward' => 'required',
        ], [
            'required' => ':attribute wajib diisi',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'message' => 'invalid form validation',
                'result' => $validator->errors()
            ], 400);
        }

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
        return response()->json([
            'status' => 201,
            'message' => 'Berhasil approve form',
            'result' => $request->all()
        ], 201);
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
        return response()->json([
            'status' => 201,
            'message' => 'Berhasil approve form',
            'result' => $request->all()
        ]);
    }
}
