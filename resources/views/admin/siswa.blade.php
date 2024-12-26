@extends('admin.layouts.app')

@section('title', 'Kelola Siswa')

@section('content')
<h1>Kelola Siswa</h1>
<a href="{{ route('walikelas.create') }}" class="btn btn-primary">Tambah Siswa</a>
<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Kelas</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($siswas as $siswa)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $siswa->name }}</td>
            <td>{{ $siswa->class }}</td>
            <td>
                <a href="{{ route('walikelas.edit', $siswa->id) }}">Edit</a>
                <form action="{{ route('walikelas.destroy', $siswa->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
