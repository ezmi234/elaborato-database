@extends('layouts.app')

@extends('layouts.sidebar')

@section('content')
    <h1>Client Details</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Client Information</h5>
            <p><strong>CF cliente:</strong> {{ $cliente->CF }}</p>
            <p><strong>Nome Cliente:</strong> {{ $cliente->nome }}</p>
            <p><strong>Cognome Cliente:</strong> {{ $cliente->cognome }}</p>
            <p><strong>Data di nascita:</strong> {{ $cliente->data_nascita }}</p>
            <p><strong>Telefono:</strong> {{ $cliente->telefono }}</p>
            <p><strong>Buono d'acquisto:</strong> {{ $cliente->buono_acquisto }}</p>
        </div>
    </div>

    <div class="mt-3">
        <a href="{{ route('clienti.edit', $cliente->CF) }}" class="btn btn-success">Edit</a>
        <form action="{{ route('clienti.destroy', $cliente->CF) }}" method="POST" style="display: inline-block;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
    </div>

    <div class="card">
        <div class="card-header">
            <h5>Acquisti</h5>
        </div>
        <div class="card-body">
            @if ($cliente->acquisti->isEmpty())
                <p>No acquisti found for this cliente.</p>
            @else
                <table class="table">
                    <thead>
                        <tr>
                            <th>Codice Acquisto</th>
                            <th>Costo Totale</th>
                            <th>Metodo di Pagamento</th>
                            <th>Data Acquisto</th>
                            <th>Officina</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cliente->acquisti as $acquisto)
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
                                        <a href="{{ route('recensioni.create', ['acquisto' => $acquisto->codice_acquisto]) }}" class="btn btn-primary">Lascia Recensione</a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>


    <!-- Session Messages -->
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
