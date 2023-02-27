<?php

class Lista {

  private $seq;
  private $nome;
  private $valor;

  public function getSeq(){
    return $this -> seq;
  }    

  public function getNome(){
    return $this -> nome;
  }    

  public function getValor(){
    return $this -> valor;
  }
  
  public function setSeq($seq){
    $this->seq = $seq;
  }    
  
  public function setNome($nome){
    $this -> nome = $nome;
  }    
  
  public function setValor($valor){
    $this -> valor = $valor;
  }   
  
  public function mostraComando(){
    echo '<ol id=' . $this->getSeq() . ' name=' . $this->getNome() . '>';
    echo '<li>' . $this->getValor() . '</li>';
    echo '</ol>';
  }
}


?>