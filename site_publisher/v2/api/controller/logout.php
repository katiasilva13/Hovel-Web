<?php
include("../model/autenticar.php");
$autenticarUsuario = new Autenticar();
$sair = $autenticarUsuario->logout();
if ($sair){
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