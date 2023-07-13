@extends('layouts.app')

@extends('layouts.sidebar')
@section('content')


<h1>Aggiungi Meccanico</h1>
<form action="{{ route('meccanici.store') }}" method="POST">
    @csrf
    <div class="form-group" style="margin-bottom: 10px;">
        <label for="CF">CF Meccanico</label>
        <input type="text" name="CF" id="CF" class="form-control" placeholder="CF Meccanico" aria-describedby="helpId">
    </div>
    <div class="form-group" style="margin-bottom: 10px;">
        <label for="nome">Nome Meccanico</label>
        <input type="text" name="nome" id="nome" class="form-control" placeholder="Nome Meccanico" aria-describedby="helpId">
    </div>
    <div class="form-group" style="margin-bottom: 10px;">
        <label for="cognome">Cognome Meccanico</label>
        <input type="text" name="cognome" id="cognome" class="form-control" placeholder="Cognome Meccanico" aria-describedby="helpId">
    </div>
    <div class="form-group" style="margin-bottom: 10px;">
        <label for="data_nascita">Data di nascita</label>
        <input type="date" name="data_nascita" id="data_nascita" class="form-control" placeholder="Data di nascita" aria-describedby="helpId">
    </div>
    <div class="form-group" style="margin-bottom: 10px;">
        <label for="telefono">Telefono</label>
        <input type="text" name="telefono" id="telefono" class="form-control" placeholder="Telefono" aria-describedby="helpId">
    </div>
    <div class="form-group" style="margin-bottom: 10px;">
        <label for="paga_oraria">Paga Oraria</label>
        <input type="number" name="paga_oraria" id="paga_oraria" class="form-control" placeholder="Paga Oraria" aria-describedby="helpId">
    </div>
    <button type="submit" class="btn btn-primary">Aggiungi Meccanico</button>
</form>

@if ($errors->meccanici->any())
 <div class="alert alert-danger">
    <ul>
        @foreach ($errors->meccanici->all() as $error)
         <li>{{ $error }}</li>
        @endforeach
    </ul>
    </div>
@endif

@endsection
