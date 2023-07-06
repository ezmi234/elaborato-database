<?php

namespace App\Http\Controllers;
use App\Models\PezzoDiRicambio;
use Illuminate\Http\Request;

class PezzoDiRicambioController extends Controller
{
    public function index()
    {
        $pezzi_di_ricambio = PezzoDiRicambio::all();
        return view('pezzi_di_ricambio.index')->with('pezzi_di_ricambio', $pezzi_di_ricambio);
    }

    public function create()
    {
        return view('pezzi_di_ricambio.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'codicePezzo' => ['required', 'unique:pezzi_di_ricambio'],
            'nome' => ['required', 'max:255'],
            'prezzo' => ['required', 'numeric', 'min:0'],
            'modello' => ['required', 'max:255'],
        ]);

        try {
            PezzoDiRicambio::create($validatedData);
        } catch (\Exception $e) {
            return redirect()->route('pezzi_di_ricambio.index')->with('error', 'Errore durante la creazione del pezzo di ricambio!')
                ->with('message', $e->getMessage());
        }

        return redirect()->route('pezzi_di_ricambio.index')->with('success', 'Pezzo di ricambio creato con successo!');
    }

    public function show(PezzoDiRicambio $pezzoDiRicambio)
    {
        return view('pezzi_di_ricambio.show')->with('pezzoDiRicambio', $pezzoDiRicambio);
    }

    public function edit(PezzoDiRicambio $pezzoDiRicambio)
    {
        return view('pezzi_di_ricambio.edit')->with('pezzoDiRicambio', $pezzoDiRicambio);
    }

    public function update(Request $request, PezzoDiRicambio $pezzoDiRicambio)
    {
        $validatedData = $request->validate([
            'nome' => ['required', 'max:255'],
            'prezzo' => ['required', 'numeric', 'min:0'],
            'modello' => ['required', 'max:255'],
        ]);

        try {
            $pezzoDiRicambio->update($validatedData);
        } catch (\Exception $e) {
            return redirect()->route('pezzi_di_ricambio.index')->with('error', 'Errore durante la modifica del pezzo di ricambio!')
                ->with('message', $e->getMessage());
        }

        return redirect()->route('pezzi_di_ricambio.index')->with('success', 'Pezzo di ricambio modificato con successo!');
    }

    public function destroy(PezzoDiRicambio $pezzoDiRicambio)
    {
        $pezzoDiRicambio->delete();

        return redirect()->route('pezzi_di_ricambio.index');
    }
}
