@extends('walikelas.layouts')

@section('content')
    <h1 style="font-size: 2.5rem; font-weight: bold; margin-bottom: 30px;">Detail Siswa</h1>
    <div class="container mt-5">
        <div class="mb-3">
            <label for="name" class="form-label">Nama Siswa</label>
            <input type="text" id="name" class="form-control" value="{{ $siswa->name }}" readonly>
        </div>
        <div class="mb-3">
            <label for="class" class="form-label">Kelas</label>
            <input type="text" id="class" class="form-control" value="{{ $siswa->class }}" readonly>
        </div>
        <div class="mb-3">
            <label for="nisn" class="form-label">NISN</label>
            <input type="text" id="nisn" class="form-control" value="{{ $siswa->nisn }}" readonly>
        </div>
        <div class="mb-3">
            <label for="place_of_birth" class="form-label">Tempat Lahir</label>
            <input type="text" id="place_of_birth" class="form-control" value="{{ $siswa->place_of_birth }}" readonly>
        </div>
        <div class="mb-3">
            <label for="date_of_birth" class="form-label">Tanggal Lahir</label>
            <input type="text" id="date_of_birth" class="form-control" value="{{ $siswa->date_of_birth->format('d-m-Y') }}" readonly>
        </div>
        <div class="mb-3">
            <label for="gender" class="form-label">Jenis Kelamin</label>
            <input type="text" id="gender" class="form-control" value="{{ $siswa->gender }}" readonly>
        </div>
        <div class="mb-3">
            <label for="religion" class="form-label">Agama</label>
            <input type="text" id="religion" class="form-control" value="{{ $siswa->religion }}" readonly>
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Alamat</label>
            <input type="text" id="address" class="form-control" value="{{ $siswa->address }}" readonly>
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Nomor Telepon Orang Tua / Wali</label>
            <input type="text" id="phone" class="form-control" value="{{ $siswa->phone }}" readonly>
        </div>
        <div class="d-flex">
            <a href="{{ route('walikelas.index') }}" class="btn btn-danger me-2">Kembali</a>
            <a href="{{ route('walikelas.edit', $siswa->id) }}" class="btn btn-primary">Edit Data</a>
        </div>
    </div>
@endsection
