<?php

  class menu_classe{
    
    public function listaMenu(){

      $conexao = new conexao_classe();
      $banco = $conexao->conexaoBanco();
      $sql = 'SELECT acao, nome FROM menu';
      $query = $banco->prepare($sql);
      $query->execute();  
      
      echo '<ol>';
      foreach($query->fetchAll() as $item){
        echo '<li><a href='.$item[0].'>'.$item[1].'</li>';
      }
      echo '</ol>';
    }

    public function listaComando(){

      $conexao = new conexao_classe();
      $banco = $conexao->conexaoBanco();

      $query_string = $_SERVER['QUERY_STRING'];

      if ($query_string == 'pagina=lista_regiao'){
        $sqlregiao = 'SELECT IDRegiao ,DescricaoRegiao FROM regiao';
        $queryregiao = $banco->prepare($sqlregiao);
        $queryregiao->execute();

        echo '<ol>';
        foreach($queryregiao->fetchAll() as $itemregiao){
          echo '<li>'.$itemregiao[1].'</li>';
          echo '<button class="btn btn-primary">Editar</button>';
          echo '<a class="btn btn-danger" href="excluir.php?id='.$itemregiao[0].'">Excluir</a>';
        }
        echo '</ol>';
      }
    }
  }

?>