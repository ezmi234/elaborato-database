<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accessorio extends Model
{
    use HasFactory;

    public $table = "accessori";

    public $timestamps = false;

    protected $fillable = [
        'id',
        'nome',
        'costo',
    ];
}
