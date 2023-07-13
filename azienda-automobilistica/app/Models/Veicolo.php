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
            'marca',
            'modello',
            'targa',
            'anno_immatricolazione',
            'colore',
        ];

        public function intervento()
        {
            return $this->belongsTo(Intervento::class, 'codice_intervento', 'codice_intervento');
        }

        public function compra_vendita()
        {
            return $this->belongsTo(CompraVenditaAuto::class, 'codice_compra_vendita', 'codice_compra_vendita');
        }



    }
