<?php
include("model/validate.php");
$validateUser = new Validate();
$sair = $validateUser->logout();
if ($sair){
  echo "Base fechada";
  session_start();
  $_SESSION = array();
  session_destroy();
  header('location: ../../index.html');
}else{
  echo "Erro ao fechar a Base";
  exit;
  //header('location: ../view/formLogin.php?mensagem=erroUsuario');
}
?>