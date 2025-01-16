<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Rekapitulasi Nilai SDN 1 Karangmalang</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/x-icon">
    <style>
        .sidebar-collapsed {
            width: 80px;
        }

        .sidebar-expanded {
            width: 256px;
        }

        .sidebar-collapsed .sidebar-text {
            display: none;
        }

        .sidebar-collapsed .sidebar-icon {
            margin: 0 auto;
        }

        .sidebar-toggle-btn {
            position: absolute;
            top: 0;
            right: 0;
            margin: 16px;
            z-index: 10;
        }

        .sidebar-logo {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 16px;
        }

        .sidebar-logo img {
            width: 40px;
            height: 40px;
        }

        .sidebar-collapsed .sidebar-toggle-btn {
            right: 0;
        }

        .table-responsive {
            overflow-x: auto;
        }

        .dropdown-menu {
            top: 100%; /* Position the dropdown below the button */
            left: auto;
            right: 0;
            margin-top: 0.5rem; /* Add some space between the button and the dropdown */
        }
    </style>
</head>

<body class="bg-gray-100 h-screen font-sans">
    <div class="flex h-full">
        <!-- Sidebar -->
        <div id="sidebar" class="sidebar-expanded bg-white shadow-lg transition-all duration-300 relative">
            <div class="sidebar-logo h-16 bg-blue-500 text-white font-bold">
                <div class="flex items-center">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo" class="sidebar-icon">
                    <span class="ml-2 sidebar-text">SDN Karangmalang</span>
                </div>
                <button onclick="toggleSidebar()" class="focus:outline-none sidebar-toggle-btn">
                    <svg id="toggleIcon" class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16m-7 6h7" />
                    </svg>
                </button>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-5">
                <ul>
                    <!-- Admin Section (akses semua menu) -->
                    @if (Auth::user()->role == 'admin')
                        <li class="{{ request()->is('admin') ? 'bg-gray-200' : '' }} hover:bg-gray-200">
                            <a href="{{ route('admin.index') }}" class="flex items-center p-3 text-gray-700">
                                <img src="{{ asset('images/dashboard.png') }}" alt="Dashboard Icon" class="w-6 h-6 sidebar-icon">
                                <span class="ml-3 sidebar-text">Dashboard</span>
                            </a>
                        </li>
                        <li class="{{ request()->is('admin/walikelas*') ? 'bg-gray-200' : '' }} hover:bg-gray-200">
                            <a href="{{ route('admin.walikelas.index') }}" class="flex items-center p-3 text-gray-700">
                                <img src="{{ asset('images/teacher.png') }}" alt="Wali Kelas Icon" class="w-6 h-6 sidebar-icon">
                                <span class="ml-3 sidebar-text">Wali Kelas</span>
                            </a>
                        </li>
                        <li class="{{ request()->is('admin/siswa*') ? 'bg-gray-200' : '' }} hover:bg-gray-200">
                            <a href="{{ route('admin.siswa.index') }}" class="flex items-center p-3 text-gray-700">
                                <img src="{{ asset('images/student.png') }}" alt="Siswa Icon" class="w-6 h-6 sidebar-icon">
                                <span class="ml-3 sidebar-text">Siswa</span>
                            </a>
                        </li>
                    @endif

                    <!-- Wali Kelas Section -->
                    @if (Auth::user()->role == 'walikelas')
                        <li class="{{ request()->is('walikelas*') ? 'bg-gray-200' : '' }} hover:bg-gray-200">
                            <a href="{{ route('walikelas.index') }}" class="flex items-center p-3 text-gray-700">
                                <img src="{{ asset('images/teacher.png') }}" alt="Wali Kelas Icon" class="w-6 h-6 sidebar-icon">
                                <span class="ml-3 sidebar-text">Wali Kelas</span>
                            </a>
                        </li>
                    @endif

                    <!-- Siswa Section -->
                    @if (Auth::user()->role == 'siswa')
                        <li class="{{ request()->is('siswa*') ? 'bg-gray-200' : '' }} hover:bg-gray-200">
                            <a href="{{ route('siswa.index') }}" class="flex items-center p-3 text-gray-700">
                                <img src="{{ asset('images/student.png') }}" alt="Siswa Icon" class="w-6 h-6 sidebar-icon">
                                <span class="ml-3 sidebar-text">Siswa</span>
                            </a>
                        </li>
                    @endif
                </ul>
            </nav>
        </div>

        <!-- Main Layout -->
        <div class="flex-1 flex flex-col bg-white overflow-auto">
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
            <main class="flex-1 bg-gray-50 p-6 overflow-auto">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="w-full border-2 border-dashed border-gray-300 p-4">
                    {{-- min-h-screen --}}
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

            function toggleSidebar() {
                const sidebar = document.getElementById('sidebar');
                const toggleIcon = document.getElementById('toggleIcon');
                sidebar.classList.toggle('sidebar-collapsed');
                sidebar.classList.toggle('sidebar-expanded');
                if (sidebar.classList.contains('sidebar-collapsed')) {
                    toggleIcon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />';
                } else {
                    toggleIcon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />';
                }
            }
        </script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>