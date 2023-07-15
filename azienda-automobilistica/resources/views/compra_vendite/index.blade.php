@extends('layouts.app')

@extends('layouts.sidebar')

@section('content')
    <h1>Compra Vendite</h1>

    <!-- Filters -->
    <div class="mb-3 form-inline d-flex align-items-center">
        <form action="{{ route('compra_vendite.index') }}" method="GET" class="d-flex align-items-center">
            <label for="sort_by" style="margin-right: 10px; width: 200px;">Sort by:</label>
            <select name="sort_by" id="sort_by" class="form-control" style="margin-right: 10px;">
                <option value="id" {{ request('sort_by') === 'id' ? 'selected' : '' }}>ID</option>
                <option value="tipo_vendita" {{ request('sort_by') === 'tipo_vendita' ? 'selected' : '' }}>Tipo Vendita</option>
                <option value="costo_totale" {{ request('sort_by') === 'costo_totale' ? 'selected' : '' }}>Costo Totale</option>
                <option value="metodo_pagamento" {{ request('sort_by') === 'metodo_pagamento' ? 'selected' : '' }}>Metodo di Pagamento</option>
                <option value="CF_cliente" {{ request('sort_by') === 'CF_cliente' ? 'selected' : '' }}>CF Cliente</option>
                <option value="codice_officina" {{ request('sort_by') === 'codice_officina' ? 'selected' : '' }}>Codice Officina</option>
                <option value="CF_consulente" {{ request('sort_by') === 'CF_consulente' ? 'selected' : '' }}>CF Consulente</option>
                <option value="numero_telaio" {{ request('sort_by') === 'numero_telaio' ? 'selected' : '' }}>Numero Telaio</option>
            </select>
            <select name="sort_order" id="sort_order" class="form-control" style="margin-right: 10px;">
                <option value="asc" {{ request('sort_order') === 'asc' ? 'selected' : '' }}>Ascending</option>
                <option value="desc" {{ request('sort_order') === 'desc' ? 'selected' : '' }}>Descending</option>
            </select>
            <button type="submit" class="btn btn-primary">Apply</button>
        </form>
    </div>

    <!-- Compra Vendite Table -->
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tipo Vendita</th>
                <th>Costo Totale</th>
                <th>Metodo di Pagamento</th>
                <th>CF Cliente</th>
                <th>Codice Officina</th>
                <th>CF Consulente</th>
                <th>Numero Telaio</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($compra_vendite as $compra_vendita)
                <tr>
                    <td>{{ $compra_vendita->codice_compra_vendita }}</td>
                    <td>{{ $compra_vendita->tipo_vendita }}</td>
                    <td>{{ $compra_vendita->costo_totale }}</td>
                    <td>{{ $compra_vendita->metodo_pagamento }}</td>
                    <td>{{ $compra_vendita->CF_cliente }}</td>
                    <td>{{ $compra_vendita->codice_officina }}</td>
                    <td>{{ $compra_vendita->CF_consulente }}</td>
                    <td>{{ $compra_vendita->numero_telaio }}</td>
                    <td>
                        <a href="{{ route('compra_vendite.show', $compra_vendita->codice_compra_vendita) }}" class="btn btn-primary">Show</a>
                        <form action="{{ route('compra_vendite.destroy', $compra_vendita->codice_compra_vendita) }}" method="POST"
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

    <a href="{{ route('compra_vendite.create') }}" class="btn btn-primary fixed-bottom-right">
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
