<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
    protected $table = 'clienti';
    protected $primaryKey = 'CF';
    public $incrementing = false;
    protected $fillable = [
        'CF',
        'nome',
        'cognome',
        'data_nascita',
        'telefono',
    ];

    public function acquisti()
    {
        return $this->hasMany(AcquistoInStore::class, 'CF_cliente', 'CF');
    }
    public function interventi()
    {
        return $this->hasMany(Intervento::class, 'CF_cliente', 'CF');
    }

    public function veicoli()
    {
        return $this->hasMany(Veicolo::class, 'CF_cliente', 'CF');
    }

    public function compravendite()
    {
        return $this->hasMany(Compravendita::class, 'CF_cliente', 'CF');
    }



}
