@extends('layouts.app')

@extends('layouts.sidebar')
@section('content')
<h1>Modifica Cliente</h1>
<form action="{{ route('clienti.update', $cliente->CF) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group" style="margin-bottom: 10px;">
        <label for="CF">CF cliente</label>
        <input type="text" name="CF" id="CF" class="form-control" placeholder="CF cliente" aria-describedby="helpId" value="{{ $cliente->CF }}" readonly>
    </div>
    <div class="form-group" style="margin-bottom: 10px;">
        <label for="name">Nome Cliente</label>
        <input type="text" name="nome" id="nome" class="form-control" placeholder="Nome Cliente" aria-describedby="helpId" value="{{ $cliente->nome }}">
    </div>
    <div class="form-group" style="margin-bottom: 10px;">
        <label for="cognome">Cognome Cliente</label>
        <input type="text" name="cognome" id="cognome" class="form-control" placeholder="Cognome Cliente" aria-describedby="helpId" value="{{ $cliente->cognome }}">
    </div>
    <div class="form-group" style="margin-bottom: 10px;">
        <label for="birth">Data di nascita</label>
        <input type="date" name="data_nascita" id="data_nascita" class="form-control" placeholder="Data di nascita" aria-describedby="helpId" value="{{ $cliente->data_nascita }}">
    </div>
    <div class="form-group" style="margin-bottom: 10px;">
        <label for="telefono">Telefono</label>
        <input type="text" name="telefono" id="telefono" class="form-control" placeholder="Telefono" aria-describedby="helpId" value="{{ $cliente->telefono }}">
    </div>
    <div class="form-group" style="margin-bottom: 10px;">
        <label for="buono_acquisto">Buono d'acquisto</label>
        <input type="number" name="buono_acquisto" id="buono_acquisto" class="form-control" placeholder="Buono d'acquisto" aria-describedby="helpId" value="{{ $cliente->buono_acquisto }}">
    </div>
    <button type="submit" class="btn btn-primary">Aggiorna Cliente</button>
</form>

@if ($errors->clienti->any())
    <div class="alert alert-danger mt-4">
        <ul>
            @foreach ($errors->clienti->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@endsection
