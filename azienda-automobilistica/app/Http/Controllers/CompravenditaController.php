<?php

namespace App\Http\Controllers;

use App\Models\Compravendita;
use App\Models\Cliente;
use App\Models\Consulente;
use App\Models\Officina;
use App\Models\Veicolo;
use Illuminate\Http\Request;

class CompravenditaController extends Controller{

    public function index(Request $request)
    {
        $sortColumn = $request->input('sort_by', 'codice_compra_vendita');
        $sortOrder = $request->input('sort_order', 'asc');

        $compravendite = Compravendita::orderBy($sortColumn, $sortOrder)->get();
        return view('compravendite.index', compact('compravendite'));
    }

    public function create()
    {
        $clienti = Cliente::all();
        $officine = Officina::all();
        $consulenti = Consulente::all();
        $veicoli = Veicolo::all();
        return view('compravendite.create', compact('clienti', 'officine', 'consulenti', 'veicoli'));
    }

    public function store(Request $request)
    {
        $this->storeAccessory($request);
    }

    public function show(Compravendita $compravendita)
    {
        return view('compravendite.show', compact('compravendita'));
    }

    public function edit(Compravendita $compravendita)
    {
        return view('compravendite.edit', compact('compravendita'));
    }

    public function update(Request $request, Compravendita $compravendita)
    {
        $request->validate([
            'tipo_vendita' => 'required|string',
            'costo_totale' => 'required|numeric',
            'metodo_pagamento' => 'required|string',
            'CF_cliente' => 'required|string',
            'codice_officina' => 'required|numeric',
            'CF_consulente' => 'required|string',
            'numero_telaio' => 'required|string'
        ]);

        $compravendita->update($request->all());
        return redirect()->route('compravendite.index');
    }

    public function destroy(Compravendita $compravendita)
    {
        $compravendita->delete();
        return redirect()->route('compravendite.index');
    }

    private function storeAccessory(Request $request)
    {
        $validateData= $request->validateWithBag('compravendita',[
            'tipo_vendita' => 'required|string',
            'costo_totale' => 'required|numeric',
            'metodo_pagamento' => 'required|string',
            'CF_cliente' => 'required|string',
            'codice_officina' => 'required|numeric',
            'CF_consulente' => 'required|string',
            'numero_telaio' => 'required|string'
        ]);

        try{
            $compravendita = Compravendita::create([
                'tipo_vendita' => $validateData['tipo_vendita'],
                'costo_totale' => $validateData['costo_totale'],
                'metodo_pagamento' => $validateData['metodo_pagamento'],
                'CF_cliente' => $validateData['CF_cliente'],
                'codice_officina' => $validateData['codice_officina'],
                'CF_consulente' => $validateData['CF_consulente'],
                'numero_telaio' => $validateData['numero_telaio']
            ]);
            Officina::find($validateData['codice_officina'])->increment('bilancio', $validateData['costo_totale']);
        } catch (\ErrorException $e) {
            return redirect()->route('acquisti_in_store.create')
            ->with('error', $e->getMessage());
        }

        return redirect()->route('compravendite.index')
            ->with('success', 'Compravendita creata con successo');


    }

}
