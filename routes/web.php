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

Route::middleware(['auth'])->group( function () {

    Route::get('/', 'HomeController@index');

    Route::get('tentang', 'TentangController@indexTentang')->name('tentang');

    Route::name('komentar.')->prefix('komentar')->group( function () {

        Route::get('', 'KomentarController@indexKomentar')->name('index_komentar');
        Route::get('data_komentar', 'KomentarController@dataKomentar')->name('data_komentar');

        Route::get('preproses', 'KomentarController@indexPreprosesKomentar')->name('index_preproses');
        Route::get('data_preproses', 'KomentarController@dataPreprosesKomentar')->name('data_preproses');

        Route::get('klasifikasi', 'KomentarController@indexKlasifikasiKomentar')->name('index_klasifikasi');
        Route::get('data_klasifikasi', 'KomentarController@dataKlasifikasiKomentar')->name('data_klasifikasi');

        Route::get('confusion_matrix', 'KomentarController@indexConfusionMatrix')->name('index_confusion_matrix');
        Route::get('data_confusion_matrix', 'KomentarController@dataConfusionMatrix')->name('data_confusion_matrix');

        Route::name('mining.')->prefix('mining')->namespace('Mining')->group( function () {

            Route::post('klasifikasi', 'MiningController@index')->name('klasifikasi');
        });

        Route::name('kelola.')->prefix('kelola')->group( function () {
            Route::get('tambah', 'KomentarController@tambahKomentar')->name('tambah');
            Route::post('simpan', 'KomentarController@simpanKomentar')->name('simpan');
        });
    });

    Route::get('pengaturan/mining', function () {
        return view('backend.pengaturan.mining.index');
    });

});
