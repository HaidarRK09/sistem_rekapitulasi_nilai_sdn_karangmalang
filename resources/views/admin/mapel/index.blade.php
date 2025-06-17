@extends('layouts.app')

@section('content')
    <div class="bg-white p-6 rounded shadow-md">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-xl font-bold">Daftar Mata Pelajaran</h2>
            <a href="{{ route('admin.mapel.create') }}" class="btn btn-primary">Tambah Mata Pelajaran</a>
        </div>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="table-responsive">
            <table class="table table-bordered w-full">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Mata Pelajaran</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($mapels as $index => $mapel)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $mapel->nama_mapel }}</td>
                            <td>
                                <a href="{{ route('admin.mapel.edit', $mapel->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('admin.mapel.destroy', $mapel->id) }}" method="POST"
                                    class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">Belum ada data mata pelajaran.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
