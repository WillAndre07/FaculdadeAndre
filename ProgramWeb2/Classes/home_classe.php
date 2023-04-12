<?php
  include 'Classes/body_classe.php';
  include 'Classes/menu_classe.php';
  include 'Classes/meta_classe.php';
  include 'Classes/html_classe.php';
  include 'Classes/form_classe.php';

  class home_classe {

    public function criaPagina(){
      $classehtmlini = new html_classe();
      $classehtmlini->tagHtmlini();

      $classe = new meta_classe();
      $classe->metaHtml();

      $classeBodyIni = new body_classe();
      $classeBodyIni->bodyHtmlIni();

      $classeForm = new form_classe();
      $classeForm->Cadastrar();

      $classeForm = new alterar_classe();
      $classeForm->updateBanco();

      $classeBodyFim = new body_classe();
      $classeBodyFim->bodyHtmlFim();
      
      $classeHtmlfim = new html_classe();
      $classeHtmlfim->tagHtmlfim();
    }

  }
?>