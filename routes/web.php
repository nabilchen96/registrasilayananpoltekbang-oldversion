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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


//layanan
Route::get('layanan','LayananController@index');
Route::post('prosesdaftarlayanan','LayananController@prosesdaftarlayanan');
Route::get('datalayanan', function(){
    return view('ajax');
});

//penyewaan
Route::get('penyewaan','PenyewaanController@index');
Route::get('prosesdaftarpenyewaan','PenyewaanController@prosesdaftarpenyewaan');



Route::get('peserta','PesertaController@index');
Route::get('tambahpeserta','PesertaController@tambahpeserta');
Route::post('prosestambahpeserta', 'PesertaController@prosestambahpeserta');



//tagihan
Route::get('tagihan','TagihanController@index');
Route::get('detailtagihan/{id}','TagihanController@detailtagihan');

//email
Route::get('emailtagihan/{id}','TagihanController@kirimtagihan');

