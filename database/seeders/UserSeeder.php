<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'username' => 'superadmin',
            'password' => bcrypt('password'),
            'role_id' => 1,
            'posisi' => 'HRD',
            'bank' => 'BCA',
            'rekening' => '12345678'
        ]);

        DB::table('users')->insert([
            'name' => 'Karyawan',
            'username' => 'karyawan',
            'password' => bcrypt('password'),
            'role_id' => 2,
            'posisi' => 'Engineer',
            'bank' => 'BCA',
            'rekening' => '12345678'
        ]);

        DB::table('users')->insert([
            'name' => 'PUK',
            'username' => 'puk',
            'password' => bcrypt('password'),
            'role_id' => 3,
            'posisi' => 'Manager',
            'bank' => 'BCA',
            'rekening' => '12345678'
        ]);

        DB::table('users')->insert([
            'name' => 'Budget Kustodian',
            'username' => 'budget',
            'password' => bcrypt('password'),
            'role_id' => 4,
            'posisi' => 'Head of Finance',
            'bank' => 'BCA',
            'rekening' => '12345678'
        ]);

        DB::table('users')->insert([
            'name' => 'Payment Control',
            'username' => 'payment',
            'password' => bcrypt('password'),
            'role_id' => 5,
            'posisi' => 'Finance',
            'bank' => 'BCA',
            'rekening' => '12345678'
        ]);
    }
}
