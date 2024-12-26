<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>
<body>
    <header>
        <nav>
            <a href="{{ route('admin.index') }}">Dashboard</a>
            <a href="{{ route('admin.siswa') }}">Kelola Siswa</a>
            <a href="{{ route('admin.guru') }}">Kelola Guru</a>
            <a href="{{ route('logout') }}">Logout</a>
        </nav>
    </header>
    <main>
        @yield('content')
    </main>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
