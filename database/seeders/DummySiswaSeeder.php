<?php

namespace Database\Seeders;

use App\Models\Siswa;
use Illuminate\Database\Seeder;

class DummySiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $siswaData = [
            [
                'name' => 'Siswa A',
                'nisn' => '1234567890',
                'place_of_birth' => 'Jakarta, DKI Jakarta',
                'date_of_birth' => '2005-01-15',
                'gender' => 'Laki-laki',
                'religion' => 'Islam',
                'address' => 'Jl. Merdeka No. 10, Jakarta',
                'phone' => '081234567890',
                'class' => '10A',
                'walikelas_id' => 2,
            ],
            [
                'name' => 'Siswa B',
                'nisn' => '1234567891',
                'place_of_birth' => 'Bandung, Jawa Barat',
                'date_of_birth' => '2006-02-20',
                'gender' => 'Perempuan',
                'religion' => 'Kristen',
                'address' => 'Jl. Braga No. 25, Bandung',
                'phone' => '081987654321',
                'class' => '10B',
                'walikelas_id' => 2,
            ],
        ];

        foreach ($siswaData as $siswa) {
            Siswa::create($siswa);
        }
    }
}
