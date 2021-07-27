<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisTransportasi extends Model
{
    use HasFactory;

    protected $table = 'jenis_transportasi';

    protected $fillable = [
        'nama',
        'tipe_perjalanan_id'
    ];

    public function tipe_perjalanan(){
        return $this->belongsTo(TipePerjalanan::class, 'tipe_perjalanan_id', 'id');
    }

    public function pengajuan(){
        return $this->hasMany(Pengajuan::class, 'jenis_transportasi_id', 'id');
    }
}
