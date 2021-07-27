<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengajuan extends Model
{
    use HasFactory;

    protected $table = 'pengajuan';

    protected $fillable = [
        'pengaju_id',
        'PUK_id',
        'judul_perjalanan',
        'jenis_transportasi_id',
        'tujuan_perjalanan_id',
        'datetime_keberangkatan',
        'datetime_kembali',
        'alamat_tujuan',
        'alamat_asal',
        'keterangan',
        'jumlah_pengajuan',
        'attachment',
        'status_id',
        'attachment_pencairan',
    ];

    public function pengaju(){
        return $this->belongsTo(User::class, 'pengaju_id', 'id');
    }

    public function PUK(){
        return $this->belongsTo(User::class, 'PUK_id', 'id');
    }

    public function jenis_transportasi(){
        return $this->belongsTo(JenisTransportasi::class, 'jenis_transportasi_id', 'id');
    }

    public function tujuan_perjalanan(){
        return $this->belongsTo(TujuanPerjalanan::class, 'tujuan_perjalanan_id', 'id');
    }

    public function status(){
        return $this->belongsTo(Status::class, 'status_id', 'id');
    }

    public function riwayat_status_pengajuan(){
        return $this->hasMany(RiwayatStatusPengajuan::class,'pengajuan_id', 'id');
    }
}
