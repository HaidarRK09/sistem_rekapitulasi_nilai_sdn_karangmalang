<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\SesiController;
use App\Http\Controllers\WaliKelasController;
use Illuminate\Support\Facades\Route;

// Route untuk login dan logout
Route::middleware(['guest'])->group(function () {
    Route::get('/', [SesiController::class, 'index'])->name('login');
    Route::post('/', [SesiController::class, 'login']);
});

// Route untuk logout
Route::get('logout', [SesiController::class, 'logout']);

// Halaman utama setelah login
Route::get('/home', function () {
    return redirect('/admin');
});

// Route yang memerlukan autentikasi
Route::middleware(['auth'])->group(function () {
    // Admin Dashboard
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');

    // Wali Kelas
    Route::get('/admin/walikelas/siswa', [WaliKelasController::class, 'index'])->name('walikelas.index');
    Route::get('/admin/walikelas/siswa/create', [WaliKelasController::class, 'create'])->name('walikelas.create');
    Route::post('/admin/walikelas/siswa', [WaliKelasController::class, 'store'])->name('walikelas.store');
    Route::get('/admin/walikelas/siswa/{id}', [WaliKelasController::class, 'show'])->name('walikelas.show');
    Route::get('/admin/walikelas/siswa/{id}/edit', [WaliKelasController::class, 'edit'])->name('walikelas.edit');
    Route::put('/admin/walikelas/siswa/{id}', [WaliKelasController::class, 'update'])->name('walikelas.update');
    Route::delete('/admin/walikelas/siswa/{id}', [WaliKelasController::class, 'destroy'])->name('walikelas.destroy');
    Route::get('/admin/walikelas/siswa/{id}/nilai', [WaliKelasController::class, 'nilai'])->name('walikelas.nilai');
    Route::post('/admin/walikelas/siswa/{id}/nilai', [WaliKelasController::class, 'storeNilai'])->name('walikelas.storeNilai');

    // Siswa
    Route::get('/admin/siswa', [AdminController::class, 'siswa'])->name('admin.siswa');

    // Route untuk Guru
    Route::get('/admin/guru/create', [AdminController::class, 'createGuru'])->name('admin.guru.create');
    Route::post('/admin/guru', [AdminController::class, 'storeGuru'])->name('admin.guru.store');
    
    // Route untuk Mata Pelajaran
    Route::get('/admin/mapel/create', [AdminController::class, 'createMapel'])->name('admin.mapel.create');
    Route::post('/admin/mapel', [AdminController::class, 'storeMapel'])->name('admin.mapel.store');
});
