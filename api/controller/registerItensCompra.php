<?php
  if (isset($_POST)){
  if (!empty($_POST["quantidade"]) &&
      !empty($_POST["precoCardapio"]) &&
          !empty($_POST["precoTotal"]) 
    ){
        $nomeProduto = filter_input(INPUT_POST, "quantidade", FILTER_SANITIZE_STRING);
        $quantidade = filter_input(INPUT_POST, "precoCardapio", FILTER_SANITIZE_STRING);
        $preco = filter_input(INPUT_POST, "precoTotal", FILTER_SANITIZE_STRING);
        
        include("../model/itensCompra.php");
        $insertItensCompra = new ItensCompra($quantidade, $precoCardapio, $precoTotal);
        $i = $insertItensCompra->insert();
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
