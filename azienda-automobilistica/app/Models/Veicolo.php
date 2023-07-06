<?php
    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class Veicolo extends Model
    {
        use HasFactory;
        protected $table = 'veicoli';
        protected $primaryKey = 'numero_telaio';
        public $incrementing = false;
        protected $fillable = [
            'numero_telaio',
            'targa',
            'modello',
            'anno',
            'colore',
        ];

    }
