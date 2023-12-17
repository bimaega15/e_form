<?php

namespace App\Http\Controllers;

use App\Http\Helpers\UtilsHelper;
use App\Http\Requests\CreateForwardRequest;
use App\Http\Requests\CreateTransaksiPutRequest;
use App\Http\Requests\CreateTransaksiRequest;
use App\Models\DataStatis;
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
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Hash;

class LaporanController extends Controller
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
                ->rawColumns(['action', 'status_transaction', 'pengajuan_transaction', 'oleh_transaction', 'code_transaction'])
                ->toJson();
        }


        return view('one.laporan.index');
    }
}
