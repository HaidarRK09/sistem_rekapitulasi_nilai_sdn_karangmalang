@extends('admin.layouts.app')

@section('title', 'Kelola Guru')

@section('content')
<h1>Kelola Guru</h1>
<a href="#" class="btn btn-primary">Tambah Guru</a>
<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Mata Pelajaran</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($gurus as $guru)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $guru->name }}</td>
            <td>{{ $guru->mata_pelajaran }}</td>
            <td>
                <a href="#">Edit</a>
                <a href="#">Hapus</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
