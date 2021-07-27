<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('status')->insert([
            'id' => 1,
            'nama' => 'Buat Pengajuan',
        ]);

        DB::table('status')->insert([
            'id' => 2,
            'nama' => 'Edit Pengajuan',
        ]);

        DB::table('status')->insert([
            'id' => 3,
            'nama' => 'Menunggu Persetujuan PUK',
        ]);

        DB::table('status')->insert([
            'id' => 4,
            'nama' => 'Menunggu Persetujuan Budget Kustodian',
        ]);

        DB::table('status')->insert([
            'id' => 5,
            'nama' => 'Menunggu Persetujuan Payment Control',
        ]);

        DB::table('status')->insert([
            'id' => 6,
            'nama' => 'In Progress Pencairan Dana',
        ]);

        DB::table('status')->insert([
            'id' => 7,
            'nama' => 'Dana Dicairkan',
        ]);

        DB::table('status')->insert([
            'id' => 8,
            'nama' => 'Complete',
        ]);

        DB::table('status')->insert([
            'id' => 13,
            'nama' => 'Disetujui PUK',
        ]);

        DB::table('status')->insert([
            'id' => 14,
            'nama' => 'Disetujui Kustodian',
        ]);

        DB::table('status')->insert([
            'id' => 15,
            'nama' => 'Disetujui Payment Control',
        ]);

        DB::table('status')->insert([
            'id' => 23,
            'nama' => 'Ditolak PUK',
        ]);

        DB::table('status')->insert([
            'id' => 24,
            'nama' => 'Ditolak Budget Kustodian',
        ]);

        DB::table('status')->insert([
            'id' => 25,
            'nama' => 'Ditolak Payment Control',
        ]);
    }
}
