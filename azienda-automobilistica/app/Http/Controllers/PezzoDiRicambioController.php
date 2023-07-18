<?php

namespace App\Http\Controllers;
use App\Models\PezzoDiRicambio;
use Illuminate\Http\Request;

class PezzoDiRicambioController extends Controller
{
    public function index(Request $request)
    {
        if($request->sort_by == 'quantita_utilizzata'){
            $pezzi_di_ricambio = PezzoDiRicambio::withCount(['interventi as total_quantita' => function ($query) {
                $query->select(\DB::raw('coalesce(sum(quantita), 0)'));
            }])
                ->orderBy('total_quantita', $request->sort_order ?? 'asc')
                ->get();
            return view('pezzi_di_ricambio.index', compact('pezzi_di_ricambio'));
        }
        $sortColumn = $request->input('sort_by', 'codice_pezzo');
        $sortOrder = $request->input('sort_order', 'asc');

        $pezzi_di_ricambio = PezzoDiRicambio::orderBy($sortColumn, $sortOrder)->get();
        return view('pezzi_di_ricambio.index', compact('pezzi_di_ricambio'));
    }

    public function create()
    {
        return view('pezzi_di_ricambio.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'codice_pezzo' => ['required', 'unique:pezzi_di_ricambio'],
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

    public function show(PezzoDiRicambio $pezzo_di_ricambio)
    {
        return view('pezzi_di_ricambio.show')->with('pezzoDiRicambio', $pezzo_di_ricambio);
    }

    public function edit(PezzoDiRicambio $pezzo_di_ricambio)
    {
        return view('pezzi_di_ricambio.edit')->with('pezzo_di_ricambio', $pezzo_di_ricambio);
    }

    public function update(Request $request, PezzoDiRicambio $pezzo_di_ricambio)
    {
        $validatedData = $request->validate([
            'nome' => ['required', 'max:255'],
            'prezzo' => ['required', 'numeric', 'min:0'],
            'modello' => ['required', 'max:255'],
        ]);

        try {
            $pezzo_di_ricambio->update($validatedData);
        } catch (\Exception $e) {
            return redirect()->route('pezzi_di_ricambio.index')->with('error', 'Errore durante la modifica del pezzo di ricambio!')
                ->with('message', $e->getMessage());
        }

        return redirect()->route('pezzi_di_ricambio.index')->with('success', 'Pezzo di ricambio modificato con successo!');
    }

    public function destroy(PezzoDiRicambio $pezzo_di_ricambio)
    {
        $pezzo_di_ricambio->delete();

        return redirect()->route('pezzi_di_ricambio.index');
    }
}
