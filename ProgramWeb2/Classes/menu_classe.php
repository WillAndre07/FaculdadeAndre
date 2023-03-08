<?php

class menu_classe {

  private $id;
  private $name;

  public function menuHtmlIni(){
    echo '<menu>';
  }

  public function menuHtmlFim(){
    echo '</menu>';
  }

  public function getId(){
    return $this -> id;
  }    

  public function getName(){
    return $this -> name;
  }    

  public function setId($id){
    $this->id = $id;
  }    
  
  public function setName($name){
    $this -> name = $name;
  }    
  
  public function mostraMenu($lista){
    $aux = $lista;
    echo '<ol>';  
    foreach($aux as $item){
      echo "<li><a href='#'>" . $item . "</a></li>";  
    }
    echo '</ol>';
  }   

}
?>