@extends('layouts.app')

@extends('layouts.sidebar')

@section('content')
    <h1>Veicoli</h1>

    <!-- Filters -->
    <div class="mb-3 form-inline d-flex align-items-center">
        <form action="{{ route('veicoli.index') }}" method="GET" class="d-flex align-items-center">
            <!-- Add your filter inputs here -->
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
                <th>Actions</th>
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
                        <a href="{{ route('veicoli.show', $veicolo->numero_telaio) }}" class="btn btn-primary">Show</a>
                        <a href="{{ route('veicoli.edit', $veicolo->numero_telaio) }}" class="btn btn-success">Edit</a>
                        <form action="{{ route('veicoli.destroy', $veicolo->numero_telaio) }}" method="POST"
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

    <a href="{{ route('veicoli.create') }}" class="btn btn-primary fixed-bottom-right">
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
