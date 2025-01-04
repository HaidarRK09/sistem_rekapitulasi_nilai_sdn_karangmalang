<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Arial', sans-serif;
        }

        .navbar-custom {
            background-color: #343a40;
        }

        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            width: 250px;
            background-color: #343a40;
            color: #fff;
        }

        .sidebar a {
            color: #fff;
            text-decoration: none;
            padding: 10px 15px;
            display: flex;
            align-items: center;
        }

        .sidebar a:hover {
            background-color: #495057;
            padding-left: 20px;
            transition: 0.3s;
        }

        .sidebar a .icon {
            margin-right: 10px;
        }

        .content {
            margin-left: 260px;
            padding: 20px;
        }

        .card-header {
            font-weight: bold;
        }

        .card {
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .card .card-title {
            font-size: 2rem;
            color: #007bff;
        }

        .footer {
            text-align: center;
            padding: 10px;
            background-color: #343a40;
            color: #fff;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-custom">
        <div class="container-fluid">
            <a class="navbar-brand text-white d-flex align-items-center" href="#">
                <img src="https://via.placeholder.com/30" alt="Logo" class="me-2"> Admin Dashboard
            </a>
            <div class="d-flex">
                <a class="btn btn-outline-light" href="/logout">Logout</a>
            </div>
        </div>
    </nav>

    <!-- Sidebar -->
    <div class="sidebar">
        <ul class="nav flex-column p-3">
            <li class="nav-item">
                <a class="nav-link" href="/admin">
                    <span class="icon">🏠</span> Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/admin/walikelas">
                    <span class="icon">👨‍🏫</span> Data Wali Kelas
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/admin/siswa">
                    <span class="icon">👩‍🎓</span> Data Siswa
                </a>
            </li>
        </ul>
    </div>

    <!-- Footer -->
    <div class="footer">
        <p>&copy; 2025 Sistem Rekapitulasi Nilai Digital</p>
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
