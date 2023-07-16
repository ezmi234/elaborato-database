@extends('layouts.app')

@extends('layouts.sidebar')

@section('content')
    <h1>Recensione Details</h1>

    <div class="card mb-4">
        <div class="card-header">
            <h5>Recensione Information</h5>
        </div>
        <div class="card-body">
            <p><strong>Codice Recensione:</strong> {{ $recensione->codice_recensione }}</p>
            <p><strong>Voto:</strong> {{ $recensione->voto }}</p>
            <p><strong>Messaggio:</strong> {{ $recensione->messaggio }}</p>
        </div>
    </div>

    <div>
        <form action="{{ route('recensioni.destroy', $recensione->codice_recensione) }}" method="POST" style="display: inline-block;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
    </div>

    @if ($recensione->codice_acquisto)
        <div class="card mb-4">
            <div class="card-header">
                <h5>Acquisto Details</h5>
            </div>
            <div class="card-body">
                <p><strong>Codice Acquisto:</strong> {{ $recensione->acquisto->codice_acquisto }}</p>
                <p><strong>Costo Totale:</strong> {{ $recensione->acquisto->costo_totale }}</p>
                <p><strong>Metodo di Pagamento:</strong> {{ $recensione->acquisto->metodo_pagamento }}</p>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header">
                <h5>Cliente Details</h5>
            </div>
            <div class="card-body">
                <p><strong>CF Cliente:</strong> {{ $recensione->acquisto->cliente->CF }}</p>
                <p><strong>Nome Cliente:</strong> {{ $recensione->acquisto->cliente->nome }}</p>
                <p><strong>Cognome Cliente:</strong> {{ $recensione->acquisto->cliente->cognome }}</p>
                <p><strong>Data di Nascita:</strong> {{ $recensione->acquisto->cliente->data_nascita }}</p>
                <p><strong>Telefono:</strong> {{ $recensione->acquisto->cliente->telefono }}</p>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header">
                <h5>Officina Details</h5>
            </div>
            <div class="card-body">
                <p><strong>Nome Officina:</strong> {{ $recensione->acquisto->officina->nome }}</p>
                <p><strong>Città:</strong> {{ $recensione->acquisto->officina->sede_città }}</p>
                <p><strong>Indirizzo:</strong> {{ $recensione->acquisto->officina->sede_via }}  {{ $recensione->acquisto->officina->sede_civico }}</p>
            </div>
        </div>
    @endif

@endsection
