<?php
 session_start();
 if (!$_SESSION){
   header("location: formLogin.php");
  }
?>