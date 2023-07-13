<?php

namespace Database\Seeders;

use App\Models\Consulente;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ConsulenteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Consulente::create(
            [
                'CF' => 'RSSMRA00A00A000A',
                'nome' => 'Mario',
                'cognome' => 'Rossi',
                'data_nascita' => '2000-01-01',
                'telefono' => '3331234567',
                'percentuale_provvigione' => 4.50,
                'totale_provvigione' => 1.10,
                'bonus_recensione' => 1.10,
                'media_recensione' => 1.2,
            ],
        );

        Consulente::create(
            [
                'CF' => 'VRDGPP00A00A000A',
                'nome' => 'Giuseppe',
                'cognome' => 'Verdi',
                'data_nascita' => '2000-01-01',
                'telefono' => '3331234467',
                'percentuale_provvigione' => 3.50,
                'totale_provvigione' => 1.10,
                'bonus_recensione' => 1.10,
                'media_recensione' => 1.3,
            ],
        );

        Consulente::create(
            [
                'CF' => 'BNCLCA00A00A000A',
                'nome' => 'Carlo',
                'cognome' => 'Bianchi',
                'data_nascita' => '2000-01-01',
                'telefono' => '3331214567',
                'percentuale_provvigione' => 0.50,
                'totale_provvigione' => 1.10,
                'bonus_recensione' => 1.10,
                'media_recensione' => 1.3,
            ],
        );



    }
}
