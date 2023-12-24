<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\MyProfileController;
use App\Http\Controllers\TransaksiController;
use Illuminate\Support\Facades\Route;

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


Route::middleware('auth')->group(function () {
});
Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
require __DIR__ . '/auth.php';

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
Route::get('laporan/{id}/generatePdf', [LaporanController::class, 'generatePdf'])->name('laporan.generatePdf');
