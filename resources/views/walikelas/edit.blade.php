@extends('layouts.app')

@section('content')
    <h1 style="font-size: 2.5rem; font-weight: bold; margin-bottom: 30px;">Edit Siswa</h1>
    <div class="container mt-5">
        <form action="{{ route('walikelas.update', $siswa->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Nama Siswa</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $siswa->name }}" required>
            </div>
            <div class="mb-3">
                <label for="class" class="form-label">Kelas</label>
                <input type="text" name="class" id="class" class="form-control" value="{{ $siswa->class }}" required>
            </div>
            <div class="mb-3">
                <label for="nisn" class="form-label">NISN</label>
                <input type="text" name="nisn" id="nisn" class="form-control" value="{{ $siswa->nisn }}" required>
            </div>
            <div class="mb-3">
                <label for="place_of_birth" class="form-label">Tempat Lahir</label>
                <input type="text" name="place_of_birth" id="place_of_birth" class="form-control" value="{{ $siswa->place_of_birth }}" required>
            </div>
            <div class="mb-3">
                <label for="date_of_birth" class="form-label">Tanggal Lahir</label>
                <input type="date" name="date_of_birth" id="date_of_birth" class="form-control" value="{{ $siswa->date_of_birth->format('Y-m-d') }}" required>
            </div>
            <div class="mb-3">
                <label for="gender" class="form-label">Jenis Kelamin</label>
                <select name="gender" id="gender" class="form-control" required>
                    <option value="laki-laki" {{ $siswa->gender == 'laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                    <option value="perempuan" {{ $siswa->gender == 'perempuan' ? 'selected' : '' }}>Perempuan</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="religion" class="form-label">Agama</label>
                <select name="religion" id="religion" class="form-control" required>
                    <option value="islam" {{ $siswa->religion == 'islam' ? 'selected' : '' }}>Islam</option>
                    <option value="kristen" {{ $siswa->religion == 'kristen' ? 'selected' : '' }}>Kristen</option>
                    <option value="hindu" {{ $siswa->religion == 'hindu' ? 'selected' : '' }}>Hindu</option>
                    <option value="budha" {{ $siswa->religion == 'budha' ? 'selected' : '' }}>Budha</option>
                    <option value="khonghucu" {{ $siswa->religion == 'khonghucu' ? 'selected' : '' }}>Khonghucu</option>
                    <option value="tidak memiliki agama" {{ $siswa->religion == 'tidak memiliki agama' ? 'selected' : '' }}>Tidak Memiliki Agama</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Alamat</label>
                <textarea name="address" id="address" class="form-control" required>{{ $siswa->address }}</textarea>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Nomor Telepon Orang Tua / Wali</label>
                <input type="text" name="phone" id="phone" class="form-control" value="{{ $siswa->phone }}" required>
            </div>
            <a href="{{ url()->previous() }}" class="btn btn-danger">Kembali</a>
            <button type="submit" class="btn btn-primary ml-2">Simpan</button>
        </form>
    </div>
@endsection
