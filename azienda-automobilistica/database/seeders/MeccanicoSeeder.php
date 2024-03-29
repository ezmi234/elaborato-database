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
                'CF' => 'RSSRNS00A00A000A',
                'nome' => 'Ernesto',
                'cognome' => 'Rossi',
                'data_nascita' => '2000-01-01',
                'telefono' => '3331234567',
                'paga_oraria' => 10,
                'totale_ore_svolte' => 0,
                'codice_officina' => '1',
            ],
        );

        Meccanico::create(
            [
                'CF' => 'VQSDGPP00A00A000',
                'nome' => 'Tiziano',
                'cognome' => 'Verdi',
                'data_nascita' => '2000-01-02',
                'telefono' => '3384234568',
                'paga_oraria' => 10,
                'totale_ore_svolte' => 0,
                'codice_officina' => '1',
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
                'codice_officina' => '1',
            ],
        );



    }
}
