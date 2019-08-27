<?php

use Illuminate\Database\Seeder;

use App\Models\Mining\Klasifikasi;

class KlasifikasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kelas = ['positif' => 0.5, 'negatif' => 0.5];

        foreach ($kelas as $kelas => $nilai_probabilitas) {
            Klasifikasi::create([
                'kelas'                 => $kelas,
                'nilai_probabilitas'    => $nilai_probabilitas
            ]);
        }
    }
}
