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
        $validatedData = $request->all();
    
        // Criação do novo filme no banco de dados
        filmes::create($validatedData);
    
        return redirect('/filmes')->with('success', 'Filme criado com sucesso!');
    }
}
