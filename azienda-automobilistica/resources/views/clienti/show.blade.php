@extends('layouts.app')

@extends('layouts.sidebar')

@section('content')
    <h1>Dettagli Cliente</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Informazioni Cliente</h5>
            <p><strong>CF cliente:</strong> {{ $cliente->CF }}</p>
            <p><strong>Nome Cliente:</strong> {{ $cliente->nome }}</p>
            <p><strong>Cognome Cliente:</strong> {{ $cliente->cognome }}</p>
            <p><strong>Data di nascita:</strong> {{ $cliente->data_nascita }}</p>
            <p><strong>Telefono:</strong> {{ $cliente->telefono }}</p>
            <p><strong>Buono d'acquisto:</strong> {{ $cliente->buono_acquisto }}</p>
        </div>
    </div>

    <div class="mt-3">
        <a href="{{ route('clienti.edit', $cliente->CF) }}" class="btn btn-success">Modifica</a>
        <form action="{{ route('clienti.destroy', $cliente->CF) }}" method="POST" style="display: inline-block;">
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
            @if ($cliente->acquisti->isEmpty())
                <p>Nessun acquisto trovato per questo cliente.</p>
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
                                        <a href="{{ route('recensioni.show', $acquisto->recensione->codice_recensione) }}" class="btn btn-primary">Vedi Recensione</a>
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

    <div class="card mt-2">
        <div class="card-header">
            <h5>Interventi</h5>
        </div>
        <div class="card-body">
            @if ($cliente->interventi->isEmpty())
                <p>Nessun intervento trovato per questo cliente.</p>
            @else
                <table class="table">
                    <thead>
                        <tr>
                            <th>Codice Intervento</th>
                            <th>Costo Totale</th>
                            <th>Costo Ricambi</th>
                            <th>Costo Ore di Lavoro</th>
                            <th>Metodo di Pagamento</th>
                            <th>Data Intervento</th>
                            <th>Officina</th>
                            <th>Numero Telaio</th>
                            <th>Azioni</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cliente->interventi as $intervento)
                            <tr>
                                <td>{{ $intervento->codice_intervento }}</td>
                                <td>{{ $intervento->costo_totale }}</td>
                                <td>{{ $intervento->costo_ricambi }}</td>
                                <td>{{ $intervento->costo_ore_di_lavoro }}</td>
                                <td>{{ $intervento->metodo_pagamento }}</td>
                                <td>{{ $intervento->created_at }}</td>
                                <td>{{ $intervento->officina->nome }}</td>
                                <td>{{ $intervento->numero_telaio }}</td>
                                <td>
                                    <a href="{{ route('interventi.show', $intervento->codice_intervento) }}" class="btn btn-info">Dettagli Intervento</a>
                                    @if ($intervento->recensione)
                                        <a href="{{ route('recensioni.show', $intervento->recensione->codice_recensione) }}" class="btn btn-primary">Vedi Recensione</a>
                                    @else
                                        <a href="{{ route('recensioni.create', ['intervento' => $intervento->codice_intervento]) }}" class="btn btn-primary">Lascia Recensione</a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>

    <div class="card mt-2">
        <div class="card-header">
            <h5>Compravendita</h5>
        </div>
        <div class="card-body">
            @if ($cliente->compravendite->isEmpty())
                <p>Nessuna compravendita trovata per questo cliente.</p>
            @else
                <table class="table">
                    <thead>
                        <tr>
                            <th>Codice Compravendita</th>
                            <th>Tipo vendita</th>
                            <th>Costo Totale</th>
                            <th>Metodo di Pagamento</th>
                            <th>CF cliente</th>
                            <th>Codice Officina</th>
                            <th>CF consulente</th>
                            <th>Numero Telaio</th>
                            <th>Azioni</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cliente->compravendite as $compra_vendita)
                            <tr>
                                <td>{{ $compra_vendita->codice_compra_vendita }}</td>
                                <td>{{ $compra_vendita->tipo_vendita ? 'Vendita' : 'Acquisto' }}</td>
                                <td>{{ $compra_vendita->costo_totale }}</td>
                                <td>{{ $compra_vendita->metodo_pagamento }}</td>
                                <td>{{ $compra_vendita->CF_cliente }}</td>
                                <td>{{ $compra_vendita->codice_officina }}</td>
                                <td>{{ $compra_vendita->CF_consulente }}</td>
                                <td>{{ $compra_vendita->numero_telaio }}</td>
                                <td>
                                    <a href="{{ route('compra_vendite.show', $compra_vendita->codice_compra_vendita) }}" class="btn btn-info">Dettagli Compravendita</a>
                                    @if ($compra_vendita->recensione)
                                        <a href="{{ route('compra_vendite.show', $compra_vendita->codice_compra_vendita) }}" class="btn btn-primary">Vedi Recensione</a>
                                    @else
                                        <a href="{{ route('recensioni.create', ['compra_vendita' => $compra_vendita->codice_compra_vendita]) }}" class="btn btn-primary">Lascia Recensione</a>
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
