<?php
  if (isset($_POST)){
    if (!empty($_POST["nome"]) &&
        !empty($_POST["email"]) &&
        !empty($_POST["cpf"]) &&
        !empty($_POST["usuario"])&&
        !empty($_POST["senha"])&&
    	!empty($_POST["idFuncionario"])
    ){
        $idFuncionario = filter_input(INPUT_POST, "idFuncionario", FILTER_SANITIZE_STRING);
        $nome = filter_input(INPUT_POST, "nome", FILTER_SANITIZE_STRING);
        $cpf = filter_input(INPUT_POST, "cpf", FILTER_SANITIZE_STRING);
        $usuario = filter_input(INPUT_POST, "usuario", FILTER_SANITIZE_STRING);
        $senha = filter_input(INPUT_POST, "senha", FILTER_SANITIZE_STRING);

        if (!filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL)) {
          echo("Email is not valid");
        } else {
          $email = filter_input(INPUT_POST, "email");
        }

        if (!empty($_POST["telefone"])){
            $telefone = filter_input(INPUT_POST, "telefone", FILTER_SANITIZE_STRING);
        }

        include("../model/funcionario.php");
        
        $updateUsuario = new Funcionario();
        $i = $updateUsuario->update($idFuncionario, $nome, $email, $usuario, $senha, $cpf, $telefone);

        if ($i){
            header('location: ../view/alterarUsuario.php?mensagem=sucesso');
        }else{
          header('location: ../view/alterarUsuario.php?mensagem=erro');
        }
      }else{
          header('location: ../view/alterarUsuario.php?mensagem=erro');
      }
    }else{
      header('location: ../view/formUsuario.php?mensagem=erro');
  }
?>
