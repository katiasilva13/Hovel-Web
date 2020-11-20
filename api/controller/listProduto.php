<?php
include("..\api\model\produto.php");

  $objList = new Produto();

    if ($tipo=="produto"){

    $retorno = $objList->getList();
    return $retorno;

    }elseif ($tipo=="unico") {
      $retorno = $objList->loadById($id);
      return $retorno;
    }
?>