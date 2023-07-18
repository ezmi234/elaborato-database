<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recensione extends Model
{
    use HasFactory;

    protected $table = 'recensioni';
    protected $primaryKey = 'codice_recensione';

    protected $fillable = [
        'voto',
        'messaggio',
        'codice_acquisto',
        'codice_intervento',
        'codice_compra_vendita',
    ];

    public function acquisto()
    {
        return $this->belongsTo(AcquistoInStore::class, 'codice_acquisto', 'codice_acquisto');
    }

}
