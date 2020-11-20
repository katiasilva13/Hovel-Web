<?php
  if (isset($_POST)){
    if (!empty($_POST["nomeProduto"]) &&
        !empty($_POST["quantidade"]) &&
        !empty($_POST["preco"]) &&
        !empty($_POST["idProduto"])

    ){
        $idProduto = filter_input(INPUT_POST, "idProduto", FILTER_SANITIZE_STRING);
        $nomeProduto = filter_input(INPUT_POST, "nomeProduto", FILTER_SANITIZE_STRING);
        $quantidade = filter_input(INPUT_POST, "quantidade", FILTER_SANITIZE_STRING);
        $preco = filter_input(INPUT_POST, "preco", FILTER_SANITIZE_STRING);

        include("../model/produto.php");
        
        $updateproduto = new Produto();
        $i = $updateproduto->update($idProduto, $nomeProduto,$quantidade, $ $preco);
        var_dump($i);
        print_r($i);
        if ($i){
            header('location: ../../view/formUpdateProduto.php?mensagem=sucesso');
        }else{
          header('location: ../../view/formUpdateProduto.php?mensagem=erro');
        }
      }else{
          header('location: ../../view/formUpdateProduto.php?mensagem=erro');
      }
    }else{
      header('location: ../../view/formListProduto.php?mensagem=erro');
  }
?>
