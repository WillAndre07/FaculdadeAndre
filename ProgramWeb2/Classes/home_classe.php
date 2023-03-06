<?php
  include 'Classes/body_classe.php';
  include 'Classes/meta_classe.php';
  include 'Classes/html_classe.php';

  class home_classe {

    public function criaPagina(){
      $classehtmlini = new html_classe();
      $classehtmlini->tagHtmlini();

      $classe = new meta_classe();
      $classe->metaHtml();

      $classeBody = new body_classe();
      $classeBody->bodyHtml();
      
      $classehtmlfim = new html_classe();
      $classehtmlfim->tagHtmlfim();
    }

  }
?>
