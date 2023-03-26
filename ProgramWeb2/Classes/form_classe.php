<?php
  session_start();

  class form_classe {

    private $titulo;
    private $resumo;
    private $imagem;
    private $data;

    public function getTitulo(){
      return $this -> titulo;
    }    
  
    public function getResumo(){
      return $this -> resumo;
    } 
    
    public function getImagem(){
      return $this -> imagem;
    }    
  
    public function getData(){
      return $this -> data;
    }    
    
    public function setTitulo($titulo){
      $this->titulo = $titulo;
    }

    public function setResumo($resumo){
      $this->resumo = $resumo;
    }
  
    public function setImagem($imagem){
      $this->imagem = $imagem;
    }    
    
    public function setData($data){
      $this -> data = $data;
    }   
    public function Cadastrar(){
      $cadastrar = "<form method='post' action='home_classe.php'>
                      <label>Titulo da Noticia:</label>
                      <input type='text' id='tit_not' name='Titulo'>
                      <br>
                      <label>Resumo:</label>
                      <input type='text' id='res_not' name='Resumo'>
                      <br>
                      <label>Imagem (URL):</label>
                      <input type='url' id='img_not' name='Imagem'>
                      <br>
                      <label>Data de Publicação:</label>
                      <input type='date' id='dat_not' name='Data'>
                      <br>
                      <button type='submit'>Entrar</button>
                    </form>";
      echo $cadastrar;
    }

  }

?>