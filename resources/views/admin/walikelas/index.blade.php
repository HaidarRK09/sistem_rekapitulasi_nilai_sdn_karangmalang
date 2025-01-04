@extends('layouts.app')

@section('content')
    <h1 style="font-size: 2.5rem; font-weight: bold; margin-bottom: 30px; text-align: center;">Daftar Wali Kelas</h1>

    <div class="container d-flex justify-content-center mt-5">
        <div class="w-100">
            <a href="{{ route('admin.walikelas.create') }}" class="btn btn-primary mb-3">Tambah Wali Kelas</a>

            <div class="dropdown d-inline-block ms-2">
                <button class="btn btn-secondary dropdown-toggle mb-3" type="button" id="dropdownMenuButton"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    Urutkan Berdasarkan
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <li>
                        <a class="dropdown-item"
                            href="{{ route('admin.walikelas.index', ['order_by' => 'name', 'order_direction' => $orderDirection === 'asc' ? 'desc' : 'asc']) }}">
                            Nama
                            @if ($orderBy === 'name')
                                <span class="ms-2">{{ $orderDirection === 'asc' ? '↑' : '↓' }}</span>
                            @endif
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item"
                            href="{{ route('admin.walikelas.index', ['order_by' => 'position', 'order_direction' => $orderDirection === 'asc' ? 'desc' : 'asc']) }}">
                            Jabatan
                            @if ($orderBy === 'position')
                                <span class="ms-2">{{ $orderDirection === 'asc' ? '↑' : '↓' }}</span>
                            @endif
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item"
                            href="{{ route('admin.walikelas.index', ['order_by' => 'id', 'order_direction' => 'asc']) }}">
                            Reset
                        </a>
                    </li>
                </ul>
            </div>

            <table class="table table-bordered table-striped text-center">
                <thead class="table-dark">
                    <tr>
                        <th>No.</th>
                        <th>Nama Wali Kelas</th>
                        <th>Jabatan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($waliKelasList as $index => $waliKelas)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $waliKelas->name }}</td>
                            <td>{{ $waliKelas->position }}</td>
                            <td>
                                <a href="{{ route('admin.walikelas.show', $waliKelas->id) }}" class="btn btn-sm btn-info">Lihat
                                    Data</a>
                                <form action="{{ route('admin.walikelas.destroy', $waliKelas->id) }}" method="POST"
                                    class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus wali kelas ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
