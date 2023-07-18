<?php

namespace App\Http\Controllers;

use App\Models\Compravendita;
use App\Models\Cliente;
use App\Models\Consulente;
use App\Models\Officina;
use App\Models\Veicolo;
use Illuminate\Http\Request;

class CompraVenditaController extends Controller{

    public function index(Request $request){

        $sortColumn = $request->input('sort_by', 'codice_compra_vendita');
        $sortOrder = $request->input('sort_order', 'asc');

        $compra_vendite = Compravendita::orderBy($sortColumn, $sortOrder)->get();

        return view('compra_vendite.index', compact('compra_vendite'));
    }

    public function create(){
        $officine = Officina::all();
        $clienti = Cliente::all();
        $consulenti = Consulente::all();
        $veicoli = Veicolo::all();
        return view('compra_vendite.create', compact('officine', 'clienti', 'consulenti', 'veicoli'));
    }

    public function store(Request $request){
        $validatedData = $request->validateWithBag('compra_vendite', [
            'tipo_vendita' => ['required', 'boolean'],
            'costo_totale' => ['required', 'numeric'],
            'metodo_pagamento' => ['required', 'string'],
            'CF_cliente' => ['required', 'string'],
            'codice_officina' => ['required', 'numeric'],
            'CF_consulente' => ['required', 'string'],
            'numero_telaio' => ['required', 'numeric'],
        ]);

        try {
            $compra_vendita = Compravendita::create($validatedData);
            if($validatedData['tipo_vendita'] == 0)
                Officina::find($validatedData['codice_officina'])->decrement('bilancio', $validatedData['costo_totale']);
            else if($validatedData['tipo_vendita'] == 1)
                Officina::find($validatedData['codice_officina'])->increment('bilancio', $validatedData['costo_totale']);
            $consulente=Consulente::find($validatedData['CF_consulente']);
            $consulente->increment('totale_provvigione', $validatedData['costo_totale']*$consulente->percentuale_provvigione);
        } catch (\Throwable $th) {
            return redirect()->route('compra_vendite.create')->with('error', 'Errore durante la creazione della compra_vendita');
        }

        return redirect()->route('compra_vendite.index')->with('success', 'Compra_vendita creata correttamente');
    }


    public function show(Compravendita $compra_vendita){
       // dd($compra_vendita);
        return view('compra_vendite.show', compact('compra_vendita'));

    }


    public function update(Request $request, Compravendita $compra_vendita){
        $validatedData = $request->validateWithBag('compra_vendite', [
            'tipo_vendita' => ['required', 'boolean'],
            'costo_totale' => ['required', 'numeric'],
            'metodo_pagamento' => ['required', 'string'],
            'CF_cliente' => ['required', 'string'],
            'codice_officina' => ['required', 'numeric'],
            'CF_consulente' => ['required', 'string'],
            'numero_telaio' => ['required', 'numeric'],
        ]);

        try {
            $compra_vendita->update($validatedData);
            if($validatedData['tipo_vendita'] == 0)
                Officina::find($validatedData['codice_officina'])->decrement('bilancio', $validatedData['costo_totale']);
            else if($validatedData['tipo_vendita'] == 1)
                Officina::find($validatedData['codice_officina'])->increment('bilancio', $validatedData['costo_totale']);
            $consulente=Consulente::find($validatedData['CF_consulente']);
            $consulente->increment('totale_provvigione', $validatedData['costo_totale']*$consulente->percentuale_provvigione);

        } catch (\Throwable $th) {
            return redirect()->route('compra_vendite.edit', $compra_vendita)->with('error', 'Errore durante la modifica della compra_vendita');
        }

        return redirect()->route('compra_vendite.index')->with('success', 'Compra_vendita modificata correttamente');
    }

        public function destroy(Compravendita $compra_vendita){
            //dd($compra_vendita);

        try {
            $compra_vendita->delete();
        } catch (\Throwable $th) {
            return redirect()->route('compra_vendite.index')->with('error', 'Errore durante l\'eliminazione della compra_vendita');
        }

        return redirect()->route('compra_vendite.index')->with('success', 'Compra_vendita eliminata correttamente');
    }



}
