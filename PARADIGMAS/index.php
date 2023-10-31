<?php

$funcao = function(){
  echo 'Hello World!';
};

var_dump($funcao);

$numero = [2,5,6,1,9];
array_filter($numero, function($num){

  if ($num % 2 == 0){
    echo $num;
  }
});

?>