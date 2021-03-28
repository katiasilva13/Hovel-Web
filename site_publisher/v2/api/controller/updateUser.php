<?php
if (isset($_POST)) {
  if (
    // 	!empty($_POST["idFuncionario"])
    !empty($_POST["idPessoa"])
  ) {
    //    $idFuncionario = filter_input(INPUT_POST, "idFuncionario", FILTER_SANITIZE_STRING);
    $idPessoa = filter_input(INPUT_POST, "idPessoa", FILTER_SANITIZE_STRING);
    $nome = filter_input(INPUT_POST, "nome", FILTER_SANITIZE_STRING);
    $cpf = filter_input(INPUT_POST, "cpf", FILTER_SANITIZE_STRING);
    $usuario = filter_input(INPUT_POST, "usuario", FILTER_SANITIZE_STRING);
    $senha = filter_input(INPUT_POST, "novaSenha", FILTER_SANITIZE_STRING);

    if (!filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL)) {
      echo ("Email is not valid");
    } else {
      $email = filter_input(INPUT_POST, "email");
    }

    if (!empty($_POST["telefone"])) {
      $telefone = filter_input(INPUT_POST, "telefone", FILTER_SANITIZE_STRING);
    }

    include("../model/pessoa.php");

    $updateUsuario = new Pessoa();
    $i = $updateUsuario->update($idPessoa, $nome, $email, $usuario, $senha, $cpf, $telefone);

    if ($i) {
      header('location: ../../view/profile.php?mensagem=sucesso');
    } else {
      header('location: ../../view/profile.php?mensagem=erro');
    }
  } else {
    header('location: ../../view/profile.php?mensagem=erro');
  }
} else {
  header('location: ../../view/profile.php?mensagem=erro');
}
