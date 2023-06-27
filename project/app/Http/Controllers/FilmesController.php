<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\filmes;
use Illuminate\Support\Facades\DB;

class FilmesController extends Controller
{
    public function filmes(){
        $filmes = filmes::select('id', 'titulo')->get();
        return view('filmes', compact('filmes'));
    }
    
}
