@extends('layouts.app')

@extends('layouts.sidebar')

@section('content')
    <h1>Create Recensione</h1>

    <form action="{{ route('recensioni.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="voto">Voto:</label>
            <input type="number" class="form-control" id="voto" name="voto" min="1" max="5" required>
        </div>
        <div class="form-group">
            <label for="messaggio">Messaggio:</label>
            <textarea class="form-control" id="messaggio" name="messaggio" rows="3" required></textarea>
        </div>
        @if($acquisto)
            <input type="hidden" name="codice_acquisto" value="{{ $acquisto->codice_acquisto }}">
        @elseif ($intervento)
            <input type="hidden" name="codice_intervento" value="{{ $intervento->codice_intervento }}">
        @endif
        <button type="submit" class="btn btn-primary mt-2">Submit</button>
    </form>
@endsection
