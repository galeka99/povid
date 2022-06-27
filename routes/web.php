<?php

use Illuminate\Support\Facades\Route;

Route::any('/{any}', function () {
    return response()->json([
        'status' => 200,
        'error' => null,
        'data' => 'HALO SELAMAT DATANG'
    ]);
})->where('any', '.*');
