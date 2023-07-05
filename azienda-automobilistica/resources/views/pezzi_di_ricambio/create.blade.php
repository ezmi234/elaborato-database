@extends('layouts.app')

@extends('layouts.sidebar')

@section('content')
    <h1>Aggiungi Pezzo di Ricambio</h1>
    <form action="{{ route('pezzi_di_ricambio.store') }}" method="POST">
        @csrf
        <div class="form-group" style="margin-bottom: 10px;">
            <label for="codicePezzo">Codice Pezzo</label>
            <input type="text" name="codicePezzo" id="codicePezzo" class="form-control" placeholder="Codice Pezzo" aria-describedby="helpId">
        </div>
        <div class="form-group" style="margin-bottom: 10px;">
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="nome" class="form-control" placeholder="Nome" aria-describedby="helpId">
        </div>
        <div class="form-group" style="margin-bottom: 10px;">
            <label for="prezzo">Prezzo</label>
            <input type="number" name="prezzo" id="prezzo" class="form-control" placeholder="Prezzo" aria-describedby="helpId">
        </div>
        <div class="form-group" style="margin-bottom: 10px;">
            <label for="modello">Modello</label>
            <input type="text" name="modello" id="modello" class="form-control" placeholder="Modello" aria-describedby="helpId">
        </div>
        <button type="submit" class="btn btn-primary">Aggiungi Pezzo di Ricambio</button>
    </form>

    @if ($errors->pezzi_di_ricambio->any())
        <div class="alert alert-danger mt-4">
            <ul>
                @foreach ($errors->pezzi_di_ricambio->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
@endsection
