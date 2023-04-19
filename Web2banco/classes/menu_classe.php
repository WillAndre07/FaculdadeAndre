<?php
  include 'Classes/conexao_classe.php';

  class menu_classe{
    
    public function listaMenu(){

      $conexao = new conexao_classe();
      $banco = $conexao->conexaoBanco();
      $sql = 'SELECT acao, texto, id FROM menu';
      $query = $banco->prepare($sql);
      $query->execute(); 
      
      echo '<table>';
          echo '<tr style="background-color: #04AA6D; text-align: left; color: white; font-family: Arial, Helvetica, sans-serif; border: 6px;">';
            echo '<th>Id</th>';
            echo '<th style="width: 100%; ">Nome</th>';
          echo '</tr>';

      foreach($query->fetchAll() as $item){
        echo '<tr>';
         echo '<td>'.$item[2].'</td>';
         echo '<td><a href='.$item[0].'>'.$item[1].'</td>';
      }
        echo '</tr>';
      echo '</table>';
    }

    public function listaComando(){

      $conexao = new conexao_classe();
      $banco = $conexao->conexaoBanco();

      $query_string = $_SERVER['QUERY_STRING'];

      if ($query_string == 'pagina=lista_pessoa'){
        $sqlpessoa = 'SELECT id, nome, email FROM pessoa';
        $querypessoa = $banco->prepare($sqlpessoa);
        $querypessoa->execute();

        echo '<table>';
          echo '<tr style="background-color: lightgray; text-align: left; color: white; font-family: Arial, Helvetica, sans-serif; border: 6px;">';
            echo '<th>Id</th>';
            echo '<th>Nome</th>';
            echo '<th>Email</th>';
          echo '</tr>';
        foreach($querypessoa->fetchAll() as $itempessoa){
          echo '<tr>';
           echo '<td>'.$itempessoa[0].'</td>';
           echo '<td>'.$itempessoa[1].'</td>';
           echo '<td>'.$itempessoa[2].'</td>';
           echo '<td><form method="get"><input type="hidden" name="id" value="'.$itempessoa[0].'"><button type="submit" class="btn btn-danger">Excluir</button></form></td>';
           echo '<td><form method="get"><input type="hidden" name="id" value="'.$itempessoa[0].'"><button type="submit" class="btn btn-primary">Alterar</button></form></td>';
        }
        echo '</tr>';
        echo '</table>';
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