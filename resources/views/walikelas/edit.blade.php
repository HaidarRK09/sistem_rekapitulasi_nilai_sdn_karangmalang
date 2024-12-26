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
                <input type="text" name="class" id="class" class="form-control" value="{{ $siswa->class }}"
                    required>
            </div>
            <a href="{{ route('walikelas.index') }}" class="btn btn-danger">Kembali</a>
            <button type="submit" class="btn btn-primary ml-2">Simpan</button>
        </form>
    </div>
@endsection
