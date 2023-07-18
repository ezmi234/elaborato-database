<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PezzoDiRicambio extends Model
{
    use HasFactory;
    protected $table = 'pezzi_di_ricambio';
    protected $primaryKey = 'codice_pezzo';

    public $timestamps = false;
    protected $fillable = [
        'codice_pezzo',
        'nome',
        'prezzo',
        'modello',

    ];

    public function interventi()
    {
        return $this->belongsToMany(Intervento::class, 'pezzi_di_ricambio_intervento', 'codice_pezzo', 'ID_intervento');
    }

    public function acquisti()
    {
        return $this->belongsToMany(AcquistoInStore::class, 'pezzi_di_ricambio_acquisto', 'codice_pezzo', 'ID_acquisto');
    }

    public function fornitori()
    {
        return $this->belongsToMany(Fornitore::class, 'pezzi_di_ricambio_fornitore', 'codice_pezzo', 'ID_fornitore');
    }





}
