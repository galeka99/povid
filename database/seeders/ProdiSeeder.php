<?php

namespace Database\Seeders;

use App\Models\Prodi;
use Illuminate\Database\Seeder;

class ProdiSeeder extends Seeder
{
    public function run()
    {
        // JURUSAN TEKNIK SIPIL
        Prodi::create([ 'id' => 1, 'name' => 'D3 Konstruksi Gedung', 'jurusan_id' => 1 ]);
        Prodi::create([ 'id' => 2, 'name' => 'D3 Konstruksi Sipil', 'jurusan_id' => 1 ]);
        Prodi::create([ 'id' => 3, 'name' => 'S.Tr Teknik Perawatan dan Perbaikan Gedung', 'jurusan_id' => 1 ]);
        Prodi::create([ 'id' => 4, 'name' => 'S.Tr Perancangan Jalan dan Jembatan', 'jurusan_id' => 1 ]);

        // JURUSAN TEKNIK MESIN
        Prodi::create([ 'id' => 5, 'name' => 'D3 Teknik Mesin', 'jurusan_id' => 2 ]);
        Prodi::create([ 'id' => 6, 'name' => 'D3 Teknik Konversi Energi', 'jurusan_id' => 2 ]);
        Prodi::create([ 'id' => 7, 'name' => 'S.Tr Teknik Mesin Produksi dan Perawatan', 'jurusan_id' => 2 ]);
        Prodi::create([ 'id' => 8, 'name' => 'S.Tr Teknologi Rekayasa Pembangkit Energi', 'jurusan_id' => 2 ]);
        
        // JURUSAN TEKNIK ELEKTRO
        Prodi::create([ 'id' => 9, 'name' => 'D3 Teknik Listrik', 'jurusan_id' => 3 ]);
        Prodi::create([ 'id' => 10, 'name' => 'D3 Teknik Elektronika', 'jurusan_id' => 3 ]);
        Prodi::create([ 'id' => 11, 'name' => 'D3 Teknik Telekomunikasi', 'jurusan_id' => 3 ]);
        Prodi::create([ 'id' => 12, 'name' => 'D3 Teknik Informatika', 'jurusan_id' => 3 ]);
        Prodi::create([ 'id' => 13, 'name' => 'S.Tr Teknik Telekomunikasi', 'jurusan_id' => 3 ]);
        Prodi::create([ 'id' => 14, 'name' => 'S.Tr Teknologi Rekayasa Instalasi Listrik', 'jurusan_id' => 3 ]);
        Prodi::create([ 'id' => 15, 'name' => 'S.Tr Teknologi Rekayasa Komputer', 'jurusan_id' => 3 ]);
        Prodi::create([ 'id' => 16, 'name' => 'M.Tr Teknik Telekomunikasi', 'jurusan_id' => 3 ]);

        // JURUSAN AKUNTANSI
        Prodi::create([ 'id' => 17, 'name' => 'D3 Akuntansi', 'jurusan_id' => 4 ]);
        Prodi::create([ 'id' => 18, 'name' => 'D3 Keuangan dan Perbankan', 'jurusan_id' => 4 ]);
        Prodi::create([ 'id' => 19, 'name' => 'S.Tr Komputerisasi Akuntansi', 'jurusan_id' => 4 ]);
        Prodi::create([ 'id' => 20, 'name' => 'S.Tr Perbankan Syariah', 'jurusan_id' => 4 ]);
        Prodi::create([ 'id' => 21, 'name' => 'S.Tr Analis Keuangan', 'jurusan_id' => 4 ]);
        Prodi::create([ 'id' => 22, 'name' => 'S.Tr Akuntansi Manajerial', 'jurusan_id' => 4 ]);

        // JURUSAN ADMINISTRASI BISNIS
        Prodi::create([ 'id' => 23, 'name' => 'D3 Administrasi Bisnis', 'jurusan_id' => 5 ]);
        Prodi::create([ 'id' => 24, 'name' => 'D3 Manajemen Pemasaran', 'jurusan_id' => 5 ]);
        Prodi::create([ 'id' => 25, 'name' => 'S.Tr Manajemen Bisnis Internasional', 'jurusan_id' => 5 ]);
        Prodi::create([ 'id' => 26, 'name' => 'S.Tr Administrasi Bisnis Terapan', 'jurusan_id' => 5 ]);
    }
}
