<?php

namespace App\Http\Controllers;

use App\Models\Accessorio;
use Illuminate\Http\Request;

class AccessorioController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $accessori = Accessorio::where('nome', 'like', '%' . $request->input('search') . '%')
                ->orWhere('prezzo', 'like', '%' . $request->input('search') . '%')
                ->get();
            return view('accessori.index', compact('accessori'));
        }else if ($request->sort_by == 'quantita_venduta') {
            $accessori = Accessorio::withCount(['acquisti as total_quantita' => function ($query) {
                $query->select(\DB::raw('coalesce(sum(quantita), 0)'));
            }])
            ->orderBy('total_quantita', $request->sort_order ?? 'asc')
            ->get();

            return view('accessori.index', compact('accessori'));
        }

        $sortColumn = $request->input('sort_by', 'codice_accessorio');
        $sortOrder = $request->input('sort_order', 'asc');

        $accessori = Accessorio::orderBy($sortColumn, $sortOrder)->get();

        return view('accessori.index', compact('accessori'));
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
