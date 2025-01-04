<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="icon" href="https://tse2.mm.bing.net/th?id=OIP.r1wF2U_5JclIewGU0DAW5wHaHa&pid=Api" type="image/x-icon">
    <title>Login Sistem Rekapitulasi Nilai SDN Karangmalang</title>
    <style>
        .center-container {
            max-width: 400px;
            margin-top: 50px;
            background-color: #f8f9fa;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            padding: 20px;
        }

        .logo {
            display: block;
            margin: 0 auto 20px;
            max-width: 100px;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #343a40;
        }
    </style>
</head>

<body>
    <div class="container d-flex justify-content-center">
        <div class="center-container">
            <!-- Logo Pendidikan -->
            <img src="https://tse2.mm.bing.net/th?id=OIP.r1wF2U_5JclIewGU0DAW5wHaHa&pid=Api" 
                 alt="Logo Kementerian Pendidikan" 
                 class="logo">

            <!-- Judul -->
            <h1>Login</h1>

            <!-- Pesan Error -->
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $item)
                            <li>{{ $item }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Form Login -->
            <form action="" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Masukkan email Anda">
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Masukkan password Anda">
                </div>

                <div class="d-grid">
                    <button name="submit" type="submit" class="btn btn-primary">Login</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
