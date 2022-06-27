<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'jurusan_id'];
    protected $hidden = ['jurusan_id', 'created_at', 'updated_at'];

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class, 'jurusan_id', 'id');
    }

    public function kelas()
    {
        return $this->hasMany(Kelas::class, 'prodi_id', 'id');
    }
}
