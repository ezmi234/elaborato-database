@extends('layouts.app')

@extends('layouts.sidebar')

@section('content')
    <h1>Officine</h1>

    <!-- Filters -->
    <div class="mb-3 form-inline d-flex align-items-center">
        <form action="{{ route('officine.index') }}" method="GET" class="d-flex align-items-center">
            <label for="sort_by" style="margin-right: 10px;  width:350px;">Ordina per:</label>
            <select name="sort_by" id="sort_by" class="form-control" style="margin-right: 10px;">
                <option value="codice_officina" {{ request('sort_by') === 'codice_officina' ? 'selected' : '' }}>Codice Officina</option>
                <option value="nome" {{ request('sort_by') === 'nome' ? 'selected' : '' }}>Nome</option>
                <option value="sede_città" {{ request('sort_by') === 'sede_città' ? 'selected' : '' }}>Sede Città</option>
                <option value="sede_via" {{ request('sort_by') === 'sede_via' ? 'selected' : '' }}>Sede Via</option>
                <option value="sede_civico" {{ request('sort_by') === 'sede_civico' ? 'selected' : '' }}>Sede Civico</option>
                <option value="bilancio" {{ request('sort_by') === 'bilancio' ? 'selected' : '' }}>Bilancio</option>
                <option value="centrale" {{ request('sort_by') === 'centrale' ? 'selected' : '' }}>Centrale</option>
                <option value="gestita_da" {{ request('sort_by') === 'gestita_da' ? 'selected' : '' }}>Gestita Da</option>
            </select>
            <select name="sort_order" id="sort_order" class="form-control" style="margin-right: 10px;">
                <option value="asc" {{ request('sort_order') === 'asc' ? 'selected' : '' }}>Ascendente</option>
                <option value="desc" {{ request('sort_order') === 'desc' ? 'selected' : '' }}>Discendente</option>
            </select>
            <button type="submit" class="btn btn-primary">Ordina</button>
        </form>
    </div>

    <!-- Officine Table -->
    <table class="table">
        <thead>
            <tr>
                <th>Codice Officina</th>
                <th>Nome</th>
                <th>Sede Città</th>
                <th>Sede Via</th>
                <th>Sede Civico</th>
                <th>Bilancio</th>
                <th>Centrale</th>
                <th>Gestita Da</th>
                <th>Azioni</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($officine as $officina)
                <tr>
                    <td>{{ $officina->codice_officina }}</td>
                    <td>{{ $officina->nome }}</td>
                    <td>{{ $officina->sede_città }}</td>
                    <td>{{ $officina->sede_via }}</td>
                    <td>{{ $officina->sede_civico }}</td>
                    <td>{{ $officina->bilancio }}</td>
                    <td>{{ $officina->centrale ? 'Sì' : 'No' }}</td>
                    <td>{{ $officine->keyBy('codice_officina')->get($officina->gestita_da)?->nome}}</td>
                    <td>
                        <a href="{{ route('officine.show', $officina->codice_officina) }}" class="btn btn-primary">Vedi</a>
                        <form action="{{ route('officine.destroy', $officina->codice_officina) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Elimina</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('officine.create') }}" class="btn btn-primary fixed-bottom-right">
        <i class="fas fa-plus"></i> Aggiungi Officina
    </a>

    <!-- Session Messages -->
    @if (session('error'))
        <div class="alert alert-danger mt-4">
            {{ session('error') }}
        </div>
        @if (session('message'))
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
