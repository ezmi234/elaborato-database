@extends('layouts.app')

@extends('layouts.sidebar')

@section('content')
    <h1>Create Acquisto in Store</h1>

    <form action="{{ route('acquisti_in_store.store') }}" method="POST">
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
                    <option value="{{ $officina->codice_officina }}">{{ $officina->codice_officina }}</option>
                @endforeach
            </select>
        </div>

        <!-- Accessori -->
        <div class="form-group">
            <h3>Accessori:</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Prezzo</th>
                        <th>Quantità</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($accessori as $accessorio)
                        <tr>
                            <td>{{ $accessorio->nome }}</td>
                            <td>{{ $accessorio->prezzo }}</td>
                            <td>
                                <input type="number" name="accessori[{{ $accessorio->id }}]" class="form-control">
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Total Cost -->
    <div class="form-group">
        <label for="total_cost">Total Cost:</label>
        <input type="text" id="total_cost" name="total_cost" class="form-control" readonly>
    </div>

    <button type="submit" class="btn btn-primary mt-2">Aggiungi acquisto</button>
    </form>

    <script>
        // Calculate total cost
const accessoriInputs = document.querySelectorAll('input[name^="accessori"]');
const totalCostInput = document.getElementById('total_cost');

accessoriInputs.forEach(input => {
    input.addEventListener('input', updateTotalCost);
    input.addEventListener('change', checkQuantityBounds);
});

function updateTotalCost() {
    let totalCost = 0;
    accessoriInputs.forEach(input => {
        const quantity = Math.max(parseFloat(input.value) || 0, 0); // Ensure positive quantity
        const price = parseFloat(input.parentNode.previousElementSibling.textContent);
        totalCost += quantity * price;
        input.value = quantity; // Update input value to reflect any changes
    });
    totalCostInput.value = totalCost.toFixed(2);
}

function checkQuantityBounds() {
    const min = 0;
    const max = 999; // Modify as per your requirements

    const input = this;
    let quantity = parseFloat(input.value) || 0;

    if (quantity < min) {
        quantity = min;
    } else if (quantity > max) {
        quantity = max;
    }

    input.value = quantity;
}

    </script>

@endsection
