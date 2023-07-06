<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Intervento extends Model
{
    use HasFactory;

    protected $table = 'interventi';
    protected $primaryKey = 'codice_intervento';

    protected $fillable = [
        'costo_totale',
        'costo_ricambi',
        'costo_ore_di_lavoro',
        'metodo_pagamento',
        'data_fine',
        'CF_cliente',
        'codice_officina',
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'CF_cliente', 'CF');
    }

    public function officina()
    {
        return $this->belongsTo(Officina::class, 'codice_officina', 'codice_officina');
    }

    public function recensione()
    {
        return $this->hasOne(Recensione::class, 'codice_intervento', 'codice_intervento');
    }

    public function veicolo()
    {
        return $this->belongsTo(Veicolo::class, 'numero_telaio', 'numero_telaio');
    }
}
