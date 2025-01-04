@extends('layouts.app')

@section('content')
    <h1 style="font-size: 2.5rem; font-weight: bold; margin-bottom: 30px;">Detail Wali Kelas</h1>
    <div class="container mt-5">
        <div class="mb-3">
            <label for="name" class="form-label">Nama Wali Kelas</label>
            <input type="text" id="name" class="form-control" value="{{ $waliKelas->name }}" readonly>
        </div>

        <div class="mb-3">
            <label for="nip" class="form-label">NIP</label>
            <input type="text" id="nip" class="form-control" value="{{ $waliKelas->nip }}" readonly>
        </div>

        <div class="mb-3">
            <label for="nuptk" class="form-label">NUPTK</label>
            <input type="text" id="nuptk" class="form-control" value="{{ $waliKelas->nuptk }}" readonly>
        </div>

        <div class="mb-3">
            <label for="place_of_birth" class="form-label">Tempat Lahir</label>
            <input type="text" id="place_of_birth" class="form-control" value="{{ $waliKelas->place_of_birth }}" readonly>
        </div>

        <div class="mb-3">
            <label for="date_of_birth" class="form-label">Tanggal Lahir</label>
            <input type="text" id="date_of_birth" class="form-control" value="{{ $waliKelas->date_of_birth->format('d-m-Y') }}" readonly>
        </div>

        <div class="mb-3">
            <label for="education" class="form-label">Pendidikan Terakhir</label>
            <input type="text" id="education" class="form-control" value="{{ $waliKelas->education }}" readonly>
        </div>

        <div class="mb-3">
            <label for="position" class="form-label">Jabatan</label>
            <input type="text" id="position" class="form-control" value="{{ $waliKelas->position }}" readonly>
        </div>

        <div class="mb-3">
            <label for="rank" class="form-label">Pangkat</label>
            <input type="text" id="rank" class="form-control" value="{{ $waliKelas->rank }}" readonly>
        </div>

        <div class="d-flex">
            <a href="{{ route('admin.walikelas.index') }}" class="btn btn-danger me-2">Kembali</a>
            <a href="{{ route('admin.walikelas.edit', $waliKelas->id) }}" class="btn btn-primary">Edit Data</a>
        </div>
    </div>
@endsection
