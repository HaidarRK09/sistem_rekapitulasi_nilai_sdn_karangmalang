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
        $user1 = User::create([
            'name' => 'Bondan Prakoso',
            'email' => 'bondan@gmail.com',
            'password' => bcrypt('bondan123'),
            'role' => 'siswa',
        ]);

        Siswa::create([
            'user_id' => $user1->id,
            'name' => 'Bondan Prakoso',
            'nisn' => '0011223344',
            'place_of_birth' => 'Jakarta, DKI Jakarta',
            'date_of_birth' => '2005-01-15',
            'gender' => 'Laki-laki',
            'religion' => 'Islam',
            'address' => 'Jl. Merdeka No. 10, Jakarta',
            'phone' => '081234567890',
            'class' => 'Kelas 5',
        ]);

        $user2 = User::create([
            'name' => 'Siti Rahmawati',
            'email' => 'siti@gmail.com',
            'password' => bcrypt('siti123'),
            'role' => 'siswa',
        ]);

        Siswa::create([
            'user_id' => $user2->id,
            'name' => 'Siti Rahmawati',
            'nisn' => '0099887766',
            'place_of_birth' => 'Bandung, Jawa Barat',
            'date_of_birth' => '2006-02-20',
            'gender' => 'Perempuan',
            'religion' => 'Kristen',
            'address' => 'Jl. Braga No. 25, Bandung',
            'phone' => '081987654321',
            'class' => 'Kelas 3',
        ]);
    }
}
