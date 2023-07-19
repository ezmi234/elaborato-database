@extends('layouts.app')
@extends('layouts.sidebar')
@section('content')

<h1>Dettagli Consulente</h1>

<div class="card">
    <div class="card-body">
        <h5 class="card-title">Informazioni Consulente</h5>
        <p><strong>CF Consulente:</strong> {{ $consulente->CF }}</p>
        <p><strong>Nome Consulente:</strong> {{ $consulente->nome }}</p>
        <p><strong>Cognome Consulente:</strong> {{ $consulente->cognome }}</p>
        <p><strong>Data di nascita:</strong> {{ $consulente->data_nascita }}</p>
        <p><strong>Telefono:</strong> {{ $consulente->telefono }}</p>
        <p><strong>Percentuale Provvigione:</strong> {{ $consulente->percentuale_provvigione }}</p>
        <p><strong>Totale Provvigione:</strong> {{ $consulente->totale_provvigione }}</p>
        <p><strong>Media Recensione:</strong> {{ $consulente->media_recensioni }}</p>
    </div>
</div>

<div class="mt-3">
    <a href="{{ route('consulenti.edit', $consulente->CF) }}" class="btn btn-success">Modifica</a>
    <form action="{{ route('consulenti.destroy', $consulente->CF) }}" method="POST" style="display: inline-block;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Elimina</button>
    </form>
</div>

<div class="card mt-2">
    <div class="card-header">
        <h5>Stipendi</h5>
    </div>
    <div class="card-body">
        @if ($consulente->stipendi->isEmpty())
            <p>No stipendi found for this consulente.</p>
        @else
            <table class="table">
                <thead>
                    <tr>
                        <th>Importo</th>
                        <th>Data</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($consulente->stipendi as $stipendio)
                        <tr>
                            <td>{{ $stipendio->importo }}</td>
                            <td>{{ $stipendio->created_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</div>


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

