<?php
  include 'Classes/conexao_classe.php';

  class menu_classe{
    
    public function listaMenu(){

      $conexao = new conexao_classe();
      $conexao->__construct();
      
      $sql = 'select acao, texto FROM menu';
     // $result = mysqli_query($conexao, $sql);

      /*echo '<ol>';
      foreach($result as $item){
        echo '<li><a href='$item['acao']'</a>'$item['texto']'</li>';
      }
      echo '</ol>';*/
    }

  }

?>