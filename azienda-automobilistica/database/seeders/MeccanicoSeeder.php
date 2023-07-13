<?php

namespace Database\Seeders;

use App\Models\Meccanico;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MeccanicoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Meccanico::create(
            [
                'CF' => 'RSSMRA00A00A000A',
                'nome' => 'Mario',
                'cognome' => 'Rossi',
                'data_nascita' => '2000-01-01',
                'telefono' => '3331234567',
                'paga_oraria' => 10,
                'totale_ore_svolte' => 0,
                'bonus_recensione' => 0,
                'media_recensione' => 0
            ],
        );

        Meccanico::create(
            [
                'CF' => 'VRDGPP00A00A000A',
                'nome' => 'Giuseppe',
                'cognome' => 'Verdi',
                'data_nascita' => '2000-01-01',
                'telefono' => '3331234567',
                'paga_oraria' => 10,
                'totale_ore_svolte' => 0,
                'bonus_recensione' => 0,
                'media_recensione' => 0
            ],
        );

        Meccanico::create(
            [
                'CF' => 'BNCLCC00A00A000A',
                'nome' => 'Luca',
                'cognome' => 'Bianchi',
                'data_nascita' => '2000-01-01',
                'telefono' => '3331234567',
                'paga_oraria' => 10,
                'totale_ore_svolte' => 0,
                'bonus_recensione' => 0,
                'media_recensione' => 0
            ],
        );



    }
}
