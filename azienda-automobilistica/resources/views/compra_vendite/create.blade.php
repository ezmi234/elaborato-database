@extends('layouts.app')

@extends('layouts.sidebar')

@section('content')
    <h1>Aggiungi Compra Vendita Auto</h1>

    <form action="{{ route('compra_vendite.store') }}" method="POST">
        @csrf

        <!-- Cliente -->
        <div class="form-group">
            <label for="CF_cliente">Cliente:</label>
            <select name="CF_cliente" id="CF_cliente" class="form-control" required>
                @foreach ($clienti as $cliente)
                    <option value="{{ $cliente->CF }}">{{ $cliente->CF }}</option>
                @endforeach
            </select>
        </div>

         <!-- Officina -->
        <div class="form-group">
            <label for="codice_officina">Officina:</label>
            <select name="codice_officina" id="codice_officina" class="form-control" required>
                @foreach ($officine as $officina)
                    <option value="{{ $officina->codice_officina }}">{{ $officina->nome }}</option>
                @endforeach
            </select>
        </div>

         <!-- Consulente -->
         <div class="form-group">
            <label for="CF_consulente">Consulente:</label>
            <select name="CF_consulente" id="CF_consulente" class="form-control" required>
                @foreach ($consulenti as $consulente)
                    <option class="{{ $consulente->codice_officina }}" value="{{ $consulente->CF }}">{{ $consulente->CF }}</option>
                @endforeach
            </select>
        </div>

        <!-- Veicolo -->
        <div class="form-group">
            <label for="numero_telaio">Veicolo:</label>
            <select name="numero_telaio" id="numero_telaio" class="form-control" required>
                @foreach ($veicoli as $veicolo)
                    <option value="{{ $veicolo->numero_telaio }}">{{ $veicolo->numero_telaio }}</option>
                @endforeach
            </select>
        </div>

        <!-- Tipo Vendita -->
        <div class="form-group">
            <label for="tipo_vendita">Tipo Vendita:</label>
            <select name="tipo_vendita" id="tipo_vendita" class="form-control" required>
                <option value="1">Vendita</option>
                <option value="0">Acquisto</option>
            </select>
        </div>

        <!-- Metodo di pagamento -->
        <div class="form-group">
            <label for="metodo_pagamento">Metodo di pagamento:</label>
            <select name="metodo_pagamento" id="metodo_pagamento" class="form-control" required>
                <option value="Contanti">Contanti</option>
                <option value="Carta di credito">Carta di credito</option>
                <option value="Bonifico">Bonifico</option>
            </select>
        </div>

        <!-- Descrizione -->
        <div class="form-group">
            <label for="descrizione">Descrizione:</label>
            <textarea name="descrizione" id="descrizione" cols="30" rows="10" class="form-control"></textarea>
        </div>

        <!-- Costo Totale -->
        <div class="form-group">
            <label for="costo_totale">Costo Totale:</label>
            <input type="text" id="costo_totale" name="costo_totale" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary mt-2">Aggiungi Compra Vendita</button>
    </form>

    <!-- Session Messages -->
    @if ($errors->compra_vendite->any())
        <div class="alert alert-danger mt-4">
            <ul>
                @foreach ($errors->compra_vendite->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <script>
        let officinaSelect = document.getElementById('codice_officina');
        let cfConsulenteSelect = document.getElementById('CF_consulente');
        let selectedOfficinaId = officinaSelect.value;

        cfConsulenteSelect.querySelectorAll('option').forEach(option => {
            if (option.classList.contains(selectedOfficinaId)) {
                option.hidden = false;
            } else {
                option.hidden = true;
            }
        });

        officinaSelect.addEventListener('change', (event) => {
            let selectedOfficinaId = event.target.value;
            first = 0;
            cfConsulenteSelect.querySelectorAll('option').forEach(option => {
                if (option.classList.contains(selectedOfficinaId)) {
                    option.hidden = false;
                } else {
                    option.hidden = true;
                }
            });

            // set the first option to selected

            cfConsulenteSelect.querySelectorAll('option').forEach(option => {
                if (option.classList.contains(selectedOfficinaId) && first == 0) {
                    option.selected = true;
                    first = 1;
                }
            });
        });



    </script>
@endsection
