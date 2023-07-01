<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcquistoInStore extends Model
{
    use HasFactory;
    protected $table = 'acquisti_in_store';

    protected $fillable = [
        'costo_totale',
        'metodo_pagamento',
        'CF_cliente',
        'codice_officina'
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'CF_cliente', 'CF');
    }

    public function officina()
    {
        return $this->belongsTo(Officina::class, 'codice_officina', 'codice_officina');
    }

    public function accessori()
    {
        return $this->belongsToMany(Accessorio::class, 'comprendono', 'codice_acquisto', 'codice_accessorio');
    }

}
