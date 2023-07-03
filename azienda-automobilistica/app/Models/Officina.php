<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Officina extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'officine';
    protected $primaryKey = 'codice_officina';
    protected $fillable = [
        'codice_officina',
        'nome',
        'sede_città',
        'sede_via',
        'sede_civico',
        'bilancio',
        'centrale',
        'gestita_da',
    ];
}
