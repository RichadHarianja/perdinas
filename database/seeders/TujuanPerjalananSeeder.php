<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TujuanPerjalananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tujuan_perjalanan')->insert([
            'nama' => 'Rapat Kerja',
        ]);

        DB::table('tujuan_perjalanan')->insert([
            'nama' => 'Seminar/Pelatihan',
        ]);

        DB::table('tujuan_perjalanan')->insert([
            'nama' => 'Pilot Project',
        ]);

        DB::table('tujuan_perjalanan')->insert([
            'nama' => 'Penjajakan Kerjasama',
        ]);
    }
}
