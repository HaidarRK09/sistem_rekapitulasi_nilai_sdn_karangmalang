<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .sidebar {
            min-height: 100vh;
        }

        .card-hover:hover {
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            transform: scale(1.05);
            transition: all 0.3s ease;
        }
    </style>
</head>

<body class="bg-gray-100 h-screen font-sans">
    <div class="flex h-full">
        <!-- Sidebar -->
        <aside class="sidebar w-64 bg-white shadow-lg">
            <!-- Sidebar Header -->
            <div class="flex items-center justify-center h-16 bg-blue-500 text-white font-bold">
                <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h11M9 21l-6-6 6-6m11 6h-8" />
                </svg>
                <span class="ml-2">SDN Karangmalang</span>
            </div>
            <!-- Sidebar Navigation -->
            <nav class="mt-5">
                <ul class="space-y-1">
                    {{-- <li class="hover:bg-gray-200">
                        <a href="#" class="flex items-center p-3 text-gray-700">
                            <img src="{{ asset('images/dashboard.png') }}" alt="Dashboard Icon" class="w-6 h-6">
                            <span class="ml-3">Dashboard</span>
                        </a>
                    </li> --}}
                    <li class="hover:bg-gray-200">
                        <a href="#" class="flex items-center p-3 text-gray-700">
                            <img src="{{ asset('images/teacher.png') }}" alt="Teacher Icon" class="w-6 h-6">
                            <span class="ml-3">Wali Kelas</span>
                        </a>
                    </li>
                    {{-- <li class="hover:bg-gray-200">
                        <a href="#" class="flex items-center p-3 text-gray-700">
                            <img src="{{ asset('images/student.png') }}" alt="Student Icon" class="w-6 h-6">
                            <span class="ml-3">Siswa</span>
                        </a>
                    </li> --}}
                </ul>
            </nav>
        </aside>

        <!-- Main Layout -->
        <div class="flex-1 flex flex-col">
            <!-- Navbar -->
            <header class="h-16 bg-white shadow flex items-center justify-between px-6">
                <h1 class="text-xl font-semibold">Dashboard</h1>
                <div class="flex items-center relative">
                    <!-- Profile Button -->
                    <button class="flex items-center focus:outline-none" id="profileMenuButton" onclick="toggleDropdown()">
                        <img src="{{ Auth::user()->profile_photo_url ?? asset('images/teacher.png') }}" alt="Profile" class="w-8 h-8 rounded-full">
                        <span class="ml-2 text-gray-700">{{ Auth::user()->name }}</span>
                        <svg class="w-4 h-4 ml-1 text-gray-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <!-- Dropdown Menu -->
                    <div id="profileDropdown" class="absolute right-0 mt-6 w-48 bg-white rounded-md shadow-lg hidden z-10">
                        <a href="{{ url('walikelas/profile') }}" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Profile</a>
                        <a href="{{ url('logout') }}" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Logout</a>
                    </div>
                </div>
            </header>

                    <!-- Dynamic Content Section -->
                    <div class="col">
                        @yield('content')
                    </div>
                </div>
            </main>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Toggle dropdown visibility
        function toggleDropdown() {
            const dropdown = document.getElementById('profileDropdown');
            dropdown.classList.toggle('hidden');
        }

        // Close dropdown when clicking outside
        document.addEventListener('click', function(event) {
            const dropdown = document.getElementById('profileDropdown');
            const button = document.getElementById('profileMenuButton');
            if (!button.contains(event.target) && !dropdown.contains(event.target)) {
                dropdown.classList.add('hidden');
            }
        });
    </script>
</body>

</html>
