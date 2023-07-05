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
}
