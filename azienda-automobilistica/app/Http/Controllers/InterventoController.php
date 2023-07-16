<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Intervento;
use App\Models\Meccanico;
use App\Models\Officina;
use App\Models\PezzoDiRicambio;
use App\Models\Veicolo;
use Illuminate\Http\Request;

class InterventoController extends Controller
{
    public function index()
    {
        $interventi = Intervento::all();
        return view('interventi.index', compact('interventi'));
    }

    public function create()
    {
        $clienti = Cliente::all();
        $officine = Officina::all();
        $veicoli = Veicolo::all();
        $pezzi_di_ricambio = PezzoDiRicambio::all();
        $meccanici = Meccanico::all();
        return view('interventi.create', compact('clienti', 'officine', 'veicoli', 'pezzi_di_ricambio', 'meccanici'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validateWithBag('intervento', [
            'costo_totale' => 'required|numeric',
            'costo_ricambi' => 'required|numeric',
            'costo_ore_di_lavoro' => 'required|numeric',
            'metodo_pagamento' => 'required|string',
            'CF_cliente' => 'required|string',
            'codice_officina' => 'required|numeric',
            'numero_telaio' => 'required|numeric',
            'pezzi_di_ricambio' => 'required|array',
            'pezzi_di_ricambio.*' => 'required|numeric',
            'meccanici' => 'required|array',
            'meccanici.*' => 'required|numeric',
        ]);

        try{
            $intervento = Intervento::create([
                'costo_totale' => $validatedData['costo_totale'],
                'costo_ricambi' => $validatedData['costo_ricambi'],
                'costo_ore_di_lavoro' => $validatedData['costo_ore_di_lavoro'],
                'metodo_pagamento' => $validatedData['metodo_pagamento'],
                'CF_cliente' => $validatedData['CF_cliente'],
                'codice_officina' => $validatedData['codice_officina'],
                'numero_telaio' => $validatedData['numero_telaio'],
            ]);

            $cont = 0;
            foreach($validatedData['meccanici'] as $CF_meccanico=>$ore){
                if($ore > 0){
                    $intervento->meccanici()->attach($CF_meccanico, ['ore_svolte' => $ore]);
                    Meccanico::find($CF_meccanico)->increment('totale_ore_svolte', $ore);
                    $cont++;
                }
            }
            if ($cont == 0){
                $intervento->delete();
                return redirect()->route('interventi.create')->with('error', 'Devi inserire almeno un meccanico');
            }

            foreach($validatedData['pezzi_di_ricambio'] as $codice_pezzo=>$quantita){
                if($quantita > 0){
                    $intervento->pezzi_di_ricambio()->attach($codice_pezzo, ['quantita' => $quantita]);
                }
            }

            Officina::find($validatedData['codice_officina'])->increment('bilancio', $validatedData['costo_totale']);
        } catch(\Exception $e){
            return redirect()->route('interventi.create')
                ->withErrors($e->getMessage())
                ->withInput();
        }

        return redirect()->route('interventi.index')->with('success', 'Intervento creato con successo');

    }

    public function show(Intervento $intervento)
    {
        return view('interventi.show', compact('intervento'));
    }

    public function edit(Intervento $intervento)
    {
        $clienti = Cliente::all();
        $officine = Officina::all();
        $veicoli = Veicolo::all();
        $pezzi_di_ricambio = PezzoDiRicambio::all();
        $meccanici = Meccanico::all();
        return view('interventi.edit', compact('intervento', 'clienti', 'officine', 'veicoli', 'pezzi_di_ricambio', 'meccanici'));
    }
    public function update(Request $request, Intervento $intervento){
        $validatedData= $request->validateWithBag('intervento', [
            'costo_totale' => 'required|numeric',
            'costo_ricambi' => 'required|numeric',
            'costo_ore_di_lavoro' => 'required|numeric',
            'metodo_pagamento' => 'required|string',
            'data_fine' => 'sometimes|nullable|date',
            'CF_cliente' => 'required|string',
            'codice_officina' => 'required|numeric',
            'numero_telaio' => 'required|string',
            'pezzi_di_ricambio' => 'required|array',
            'pezzi_di_ricambio.*' => 'required|numeric',
            'meccanici' => 'required|array',
            'meccanici.*' => 'required|numeric',
        ]);

        try{
            $intervento->update($validatedData);

            $cont = 0;
            foreach($validatedData['meccanici'] as $CF_meccanico=>$ore){
                if($ore > 0){
                    $intervento->meccanici()->syncWithoutDetaching([$CF_meccanico => ['ore_svolte' => $ore]]);
                    Meccanico::find($CF_meccanico)->increment('totale_ore_svolte', $ore);
                    $cont++;
                }
            }
            if ($cont == 0){
                return redirect()->route('interventi.edit', $intervento)->with('error', 'Devi inserire almeno un meccanico');
            }

            foreach($validatedData['pezzi_di_ricambio'] as $codice_pezzo=>$quantita){
                if($quantita > 0){
                    $intervento->pezzi_di_ricambio()->syncWithoutDetaching([$codice_pezzo => ['quantita' => $quantita]]);
                }
            }

            Officina::find($validatedData['codice_officina'])->increment('bilancio', $validatedData['costo_totale']);
        } catch(\Exception $e){
            return redirect()->route('interventi.edit', $intervento)
                ->withErrors($e->getMessage())
                ->withInput();
        }
    }

    public function destroy(Intervento $intervento)
    {
        $intervento->delete();
        return redirect()->route('interventi.index');
    }






}
