@extends('layouts.app')

@extends('layouts.sidebar')

@section('content')
    <h1>Meccanici</h1>

    <!-- Filters -->
    <div class="mb-3 form-inline d-flex align-items-center">
        <form action="{{ route('meccanici.index') }}" method="GET" class="d-flex align-items-center">
            <label for="sort_by" style="margin-right: 10px;  width:200px;">Sort by:</label>
            <select name="sort_by" id="sort_by" class="form-control" style="margin-right: 10px;">
                <option value="CF" {{ request('sort_by') === 'CF' ? 'selected' : '' }}>CF</option>
                <option value="nome" {{ request('sort_by') === 'nome' ? 'selected' : '' }}>Nome Meccanico</option>
                <option value="cognome" {{ request('sort_by') === 'cognome' ? 'selected' : '' }}>Cognome Meccanico</option>
                <option value="data_nascita" {{ request('sort_by') === 'data_nascita' ? 'selected' : '' }}>Data di nascita</option>
                <option value="telefono" {{ request('sort_by') === 'telefono' ? 'selected' : '' }}>Telefono</option>
                <option value="paga_oraria" {{ request('sort_by') === 'paga_oraria' ? 'selected' : '' }}>Paga Oraria</option>
                <option value="media_recensioni" {{ request('sort_by') === 'media_recensioni' ? 'selected' : '' }}>Media Recensioni</option>
            </select>
            <select name="sort_order" id="sort_order" class="form-control" style="margin-right: 10px;">
                <option value="asc" {{ request('sort_order') === 'asc' ? 'selected' : '' }}>Ascending</option>
                <option value="desc" {{ request('sort_order') === 'desc' ? 'selected' : '' }}>Descending</option>
            </select>
            <button type="submit" class="btn btn-primary">Apply</button>
        </form>
    </div>

    <!-- Meccanici Table -->
    <table class="table">
        <thead>
            <tr>
                <th>CF Meccanico</th>
                <th>Nome Meccanico</th>
                <th>Cognome Meccanico</th>
                <th>Data di nascita</th>
                <th>Telefono</th>
                <th>Paga Oraria</th>
                <th>Media Recensioni</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($meccanici as $meccanico)
                <tr>
                    <td>{{ $meccanico->CF }}</td>
                    <td>{{ $meccanico->nome }}</td>
                    <td>{{ $meccanico->cognome }}</td>
                    <td>{{ $meccanico->data_nascita }}</td>
                    <td>{{ $meccanico->telefono }}</td>
                    <td>{{ $meccanico->paga_oraria }}</td>
                    <td>{{ $meccanico->media_recensioni }}</td>
                    <td>
                        <a href="{{ route('meccanici.show', $meccanico->CF) }}" class="btn btn-primary">Show</a>
                        <a href="{{ route('meccanici.edit', $meccanico->CF) }}" class="btn btn-success">Edit</a>
                        <form action="{{ route('meccanici.destroy', $meccanico->CF) }}" method="POST"
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

    <a href="{{ route('meccanici.create') }}" class="btn btn-primary fixed-bottom-right">
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
