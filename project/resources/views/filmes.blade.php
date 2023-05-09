@extends('app')

@section('title', 'Filmes Favoritos')

@section('content')
    <h1>Filmes</h1>
    <hr>
    <ul>
        @foreach ($filmes as $filme)
            <li>{{ $filme }}</li>
        @endforeach
    </ul>
@endsection