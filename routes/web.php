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

Route::get('/', function () {
    return view('content.home
    ');
});

Route::get('layanan', 'HomeController@layanan');

Route::get('sign_up', 'AuthController@signup');
Route::get('sign_in', 'AuthController@signin')->name('login');

Route::post('sign_up', 'AuthController@proses_signup');
Route::post('sign_in', 'AuthController@proses_signin');

// ajax
Route::get('ajax/find_lokasi', 'AjaxController@find_lokasi');

Route::group(['middleware' => 'auth'], function () {
    Route::get('logout', 'AuthController@logout');
    Route::get('ye', 'AuthController@ye');

    // request ajax
    Route::prefix('ajax')->group(function(){
        Route::get('cari_lokasi', 'AjaxController@cari_lokasi');
        Route::get('cari_pendidikan', 'AjaxController@cari_pendidikan');
        Route::get('cari_jeniskeahlian', 'AjaxController@cari_jeniskeahlian');
        Route::post('popup_pdfsertifikasi', 'AjaxController@popup_pdfsertifikasi');
        Route::put('update_status', 'AjaxController@update_status');
    });

    // yang akses bisa ketiganya
    Route::prefix('akun')->group(function(){
        Route::get('informasi-personal', 'InformasiPersonalController@index');
        Route::put('informasi-personal', 'InformasiPersonalcontroller@update');

        Route::get('informasi-akun', 'InformasiAkunController@index');
        Route::put('informasi-akun', 'InformasiAkunController@update');

    });

    // yang akses hanya admin
    Route::group(['middleware' => ['CekRole:ADMIN']], function() {
        Route::prefix('master')->group(function(){

            // LOKASI
            Route::get('lokasi','Master\LokasiController@index');
            Route::get('lokasi/load', 'Master\LokasiController@load_table');
            Route::post('lokasi', 'Master\LokasiController@store');
            Route::put('lokasi', 'Master\LokasiController@update');
            Route::delete('lokasi', 'Master\LokasiController@destroy');

            // Jenjang Pendidikan
            Route::get('jenjang-pendidikan','Master\JenjangPendidikanController@index');
            Route::get('jenjang-pendidikan/load', 'Master\JenjangPendidikanController@load_table');
            Route::post('jenjang-pendidikan', 'Master\JenjangPendidikanController@store');
            Route::put('jenjang-pendidikan', 'Master\JenjangPendidikanController@update');
            Route::delete('jenjang-pendidikan', 'Master\JenjangPendidikanController@destroy');

            // Kategori jasa
            Route::get('kategori-jasa','Master\KategoriController@index');
            Route::get('kategori-jasa/load', 'Master\KategoriController@load_table');
            Route::post('kategori-jasa', 'Master\KategoriController@store');
            Route::put('kategori-jasa', 'Master\KategoriController@update');
            Route::delete('kategori-jasa', 'Master\KategoriController@destroy');

            // Jenis Keahlian
            Route::get('jenis-keahlian','Master\JenisKeahlianController@index');
            Route::get('jenis-keahlian/load', 'Master\JenisKeahlianController@load_table');
            Route::post('jenis-keahlian', 'Master\JenisKeahlianController@store');
            Route::put('jenis-keahlian', 'Master\JenisKeahlianController@update');
            Route::delete('jenis-keahlian', 'Master\JenisKeahlianController@destroy');
        });

        Route::get('akun/lihat-pengajuan', 'InformasiPersonalController@list_lihatpengajuan');
        Route::get('akun/lihat-pengajuan/load', 'InformasiPersonalController@load_tablepengajuan');
    });

    // yang akses hanya admin dan seller
    Route::group(['middleware' => ['CekRole:ADMIN,SELLER']], function() {
        Route::prefix('seller')->group(function(){

            Route::get('add-layananjasa', 'layananJasaController@add');
            Route::post('add-layananjasa', 'layananJasaController@store');
            Route::get('layananjasa/load', 'layananJasaController@load_table');
            Route::get('layananjasa/isaktif', 'layananJasaController@isaktif');
            Route::get('layananjasa', 'layananJasaController@list');
            Route::delete('layananjasa', 'layananJasaController@destroy');
            Route::get('detail-layananjasa/{slug}', 'layananJasaController@detail');
            Route::put('detail-layananjasa/{slug}', 'layananJasaController@update');
        });
    });

    // yang akses hanya buyer
    Route::group(['middleware' => ['CekRole:BUYER']], function(){
        Route::get('akun/menjadi-penyedia-jasa', 'InformasiPersonalController@list_menjadipenyediajasa');
        Route::put('akun/menjadi-penyedia-jasa', 'InformasiPersonalController@store_menjadipenyediajasa');
    });

});
