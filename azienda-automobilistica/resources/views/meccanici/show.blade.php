@extends('layouts.app')
@extends('layouts.sidebar')
@section('content')

<h1>Dettagli Meccanico</h1>

<div class="card">
    <div class="card-body">
        <h5 class="card-title">Informazioni Meccanico</h5>
        <p><strong>CF Meccanico:</strong> {{ $meccanico->CF }}</p>
        <p><strong>Nome Meccanico:</strong> {{ $meccanico->nome }}</p>
        <p><strong>Cognome Meccanico:</strong> {{ $meccanico->cognome }}</p>
        <p><strong>Data di nascita:</strong> {{ $meccanico->data_nascita }}</p>
        <p><strong>Telefono:</strong> {{ $meccanico->telefono }}</p>
        <p><strong>Paga Oraria:</strong> {{ $meccanico->paga_oraria }}</p>
        <p><strong>Totale Ore Svolte:</strong> {{ $meccanico->totale_ore_svolte }}</p>
        <p><strong>Bonus Recensione:</strong> {{ $meccanico->bonus_recensione }}</p>
        <p><strong>Media Recensione:</strong> {{ $meccanico->media_recensioni }}</p>
    </div>
</div>

<div class="mt-3">
    <a href="{{ route('meccanici.edit', $meccanico->CF) }}" class="btn btn-success">Modifica</a>
    <form action="{{ route('meccanici.destroy', $meccanico->CF) }}" method="POST" style="display: inline-block;">
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
        @if ($meccanico->stipendi->isEmpty())
            <p>Nessuno stipendio presente</p>
        @else
            <table class="table">
                <thead>
                    <tr>
                        <th>Importo</th>
                        <th>Data</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($meccanico->stipendi as $stipendio)
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
