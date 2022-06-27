<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use App\Models\Prodi;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function get_jurusan()
    {
        $jurusans = Jurusan::all();
        return response()->json([
            'status' => 200,
            'error' => null,
            'data' => $jurusans,
        ]);
    }

    public function get_prodi(int $id)
    {
        $jurusan = Jurusan::find($id);
        if (!$jurusan) return response()->json([
            'status' => 404,
            'error' => 'JURUSAN_NOT_FOUND',
            'data' => null,
        ], 404);

        return response()->json([
            'status' => 200,
            'error' => null,
            'data' => $jurusan->prodi,
        ]);
    }

    public function get_kelas(int $id)
    {
        $prodi = Prodi::find($id);
        if (!$prodi) return response()->json([
            'status' => 404,
            'error' => 'PRODI_NOT_FOUND',
            'data' => null,
        ], 404);

        return response()->json([
            'status' => 200,
            'error' => null,
            'data' => $prodi->kelas,
        ]);
    }
}
