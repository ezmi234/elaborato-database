<?php 
    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class Veicolo extends Model
    {
        use HasFactory;
        protected $table = 'veicoli';
        protected $primaryKey = 'numero_di_serie';
        public $incrementing = false;
        protected $fillable = [
            'numero_di_serie',
            'targa',
            'modello',
            'anno',
            'colore',
        ];

        public function acquisti()
        {
            return $this->hasMany(AcquistoInStore::class, 'numero_di_serie_veicolo', 'numero_di_serie');
        }
    }