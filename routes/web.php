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

Auth::routes();

Route::get('/', 'HomeController@index');

Route::name('komentar.')->prefix('komentar')->group( function () {

    Route::get('', 'KomentarController@indexKomentar')->name('index_komentar');
    Route::get('data_komentar', 'KomentarController@dataKomentar')->name('data_komentar');

    Route::get('preproses', 'KomentarController@indexPreprosesKomentar')->name('index_preproses');
    Route::get('data_preproses', 'KomentarController@dataPreprosesKomentar')->name('data_preproses');

    Route::get('klasifikasi', 'KomentarController@indexKlasifikasiKomentar')->name('index_klasifikasi');
    Route::get('data_klasifikasi', 'KomentarController@dataKlasifikasiKomentar')->name('data_klasifikasi');

    Route::name('mining.')->prefix('mining')->namespace('Mining')->group( function () {

        Route::post('klasifikasi', 'MiningController@index')->name('klasifikasi');
    });
});

Route::get('pengaturan/mining', function () {
    return view('backend.pengaturan.mining.index');
});

Route::get('/home', 'HomeController@index')->name('home');
