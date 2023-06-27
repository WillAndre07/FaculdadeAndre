<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\HomeController;
use \App\Http\Controllers\FilmesController;
use \App\Http\Controllers\ContatoController;
use \App\Http\Controllers\ContatoResultadoController;
use App\Http\Controllers\FilmeCreate;

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

Route::get('/', [HomeController::class, 'home']);

Route::get('/home', [HomeController::class, 'home']);

Route::get('/filmes_create', [FilmeCreate::class, 'create']);

Route::post('/filmes_create', [FilmeCreate::class, 'store'])->name('filmes.store');

Route::get('/filmes', [FilmesController::class, 'filmes']);

Route::get('/contato', [ContatoController::class, 'contato']);    

Route::post('/contato_resultado', [ContatoResultadoController::class, 'contato_resultado']);