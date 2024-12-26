<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
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
            <nav class="mt-5">
                <ul>
                    <li class="hover:bg-gray-200">
                        <a href="#" class="flex items-center p-3 text-gray-700">
                            <img src="{{ asset('images/dashboard.png') }}" alt="Dashboard Icon" class="w-6 h-6">
                            <span class="ml-3">Dashboard</span>
                        </a>
                    </li>
                    <div class="mt-1 border-t pt-1">
                        <li class="hover:bg-gray-200">
                            <a href="#" class="flex items-center p-3 text-gray-700">
                                <img src="{{ asset('images/teacher.png') }}" alt="Dashboard Icon" class="w-6 h-6">
                                <span class="ml-3">Wali Kelas</span>
                            </a>
                        </li>
                        <div class="mt-1 border-t pt-1">
                            <li class="hover:bg-gray-200">
                                <a href="#" class="flex items-center p-3 text-gray-700">
                                    <img src="{{ asset('images/student.png') }}" alt="Dashboard Icon" class="w-6 h-6">
                                    <span class="ml-3">Siswa</span>
                                </a>
                            </li>
                        </div>
                    </div>
                </ul>
            </nav>
        </div>

        <!-- Main Layout -->
        <div class="flex-1 flex flex-col">
            <!-- Navbar -->
            <header class="h-16 bg-white shadow flex items-center justify-between px-6">
                <div>
                    <h1 class="text-xl font-semibold">Dashboard</h1>
                </div>
                <div class="flex items-center">
                    <!-- User Info -->
                    <span class="mr-4 text-gray-700">{{ Auth::user()->name }}</span>
                    <!-- Logout Button -->
                    <a href="{{ url('logout') }}" class="p-2 bg-red-500 text-white rounded-lg hover:bg-red-600">
                        Logout
                    </a>
                </div>
            </header>

            <!-- Content Area -->
            <main class="flex-1 bg-gray-50 p-6">
                <div class="w-full h-full border-2 border-dashed border-gray-300 p-4">
                    <!-- Dynamic Content -->
                    <div class="col">
                        @yield('content')
                    </div>
                </div>
            </main>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
