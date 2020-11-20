<?php
  if (isset($_GET)){
    if (!empty($_GET["idProduto"])
    ){
        $id = filter_input(INPUT_GET, "idProduto", FILTER_SANITIZE_STRING);
        include("../model/produto.php");
        $deleteProduto = new Produto();
        $i = $deleteProduto->delete();
        if ($i){
            header('location: ../../view/formListProduto.php?mensagem=sucesso');
        }else{
          header('location: ../../view/formListProduto.php?mensagem=erro');
        }
      }else{
          header('location: ../../view/formListProduto.php?mensagem=erro');
      }
  }else{
      header('location: ../view/formListProduto.php?mensagem=erro');
  }
?>
