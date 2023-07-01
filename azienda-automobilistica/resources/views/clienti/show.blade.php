@extends('layouts.app')

@extends('layouts.sidebar')

@section('content')
    <h1>Client Details</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Client Information</h5>
            <p><strong>CF cliente:</strong> {{ $cliente->CF }}</p>
            <p><strong>Nome Cliente:</strong> {{ $cliente->nome }}</p>
            <p><strong>Cognome Cliente:</strong> {{ $cliente->cognome }}</p>
            <p><strong>Data di nascita:</strong> {{ $cliente->data_nascita }}</p>
            <p><strong>Telefono:</strong> {{ $cliente->telefono }}</p>
            <p><strong>Buono d'acquisto:</strong> {{ $cliente->buono_acquisto }}</p>
        </div>
    </div>

    <div class="mt-3">
        <a href="{{ route('clienti.edit', $cliente->CF) }}" class="btn btn-success">Edit</a>
        <form action="{{ route('clienti.destroy', $cliente->CF) }}" method="POST" style="display: inline-block;">
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
