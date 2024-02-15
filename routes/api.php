<?php

use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\Auth\ProfileController;
use App\Http\Controllers\Api\Dashboard\TransaksiController;
use App\Http\Controllers\Api\Product\ProductController;
use App\Http\Controllers\Api\Settings\SettingsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/login', [LoginController::class, 'index'])->name('login.index');

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::put('/profile/{id}', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/profile/{id}/updateImage', [ProfileController::class, 'updateImage'])->name('profile.updateImage');
    Route::put('/profile/{id}/updatePassword', [ProfileController::class, 'updatePassword'])->name('profile.updatePassword');

    Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi.index');
    Route::get('/transaksi/paginate', [TransaksiController::class, 'getPaginate'])->name('transaksi.paginate');
    Route::get('/transaksi/static', [TransaksiController::class, 'static'])->name('transaksi.static');
    Route::get('/transaksi/{id}/edit', [TransaksiController::class, 'edit'])->name('transaksi.edit');
    Route::post('/transaksi', [TransaksiController::class, 'store'])->name('transaksi.store');
    Route::put('/transaksi/{id}/update', [TransaksiController::class, 'update'])->name('transaksi.update');
    Route::delete('/transaksi/{id}/destroy', [TransaksiController::class, 'destroy'])->name('transaksi.destroy');

    Route::get('/transaksi/{id}/viewApproval', [TransaksiController::class, 'viewApproval'])->name('transaksi.viewApproval');
    Route::get('/transaksi/{id}/viewHistory', [TransaksiController::class, 'viewHistory'])->name('transaksi.viewHistory');
    Route::post('/transaksi/forwardApproval', [TransaksiController::class, 'forwardApproval'])->name('transaksi.forwardApproval');
    Route::post('/transaksi/finishApproval', [TransaksiController::class, 'finishApproval'])->name('transaksi.finishApproval');


    Route::get('/produk', [ProductController::class, 'index'])->name('produk.index');
    Route::get('/setting/users/getUsersProfile', [SettingsController::class, 'getUsersProfile'])->name('settings.users.getUsersProfile');

});
