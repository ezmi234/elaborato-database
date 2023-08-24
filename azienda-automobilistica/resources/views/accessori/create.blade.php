@extends('layouts.app')

@extends('layouts.sidebar')
@section('content')
    <h1>Aggiungi Accessorio</h1>
    <form action="{{ route('accessori.store') }}" method="POST">
        @csrf
        <div class="form-group" style="margin-bottom: 10px;">
            <label for="nome">Nome Accessorio</label>
            <input type="text" name="nome" id="nome" class="form-control" placeholder="Nome Accessorio" aria-describedby="helpId">
        </div>
        <div class="form-group" style="margin-bottom: 10px;">
            <label for="prezzo">Prezzo</label>
            <input type="text" name="prezzo" id="prezzo" class="form-control" placeholder="Prezzo" aria-describedby="helpId">
        </div>
        <button type="submit" class="btn btn-primary">Aggiungi Accessorio</button>
    </form>

    @if ($errors->accessori->any())
        <div class="alert alert-danger mt-4">
            <ul>
                @foreach ($errors->accessori->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
@endsection
