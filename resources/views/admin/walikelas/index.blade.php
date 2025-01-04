@extends('admin.dashboard')

@section('content')
<div class="container">
    <h1 class="my-4">Daftar Wali Kelas</h1>

    <!-- Tampilkan pesan sukses jika ada -->
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('admin.walikelas.create') }}" class="btn btn-primary mb-3">Tambah Wali Kelas</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($walikelas as $wali)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $wali->nama }}</td>
                    <td>{{ $wali->email }}</td>
                    <td>
                        <a href="{{ route('admin.walikelas.show', $wali->id) }}" class="btn btn-info btn-sm">Detail</a>
                        <a href="{{ route('admin.walikelas.edit', $wali->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('admin.walikelas.destroy', $wali->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
