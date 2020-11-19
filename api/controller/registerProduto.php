<?php
  if (isset($_POST)){
  if (!empty($_POST["nomeProduto"]) &&
      !empty($_POST["quantidade"]) &&
          !empty($_POST["preco"]) 
    ){
        $nomeProduto = filter_input(INPUT_POST, "nomeProduto", FILTER_SANITIZE_STRING);
        $quantidade = filter_input(INPUT_POST, "quantidade", FILTER_SANITIZE_STRING);
        $preco = filter_input(INPUT_POST, "preco", FILTER_SANITIZE_STRING);
        
        include("../model/produto.php");
        $insertProduto = new Produto($nomeProduto, $quantidade, $preco);
        $i = $insertProduto->insert();
        if ($i){
           // var_dump("i=".$i[0]); exit;
            header('location: ../../view/formRegisterProduto.php?mensagem=sucesso');
        }else{
          header('location: ../../view/formRegisterProduto.php?mensagem=erro');
        }
      }else{
          header('location: ../../view/formRegisterProduto.php?mensagem=erro');
      }
  }else{
      header('location: ../../view/formRegisterProduto.php?mensagem=erro');
  }
  ?>
