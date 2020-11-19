<?php
  include("../model/pessoa.php");
  $obj = new Pessoa();
  
  $retorno = $obj->loadById($id);
  return $retorno;
    
?>
