@extends('layouts.app')

@section('content')
    <h1 style="font-size: 2.5rem; font-weight: bold; margin-bottom: 30px;">Edit Siswa</h1>
    <div class="container mt-5">
        <form action="{{ route('admin.siswa.update', $siswa->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Nama Siswa</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $siswa->name }}" required>
            </div>

            <div class="mb-3">
                <label for="class" class="form-label">Kelas</label>
                <select name="class" id="class" class="form-control" required>
                    <option value="Kelas 1" {{ $siswa->class == 'Kelas 1' ? 'selected' : '' }}>Kelas 1</option>
                    <option value="Kelas 2" {{ $siswa->class == 'Kelas 2' ? 'selected' : '' }}>Kelas 2</option>
                    <option value="Kelas 3" {{ $siswa->class == 'Kelas 3' ? 'selected' : '' }}>Kelas 3</option>
                    <option value="Kelas 4" {{ $siswa->class == 'Kelas 4' ? 'selected' : '' }}>Kelas 4</option>
                    <option value="Kelas 5" {{ $siswa->class == 'Kelas 5' ? 'selected' : '' }}>Kelas 5</option>
                    <option value="Kelas 6" {{ $siswa->class == 'Kelas 6' ? 'selected' : '' }}>Kelas 6</option>
                </select>
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
                <select class="form-control" id="gender" name="gender" required>
                    <option value="Laki-laki" {{ old('gender', $siswa->gender) == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                    <option value="Perempuan" {{ old('gender', $siswa->gender) == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="religion" class="form-label">Agama</label>
                <select class="form-control" id="religion" name="religion" required>
                    <option value="Islam" {{ old('religion', $siswa->religion) == 'Islam' ? 'selected' : '' }}>Islam</option>
                    <option value="Kristen" {{ old('religion', $siswa->religion) == 'Kristen' ? 'selected' : '' }}>Kristen</option>
                    <option value="Katolik" {{ old('religion', $siswa->religion) == 'Katolik' ? 'selected' : '' }}>Katolik</option>
                    <option value="Hindu" {{ old('religion', $siswa->religion) == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                    <option value="Buddha" {{ old('religion', $siswa->religion) == 'Buddha' ? 'selected' : '' }}>Buddha</option>
                    <option value="Konghucu" {{ old('religion', $siswa->religion) == 'Konghucu' ? 'selected' : '' }}>Konghucu</option>
                    <option value="Tidak Memiliki Agama" {{ old('religion', $siswa->religion) == 'Tidak Memiliki Agama' ? 'selected' : '' }}>Tidak Memiliki Agama</option>
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
