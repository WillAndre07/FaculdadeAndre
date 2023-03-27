<?php
  session_start();

  class form_classe {
   
    public function Cadastrar(){

      if (!isset($_SESSION['noticias'])) {
        $_SESSION['noticias'] = array();
      }

      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $titulo = $_POST['titulo']; 
        $corpo = $_POST['corpo'];
        $data = $_POST['data'];
    
        $nova_noticia = array(
            'titulo' => $titulo,
            'corpo' => $corpo,
            'data' => $data
        );
    
        array_push($_SESSION['noticias'], $nova_noticia);
      }
      $cadastrar = "<h1>Cadastrar Noticia</h1>
                    <form method='post' action=''>
                      <label for='titulo'>Título:</label><br>
                      <input type='text' id='titulo' name='titulo'><br>

                      <label for='corpo'>Corpo:</label><br>
                      <textarea id='corpo' name='corpo'></textarea><br>

                      <label for='data'>Data:</label><br>
                      <input type='date' id='data' name='data'>
                      <br>
                      <input type='submit' value='Enviar'>
                    </form>";
      echo $cadastrar;
      foreach ($_SESSION['noticias'] as $noticia){
        $aux = '<h2>'.$noticia['titulo'].'</h2>
                <p>'. $noticia['corpo'].'</p>
                <p><small>'. $noticia['data'].'</small></p>
                <hr>';
        echo $aux;
      }                
                  
    }
  }

?>