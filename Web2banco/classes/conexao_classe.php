<?php
  class conexao_classe {
    private $host = 'localhost';
    private $usuario = 'root';
    private $senha = '';
    private $banco = 'ati_web2';
    public $conexao;

    public function __construct() {
        $this->conexao = new mysqli($this->host, $this->usuario, $this->senha, $this->banco);

        if ($this->conexao->connect_error) {
            die("Conexão falhou: " . $this->conexao->connect_error);
        }
    }
  }

?>
