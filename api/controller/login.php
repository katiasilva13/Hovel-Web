<?php
session_start();

if (isset($_POST)){
    if (!empty($_POST["usuario"]) && !empty($_POST["senha"])){
        $user = filter_input(INPUT_POST, "usuario", FILTER_SANITIZE_STRING);
        $password = filter_input(INPUT_POST, "senha", FILTER_SANITIZE_STRING);

        include("../model/validate.php");
        $validateUser = new Validate();
        $login = $validateUser ->validateUser ($usuario, $senha);
        
        if ($login){
            $_SESSION["id"] = $login[0]["idPessoa"];
            $_SESSION["username"] = $login[0]["nome"];
            $_SESSION["email"] = $login[0]["email"];
            header('location: ../../home.php');
        }else{
          header('location: ../../view/formLogin.php?mensagem=erroUsuario');
        }
      }else{
          header('location: ../../view/formLogin.php?mensagem=erroCampos');
      }
  }else{
      header('location: ../../view/formLogin.php?mensagem=erroPOST');
  }
?>
