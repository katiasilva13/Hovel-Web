<?php
  include("..\api\model\pessoa.php");
  $obj = new Pessoa();
  $retorno = $obj->getList();
  return $retorno;  
?>
