@extends('layouts.app')

@extends('layouts.sidebar')

@section('content')
    <h1>Pezzo di Ricambio Details</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Pezzo di Ricambio Information</h5>
            <p><strong>Codice Pezzo:</strong> {{ $pezzo->codicePezzo }}</p>
            <p><strong>Nome:</strong> {{ $pezzo->nome }}</p>
            <p><strong>Prezzo:</strong> {{ $pezzo->prezzo }}</p>
            <p><strong>Modello:</strong> {{ $pezzo->modello }}</p>
        </div>
    </div>

    <div class="mt-3">
        <a href="{{ route('pezzi_di_ricambio.edit', $pezzo->id) }}" class="btn btn-success">Edit</a>
        <form action="{{ route('pezzi_di_ricambio.destroy', $pezzo->id) }}" method="POST" style="display: inline-block;">
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
