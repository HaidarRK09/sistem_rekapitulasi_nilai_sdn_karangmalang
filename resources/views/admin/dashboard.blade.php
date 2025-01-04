@extends('layouts.app')

@section('content')
        <div class="container mt-4">
            <h2>Hallo, Selamat datang {{ $user->name }}</h2>
            <p class="lead">Ini adalah dashboard untuk admin. Pilih menu di sidebar untuk mengelola sistem.</p>

            <div class="row mt-4">
                <!-- Statistics Card 1 -->
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header text-center">
                            Total Siswa
                        </div>
                        <div class="card-body text-center">
                            <h5 class="card-title">150</h5>
                            <p class="card-text">Jumlah total siswa yang terdaftar di sistem.</p>
                        </div>
                    </div>
                </div>

                <!-- Statistics Card 2 -->
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header text-center">
                            Total Wali Kelas
                        </div>
                        <div class="card-body text-center">
                            <h5 class="card-title">10</h5>
                            <p class="card-text">Jumlah wali kelas yang terdaftar di sistem.</p>
                        </div>
                    </div>
                </div>

                <!-- Statistics Card 3 -->
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header text-center">
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
