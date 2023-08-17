@extends('layouts.app')

@extends('layouts.sidebar')

@section('content')
    <h1>Dettagli Acquisto</h1>

    <!-- Acquisto Details -->
    <div class="card mb-4">
        <div class="card-body">
            <h5 class="card-title">Codice Acquisto: {{ $acquisto->codice_acquisto }}</h5>
            <p class="card-text">Data e Ora Acquisto: {{ $acquisto->created_at }}</p>
            <p class="card-text">Costo Totale: {{ $acquisto->costo_totale }}</p>
            <p class="card-text">Metodo di Pagamento: {{ $acquisto->metodo_pagamento }}</p>
            <p class="card-text">Cliente: {{ $acquisto->CF_cliente }}</p>
            <p class="card-text">Officina: {{ $acquisto->codice_officina }}</p>
        </div>
    </div>

    <!-- Descrizione -->
    <div class="card mb-4">
        <div class="card-body">
            <h5 class="card-title">Descrizione</h5>
            <p class="card-text">{{ $acquisto->descrizione }}</p>
        </div>
    </div>

    <!-- Accessori Included -->
    <h2>Accessori Inclusi</h2>

    <table class="table">
        <thead>
            <tr>
                <th>Nome Accessorio</th>
                <th>Prezzo</th>
                <th>Quantità</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($acquisto->accessori as $accessorio)
                <tr>
                    <td>{{ $accessorio->nome }}</td>
                    <td>{{ $accessorio->prezzo }}</td>
                    <td>{{ $accessorio->pivot->quantita }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Recensioni -->
    <div class="row mt-4">
        <div class="col-md-12">
            <h3>Recensioni</h3>
            <ul class="list-group">
                @if ($acquisto->recensione==null)
                    <p>Non ci sono recensioni</p>
                @else
                    <li class="list-group-item">
                        <strong>Autore:</strong> {{ $acquisto->CF_cliente }}
                        <br>
                        <strong>Voto:</strong> {{ $acquisto->recensione->voto }}
                        <br>
                        <strong>Testo:</strong> {{ $acquisto->recensione->messaggio }}
                    </li>
                @endif
            </ul>
        </div>
    </div>

    <!-- Actions -->
    <a href="{{ route('acquisti_in_store.index') }}" class="btn btn-primary mt-2">Torna Indietro</a>

    <!-- Delete Form -->
    <form action="{{ route('acquisti_in_store.destroy', $acquisto) }}" method="POST" style="display: inline-block;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger mt-2">Elimina</button>
    </form>

@endsection
