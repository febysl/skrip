<?php

use App\Http\Controllers\DataController;
use App\Http\Controllers\FieldsSuratController;
use App\Http\Controllers\PengajuanControler;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SuratMasukController;
use App\Http\Middleware\Admin;
use Illuminate\Support\Facades\Route;

require __DIR__ . '/auth.php';

Route::get('/', function () {
    return view('welcome');
});
Route::get('/jenis', [DataController::class, 'jenis'])->name('data.jenis');
Route::get('/suratMasuk', [SuratMasukController::class, 'suratMasuk'])->name('surat.suratMasuk');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/pelayanan', [PengajuanControler::class, 'pelayanan'])->name('pengajuan.pelayanan');
    // Route::get('/pelayanan', [DataController::class, 'create'])->name('data.create');
    Route::post('/pelayanan', [PengajuanControler::class, 'store'])->name('pengajuan.store');
    Route::get('/status', [PengajuanControler::class, 'status'])->name('pengajuan.status');
    
    Route::middleware([Admin::class])->group(function() {
        Route::get('/admin', [PengajuanControler::class, 'admin'])->name('pengajuan.admin');
        Route::get('/data', [DataController::class, 'data'])->name('data.data');
        Route::post('/data', [DataController::class, 'store'])->name('data.store');

        // kelola surat pengajuan
        Route::get('/kelolaSurat', [PengajuanControler::class, 'kelolaSurat'])->name('pengajuan.kelolaSurat');
        Route::put('/kelolaSurat/{id}', [PengajuanControler::class, 'update'])->name('pengajuan.update');
        Route::put('/kelolaSurat/{id}/upload_completed_file', [PengajuanControler::class, 'upload_completed_file'])->name('pengajuan.upload_completed_file');
    
        // kelola surat masuk
        Route::get('/kelolaSuratMasuk', [SuratMasukController::class, 'kelolaSuratMasuk'])->name('surat.kelolaSuratMasuk');
        Route::post('/kelolaSuratMasuk', [SuratMasukController::class, 'store'])->name('surat.store');
        Route::put('/kelolaSuratMasuk/{id}', [SuratMasukController::class, 'update'])->name('surat.update');
        Route::delete('/kelolaSuratMasuk/{id}', [SuratMasukController::class, 'destroy'])->name('surat.destroy');
    
        // jenis surat
        Route::delete('/data/{id}', [DataController::class, 'destroy'])->name('data.destroy');
        Route::put('/data/{id}', [DataController::class, 'update'])->name('data.update');

        // fields surat
        Route::get('/fields/create', [FieldsSuratController::class, 'create'])->name('fields.create');
        Route::post('/fields/create', [FieldsSuratController::class, 'store'])->name('fields.store');
        Route::get('/fields/{id}/edit', [FieldsSuratController::class, 'edit'])->name('fields.edit');
        Route::put('/fields/{id}/edit', [FieldsSuratController::class, 'update'])->name('fields.update');
    });
});


// Route::get('/admin', [PengajuanControler::class, 'admin'])->middleware(['auth', 'admin']);
// // Route::get('/admin', [DataController::class, 'index'])->name('data.index');
// Route::get('/data', [DataController::class, 'data'])->name('data.data');
// Route::post('/data', [DataController::class, 'store'])->name('data.store');
// Route::get('/kelolaSurat', [PengajuanControler::class, 'kelolaSurat'])->name('pengajuan.kelolaSurat');
// Route::get('/kelolaSuratMasuk', [SuratMasukController::class, 'kelolaSuratMasuk'])->name('surat.kelolaSuratMasuk');
// Route::post('/kelolaSuratMasuk', [SuratMasukController::class, 'store'])->name('surat.store');
// Route::put('/kelolaSuratMasuk/{id}', [SuratMasukController::class, 'update'])->name('surat.update');
// Route::delete('/kelolaSuratMasuk/{id}', [SuratMasukController::class, 'destroy'])->name('surat.destroy');
// Route::delete('/data/{id}', [DataController::class, 'destroy'])->name('data.destroy');
// Route::put('/data/{id}', [DataController::class, 'update'])->name('data.update');
