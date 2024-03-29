<?php

namespace Database\Seeders;

use App\Models\PezzoDiRicambio;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PezzoDiRicambioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PezzoDiRicambio::create(
            [
                'codice_pezzo' => '1234567890',
                'nome' => 'Pneumatico',
                'prezzo' => 150,
                'modello' => 'Pirelli PZero',
            ],
        );

        PezzoDiRicambio::create(
            [
                'codice_pezzo' => '0987654321',
                'nome' => 'Pneumatico',
                'prezzo' => 175.50,
                'modello' => 'Michelin Pilot Sport 4',
            ],
        );

        PezzoDiRicambio::create(
            [
                'codice_pezzo' => '1234567812',
                'nome' => 'Pneumatico',
                'prezzo' => 200,
                'modello' => 'Pirelli PZero',
            ],
        );

        PezzoDiRicambio::create(
            [
                'codice_pezzo' => '0987654342',
                'nome' => 'Candela',
                'prezzo' => 17.99,
                'modello' => 'Valvoline 1234',
            ],
        );

        PezzoDiRicambio::create(
            [
                'codice_pezzo' => '1234567820',
                'nome' => 'pistone',
                'prezzo' => 150,
                'modello' => 'Pistone 1234',
            ],
        );



   }
}
