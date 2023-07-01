@extends('layouts.app')

@extends('layouts.sidebar')

@section('content')
    <h1>Add Officina</h1>
    <form action="{{ route('officine.store') }}" method="POST">
        @csrf
        <div class="form-group" style="margin-bottom: 10px;">
            <label for="nome">Nome Officina</label>
            <input type="text" name="nome" id="nome" class="form-control" placeholder="Nome Officina" aria-describedby="helpId">
        </div>
        <div class="form-group" style="margin-bottom: 10px;">
            <label for="sede_città">Sede Città</label>
            <input type="text" name="sede_città" id="sede_città" class="form-control" placeholder="Sede Città" aria-describedby="helpId">
        </div>
        <div class="form-group" style="margin-bottom: 10px;">
            <label for="sede_via">Sede Via</label>
            <input type="text" name="sede_via" id="sede_via" class="form-control" placeholder="Sede Via" aria-describedby="helpId">
        </div>
        <div class="form-group" style="margin-bottom: 10px;">
            <label for="sede_civico">Sede Civico</label>
            <input type="number" name="sede_civico" id="sede_civico" class="form-control" placeholder="Sede Civico" aria-describedby="helpId">
        </div>
        <div class="form-group" style="margin-bottom: 10px;">
            <label for="bilancio">Bilancio</label>
            <input type="number" name="bilancio" id="bilancio" class="form-control" placeholder="Bilancio" aria-describedby="helpId">
        </div>
        <div class="form-group" style="margin-bottom: 10px;">
            <label for="centrale">Centrale</label>
            <select name="centrale" id="centrale" class="form-control">
                <option value="0">No</option>
                <option value="1">Yes</option>
            </select>
        </div>
        <div class="form-group" style="margin-bottom: 10px;">
            <label for="gestita_da">Gestita da</label>
            <select name="gestita_da" id="gestita_da" class="form-control">
                <option value="">None</option>
                @foreach ($officine as $officina)
                    @if ($officina->centrale == 1)
                        <option value="{{ $officina->codice_officina }}">{{ $officina->nome }}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Add Officina</button>
    </form>

    @if ($errors->officine->any())
        <div class="alert alert-danger mt-4">
            <ul>
                @foreach ($errors->officine->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
@endsection
