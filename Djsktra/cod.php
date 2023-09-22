<?php
class Conta{

  private $saldo;

  public function __construct($saldoInicial){
    $this->saldo = $saldoInicial;
  }
  
  public function depositar($valor){
    try{
      if ($valor < 0){
        throw new Exception("Erro: O valor do depósito deve ser positivo.<br>");
      }
      $this->saldo = $this->saldo + $valor;
      echo "Deposito de {$valor} realizado com sucesso. <br>";

    } catch(Exception $e){
      echo $e->getMessage();
    }
  }

  public function sacar($valor){
    try{
      if ($valor < 0){
        throw new Exception("Erro: O valor do saque deve ser positivo.<br>");
      } elseif ($valor > $this->saldo){
        throw new Exception("Erro: Saldo insuficiente para sacar {$valor}. <br>");
      } else {
        $this->saldo = $this->saldo - $valor;
        echo "Saque de {$valor} realizado com sucesso. <br>";
      }
    } catch(Exception $e){
      echo $e->getMessage(); 
    }
  }
}

$conta = new Conta(1000);
$conta->depositar(200);
$conta->sacar(500);
$conta->sacar(800);
?>