<?php

namespace App\Http\Controllers;

use App\Http\Helpers\UtilsHelper;
use App\Models\MetodePembayaran;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Transaction;
use App\Models\TransactionApprovel;
use App\Models\User;
use Carbon\Carbon;
use DataTables;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\App;

class LaporanController extends Controller
{

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $tanggal_awal = $request->input('tanggal_awal');
            $tanggal_akhir = $request->input('tanggal_akhir');
            $is_transaksi_expired = $request->input('is_transaksi_expired');

            $data = Transaction::query();
            if ($tanggal_awal != null) {
                $data->where('tanggal_transaction', '>=', $tanggal_awal);
            }
            if ($tanggal_akhir != null) {
                $data->where('tanggal_transaction', '<=', $tanggal_akhir);
            }
            if ($is_transaksi_expired) {
                $data->where('status_transaction', '!=', 'disetujui')
                    ->orWhere('expired_transaction', '<=', Carbon::now()->toDateString());
            }

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
                    $output = '
                    <a data-id="' . $row->id . '" href="' . route('laporan.generatePdf', $row->id) . '" class="btn btn-danger btn-generate">PDF</a>
                    ';

                    return $output;
                })
                ->rawColumns(['action', 'status_transaction', 'pengajuan_transaction', 'oleh_transaction', 'code_transaction'])
                ->toJson();
        }


        return view('one.laporan.index');
    }

    public function generatePdf($id)
    {

        $getTransaction = Transaction::with('users', 'users.profile', 'users.profile.jabatan', 'users.profile.unit', 'users.profile.categoryOffice', 'metodePembayaran', 'transactionDetail', 'transactionDetail.products', 'transactionApprovel', 'transactionApprovel.users', 'transactionApprovel.users.profile', 'transactionApprovel.users.profile.jabatan')->find($id);

        $settings = UtilsHelper::settingApp();

        $logo_settings = public_path('upload/settings/logo/' . $settings->logo_settings);
        $icon_settings = public_path('upload/settings/icon/' . $settings->icon_settings);

        $logoPath = file_get_contents($logo_settings);
        $iconPath = file_get_contents($icon_settings);

        $logoBase64Path = base64_encode($logoPath);
        $iconBase64Path = base64_encode($iconPath);

        $base64ImageStringLogo = 'data:image/jpeg;base64,' . $logoBase64Path;
        $base64ImageStringIcon = 'data:image/jpeg;base64,' . $iconBase64Path;


        $pdf = App::make('dompdf.wrapper');
        $pdf = Pdf::loadView('one.laporan.generatePdf', [
            'getTransaction' => $getTransaction,
            'settings' => $settings,
            'base64ImageStringLogo' => $base64ImageStringLogo,
            'base64ImageStringIcon' => $base64ImageStringIcon,
        ]);
        return $pdf->stream();
        // return $pdf->download('laporan_pengajuan.pdf');
    }
}
