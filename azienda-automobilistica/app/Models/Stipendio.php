<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stipendio extends Model
{
    use HasFactory;

    protected $table = 'stipendi';

    protected $fillable = [
        'importo',
        'CF_meccanico',
        'CF_consulente'
    ];

    public function meccanico()
    {
        return $this->belongsTo(Meccanico::class, 'CF_meccanico', 'CF');
    }

    public function consulente()
    {
        return $this->belongsTo(Consulente::class, 'CF_consulente', 'CF');
    }
}
