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

Route::get('/', function () {
    return view('backend.beranda.index');
});

Route::get('komentar', function () {
    return view('backend.komentar.index');
});

Route::get('pengaturan/mining', function () {
    return view('backend.pengaturan.mining.index');
});

Auth::routes();

// Route::get('/', 'Mining\MiningController@index');

Route::get('/home', 'HomeController@index')->name('home');
