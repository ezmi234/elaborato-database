@extends('layouts.app')

@extends('layouts.sidebar')

@section('content')
    <h1>Officina {{ $officina->centrale ? 'Centrale' : 'Secondaria' }} Details</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Officina Information</h5>
            <p><strong>Codice Officina:</strong> {{ $officina->codice_officina }}</p>
            <p><strong>Nome:</strong> {{ $officina->nome }}</p>
            <p><strong>Sede Città:</strong> {{ $officina->sede_città }}</p>
            <p><strong>Sede Via:</strong> {{ $officina->sede_via }}</p>
            <p><strong>Sede Civico:</strong> {{ $officina->sede_civico }}</p>
            <p><strong>Bilancio:</strong> {{ $officina->bilancio }}</p>
            @if ($bilancioTotale)
                <p><strong>Bilancio Totale:</strong> {{ $bilancioTotale }}</p>
            @endif
        </div>
    </div>

    <div class="mt-3">
        @if($officina->centrale)
            <a href="{{ route('officine.showWithBilancioTotale') }}" class="btn btn-primary">Calcola bilancio totale</a>
        @endif
        <a href="{{ route('officine.storeStipendi', $officina->codice_officina) }}" class="btn btn-info">Calcola stipendi dipendenti</a>
        <form action="{{ route('officine.destroy', $officina->codice_officina) }}" method="POST" style="display: inline-block;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
    </div>

    <div class="card mt-2">
        <div class="card-header">
            <h5>Consulenti</h5>
        </div>
        <div class="card-body">
            @if ($officina->consulenti->isEmpty())
                <p>No consultants found for this officina.</p>
            @else
                <table class="table">
                    <thead>
                        <tr>
                            <th>CF Consulente</th>
                            <th>Nome</th>
                            <th>Cognome</th>
                            <th>Telefono</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($officina->consulenti as $consulente)
                            <tr>
                                <td>{{ $consulente->CF }}</td>
                                <td>{{ $consulente->nome }}</td>
                                <td>{{ $consulente->cognome }}</td>
                                <td>{{ $consulente->telefono }}</td>
                                <td>
                                    <a href="{{ route('consulenti.show', $consulente->CF) }}" class="btn btn-info">View Details</a>
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
            <h5>Meccanici</h5>
        </div>
        <div class="card-body">
            @if ($officina->meccanici->isEmpty())
                <p>No mechanics found for this officina.</p>
            @else
                <table class="table">
                    <thead>
                        <tr>
                            <th>CF Meccanico</th>
                            <th>Nome</th>
                            <th>Cognome</th>
                            <th>Telefono</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($officina->meccanici as $meccanico)
                            <tr>
                                <td>{{ $meccanico->CF }}</td>
                                <td>{{ $meccanico->nome }}</td>
                                <td>{{ $meccanico->cognome }}</td>
                                <td>{{ $meccanico->telefono }}</td>
                                <td>
                                    <a href="{{ route('meccanici.show', $meccanico->CF) }}" class="btn btn-info">View Details</a>
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
            <h5>Acquisti</h5>
        </div>
        <div class="card-body">
            @if ($officina->acquisti->isEmpty())
                <p>No acquisti found for this officina.</p>
            @else
                <table class="table">
                    <thead>
                        <tr>
                            <th>Codice Acquisto</th>
                            <th>Costo Totale</th>
                            <th>Metodo di Pagamento</th>
                            <th>Data Acquisto</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($officina->acquisti as $acquisto)
                            <tr>
                                <td>{{ $acquisto->codice_acquisto }}</td>
                                <td>{{ $acquisto->costo_totale }}</td>
                                <td>{{ $acquisto->metodo_pagamento }}</td>
                                <td>{{ $acquisto->created_at }}</td>
                                <td>
                                    <a href="{{ route('acquisti_in_store.show', $acquisto->codice_acquisto) }}" class="btn btn-info">View Details</a>
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
            @if ($officina->interventi->isEmpty())
                <p>No interventi found for this officina.</p>
            @else
                <table class="table">
                    <thead>
                        <tr>
                            <th>Codice Intervento</th>
                            <th>Costo Totale</th>
                            <th>Metodo di Pagamento</th>
                            <th>Data Intervento</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($officina->interventi as $intervento)
                            <tr>
                                <td>{{ $intervento->codice_intervento }}</td>
                                <td>{{ $intervento->costo_totale }}</td>
                                <td>{{ $intervento->metodo_pagamento }}</td>
                                <td>{{ $intervento->created_at }}</td>
                                <td>
                                    <a href="{{ route('interventi.show', $intervento->codice_intervento) }}" class="btn btn-info">View Details</a>
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
            <h5>Compravendite</h5>
        </div>
        <div class="card-body">
            @if ($officina->compravendite->isEmpty())
                <p>No compravendite found for this officina.</p>
            @else
                <table class="table">
                    <thead>
                        <tr>
                            <th>Codice Compravendita</th>
                            <th>Tipo Vendita</th>
                            <th>Costo Totale</th>
                            <th>Metodo di Pagamento</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($officina->compravendite as $compra_vendita)
                            <tr>
                                <td>{{ $compra_vendita->codice_compra_vendita }}</td>
                                <td>{{ $compra_vendita->tipo_vendita ? 'Vendita' : 'Acquisto' }}</td>
                                <td>{{ $compra_vendita->costo_totale }}</td>
                                <td>{{ $compra_vendita->metodo_pagamento }}</td>
                                <td>
                                    <a href="{{ route('compra_vendite.show', $compra_vendita->codice_compra_vendita) }}" class="btn btn-info">View Details</a>
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
