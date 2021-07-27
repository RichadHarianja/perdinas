<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipePerjalanan extends Model
{
    use HasFactory;

    protected $table = 'tipe_perjalanan';

    protected $fillable = [
        'nama'
    ];

    public function jenis_transportasi(){
        return $this->hasMany(JenisTransportasi::class, 'tipe_perjalanan_id', 'id');
    }
}
