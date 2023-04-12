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
        $sqlpessoa = 'SELECT nome FROM regiao';
        $queryregiao = $banco->prepare($sqlpessoa);
        $queryregiao->execute();

        echo '<ol>';
        foreach($queryregiao->fetchAll() as $itemregiao){
          echo '<li>'.$itemregiao[0].'</li>';
        }
        echo '</ol>';
      } else if ($query_string == 'pagina=lista_produto'){
          $sqlproduto= 'SELECT id, nome, valor, total_estoque FROM produto';
          $queryproduto = $banco->prepare($sqlproduto);
          $queryproduto->execute();

          echo '<ol>';
          foreach($queryproduto->fetchAll() as $itemproduto){
            echo '<li>'.$itemproduto[1].' '.$itemproduto[2].' '.$itemproduto[3].'</li>';
          }
          echo '</ol>';
      } else if ($query_string == 'pagina=lista_usuario'){
          $sqlusuario= 'SELECT id, nome, email, senha FROM usuario';
          $queryusuario = $banco->prepare($sqlusuario);
          $queryusuario->execute();

          echo '<ol>';
          foreach($queryusuario->fetchAll() as $itemusuario){
            echo '<li>'.$itemusuario[1].' '.$itemusuario[2].' '.$itemusuario[3].'</li>';
          }
          echo '</ol>';
      }
    }
  }

?>