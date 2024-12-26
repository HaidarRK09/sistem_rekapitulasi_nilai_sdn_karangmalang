<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
</head>

<body>
    <h1>Dashboard Admin</h1>

    <!-- Form Tambah Guru -->
    <form action="{{ url('/admin/guru') }}" method="POST">
        @csrf
        <label for="nama">Nama Guru:</label>
        <input type="text" name="nama" required>
        <label for="nip">NIP:</label>
        <input type="text" name="nip" required>
        <label for="email">Email:</label>
        <input type="email" name="email" required>
        <button type="submit">Tambah Guru</button>
    </form>

    <!-- Form Tambah Siswa -->
    <form action="{{ url('/admin/siswa') }}" method="POST">
        @csrf
        <label for="nama">Nama Siswa:</label>
        <input type="text" name="nama" required>
        <label for="nis">NIS:</label>
        <input type="text" name="nis" required>
        <label for="email">Email:</label>
        <input type="email" name="email" required>
        <button type="submit">Tambah Siswa</button>
    </form>

    <!-- Form Tambah Wali Kelas -->
    <form action="{{ url('/admin/walikelas') }}" method="POST">
        @csrf
        <label for="guru_id">Guru Wali Kelas:</label>
        <select name="guru_id" required>
            @foreach ($gurus as $guru)
                <option value="{{ $guru->id }}">{{ $guru->nama }}</option>
            @endforeach
        </select>
        <label for="kelas">Kelas:</label>
        <input type="text" name="kelas" required>
        <button type="submit">Tambah Wali Kelas</button>
    </form>

    <!-- Form Tambah Mata Pelajaran -->
    <form action="{{ url('/admin/mapel') }}" method="POST">
        @csrf
        <label for="nama">Mata Pelajaran:</label>
        <input type="text" name="nama" required>
        <button type="submit">Tambah Mata Pelajaran</button>
    </form>
</body>

</html>
