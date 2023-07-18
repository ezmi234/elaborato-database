@extends('layouts.app')

@extends('layouts.sidebar')

@section('content')
    <h1>Pezzi di Ricambio</h1>

    <!-- Filters -->
    <div class="mb-3 form-inline d-flex align-items-center">
        <form action="{{ route('pezzi_di_ricambio.index') }}" method="GET" class="d-flex align-items-center">
            <label for="sort_by" style="margin-right: 10px;  width:200px;">Sort by:</label>
            <select name="sort_by" id="sort_by" class="form-control" style="margin-right: 10px;">
                <option value="codice_Pezzo" {{ request('sort_by') === 'codice_pezzo' ? 'selected' : '' }}>Codice Pezzo</option>
                <option value="nome" {{ request('sort_by') === 'nome' ? 'selected' : '' }}>Nome</option>
                <option value="prezzo" {{ request('sort_by') === 'prezzo' ? 'selected' : '' }}>Prezzo</option>
                <option value="modello" {{ request('sort_by') === 'modello' ? 'selected' : '' }}>Modello</option>
            </select>
            <select name="sort_order" id="sort_order" class="form-control" style="margin-right: 10px;">
                <option value="asc" {{ request('sort_order') === 'asc' ? 'selected' : '' }}>Ascending</option>
                <option value="desc" {{ request('sort_order') === 'desc' ? 'selected' : '' }}>Descending</option>
            </select>
            <button type="submit" class="btn btn-primary">Apply</button>
        </form>
    </div>

    <!-- Pezzi di Ricambio Table -->
    <table class="table">
        <thead>
            <tr>
                <th>Codice Pezzo</th>
                <th>Nome</th>
                <th>Prezzo</th>
                <th>Modello</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pezzi_di_ricambio as $pezzo)
                <tr>
                    <td>{{ $pezzo->codice_pezzo }}</td>
                    <td>{{ $pezzo->nome }}</td>
                    <td>{{ $pezzo->prezzo }}</td>
                    <td>{{ $pezzo->modello }}</td>
                    <td>
                        <a href="{{ route('pezzi_di_ricambio.edit', $pezzo->codice_pezzo) }}" class="btn btn-success">Edit</a>
                        <form action="{{ route('pezzi_di_ricambio.destroy', $pezzo->codice_pezzo) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('pezzi_di_ricambio.create') }}" class="btn btn-primary fixed-bottom-right">
        <i class="fas fa-plus"></i> Add
    </a>

    <!-- Session Messages -->
    @if (session('error'))
        <div class="alertalert-danger mt-4">
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
