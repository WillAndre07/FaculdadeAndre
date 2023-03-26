<?php
  session_start();

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

      $_SESSION['tit_not'] = $_POST['tit_not'];
      $_SESSION['res_not'] = $_POST['res_not'];
      $_SESSION['img_not'] = $_POST['img_not'];
      $_SESSION['dat_not'] = $_POST['dat_not'];

      $classeBodyFim = new body_classe();
      $classeBodyFim->bodyHtmlFim();
      
      $classeHtmlfim = new html_classe();
      $classeHtmlfim->tagHtmlfim();
    }

  }
?>
