<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FilmesController extends Controller
{
    public function filmes(){
        $filmes = ['Resident Evil', 'Naruto', 'One Piece','Tomb Raiderd'];
        return view('filmes', ['filmes' => $filmes]);
    }
}
