<?php

use App\Http\Controllers\AdmincController;
use App\Http\Controllers\SesiController;
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
    Route::get('/admin/walikelas', [AdmincController::class, 'walikelas']);
    Route::get('/admin/siswa', [AdmincController::class, 'siswa']);
    // Route::get('/admin/guru', [AdmincController::class, 'guru'])

    Route::get('logout', [SesiController::class, 'logout']);
});
