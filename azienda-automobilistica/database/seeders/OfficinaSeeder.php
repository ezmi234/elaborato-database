<?php

namespace Database\Seeders;

use App\Models\Officina;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OfficinaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Officina::create(
            [
                'codice_officina' => '1',
                'nome' => 'CesenaAuto',
                'sede_città' => 'Cesena',
                'sede_via' => 'Via Roma',
                'sede_civico' => 12,
                'bilancio' => 0,
                'centrale' => true,
                'gestita_da' => null,
            ],
        );
    }
}
