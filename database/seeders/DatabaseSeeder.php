<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            JurusanSeeder::class,
            ProdiSeeder::class,
            KelasSeeder::class,
        ]);
    }
}
