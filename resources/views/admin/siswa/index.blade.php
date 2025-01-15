@extends('layouts.app')

@section('content')
    <h1 style="font-size: 2.5rem; font-weight: bold; margin-bottom: 30px; text-align: center;">Daftar Siswa</h1>

    <div class="container d-flex justify-content-center mt-5">
        <div class="w-100">
            <a href="{{ route('admin.siswa.create') }}" class="btn btn-primary mb-3">Tambah Siswa</a>

            <div class="dropdown d-inline-block ms-2">
                <button class="btn btn-secondary dropdown-toggle mb-3" type="button" id="dropdownMenuButton"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    Urutkan Berdasarkan
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <li>
                        <a class="dropdown-item"
                            href="{{ route('admin.siswa.index', ['order_by' => 'name', 'order_direction' => $orderDirection === 'asc' ? 'desc' : 'asc']) }}">
                            Nama
                            @if ($orderBy === 'name')
                                <span class="ms-2">{{ $orderDirection === 'asc' ? '↑' : '↓' }}</span>
                            @endif
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item"
                            href="{{ route('admin.siswa.index', ['order_by' => 'class', 'order_direction' => $orderDirection === 'asc' ? 'desc' : 'asc']) }}">
                            Kelas
                            @if ($orderBy === 'class')
                                <span class="ms-2">{{ $orderDirection === 'asc' ? '↑' : '↓' }}</span>
                            @endif
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item"
                            href="{{ route('admin.siswa.index', ['order_by' => 'average', 'order_direction' => $orderDirection === 'asc' ? 'desc' : 'asc']) }}">
                            Nilai Rapor
                            @if ($orderBy === 'average')
                                <span class="ms-2">{{ $orderDirection === 'asc' ? '↑' : '↓' }}</span>
                            @endif
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item"
                            href="{{ route('admin.siswa.index', ['order_by' => 'id', 'order_direction' => 'asc']) }}">
                            Reset
                        </a>
                    </li>
                </ul>
            </div>

            <table class="table table-bordered table-striped text-center">
                <thead class="table-dark">
                    <tr>
                        <th>No.</th>
                        <th>Nama Siswa</th>
                        <th>Kelas</th>
                        <th>Nilai Rapor</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($siswas as $index => $siswa)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $siswa->name }}</td>
                            <td>{{ $siswa->class }}</td>
                            <td>{{ $siswa->average ? number_format($siswa->average, 2) : '-' }}</td>
                            <td>
                                <a href="{{ route('admin.siswa.show', $siswa->id) }}" class="btn btn-sm btn-info">Lihat Data</a>
                                <a href="{{ route('admin.siswa.nilai', $siswa->id) }}" class="btn btn-sm btn-warning">Edit Nilai</a>
                                <form action="{{ route('admin.siswa.destroy', $siswa->id) }}" method="POST"
                                    class="d-inline">
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
    </div>
@endsection