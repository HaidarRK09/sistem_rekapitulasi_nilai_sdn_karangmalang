@extends('layouts.app')

@section('content')
    <h1 style="font-size: 2.5rem; font-weight: bold; margin-bottom: 30px;">Daftar Siswa</h1>
    <div class="container mt-5">
        <a href="{{ route('walikelas.create') }}" class="btn btn-primary mb-3">Tambah Siswa</a>
        <table class="table">
            <thead>
                <tr>
                    <th>Nama Siswa</th>
                    <th>Kelas</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($siswas as $siswa)
                    <tr>
                        <td style="word-wrap: break-word; max-width: 200px;">
                            <a href="{{ route('walikelas.show', $siswa->id) }}">{{ $siswa->name }}</a>
                        </td>
                        <td>{{ $siswa->class }}</td>
                        <td>
                            <a href="{{ route('walikelas.nilai', $siswa->id) }}" class="btn btn-sm btn-info">Lihat Nilai</a>
                            <a href="{{ route('walikelas.edit', $siswa->id) }}" class="btn btn-sm btn-primary">Edit</a>
                            <form action="{{ route('walikelas.destroy', $siswa->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger"
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus siswa ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
