@extends('layouts.app')

@section('content')
    <h1 style="font-size: 2.5rem; font-weight: bold; margin-bottom: 30px;">Tambah Mata Pelajaran</h1>
    <div class="container mt-5">
        <form action="{{ route('admin.mapel.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="kode_mapel" class="form-label">Kode Mata Pelajaran</label>
                <input type="text" name="kode_mapel" id="kode_mapel" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="nama_mapel" class="form-label">Nama Mata Pelajaran</label>
                <input type="text" name="nama_mapel" id="nama_mapel" class="form-control" required>
            </div>
            {{-- Jika suatu saat ingin menambahkan keterangan/deskripsi mapel --}}
            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi (Opsional)</label>
                <textarea name="deskripsi" id="deskripsi" class="form-control" rows="3"></textarea>
            </div>
            <a href="{{ route('admin.mapel.index') }}" class="btn btn-danger">Kembali</a>
            <button type="submit" class="btn btn-primary ml-2">Simpan</button>
        </form>
    </div>
@endsection
