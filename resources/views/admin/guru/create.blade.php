@extends('layouts.admin')

@section('content')
    <div class="container">
        <h2>Tambah Guru</h2>
        <form action="{{ route('admin.guru.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nama">Nama Guru</label>
                <input type="text" id="nama" name="nama" required>
            </div>
            <div class="form-group">
                <button type="submit">Simpan</button>
            </div>
        </form>
    </div>
@endsection
