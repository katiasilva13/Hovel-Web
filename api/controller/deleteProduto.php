<?php
  if (isset($_GET)){
    if (!empty($_GET["idProduto"])
    ){
        $id = filter_input(INPUT_GET, "idProduto", FILTER_SANITIZE_STRING);
        include("../model/produto.php");
        $deleteUsuario = new Produto();
        $i = $deleteUsuario->delete($idProduto);
        if ($i){
            header('location: ../../view/formRegisterProduto.phpp?mensagem=sucesso');
        }else{
          header('location: ../../view/formRegisterProduto.php?mensagem=erro');
        }
      }else{
          header('location: ../../view/formRegisterProduto.php?mensagem=erro');
      }
  }else{
      header('location: ../view/formularioCadastro.php?mensagem=erro');
  }
?>
