<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class RiwayatStatusPengajuan extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('riwayat_status_pengajuan')->insert([
            'pengajuan_id' => 1,
            'status_id' => 1,
            'created_at' => Carbon::now(),
        ]);

        DB::table('riwayat_status_pengajuan')->insert([
            'pengajuan_id' => 1,
            'status_id' => 3,
            'created_at' => Carbon::now(),
        ]);
    }
}
