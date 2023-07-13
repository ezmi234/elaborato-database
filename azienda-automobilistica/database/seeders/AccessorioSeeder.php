<?php

namespace Database\Seeders;

use App\Models\Accessorio;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AccessorioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Accessorio::create(
            [
                'nome' => 'Cerchi in lega',
                'prezzo' => 1000,
            ],
        );
        Accessorio::create(
            [
                'nome' => 'Climatizzatore',
                'prezzo' => 500,
            ],
        );
        Accessorio::create(
            [
                'nome' => 'Coprivolante',
                'prezzo' => 15.50,
            ],
        );
    }
}
