<?php

use Illuminate\Database\Seeder;

use App\Models\Mining\TypoFixer;

class TypoFixerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $typos = [
            'kmu' => 'kamu',
            'kau' => 'kamu',
            'kau' => 'kamu',
            'nda' => 'tidak',
            'tak' => 'tidak',
            'gak' => 'tidak',
            'ngak' => 'tidak',
            'ngakk' => 'tidak',
            'enggak' => 'tidak',
            'enang' => 'emang',
            'emg' => 'emang',
            'emng' => 'emang',
            'sapa' => 'siapa',
            'krn' => 'karena',
            'karna' => 'karena',
            'x' => 'nya',
        ];

        foreach ($typos as $typo => $correction) {
            TypoFixer::create([
                'typo'          =>  $typo,
                'correction'    =>  $correction,
            ]);
        }
    }
}
