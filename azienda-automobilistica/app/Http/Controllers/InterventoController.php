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




}
