<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\MobilController;
use App\Http\Controllers\RentalController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MasukController;
use App\Models\Admin;
use App\Models\Brand;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/admin', 'App\Http\Controllers\AdminController@index')->name('admin')->middleware('auth');
// Route::get('actionlogout', [AdminController::class, 'actionlogout'])->name('keluar');
Route::get('actionlogout', [MasukController::class, 'actionlogout'])->name('keluar');
// Route::get('/brand', [BrandController::class, 'view', 'index'])->name('brand');


Route::get('', 'App\Http\Controllers\IndexController@index')->name('index');
Route::get('/pesan/{id}', 'App\Http\Controllers\PesanController@index')->name('pesan');
Route::post('/simpan_customer', 'App\Http\Controllers\PesanController@simpan_customer')->name('simpan_customer');
Route::get('/directwa', 'App\Http\Controllers\PesanController@directwa')->name('directwa');


Route::get('login', 'App\Http\Controllers\MasukController@index')->name('login');
Route::post('dashboard', 'App\Http\Controllers\MasukController@actionlogin')->name('actionlogin');

Route::get('/brand', 'App\Http\Controllers\BrandController@view')->name('view');
Route::get('brand', 'App\Http\Controllers\BrandController@index')->name('brand');

//crud Brand
Route::delete('/hapus_brand/{id}', 'App\Http\Controllers\BrandController@hapus_brand')->name('hapus_brand');
Route::post('/brand/simpan_brand', 'App\Http\Controllers\BrandController@simpan_brand')->name('simpan_brand');;
Route::put('/update_brand/{id}', 'App\Http\Controllers\BrandController@update_brand')->name('update_brand');

//crud Mobil
Route::get('/mobil', [MobilController::class, 'index'])->name('mobil');
Route::delete('/hapus_mobil/{id}', 'App\Http\Controllers\MobilController@hapus_mobil')->name('hapus_mobil');
Route::post('/mobil/simpan_mobil', 'App\Http\Controllers\MobilController@simpan_mobil');
Route::put('/update_mobil/{id}', 'App\Http\Controllers\MobilController@update_mobil')->name('update_mobil');

//crud Rental
Route::get('/rental', [RentalController::class, 'index'])->name('rental');
Route::get('/rental/cetak_pdf', [RentalController::class, 'cetak_pdf'])->name('cetak_pdf');
Route::delete('/hapus_rental/{id}', 'App\Http\Controllers\RentalController@hapus_rental')->name('hapus_rental');
Route::post('/rental/simpan_rental', 'App\Http\Controllers\RentalController@simpan_rental');
Route::put('/update_rental/{id}', 'App\Http\Controllers\RentalController@update_rental')->name('update_rental');


Route::put('/brand/update', 'App\Http\Controllers\BrandController@store')->name('brand.store');
// Route::resource('brand', 'BrandController');
// Auth::routes();