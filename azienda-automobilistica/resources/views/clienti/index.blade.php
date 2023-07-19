@extends('layouts.app')

@extends('layouts.sidebar')

@section('content')
    <h1>Clienti</h1>

    <!-- Filters -->
    <div class="mb-3 form-inline d-flex align-items-center">
        <form action="{{ route('clienti.index') }}" method="GET" class="d-flex align-items-center">
            <label for="sort_by" style="margin-right: 10px;  width:350px;">Ordina per:</label>
            <select name="sort_by" id="sort_by" class="form-control" style="margin-right: 10px;">
                <option value="CF" {{ request('sort_by') === 'CF' ? 'selected' : '' }}>CF</option>
                <option value="nome" {{ request('sort_by') === 'nome' ? 'selected' : '' }}>Nome Cliente</option>
                <option value="cognome" {{ request('sort_by') === 'cognome' ? 'selected' : '' }}>Cognome Cliente</option>
                <option value="data_nascita" {{ request('sort_by') === 'data_nascita' ? 'selected' : '' }}>Data di nascita</option>
                <option value="telefono" {{ request('sort_by') === 'telefono' ? 'selected' : '' }}>Telefono</option>
                <option value="buono_acquisto" {{ request('sort_by') === 'buono_acquisto' ? 'selected' : '' }}>Buono d'acquisto</option>
            </select>
            <select name="sort_order" id="sort_order" class="form-control" style="margin-right: 10px;">
                <option value="asc" {{ request('sort_order') === 'asc' ? 'selected' : '' }}>Ascendente</option>
                <option value="desc" {{ request('sort_order') === 'desc' ? 'selected' : '' }}>Discendente</option>
            </select>
            <button type="submit" class="btn btn-primary">Ordina</button>
        </form>
    </div>



    <!-- Clienti Table -->
    <table class="table">
        <thead>
            <tr>
                <th>CF cliente</th>
                <th>Nome Cliente</th>
                <th>Cognome Cliente</th>
                <th>Data di nascita</th>
                <th>Telefono</th>
                <th>Buono d'acquisto</th>
                <th>Azioni</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($clienti as $cliente)
                <tr>
                    <td>{{ $cliente->CF }}</td>
                    <td>{{ $cliente->nome }}</td>
                    <td>{{ $cliente->cognome }}</td>
                    <td>{{ $cliente->data_nascita }}</td>
                    <td>{{ $cliente->telefono }}</td>
                    <td>{{ $cliente->buono_acquisto }}</td>
                    <td>
                        <a href="{{ route('clienti.show', $cliente->CF) }}" class="btn btn-primary">Vedi</a>
                        <a href="{{ route('clienti.edit', $cliente->CF) }}" class="btn btn-success">Modifica</a>
                        <form action="{{ route('clienti.destroy', $cliente->CF) }}" method="POST"
                            style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Elimina</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('clienti.create') }}" class="btn btn-primary fixed-bottom-right">
        <i class="fas fa-plus"></i> Aggiungi Cliente
    </a>

    <!-- Session Messages -->
    @if (session('error'))
        <div class="alert alert-danger mt-4">
            {{ session('error') }}
        </div>
        @if(session('message'))
            <div class="alert alert-danger mt-4">
                {{ session('message') }}
            </div>
        @endif
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
