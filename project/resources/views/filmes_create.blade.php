@extends('app')

@section('content')
    <h1>Criar Filme</h1>
    <hr style="border-top: 1px dashed red;">
    <form action= "/filmes_create" method="POST">
        @csrf

        <div class="form-group">
          <label>Título:</label>
          <input type="text" name="Titulo" id="Titulo" class="form-control">
        </div>
        <hr style="border-top: 1px dashed red;"> 
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
@endsection
