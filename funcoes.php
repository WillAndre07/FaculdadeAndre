<?php

$sHtml = '
<header class="header-1">
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="#">Soeltech</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item active">
         <a class="nav-link" href="#">Entrar <span class="sr-only"></span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Cadastro</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Faculdade</a>
        </li>
      </ul>
  </div>
  </nav>  
</header>
<main>
  <div class="caixa">
    <div class="centraliza">
      <form>
        <div class="form-group">
          <label for="exampleInputEmail1">Endereço de E-mail</label>
          <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Digite seu e-mail">
          <small id="emailHelp" class="form-text text-muted">Em caso de esquecimento, infelizmente tambem não sabemos o que fazer.</small>
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Senha</label>
          <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Digite sua senhas">
        </div>
        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="exampleCheck1">
          <label class="form-check-label" for="exampleCheck1">Lembrar de mim. Marcar isso ai Jovem.</label>
        </div>
        <button type="submit" class="btn btn-dark">Entrar</button>
      </form>
    </div>
  </div>
</main>
';



