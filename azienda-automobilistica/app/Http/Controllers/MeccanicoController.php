<?php

namespace App\Http\Controllers;

use App\Models\Meccanico;
use Illuminate\Http\Request;

class MeccanicoController extends Controller
{
    public function index()
    {
        return view('meccanici.index')->with('meccanici', Meccanico::all());
    }

    public function create()
    {
        return view('meccanici.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validateWithBag('meccanici', [
            'CF' => ['required', 'unique:meccanici', 'max:16', 'min:16', 'alpha_num'],
            'nome' => ['required', 'max:255'],
            'cognome' => ['required', 'max:255'],
            'data_nascita' => ['required', 'date', 'before:today', 'after:1900-01-01' , 'date_format:Y-m-d'],
            'telefono' => ['required', 'numeric', 'digits_between:8,10'],
            'paga_oraria' => ['required', 'numeric', 'min:0',],
            'totale_ore_svolte' => ['required', 'numeric', 'min:0',],
            'bonus_recensione' => ['required', 'numeric', 'min:0',],
            'media_recensione' => ['required', 'numeric', 'min:0', 'max:5',],
        ]);

        try {
            Meccanico::create($validatedData);
        } catch (\Exception $e) {
            return redirect()->route('meccanici.index')->with('error', 'Errore durante la creazione del meccanico!')
                ->with('message', $e->getMessage());
        }
        return redirect()->route('meccanici.index')->with('success', 'Meccanico creato con successo!');
    }

    
}
