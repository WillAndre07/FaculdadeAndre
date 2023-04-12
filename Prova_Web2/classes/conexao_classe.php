<?php
  class conexao_classe {
    private $host = 'mysql:host=localhost;dbname=avaliacao_web2';
    private $usuario = 'root';
    private $senha = '';
    public $conexao;

    public function conexaoBanco() {
      return new PDO($this->host, $this->usuario, $this->senha);
    }
  }

?>
