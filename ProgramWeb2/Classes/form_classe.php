<?php

  class form_classe {
   
    public function Cadastrar(){
      $cadastrar = "<h1>Cadastrar Noticia</h1>
                    <form method='post' action='home_classe.php'>
                      <label>Titulo da Noticia:</label>
                      <input type='text' id='tit_not' name='tit_not'>
                      <br>
                      <label>Resumo:</label>
                      <input type='text' id='res_not' name='res_not'>
                      <br>
                      <label>Imagem (URL):</label>
                      <input type='url' id='img_not' name='img_not'>
                      <br>
                      <label>Data de Publicação:</label>
                      <input type='date' id='dat_not' name='dat_not'>
                      <br>
                      <button type='submit'>Entrar</button>
                      <br>
                      <br>
                    </form>";
    echo $cadastrar;
    }

  }

?>