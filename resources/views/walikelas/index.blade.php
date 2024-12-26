@extends('layouts.app')

@section('content')
    <h1 style="font-size: 2.5rem; font-weight: bold; margin-bottom: 30px; text-align: center;">Daftar Siswa</h1>

    <div class="container d-flex justify-content-center mt-5">
        <div class="w-100">
            <!-- Tombol "Tambah Siswa" -->
            <a href="{{ route('walikelas.create') }}" class="btn btn-primary mb-3">Tambah Siswa</a>

            <!-- Dropdown untuk Pengurutan -->
            <div class="dropdown d-inline-block ms-2">
                <button class="btn btn-secondary dropdown-toggle mb-3" type="button" id="dropdownMenuButton"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    Urutkan Berdasarkan
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <li>
                        <a class="dropdown-item"
                            href="{{ route('walikelas.index', ['order_by' => 'name', 'order_direction' => $orderDirection === 'asc' ? 'desc' : 'asc']) }}">
                            Nama
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item"
                            href="{{ route('walikelas.index', ['order_by' => 'class', 'order_direction' => $orderDirection === 'asc' ? 'desc' : 'asc']) }}">
                            Kelas
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item"
                            href="{{ route('walikelas.index', ['order_by' => 'average', 'order_direction' => $orderDirection === 'asc' ? 'desc' : 'asc']) }}">
                            Rata-Rata Nilai
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item"
                            href="{{ route('walikelas.index', ['order_by' => 'name', 'order_direction' => $orderDirection === 'asc' ? 'desc' : 'asc']) }}">
                            Reset
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Tabel Daftar Siswa -->
            <table class="table table-bordered table-striped text-center">
                <thead class="table-dark">
                    <tr>
                        <th>No.</th> <!-- Kolom untuk nomor urut -->
                        <th>Nama Siswa</th>
                        <th>Kelas</th>
                        <th>Rata-Rata Nilai</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($siswas as $index => $siswa)
                        <!-- Menambahkan variabel $index untuk nomor urut -->
                        <tr>
                            <td>{{ $index + 1 }}</td> <!-- Menampilkan nomor urut -->
                            <td style="word-wrap: break-word; max-width: 200px;">
                                <a href="{{ route('walikelas.show', $siswa->id) }}">{{ $siswa->name }}</a>
                            </td>
                            <td>{{ $siswa->class }}</td>
                            <td>
                                @if ($siswa->nilai)
                                    <a href="{{ route('walikelas.nilai', $siswa->id) }}" class="text-decoration-none">
                                        {{ round(
                                            (($siswa->nilai->tugas1 ?? 0) +
                                                ($siswa->nilai->tugas2 ?? 0) +
                                                ($siswa->nilai->tugas3 ?? 0) +
                                                ($siswa->nilai->tugas4 ?? 0) +
                                                ($siswa->nilai->tugas5 ?? 0) +
                                                ($siswa->nilai->uts ?? 0) +
                                                ($siswa->nilai->uas ?? 0)) /
                                                7,
                                            2,
                                        ) }}
                                    </a>
                                @else
                                    <a href="{{ route('walikelas.nilai', $siswa->id) }}" class="text-decoration-none">-</a>
                                @endif
                            </td>
                            <td>
                                <form action="{{ route('walikelas.destroy', $siswa->id) }}" method="POST"
                                    class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus siswa ini?')">Hapus
                                        Data</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
