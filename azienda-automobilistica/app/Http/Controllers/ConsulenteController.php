<?php
namespace App\Http\Controllers;

use App\Models\Consulente;
use Illuminate\Http\Request;



class ConsulenteController extends Controller
{
    public function index(Request $request)
    {
        $sortColumn = $request->input('sort_by', 'CF');
        $sortOrder = $request->input('sort_order', 'asc');

        $consulenti = Consulente::orderBy($sortColumn, $sortOrder)->get();

        return view('consulenti.index', compact('consulenti'));
    }

    public function create()
    {
        return view('consulenti.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validateWithBag('consulenti', [
            'CF' => ['required', 'max:16'],
            'nome' => ['required', 'max:255'],
            'cognome' => ['required', 'max:255'],
            'data_nascita' => ['required', 'date'],
            'telefono' => ['required', 'numeric', 'digits_between:8,10'],
            'percentuale_provvigione' => ['required', 'numeric', 'min:0.00', 'max:1.00'],
            'totale_provvigione' => ['required', 'numeric', 'min:0.00', 'max:9999999999.99'],
        ]);

        try {
            Consulente::create($validatedData);
        } catch (\Exception $e) {
            return redirect()->route('consulenti.index')->with('error', 'Errore durante la creazione del consulente!')
                ->with('message', $e->getMessage());
        }
        return redirect()->route('consulenti.index')->with('success', 'Consulente creato con successo!');
    }

    public function show(Consulente $consulente)
    {
        return view('consulenti.show')->with('consulente', $consulente);
    }

    public function edit(Consulente $consulente)
    {
        return view('consulenti.edit')->with('consulente', $consulente);
    }

    public function update(Request $request, Consulente $consulente)
    {
        $validatedData = $request->validateWithBag('consulenti', [
            'CF',
            'nome' => ['required', 'max:255'],
            'cognome' => ['required', 'max:255'],
            'data_nascita' => ['required', 'date'],
            'telefono' => ['required', 'max:255'],
            'percentuale_provvigione' => ['required', 'numeric', 'min:0', 'max:100'],
        ]);

        try {
            $consulente->update($validatedData);
        } catch (\Exception $e) {
            return redirect()->route('consulenti.index')->with('error', 'Errore durante la modifica del consulente!')
                ->with('message', $e->getMessage());
        }
        return redirect()->route('consulenti.index')->with('success', 'Consulente modificato con successo!');
    }

    public function destroy(Consulente $consulente)
    {
        try {
            $consulente->delete();
        } catch (\Exception $e) {
            return redirect()->route('consulenti.index')->with('error', 'Errore durante l\'eliminazione del consulente!')
                ->with('message', $e->getMessage());
        }
        return redirect()->route('consulenti.index')->with('success', 'Consulente eliminato con successo!');
    }

}
