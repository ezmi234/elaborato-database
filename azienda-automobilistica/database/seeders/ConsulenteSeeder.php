<?php

namespace Database\Seeders;

use App\Models\Cliente;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Cliente::create(
            [
                'CF' => 'RSSMRA00A00A000A',
                'nome' => 'Mario',
                'cognome' => 'Rossi',
                'data_nascita' => '2000-01-01',
                'telefono' => '3331234567',
                'buono_acquisto' => 0,
            ],
        );

        Cliente::create(
            [
                'CF' => 'VRDGPP00A00A000A',
                'nome' => 'Giuseppe',
                'cognome' => 'Verdi',
                'data_nascita' => '2000-01-02',
                'telefono' => '3331234568',
                'buono_acquisto' => 0,
            ],
        );

        Cliente::create(
            [
                'CF' => 'BNCLCC00A00A000A',
                'nome' => 'Luca',
                'cognome' => 'Bianchi',
                'data_nascita' => '2000-01-03',
                'telefono' => '3331234569',
                'buono_acquisto' => 0,
            ],
        );

        Cliente::create(
            [
                'CF' => 'BNCLCC00A00A000B',
                'nome' => 'Matteo',
                'cognome' => 'Blu',
                'data_nascita' => '2000-01-04',
                'telefono' => '3331234570',
                'buono_acquisto' => 0,
            ],
        );
    }
}
