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
        // Hapus semua data lama dari tabel siswas
        Siswa::query()->delete();

        $siswaData = [
            [
                'name' => 'Bakri',
                'nisn' => '0011223344',
                'place_of_birth' => 'Jakarta, DKI Jakarta',
                'date_of_birth' => '2005-01-15',
                'gender' => 'Laki-laki',
                'religion' => 'Islam',
                'address' => 'Jl. Merdeka No. 10, Jakarta',
                'phone' => '081234567890',
                'class' => '5A',
                'walikelas_id' => 2,
            ],
            [
                'name' => 'Adrian',
                'nisn' => '0099887766',
                'place_of_birth' => 'Bandung, Jawa Barat',
                'date_of_birth' => '2006-02-20',
                'gender' => 'Perempuan',
                'religion' => 'Kristen',
                'address' => 'Jl. Braga No. 25, Bandung',
                'phone' => '081987654321',
                'class' => '3B',
                'walikelas_id' => 2,
            ],
        ];

        foreach ($siswaData as $siswa) {
            Siswa::create($siswa);
        }
    }
}
