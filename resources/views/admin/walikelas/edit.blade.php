@extends('layouts.app')

@section('content')
    <h1 style="font-size: 2.5rem; font-weight: bold; margin-bottom: 30px;">Edit Wali Kelas</h1>
    <div class="container mt-5">
        <form action="{{ route('admin.walikelas.update', $waliKelas->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Nama Wali Kelas</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $waliKelas->name }}"
                    required>
            </div>

            <div class="mb-3">
                <label for="nip" class="form-label">NIP</label>
                <input type="text" name="nip" id="nip" class="form-control" value="{{ $waliKelas->nip }}"
                    required>
            </div>

            <div class="mb-3">
                <label for="nuptk" class="form-label">NUPTK</label>
                <input type="text" name="nuptk" id="nuptk" class="form-control" value="{{ $waliKelas->nuptk }}"
                    required>
            </div>

            <div class="mb-3">
                <label for="place_of_birth" class="form-label">Tempat Lahir</label>
                <input type="text" name="place_of_birth" id="place_of_birth" class="form-control"
                    value="{{ $waliKelas->place_of_birth }}" required>
            </div>

            <div class="mb-3">
                <label for="date_of_birth" class="form-label">Tanggal Lahir</label>
                <input type="date" name="date_of_birth" id="date_of_birth" class="form-control"
                    value="{{ $waliKelas->date_of_birth->format('Y-m-d') }}" required>
            </div>

            <div class="mb-3">
                <label for="education" class="form-label">Pendidikan Terakhir</label>
                <input type="text" name="education" id="education" class="form-control" value="{{ $waliKelas->education }}" required>
            </div>

            <div class="mb-3">
                <label for="position" class="form-label">Jabatan</label>
                <select class="form-control" id="position" name="position" required>
                    <option value="Wali Kelas 1" {{ $waliKelas->position == 'Wali Kelas 1' ? 'selected' : '' }}>Wali Kelas 1</option>
                    <option value="Wali Kelas 2" {{ $waliKelas->position == 'Wali Kelas 2' ? 'selected' : '' }}>Wali Kelas 2</option>
                    <option value="Wali Kelas 3" {{ $waliKelas->position == 'Wali Kelas 3' ? 'selected' : '' }}>Wali Kelas 3</option>
                    <option value="Wali Kelas 4" {{ $waliKelas->position == 'Wali Kelas 4' ? 'selected' : '' }}>Wali Kelas 4</option>
                    <option value="Wali Kelas 5" {{ $waliKelas->position == 'Wali Kelas 5' ? 'selected' : '' }}>Wali Kelas 5</option>
                    <option value="Wali Kelas 6" {{ $waliKelas->position == 'Wali Kelas 6' ? 'selected' : '' }}>Wali Kelas 6</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="rank" class="form-label">Pangkat</label>
                <textarea name="rank" id="rank" class="form-control" required>{{ $waliKelas->rank }}</textarea>
            </div>

            <a href="{{ url()->previous() }}" class="btn btn-danger">Kembali</a>
            <button type="submit" class="btn btn-primary ml-2">Simpan</button>
        </form>
    </div>
@endsection
