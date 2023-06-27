@extends('app')

@section('content')
    <h1>Criar Filme</h1>
    <hr style="border-top: 1px dashed red;">
    <form action= "/filmes_create" method="POST">
        @csrf

        <div class="form-group">
          <label for="titulo">Título:</label>
          <input type="text" name="titulo" id="titulo" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
@endsection
