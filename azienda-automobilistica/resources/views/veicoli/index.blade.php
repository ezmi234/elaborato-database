@extends('layouts.app')
@extends('layouts.sidebar')

@section('content')
<h1>veicoli</h1>

<!--Filters-->
<div class="mb-3 form-inlinr d-flex align-items-center">
    <form action="{{ route('veicoli.index') }}" method="GET" class="d-flex align-items-center">
        <label for="sort_by" style="margin-right: 10px; width:200px;">Sort by:</label>
        <select name="sort_by" id="sort_by" class="form-control" style="margin-right: 10px;">
            <option value="numero_telaio" {{ request('sort_by') === 'numero_telaio' ? 'selected' : '' }}>Numero di serie</option>
            <option value="targa" {{ request('sort_by') === 'targa' ? 'selected' : '' }}>Targa</option>
            <option value="modello" {{ request('sort_by') === 'modello' ? 'selected' : '' }}>Modello</option>
            <option value="anno" {{ request('sort_by') === 'anno' ? 'selected' : '' }}>Anno</option>
            <option value="colore" {{ request('sort_by') === 'colore' ? 'selected' : '' }}>Colore</option>
        </select>
        <select name="sort_order" id="sort_order" class="form-control" style="margin-right: 10px;">
            <option value="asc" {{ request('sort_order') === 'asc' ? 'selected' : '' }}>Ascending</option>
            <option value="desc" {{ request('sort_order') === 'desc' ? 'selected' : '' }}>Descending</option>
        </select>
        <button type="submit" class="btn btn-primary">Apply</button>
    </form>
</div>

<!--veicoli Table-->
<table class="table">
    <thead>
        <tr>
            <th>Numero di serie</th>
            <th>Targa</th>
            <th>Modello</th>
            <th>Anno</th>
            <th>Colore</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($veicoli as $veicolo)
        <tr>
            <td>{{ $veicolo->numero_telaio }}</td>
            <td>{{ $veicolo->targa }}</td>
            <td>{{ $veicolo->modello }}</td>
            <td>{{ $veicolo->anno }}</td>
            <td>{{ $veicolo->colore }}</td>
            <td>
                <a href="{{ route('veicoli.show', $veicolo->numero_telaio) }}" class="btn btn-primary">Show</a>
                <a href="{{ route('veicoli.edit', $veicolo->numero_telaio) }}" class="btn btn-success">Edit</a>
                <form action="{{ route('veicoli.destroy', $veicolo->numero_telaio) }}" method="POST"
                    style="display: inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
                @endforeach
            </td>
        </tr>
    </tbody>

</table>

<a href="{{ route('veicoli.create') }}" class="btn btn-primary fixed-bottom-right">Add</a>
</a>

<!--Session Messages-->
@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
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
