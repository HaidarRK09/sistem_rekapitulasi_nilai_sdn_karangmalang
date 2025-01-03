<?php

// use App\Http\Controllers\AdmincController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SesiController;
use App\Http\Controllers\WaliKelasController;
use Illuminate\Support\Facades\Route;

// Route::middleware(['guest'])->group(function () {
//     Route::get('/', [SesiController::class, 'index'])->name('login');
//     Route::post('/', [SesiController::class, 'login']);
// });

// Route::get('/home', function () {
//     return redirect('/admin');
// });

// Route::middleware(['auth'])->group(function () {
//     Route::get('/admin', [AdmincController::class, 'index']);

//     Route::get('/walikelas/siswa', [WaliKelasController::class, 'index'])->name('walikelas.index');
//     Route::get('/walikelas/siswa{id}', [WaliKelasController::class, 'show'])->name('walikelas.show');
//     Route::get('/walikelas/siswa/create', [WaliKelasController::class, 'create'])->name('walikelas.create');
//     Route::post('/walikelas/siswa', [WaliKelasController::class, 'store'])->name('walikelas.store');
//     Route::get('/walikelas/siswa/{id}', [WaliKelasController::class, 'show'])->name('walikelas.show');
//     Route::get('/walikelas/siswa/{id}/edit', [WaliKelasController::class, 'edit'])->name('walikelas.edit');
//     Route::put('/walikelas/siswa/{id}', [WaliKelasController::class, 'update'])->name('walikelas.update');
//     Route::delete('/walikelas/siswa/{id}', [WaliKelasController::class, 'destroy'])->name('walikelas.destroy');
//     Route::get('/walikelas/siswa/{id}/nilai', [WaliKelasController::class, 'nilai'])->name('walikelas.nilai');
//     Route::post('/walikelas/siswa/{id}/nilai', [WaliKelasController::class, 'storeNilai'])->name('walikelas.storeNilai');
//     Route::get('/walikelas/profile', [WaliKelasController::class, 'editProfile'])->name('walikelas.profile');
//     Route::post('/walikelas/profile/update', [WaliKelasController::class, 'updateProfile'])->name('walikelas.updateProfile');

//     // Route::get('/walikelas', [AdmincController::class, 'walikelas']);
    
//     Route::get('/siswa', [AdmincController::class, 'siswa']);
//     // Route::get('/guru', [AdmincController::class, 'guru'])

//     Route::get('logout', [SesiController::class, 'logout']);
// });


Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Dashboard routes
Route::middleware('auth.session')->group(function () {
    Route::get('/admin/dashboard', function () {
        return "Dashboard Admin";
    });

    Route::get('/wali-kelas/dashboard', function () {
        return "Dashboard Wali Kelas";
    });

    Route::get('/siswa/dashboard', function () {
        return "Dashboard Siswa";
    });
});

