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
        'buono_acquisto',
    ];

    public function acquisti()
    {
        return $this->hasMany(AcquistoInStore::class, 'CF_cliente', 'CF');
    }


}
