@extends('layouts.app')

@extends('layouts.sidebar')

@section('content')
    <div class="container">
        <h1>Dettagli Compra Vendita Auto</h1>

        <div class="row">
            <div class="col-md-6">
                <h3>General Information</h3>
                <ul class="list-group">
                    <li class="list-group-item"><strong>Codice Compra Vendita:</strong> {{ $compra_vendita->codice_compra_vendita }}</li>
                    <li class="list-group-item"><strong>Data e Ora:</strong> {{ $compra_vendita->created_at }}</li>
                    <li class="list-group-item"><strong>Costo Totale:</strong> {{ $compra_vendita->costo_totale }}</li>
                    <li class="list-group-item"><strong>Metodo di Pagamento:</strong> {{ $compra_vendita->metodo_pagamento }}</li>
                    <li class="list-group-item"><strong>Cliente:</strong> {{ $compra_vendita->cliente->CF }}</li>
                    <li class="list-group-item"><strong>Consulente:</strong> {{ $compra_vendita->consulente->CF }}</li>
                    <li class="list-group-item"><strong>Officina:</strong> {{ $compra_vendita->officina->nome }}</li>
                    <li class="list-group-item"><strong>Veicolo:</strong> {{ $compra_vendita->veicolo->numero_telaio }}</li>
                    <li class="list-group-item"><strong>Tipo Vendita:</strong> {{ $compra_vendita->tipo_vendita ? 'Vendita' : 'Acquisto' }}</li>
                </ul>
            </div>
        </div>


        <div class="row mt-4">
            <div class="col-md-12">
                <h3>Dettaglio cliente</h3>
                <ul class="list-group">

                        <li class="list-group-item">{{ $compra_vendita->cliente->CF }} - Cognome: {{ $compra_vendita->cliente->cognome }} - Nome: {{ $compra_vendita->cliente->nome }} - Telefono: {{ $compra_vendita->cliente->telefono }}</li>

                </ul>
            </div>
        </div>


        <div class="row mt-4">
            <div class="col-md-12">
                <h3>Dettaglio consulente</h3>
                <ul class="list-group">

                        <li class="list-group-item">{{ $compra_vendita->consulente->CF }} - Cognome: {{ $compra_vendita->consulente->cognome }} - Nome: {{ $compra_vendita->consulente->nome }}</li>

                </ul>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-12">
                <h3>Dettaglio veicolo</h3>
                <ul class="list-group">

                        <li class="list-group-item">{{ $compra_vendita->veicolo->numero_telaio }} - Targa: {{ $compra_vendita->veicolo->targa }} - Marca: {{ $compra_vendita->veicolo->marca }} -Modello: {{ $compra_vendita->veicolo->modello }} -Colore: {{ $compra_vendita->veicolo->colore }}</li>

                </ul>
            </div>
        </div>

         <!-- Recensioni -->
         <div class="row mt-4">
            <div class="col-md-12">
                <h3>Recensioni</h3>
                <ul class="list-group">
                    @if ($compra_vendita->recensione==null)
                        <p>Non ci sono recensioni</p>
                    @else
                        <li class="list-group-item">
                            <strong>Autore:</strong> {{ $compra_vendita->CF_cliente }}
                            <br>
                            <strong>Voto:</strong> {{ $compra_vendita->recensione->voto }}
                            <br>
                            <strong>Testo:</strong> {{ $compra_vendita->recensione->messaggio }}
                        </li>
                    @endif
                </ul>
            </div>
        </div>


        <!-- Session Messages -->
        @if ($errors->any())
            <div class="alert alert-danger mt-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif



        <!-- Actions -->
        <a href="{{ route('compra_vendite.index') }}" class="btn btn-primary mt-2">Back to List</a>

        <!-- Delete Form -->
        <form action="{{ route('compra_vendite.destroy', $compra_vendita) }}" method="POST" style="display: inline-block;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger mt-2">Delete</button>
        </form>
    </div>
@endsection
