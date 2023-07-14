@extends('layouts.app')

@extends('layouts.sidebar')

@section('content')
    <h1>Dettagli Compra Vendita Auto</h1>

    <!-- Compra Vendita Auto Details -->
    <div class="card mb-4">
        <div class="card-body">
            <h5 class="card-title">Codice Compra Vendita: {{ $compra_vendita->codice_compra_vendita }}</h5>
            <p class="card-text">Data e Ora: {{ $compra_vendita->created_at }}</p>
            <p class="card-text">Costo Totale: {{ $compra_vendita->costo_totale }}</p>
            <p class="card-text">Metodo di Pagamento: {{ $compra_vendita->metodo_pagamento }}</p>
            <p class="card-text">Cliente: {{ $compra_vendita->CF_cliente }}</p>
            <p class="card-text">Consulente: {{ $compra_vendita->CF_consulente }}</p>
            <p class="card-text">Officina: {{ $compra_vendita->codice_officina}}</p>
            <p class="card-text">Veicolo: {{ $compra_vendita->numero_telaio }}</p>
            <p class="card-text">Tipo Vendita: {{ $compra_vendita->tipo_vendita ? 'Vendita' : 'Acquisto' }}</p>
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
    <a href="{{ route('compra_vendite.index') }}" class="btn btn-primary">Back to List</a>

    <!-- Delete Form -->
    <form action="{{ route('compra_vendite.destroy', $compra_vendita) }}" method="POST" style="display: inline-block;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete</button>
@endsection
