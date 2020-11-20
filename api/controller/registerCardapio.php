<?php
  if (isset($_POST)){
  if (!empty($_POST["nomeCardapio"]) &&
          !empty($_POST["precoCardapio"]) 
    ){
        $nomeProduto = filter_input(INPUT_POST, "nomeProduto", FILTER_SANITIZE_STRING);
        $precoCardapio = filter_input(INPUT_POST, "precoCardapio", FILTER_SANITIZE_STRING);
        
        include("../model/cardapio.php.php");
        $insertCardapio = new Cardapio($nomeProduto, $precoCardapio);
        $i = $insertCardapio->insert();
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
