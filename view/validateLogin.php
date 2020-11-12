<?php
 session_start();//abre a sessão
 if (!$_SESSION){
   header("location: view/formLogin.php");
  }
?>