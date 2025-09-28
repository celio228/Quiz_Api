<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            PhaseSeeder::class,
            ThemeSeeder::class,
            QuestionSeeder::class,
        ]);
    }
}