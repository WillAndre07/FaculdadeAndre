<?php
  include 'Classes/conexao_classe.php';

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
          echo '<li><a class="page-item active" href='.'?pagina='.$itemregiao[0].'>'.$itemregiao[1].'</li>';
          echo "<a href='alterar_classe.php?id=$itemregiao[0]' class='btn btn-primary'>Editar</a>'";
        }
        echo '</ol>';
      }
    }
  }

?>