<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContatoResultadoController extends Controller
{
    public function contato_resultado(){
        return view('contato_resultado');
    }
}
