<?php
class Autenticar{
  private $usuario, $senha, $conexao, $autenticado;

  public function __construct(){
    include ("sql.php");
    $conn = new Sql();
    $this->conexao=$conn;
  }
  
  public function getConexao(){
    return $this->conexao;
  }

  public function getAutenticado(){
    return $this->autenticado;
  }

  public function autenticarUsuario($usuario, $senha){
    $this->usuario = $usuario;
    $this->senha = $senha;

      $this->autenticado = $this->buscarUsuario($this->usuario, $this->senha);

        $dadosAutenticado = $this->getAutenticado();
        return $dadosAutenticado;
      
  }

  public function buscarUsuario($usuario, $senha){
    $senha = md5($senha); 
    $sql = new Sql();
    $results = $sql->select("SELECT * FROM pessoa where usuario = :LOGIN and senha = :PASSWORD", 
        array(":LOGIN"=>$usuario, 
            ":PASSWORD"=>$senha)
        );
     if(count($results)>0){
          return $results;
      }
  }

  public function validarLogin(){
    if($this->getAutenticado()){
      return 1;
    }else{
      return 0;
    }
  }

  public function logout(){
    if(is_null($this->conn=null)){
      return 1;
    }else {
      return 0;
    }
  }
}
