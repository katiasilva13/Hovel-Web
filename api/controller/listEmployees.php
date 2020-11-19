<?php
  include("../model/pessoa.php");
  $obj = new Pessoa();

  $retorno = $obj->getList();
  return $retorno;
  
?>
