@extends('layouts.app')

@extends('layouts.sidebar')

@section('content')
    <h1>Aggiungi Recensione</h1>

    <form action="{{ route('recensioni.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="voto">Voto:</label>
            <select name="voto" id="voto" class="form-control" required>
                <option value="1">1 Stella</option>
                <option value="2">2 Stelle</option>
                <option value="3">3 Stelle</option>
                <option value="4">4 Stelle</option>
                <option value="5">5 Stelle</option>
            </select>
        </div>
        <div class="form-group">
            <label for="messaggio">Messaggio:</label>
            <textarea class="form-control" id="messaggio" name="messaggio" rows="3" required></textarea>
        </div>
        @if($acquisto)
            <input type="hidden" name="codice_acquisto" value="{{ $acquisto->codice_acquisto }}">
        @elseif ($intervento)
            <input type="hidden" name="codice_intervento" value="{{ $intervento->codice_intervento }}">
        @elseif ($compra_vendita)
            <input type="hidden" name="codice_compra_vendita" value="{{ $compra_vendita->codice_compra_vendita }}">
        @endif
        <button type="submit" class="btn btn-primary mt-2">Aggiungi</button>
    </form>
@endsection
