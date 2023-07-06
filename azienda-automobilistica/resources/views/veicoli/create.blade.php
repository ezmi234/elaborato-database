@extends('layouts.app')

@extends('layouts.sidebar')

@section('content')
    <h1>Aggiungi Veicolo</h1>
    <form action="{{ route('veicoli.store') }}" method="POST">
        @csrf
        <div class="form-group" style="margin-bottom: 10px;">
            <label for="numero_di_serie">Numero di Serie</label>
            <input type="text" name="numero_di_serie" id="numero_di_serie" class="form-control" placeholder="Numero di Serie" aria-describedby="helpId">
        </div>
        <div class="form-group" style="margin-bottom: 10px;">
            <label for="targa">Targa</label>
            <input type="text" name="targa" id="targa" class="form-control" placeholder="Targa" aria-describedby="helpId">
        </div>
        <div class="form-group" style="margin-bottom: 10px;">
            <label for="modello">Modello</label>
            <input type="text" name="modello" id="modello" class="form-control" placeholder="Modello" aria-describedby="helpId">
        </div>
        <div class="form-group" style="margin-bottom: 10px;">
            <label for="anno">Anno</label>
            <input type="number" name="anno" id="anno" class="form-control" placeholder="Anno" aria-describedby="helpId">
        </div>
        <div class="form-group" style="margin-bottom: 10px;">
            <label for="colore">Colore</label>
            <input type="text" name="colore" id="colore" class="form-control" placeholder="Colore" aria-describedby="helpId">
        </div>
        <button type="submit" class="btn btn-primary">Aggiungi Veicolo</button>
    </form>

    @if ($errors->veicoli->any())
        <div class="alert alert-danger mt-4">
            <ul>
                @foreach ($errors->veicoli->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

@endsection
