@extends('app')

@section('title', 'Filmes Favoritos')

@section('content')
    <h1>Lista de Filmes Favoritos</h1>
    <ul>
        @foreach ($filmes as $filme)
            <li>{{ $filme }}</li>
        @endforeach
    </ul>
@endsection