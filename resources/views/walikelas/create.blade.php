@extends('layouts.app')

@section('content')
    <h1 style="font-size: 2.5rem; font-weight: bold; margin-bottom: 30px;">Tambah Siswa</h1>
    <div class="container mt-5">
        <form action="{{ route('walikelas.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nama Siswa</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="class" class="form-label">Kelas</label>
                <input type="text" name="class" id="class" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="nisn" class="form-label">NISN</label>
                <input type="text" name="nisn" id="nisn" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="place_of_birth" class="form-label">Tempat Lahir</label>
                <input type="text" name="place_of_birth" id="place_of_birth" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="date_of_birth" class="form-label">Tanggal Lahir</label>
                <input type="date" name="date_of_birth" id="date_of_birth" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="gender" class="form-label">Jenis Kelamin</label>
                <select name="gender" id="gender" class="form-control" required>
                    <option value="laki-laki">Laki-laki</option>
                    <option value="perempuan">Perempuan</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="religion" class="form-label">Agama</label>
                <select name="religion" id="religion" class="form-control" required>
                    <option value="islam">Islam</option>
                    <option value="kristen">Kristen</option>
                    <option value="hindu">Hindu</option>
                    <option value="budha">Budha</option>
                    <option value="khonghucu">Khonghucu</option>
                    <option value="tidak memiliki agama">Tidak Memiliki Agama</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Alamat</label>
                <textarea name="address" id="address" class="form-control" required></textarea>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Nomor Telepon Orang Tua / Wali</label>
                <input type="text" name="phone" id="phone" class="form-control" required>
            </div>
            <a href="{{ route('walikelas.index') }}" class="btn btn-danger">Kembali</a>
            <button type="submit" class="btn btn-primary ml-2">Simpan</button>
        </form>
    </div>
@endsection
