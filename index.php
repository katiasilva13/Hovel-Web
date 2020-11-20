<?php
  //  require_once('config.php');
 //   include('api/model/pessoa.php');
    include('api/model/funcionario.php');
    
  /*   
  //criando um novo usuario 
    //$nome="",$email="",$usuario="",$senha="",$cpf="")
   $pessoa = new Pessoa("aparato futurista","aparato@futurista.com","aparatoFuturista","1234","12345678900");
    $pessoa->insert();
    echo $pessoa;
    */ 

    /*    
    $func = new Funcionario("aparato futurista 12","aparato@futurista12.com","aparatoFuturista1","12345","12345678900","");
  //  $nome, $email, $usuario, $senha, $cpf, $horario="")
  $func->insert();
    echo $func;
      */

 /*  // $nome, $email, $usuario, $senha, $cpf, $telefone
       
  $updateUsuario = new Funcionario();
      $updateUsuario->update("19", "SÓ VAMO", "aparato@futurista12.com", "aparatoFuturista12", "1234", 12345678900, 44999999999);
 */
/*
 $loadUser = new Funcionario();
 $loadUser->loadById(31);
var_dump($loadUser);exit;
 $loadUser->loadUserById(31);
*/
$loadUser = new Pessoa();
$loadUser->loadById(49);
var_dump($loadUser);exit;
