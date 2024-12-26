<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Nilai;
use App\Models\Siswa;
use Faker\Factory as Faker;

class DummyNilaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $siswaIds = Siswa::pluck('id');

        foreach ($siswaIds as $siswaId) {
            Nilai::create([
                'siswa_id' => $siswaId,

                'agama_tugas1' => $faker->numberBetween(50, 100),
                'agama_tugas2' => $faker->numberBetween(50, 100),
                'agama_tugas3' => $faker->numberBetween(50, 100),
                'agama_tugas4' => $faker->numberBetween(50, 100),
                'agama_tugas5' => $faker->numberBetween(50, 100),
                'agama_uts'    => $faker->numberBetween(50, 100),
                'agama_uas'    => $faker->numberBetween(50, 100),

                'pancasila_tugas1' => $faker->numberBetween(50, 100),
                'pancasila_tugas2' => $faker->numberBetween(50, 100),
                'pancasila_tugas3' => $faker->numberBetween(50, 100),
                'pancasila_tugas4' => $faker->numberBetween(50, 100),
                'pancasila_tugas5' => $faker->numberBetween(50, 100),
                'pancasila_uts'    => $faker->numberBetween(50, 100),
                'pancasila_uas'    => $faker->numberBetween(50, 100),

                'indonesia_tugas1' => $faker->numberBetween(50, 100),
                'indonesia_tugas2' => $faker->numberBetween(50, 100),
                'indonesia_tugas3' => $faker->numberBetween(50, 100),
                'indonesia_tugas4' => $faker->numberBetween(50, 100),
                'indonesia_tugas5' => $faker->numberBetween(50, 100),
                'indonesia_uts'    => $faker->numberBetween(50, 100),
                'indonesia_uas'    => $faker->numberBetween(50, 100),

                'matematika_tugas1' => $faker->numberBetween(50, 100),
                'matematika_tugas2' => $faker->numberBetween(50, 100),
                'matematika_tugas3' => $faker->numberBetween(50, 100),
                'matematika_tugas4' => $faker->numberBetween(50, 100),
                'matematika_tugas5' => $faker->numberBetween(50, 100),
                'matematika_uts'    => $faker->numberBetween(50, 100),
                'matematika_uas'    => $faker->numberBetween(50, 100),

                'pjok_tugas1' => $faker->numberBetween(50, 100),
                'pjok_tugas2' => $faker->numberBetween(50, 100),
                'pjok_tugas3' => $faker->numberBetween(50, 100),
                'pjok_tugas4' => $faker->numberBetween(50, 100),
                'pjok_tugas5' => $faker->numberBetween(50, 100),
                'pjok_uts'    => $faker->numberBetween(50, 100),
                'pjok_uas'    => $faker->numberBetween(50, 100),

                'sbk_tugas1' => $faker->numberBetween(50, 100),
                'sbk_tugas2' => $faker->numberBetween(50, 100),
                'sbk_tugas3' => $faker->numberBetween(50, 100),
                'sbk_tugas4' => $faker->numberBetween(50, 100),
                'sbk_tugas5' => $faker->numberBetween(50, 100),
                'sbk_uts'    => $faker->numberBetween(50, 100),
                'sbk_uas'    => $faker->numberBetween(50, 100),

                'inggris_tugas1' => $faker->numberBetween(50, 100),
                'inggris_tugas2' => $faker->numberBetween(50, 100),
                'inggris_tugas3' => $faker->numberBetween(50, 100),
                'inggris_tugas4' => $faker->numberBetween(50, 100),
                'inggris_tugas5' => $faker->numberBetween(50, 100),
                'inggris_uts'    => $faker->numberBetween(50, 100),
                'inggris_uas'    => $faker->numberBetween(50, 100),

                'muatanlokal_tugas1' => $faker->numberBetween(50, 100),
                'muatanlokal_tugas2' => $faker->numberBetween(50, 100),
                'muatanlokal_tugas3' => $faker->numberBetween(50, 100),
                'muatanlokal_tugas4' => $faker->numberBetween(50, 100),
                'muatanlokal_tugas5' => $faker->numberBetween(50, 100),
                'muatanlokal_uts'    => $faker->numberBetween(50, 100),
                'muatanlokal_uas'    => $faker->numberBetween(50, 100),
            ]);
        }
    }
}
