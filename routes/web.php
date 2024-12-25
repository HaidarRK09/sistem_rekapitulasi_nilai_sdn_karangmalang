<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\SiswaController;

// Halaman Utama
Route::get('/', function () {
    return view('welcome');
});

// Route untuk Login dan Logout
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Middleware untuk Admin
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
});

// Middleware untuk Teacher
Route::middleware(['auth', 'role:teacher'])->group(function () {
    Route::get('/teacher/dashboard', [TeacherController::class, 'index'])->name('teacher.dashboard');
});

// Middleware untuk Siswa
Route::middleware(['auth', 'role:siswa'])->group(function () {
    Route::get('/siswa/dashboard', [SiswaController::class, 'index'])->name('siswa.dashboard');
});
