<?php

namespace App\Http\Controllers;

use App\Models\Accessorio;
use Illuminate\Http\Request;

class AccessoriController extends Controller
{
    //
    public function index()
    {
        $accessori = Accessorio::all();
        return view('accessori.index', compact('accessori'));
    }

    public function create()
    {
        return view('accessori.create');
    }

    public function store(Request $request)
    {
        $accessorio = Accessorio::create($request->all());
        return redirect()->route('accessori.index');
    }

    public function show(Accessorio $accessorio)
    {
        return view('accessori.show', compact('accessorio'));
    }


}
