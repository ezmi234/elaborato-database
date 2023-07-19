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
            ],
        );

        Cliente::create(
            [
                'CF' => 'VQSDGPP00A00A000',
                'nome' => 'Giuseppe',
                'cognome' => 'Verdi',
                'data_nascita' => '2000-01-02',
                'telefono' => '3331234568',
            ],
        );

        Cliente::create(
            [
                'CF' => 'BMCLCC00A00A000A',
                'nome' => 'GLuca',
                'cognome' => 'Bianchi',
                'data_nascita' => '2000-01-03',
                'telefono' => '3331234569',
            ],
        );

        Cliente::create(
            [
                'CF' => 'GMCLCC00A00A000B',
                'nome' => 'GMatteo',
                'cognome' => 'Blu',
                'data_nascita' => '2000-01-04',
                'telefono' => '3331234570',
            ],
        );



    }
}
