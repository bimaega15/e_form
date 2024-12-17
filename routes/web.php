<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\MyProfileController;
use App\Http\Controllers\TransaksiController;
use Illuminate\Support\Facades\Route;
use App\Events\TestEvent;
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
use App\Http\Controllers\FirebaseController;
use App\Http\Controllers\SendNotifikasiController;
use App\Http\Helpers\UtilsHelper;
>>>>>>> 3adc26b1aacfea81e4c724cc8f0fd8d73b9c2bd4
=======
use App\Http\Controllers\FirebaseController;
use App\Http\Controllers\SendNotifikasiController;
use App\Http\Helpers\UtilsHelper;
>>>>>>> d4d7d73b6e1cc8c8023ace5575307e7e3bc9702e
=======
use App\Http\Controllers\FirebaseController;
use App\Http\Controllers\SendNotifikasiController;
use App\Http\Helpers\UtilsHelper;
>>>>>>> 100a138f5f976700e0719b8141930b09e6d6a8c8

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(['middleware' => ['guest']], function () {
    Route::get('/', [AuthenticatedSessionController::class, 'create']);
});
Route::post('/firebase/saveToken', [FirebaseController::class, 'saveToken'])->name('saveToken');
Route::post('customLogout', [AuthenticatedSessionController::class, 'customLogout'])->name('customLogout');

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
Route::get('/broadcast', function () {
    event(new TestEvent('Hello, WebSocket!'));
    return 'Event has been broadcast!';
});


=======
Route::get('/broadcast', [SendNotifikasiController::class, 'broadcast'])->name('broadcast');
>>>>>>> 3adc26b1aacfea81e4c724cc8f0fd8d73b9c2bd4
=======
Route::post('customLogout', [AuthenticatedSessionController::class, 'customLogout'])->name('customLogout');
Route::get('/broadcast', [SendNotifikasiController::class, 'broadcast'])->name('broadcast');
>>>>>>> d4d7d73b6e1cc8c8023ace5575307e7e3bc9702e
=======
Route::post('customLogout', [AuthenticatedSessionController::class, 'customLogout'])->name('customLogout');
Route::get('/broadcast', [SendNotifikasiController::class, 'broadcast'])->name('broadcast');
>>>>>>> 100a138f5f976700e0719b8141930b09e6d6a8c8

Route::middleware('auth')->group(function () {
});
Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
require __DIR__ . '/auth.php';

Route::middleware('auth')->group(function () {
    Route::get('/myProfile', [MyProfileController::class, 'index'])->name('myProfile.index');
    Route::get('/myProfile/{id}/edit', [MyProfileController::class, 'edit'])->name('myProfile.edit');
    Route::put('/myProfile/{id}/update', [MyProfileController::class, 'update'])->name('myProfile.update');

    Route::resource('transaksi', TransaksiController::class)->except(['show']);
    Route::get('transaksi/getProduct/{id}', [TransaksiController::class, 'getProduct'])->name('transaksi.getProduct');
    Route::get('transaksi/viewApproval/{id}', [TransaksiController::class, 'viewApproval'])->name('transaksi.viewApproval');
    Route::get('transaksi/viewTransactionDetail/{id}', [TransaksiController::class, 'viewTransactionDetail'])->name('transaksi.viewTransactionDetail');
    Route::get('transaksi/viewTransactionPengajuan/{id}', [TransaksiController::class, 'viewTransactionPengajuan'])->name('transaksi.viewTransactionPengajuan');
    Route::post('transaksi/forwardApproval', [TransaksiController::class, 'forwardApproval'])->name('transaksi.forwardApproval');
    Route::get('transaksi/viewHistory/{id}', [TransaksiController::class, 'viewHistory'])->name('transaksi.viewHistory');
    Route::post('transaksi/finishApproval', [TransaksiController::class, 'finishApproval'])->name('transaksi.finishApproval');
    Route::get('transaksi/changeBuy', [TransaksiController::class, 'changeBuy'])->name('transaksi.changeBuy');
    Route::get('transaksi/getMataUang', [TransaksiController::class, 'getMataUang'])->name('transaksi.getMataUang');

    Route::get('laporan', [LaporanController::class, 'index'])->name('laporan.index');
    Route::get('laporan/detailLaporan', [LaporanController::class, 'detailLaporan'])->name('laporan.detailLaporan');
    Route::get('laporan/{id}/generatePdf', [LaporanController::class, 'generatePdf'])->name('laporan.generatePdf');
    Route::get('laporan/exportExcel', [LaporanController::class, 'exportExcel'])->name('laporan.exportExcel');
});

Route::group(['prefix' => 'firebase'], function () {
<<<<<<< HEAD
<<<<<<< HEAD
=======
    Route::get('/refreshToken', [FirebaseController::class, 'refreshToken'])->name('refreshToken');
>>>>>>> d4d7d73b6e1cc8c8023ace5575307e7e3bc9702e
=======
    Route::get('/refreshToken', [FirebaseController::class, 'refreshToken'])->name('refreshToken');
>>>>>>> 100a138f5f976700e0719b8141930b09e6d6a8c8
    Route::post('/saveToken', [FirebaseController::class, 'saveToken'])->name('saveToken');
});
