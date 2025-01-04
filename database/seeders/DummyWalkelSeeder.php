<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Walkel;
use Illuminate\Database\Seeder;

class DummyWalkelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user1 = User::create([
            'name' => 'Budi Santoso',
            'email' => 'budi@gmail.com',
            'password' => bcrypt('budi123'),
            'role' => 'wali_kelas',
        ]);

        Walkel::create([
            'user_id' => $user1->id,
            'name' => 'Budi Santoso',
            'nip' => '1987654321',
            'nuptk' => '1234567890',
            'place_of_birth' => 'Bandung',
            'date_of_birth' => '1980-05-10',
            'education' => 'S1 Pendidikan',
            'position' => 'Wali Kelas 5',
            'rank' => 'Golongan IV/a',
        ]);

        $user2 = User::create([
            'name' => 'Andi Wijaya',
            'email' => 'andi@gmail.com',
            'password' => bcrypt('andi123'),
            'role' => 'wali_kelas',
        ]);

        Walkel::create([
            'user_id' => $user2->id,
            'name' => 'Andi Wijaya',
            'nip' => '9876543210',
            'nuptk' => '0987654321',
            'place_of_birth' => 'Jakarta',
            'date_of_birth' => '1978-08-15',
            'education' => 'S1 Pendidikan Matematika',
            'position' => 'Wali Kelas 3',
            'rank' => 'Golongan III/c',
        ]);
    }
}
