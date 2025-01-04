<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DummyUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'role' => 'admin',
                'password' => bcrypt('admin123'),
            ],
            [
                'name' => 'wali kelas',
                'email' => 'wali@gmail.com',
                'role' => 'wali_kelas',
                'password' => bcrypt('admin123'),
            ],
            [
                'name' => 'siswa',
                'email' => 'siswa@gmail.com',
                'role' => 'siswa',
                'password' => bcrypt('admin123'),
            ],
        ];

        foreach ($userData as $user) {
            User::create($user);
        }
    }
}
