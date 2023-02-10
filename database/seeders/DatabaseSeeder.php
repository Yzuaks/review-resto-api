<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        if (config('app.debug', false)) {
            $this->call([
                UserSeeder::class,
                RestoSeeder::class,
            ]);
        }
    }
}
