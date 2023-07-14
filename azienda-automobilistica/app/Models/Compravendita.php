<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compravendita extends Model
{
    use HasFactory;

    protected $table = 'compra_vendite_auto';

    protected $primaryKey = 'codice_compra_vendita';

    protected $fillable =[
        'tipo_vendita',
        'costo_totale',
        'metodo_pagamento',
        'CF_cliente',
        'codice_officina',
        'CF_consulente',
        'numero_telaio'
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'CF_cliente', 'CF');
    }

    public function officina()
    {
        return $this->belongsTo(Officina::class, 'codice_officina', 'codice_officina');
    }

    public function consulente()
    {
        return $this->belongsTo(Consulente::class, 'CF_consulente', 'CF');
    }

    public function veicolo()
    {
        return $this->belongsTo(Veicolo::class, 'numero_telaio', 'numero_telaio');
    }


}
