<?php
include("../model/itensCompra.php");

  $objList = new ItensCompra();

    if ($tipo=="todos"){

    $retorno = $objList->getList();
    return $retorno;

    }elseif ($tipo=="unico") {
      $retorno = $objList->loadById($id);
      return $retorno;
    }
?>