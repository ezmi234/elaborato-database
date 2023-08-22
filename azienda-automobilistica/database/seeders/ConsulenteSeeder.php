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
                'CF' => 'LMBMRA00A00A000A',
                'nome' => 'Marco',
                'cognome' => 'Lombardi',
                'data_nascita' => '2000-01-01',
                'telefono' => '3351234567',
                'percentuale_provvigione' => 0.12,
                'totale_provvigione' => 0,
                'codice_officina' => '1',
            ],
        );

        Consulente::create(
            [
                'CF' => 'MRNLCU00A00A000A',
                'nome' => 'Lucia',
                'cognome' => 'Marini',
                'data_nascita' => '2000-01-02',
                'telefono' => '3351234568',
                'percentuale_provvigione' => 0.10,
                'totale_provvigione' => 0,
                'codice_officina' => '1',
            ],
        );

        Consulente::create(
            [
                'CF' => 'MRNLCU00A00A000B',
                'nome' => 'Luca',
                'cognome' => 'Marini',
                'data_nascita' => '2000-01-03',
                'telefono' => '3351234569',
                'percentuale_provvigione' => 0.15,
                'totale_provvigione' => 0,
                'codice_officina' => '1',
            ],
        );



    }
}
