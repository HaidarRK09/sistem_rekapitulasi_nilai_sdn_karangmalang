@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 style="font-size: 2.5rem; font-weight: bold; margin-bottom: 30px;">Profil Siswa</h1>

        <!-- Form Edit Profil Siswa -->
        {{-- <form method="POST" action="{{ route('siswa.updateProfile') }}"> --}}
            {{-- @csrf --}}
            <div class="mb-3">
                <label for="name" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $siswa->name) }}" readonly>
            </div>

            <div class="mb-3">
                <label for="class" class="form-label">Kelas</label>
                <input type="text" class="form-control" id="class" name="class" value="{{ old('name', $siswa->class) }}" readonly>
                {{-- <select class="form-control" id="class" name="class" required>
                    <option value="Kelas 1" {{ old('class', $siswa->class) == 'Kelas 1' ? 'selected' : '' }}>Kelas 1</option>
                    <option value="Kelas 2" {{ old('class', $siswa->class) == 'Kelas 2' ? 'selected' : '' }}>Kelas 2</option>
                    <option value="Kelas 3" {{ old('class', $siswa->class) == 'Kelas 3' ? 'selected' : '' }}>Kelas 3</option>
                    <option value="Kelas 4" {{ old('class', $siswa->class) == 'Kelas 4' ? 'selected' : '' }}>Kelas 4</option>
                    <option value="Kelas 5" {{ old('class', $siswa->class) == 'Kelas 5' ? 'selected' : '' }}>Kelas 5</option>
                    <option value="Kelas 6" {{ old('class', $siswa->class) == 'Kelas 6' ? 'selected' : '' }}>Kelas 6</option>
                </select> --}}
            </div>

            <div class="mb-3">
                <label for="nisn" class="form-label">NISN</label>
                <input type="text" class="form-control" id="nisn" name="nisn" value="{{ old('nisn', $siswa->nisn) }}" readonly>
            </div>

            <div class="mb-3">
                <label for="place_of_birth" class="form-label">Tempat Lahir</label>
                <input type="text" class="form-control" id="place_of_birth" name="place_of_birth" value="{{ old('place_of_birth', $siswa->place_of_birth) }}" readonly>
            </div>

            <div class="mb-3">
                <label for="date_of_birth" class="form-label">Tanggal Lahir</label>
                <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" value="{{ old('date_of_birth', $siswa->date_of_birth ? $siswa->date_of_birth->format('Y-m-d') : '') }}" readonly>
            </div>

            <div class="mb-3">
                <label for="gender" class="form-label">Jenis Kelamin</label>
                <input type="text" class="form-control" id="gender" name="gender" value="{{ old('gender', $siswa->gender) }}" readonly>
                {{-- <select class="form-control" id="gender" name="gender" required>
                    <option value="Laki-laki" {{ old('gender', $siswa->gender) == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                    <option value="Perempuan" {{ old('gender', $siswa->gender) == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                </select> --}}
            </div>

            <div class="mb-3">
                <label for="religion" class="form-label">Agama</label>
                <input type="text" class="form-control" id="religion" name="religion" value="{{ old('religion', $siswa->religion) }}" readonly>
                {{-- <select class="form-control" id="religion" name="religion" required>
                    <option value="Islam" {{ old('religion', $siswa->religion) == 'Islam' ? 'selected' : '' }}>Islam</option>
                    <option value="Kristen" {{ old('religion', $siswa->religion) == 'Kristen' ? 'selected' : '' }}>Kristen</option>
                    <option value="Katolik" {{ old('religion', $siswa->religion) == 'Katolik' ? 'selected' : '' }}>Katolik</option>
                    <option value="Hindu" {{ old('religion', $siswa->religion) == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                    <option value="Buddha" {{ old('religion', $siswa->religion) == 'Buddha' ? 'selected' : '' }}>Buddha</option>
                    <option value="Konghucu" {{ old('religion', $siswa->religion) == 'Konghucu' ? 'selected' : '' }}>Konghucu</option>
                </select> --}}
            </div>

            <div class="mb-3">
                <label for="address" class="form-label">Alamat</label>
                <input type="text" class="form-control" id="address" name="address" value="{{ old('address', $siswa->address) }}" readonly>
            </div>

            <div class="mb-3">
                <label for="phone" class="form-label">Nomor Telepon</label>
                <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone', $siswa->phone) }}" readonly>
            </div>

            <a href="{{ route('siswa.index') }}" class="btn btn-danger me-2">Kembali</a>
            {{-- <button type="submit" class="btn btn-primary">Simpan</button> --}}
        {{-- </form> --}}
    </div>
@endsection