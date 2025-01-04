<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Rekapitulasi Nilai SDN Karangmalang</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="https://tse2.mm.bing.net/th?id=OIP.r1wF2U_5JclIewGU0DAW5wHaHa&pid=Api" type="image/x-icon">
</head>

<body class="bg-gray-100 h-screen font-sans">
    <div class="flex h-full">
        <!-- Sidebar -->
        <div class="w-64 bg-white shadow-lg">
            <div class="flex items-center justify-center h-16 bg-blue-500 text-white font-bold">
                <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 10h11M9 21l-6-6 6-6m11 6h-8" />
                </svg>
                <span class="ml-2">SDN Karangmalang</span>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-5">
                <ul>
                    <!-- Admin Section (akses semua menu) -->
                    @if (Auth::user()->role == 'admin')
                        <li class="{{ request()->is('admin') ? 'bg-gray-200' : '' }} hover:bg-gray-200">
                            <a href="{{ route('admin.index') }}" class="flex items-center p-3 text-gray-700">
                                <img src="{{ asset('images/dashboard.png') }}" alt="Dashboard Icon" class="w-6 h-6">
                                <span class="ml-3">Dashboard</span>
                            </a>
                        </li>
                        <li class="{{ request()->is('admin/walikelas*') ? 'bg-gray-200' : '' }} hover:bg-gray-200">
                            <a href="{{ route('admin.walikelas.index') }}" class="flex items-center p-3 text-gray-700">
                                <img src="{{ asset('images/teacher.png') }}" alt="Wali Kelas Icon" class="w-6 h-6">
                                <span class="ml-3">Wali Kelas</span>
                            </a>
                        </li>
                        <li class="{{ request()->is('admin/siswa*') ? 'bg-gray-200' : '' }} hover:bg-gray-200">
                            <a href="{{ route('admin.siswa.index') }}" class="flex items-center p-3 text-gray-700">
                                <img src="{{ asset('images/student.png') }}" alt="Siswa Icon" class="w-6 h-6">
                                <span class="ml-3">Siswa</span>
                            </a>
                        </li>
                    @endif

                    <!-- Wali Kelas Section -->
                    @if (Auth::user()->role == 'walikelas')
                        <li class="{{ request()->is('walikelas*') ? 'bg-gray-200' : '' }} hover:bg-gray-200">
                            <a href="{{ route('walikelas.index') }}" class="flex items-center p-3 text-gray-700">
                                <img src="{{ asset('images/teacher.png') }}" alt="Wali Kelas Icon" class="w-6 h-6">
                                <span class="ml-3">Wali Kelas</span>
                            </a>
                        </li>
                    @endif

                    <!-- Siswa Section -->
                    @if (Auth::user()->role == 'siswa')
                        <li class="{{ request()->is('siswa*') ? 'bg-gray-200' : '' }} hover:bg-gray-200">
                            <a href="{{ route('siswa.index') }}" class="flex items-center p-3 text-gray-700">
                                <img src="{{ asset('images/student.png') }}" alt="Siswa Icon" class="w-6 h-6">
                                <span class="ml-3">Siswa</span>
                            </a>
                        </li>
                    @endif
                </ul>
            </nav>
        </div>

        <!-- Main Layout -->
        <div class="flex-1 flex flex-col bg-white">
            <!-- Navbar -->
            <header class="h-16 bg-white shadow flex items-center justify-between px-6">
                <div>
                    <h1 class="text-xl font-semibold">Dashboard</h1>
                </div>
                <div class="flex items-center relative">
                    <!-- Profile Button -->
                    <button class="flex items-center focus:outline-none" id="profileMenuButton"
                        onclick="toggleDropdown()">
                        <img src="{{ Auth::user()->profile_photo_url ?? asset('images/teacher.png') }}" alt="Profile"
                            class="w-8 h-8 rounded-full">
                        <span class="ml-2 text-gray-700">{{ Auth::user()->name }}</span>
                        <svg class="w-4 h-4 ml-1 text-gray-600" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>

                    <!-- Dropdown Menu -->
                    <div id="profileDropdown"
                        class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg hidden z-10">
                        @if (Auth::user()->role == 'siswa')
                            <a href="{{ route('siswa.profile') }}"
                                class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Profil</a>
                        @elseif (Auth::user()->role == 'walikelas')
                            <a href="{{ route('walikelas.profile') }}"
                                class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Profil</a>
                        @endif
                        <form action="{{ route('logout') }}" method="POST"
                            class="block px-4 py-2 text-gray-800 hover:bg-gray-100">
                            @csrf
                            <button type="submit" class="w-full text-left">Logout</button>
                        </form>
                    </div>
                </div>
            </header>

            <!-- Content Area -->
            <main class="flex-1 bg-gray-50 p-6">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="w-full h-full border-2 border-dashed border-gray-300 p-4">
                    @yield('content')
                </div>
            </main>

            <!-- Footer -->
            <div class="footer bg-white text-center py-3">
                <p>&copy; 2025 Sistem Rekapitulasi Nilai Digital SDN Karangmalang</p>
            </div>
        </div>

        <script>
            function toggleDropdown() {
                const dropdown = document.getElementById('profileDropdown');
                dropdown.classList.toggle('hidden');
            }
        </script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
