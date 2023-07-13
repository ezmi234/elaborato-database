<?php

namespace Database\Seeders;

use App\Models\Veicolo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VeicoloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Veicolo::create(
            [
                'numero_telaio' => '12345678901234567',
                'marca' => 'Fiat',
                'modello' => 'Panda',
                'targa' => 'AB123CD',
                'anno_immatricolazione' => 2010,
                'colore' => 'Bianco',
            ],
        );
        Veicolo::create(
            [
                'numero_telaio' => '12345678901234568',
                'marca' => 'Alfa Romeo',
                'modello' => 'Giulietta',
                'targa' => 'AB123CE',
                'anno_immatricolazione' => 2011,
                'colore' => 'Nero',
            ],
        );
        Veicolo::create(
            [
                'numero_telaio' => '12345678901234569',
                'marca' => 'Fiat',
                'modello' => 'Punto',
                'targa' => 'AB123CF',
                'anno_immatricolazione' => 2012,
                'colore' => 'Rosso',
            ],
        );
        Veicolo::create(
            [
                'numero_telaio' => '12345678901234570',
                'marca' => 'Fiat',
                'modello' => 'Panda',
                'targa' => 'AB123CG',
                'anno_immatricolazione' => 2013,
                'colore' => 'Bianco',
            ],
        );
        Veicolo::create(
            [
                'numero_telaio' => '12345678901234571',
                'marca' => 'Renault',
                'modello' => 'Clio',
                'targa' => 'AB123CH',
                'anno_immatricolazione' => 2008,
                'colore' => 'Blu',
            ]
        );
    }
}
