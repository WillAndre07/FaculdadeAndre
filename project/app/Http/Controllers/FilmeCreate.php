<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\filmes;

class FilmeCreate extends Controller
{
    public function create(){
        return view('filmes_create');
    }

    public function store(Request $request)
    {
        // Validação dos dados enviados no formulário
        $validatedData = $request->validate([
            'Titulo' => 'required|string'
        ]);
    
        // Criação do novo filme no banco de dados
        filmes::create($validatedData);
    
        return redirect('/filmes');
    }

}
