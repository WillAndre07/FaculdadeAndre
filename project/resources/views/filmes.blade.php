@extends('app')

@section('title', 'Filmes Favoritos')

@section('content')
    <h1>Filmes</h1>
    <hr style="border-top: 1px dashed red;">
    <ul>
        @foreach ($filmes as $filme)
            <li>{{ $filme }}</li>
        @endforeach
    </ul>
@endsection