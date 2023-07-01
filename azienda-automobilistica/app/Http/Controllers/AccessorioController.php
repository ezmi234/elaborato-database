<?php

namespace App\Http\Controllers;

use App\Models\Accessorio;
use Illuminate\Http\Request;

class AccessorioController extends Controller
{
    public function index()
    {
        return view('accessori.index')->with('accessori', Accessorio::all());
    }

    public function create()
    {
        return view('accessori.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validateWithBag('accessori', [
            'nome' => ['required', 'max:255'],
            'prezzo' => ['required', 'numeric', 'min:0']
        ]);

        try {
            Accessorio::create($validatedData);
        } catch (\Exception $e) {
            return redirect()->route('accessori.index')->with('error', 'Errore durante la creazione dell\'accessorio!')
                ->with('message', $e->getMessage());
        }
        return redirect()->route('accessori.index')->with('success', 'Accessorio creato con successo!');
    }

    public function show(Accessorio $accessorio)
    {
        return view('accessori.show')->with('accessorio', $accessorio);
    }

    public function edit(Accessorio $accessorio)
    {
        return view('accessori.edit')->with('accessorio', $accessorio);
    }

    public function update(Request $request, Accessorio $accessorio)
    {
        $validatedData = $request->validateWithBag('accessori', [
            'nome' => ['required', 'max:255'],
            'prezzo' => ['required', 'numeric', 'min:0']
        ]);

        try {
            $accessorio->update($validatedData);
        } catch (\Exception $e) {
            return redirect()->route('accessori.index')->with('error', 'Errore durante la modifica dell\'accessorio!')
                ->with('message', $e->getMessage());
        }
        return redirect()->route('accessori.index')->with('success', 'Accessorio modificato con successo!');
    }

    public function destroy(Accessorio $accessorio)
    {
        try {
            $accessorio->delete();
        } catch (\Exception $e) {
            return redirect()->route('accessori.index')->with('error', 'Errore durante l\'eliminazione dell\'accessorio!')
                ->with('message', $e->getMessage());
        }
        return redirect()->route('accessori.index')->with('success', 'Accessorio eliminato con successo!');
    }
}
