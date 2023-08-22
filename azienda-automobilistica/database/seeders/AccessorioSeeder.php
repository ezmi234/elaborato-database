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
                'nome' => 'Coprivolante',
                'prezzo' => 15.50,
            ],
        );
        Accessorio::create(
            [
                'nome' => 'Tappetini',
                'prezzo' => 20.00,
            ],
        );
        Accessorio::create(
            [
                'nome' => 'Cuscino',
                'prezzo' => 8.50,
            ],
        );
        Accessorio::create(
            [
                'nome' => 'Cintura',
                'prezzo' => 5.00,
            ],
        );
        Accessorio::create(
            [
                'nome' => 'Cappello F1',
                'prezzo' => 10.00,
            ],
        );
    }
}
