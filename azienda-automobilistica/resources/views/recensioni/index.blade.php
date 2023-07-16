@extends('layouts.app')

@extends('layouts.sidebar')

@section('content')
    <h1>Recensioni</h1>

    <!-- Filters -->
    <div class="mb-3 form-inline d-flex align-items-center">
        <form action="{{ route('recensioni.index') }}" method="GET" class="d-flex align-items-center">
            <label for="sort_by" style="margin-right: 10px; width:200px;">Sort by:</label>
            <select name="sort_by" id="sort_by" class="form-control" style="margin-right: 10px;">
                <option value="codice_recensione" {{ request('sort_by') === 'codice_recensione' ? 'selected' : '' }}>Codice Recensione</option>
                <option value="voto" {{ request('sort_by') === 'voto' ? 'selected' : '' }}>Voto</option>
                <option value="messaggio" {{ request('sort_by') === 'messaggio' ? 'selected' : '' }}>Messaggio</option>
            </select>
            <select name="sort_order" id="sort_order" class="form-control" style="margin-right: 10px;">
                <option value="asc" {{ request('sort_order') === 'asc' ? 'selected' : '' }}>Ascending</option>
                <option value="desc" {{ request('sort_order') === 'desc' ? 'selected' : '' }}>Descending</option>
            </select>
            <button type="submit" class="btn btn-primary">Apply</button>
        </form>
    </div>

    <!-- Recensioni Table -->
    <table class="table">
        <thead>
            <tr>
                <th>Codice Recensione</th>
                <th>Voto</th>
                <th>Messaggio</th>
                <th>Tipo</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($recensioni as $recensione)
                <tr>
                    <td>{{ $recensione->codice_recensione }}</td>
                    <td>{{ $recensione->voto }}</td>
                    <td>{{ $recensione->messaggio }}</td>
                    <td>
                        @if ($recensione->codice_acquisto)
                            Acquisto in Store
                        @elseif ($recensione->codice_intervento)
                            Intervento
                        @elseif ($recensione->codice_compra_vendita)
                            Compravendita Auto
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('recensioni.show', $recensione->codice_recensione) }}" class="btn btn-primary">Show</a>
                        <form action="{{ route('recensioni.destroy', $recensione->codice_recensione) }}" method="POST"
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

    <!-- SessionMessages -->
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
