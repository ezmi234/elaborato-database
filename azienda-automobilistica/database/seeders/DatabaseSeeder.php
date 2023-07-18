<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Consulente;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            OfficinaSeeder::class,
            VeicoloSeeder::class,
            AccessorioSeeder::class,
            ClienteSeeder::class,
            ConsulenteSeeder::class,
            MeccanicoSeeder::class,
            PezzoDiRicambioSeeder::class,
        ]);
    }
}
