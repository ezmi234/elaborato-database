<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consulente extends Model
{
    use HasFactory;
    protected $table = 'consulenti';
    protected $primaryKey = 'CF';
    public $incrementing = false;
    protected $fillable = [
        'CF',
        'nome',
        'cognome',
        'data_nascita',
        'telefono',
        'percentuale_provvigione',
        'totale_provvigione',
        'totale_recensioni',
        'numero_recensioni',
        'media_recensioni',
        'codice_officina',
    ];

    public function compraVenditeAuto()
    {
        return $this->hasMany(CompraVenditaAuto::class, 'CF_consulente', 'CF');
    }

    public function officina()
    {
        return $this->belongsTo(Officina::class, 'codice_officina', 'codice_officina');
    }

    public function stipendi(){
        return $this->hasMany(Stipendio::class, 'CF_consulente', 'CF');
    }


}
