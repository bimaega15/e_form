<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix('master')->group(function () {
    Route::get('/', 'MasterController@index');


    // Route::group(['prefix' => 'settings'], function () {
    //     Route::get('/', 'SettingsController@index')->name('master.settings.index');
    //     Route::get('/create', 'SettingsController@create')->name('master.settings.create');
    //     Route::post('/', 'SettingsController@store')->name('master.settings.store');
    //     Route::get('/{id}/edit', 'SettingsController@edit')->name('master.settings.edit');
    //     Route::put('/{id}', 'SettingsController@update')->name('master.settings.update');
    //     Route::delete('/{id}', 'SettingsController@destroy')->name('master.settings.destroy');
    //     Route::get('/checkData', 'SettingsController@checkData')->name('master.settings.checkData');
    // });

    Route::group(['prefix' => 'dataStatis'], function () {
        Route::get('/', 'DataStatisController@index')->name('master.dataStatis.index');
        Route::get('/create', 'DataStatisController@create')->name('master.dataStatis.create');
        Route::post('/', 'DataStatisController@store')->name('master.dataStatis.store');
        Route::get('/{id}/edit', 'DataStatisController@edit')->name('master.dataStatis.edit');
        Route::put('/{id}', 'DataStatisController@update')->name('master.dataStatis.update');
        Route::delete('/{id}', 'DataStatisController@destroy')->name('master.dataStatis.destroy');
        Route::get('/parentStatis', 'DataStatisController@parentStatis')->name('master.dataStatis.parentStatis');
        Route::get('/migrasi', 'DataStatisController@migrasi')->name('master.dataStatis.migrasi');
    });

    Route::group(['prefix' => 'menu'], function () {
        Route::get('/', 'MenuController@index')->name('master.menu.index');
        Route::get('/create', 'MenuController@create')->name('master.menu.create');
        Route::post('/', 'MenuController@store')->name('master.menu.store');
        Route::get('/{id}/edit', 'MenuController@edit')->name('master.menu.edit');
        Route::put('/{id}', 'MenuController@update')->name('master.menu.update');
        Route::delete('/{id}', 'MenuController@destroy')->name('master.menu.destroy');
        Route::get('/renderTree', 'MenuController@renderTree')->name('master.menu.renderTree');
        Route::get('/dataTable', 'MenuController@dataTable')->name('master.menu.dataTable');
        Route::get('/sortAndNested', 'MenuController@sortAndNested')->name('master.menu.sortAndNested');
    });

    Route::group(['prefix' => 'categoryOffice'], function () {
        Route::get('/', 'CategoryOfficeController@index')->name('master.categoryOffice.index');
        Route::get('/create', 'CategoryOfficeController@create')->name('master.categoryOffice.create');
        Route::post('/', 'CategoryOfficeController@store')->name('master.categoryOffice.store');
        Route::get('/{id}/edit', 'CategoryOfficeController@edit')->name('master.categoryOffice.edit');
        Route::get('/{id}', 'CategoryOfficeController@show')->name('master.categoryOffice.show');
        Route::put('/{id}', 'CategoryOfficeController@update')->name('master.categoryOffice.update');
        Route::delete('/{id}', 'CategoryOfficeController@destroy')->name('master.categoryOffice.destroy');
    });

    Route::group(['prefix' => 'unit'], function () {
        Route::get('/', 'UnitController@index')->name('master.unit.index');
        Route::get('/create', 'UnitController@create')->name('master.unit.create');
        Route::post('/', 'UnitController@store')->name('master.unit.store');
        Route::get('/{id}/edit', 'UnitController@edit')->name('master.unit.edit');
        Route::get('/{id}', 'UnitController@show')->name('master.unit.show');
        Route::put('/{id}', 'UnitController@update')->name('master.unit.update');
        Route::delete('/{id}', 'UnitController@destroy')->name('master.unit.destroy');
    });

    Route::group(['prefix' => 'jabatan'], function () {
        Route::get('/', 'JabatanController@index')->name('master.jabatan.index');
        Route::get('/create', 'JabatanController@create')->name('master.jabatan.create');
        Route::post('/', 'JabatanController@store')->name('master.jabatan.store');
        Route::get('/{id}/edit', 'JabatanController@edit')->name('master.jabatan.edit');
        Route::get('/{id}', 'JabatanController@show')->name('master.jabatan.show');
        Route::put('/{id}', 'JabatanController@update')->name('master.jabatan.update');
        Route::delete('/{id}', 'JabatanController@destroy')->name('master.jabatan.destroy');
    });


    Route::group(['prefix' => 'typeProduct'], function () {
        Route::get('/', 'TypeProductController@index')->name('master.typeProduct.index');
        Route::get('/create', 'TypeProductController@create')->name('master.typeProduct.create');
        Route::post('/', 'TypeProductController@store')->name('master.typeProduct.store');
        Route::get('/{id}/edit', 'TypeProductController@edit')->name('master.typeProduct.edit');
        Route::get('/{id}', 'TypeProductController@show')->name('master.typeProduct.show');
        Route::put('/{id}', 'TypeProductController@update')->name('master.typeProduct.update');
        Route::delete('/{id}', 'TypeProductController@destroy')->name('master.typeProduct.destroy');
    });

    Route::group(['prefix' => 'product'], function () {
        Route::get('/getAutoCode', 'ProductController@getAutoCode')->name('master.product.getAutoCode');
        Route::get('/', 'ProductController@index')->name('master.product.index');
        Route::get('/create', 'ProductController@create')->name('master.product.create');
        Route::post('/', 'ProductController@store')->name('master.product.store');
        Route::get('/{id}/edit', 'ProductController@edit')->name('master.product.edit');
        Route::get('/{id}', 'ProductController@show')->name('master.product.show');
        Route::put('/{id}', 'ProductController@update')->name('master.product.update');
        Route::delete('/{id}', 'ProductController@destroy')->name('master.product.destroy');
    });

    Route::group(['prefix' => 'metodePembayaran'], function () {
        Route::get('/', 'MetodePembayaranController@index')->name('master.metodePembayaran.index');
        Route::get('/create', 'MetodePembayaranController@create')->name('master.metodePembayaran.create');
        Route::post('/', 'MetodePembayaranController@store')->name('master.metodePembayaran.store');
        Route::get('/{id}/edit', 'MetodePembayaranController@edit')->name('master.metodePembayaran.edit');
        Route::get('/{id}', 'MetodePembayaranController@show')->name('master.metodePembayaran.show');
        Route::put('/{id}', 'MetodePembayaranController@update')->name('master.metodePembayaran.update');
        Route::delete('/{id}', 'MetodePembayaranController@destroy')->name('master.metodePembayaran.destroy');
    });

    Route::group(['prefix' => 'notes'], function () {
        Route::get('/', 'NoteController@index')->name('master.notes.index');
        Route::get('/create', 'NoteController@create')->name('master.notes.create');
        Route::post('/', 'NoteController@store')->name('master.notes.store');
        Route::get('/{id}/edit', 'NoteController@edit')->name('master.notes.edit');
        Route::put('/{id}', 'NoteController@update')->name('master.notes.update');
        Route::delete('/{id}', 'NoteController@destroy')->name('master.notes.destroy');
    });
});
