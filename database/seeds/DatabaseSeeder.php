<?php

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
        // $this->call(UserSeeder::class);
        $this->call(KandangSeeder::class);
        $this->call(SuplierSeeder::class);
        $this->call(PelangganSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(KategoriSeeder::class);
    }
}
