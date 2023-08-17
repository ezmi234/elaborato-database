@extends('layouts.app')

@extends('layouts.sidebar')

@section('content')
    <div class="container">
        <h1>Dettagli Intervento</h1>

        <div class="row">
            <div class="col-md-6">
                <h3>Informazioni Intervento</h3>
                <ul class="list-group">
                    <li class="list-group-item"><strong>Cliente:</strong> {{ $intervento->cliente->CF }}</li>
                    <li class="list-group-item"><strong>Officina:</strong> {{ $intervento->officina->nome }}</li>
                    <li class="list-group-item"><strong>Veicolo:</strong> {{ $intervento->veicolo->numero_telaio }}</li>
                    <li class="list-group-item"><strong>Metodo di pagamento:</strong> {{ $intervento->metodo_pagamento }}</li>
                    <li class="list-group-item"><strong>Costo Totale:</strong> {{ $intervento->costo_totale }}</li>
                </ul>
            </div>

            <div class="col-md-6">
                <h3>Descrizione</h3>
                <p>{{ $intervento->descrizione }}</p>
            </div>

        </div>

        <div class="row mt-4">
            <div class="col-md-6">
                <h3>Pezzi di ricambio</h3>
                <ul class="list-group">
                    @if($intervento->pezzi_di_ricambio->count() == 0)
                        <p>Non sono stati usati pezzi di ricambio</p>
                    @else
                        @foreach ($intervento->pezzi_di_ricambio as $pezzo)
                            <li class="list-group-item">{{ $pezzo->nome }} - Prezzo: {{ $pezzo->prezzo }} - Quantità: {{ $pezzo->pivot->quantita }}</li>
                        @endforeach
                    @endif
                </ul>
            </div>

            <div class="col-md-6">
                <h3>Meccanici</h3>
                <ul class="list-group">
                    @foreach ($intervento->meccanici as $meccanico)
                        <li class="list-group-item">{{ $meccanico->nome }} {{ $meccanico->cognome }} - Paga oraria: {{ $meccanico->paga_oraria }} - Ore svolte: {{ $meccanico->pivot->ore_svolte }}</li>
                    @endforeach
                </ul>
            </div>

        </div>

        <!-- Recensioni -->
        <div class="row mt-4">
            <div class="col-md-12">
                <h3>Recensioni</h3>
                <ul class="list-group">
                    @if ($intervento->recensione==null)
                        <p>Non ci sono recensioni</p>
                    @else
                        <li class="list-group-item">
                            <strong>Autore:</strong> {{ $intervento->CF_cliente }}
                            <br>
                            <strong>Voto:</strong> {{ $intervento->recensione->voto }}
                            <br>
                            <strong>Testo:</strong> {{ $intervento->recensione->messaggio }}
                        </li>
                    @endif
                </ul>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-12">
                <form action="{{ route('interventi.destroy', $intervento->codice_intervento) }}" method="POST" style="display: inline-block">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Elimina Intervento</button>
                </form>
            </div>
        </div>
    </div>
@endsection
