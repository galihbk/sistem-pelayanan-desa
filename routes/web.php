<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/tentang', [HomeController::class, 'tentang'])->name('home.tentang');
Route::get('/sejarah', [HomeController::class, 'sejarah'])->name('home.sejarah');
Route::get('/pengantar-ktp', [HomeController::class, 'pengantarKTP'])->name('home.pengantar-ktp');
Route::get('/pengantar-nikah', [HomeController::class, 'pengantarNikah'])->name('home.pengantar-nikah');
Route::post('/cek-nik', [HomeController::class, 'cekNIK'])->name('home.cek-nik');
Route::post('/upload-pengajuan/{jenis}', [HomeController::class, 'uploadPengajuan'])->name('home.upload-pengajuan');

Route::middleware('guest')->group(function () {
    Route::get('admin-panel', [AuthController::class, 'index'])->name('admin.login');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
    Route::get('/keluarga', [AdminController::class, 'keluarga'])->name('keluarga');
    Route::get('/penduduk', [AdminController::class, 'penduduk'])->name('penduduk');
    Route::get('/tambah-data/{jenis}', [AdminController::class, 'tambahData'])->name('tambah-data');
    Route::post('/proses-add/{jenis}', [AdminController::class, 'prosesAdd'])->name('proses-add');
    Route::get('/get-kk', [AdminController::class, 'getKK'])->name('get-kk');
    Route::get('/get-penduduk', [AdminController::class, 'getPenduduk'])->name('get-penduduk');
    Route::get('/pengantar-ktp', [AdminController::class, 'pengantarKTP'])->name('home.pengantar-ktp');
    Route::get('/pengajuan/{jenis}', [AdminController::class, 'getPengajuan'])->name('pengajuan');
});

require __DIR__ . '/auth.php';
