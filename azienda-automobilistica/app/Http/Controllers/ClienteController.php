<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index(Request $request)
{
    $sortColumn = $request->input('sort_by', 'CF');
    $sortOrder = $request->input('sort_order', 'asc');

    $clienti = Cliente::orderBy($sortColumn, $sortOrder)->get();

    return view('clienti.index', compact('clienti'));
}


    public function create()
    {
        return view('clienti.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validateWithBag('clienti', [
            'CF' => ['required', 'unique:clienti', 'max:16', 'min:16', 'alpha_num'],
            'nome' => ['required', 'max:255'],
            'cognome' => ['required', 'max:255'],
            'data_nascita' => ['required', 'date', 'before:today', 'after:1900-01-01' , 'date_format:Y-m-d'],
            'telefono' => ['required', 'numeric', 'digits_between:8,10'],
            'buono_acquisto' => ['required', 'numeric', 'min:0',],
        ]);

        try {
            Cliente::create($validatedData);
        } catch (\Exception $e) {
            return redirect()->route('clienti.index')->with('error', 'Errore durante la creazione del cliente!')
                ->with('message', $e->getMessage());
        }
        return redirect()->route('clienti.index')->with('success', 'Cliente creato con successo!');
    }

    public function show(Cliente $cliente)
    {
        return view('clienti.show')->with('cliente', $cliente);
    }

    public function edit(Cliente $cliente)
    {
        return view('clienti.edit')->with('cliente', $cliente);
    }

    public function update(Request $request, Cliente $cliente)
    {
        $cliente->update($request->all());
        return redirect()->route('clienti.index');
    }

    public function destroy(Cliente $cliente)
    {
        $cliente->delete();
        return redirect()->route('clienti.index');
    }


 //try to create a new Cliente else redirect to the index page with an error message
        // try {
        //     Cliente::create($request->all());
        // } catch (\Exception $e) {
        //     return redirect()->route('clienti.index')->with('error', 'Errore durante la creazione del cliente!')
        //         ->with('message', $e->getMessage());
        // }
        // return redirect()->route('clienti.index')->with('success', 'Cliente creato con successo!');



}
