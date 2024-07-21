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

Route::prefix('setting')->middleware('auth')->group(function () {
    Route::get('/', 'SettingController@index');

    Route::group(['prefix' => 'settings'], function () {
        Route::get('/', 'SettingsController@index')->name('setting.settings.index');
        Route::get('/create', 'SettingsController@create')->name('setting.settings.create');
        Route::post('/', 'SettingsController@store')->name('setting.settings.store');
        Route::get('/{id}/edit', 'SettingsController@edit')->name('setting.settings.edit');
        Route::put('/{id}', 'SettingsController@update')->name('setting.settings.update');
        Route::delete('/{id}', 'SettingsController@destroy')->name('setting.settings.destroy');
        Route::get('/checkData', 'SettingsController@checkData')->name('setting.settings.checkData');
    });

    Route::group(['prefix' => 'roles'], function () {
        Route::get('/', 'RolesController@index')->name('setting.roles.index');
        Route::get('/create', 'RolesController@create')->name('setting.roles.create');
        Route::post('/', 'RolesController@store')->name('setting.roles.store');
        Route::get('/{id}/edit', 'RolesController@edit')->name('setting.roles.edit');
        Route::get('/{id}', 'RolesController@show')->name('setting.roles.show');
        Route::put('/{id}', 'RolesController@update')->name('setting.roles.update');
        Route::delete('/{id}', 'RolesController@destroy')->name('setting.roles.destroy');
    });

    Route::group(['prefix' => 'permissions'], function () {
        Route::get('/', 'PermissionsController@index')->name('setting.permissions.index');
        Route::get('/create', 'PermissionsController@create')->name('setting.permissions.create');
        Route::post('/', 'PermissionsController@store')->name('setting.permissions.store');
        Route::get('/{id}/edit', 'PermissionsController@edit')->name('setting.permissions.edit');
        Route::put('/{id}', 'PermissionsController@update')->name('setting.permissions.update');
        Route::delete('/{id}', 'PermissionsController@destroy')->name('setting.permissions.destroy');
    });

    Route::group(['prefix' => 'assignRoles'], function () {
        Route::get('/', 'AssignRolesController@index')->name('setting.assignRoles.index');
        Route::get('/create', 'AssignRolesController@create')->name('setting.assignRoles.create');
        Route::post('/', 'AssignRolesController@store')->name('setting.assignRoles.store');
        Route::get('/{id}/edit', 'AssignRolesController@edit')->name('setting.assignRoles.edit');
        Route::put('/{id}', 'AssignRolesController@update')->name('setting.assignRoles.update');
        Route::delete('/{id}', 'AssignRolesController@destroy')->name('setting.assignRoles.destroy');
    });

    Route::group(['prefix' => 'users'], function () {
        Route::get('/', 'UsersController@index')->name('setting.users.index');
        Route::get('/create', 'UsersController@create')->name('setting.users.create');
        Route::post('/', 'UsersController@store')->name('setting.users.store');
        Route::get('/{id}/edit', 'UsersController@edit')->name('setting.users.edit');
        Route::put('/{id}', 'UsersController@update')->name('setting.users.update');
        Route::delete('/{id}', 'UsersController@destroy')->name('setting.users.destroy');
        Route::get('/getUsersProfile', 'UsersController@getUsersProfile')->name('setting.users.getUsersProfile');
        Route::get('/getUsersIdProfile/{id}/usersId', 'UsersController@getUsersIdProfile')->name('setting.users.getUsersIdProfile');
    });

    Route::group(['prefix' => 'access'], function () {
        Route::get('/', 'AccessController@index')->name('setting.access.index');
        Route::get('/create', 'AccessController@create')->name('setting.access.create');
        Route::post('/', 'AccessController@store')->name('setting.access.store');
        Route::get('/{id}/edit', 'AccessController@edit')->name('setting.access.edit');
        Route::put('/{id}', 'AccessController@update')->name('setting.access.update');
        Route::delete('/{id}', 'AccessController@destroy')->name('setting.access.destroy');
    });
});
