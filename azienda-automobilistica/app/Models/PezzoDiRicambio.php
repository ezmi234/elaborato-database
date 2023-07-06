<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PezziDiRicambio extends Model
{
    use HasFactory;
    protected $table = 'pezzi_di_ricambio';
    protected $primaryKey = 'codicePezzo';
    protected $fillable = [
        'codicePezzo',
        'nome',
        'prezzo',
        'modello',
    
    ];


    
    
}