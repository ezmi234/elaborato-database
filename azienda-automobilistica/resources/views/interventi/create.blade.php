@extends('layouts.app')

@extends('layouts.sidebar')

@section('content')
    <h1>Create Interventi</h1>

    <form action="{{ route('interventi.store') }}" method="POST">
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

        <!-- Veicolo -->
        <div class="form-group">
            <label for="numero_telaio">Veicolo:</label>
            <select name="numero_telaio" id="numero_telaio" class="form-control" required>
                @foreach ($veicoli as $veicolo)
                    <option value="{{ $veicolo->numero_telaio }}">{{ $veicolo->numero_telaio }}</option>
                @endforeach
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

        <!-- Pezzi di ricambio -->
        <div class="form-group">
            <h3>Pezzi di ricambio:</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Prezzo</th>
                        <th>Quantità</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pezzi_di_ricambio as $pezzo)
                        <tr>
                            <td>{{ $pezzo->nome }}</td>
                            <td>{{ $pezzo->prezzo }}</td>
                            <td>
                                <input type="number" value="0" name="pezzi_di_ricambio[{{ $pezzo->id }}]" class="form-control" required>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Meccanici -->
        <div class="form-group">
            <h3>Meccanici:</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Paga oraria</th>
                        <th>Totale ore svolte</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($meccanici as $meccanico)
                        <tr>
                            <td>{{ $meccanico->nome }} {{ $meccanico->cognome }}</td>
                            <td>{{ $meccanico->paga_oraria }}</td>
                            <td>
                                <input type="number" value="0" name="meccanici[{{ $meccanico->CF }}]" class="form-control" required>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>


    <!-- Costo Pezzi di Ricambio -->
    <div class="form-group">
        <label for="costo_pezzi_ricambio">Costo Pezzi di Ricambio:</label>
        <input type="text" id="costo_ricambi" name="costo_ricambi" value="0" class="form-control" readonly>
    </div>

    <!-- Costo Totale Meccanici -->
    <div class="form-group">
        <label for="costo_totale_meccanici">Costo Totale Meccanici:</label>
        <input type="text" id="costo_ore_di_lavoro" name="costo_ore_di_lavoro" value="0" class="form-control" readonly>
    </div>

    <!-- Total Cost -->
    <div class="form-group">
        <label for="costo_totale">Costo Totale:</label>
        <input type="text" id="costo_totale" name="costo_totale" value="0" class="form-control" readonly>
    </div>

    <button type="submit" class="btn btn-primary mt-2">Aggiungi intervento</button>
    </form>

    @if ($errors->any())
        <div class="alert alert-danger mt-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <script>
        // Calculate total cost
        const pezziInputs = document.querySelectorAll('input[name^="pezzi_di_ricambio"]');
        const meccaniciInputs = document.querySelectorAll('input[name^="meccanici"]');
        const costoPezziRicambioInput = document.getElementById('costo_ricambi');
        const costoTotaleMeccaniciInput = document.getElementById('costo_ore_di_lavoro');
        const costoTotaleInput = document.getElementById('costo_totale');

        pezziInputs.forEach(input => {
            input.addEventListener('input', updateTotalCost);
            input.addEventListener('change', checkQuantityBounds);
        });

        meccaniciInputs.forEach(input => {
            input.addEventListener('input', updateTotalCost);
            input.addEventListener('change', checkQuantityBounds);
        });

        function updateTotalCost() {
            let costoPezziRicambio = 0;
            let costoTotaleMeccanici = 0;

            pezziInputs.forEach(input => {
                const quantity = Math.max(parseFloat(input.value) || 0, 0); // Ensure positive quantity
                const price = parseFloat(input.parentNode.previousElementSibling.textContent);
                costoPezziRicambio += quantity * price;
                input.value = quantity; // Update input value to reflect any changes
            });

            meccaniciInputs.forEach(input => {
                const hours = Math.max(parseFloat(input.value) || 0, 0); // Ensure positive hours
                const hourlyRate = parseFloat(input.parentNode.previousElementSibling.textContent);
                costoTotaleMeccanici += hours * hourlyRate;
                input.value = hours; // Update input value to reflect any changes
            });

            costoPezziRicambioInput.value = costoPezziRicambio.toFixed(2);
            costoTotaleMeccaniciInput.value = costoTotaleMeccanici.toFixed(2);
            costoTotaleInput.value = (costoPezziRicambio + costoTotaleMeccanici).toFixed(2);
        }

        function checkQuantityBounds() {
            const min = 0;
            const max = 999; // Modify as per your requirements

            const input = this;
            let value = parseFloat(input.value) || 0;

            if (value < min) {
                value = min;
            } else if (value > max) {
                value = max;
            }

            input.value = value;
        }
    </script>
@endsection
