<?php

namespace Modules\Dashboard\Http\Controllers;


use App\Http\Helpers\UtilsHelper;
use App\Models\AccessToken;
use App\Models\MetodePembayaran;
use App\Models\Note;
use App\Models\Profile;
use App\Models\Transaction;
use App\Models\TransactionApprovel;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use DataTables;
use Illuminate\Support\Facades\DB;
use GuzzleHttp\Client;


class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $type = $request->input('type');
            if ($type == 'notes') {
                $notes = Note::paginate(5);
                return view('dashboard::notes', [
                    'notes' => $notes,
                    'all_notes' => Note::all()->count(),
                ])->render();
            }
            $totalWaiting = Transaction::where('status_transaction', 'menunggu')
                ->where('users_id', Auth::id())
                ->get()->count();
            $totalSuccess = Transaction::where('status_transaction', 'disetujui')
                ->where('users_id', Auth::id())
                ->get()->count();
            $totalReject = Transaction::where('status_transaction', 'ditolak')
                ->where('users_id', Auth::id())
                ->get()->count();
            $totalTransaction = Transaction::where('users_id', Auth::id())
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
            $totalTransactionAccesor = TransactionApprovel::where('users_id', Auth::id())
                ->get()->count();

            $profileL = Profile::where('jeniskelamin_profile', 'L')->get()->count();
            $profileP = Profile::where('jeniskelamin_profile', 'P')->get()->count();
            $jumlahTotal = $profileL + $profileP;

            $persentaseLakiLaki = ($profileL / $jumlahTotal) * 100;
            $persentasePerempuan = ($profileP / $jumlahTotal) * 100;

            $laporanExpired = Transaction::query()
                ->where('status_transaction', '!=', 'disetujui')
                ->where('expired_transaction', '<', now())
                ->where('is_expired', 1)
                ->paginate(10);

            $currentYear = date('Y');
            $result = DB::table('transaction')
                ->select(DB::raw('YEAR(tanggal_transaction) as year'), DB::raw('MONTH(tanggal_transaction) as month'), DB::raw('count(tanggal_transaction) as total'))
                ->whereYear('tanggal_transaction', $currentYear)
                ->groupBy('year', 'month')
                ->orderBy('year', 'desc') // Urutkan tahun secara descending
                ->orderBy('month', 'asc')
                ->get();

            $dataMonth = UtilsHelper::monthData();

            $outputMonth = [];
            foreach ($dataMonth as $key => $value) {
                $integerMonth = UtilsHelper::stringMonth($value);
                foreach ($result as $row) {
                    if ($integerMonth == $row->month) {
                        $outputMonth[] = [
                            'year' => $row->year,
                            'month' => UtilsHelper::integerMonth($row->month),
                            'total' => $row->total,
                        ];
                    } else {
                        $outputMonth[] = [
                            'year' => $currentYear,
                            'month' => $value,
                            'total' => 0,
                        ];
                    }
                }
            }


            return response()->json([
                'totalWaiting' => $totalWaiting,
                'totalSuccess' => $totalSuccess,
                'totalReject' => $totalReject,
                'totalTransaction' => $totalTransaction,

                'totalWaitingAccesor' => $totalWaitingAccesor,
                'totalSuccessAccesor' => $totalSuccessAccesor,
                'totalRejectAccesor' => $totalRejectAccesor,
                'totalTransactionAccesor' => $totalTransactionAccesor,

                'grafikPegawai' => [
                    'L' => $profileL,
                    'P' => $profileP,
                    'persentaseLakiLaki' => $persentaseLakiLaki,
                    'persentasePerempuan' => $persentasePerempuan,
                ],

                'grafikTransaksi' => [
                    'totalWaiting' => $totalWaiting,
                    'totalSuccess' => $totalSuccess,
                    'totalReject' => $totalReject,
                    'totalTransaction' => $totalTransaction,

                    'totalWaitingAccesor' => $totalWaitingAccesor,
                    'totalSuccessAccesor' => $totalSuccessAccesor,
                    'totalRejectAccesor' => $totalRejectAccesor,
                    'totalTransactionAccesor' => $totalTransactionAccesor,
                ],
                'laporanExpired' => $laporanExpired,
                'transactionReport' => [
                    'label' => $dataMonth,
                    'output' => $outputMonth
                ]
            ]);
        }

        return view('dashboard::index');
    }

    public function expired(Request $request)
    {
        if ($request->ajax()) {
            $data = Transaction::query()
                ->where('status_transaction', '!=', 'disetujui')
                ->where('expired_transaction', '<', now())
                ->where('is_expired', 1);

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
                    $isAdmin = Auth::user()->hasRole('Admin');

                    $generatePdf = '';
                    if ($row->status_transaction == 'disetujui') {
                        $generatePdf = '
                        <a data-id="' . $row->id . '" href="' . route('laporan.generatePdf', $row->id) . '" class="btn btn-danger btn-generate mt-1">PDF</a>
                        ';
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
                        <a data-id="' . $row->id . '" href="' . route('transaksi.viewHistory', $row->id) . '" class="btn btn-primary btn-history">History Pengajuan</a>
                        ';
                    }

                    if ($listButtonHistory == '' && $generatePdf == '') {
                        return '-';
                    }

                    return '
                    <div class="text-center">
                    ' . $listButtonHistory . ' ' . $generatePdf . '
                    </div>';
                })
                ->rawColumns(['action', 'status_transaction', 'pengajuan_transaction', 'oleh_transaction', 'code_transaction'])
                ->toJson();
        }
    }
}
