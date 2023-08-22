@extends('layouts.app')

@extends('layouts.sidebar')

@section('content')
    <h1>Veicoli</h1>

    <!-- Filters -->
    <!-- Filters -->
<div class="mb-3 form-inline d-flex align-items-center">
    <form action="{{ route('veicoli.index') }}" method="GET" class="d-flex align-items-center">
        <label for="sort_by" style="margin-right: 10px; width: 350px;">Ordina per:</label>
        <select name="sort_by" id="sort_by" class="form-control" style="margin-right: 10px;">
            <option value="numero_telaio" {{ request('sort_by') === 'numero_telaio' ? 'selected' : '' }}>Numero Telaio</option>
            <option value="marca" {{ request('sort_by') === 'marca' ? 'selected' : '' }}>Marca</option>
            <option value="modello" {{ request('sort_by') === 'modello' ? 'selected' : '' }}>Modello</option>
            <option value="targa" {{ request('sort_by') === 'targa' ? 'selected' : '' }}>Targa</option>
            <option value="anno_immatricolazione" {{ request('sort_by') === 'anno_immatricolazione' ? 'selected' : '' }}>Anno Immatricolazione</option>
            <option value="colore" {{ request('sort_by') === 'colore' ? 'selected' : '' }}>Colore</option>
        </select>
        <select name="sort_order" id="sort_order" class="form-control" style="margin-right: 10px;">
            <option value="asc" {{ request('sort_order') === 'asc' ? 'selected' : '' }}>Ascendente</option>
            <option value="desc" {{ request('sort_order') === 'desc' ? 'selected' : '' }}>Discendente</option>
        </select>
        <button type="submit" class="btn btn-primary">Ordina</button>
    </form>
</div>


    <!-- Veicoli Table -->
    <table class="table">
        <thead>
            <tr>
                <th>Numero Telaio</th>
                <th>Marca</th>
                <th>Modello</th>
                <th>Targa</th>
                <th>Anno Immatricolazione</th>
                <th>Colore</th>
                <th>Azioni</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($veicoli as $veicolo)
                <tr>
                    <td>{{ $veicolo->numero_telaio }}</td>
                    <td>{{ $veicolo->marca }}</td>
                    <td>{{ $veicolo->modello }}</td>
                    <td>{{ $veicolo->targa }}</td>
                    <td>{{ $veicolo->anno_immatricolazione }}</td>
                    <td>{{ $veicolo->colore }}</td>
                    <td>
                        <a href="{{ route('veicoli.edit', $veicolo->numero_telaio) }}" class="btn btn-success">Modifica</a>
                        <form action="{{ route('veicoli.destroy', $veicolo->numero_telaio) }}" method="POST"
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

    <a href="{{ route('veicoli.create') }}" class="btn btn-primary fixed-bottom-right">
        <i class="fas fa-plus"></i> Aggiungi Veicolo
    </a>

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
