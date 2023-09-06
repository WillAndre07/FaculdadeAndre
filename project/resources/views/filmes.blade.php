@extends('app')

@section('title', 'Filmes Favoritos')

@section('content')
    <h1>Filmes</h1>
    <div class="buttom-1" style="display: flex;"> 
        <a href="/filmes_create" class="btn btn-primary">Cadastrar</a>
    </div>
    <hr style="border-top: 1px dashed red;">

    <ul>
        <div>
            @foreach ($filmes as $filme)
                <li>{{ $filme->id }} - {{ $filme->titulo }}</li>
                <form action="{{ route('filmes.destroy', $filme->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit"  class="btn btn-danger">Excluir</button>
                </form>
            @endforeach
        </div>
    </ul>
@endsection