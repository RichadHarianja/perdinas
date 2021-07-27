<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipePerjalananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipe_perjalanan')->insert([
            'id' => 1,
            'nama' => 'Darat',
        ]);

        DB::table('tipe_perjalanan')->insert([
            'id' => 2,
            'nama' => 'Laut',
        ]);

        DB::table('tipe_perjalanan')->insert([
            'id' => 3,
            'nama' => 'Udara',
        ]);
    }
}
