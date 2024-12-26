@extends('admin.layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
<h1>Selamat Datang, Admin</h1>
<p>Gunakan menu di atas untuk mengelola data siswa, guru, dan wali kelas.</p>
<div>
    <h2>Statistik</h2>
    <ul>
        <li>Jumlah Siswa: {{ $jumlahSiswa }}</li>
        <li>Jumlah Guru: {{ $jumlahGuru }}</li>
        <li>Jumlah Wali Kelas: {{ $jumlahWaliKelas }}</li>
    </ul>
</div>
@endsection
