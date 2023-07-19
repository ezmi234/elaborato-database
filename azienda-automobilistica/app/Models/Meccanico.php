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
        'media_recensioni',
        'codice_officina',
    ];

    public function acquisti()
    {
        return $this->hasMany(AcquistoInStore::class, 'CF_meccanico', 'CF');
    }

    public function officina()
    {
        return $this->belongsTo(Officina::class, 'codice_officina', 'codice_officina');
    }

    public function stipendi(){
        return $this->hasMany(Stipendio::class, 'CF_meccanico', 'CF');
    }

}
