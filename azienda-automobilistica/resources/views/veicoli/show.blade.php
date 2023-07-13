@extends('layouts.app')

@extends('layouts.sidebar')

@section('content')
    <h1>Dettagli Veicolo</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Informazioni Veicolo</h5>
            <p><strong>Numero Telaio:</strong> {{ $veicolo->numero_telaio }}</p>
            <p><strong>Marca:</strong> {{ $veicolo->marca }}</p>
            <p><strong>Modello:</strong> {{ $veicolo->modello }}</p>
            <p><strong>Targa:</strong> {{ $veicolo->targa }}</p>
            <p><strong>Anno Immatricolazione:</strong> {{ $veicolo->anno_immatricolazione }}</p>
            <p><strong>Colore:</strong> {{ $veicolo->colore }}</p>
        </div>
    </div>

    <div class="mt-3">
        <a href="{{ route('veicoli.edit', $veicolo->numero_telaio) }}" class="btn btn-success">Modifica</a>
        <form action="{{ route('veicoli.destroy', $veicolo->numero_telaio) }}" method="POST" style="display: inline-block;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Elimina</button>
        </form>
    </div>

    <div class="card">
        <div class="card-header">
            <h5>Interventi</h5>
        </div>
        <div class="card-body">
            @if ($veicolo->intervento)
                <p><strong>Codice Intervento:</strong> {{ $veicolo->intervento->codice_intervento }}</p>
                <p><strong>Descrizione Intervento:</strong> {{ $veicolo->intervento->descrizione }}</p>
                <!-- Altri dettagli dell'intervento -->
            @else
                <p>Nessun intervento trovato per questo veicolo.</p>
            @endif
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h5>Compra Vendita</h5>
        </div>
        <div class="card-body">
            @if ($veicolo->compra_vendita)
                <p><strong>Codice Compra Vendita:</strong> {{ $veicolo->compra_vendita->codice_compra_vendita }}</p>
                <p><strong>Data Acquisto/Vendita:</strong> {{ $veicolo->compra_vendita->data_acquisto }}</p>
                <!-- Altri dettagli della compra vendita -->
            @else
                <p>Nessuna compra vendita trovata per questo veicolo.</p>
            @endif
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h5>Recensione</h5>
        </div>
        <div class="card-body">
            @if ($veicolo->recensione)
                <p><strong>Codice Recensione:</strong> {{ $veicolo->recensione->codice_recensione }}</p>
                <p><strong>Contenuto Recensione:</strong> {{ $veicolo->recensione->contenuto }}</p>
                <!-- Altri dettagli della recensione -->
            @else
                <p>Nessuna recensione trovata per questo veicolo.</p>
            @endif
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h5>Accessori</h5>
        </div>
        <div class="card-body">
            @if ($veicolo->accessori->isEmpty())
                <p>Nessun accessorio trovato per questo veicolo.</p>
            @else
                <ul>
                    @foreach ($veicolo->accessori as $accessorio)
                        <li>{{ $accessorio->nome }}</li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h5>Meccanici</h5>
        </div>
        <div class="card-body">
            @if ($veicolo->meccanici->isEmpty())
                <p>Nessun meccanico trovato per questo veicolo.</p>
            @else
                <ul>
                    @foreach ($veicolo->meccanici as $meccanico)
                        <li>{{ $meccanico->nome }}</li>
                    @endforeach
                </ul>
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

