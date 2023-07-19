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

    public function consulenti()
    {
        return $this->hasMany(Consulente::class, 'codice_officina', 'codice_officina');
    }

    public function meccanici()
    {
        return $this->hasMany(Meccanico::class, 'codice_officina', 'codice_officina');
    }

    public function interventi()
    {
        return $this->hasMany(Intervento::class, 'codice_officina', 'codice_officina');
    }
    public function acquisti()
    {
        return $this->hasMany(AcquistoInStore::class, 'codice_officina', 'codice_officina');
    }

    public function compravendite()
    {
        return $this->hasMany(Compravendita::class, 'codice_officina', 'codice_officina');
    }

    public function gestisce()
    {
        return $this->hasMany(Officina::class, 'codice_officina', 'codice_officina');
    }


}
