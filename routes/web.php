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
Route::get('/layanan', [HomeController::class, 'layanan'])->name('home.layanan');
Route::get('/sktm', [HomeController::class, 'sktm'])->name('pengajuan.sktm');
Route::get('/sik', [HomeController::class, 'sik'])->name('pengajuan.sik');
Route::get('/skdtt', [HomeController::class, 'skdtt'])->name('pengajuan.skdtt');
Route::get('/skdu', [HomeController::class, 'skdu'])->name('pengajuan.skdu');
Route::get('/sku', [HomeController::class, 'sku'])->name('pengajuan.sku');
Route::get('/skus', [HomeController::class, 'skus'])->name('pengajuan.skus');
Route::get('/skck', [HomeController::class, 'skck'])->name('pengajuan.skck');
Route::get('/skk', [HomeController::class, 'skk'])->name('pengajuan.skk');
Route::get('/skke', [HomeController::class, 'skke'])->name('pengajuan.skke');

Route::middleware('guest')->group(function () {
    Route::get('admin-panel', [AuthController::class, 'index'])->name('admin.login');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
    Route::get('/keluarga', [AdminController::class, 'keluarga'])->name('keluarga');
    Route::post('/kk/store', [AdminController::class, 'storeKK'])->name('kk.store');
    Route::post('/penduduk/store', [AdminController::class, 'storePenduduk'])->name('penduduk.store');
    Route::get('/kk/data', [AdminController::class, 'getDataKK'])->name('kk.data');
    Route::get('/kk/autocomplete', [AdminController::class, 'autocomplete'])->name('kk.autocomplete');
    Route::get('/penduduk/data', [AdminController::class, 'getDataPenduduk'])->name('penduduk.data');
    Route::get('/penduduk', [AdminController::class, 'penduduk'])->name('penduduk');
    Route::get('/pengajuan', [AdminController::class, 'penduduk'])->name('pengajuan.layanan');

    Route::get('/get-penduduk', [AdminController::class, 'getPenduduk'])->name('get-penduduk');
    Route::get('/pengantar-ktp', [AdminController::class, 'pengantarKTP'])->name('home.pengantar-ktp');
    Route::get('/pengajuan/{jenis}', [AdminController::class, 'getPengajuan'])->name('pengajuan');
    Route::get('/export_excell/kk', [AdminController::class, 'exportExcellKK'])->name('export_excell/kk');
});

require __DIR__ . '/auth.php';
