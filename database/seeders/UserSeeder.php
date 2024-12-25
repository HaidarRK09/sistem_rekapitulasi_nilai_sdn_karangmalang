<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Menambahkan pengguna dengan role admin
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password123'), // Pastikan password di-hash
            'role' => 'admin',
        ]);

        // Menambahkan pengguna dengan role guru
        User::create([
            'name' => 'Guru User',
            'email' => 'guru@example.com',
            'password' => Hash::make('password123'),
            'role' => 'guru',
        ]);

        // Menambahkan pengguna dengan role siswa
        User::create([
            'name' => 'Siswa User',
            'email' => 'siswa@example.com',
            'password' => Hash::make('password123'),
            'role' => 'siswa',
        ]);
    }
}

