@extends('layouts.app')

@extends('layouts.sidebar')

@section('content')
    <h1>Accessori</h1>

    <!-- Filters -->
    <div class="mb-3 form-inline d-flex align-items-center">
        <form action="{{ route('accessori.index') }}" method="GET" class="d-flex align-items-center">
            <label for="sort_by" style="margin-right: 10px; width:200px;">Sort by:</label>
            <select name="sort_by" id="sort_by" class="form-control" style="margin-right: 10px;">
                <option value="codice_accessorio" {{ request('sort_by') === 'codice_accessorio' ? 'selected' : '' }}>Codice Accessorio</option>
                <option value="nome" {{ request('sort_by') === 'nome' ? 'selected' : '' }}>Nome Accessorio</option>
                <option value="prezzo" {{ request('sort_by') === 'prezzo' ? 'selected' : '' }}>Prezzo</option>
                <option value="quantita_venduta" {{ request('sort_by') === 'quantita_venduta' ? 'selected' : '' }}>Quantità Venduta</option>
            </select>
            <select name="sort_order" id="sort_order" class="form-control" style="margin-right: 10px;">
                <option value="asc" {{ request('sort_order') === 'asc' ? 'selected' : '' }}>Ascending</option>
                <option value="desc" {{ request('sort_order') === 'desc' ? 'selected' : '' }}>Descending</option>
            </select>
            <button type="submit" class="btn btn-primary">Apply</button>
        </form>
    </div>

    <!-- Accessori Table -->
    <table class="table">
        <thead>
            <tr>
                <th>Codice Accessorio</th>
                <th>Nome Accessorio</th>
                <th>Prezzo</th>
                <th>Quantità Venduta</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($accessori as $accessorio)
                <tr>
                    <td>{{ $accessorio->codice_accessorio }}</td>
                    <td>{{ $accessorio->nome }}</td>
                    <td>{{ $accessorio->prezzo }}</td>
                    <td>{{ $accessorio->acquisti->sum('pivot.quantita') }}</td>
                    <td>


                        <form action="{{ route('accessori.destroy', $accessorio->codice_accessorio) }}" method="POST"
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

    <a href="{{ route('accessori.create') }}" class="btn btn-primary fixed-bottom-right">
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
