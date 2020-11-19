<?php
  include("../model/pessoa.php");
  $obj = new Pessoa();
  if ($tipo=="unico") {
    $retorno = $obj->loadById($id);

    return $retorno;
  }
?>
