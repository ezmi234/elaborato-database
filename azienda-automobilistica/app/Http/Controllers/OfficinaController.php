<?php

namespace App\Http\Controllers;

use App\Models\Officina;
use App\Models\Stipendio;
use Illuminate\Http\Request;

class OfficinaController extends Controller
{
    public function index(Request $request)
    {
        $sortColumn = $request->input('sort_by', 'codice_officina');
        $sortOrder = $request->input('sort_order', 'asc');

        $officine = Officina::orderBy($sortColumn, $sortOrder)->get();

        return view('officine.index', compact('officine'));
    }

    public function create()
    {
        return view('officine.create')->with('officine', Officina::all());
    }

    public function store(Request $request)
    {
        $validatedData = $request->validateWithBag('officine', [
            'codice_officina',
            'nome' => ['required', 'max:255'],
            'sede_città' => ['required', 'max:255'],
            'sede_via' => ['required', 'max:255'],
            'sede_civico' => ['required', 'numeric', 'digits_between:1,5'],
            'bilancio' => ['required', 'numeric', 'min:0',],
            'centrale' => ['required', 'boolean'],
            'gestita_da' => ['sometimes'],
        ]);
        try {
            if ($validatedData['centrale'] == 1) {
                if (Officina::where('centrale', 1)->exists()) {
                    return redirect()->route('officine.index')->with('error', 'Esiste già un\'officina centrale!');
                }

                $validatedData['gestita_da'] = null;
            }
            Officina::create($validatedData);
        } catch (\Exception $e) {
            return redirect()->route('officine.index')->with('error', 'Errore durante la creazione dell\'officina!')
                ->with('message', $e->getMessage());
        }
        return redirect()->route('officine.index')->with('success', 'Officina creata con successo!');
    }

    public function show(Officina $officina)
    {
        return view('officine.show')->with('officina', $officina)->with('bilancioTotale', null);
    }

    public function showWithBilancioTotale(){
        $officinaCentrale = Officina::where('centrale', 1)->first();
        $bilancioTotale = Officina::sum('bilancio');
        return view('officine.show')->with('officina', $officinaCentrale)->with('bilancioTotale', $bilancioTotale);
    }

    public function edit(Officina $officina)
    {
        return view('officine.edit')->with('officina', $officina);
    }

    public function update(Request $request, Officina $officina)
    {
        $request->validate([
            'codice_officina' => 'required',
            'nome' => 'required',
            'sede_città' => 'required',
            'sede_via' => 'required',
            'sede_civico' => 'required',
            'bilancio' => 'required',
            'centrale' => 'required',
            'gestita_da' => 'required',
        ]);

        $officina->update($request->all());

        return redirect()->route('officine.index')->with('success', 'Officina aggiornata con successo');
    }

    public function destroy(Officina $officina)
    {
        $officina->delete();

        return redirect()->route('officine.index')->with('success', 'Officina eliminata con successo');
    }

    public function calcolaStipendiMeccanici(Officina $officina)
    {
        $meccanici = $officina->meccanici;
        foreach ($meccanici as $meccanico) {
            if(($meccanico->paga_oraria * $meccanico->totale_ore_svolte + $meccanico->media_recensioni * 100)>0){
                $stipendio = Stipendio::create([
                    'importo' => $meccanico->paga_oraria * $meccanico->totale_ore_svolte + $meccanico->media_recensioni * 100,
                    'CF_meccanico' => $meccanico->CF,
                    'CF_consulente' => null
                ]);

                $meccanico->update([
                    'totale_ore_svolte' => 0,
                    'totale_recensioni' => 0,
                    'numero_recensioni' => 0,
                    'media_recensioni' => 0,
                ]);

                $officina->update([
                    'bilancio' => $officina->bilancio - $stipendio->importo
                ]);
            }

        }
    }

    public function calcolaStipendiConsulenti(Officina $officina)
    {
        $consulenti = $officina->consulenti;
        foreach ($consulenti as $consulente) {
            if (($consulente->totale_provvigione + $consulente->media_recensioni * 100) > 0){
                $stipendio = Stipendio::create([
                    'importo' => $consulente->totale_provvigione + $consulente->media_recensioni * 100,
                    'CF_meccanico' => null,
                    'CF_consulente' => $consulente->CF
                ]);

                $consulente->update([
                    'totale_provvigione' => 0,
                    'totale_recensioni' => 0,
                    'numero_recensioni' => 0,
                    'media_recensioni' => 0,
                ]);

                $officina->update([
                    'bilancio' => $officina->bilancio - $stipendio->importo
                ]);
            }
        }
    }

    public function storeStipendi(Officina $officina)
    {
        $this->calcolaStipendiMeccanici($officina);
        $this->calcolaStipendiConsulenti($officina);
        return redirect()->route('officine.show', $officina)->with('success', 'Stipendi calcolati con successo');
    }

}
