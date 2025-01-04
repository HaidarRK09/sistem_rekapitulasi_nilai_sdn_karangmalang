<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
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

<body class="bg-light">
    <div class="d-flex">
        <!-- Sidebar -->
        <div class="sidebar bg-white shadow-lg p-3">
            <div class="text-center mb-4">
                <h4 class="text-primary fw-bold">SDN Karangmalang</h4>
            </div>
            <nav>
                <ul class="list-unstyled">
                    <li class="mb-3">
                        <a href="#" class="d-flex align-items-center text-decoration-none text-dark p-2 rounded hover-bg-light">
                            <img src="{{ asset('images/dashboard.png') }}" alt="Dashboard Icon" class="me-2" width="24" height="24">
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="mb-3">
                        <a href="#" class="d-flex align-items-center text-decoration-none text-dark p-2 rounded hover-bg-light">
                            <img src="{{ asset('images/teacher.png') }}" alt="Teacher Icon" class="me-2" width="24" height="24">
                            <span>Wali Kelas</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="d-flex align-items-center text-decoration-none text-dark p-2 rounded hover-bg-light">
                            <img src="{{ asset('images/student.png') }}" alt="Student Icon" class="me-2" width="24" height="24">
                            <span>Siswa</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>

        <!-- Main Layout -->
        <div class="flex-grow-1">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm mb-4">
                <div class="container-fluid px-4">
                    <a class="navbar-brand fw-bold" href="#">Dashboard</a>
                    <div class="dropdown">
                        <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="profileMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="{{ Auth::user()->profile_photo_url ?? asset('images/teacher.png') }}" alt="Profile" class="rounded-circle" width="30">
                            <span class="ms-2">{{ Auth::user()->name }}</span>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileMenuButton">
                            <li><a class="dropdown-item" href="{{ url('walikelas/profile') }}">Profile</a></li>
                            <li><a class="dropdown-item" href="{{ url('logout') }}">Logout</a></li>
                        </ul>
                    </div>
                </div>
            </nav>

            <!-- Content Area -->
            <div class="container">
                <div class="row g-4">
                    <div class="col-md-4">
                        <div class="card card-hover border-0 shadow-sm">
                            <div class="card-body text-center">
                                <img src="{{ asset('images/dashboard.png') }}" alt="Dashboard Icon" width="50" class="mb-3">
                                <h5 class="card-title">Dashboard Overview</h5>
                                <p class="card-text">Lihat performa dan data sekolah secara ringkas.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-hover border-0 shadow-sm">
                            <div class="card-body text-center">
                                <img src="{{ asset('images/teacher.png') }}" alt="Teacher Icon" width="50" class="mb-3">
                                <h5 class="card-title">Data Wali Kelas</h5>
                                <p class="card-text">Manajemen data wali kelas dengan mudah.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-hover border-0 shadow-sm">
                            <div class="card-body text-center">
                                <img src="{{ asset('images/student.png') }}" alt="Student Icon" width="50" class="mb-3">
                                <h5 class="card-title">Data Siswa</h5>
                                <p class="card-text">Kelola data siswa dengan efisien.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Statistic Numbers -->
                <div class="row mt-5">
                    <div class="col-md-6">
                        <div class="card border-0 shadow-sm">
                            <div class="card-body text-center">
                                <h5 class="card-title">Jumlah Siswa</h5>
                                <p class="display-4 text-primary">175</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card border-0 shadow-sm">
                            <div class="card-body text-center">
                                <h5 class="card-title">Jumlah Wali Kelas</h5>
                                <p class="display-4 text-success">6</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
