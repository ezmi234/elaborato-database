@extends('layouts.app')

@extends('layouts.sidebar')

@section('content')
    <h1>Pezzo di Ricambio Details</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Pezzo di Ricambio Information</h5>
            <p><strong>Codice Pezzo:</strong> {{ $pezzo_di_ricambio->codice_pezzo }}</p>
            <p><strong>Nome:</strong> {{ $pezzo_di_ricambio->nome }}</p>
            <p><strong>Prezzo:</strong> {{ $pezzo_di_ricambio->prezzo }}</p>
            <p><strong>Modello:</strong> {{ $pezzo_di_ricambio->modello }}</p>
        </div>
    </div>

    <div class="mt-3">
        <a href="{{ route('pezzo_di_ricambio.edit', $pezzo_di_ricambio->codice_pezzo) }}" class="btn btn-success">Edit</a>
        <form action="{{ route('pezzo_di_ricambio.destroy', $pezzo_di_ricambio->codice_pezzo) }}" method="POST" style="display: inline-block;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
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
