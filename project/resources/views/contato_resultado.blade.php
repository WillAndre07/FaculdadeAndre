@extends('app')

@section('title', 'Contato - Resultado')

@php
  $nome = $_POST['nome'];
  $email = $_POST['email'];
  $mensagem = $_POST['mensagem'];
@endphp

@section('content')
    <h1>Contato</h1>
    <p>Dados enviados com Sucesso!</p>
    <ul>
        <li>Nome: {{ $nome }}</li>
        <li>E-mail:  {{ $email }}</li>
        <li>Mensagem: {{ $mensagem }}</li>
    </ul>
@endsection