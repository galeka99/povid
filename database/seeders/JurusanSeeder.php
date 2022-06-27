<?php

namespace Database\Seeders;

use App\Models\Jurusan;
use Illuminate\Database\Seeder;

class JurusanSeeder extends Seeder
{
    public function run()
    {
        Jurusan::create([ 'id' => 1, 'name' => 'Teknik Sipil' ]);
        Jurusan::create([ 'id' => 2, 'name' => 'Teknik Mesin' ]);
        Jurusan::create([ 'id' => 3, 'name' => 'Teknik Elektro' ]);
        Jurusan::create([ 'id' => 4, 'name' => 'Akuntansi' ]);
        Jurusan::create([ 'id' => 5, 'name' => 'Administrasi Bisnis' ]);
    }
}
