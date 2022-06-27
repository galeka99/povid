<?php

use Carbon\Carbon;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('records', function (Blueprint $table) {
            // GENDER:
            // 1 - Laki-Laki
            // 2 - Perempuan

            // STATUS:
            // 1 - POSITIF
            // 2 - SEMBUH
            // 3 - MENINGGAL

            $table->id();
            $table->string('full_name');
            $table->unsignedTinyInteger('gender')->default(1);
            $table->string('place_of_birth');
            $table->date('date_of_birth');
            $table->string('city_origin');
            $table->foreignId('kelas_id')->constrained('kelas')->cascadeOnUpdate()->cascadeOnDelete();
            $table->date('confirmed_date')->default(Carbon::now());
            $table->unsignedTinyInteger('status')->default(1);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('records');
    }
};
