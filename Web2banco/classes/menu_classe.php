<?php
  include 'Classes/conexao_classe.php';

  class menu_classe{
    
    public function listaMenu(){
      $host = 'localhost';
      $user = 'root';
      $senha = '';
      $banco = 'ati_web2';
  
      $conexao = new conexao_classe($host, $user, $senha, $banco);
      $conexao->conectar();

      $result = mysqli_query($conexao, "SELECT * FROM menu");
      echo $result;
    }

  }

?>