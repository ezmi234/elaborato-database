@extends('layouts.app')

@extends('layouts.sidebar')

@section('content')
    <h1>Create Intervento</h1>

    <form action="{{ route('interventi.store') }}" method="POST">
        @csrf

        <!-- Costo Ricambi -->
        <div class="form-group">
            <label for="costo_ricambi">Costo Ricambi:</label>
            <input type="number" name="costo_ricambi" id="costo_ricambi" class="form-control" required>
        </div>

        <!-- Costo Manodopera -->
        <div class="form-group">
            <label for="costo_manodopera">Costo Manodopera:</label>
            <input type="number" name="costo_manodopera" id="costo_manodopera" class="form-control" required>
        </div>

        <!-- Metodo di Pagamento -->
        <div class="form-group">
            <label for="metodo_pagamento">Metodo di Pagamento:</label>
            <select name="metodo_pagamento" id="metodo_pagamento" class="form-control" required>
                <option value="Contanti">Contanti</option>
                <option value="Carta di Credito">Carta di Credito</option>
                <option value="Bonifico">Bonifico</option>
            </select>
        </div>

        <!-- Cliente -->
        <div class="form-group">
            <label for="cliente">Cliente:</label>
            <select name="cliente" id="cliente" class="form-control" required>
                @foreach ($clienti as $cliente)
                    <option value="{{ $cliente->CF }}">{{ $cliente->CF }}</option>
                @endforeach
            </select>
        </div>

        <!-- Officina -->
        <div class="form-group">
            <label for="officina">Officina:</label>
            <select name="officina" id="officina" class="form-control" required>
                @foreach ($officine as $officina)
                    <option value="{{ $officina->codice_officina }}">{{ $officina->nome }}</option>
                @endforeach
            </select>
        </div>

        <!-- Veicolo -->
        <div class="form-group">
            <label for="veicolo">Veicolo:</label>
            <select name="veicolo" id="veicolo" class="form-control" required>
                @foreach ($veicoli as $veicolo)
                    <option value="{{ $veicolo->numero_telaio }}">{{ $veicolo->numero_telaio }}</option>
                @endforeach
            </select>
        </div>

        <!-- Pezzi di Ricambio -->
        <div class="form-group">
            <label for="pezzi_ricambio">Pezzi di Ricambio:</label>
            <select name="pezzi_ricambio[]" id="pezzi_ricambio" class="form-control" multiple required>
                @foreach ($pezzi_di_ricambio as $pezzo)
                    <option value="{{ $pezzo->codice_pezzo }}">{{ $pezzo->codice_pezzo }} - {{ $pezzo->descrizione }}</option>
                @endforeach
            </select>
        </div>

        <!-- Meccanici -->
        <div class="form-group">
            <label for="meccanici">Meccanici:</label>
            <select name="meccanici[]" id="meccanici" class="form-control" multiple required>
                @foreach ($meccanici as $meccanico)
                    <option value="{{ $meccanico->CF }}">{{ $meccanico->CF }} - {{ $meccanico->nome }} {{ $meccanico->cognome }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection
