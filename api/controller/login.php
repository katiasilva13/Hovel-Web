<?php
session_start();

if (isset($_POST)){
    if (!empty($_POST["usuario"]) && !empty($_POST["senha"])){
        $usuario = filter_input(INPUT_POST, "usuario", FILTER_SANITIZE_STRING);
        $senha = filter_input(INPUT_POST, "senha", FILTER_SANITIZE_STRING);

//var_dump("usuario=".$usuario."senha=".$senha); exit;

        include("../model/autenticar.php");
        $autenticarUsuario = new Autenticar();
        $login = $autenticarUsuario ->autenticarUsuario($usuario, $senha);
        
        if ($login){
            $_SESSION["idPessoa"] = $login[0]["idPessoa"];
            $_SESSION["usuario"] = $login[0]["usuario"];
            $_SESSION["senha"] = $login[0]["senha"];
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
