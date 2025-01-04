@extends('layouts.app')

@section('content')
    <h1 style="font-size: 2.5rem; font-weight: bold; margin-bottom: 30px;">Tambah Wali Kelas</h1>
    <div class="container mt-5">
        <form action="{{ route('admin.walikelas.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nama Wali Kelas</label>
                <input type="text" class="form-control" name="name" id="name" required>
            </div>

            <div class="mb-3">
                <label for="nip" class="form-label">NIP</label>
                <input type="text" class="form-control" id="nip" name="nip" required>
            </div>

            <div class="mb-3">
                <label for="nuptk" class="form-label">NUPTK</label>
                <input type="text" class="form-control" id="nuptk" name="nuptk">
            </div>

            <div class="mb-3">
                <label for="place_of_birth" class="form-label">Tempat Lahir</label>
                <input type="text" class="form-control" id="place_of_birth" name="place_of_birth" required>
            </div>

            <div class="mb-3">
                <label for="date_of_birth" class="form-label">Tanggal Lahir</label>
                <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" required>
            </div>

            <div class="mb-3">
                <label for="education" class="form-label">Pendidikan Terakhir</label>
                <input type="text" class="form-control" id="education" name="education">
            </div>

            <div class="mb-3">
                <label for="position" class="form-label">Jabatan</label>
                <select class="form-control" id="position" name="position" required>
                    <option value="Wali Kelas 1">Wali Kelas 1</option>
                    <option value="Wali Kelas 2">Wali Kelas 2</option>
                    <option value="Wali Kelas 3">Wali Kelas 3</option>
                    <option value="Wali Kelas 4">Wali Kelas 4</option>
                    <option value="Wali Kelas 5">Wali Kelas 5</option>
                    <option value="Wali Kelas 6">Wali Kelas 6</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="rank" class="form-label">Pangkat</label>
                <input type="text" class="form-control" id="rank" name="rank">
            </div>

            <a href="{{ route('admin.walikelas.index') }}" class="btn btn-danger">Kembali</a>
            <button type="submit" class="btn btn-primary ml-2">Simpan</button>
        </form>
    </div>
@endsection
