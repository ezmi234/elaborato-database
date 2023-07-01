<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accessorio extends Model
{
    use HasFactory;

    protected $table = 'accessori';

    protected $primaryKey = 'codice_accessorio';
    public $timestamps = false;

    protected $fillable = [
        'nome',
        'prezzo'
    ];
}
