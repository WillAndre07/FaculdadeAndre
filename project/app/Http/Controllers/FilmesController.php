<?php

namespace App\Http\Controllers;

use App\Models\filmes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FilmesController extends Controller
{
    public function filmes(){
        $filmes = filmes::select('id', 'titulo')->get();
        return view('filmes', compact('filmes'));
    }

    public function destroy($id){

        $filme = filmes::find($id);
        $filme->delete();

        // Redirecionar ou retornar uma resposta
        return redirect('/filmes');
    }
}
