<?php
  include("..\api\model\produto.php");
  $objList = new Produto();
  $retorno = $objList->getList();
  return $retorno;
?>