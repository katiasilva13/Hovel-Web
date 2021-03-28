<?php
 include("../api/model/produto.php");
  $objSearch = new Produto();

  $pesquisar = $_GET["pesquisar"];
   $retorno = $objSearch->Search($pesquisar);
    return $retorno;
?>