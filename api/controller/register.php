<?php
//FILTER_SANITIZE_STRING = retira tags
//FILTER_VALIDATE_EMAIL = filtra validade de e-mails
//http://www.phpit.com.br/artigos/filtrando-e-validando-dados-no-php-com-filter_var.phpit

  if (isset($_POST)){
    if (!empty($_POST["nome"]) &&
		    !empty($_POST["email"]) &&
    		!empty($_POST["cpf"]) &&
  		    !empty($_POST["usuario"])&&
    		!empty($_POST["senha"])
    ){
        $nome = filter_input(INPUT_POST, "nome", FILTER_SANITIZE_STRING);
        $cpf = filter_input(INPUT_POST, "nome", FILTER_SANITIZE_STRING);
        $usuario = filter_input(INPUT_POST, "usuario", FILTER_SANITIZE_STRING);
        $senha = filter_input(INPUT_POST, "senha", FILTER_SANITIZE_STRING);

        if (!filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL)) {
          echo("Email is not valid");
        } else {
          $email = filter_input(INPUT_POST, "email");
        }
        include("../model/pessoa.php");
        $insertPessoa = new Pessoa();
        $i = $insertUsuario->addUsuario($nome, $email, $cpf, $usuario,$senha);
      
        if ($i){
            header('location: ../../view/formLogin.php?mensagem=sucesso');
        }
      }else{
          header('location: ../../view/formRegister.php?mensagem=erro');
      }
  }else{
      header('location: ../../view/formRegister.php?mensagem=erro');
  }
