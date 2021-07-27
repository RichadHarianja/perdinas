<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            TipePerjalananSeeder::class,
            JenisTransportasiSeeder::class,
            TujuanPerjalananSeeder::class,
            StatusSeeder::class,
            PengajuanSeeder::class,
            RiwayatStatusPengajuan::class,
        ]);
    }
}
