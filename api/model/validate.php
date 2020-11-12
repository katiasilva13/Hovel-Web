<?php
include('sql.php');
class Validate{
  private $usuario, $senha, $conexao;
  private $autenticado;

  public function __construct(){
    include ("Conexao.php");
    $conectar = new Conectar();
    $this->conexao=$conectar->conectar();
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

      if($this->getAutenticado()){
        $dadosAutenticado = $this->getAutenticado();
        return $dadosAutenticado;
      }else{
        echo "Não Logado";
      }
  }

  public function buscarUsuario($usuario, $senha){
    $senha = md5($senha);  
    if($this->getConexao()){
      $query = "SELECT * FROM usuario where login = '". $usuario . "' AND senha = '" . $senha. "'";//2
      $busca = $this->conexao->query($query);
      $retornoBanco = array();
      while ($linha = $busca->fetch_assoc()) {
        $retornoBanco[] = $linha;
      }
      return $retornoBanco;
    }else{
      echo "Erro";
    }
  }

  public function validarLogin(){
    if($this->getAutenticado()){
      return 1;
    }else{
      return 0;
    }
  }

  public function deslogar(){
    if($this->getConexao()->close()){
      return 1;
    }else {
      return 0;
    }

  }
}
