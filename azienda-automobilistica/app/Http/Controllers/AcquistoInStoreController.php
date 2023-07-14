<?php

namespace App\Http\Controllers;

use App\Models\AcquistoInStore;
use App\Models\Accessorio;
use App\Models\Cliente;
use App\Models\Officina;
use Illuminate\Http\Request;

class AcquistoInStoreController extends Controller
{
    public function index(Request $request)
    {
        $sortColumn = $request->input('sort_by', 'codice_acquisto');
        $sortOrder = $request->input('sort_order', 'asc');

        $acquisti = AcquistoInStore::orderBy($sortColumn, $sortOrder)->get();
        return view('acquisti_in_store.index', compact('acquisti'));
    }

    public function create()
    {
        $clienti = Cliente::all();
        $officine = Officina::all();
        $accessori = Accessorio::all();
        return view('acquisti_in_store.create', compact('clienti', 'officine', 'accessori'));
    }

    public function store(Request $request)
    {
        $this->storeAccessory($request);
    }

    public function show(AcquistoInStore $acquisto)
    {
        return view('acquisti_in_store.show', compact('acquisto'));
    }

    public function edit(AcquistoInStore $acquisto)
    {
        return view('acquisti_in_store.edit', compact('acquisto'));
    }

    public function update(Request $request, AcquistoInStore $acquisto)
    {
        $request->validate([
            'costo_totale' => 'required|numeric',
            'metodo_pagamento' => 'required|string',
            'CF_cliente' => 'required|string',
            'codice_officina' => 'required|numeric'
        ]);

        $acquisto->update($request->all());
        return redirect()->route('acquisti_in_store.index');
    }

    public function destroy(AcquistoInStore $acquisto)
    {
        $acquisto->delete();
        return redirect()->route('acquisti_in_store.index');
    }

    public function storeAccessori(Request $request)
    {
        $validatedData = $request->validateWithBag('acquisto', [
            'CF_cliente' => 'required|string',
            'codice_officina' => 'required|numeric',
            'costo_totale' => 'required|numeric',
            'metodo_pagamento' => 'required|string',
            'accessori' => 'required|array',
            'accessori.*' => 'required|numeric'
        ]);


        try {
            $acquisto = AcquistoInStore::create([
                'CF_cliente' => $validatedData['CF_cliente'],
                'codice_officina' => $validatedData['codice_officina'],
                'costo_totale' => $validatedData['costo_totale'],
                'metodo_pagamento' => $validatedData['metodo_pagamento']
            ]);

            $cont = 0;
            foreach ($validatedData['accessori'] as $accessorioCodice=>$accessorioQuantita) {
                if($accessorioQuantita > 0) {
                    $acquisto->accessori()->attach($accessorioCodice, ['quantita' => $accessorioQuantita]);
                    $cont++;
                }
            }

            if($cont == 0) {
                $acquisto->delete();
                throw new \ErrorException('Devi selezionare almeno un accessorio');
            }

            Officina::find($validatedData['codice_officina'])->increment('bilancio', $validatedData['costo_totale']);
        } catch (\ErrorException $e) {
            return redirect()->route('acquisti_in_store.create')
                ->withErrors($e->getMessage())
                ->withInput();
        }

        return redirect()->route('acquisti_in_store.index')
            ->with('success', 'Acquisto creato con successo');

    }
}
