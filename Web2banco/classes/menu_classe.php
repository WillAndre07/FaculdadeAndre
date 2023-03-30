<?php
  include 'classes/conexao_classe';

  class menu_classe{

    public function listaMenu(){

      $conexao = new conexao_classe();
      $conexao->conexao();

      $sql = 'SELECT * from menu';
     // $result = mysqli_query($conn, $sql);


    }

  }

?>