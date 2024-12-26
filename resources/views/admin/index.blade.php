<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
</head>

<body>
    <h1>Selamat datang, {{ $name }}</h1>
    <nav>
        <a href="/admin/walikelas/siswa">Wali Kelas</a>
        <a href="/admin/siswa">Siswa</a>
        <a href="/admin/guru/create">Guru</a>
        <a href="/admin/mapel/create">Mata Pelajaran</a>
        <a href="/logout">Logout</a>
    </nav>
</body>

</html>
