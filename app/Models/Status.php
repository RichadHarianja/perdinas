<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;

    protected $table = 'status';

    public function pengajuan(){
        return $this->hasMany(Pengajuan::class, 'status_id', 'id');
    }

    public function riwayat_status_pengajuan(){
        return $this->hasMany(Pengajuan::class, 'status_id', 'id');
    }
}
