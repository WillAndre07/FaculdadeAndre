@extends('app')

@section('title', 'Filmes Favoritos')

@section('content')
    <h1>Filmes</h1>
    <div class="buttom-1" style="display: flex;"> 
        <a href="/filmes_create" class="btn btn-primary">Cadastrar</a>
    </div>
    <hr style="border-top: 1px dashed red;">

    <ul>
        @foreach ($filmes as $filme)
            <li>{{ $filme->titulo }}</li>
        @endforeach
    </ul>
@endsection