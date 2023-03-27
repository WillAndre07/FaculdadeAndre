<?php
  
  include 'Classes/body_classe.php';
  include 'Classes/menu_classe.php';
  include 'Classes/meta_classe.php';
  include 'Classes/html_classe.php';

  class home_classe {

    public function criaPagina(){
      $classehtmlini = new html_classe();
      $classehtmlini->tagHtmlini();

      $classe = new meta_classe();
      $classe->metaHtml();

      $classeBodyIni = new body_classe();
      $classeBodyIni->bodyHtmlIni();

      $classeMenuIni = new menu_classe();
      $classeMenuIni->menuHtmlIni();
      
      $lista = array('Item 1', 'Item 2' ,'Item 3');
      $classeMenuLista = new menu_classe();
      $classeMenuLista->mostraMenu($lista);
     
      $classeMenuFim = new menu_classe();
      $classeMenuFim->menuHtmlFim();

      $classeBodyFim = new body_classe();
      $classeBodyFim->bodyHtmlFim();
      
      $classeHtmlfim = new html_classe();
      $classeHtmlfim->tagHtmlfim();
    }

  }
?>
