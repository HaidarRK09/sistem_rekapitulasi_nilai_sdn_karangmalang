@extends('layouts.admin')

@section('content')
    <div class="container">
        <h2>Tambah Siswa</h2>
        <form action="{{ url('/admin/siswa') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nama">Nama Siswa</label>
                <input type="text" id="nama" name="nama" required>
            </div>
            <div class="form-group">
                <label for="nis">NIS</label>
                <input type="text" id="nis" name="nis" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <button type="submit">Tambah Siswa</button>
            </div>
        </form>
    </div>
@endsection
