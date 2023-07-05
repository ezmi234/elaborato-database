@extends('layouts.app')

@extends('layouts.sidebar')
@section('content')
<h1>Modifica Consulente</h1>
<form action="{{ route('consulenti.update', $consulente->CF) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group" style="margin-bottom: 10px;">
        <label for="CF">Codice Fiscale</label>
        <input type="text" name="CF" id="CF" class="form-control" placeholder="Codice Fiscale" aria-describedby="helpId" value="{{ $consulente->CF }}" readonly>
    </div>
    <div class="form-group" style="margin-bottom: 10px;">
        <label for="name">Nome</label>
        <input type="text" name="nome" id="nome" class="form-control" placeholder="Nome" aria-describedby="helpId" value="{{ $consulente->nome }}">
    </div>
    <div class="form-group" style="margin-bottom: 10px;">
        <label for="cognome">Cognome</label>
        <input type="text" name="cognome" id="cognome" class="form-control" placeholder="Cognome" aria-describedby="helpId" value="{{ $consulente->cognome }}">
    </div>
    <div class="form-group" style="margin-bottom: 10px;">
        <label for="birth">Data di nascita</label>
        <input type="date" name="data_nascita" id="data_nascita" class="form-control" placeholder="Data di nascita" aria-describedby="helpId" value="{{ $consulente->data_nascita }}">
    </div>
    <div class="form-group" style="margin-bottom: 10px;">
        <label for="telefono">Telefono</label>
        <input type="text" name="telefono" id="telefono" class="form-control" placeholder="Telefono" aria-describedby="helpId" value="{{ $consulente->telefono }}">
    </div>
    <div class="form-group" style="margin-bottom: 10px;">
        <label for="percentuale_provvigione">Percentuale Provvigione</label>
        <input type="text" name="percentuale_provvigione" id="percentuale_provvigione" class="form-control" placeholder="Percentuale Provvigione" aria-describedby="helpId" value="{{ $consulente->percentuale_provvigione }}">
    </div>
    <div class="form-group" style="margin-bottom: 10px;">
        <label for="provvigione_totale">Provvigione Totale</label>
        <input type="text" name="provvigione_totale" id="provvigione_totale" class="form-control" placeholder="Provvigione Totale" aria-describedby="helpId" value="{{ $consulente->provvigione_totale }}">
    </div>
    <button type="submit" class="btn btn-primary">Aggiorna Consulente</button>
</form>

@if ($errors->consulenti->any())
    <div class="alert alert-danger mt-4">
        <ul>
            @foreach ($errors->consulenti->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@endsection