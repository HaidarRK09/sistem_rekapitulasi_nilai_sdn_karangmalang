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
        $positions = [
            'Wali Kelas 1',
            'Wali Kelas 2',
            'Wali Kelas 3',
            'Wali Kelas 4',
            'Wali Kelas 5',
            'Wali Kelas 6'
        ];
        $names = [
            'Budi Santoso',
            'Andi Wijaya',
            'Nur Hasanah',
            'Dewi Rahmawati',
            'Agus Pancoro',
            'Siti Kusumawati'
        ];
        $places_of_birth = ['Bandung', 'Jakarta', 'Surabaya', 'Medan', 'Yogyakarta', 'Semarang'];
        $dates_of_birth = ['1980-05-10', '1978-08-15', '1982-03-20', '1979-11-25', '1981-07-30', '1983-02-14'];
        $educations = [
            'S1 Pendidikan',
            'S1 Pendidikan Matematika',
            'S1 Pendidikan Bahasa Indonesia',
            'S1 Pendidikan IPA',
            'S1 Pendidikan IPS',
            'S1 Pendidikan PKN'
        ];
        $ranks = ['Golongan IV/a', 'Golongan III/c', 'Golongan III/b', 'Golongan III/a', 'Golongan II/d', 'Golongan II/c'];

        for ($i = 0; $i < 6; $i++) {
            $user = User::create([
                'name' => $names[$i],
                'email' => strtolower(str_replace(' ', '', $names[$i])) . '@gmail.com',
                'password' => bcrypt('name' . '123'),
                'role' => 'walikelas',
            ]);

            Walkel::create([
                'user_id' => $user->id,
                'name' => $names[$i],
                'nip' => '98765432' . $i,
                'nuptk' => '09876543' . $i,
                'place_of_birth' => $places_of_birth[$i],
                'date_of_birth' => $dates_of_birth[$i],
                'education' => $educations[$i],
                'position' => $positions[$i],
                'rank' => $ranks[$i],
            ]);
        }
    }
}
