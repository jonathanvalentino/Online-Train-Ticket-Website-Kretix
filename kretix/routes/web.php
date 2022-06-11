<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    return view('home');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('index');
Route::post('/saran',[App\Http\Controllers\MailController::class, 'index'])->name('index');
Route::post('/pencarian', [App\Http\Controllers\PencarianController::class, 'index'])->name('index');

Route::get('/tentang', function () {
    return view('tentang');
});

Route::get('/pencariannav', [App\Http\Controllers\HomeController::class, 'pencariannav'])->name('pencariannav');
Route::get('/daftarpemesanan', [App\Http\Controllers\DaftarPemesananController::class, 'index'])->name('index');

Route::post('/detail',[App\Http\Controllers\DetailController::class, 'index'])->name('index');

Route::post('/pemesanan',[App\Http\Controllers\PemesananController::class, 'index'])->name('index');
Route::post('/bayar',[App\Http\Controllers\PemesananController::class, 'buatpesan'])->name('buatpesan');
Route::get('/tiketku', [App\Http\Controllers\TiketkuController::class, 'index'])->name('index');

Route::post('/ubahsandi', [App\Http\Controllers\ProfileController::class, 'ubahsandi'])->name('ubahsandi');
Route::post('/ubahnama', [App\Http\Controllers\ProfileController::class, 'ubahnama'])->name('ubahnama');
Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('index');
Route::post('/ubahfoto', [App\Http\Controllers\ProfileController::class, 'ubahfoto'])->name('ubahfoto');

Route::get('/invoice', function () {
    return view('invoice');
});
Route::get('/invoice/{id}', [App\Http\Controllers\InvoiceController::class, 'invoice'])->name('invoice');
//Rute admin
Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('index');
Route::get('/daftartiket', [App\Http\Controllers\AdminController::class, 'index'])->name('index');


Route::get('/tambah', [App\Http\Controllers\AdminController::class, 'tambah'])->name('tambah');
Route::get('/tambahekonomi', [App\Http\Controllers\AdminController::class, 'tambahekonomi'])->name('tambahekonomi');
Route::get('/tambahbisnis', [App\Http\Controllers\AdminController::class, 'tambahbisnis'])->name('tambahbisnis');
Route::get('/tambaheksekutif', [App\Http\Controllers\AdminController::class, 'tambaheksekutif'])->name('tambaheksekutif');

Route::post('/uploadekonomi', [App\Http\Controllers\AdminController::class, 'uploadtiket'])->name('uploadtiket');
Route::post('/uploadbisnis', [App\Http\Controllers\AdminController::class, 'uploadtiket'])->name('uploadtiket');
Route::post('/uploadeksekutif', [App\Http\Controllers\AdminController::class, 'uploadtiket'])->name('uploadtiket');
Route::post('/ubahtiket/{id}', [App\Http\Controllers\AdminController::class, 'ubahtiket'])->name('ubahtiket');

Route::get('/hapustiket/{id}', [App\Http\Controllers\AdminController::class, 'hapustiket'])->name('hapustiket');

// Route untuk ke CRUD user
Route::get('/daftaruser', [App\Http\Controllers\AdminController::class, 'daftaruser'])->name('daftaruser');
Route::post('/ubahuser', [App\Http\Controllers\AdminController::class, 'ubahuser'])->name('ubahuser');
Route::get('/hapususer/{id}', [App\Http\Controllers\AdminController::class, 'hapususer'])->name('hapususer');