<?php

use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DivisiController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\KeteranganController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
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

Route::get('/', function () {
    return view('login.index');
});

// route login
Route::get('/login', [LoginController::class, 'index'])->name('login.index');
Route::get('/postlogin', [LoginController::class, 'postlogin'])->name('postlogin');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

// route register
Route::get('/register', [RegisterController::class, 'index'])->name('register.index');
Route::post('/simpanregister', [RegisterController::class, 'simpanregister'])->name('simpanregister');

Route::group(['middleware' => ['auth', 'ceklevel:karyawan']], function () {

// route absensi
Route::get('/absensi/masuk', [AbsensiController::class, 'masuk'])->name('absensi.masuk');
Route::post('/absensi/store',[AbsensiController::class,'store'])->name('absensi.store');
Route::get('/absensi/keluar', [AbsensiController::class, 'keluar'])->name('absensi.keluar');
Route::post('ubah-absensi',[AbsensiController::class,'absensiKeluar'])->name('ubah-absensi');









// route divisi
// Route::get('/divisi', [DivisiController::class, 'index'])->name('divisi.index');
// Route::get('/divisi/create', [DivisiController::class, 'create'])->name('divisi.create');
// Route::post('/divisi/store', [DivisiController::class, 'store'])->name('divisi.store');
// Route::get('/divisi/edit/{id}', [DivisiController::class, 'edit'])->name('divisi.edit');
// Route::put('/divisi/update/{id}', [DivisiController::class, 'update'])->name('divisi.update');
// Route::delete('/divisi/delete/{id}', [DivisiController::class, 'destroy'])->name('divisi.destroy');

});

Route::group(['middleware' => ['auth', 'ceklevel:admin,karyawan']], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    // route absensi
Route::get('/absensi', [AbsensiController::class, 'index'])->name('absensi.index');
Route::get('/absensi/create', [AbsensiController::class, 'create'])->name('absensi.create');
// Route::post('/absensi/store', [absensiController::class, 'store'])->name('absensi.store');
Route::get('/absensi/edit/{id}', [AbsensiController::class, 'edit'])->name('absensi.edit');
Route::put('/absensi/update/{id}', [AbsensiController::class, 'update'])->name('absensi.update');
Route::delete('/absensi/delete/{id}', [AbsensiController::class, 'destroy'])->name('absensi.destroy');

    // route karyawan
    Route::get('/karyawan', [KaryawanController::class, 'index'])->name('karyawan.index');
    Route::get('/karyawan/create', [KaryawanController::class, 'create'])->name('karyawan.create');
    Route::post('/karyawan/store', [KaryawanController::class, 'store'])->name('karyawan.store');
    Route::get('/karyawan/edit/{id}', [KaryawanController::class, 'edit'])->name('karyawan.edit');
    Route::put('/karyawan/update/{id}', [KaryawanController::class, 'update'])->name('karyawan.update');
    Route::delete('/karyawan/delete/{id}', [KaryawanController::class, 'destroy'])->name('karyawan.destroy');

// route keterangan
Route::get('/keterangan', [KeteranganController::class, 'index'])->name('keterangan.index');
Route::get('/keterangan/create', [KeteranganController::class, 'create'])->name('keterangan.create');
Route::post('/keterangan/store', [KeteranganController::class, 'store'])->name('keterangan.store');
Route::get('/keterangan/edit/{id}', [KeteranganController::class, 'edit'])->name('keterangan.edit');
Route::put('/keterangan/update/{id}', [KeteranganController::class, 'update'])->name('keterangan.update');
Route::delete('/keterangan/delete/{id}', [KeteranganController::class, 'destroy'])->name('keterangan.destroy');

});
