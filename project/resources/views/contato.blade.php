@extends('app')

@section('title', 'Contato')

@section('content')
    <h1>Entre em contato</h1>
    <hr style="border-top: 1px dashed red;">
    <form action="/contato_resultado" method="POST">
        @csrf
        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="nome" class="form-control">
        </div>
        <div class="form-group">
            <label for="email">E-mail</label>
            <input type="email" name="email" id="email" class="form-control">
        </div>
        <div class="form-group">
            <label for="mensagem">Mensagem</label>
            <textarea name="mensagem" id="mensagem" cols="30" rows="10" class="form-control"></textarea>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
@endsection

