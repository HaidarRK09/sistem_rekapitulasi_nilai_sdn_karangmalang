<?php

use App\Http\Controllers\AdmincController;
use App\Http\Controllers\SesiController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\WaliKelasController;
use Illuminate\Support\Facades\Route;

Route::middleware(['guest'])->group(function () {
    Route::get('/', [SesiController::class, 'index'])->name('login');
    Route::post('/', [SesiController::class, 'login']);
});

Route::get('/home', function () {
    return redirect('/admin');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/admin', [AdmincController::class, 'index'])->name('admin.index');

    // Rute untuk mengelola siswa oleh admin
    // Route::get('/admin/siswa/create', [AdmincController::class, 'createSiswa'])->name('admin.siswa.create');
    // Route::post('/admin/siswa', [AdmincController::class, 'storeSiswa'])->name('admin.siswa.store');
    // Route::get('/siswa', [AdmincController::class, 'indexSiswa'])->name('siswa.index');
    // Route::get('/admin/siswa/{id}', [AdmincController::class, 'showSiswa'])->name('admin.siswa.show');
    // Route::get('/admin/siswa/{id}/edit', [AdmincController::class, 'editSiswa'])->name('admin.siswa.edit');
    // Route::put('/admin/siswa/{id}', [AdmincController::class, 'updateSiswa'])->name('admin.siswa.update');
    // Route::delete('/admin/siswa/{id}', [AdmincController::class, 'destroySiswa'])->name('admin.siswa.destroy');

    Route::get('/walikelas/siswa', [WaliKelasController::class, 'index'])->name('walikelas.index');
    // Route::get('/walikelas/siswa{id}', [WaliKelasController::class, 'show'])->name('walikelas.show');
    Route::get('/walikelas/siswa/create', [WaliKelasController::class, 'create'])->name('walikelas.create');
    Route::post('/walikelas/siswa', [WaliKelasController::class, 'store'])->name('walikelas.store');
    Route::get('/walikelas/siswa/{id}', [WaliKelasController::class, 'show'])->name('walikelas.show');
    Route::get('/walikelas/siswa/{id}/edit', [WaliKelasController::class, 'edit'])->name('walikelas.edit');
    Route::put('/walikelas/siswa/{id}', [WaliKelasController::class, 'update'])->name('walikelas.update');
    Route::delete('/walikelas/siswa/{id}', [WaliKelasController::class, 'destroy'])->name('walikelas.destroy');
    Route::get('/walikelas/siswa/{id}/nilai', [WaliKelasController::class, 'nilai'])->name('walikelas.nilai');
    Route::post('/walikelas/siswa/{id}/nilai', [WaliKelasController::class, 'storeNilai'])->name('walikelas.storeNilai');
    Route::get('/walikelas/profile', [WaliKelasController::class, 'editProfile'])->name('walikelas.profile');
    Route::post('/walikelas/profile/update', [WaliKelasController::class, 'updateProfile'])->name('walikelas.updateProfile');

    Route::get('/siswa', [SiswaController::class, 'index'])->name('siswa.index');
    Route::get('/siswa/profile', [SiswaController::class, 'editProfile'])->name('siswa.profile');
    Route::post('/siswa/profile/update', [SiswaController::class, 'updateProfile'])->name('siswa.updateProfile');
    
    Route::post('logout', [SesiController::class, 'logout'])->name('logout');
});
