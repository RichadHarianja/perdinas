<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JenisTransportasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jenis_transportasi')->insert([
            'tipe_perjalanan_id' => 1,
            'nama' => 'Bus'
        ]);

        DB::table('jenis_transportasi')->insert([
            'tipe_perjalanan_id' => 1,
            'nama' => 'Motor'
        ]);

        DB::table('jenis_transportasi')->insert([
            'tipe_perjalanan_id' => 1,
            'nama' => 'Mobil/Taxi'
        ]);

        DB::table('jenis_transportasi')->insert([
            'tipe_perjalanan_id' => 1,
            'nama' => 'Kereta Api'
        ]);

        DB::table('jenis_transportasi')->insert([
            'tipe_perjalanan_id' => 2,
            'nama' => 'Kapal Laut'
        ]);

        DB::table('jenis_transportasi')->insert([
            'tipe_perjalanan_id' => 3,
            'nama' => 'Pesawat'
        ]);
    }
}
