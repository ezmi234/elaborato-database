<?php

namespace App\Http\Controllers;

use App\Models\Veicolo;
use Illuminate\Http\Request;

class VeicoloController extends Controller
{
    public function index(Request $request)
    {
        $sortColumn = $request->input('sort_by', 'numero_telaio');
        $sortOrder = $request->input('sort_order', 'asc');

        $veicoli = Veicolo::orderBy($sortColumn, $sortOrder)->get();

        return view('veicoli.index')->with('veicoli', $veicoli);
    }

    public function create()
    {
        return view('veicoli.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validateWithBag('veicoli', [
            'numero_telaio' => ['required', 'unique:veicoli', 'numeric', 'digits:16', 'min:1000000000000000', 'max:9999999999999999'],
            'marca' => ['required', 'max:255'],
            'modello' => ['required', 'max:255'],
            'targa' => ['required', 'max:7', 'min:7', 'alpha_num'],
            'anno_immatricolazione' => ['required', 'numeric', 'digits:4', 'min:1900', 'max:2023'],
            'colore' => ['required', 'max:255'],
        ]);

        try {
            Veicolo::create($validatedData);
        } catch (\Exception $e) {
            return redirect()->route('veicoli.index')->with('error', 'Errore durante la creazione del veicolo!')
                ->with('message', $e->getMessage());
        }
        return redirect()->route('veicoli.index')->with('success', 'Veicolo creato con successo!');
    }


    public function show(Veicolo $veicolo)
    {
        return view('veicoli.show')->with('veicolo', $veicolo);
    }

    public function edit(Veicolo $veicolo)
    {
        return view('veicoli.edit')->with('veicolo', $veicolo);
    }

    public function update(Request $request, Veicolo $veicolo)
    {
        $validatedData = $request->validateWithBag('veicoli', [
            'numero_telaio' => ['required', 'numeric', 'digits:16', 'min:1000000000000000', 'max:9999999999999999'],
            'marca' => ['required', 'max:255'],
            'modello' => ['required', 'max:255'],
            'targa' => ['required', 'max:7', 'min:7', 'alpha_num'],
            'anno_immatricolazione' => ['required', 'numeric', 'digits:4', 'min:1900', 'max:2023'],
            'colore' => ['required', 'max:255'],
        ]);

        try {
            $veicolo->update($validatedData);
        } catch (\Exception $e) {
            return redirect()->route('veicoli.index')->with('error', 'Errore durante la modifica del veicolo!')
                ->with('message', $e->getMessage());
        }
        return redirect()->route('veicoli.index')->with('success', 'Veicolo modificato con successo!');
    }

    public function destroy(Veicolo $veicolo)
    {
        try {
            $veicolo->delete();
        } catch (\Exception $e) {
            return redirect()->route('veicoli.index')->with('error', 'Errore durante l\'eliminazione del veicolo!')
                ->with('message', $e->getMessage());
        }
        return redirect()->route('veicoli.index')->with('success', 'Veicolo eliminato con successo!');
    }



}
