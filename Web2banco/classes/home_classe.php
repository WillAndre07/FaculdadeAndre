<?php
  include 'Classes/body_classe.php';
  include 'Classes/meta_classe.php';
  include 'Classes/html_classe.php';
  include 'Classes/menu_classe.php';

  class home_classe {

    public function criaPagina(){
      $classehtmlini = new html_classe();
      $classehtmlini->tagHtmlini();

      $classe = new meta_classe();
      $classe->metaHtml();

      $classeBodyIni = new body_classe();
      $classeBodyIni->bodyHtmlIni();

<<<<<<< HEAD
      
=======
      $classeMenuIni = new menu_classe();
      $classeMenuIni->listaMenu();
>>>>>>> 444a77ba6f9e415c52a888eb58e764ee6becab78

      $classeBodyFim = new body_classe();
      $classeBodyFim->bodyHtmlFim();
      
      $classeHtmlfim = new html_classe();
      $classeHtmlfim->tagHtmlfim();
    }

  }
?>