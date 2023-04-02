<?php
  class conexao_classe{

    public $server;
    public $database;
    public $username;
    public $password;

    public function getServername(){
      return $this -> server;
    }    
  
    public function setServername($server){
      $this->server = $server;
    } 
    
    public function getDatabase(){
      return $this -> database;
    }    
  
    public function setDatabase($database){
      $this->database = $database;
    } 

    public function getUsername(){
      return $this -> username;
    }    
  
    public function setUsername($username){
      $this->username = $username;
    } 

    public function getPassword(){
      return $this -> password;
    }    
  
    public function setPassword($password){
      $this->password = $password;
    } 

  public function conexao(){
    $server = 'localhost';
    $database = 'progam_web2';
    $username = 'root';
    $password = '';

    //Criando conexão
    $conn = mysqli_connect($server,$username,$password,$database);

    //Check
    if(!$conn){
      die("Falha na coneção". mysqli_connect_error());
    }
  }
}
?>