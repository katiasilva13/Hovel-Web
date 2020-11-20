<?php
  if (isset($_GET["id"])){
    if (!empty($_GET["id"])
    ){
        $id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_STRING);
        include("..\model\produto.php");
        $deleteProduto = new Produto();
        $i = $deleteProduto->delete($id);
        if ($i){
            header('location: ../../view/formListProduto.php?mensagem=sucesso');
        }else{
          header('location: ../../view/formListProduto.php?mensagem=erro');
        }
      }else{
          header('location: ../../view/formListProduto.php?mensagem=erro');
      }
  }else{
      header('location: ../../view/formListProduto.php?mensagem=erro');
  }
