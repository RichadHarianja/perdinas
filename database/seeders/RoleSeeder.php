<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('role')->insert([
            'id' => 1,
            'nama' => 'Super Admin',
        ]);

        DB::table('role')->insert([
            'id' => 2,
            'nama' => 'Karyawan'
        ]);

        DB::table('role')->insert([
            'id' => 3,
            'nama' => 'PUK'
        ]);
        
        DB::table('role')->insert([
            'id' => 4,
            'nama' => 'Budget Kustodian'
        ]);

        DB::table('role')->insert([
            'id' => 5,
            'nama' => 'Payment Control'
        ]);
    }
}
