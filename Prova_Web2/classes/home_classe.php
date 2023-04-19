<?php
  include 'Classes/body_classe.php';
  include 'Classes/meta_classe.php';
  include 'Classes/html_classe.php';
  include 'Classes/menu_classe.php';
  include 'Classes/conexao_classe.php';

  class home_classe {

    public function criaPagina(){
      $classehtmlini = new html_classe();
      $classehtmlini->tagHtmlini();

      $classe = new meta_classe();
      $classe->metaHtml();

      $classeBodyIni = new body_classe();
      $classeBodyIni->bodyHtmlIni();

      $classeMenuIns = new menu_classe();
      $classeMenuIns->inserirReg();

      $classeMenuIns = new menu_classe();
      $classeMenuIns->cadastrarRegiao();

      $classeMenuIni = new menu_classe();
      $classeMenuIni->listaMenu();

      $classeMenuLista = new menu_classe();
      $classeMenuLista->listaComando();

      $classeMenuExe = new menu_classe();
      $classeMenuExe->excluirReg();


      $classeBodyFim = new body_classe();
      $classeBodyFim->bodyHtmlFim();
      
      $classeHtmlfim = new html_classe();
      $classeHtmlfim->tagHtmlfim();
    }

  }
?>