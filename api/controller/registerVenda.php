<?php
  if (isset($_POST)){
  if (
    //!empty($_POST["valorTotal"]) &&
      !empty($_POST["tipoPagamento"]) 
    ){
        //$valorTotal = filter_input(INPUT_POST, "valorTotal", FILTER_SANITIZE_STRING);
        $tipoPagamento = filter_input(INPUT_POST, "tipoPagamento", FILTER_SANITIZE_STRING);
        
        include("../model/venda.php");
        $insertVenda = new Venda($valorTotal, $tipoPagamento);
        $i = $insertVenda->insert();
        if ($i){
           // var_dump("i=".$i[0]); exit;
            header("location: ../../view/formRegisterItensCompra.php?idVenda='$i[0]['idVenda']'");
        }else{
          header('location: ../../view/formRegisterVenda.php?mensagem=erro');
        }
      }else{
          header('location: ../../view/formRegisterVenda.php?mensagem=erro');
      }
  }else{
      header('location: ../../view/formRegisterVenda.php?mensagem=erro');
  }
  ?>
