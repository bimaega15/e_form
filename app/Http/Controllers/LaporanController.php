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
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class LaporanController extends Controller
{

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $tanggal_awal = $request->input('tanggal_awal');
            $tanggal_akhir = $request->input('tanggal_akhir');
            $is_transaksi_expired = $request->input('is_transaksi_expired');

            $data = Transaction::query()->with('users.profile.jabatan');
            if ($tanggal_awal != null) {
                $data->where('tanggal_transaction', '>=', $tanggal_awal);
            }
            if ($tanggal_akhir != null) {
                $data->where('tanggal_transaction', '<=', $tanggal_akhir);
            }
            if ($is_transaksi_expired == 'true') {
                $data->where('status_transaction', '!=', 'disetujui')
                    ->where('expired_transaction', '<', now());
            }
            $data = $data->groupBy('users_id')
                ->select('users_id', DB::raw('COUNT(*) as total_transactions'), DB::raw('SUM(subtotal_transaction) as total_subtotal'))->get();

            $resultData = [];
            foreach ($data as $key => $row) {
                $pengajuanTransaction = $row->users->profile->nama_profile . ' ' . $row->users->profile->jabatan->nama_jabatan;
                $resultData[] = [
                    'detail_transaction' => '
                        <a class="btn-detail" data-users_id="1" 
                        data-tanggal_awal="' . $tanggal_awal . '"
                        data-tanggal_akhir="' . $tanggal_akhir . '" 
                        data-is_transaksi_expired="' . $is_transaksi_expired . '" 
                        style="color: rgb(var(--color-primary) / var(--tw-bg-opacity)); cursor: pointer;">
                            <i class="fas fa-plus-circle fa-2x"></i>
                        </a>
                    ',
                    'pengajuan_transaction' => $pengajuanTransaction,
                    'total_transactions' => $row->total_transactions,
                    'total_subtotal' => number_format($row->total_subtotal, 0, '.', ','),
                ];
            }
            return response()->json([
                'data' => $resultData
            ], 200);

            // return DataTables::of($data)
            //     ->addColumn('metode_pembayaran_id', function ($row) {
            //         $metodePembayaran = MetodePembayaran::find($row->metode_pembayaran_id);
            //         return $metodePembayaran->nama_metode_pembayaran;
            //     })
            //     ->addColumn('pengajuan_transaction', function ($row) {
            //         $profileText = $row->users->profile->nama_profile . ' ' . $row->users->profile->jabatan->nama_jabatan;
            //         $output = '<a href="' . route('transaksi.viewTransactionPengajuan', $row->id) . '" class="text-primary btn-detail-pengajuan">' . $profileText . '</a>';
            //         return $output;
            //     })
            //     ->addColumn('status_transaction', function ($row) {
            //         $usersIdAtasan = $row->users_id_review;
            //         $color = '';
            //         $keterangan = '';
            //         if ($row->status_transaction == 'menunggu') {
            //             $color = 'text-primary font-bold';
            //             $keterangan = 'Menunggu Approval';
            //         }
            //         if ($row->status_transaction == 'ditolak') {
            //             $color = 'text-danger font-bold';
            //             $keterangan = 'Ditolak Oleh';
            //         }
            //         if ($row->status_transaction == 'disetujui') {
            //             $color = 'text-success font-bold';
            //             $keterangan = 'Disetujui';
            //         }
            //         $output = '<span class="' . $color . '">' . $keterangan . '</span>';
            //         return $output;
            //     })
            //     ->addColumn('oleh_transaction', function ($row) {
            //         $usersIdAtasan = $row->users_id_review;
            //         $getUsers = User::with('profile', 'profile.jabatan')->find($usersIdAtasan);
            //         $color = '';
            //         $profileText = $getUsers->profile->nama_profile . ' ' . $getUsers->profile->jabatan->nama_jabatan;
            //         if ($row->status_transaction == 'menunggu') {
            //             $color = 'text-primary font-bold';
            //         }
            //         if ($row->status_transaction == 'ditolak') {
            //             $color = 'text-danger font-bold';
            //         }
            //         if ($row->status_transaction == 'disetujui') {
            //             $color = 'text-success font-bold';
            //         }
            //         $output = '<span class="' . $color . '">' . $profileText . '</span>';
            //         return $output;
            //     })
            //     ->addColumn('code_transaction', function ($row) {
            //         $output = '<a href="' . route('transaksi.viewTransactionDetail', $row->id) . '" class="text-primary btn-detail-transaksi">' . $row->code_transaction . '</a>';
            //         return $output;
            //     })
            //     ->addColumn('tanggal_transaction', function ($row) {
            //         $dateNow = $row->tanggal_transaction;
            //         $tanggal = Carbon::parse($dateNow);
            //         $formattedDate = $tanggal->format('j F Y');
            //         return $formattedDate;
            //     })
            //     ->addColumn('expired_transaction', function ($row) {
            //         $dateNow = $row->expired_transaction;
            //         $tanggal = Carbon::parse($dateNow);
            //         $formattedDate = $tanggal->format('j F Y');
            //         return $formattedDate;
            //     })
            //     ->addColumn('totalproduct_transaction', function ($row) {
            //         $total = number_format($row->totalproduct_transaction, 0, ',', '.');
            //         return $total;
            //     })
            //     ->addColumn('totalprice_transaction', function ($row) {
            //         $ppn = $row->valueppn_transaction;
            //         $totalPrice = 0;
            //         if ($ppn != null) {
            //             $totalPrice = $row->totalprice_transaction * $ppn / 100;
            //         }
            //         $totalPrice = $totalPrice + $row->totalprice_transaction;
            //         $total = number_format($totalPrice, 0, ',', '.');
            //         return $total;
            //     })
            //     ->addColumn('action', function ($row) {
            //         $output = '
            //         <a data-id="' . $row->id . '" href="' . route('laporan.generatePdf', $row->id) . '" class="btn btn-danger btn-generate">PDF</a>
            //         ';

            //         return $output;
            //     })
            //     ->rawColumns(['action', 'status_transaction', 'pengajuan_transaction', 'oleh_transaction', 'code_transaction'])
            //     ->toJson();
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

    public function exportExcel(Request $request)
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->getColumnDimension('A')->setWidth(5);
        $sheet->getColumnDimension('B')->setWidth(15);
        $sheet->getColumnDimension('C')->setWidth(15);
        $sheet->getColumnDimension('D')->setWidth(15);
        $sheet->getColumnDimension('E')->setWidth(25);
        $sheet->getColumnDimension('F')->setWidth(25);
        $sheet->getColumnDimension('G')->setWidth(15);
        $sheet->getColumnDimension('H')->setWidth(25);
        $sheet->getColumnDimension('I')->setWidth(15);
        $sheet->getColumnDimension('J')->setWidth(15);
        $sheet->getColumnDimension('K')->setWidth(15);

        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'Mengajukan');
        $sheet->setCellValue('C1', 'Status');
        $sheet->setCellValue('D1', 'Oleh');
        $sheet->setCellValue('E1', 'Code');
        $sheet->setCellValue('F1', 'Tanggal Pengajuan');
        $sheet->setCellValue('G1', 'Tanggal Kadaluarsa');
        $sheet->setCellValue('H1', 'Payment Terms');
        $sheet->setCellValue('I1', 'Metode Pembayaran');
        $sheet->setCellValue('J1', 'Total Product');
        $sheet->setCellValue('K1', 'Total Transaksi');

        $tanggal_awal = $request->input('tanggal_awal');
        $tanggal_akhir = $request->input('tanggal_akhir');
        $is_transaksi_expired = $request->input('is_transaksi_expired');

        $data = Transaction::query()->orderBy('created_at', 'desc');
        if ($tanggal_awal != null) {
            $data->where('tanggal_transaction', '>=', $tanggal_awal);
        }
        if ($tanggal_akhir != null) {
            $data->where('tanggal_transaction', '<=', $tanggal_akhir);
        }
        if ($is_transaksi_expired == 'true') {
            $data->where('status_transaction', '!=', 'disetujui')
                ->where('expired_transaction', '<', now());
        }
        $query = $data->get();
        $no = 0;
        $keyNumber = 1;
        foreach ($query as $key => $item) {
            $no++;
            $keyNumber++;
            $mengajukan = $item->users->profile->nama_profile;
            $status = $item->status_transaction;
            $oleh = '-';
            $getUsersIdReview = UtilsHelper::myProfile($item->users_id_review);
            if($getUsersIdReview != null){
                $getUsersIdReview = UtilsHelper::myProfile($item->users_id_review)->profile->nama_profile;
                $oleh = $getUsersIdReview;
            }
            $code = $item->code_transaction;
            $tanggalPengajuan = UtilsHelper::formatDateLaporan($item->tanggal_transaction);
            $tanggalKadaluarsa = UtilsHelper::formatDateLaporan($item->expired_transaction);
            $paymentTerms = $item->paymentterms_transaction;
            $metodePembayaran = $item->metodePembayaran->nama_metode_pembayaran;
            $totalProduct = $item->totalproduct_transaction;
            $totalTransaction = $item->totalprice_transaction;

            $sheet->setCellValue('A' . $keyNumber, $no);
            $sheet->setCellValue('B' . $keyNumber, $mengajukan);
            $sheet->setCellValue('C' . $keyNumber, $status);
            $sheet->setCellValue('D' . $keyNumber, $oleh);
            $sheet->setCellValue('E' . $keyNumber, $code);
            $sheet->setCellValue('F' . $keyNumber, $tanggalPengajuan);
            $sheet->setCellValue('G' . $keyNumber, $tanggalKadaluarsa);
            $sheet->setCellValue('H' . $keyNumber, $paymentTerms);
            $sheet->setCellValue('I' . $keyNumber, $metodePembayaran);
            $sheet->setCellValue('J' . $keyNumber, $totalProduct);
            $sheet->setCellValue('K' . $keyNumber, $totalTransaction);
        }

        $styleArray = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
            ],
        ];
        $sheet->getStyle('A1:K' . ($no + 1))->applyFromArray($styleArray);


        $writer = new Xlsx($spreadsheet);
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="Laporan_Data_Pengajuan.xlsx"');
        header('Cache-Control: max-age=0');

        // Menulis ke output
        $writer->save('php://output');
        exit;
    }

    public function detailLaporan(Request $request)
    {
        $users_id = $request->input('users_id');
        $tanggal_awal = $request->input('tanggal_awal');
        $tanggal_akhir = $request->input('tanggal_akhir');
        $is_transaksi_expired = $request->input('is_transaksi_expired');

        $data = Transaction::query()->orderBy('created_at', 'desc');
        if ($tanggal_awal != null) {
            $data->where('tanggal_transaction', '>=', $tanggal_awal);
        }
        if ($tanggal_akhir != null) {
            $data->where('tanggal_transaction', '<=', $tanggal_akhir);
        }
        if ($is_transaksi_expired == 'true') {
            $data->where('status_transaction', '!=', 'disetujui')
                ->where('expired_transaction', '<', now());
        }
        if($users_id != null){
            $data->where('users_id', $users_id);
        }
        $data = $data->get();

        $resultData = [];
        foreach ($data as $key => $row) {
            $mergeData = [];
            $mergeData = array_merge($mergeData, [
                'id' => $row->id,
            ]);

            $codeTransaction = '<a href="' . route('transaksi.viewTransactionDetail', $row->id) . '" class="text-primary btn-detail-transaksi">' . $row->code_transaction . '</a>';
            $mergeData = array_merge($mergeData, [
                'code_transaction' => $codeTransaction,
            ]);

            $dateNow = $row->tanggal_transaction;
            $tanggal = Carbon::parse($dateNow);
            $tanggalTransaction = $tanggal->format('j F Y');
            $mergeData = array_merge($mergeData, [
                'tanggal_transaction' => $tanggalTransaction,
            ]);

            $dateNow = $row->expired_transaction;
            $tanggal = Carbon::parse($dateNow);
            $expiredTransaction = $tanggal->format('j F Y');
            $mergeData = array_merge($mergeData, [
                'expired_transaction' => $expiredTransaction,
            ]);
            $mergeData = array_merge($mergeData, [
                'paymentterms_transaction' => $row->paymentterms_transaction,
            ]);

            $totalProductTransaction = number_format($row->totalproduct_transaction, 0, ',', '.');
            $mergeData = array_merge($mergeData, [
                'totalproduct_transaction' => $totalProductTransaction,
            ]);

            $ppn = $row->valueppn_transaction;
            $totalPrice = 0;
            if ($ppn != null) {
                $totalPrice = $row->totalprice_transaction * $ppn / 100;
            }
            $totalPrice = $totalPrice + $row->totalprice_transaction;
            $totalPriceTransaction = number_format($totalPrice, 0, ',', '.');
            $mergeData = array_merge($mergeData, [
                'totalprice_transaction' => $totalPriceTransaction,
            ]);

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
            $statusTransaction = '<span class="' . $color . '">' . $keterangan . '</span>';
            $mergeData = array_merge($mergeData, [
                'status_transaction' => $statusTransaction,
            ]);

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
            $olehTransaction = '<span class="' . $color . '">' . $profileText . '</span>';
            $mergeData = array_merge($mergeData, [
                'oleh_transaction' => $olehTransaction,
            ]);


            $metodePembayaran = MetodePembayaran::find($row->metode_pembayaran_id);
            $metodePembayaranId = $metodePembayaran->nama_metode_pembayaran;
            $mergeData = array_merge($mergeData, [
                'metode_pembayaran_id' => $metodePembayaranId,
            ]);

            $profileText = $row->users->profile->nama_profile . ' ' . $row->users->profile->jabatan->nama_jabatan;
            $pengajuanTransaction = '<a href="' . route('transaksi.viewTransactionPengajuan', $row->id) . '" class="text-primary btn-detail-pengajuan">' . $profileText . '</a>';
            $mergeData = array_merge($mergeData, [
                'pengajuan_transaction' => $pengajuanTransaction,
            ]);


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
                <a target="_blank" data-id="' . $row->id . '" href="' . route('laporan.generatePdf', $row->id) . '" class="btn btn-danger btn-generate mt-1">PDF</a>
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

            $action = '
            <div class="text-center">
            ' . $output . ' ' . $generatePdf . '
            </div>';

            $mergeData = array_merge($mergeData, [
                'is_expired' => $row->is_expired,
                'action' => $action,
            ]);

            array_push($resultData, $mergeData);
        }

        return response()->json([
            'data' => $resultData,
        ], 200);
    }
}
