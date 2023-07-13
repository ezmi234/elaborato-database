
@extends('layouts.app')

@extends('layouts.sidebar')
@section('content')
    <h1>Aggiungi Veicolo</h1>
    <form action="{{ route('veicoli.store') }}" method="POST">
        @csrf
        <div class="form-group" style="margin-bottom: 10px;">
            <label for="numero_telaio">Numero Telaio</label>
            <input type="text" name="numero_telaio" id="numero_telaio" class="form-control" placeholder="Numero Telaio" aria-describedby="helpId">
        </div>
        <div class="form-group" style="margin-bottom: 10px;">
            <label for="marca">Marca</label>
            <input type="text" name="marca" id="marca" class="form-control" placeholder="Marca" aria-describedby="helpId">
        </div>
        <div class="form-group" style="margin-bottom: 10px;">
            <label for="modello">Modello</label>
            <input type="text" name="modello" id="modello" class="form-control" placeholder="Modello" aria-describedby="helpId">
        </div>
        <div class="form-group" style="margin-bottom: 10px;">
            <label for="targa">Targa</label>
            <input type="text" name="targa" id="targa" class="form-control" placeholder="Targa" aria-describedby="helpId">
        </div>
        <div class="form-group" style="margin-bottom: 10px;">
            <label for="anno_immatricolazione">Anno Immatricolazione</label>
            <input type="number" name="anno_immatricolazione" id="anno_immatricolazione" class="form-control" placeholder="Anno Immatricolazione" aria-describedby="helpId">
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
