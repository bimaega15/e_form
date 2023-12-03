<?php

namespace App\Http\Controllers\Api\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\TransactionApprovel;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Auth;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        //
        try {
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

            $dataDashboard = Transaction::join('transaction_approvel', 'transaction_approvel.transaction_id', '=', 'transaction.id')
                ->join('users', 'users.id', '=', 'transaction.users_id')
                ->join('profile', 'profile.users_id', '=', 'users.id')
                ->join('jabatan', 'jabatan.id', '=', 'profile.jabatan_id')
                ->join('category_office', 'category_office.id', '=', 'profile.category_office_id')
                ->join('metode_pembayaran', 'transaction.metode_pembayaran_id', '=', 'metode_pembayaran.id')
                ->where('transaction.users_id', Auth::id())
                ->orWhere('transaction_approvel.users_id', Auth::id())
                ->orWhere('transaction_approvel.users_id_forward', Auth::id())
                ->select('transaction.code_transaction as noReq', 'transaction.tanggal_transaction as reqDate', 'profile.nama_profile as reqBy', 'jabatan.nama_jabatan as position', 'category_office.nama_category_office as categoryOffice', 'transaction.paidto_transaction as paidTo', 'metode_pembayaran.nama_metode_pembayaran as paymentMethod', 'transaction.expired_transaction as expDate')
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
}
