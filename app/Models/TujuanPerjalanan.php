<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TujuanPerjalanan extends Model
{
    use HasFactory;

    protected $table = 'tujuan_perjalanan';

    protected $fillable = [
        'nama'
    ];

    public function pengajuan(){
        return $this->hasMany(Pengajuan::class, 'tujuan_perjalanan_id', 'id');
    }
}
