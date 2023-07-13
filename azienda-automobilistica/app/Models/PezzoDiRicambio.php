<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PezzoDiRicambio extends Model
{
    use HasFactory;
    protected $table = 'pezzi_di_ricambio';
    protected $primaryKey = 'codice_Pezzo';

    public $timestamps = false;
    protected $fillable = [
        'codice_pezzo',
        'nome',
        'prezzo',
        'modello',

    ];




}
