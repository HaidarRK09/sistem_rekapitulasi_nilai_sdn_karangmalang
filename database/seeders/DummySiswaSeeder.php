<?php

namespace Database\Seeders;

use App\Models\Siswa;
use App\Models\User;
use Illuminate\Database\Seeder;

class DummySiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $classes = ['Kelas 1', 'Kelas 2', 'Kelas 3', 'Kelas 4', 'Kelas 5', 'Kelas 6'];
        $names = [
            'Bondan Prakoso', 'Siti Rahmawati', 'Agus Santoso', 'Dewi Lestari', 'Budi Setiawan',
            'Rina Susanti', 'Andi Wijaya', 'Fitri Handayani', 'Eko Prasetyo', 'Lina Marlina',
            'Tono Supriyadi', 'Sari Puspita', 'Rudi Hartono', 'Maya Sari', 'Dedi Suhendar',
            'Nina Kurnia', 'Yudi Setiawan', 'Lilis Suryani', 'Hendra Wijaya', 'Rita Puspita',
            'Tina Marlina', 'Doni Prasetyo', 'Susi Handayani', 'Fajar Santoso', 'Lina Susanti',
            'Rudi Setiawan', 'Maya Handayani', 'Dewi Prasetyo', 'Agus Wijaya', 'Siti Lestari'
        ];

        foreach ($classes as $class) {
            for ($i = 0; $i < 5; $i++) {
                $name = $names[array_rand($names)];
                $email = strtolower(str_replace(' ', '', $name)) . $i . rand(1000, 9999) . '@gmail.com';
                $user = User::create([
                    'name' => $name,
                    'email' => $email,
                    'password' => bcrypt($name . '123'),
                    'role' => 'siswa',
                ]);

                Siswa::create([
                    'user_id' => $user->id,
                    'name' => $name,
                    'nisn' => '00' . rand(100000, 999999),
                    'place_of_birth' => 'Jakarta, DKI Jakarta',
                    'date_of_birth' => '2005-01-15',
                    'gender' => 'Laki-laki',
                    'religion' => 'Islam',
                    'address' => 'Jl. Merdeka No. 10, Jakarta',
                    'phone' => '081234567' . rand(100, 999),
                    'class' => $class,
                ]);
            }
        }
    }
}
