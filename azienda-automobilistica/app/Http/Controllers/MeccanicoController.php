<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MeccanicoController extends Controller
{
    public function index()
    {
        return view('meccanici.index');
    }
}
