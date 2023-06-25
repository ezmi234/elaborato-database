@extends('template.app', ['title' => 'Clients'])

@section('content')
    <h1>Add Client</h1>
    <form action="{{ route('store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="CF">CF cliente</label>
            <input type="text" name="CF" id="CF" class="form-control" placeholder="CF cliente" aria-describedby="helpId">
            <small id="helpId" class="text-muted">Client CF</small>
        </div>
        <div class="form-group">
            <label for="name">Nome Cliente</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="Nome Cliente" aria-describedby="helpId">
            <small id="helpId" class="text-muted">Client Name</small>
        </div>
        <div>
            <label for="surname">Cognome Cliente</label>
            <input type="text" name="surname" id="surname" class="form-control" placeholder="Cognome Cliente" aria-describedby="helpId">
            <small id="helpId" class="text-muted">Client Surname</small>
        </div>
        <div>
            <label for="birth">Data di nascita</label>
            <input type="date" name="date_of_birth" id="date_of_birth" class="form-control" placeholder="Data di nascita" aria-describedby="helpId">
            <small id="helpId" class="text-muted">Client Date of birth</small>
        </div>
        <div>
            <label for="tel">Telefono</label>
            <input type="text" name="tel" id="tel" class="form-control" placeholder="Telefono" aria-describedby="helpId">
            <small id="helpId" class="text-muted">Client Telephone</small>
        </div>
        <div>
            <label for="Buondo dacquisto">Buondo dacquisto</label>
            <input type="float" name="Buondo dacquisto" id="Buondo dacquisto" class="form-control" placeholder="Buondo dacquisto" aria-describedby="helpId">
            <small id="helpId" class="text-muted">Client Buondo dacquisto</small>
        </div>
        <button type="submit" class="btn btn-primary">Aggiungi Cliente</button>
    </form>
@endsection
