<?php

namespace App\Http\Controllers;

use App\Models\AcquistoInStore;
use App\Models\Accessorio;
use App\Models\Cliente;
use App\Models\Officina;
use Illuminate\Http\Request;

class AcquistoInStoreController extends Controller
{
    public function index()
    {
        $acquisti = AcquistoInStore::all();
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
        $request->validate([
            'costo_totale' => 'required|numeric',
            'metodo_pagamento' => 'required|string',
            'CF_cliente' => 'required|string',
            'codice_officina' => 'required|numeric'
        ]);

        AcquistoInStore::create($request->all());
        return redirect()->route('acquisti_in_store.index');
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

    public function addAccessory(AcquistoInStore $acquisto)
    {
        return view('acquisti_in_store.add_accessory', compact('acquisto'));
    }

    public function storeAccessory(Request $request, AcquistoInStore $acquisto)
    {
        $request->validate([
            'codice_accessorio' => 'required|numeric',
            'quantita' => 'required|numeric|min:1'
        ]);

        $acquisto->accessori()->attach($request->codice_accessorio);
        return redirect()->route('acquisti_in_store.show', $acquisto);
    }
}
