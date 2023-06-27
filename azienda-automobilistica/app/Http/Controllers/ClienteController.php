<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index()
    {
        return view('clienti.index')->with('clienti', Cliente::all());
    }

    public function create()
    {
        return view('clienti.create');
    }

    public function store(Request $request)
    {
        Cliente::create($request->all());
        return redirect()->route('clienti.index')->with('message', 'Cliente creato con successo!');
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






}
