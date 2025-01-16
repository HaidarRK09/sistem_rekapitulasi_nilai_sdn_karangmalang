<?php

use App\Http\Controllers\AdminController;
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
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');

    Route::get('/admin/walikelas', [AdminController::class, 'walikelas'])->name('admin.walikelas.index');
    Route::get('/admin/walikelas/create', [AdminController::class, 'createWalikelas'])->name('admin.walikelas.create');
    Route::post('/admin/walikelas/walikelas', [AdminController::class, 'storeWalikelas'])->name('admin.walikelas.store');
    Route::get('/admin/walikelas/walikelas/{id}', [AdminController::class, 'showWalikelas'])->name('admin.walikelas.show');
    Route::get('/admin/walikelas/walikelas/{id}/edit', [AdminController::class, 'editWalikelas'])->name('admin.walikelas.edit');
    Route::put('/admin/walikelas/walikelas/{id}', [AdminController::class, 'updateWalikelas'])->name('admin.walikelas.update');
    Route::delete('/admin/walikelas/walikelas/{id}', [AdminController::class, 'destroyWalikelas'])->name('admin.walikelas.destroy');

    Route::get('/admin/siswa', [AdminController::class, 'siswa'])->name('admin.siswa.index');
    Route::get('/admin/siswa/create', [AdminController::class, 'createSiswa'])->name('admin.siswa.create');
    Route::post('/admin/siswa/siswa', [AdminController::class, 'storeSiswa'])->name('admin.siswa.store');
    Route::get('/admin/siswa/siswa/{id}', [AdminController::class, 'showSiswa'])->name('admin.siswa.show');
    Route::get('/admin/siswa/siswa/{id}/edit', [AdminController::class, 'editSiswa'])->name('admin.siswa.edit');
    Route::put('/admin/siswa/siswa/{id}', [AdminController::class, 'updateSiswa'])->name('admin.siswa.update');
    Route::delete('/admin/siswa/siswa/{id}', [AdminController::class, 'destroySiswa'])->name('admin.siswa.destroy');
    Route::get('/admin/siswa/siswa/{id}/nilai', [AdminController::class, 'nilaiSiswa'])->name('admin.siswa.nilai');
    Route::post('/admin/siswa/siswa/{id}/nilai', [AdminController::class, 'storeNilaiSiswa'])->name('admin.siswa.storeNilai');

    Route::get('/walikelas/siswa', [WaliKelasController::class, 'index'])->name('walikelas.index');
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
    Route::get('/siswa/print', [SiswaController::class, 'print'])->name('siswa.print');
    
    Route::post('logout', [SesiController::class, 'logout'])->name('logout');
});
