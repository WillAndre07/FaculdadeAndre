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
      
        echo '<table>';
          echo '<tr>';
            echo '<th>Id</th>';
            echo '<th>Nome</th>';
          echo '</tr>';
          
        foreach($queryregiao->fetchAll() as $itemregiao){
          echo '<tr>';
            echo '<td>'.$itemregiao[0].'</td>';
            echo '<td>'.$itemregiao[1].'</td>';
            echo '<td><form method="get"><input type="hidden" name="id" value="'.$itemregiao[0].'"><button type="submit" class="btn btn-danger">Excluir</button></form></td>';
            echo '<td><form method="get"><input type="hidden" name="id" value="'.$itemregiao[0].'"><button type="submit" class="btn btn-primary">Alterar</button></form></td>';
        }
        echo '</tr>';
        echo '</table>';
      }
    }

    public function excluirReg(){
      $conexao = new conexao_classe();
      $banco = $conexao->conexaoBanco();

      if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "DELETE FROM regiao where IDRegiao = $id";
        $queryexcluir = $banco->prepare($sql);
        $queryexcluir->execute();
      }
    }

    public function inserirReg(){
      $cadastrar = '<h4>Cadastrar</h4>
                   <form method="post">
                      <input type="text" name="id" placeholder="id" required><br>
                      <input type="text" name="nome" placeholder="Nome da Região" required><br>
                      <button type="submit" class="btn btn-primary">Enviar</button> 
                  </form>';
      echo $cadastrar;
    }

    public function cadastrarRegiao() {
      $conexao = new conexao_classe();
      $banco = $conexao->conexaoBanco();

      if(isset($_POST['id'])) {
          $id = $_POST['id'];
          $nome = $_POST['nome'];
          $sql = "INSERT INTO regiao (IDRegiao, DescricaoRegiao) VALUES (?, ?)";
          $queryinserir = $banco->prepare($sql);
          $queryinserir->execute([$id, $nome]);
  
          header("Location: index.php");
          exit;
      }
  } 
}
?>