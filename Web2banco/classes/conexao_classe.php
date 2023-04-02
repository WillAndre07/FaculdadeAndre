<?php

  class conexao_classe {
    private $host;
    private $user;
    private $senha;
    private $banco;
    private $conexao;

    public function __construct($host, $user, $senha, $banco) {
        $this->host = $host;
        $this->user = $user;
        $this->senha = $senha;
        $this->banco = $banco;
    }

    public function getHost() {
        return $this->host;
    }

    public function getUser() {
        return $this->user;
    }

    public function getSenha() {
        return $this->senha;
    }

    public function getBanco() {
        return $this->banco;
    }

    public function setHost($host) {
        $this->host = $host;
    }

    public function setUser($user) {
        $this->user = $user;
    }

    public function setSenha($senha) {
        $this->senha = $senha;
    }

    public function setBanco($banco) {
        $this->banco = $banco;
    }

    public function conectar() {
        $this->conexao = mysqli_connect($this->host, $this->user, $this->senha, $this->banco);

        if (!$this->conexao) {
            die('Erro de conexão: ' . mysqli_connect_error());
        }
    }

    public function desconectar() {
        mysqli_close($this->conexao);
    }

    public function getConexao() {
        return $this->conexao;
    }

}
?>