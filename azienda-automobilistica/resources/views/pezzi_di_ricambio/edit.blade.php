@extends('layouts.app')

@extends('layouts.sidebar')

@section('content')
    <h1>Modifica Pezzo di Ricambio</h1>
    <form action="{{ route('pezzi_di_ricambio.update', $pezzo->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group" style="margin-bottom: 10px;">
            <label for="codicePezzo">Codice Pezzo</label>
            <input type="text" name="codicePezzo" id="codicePezzo" class="form-control" placeholder="Codice Pezzo" aria-describedby="helpId" value="{{ $pezzo->codicePezzo }}" readonly>
        </div>
        <div class="form-group" style="margin-bottom: 10px;">
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="nome" class="form-control" placeholder="Nome" aria-describedby="helpId" value="{{ $pezzo->nome }}">
        </div>
        <div class="form-group" style="margin-bottom: 10px;">
            <label for="prezzo">Prezzo</label>
            <input type="number" name="prezzo" id="prezzo" class="form-control" placeholder="Prezzo" aria-describedby="helpId" value="{{ $pezzo->prezzo }}">
        </div>
        <div class="form-group" style="margin-bottom: 10px;">
            <label for="modello">Modello</label>
            <input type="text" name="modello" id="modello" class="form-control" placeholder="Modello" aria-describedby="helpId" value="{{ $pezzo->modello }}">
        </div>
        <button type="submit" class="btn btn-primary">Aggiorna Pezzo di Ricambio</button>
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
