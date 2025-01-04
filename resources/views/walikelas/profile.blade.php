@extends('walikelas.layouts')

@section('content')
<div class="container">
    <h1 style="font-size: 2.5rem; font-weight: bold; margin-bottom: 30px;">Edit Profil</h1>

    <!-- Form Edit Profil -->
    <form method="POST" action="{{ route('walikelas.updateProfile') }}">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nama</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $waliKelas->user->name) }}" required>
        </div>

        <div class="mb-3">
            <label for="nip" class="form-label">NIP</label>
            <input type="text" class="form-control" id="nip" name="nip" value="{{ old('nip', $waliKelas->nip) }}" required>
        </div>

        <div class="mb-3">
            <label for="nuptk" class="form-label">NUPTK</label>
            <input type="text" class="form-control" id="nuptk" name="nuptk" value="{{ old('nuptk', $waliKelas->nuptk) }}">
        </div>

        <div class="mb-3">
            <label for="place_of_birth" class="form-label">Tempat Lahir</label>
            <input type="text" class="form-control" id="place_of_birth" name="place_of_birth" value="{{ old('place_of_birth', $waliKelas->place_of_birth) }}" required>
        </div>

        <div class="mb-3">
            <label for="date_of_birth" class="form-label">Tanggal Lahir</label>
            <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" value="{{ old('date_of_birth', $waliKelas->date_of_birth) }}" required>
        </div>

        <div class="mb-3">
            <label for="education" class="form-label">Pendidikan Terakhir</label>
            <input type="text" class="form-control" id="education" name="education" value="{{ old('education', $waliKelas->education) }}">
        </div>

        <div class="mb-3">
            <label for="position" class="form-label">Jabatan</label>
            <input type="text" class="form-control" id="position" name="position" value="{{ old('position', $waliKelas->position) }}">
        </div>

        <div class="mb-3">
            <label for="rank" class="form-label">Pangkat</label>
            <input type="text" class="form-control" id="rank" name="rank" value="{{ old('rank', $waliKelas->rank) }}">
        </div>

        <a href="{{ route('walikelas.index') }}" class="btn btn-danger me-2">Kembali</a>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
