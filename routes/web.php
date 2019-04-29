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

Route::get('/',function(){
    return view('app/index');
});

Route::get('/perhitungan/buat','PerhitunganController@create')->name('perhitungan.buat');
Route::post('/perhitungan/store','PerhitunganController@store');
Route::get('/perhitungan/show/{id}/','PerhitunganController@lihat')->name('perhitungan.show');
Route::get('/perhitungan/saved','PerhitunganController@saved')->name('perhitungan.saved');
Route::post('/perhitungan/ahp/hitung','PerhitunganController@hitung');