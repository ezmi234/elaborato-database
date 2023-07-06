@extends('layouts.app')

@extends('layouts.sidebar')

@section('content')
    <h1>Dettagli del Veicolo</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Informazioni sul Veicolo</h5>
            <p><strong>Numero di Serie:</strong> {{ $veicolo->numero_di_serie }}</p>
            <p><strong>Targa:</strong> {{ $veicolo->targa }}</p>
            <p><strong>Modello:</strong> {{ $veicolo->modello }}</p>
            <p><strong>Anno:</strong> {{ $veicolo->anno }}</p>
            <p><strong>Colore:</strong> {{ $veicolo->colore }}</p>
        </div>
    </div>

    <div class="mt-3">
        <a href="{{ route('veicoli.edit', $veicolo->id) }}" class="btn btn-success">Modifica</a>
        <form action="{{ route('veicoli.destroy', $veicolo->id) }}" method="POST" style="display: inline-block;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Elimina</button>
        </form>
    </div>

    <div class="card">
        <div class="card-header">
            <h5>Acquisti</h5>
        </div>
        <div class="card-body">
            @if ($veicolo->acquisti->isEmpty())
                <p>Nessun acquisto trovato per questo veicolo.</p>
            @else
                <table class="table">
                    <thead>
                        <tr>
                            <th>Codice Acquisto</th>
                            <th>Costo Totale</th>
                            <th>Metodo di Pagamento</th>
                            <th>Data Acquisto</th>
                            <th>Officina</th>
                            <th>Azioni</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($veicolo->acquisti as $acquisto)
                            <tr>
                                <td>{{ $acquisto->codice_acquisto }}</td>
                                <td>{{ $acquisto->costo_totale }}</td>
                                <td>{{ $acquisto->metodo_pagamento }}</td>
                                <td>{{ $acquisto->created_at }}</td>
                                <td>{{ $acquisto->officina->nome }}</td>
                                <td>
                                    <a href="{{ route('acquisti_in_store.show', $acquisto->codice_acquisto) }}" class="btn btn-info">Dettagli Acquisto</a>
                                    @if ($acquisto->recensione)
                                        <a href="{{ route('recensioni.edit', $acquisto->recensione->codice_recensione) }}" class="btn btn-primary">Modifica Recensione</a>
                                        <a href="{{ route('recensioni.show', $acquisto->recensione->codice_recensione) }}" class="btn btn-info">Vedi Recensione</a>
                                    @else
                                        <a href="{{ route('recensioni.create', ['acquisto' => $acquisto->codice_acquisto]) }}" class="btn btn-primary">Lascia RecRecensione</a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>

    <!-- Messaggi di Sessione -->
    @if (session('error'))
        <div class="alert alert-danger mt-4">
            {{ session('error') }}
        </div>
    @elseif (session('message'))
        <div class="alert alert-danger mt-4">
            {{ session('message') }}
        </div>
    @elseif (session('success'))
        <div class="alert alert-success mt-4">
            {{ session('success') }}
        </div>
    @endif
@endsection
