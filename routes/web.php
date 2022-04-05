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


Route::prefix('/admin')->namespace('Admin')->name('')->middleware('auth')->group(function(){
	Route::get('/','DashboardController@index')->name('admin');
	Route::resource('/kategori','KategoriController');	
	Route::resource('/kandang','KandangController');	
	Route::resource('/suplier','SuplierController');	
	Route::resource('/pelanggan','PelangganController');	
	Route::resource('/kandang_detail','KandangDetailController');	
	Route::put('/panen/{id}','KandangDetailController@panen')->name('panen');	
	Route::resource('/ayam_cek','AyamCekController');	
	Route::resource('/order','OrderController');	
	Route::resource('/user','UserController');	
});

Route::namespace('Admin')->group(function(){
	Route::get('/','AuthController@index')->name('login');
	Route::post('/login','AuthController@loginProses')->name('login-proses');
	Route::post('/logout','AuthController@logout')->name('logout');
	Route::get('/register','AuthController@register')->name('register');
	Route::post('/register','AuthController@register_proses')->name('register_proses');
});
