<?php

use App\Http\Controllers\AdmincController;
use App\Http\Controllers\SesiController;
use App\Http\Controllers\WaliKelasController;
use App\Http\Controllers\SiswaController; // Controller untuk Siswa jika diperlukan
use Illuminate\Support\Facades\Route;

// Route untuk guest (belum login)
Route::middleware(['guest'])->group(function () {
    // Halaman login
    Route::get('/', [SesiController::class, 'index'])->name('login');
    // Proses login
    Route::post('/login', [SesiController::class, 'login'])->name('login.process');
});

// Route setelah login, menuju dashboard
Route::get('/home', function () {
    return redirect('/admin');
});

// Route untuk user yang sudah login
Route::middleware(['auth'])->group(function () {

    // Admin Routes
    Route::middleware(['role:admin'])->group(function () {
        Route::get('/admin', [AdmincController::class, 'index']); // Dashboard Admin
        Route::get('/admin/siswa', [AdmincController::class, 'siswa']); // Kelola Siswa
        Route::get('/admin/guru', [AdmincController::class, 'guru']); // Kelola Guru
        // Menambahkan route untuk Wali Kelas
        Route::get('/admin/walikelas/siswa', [WaliKelasController::class, 'index'])->name('walikelas.index');
        Route::get('/admin/walikelas/siswa/create', [WaliKelasController::class, 'create'])->name('walikelas.create');
        Route::post('/admin/walikelas/siswa', [WaliKelasController::class, 'store'])->name('walikelas.store');
        Route::get('/admin/walikelas/siswa/{id}', [WaliKelasController::class, 'show'])->name('walikelas.show');
        Route::get('/admin/walikelas/siswa/{id}/edit', [WaliKelasController::class, 'edit'])->name('walikelas.edit');
        Route::put('/admin/walikelas/siswa/{id}', [WaliKelasController::class, 'update'])->name('walikelas.update');
        Route::delete('/admin/walikelas/siswa/{id}', [WaliKelasController::class, 'destroy'])->name('walikelas.destroy');
        Route::get('/admin/walikelas/siswa/{id}/nilai', [WaliKelasController::class, 'nilai'])->name('walikelas.nilai');
        Route::post('/admin/walikelas/siswa/{id}/nilai', [WaliKelasController::class, 'storeNilai'])->name('walikelas.storeNilai');
    });

    // Wali Kelas Routes
    Route::middleware(['role:wali_kelas'])->group(function () {
        Route::get('/walikelas', [WaliKelasController::class, 'index']); // Dashboard Wali Kelas
        // Menambahkan route untuk mengelola siswa dan nilai
        Route::get('/walikelas/siswa/{id}/nilai', [WaliKelasController::class, 'nilai'])->name('walikelas.nilai');
        Route::post('/walikelas/siswa/{id}/nilai', [WaliKelasController::class, 'storeNilai'])->name('walikelas.storeNilai');
    });

    // Siswa Routes
    Route::middleware(['role:siswa'])->group(function () {
        Route::get('/siswa', [SiswaController::class, 'index']); // Dashboard Siswa
    });

    // Logout Route
    Route::get('/logout', [SesiController::class, 'logout'])->name('logout')->middleware('auth');
});
