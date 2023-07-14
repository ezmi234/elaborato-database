@extends('layouts.app')

@extends('layouts.sidebar')

@section('content')
    <h1>Compravendita</h1>

    <!-- Filters -->
    <div class="mb-3 form-inline d-flex align-items-center">
        <form action="{{ route('acquisti_in_store.index') }}" method="GET" class="d-flex align-items-center">
            <label for="sort_by" style="margin-right: 10px; width: 200px;">Sort by:</label>
            <select name="sort_by" id="sort_by" class="form-control" style="margin-right: 10px;">
                <option value="codice_acquisto" {{ request('sort_by') === 'codice_acquisto' ? 'selected' : '' }}>Codice Acquisto</option>
                <option value="costo_totale" {{ request('sort_by') === 'costo_totale' ? 'selected' : '' }}>Costo Totale</option>
                <option value="metodo_pagamento" {{ request('sort_by') === 'metodo_pagamento' ? 'selected' : '' }}>Metodo di Pagamento</option>
            </select>
            <select name="sort_order" id="sort_order" class="form-control" style="margin-right: 10px;">
                <option value="asc" {{ request('sort_order') === 'asc' ? 'selected' : '' }}>Ascending</option>
                <option value="desc" {{ request('sort_order') === 'desc' ? 'selected' : '' }}>Descending</option>
            </select>
            <button type="submit" class="btn btn-primary">Apply</button>
        </form>
    </div>

    <!-- Acquisti in Store Table -->
    <table class="table">
        <thead>
            <tr>
                <th>Codice Compravendita</th>
                <th>Data e Ora Acquisto</th>
                <th>Costo Totale</th>
                <th>Metodo di Pagamento</th>
                <th>Cliente</th>
                <th>Officina</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($compravendite as $compravendita)
                <tr>
                    <td>{{ $compravendita ->codice_vendita }}</td>
                    <td>{{ $compravendita ->tipo_vendita  }}</td>
                    <td>{{ $compravendita ->data_ora_vendita }}</td>
                    <td>{{ $compravendita ->costo_totale }}</td>
                    <td>{{ $compravendita ->metodo_pagamento }}</td>
                    <td>{{ $compravendita ->cliente }}</td>
                    <td>{{ $compravendita ->officina }}</td>


                    <td>
                        <a href="{{ route('compravendite.show', $compravendita->codice_vendita) }}" class="btn btn-primary">Show</a>
                        <form action="{{ route('compravendita.destroy', $compravendita->codice_vendita) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('compravendite.create') }}" class="btn btn-primary fixed-bottom-right">
        <i class="fas fa-plus"></i> Add
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
