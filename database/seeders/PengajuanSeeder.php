<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PengajuanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pengajuan')->insert([
            'id' => 1,
            'pengaju_id' => 2,
            'PUK_id' => 3,
            'judul_perjalanan' => 'perjalanan dinas',
            'jenis_transportasi_id' => 4,
            'tujuan_perjalanan_id' => 3,
            'datetime_keberangkatan' => '2021-06-24 09:30:00',
            'datetime_kembali' => '2021-07-08 15:35:00',
            'alamat_tujuan' => 'Majalengka',
            'alamat_asal' => 'Cirebon',
            'keterangan' => 'Inisiasi project',
            'jumlah_pengajuan' => 1000000,
            'attachment' => 'sample/sample.pdf',
            'status_id' => 3,
            'created_at' => Carbon::now(),
        ]);
    }
}
