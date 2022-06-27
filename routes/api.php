<?php

use App\Http\Controllers\KelasController;
use App\Http\Controllers\RecordController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function() {
    Route::get('/jurusans', [KelasController::class, 'get_jurusan']);
    Route::get('/jurusan/{id}/prodi', [KelasController::class, 'get_prodi']);
    Route::get('/prodi/{id}/kelas', [KelasController::class, 'get_kelas']);

    Route::prefix('records')->group(function() {
        Route::get('/', [RecordController::class, 'list']);
        Route::post('/', [RecordController::class, 'add']);
        Route::get('/statistics', [RecordController::class, 'statistics']);
        Route::get('/{id}', [RecordController::class, 'detail']);
        Route::put('/{id}', [RecordController::class, 'update']);
        Route::delete('/{id}', [RecordController::class, 'delete']);
    });
});