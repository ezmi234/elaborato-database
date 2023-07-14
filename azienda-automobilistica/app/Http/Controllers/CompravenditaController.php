<?php

namespace App\Http\Controllers;

use App\Models\Compravendita;
use App\Models\Cliente;
use App\Models\Consulente;
use App\Models\Officina;
use App\Models\Veicolo;
use Illuminate\Http\Request;

class CompraVenditaController extends Controller{

    public function index(){
        $compra_vendite = Compravendita::all();
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
        $request->validate([
            'tipo_vendita' => 'required',
            'costo_totale' => 'required',
            'metodo_pagamento' => 'required',
            'CF_cliente' => 'required',
            'codice_officina' => 'required',
            'CF_consulente' => 'required',
            'numero_telaio' => 'required',
        ]);
        Compravendita::create($request->all());
        return redirect()->route('compra_vendite.index')->with('success', 'Compra vendita creata con successo.');
    }
}
