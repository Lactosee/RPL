<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/info', 'PagesController@info');

// page search ktp route
Route::get('/', 'PagesController@home');

// page bantuan
Route::get('/bantuan', 'PagesController@bantuan');

// page login-admin route
Route::get('/login-admin', 'AuthController@login')->name('login');
Route::post('/postlogin', 'AuthController@postlogin');

// log out
Route::get('/logout', 'AuthController@logout');

Route::group(['middleware' => 'auth'], function () {

    // dashboard
    // page dashboard profil
    Route::get('/dashboard-profil', 'DashboardController@profil');

    Route::get('/{id}/editprofil', 'DashboardController@editprofil');
    Route::post('/{id}/updateprofil', 'DashboardController@updateprofil');

    // Page dashboard all
    Route::get('/dashboard-all', 'DashboardController@all');

    // page dahsboard proses
    Route::get('/dashboard-process', 'DashboardController@process');

    // page dashboard selesai
    Route::get('/dashboard-done', 'DashboardController@done');

    // page dashboard tambah data
    Route::get('/tambah-ektp', 'DashboardController@tambah');
    Route::post('/dashboard-all', 'DashboardController@store');

    // page dashboard edit data
    Route::get('/{id}/edit', 'DashboardController@edit');

    // Mengupdate data dari edit
    Route::post('/{id}/update', 'DashboardController@update');

    // mendelete data
    Route::get('/{id}/delete', 'DashboardController@delete');

});
