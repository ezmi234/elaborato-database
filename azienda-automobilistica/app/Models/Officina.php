<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Officina extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'officine';
    protected $fillable = [
        'codice_officina',
        'nome',
        'sede_città',
        'sede_via',
        'sede_civico',
        'bilancio',
        'centrale'
    ];
}
