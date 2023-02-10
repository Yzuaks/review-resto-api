<?php

namespace Database\Seeders;

use App\Models\Resto;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RestoSeeder extends Seeder
{
    public function run()
    {
        if (config('app.debug', false)) {
            Resto::factory()->count(100)->create();
        }
    }
}