<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    use HasFactory;

    protected $fillable = ['full_name', 'gender', 'place_of_birth', 'date_of_birth', 'city_origin', 'kelas_id', 'confirmed_date', 'status'];
    protected $hidden = ['kelas_id'];
    protected $appends = ['kelas', 'prodi', 'jurusan'];

    public function getKelasAttribute()
    {
        $kelas = $this->belongsTo(Kelas::class, 'kelas_id', 'id')->getResults();
        return [
            'id' => $kelas->id,
            'name' => $kelas->name,
        ];
    }

    public function getProdiAttribute()
    {
        $kelas = $this->belongsTo(Kelas::class, 'kelas_id', 'id')->getResults();
        return [
            'id' => $kelas->prodi->id,
            'name' => $kelas->prodi->name,
        ];
    }

    public function getJurusanAttribute()
    {
        $kelas = $this->belongsTo(Kelas::class, 'kelas_id', 'id')->getResults();
        return [
            'id' => $kelas->prodi->jurusan->id,
            'name' => $kelas->prodi->jurusan->name,
        ];
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id', 'id');
    }
}
