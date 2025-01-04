@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 style="font-size: 2.5rem; font-weight: bold; margin-bottom: 30px;">Halo, {{ Auth::user()->name }}</h1>
        <p class="lead">Ini adalah dashboard untuk admin. Pilih menu di sidebar untuk mengelola sistem.</p>

        <div class="row mt-4">
            <!-- Statistics Card 1 -->
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <div class="card-header text-center bg-primary text-white">
                        Total Siswa
                    </div>
                    <div class="card-body text-center">
                        <h5 class="card-title">{{ $totalSiswa }}</h5>
                        <p class="card-text">Jumlah total siswa yang terdaftar di sistem.</p>
                    </div>
                </div>
            </div>

            <!-- Statistics Card 2 -->
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <div class="card-header text-center bg-success text-white">
                        Total Wali Kelas
                    </div>
                    <div class="card-body text-center">
                        <h5 class="card-title">{{ $totalWaliKelas }}</h5>
                        <p class="card-text">Jumlah wali kelas yang terdaftar di sistem.</p>
                    </div>
                </div>
            </div>

            <!-- Statistics Card 3 -->
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <div class="card-header text-center bg-warning text-white">
                        Pengumuman
                    </div>
                    <div class="card-body text-center">
                        <p class="card-text">Cek pengumuman terbaru dari sekolah atau sistem.</p>
                        <a href="#" class="btn btn-primary">Lihat Pengumuman</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection