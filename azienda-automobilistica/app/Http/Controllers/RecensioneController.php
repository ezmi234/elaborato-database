<?php

namespace App\Http\Controllers;

use App\Models\AcquistoInStore;
use App\Models\Compravendita;
use App\Models\Intervento;
use App\Models\Recensione;
use Illuminate\Http\Request;

class RecensioneController extends Controller
{
    public function index(Request $request)
    {
        $sortColumn = $request->input('sort_by', 'codice_recensione');
        $sortOrder = $request->input('sort_order', 'asc');

        $recensioni = Recensione::orderBy($sortColumn, $sortOrder)->get();

        return view('recensioni.index', compact('recensioni'));
    }

    public function create(Request $request)
    {
        $acquisto = null;
        $intervento = null;
        $compra_vendita = null;

        if ($request->has('acquisto')) {
            $acquisto = AcquistoInStore::find($request->input('acquisto'));
        } else if ($request->has('intervento')) {
            $intervento = Intervento::find($request->input('intervento'));
        } else if ($request->has('compra_vendita')) {
            $compra_vendita = Compravendita::find($request->input('compra_vendita'));
        }
        return view('recensioni.create', compact('acquisto', 'intervento', 'compra_vendita'));

    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'voto' => 'required|integer|min:1|max:5',
            'messaggio' => 'required|string|max:255',
            'codice_acquisto' => 'sometimes|integer',
            'codice_intervento' => 'sometimes|integer',
            'codice_compra_vendita' => 'sometimes|integer',
        ]);
        try {
            Recensione::create($validatedData);
            if ($request->has('codice_intervento')){
                $intervento = Intervento::find($validatedData['codice_intervento']);
                foreach ($intervento->meccanici as $meccanico) {
                    $media_recensioni = ($meccanico->totale_recensioni + $validatedData['voto']) / ($meccanico->numero_recensioni + 1);
                    //dd($media_recensioni);
                    $meccanico->update([
                        'totale_recensioni' => $meccanico->totale_recensioni + $validatedData['voto'],
                        'numero_recensioni' => $meccanico->numero_recensioni + 1,
                        'media_recensioni' => $media_recensioni,
                    ]);
                }
            }
        } catch (\Exception $e) {
            return redirect()->route('recensioni.index')->with('error', 'Errore durante la creazione della recensione!')
                ->with('message', $e->getMessage());
        }
        return redirect()->route('recensioni.index')->with('success', 'Recensione creata con successo!');
    }

    public function show(Recensione $recensione)
    {
        return view('recensioni.show')->with('recensione', $recensione);
    }

    public function edit(Recensione $recensione)
    {
        return view('recensioni.edit')->with('recensione', $recensione);
    }

    public function update(Request $request, Recensione $recensione)
    {
        $validatedData = $request->validate([
            'voto' => 'required|integer|min:1|max:5',
            'messaggio' => 'required|string|max:255',
        ]);
        try {
            $recensione->update($validatedData);
        } catch (\Exception $e) {
            return redirect()->route('recensioni.index')->with('error', 'Errore durante la modifica della recensione!')
                ->with('message', $e->getMessage());
        }
        return redirect()->route('recensioni.index')->with('success', 'Recensione modificata con successo!');
    }

    public function destroy(Recensione $recensione)
    {
        try {
            $recensione->delete();
        } catch (\Exception $e) {
            return redirect()->route('recensioni.index')->with('error', 'Errore durante l\'eliminazione della recensione!')
                ->with('message', $e->getMessage());
        }
        return redirect()->route('recensioni.index')->with('success', 'Recensione eliminata con successo!');
    }

}
