<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meccanico extends Model
{
    use HasFactory;

    protected $table = 'meccanici';

    protected $primaryKey = 'CF';

    public $incrementing = false;

    protected $fillable = [
        'CF',
        'nome',
        'cognome',
        'data_nascita',
        'telefono',
        'paga_oraria',
        'totale_ore_svolte',
        'bonus_recensione',
        'totale_recensioni',
        'numero_recensioni',
    ];

    public function acquisti()
    {
        return $this->hasMany(AcquistoInStore::class, 'CF_meccanico', 'CF');
    }

}
