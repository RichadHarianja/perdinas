<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatStatusPengajuan extends Model
{
    use HasFactory;

    protected $table = 'riwayat_status_pengajuan';

    protected $fillable = [
        'approver_id',
        'pengajuan_id',
        'status_id',
        'keterangan',
    ];

    public function approver(){
        return $this->belongsTo(User::class, 'approver_id', 'id');
    }

    public function pengajuan(){
        return $this->belongsTo(Pengajuan::class, 'pengajuan_id', 'id');
    }

    public function status(){
        return $this->belongsTo(Status::class, 'status_id', 'id');
    }
}
