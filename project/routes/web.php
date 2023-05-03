<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/home','/app/Http/Controllers/HomeController@home');

Route::get('/filmes','/app/Http/Controllers/FilmesController@filmes'); 

Route::get('/contato', '/app/Http/Controllers/ContatoController@contato');
    
Route::post('/contato', '/app/Http/Controllers/ContatoResultadoController@contato_resultado');