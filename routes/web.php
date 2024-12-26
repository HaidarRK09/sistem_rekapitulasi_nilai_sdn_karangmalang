<?php

use App\Http\Controllers\AdmincController;
use App\Http\Controllers\SesiController;
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
    Route::get('/admin', [AdmincController::class, 'index']);

    Route::get('/admin/walikelas/siswa', [WaliKelasController::class, 'index'])->name('walikelas.index');
    Route::get('/admin/walikelas/siswa/create', [WaliKelasController::class, 'create'])->name('walikelas.create');
    Route::post('/admin/walikelas/siswa', [WaliKelasController::class, 'store'])->name('walikelas.store');
    Route::get('/admin/walikelas/siswa/{id}', [WaliKelasController::class, 'show'])->name('walikelas.show');
    Route::get('/admin/walikelas/siswa/{id}/edit', [WaliKelasController::class, 'edit'])->name('walikelas.edit');
    Route::put('/admin/walikelas/siswa/{id}', [WaliKelasController::class, 'update'])->name('walikelas.update');
    Route::delete('/admin/walikelas/siswa/{id}', [WaliKelasController::class, 'destroy'])->name('walikelas.destroy');
    Route::get('/admin/walikelas/siswa/{id}/nilai', [WaliKelasController::class, 'nilai'])->name('walikelas.nilai');
    Route::post('/admin/walikelas/siswa/{id}/nilai', [WaliKelasController::class, 'storeNilai'])->name('walikelas.storeNilai');
    // Route::get('/admin/walikelas', [AdmincController::class, 'walikelas']);
    
    Route::get('/admin/siswa', [AdmincController::class, 'siswa']);
    // Route::get('/admin/guru', [AdmincController::class, 'guru'])

    Route::get('logout', [SesiController::class, 'logout']);
});
