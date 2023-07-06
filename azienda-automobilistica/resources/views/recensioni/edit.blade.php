@extends('layouts.app')

@extends('layouts.sidebar')

@section('content')
    <h1>Edit Recensione</h1>

    <form action="{{ route('recensioni.update', $recensione->codice_recensione) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="voto">Voto:</label>
            <input type="number" class="form-control" id="voto" name="voto" min="1" max="5" value="{{ $recensione->voto }}" required>
        </div>
        <div class="form-group">
            <label for="messaggio">Messaggio:</label>
            <textarea class="form-control" id="messaggio" name="messaggio" rows="3" required>{{ $recensione->messaggio }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary mt-2">Update</button>
    </form>
@endsection
