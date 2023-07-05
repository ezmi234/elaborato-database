@extends('layouts.app')

@extends('layouts.sidebar')

@section('content')
    <h1>Consulenti</h1>

    <!-- Filters -->
    <div class="mb-3 form-inline d-flex align-items-center">
        <form action="{{ route('consulenti.index') }}" method="GET" class="d-flex align-items-center">
            <label for="sort_by" style="margin-right: 10px;  width:200px;">Sort by:</label>
            <select name="sort_by" id="sort_by" class="form-control" style="margin-right: 10px;">
                <option value="CF" {{ request('sort_by') === 'CF' ? 'selected' : '' }}>Codice Fiscale</option>
                <option value="nome" {{ request('sort_by') === 'nome' ? 'selected' : '' }}>Nome</option>
                <option value="cognome" {{ request('sort_by') === 'cognome' ? 'selected' : '' }}>Cognome</option>
                <option value="data_nascita" {{ request('sort_by') === 'data_nascita' ? 'selected' : '' }}>Data di nascita</option>
                <option value="telefono" {{ request('sort_by') === 'telefono' ? 'selected' : '' }}>Telefono</option>
                <option value="percentuale_provvigione" {{ request('sort_by') === 'percentuale_provvigione' ? 'selected' : '' }}>Percentuale Provvigione</option>
                <option value="provvigione_totale" {{ request('sort_by') === 'provvigione_totale' ? 'selected' : '' }}>Provvigione Totale</option>
            </select>
            <select name="sort_order" id="sort_order" class="form-control" style="margin-right: 10px;">
                <option value="asc" {{ request('sort_order') === 'asc' ? 'selected' : '' }}>Ascending</option>
                <option value="desc" {{ request('sort_order') === 'desc' ? 'selected' : '' }}>Descending</option>
            </select>
            <button type="submit" class="btn btn-primary">Apply</button>
        </form>
    </div>

    <!-- Consulenti Table -->
    <table class="table">
        <thead>
            <tr>
                <th>Codice Fiscale</th>
                <th>Nome</th>
                <th>Cognome</th>
                <th>Data di nascita</th>
                <th>Telefono</th>
                <th>Percentuale Provvigione</th>
                <th>Provvigione Totale</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($consulenti as $consulente)
                <tr>
                    <td>{{ $consulente->CF }}</td>
                    <td>{{ $consulente->nome }}</td>
                    <td>{{ $consulente->cognome }}</td>
                    <td>{{ $consulente->data_nascita }}</td>
                    <td>{{ $consulente->telefono }}</td>
                    <td>{{ $consulente->percentuale_provvigione }}</td>
                    <td>{{ $consulente->provvigione_totale }}</td>
                    <td>
                        <a href="{{ route('consulenti.show', $consulente->CF) }}" class="btn btn-primary">Show</a>
                        <a href="{{ route('consulenti.edit', $consulente->CF) }}" class="btn btn-success">Edit</a>
                        <form action="{{ route('consulenti.destroy', $consulente->CF) }}" method="POST"
                            style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('consulenti.create') }}" class="btn btn-primary fixed-bottom-right">
        <i class="fas fa-plus"></i> Add
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
