<?php
  include 'Classes/body_classe.php';
  include 'Classes/meta_classe.php';

  class home_classe {

    public function criaPagina(){
      echo '<html>';
      $classe = new meta_classe();
      $classe->metaHtml();
      $classeBody = new body_classe();
      $classeBody->bodyHtml();
      echo '</html>';
    }

  }
?>
