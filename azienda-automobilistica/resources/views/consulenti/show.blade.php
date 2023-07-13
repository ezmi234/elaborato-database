@extends('layouts.app')

@extends('layouts.sidebar')

@section('content')
    <h1>Dettagli Consulente</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Informazioni Consulente</h5>
            <p><strong>Codice Fiscale:</strong> {{ $consulente->CF }}</p>
            <p><strong>Nome:</strong> {{ $consulente->nome }}</p>
            <p><strong>Cognome:</strong> {{ $consulente->cognome }}</p>
            <p><strong>Data di nascita:</strong> {{ $consulente->data_nascita }}</p>
            <p><strong>Telefono:</strong> {{ $consulente->telefono }}</p>
            <p><strong>Percentuale Provvigione:</strong> {{ $consulente->percentuale_provvigione }}</p>
            <p><strong>Provvigione Totale:</strong> {{ $consulente->totale_provvigione }}</p>
        </div>
    </div>

    <div class="mt-3">
        <a href="{{ route('consulenti.edit', $consulente->CF) }}" class="btn btn-success">Modifica</a>
        <form action="{{ route('consulenti.destroy', $consulente->CF) }}" method="POST" style="display: inline-block;">
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
            @if ($consulente->acquisti->isEmpty())
                <p>No acquisti found for this consulente.</p>
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
                        @foreach ($consulente->acquisti as $acquisto)
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
