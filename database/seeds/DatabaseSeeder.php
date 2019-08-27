<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(TypoFixerSeeder::class);
        $this->call(KlasifikasiSeeder::class);
        $this->call(DictionarySeeder::class);
    }
}
