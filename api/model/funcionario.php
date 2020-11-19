<?php
//include('sql.php');
include('pessoa.php');
class Funcionario extends Pessoa{
    private $idFuncionario, $idPessoa, $idCargo, $horario;
    
    public function __construct($nome="", $email="", $usuario="", $senha="", $cpf="", $telefone="", $horario="")
    {
        parent::__construct($nome, $email, $usuario, $senha, $cpf, $telefone);
        $this->setHorario($horario);
    }
    
    public function setData($data){
        $this->setIdFuncionario($data['idFuncionario']);
        $this->setIdPessoa($data['pessoa_idpessoa']);
        $this->setIdCargo($data['cargo_idcargo']);
        $this->setHorario($data['horario']);
    }
    public function __toString()
    {
        return json_encode(array(
            "idFuncionario"=>$this->getIdFuncionario(),
            "pessoa_idpessoa"=>$this->getIdPessoa(),
            "cargo_idcargo"=>$this->getIdCargo(),
            "horario"=>$this->getHorario()         
        ));
    }

    public static function getList(){
        $sql = new Sql();
        return $sql->select("SELECT * FROM funcionario ORDER BY idFuncionario ASC;");
    }

    public static function search($nome){
        $sql = new Sql();
        return $sql->select("SELECT f.*, (SELECT p.* from pessoa p WHERE p.nome LIKE :SEARCH ORDER BY p.idPessoa )  
                                FROM funcionario f WHERE f.pessoa_idpessoa = p.idPessoa;",
         array(
            ':SEARCH'=>"%".$nome."%"
           ));
    }

    public function loadById($idFuncionario){
        $this->setIdFuncionario($idFuncionario); 
        $sql = new Sql();
        $results = $sql->select("SELECT * FROM funcionario where idFuncionario = :id", array(":id"=>$idFuncionario));
        if(count($results) > 0){
           $this->setData($results[0]);
        }
    } 

    public function loadUserById($idFuncionario){
        $this->setIdFuncionario($idFuncionario);        
        
        $sql = new Sql();
        $idP = $sql->select("SELECT pessoa_idpessoa FROM funcionario WHERE idFuncionario = :ID",
        array(
            ":ID"=>$this->getIdFuncionario()
        ));
        $this->setIdPessoa($idP[0]['pessoa_idpessoa']);
        $pessoa = new Pessoa();
       $results = $pessoa->loadById($this->getIdPessoa());

 //       var_dump($results); exit;
        if(count($results) > 0){
            $this->setData($results[0]);
        }
    }

    public function login($usuario, $senha){
        $sql = new Sql();
        $results = $sql->select("SELECT f.* (SELECT p.* from pessoa p WHERE p.usuario = :LOGIN and p.senha = :PASSWORD)
                                    FROM funcionario f WHERE f.pessoa_idpessoa = p.idPessoa;",
        array(":LOGIN"=>$usuario, 
            ":PASSWORD"=>$senha)
        );
        if(count($results)>0){
            $this->setData($results[0]);
        }else{
            throw new Exception("Login e/ou senha inválidos");
        }
    }

    public function insert(){
        $sql = new Sql();
        $sql->query("INSERT INTO pessoa (nome, email, usuario, senha, cpf, telefone) 
                                value (:NAME, :EMAIL, :LOGIN, :PASSWORD, :CPF, :TELEFONE)", 
                                array(":NAME"=>$this->getNome(), 
                                    ":EMAIL"=>$this->getEmail(), 
                                    ":LOGIN"=>$this->getUsuario(), 
                                    ":PASSWORD"=>$this->getSenha(), 
                                    ":CPF"=>$this->getCpf(), 
                                    ":TELEFONE"=>$this->getTelefone()
                                ));
        
        $idPessoa = $sql->select("SELECT idPessoa FROM pessoa WHERE idPessoa = LAST_INSERT_ID()");
        
        $sql->query("INSERT INTO funcionario (pessoa_idpessoa, cargo_idcargo, horario) 
                                value (:PESSOA, :CARGO, :HORARIO)", 
                                array(":PESSOA"=>$idPessoa[0]["idPessoa"], 
                                   ":CARGO"=>'1', 
                                    ":HORARIO"=>$this->getHorario()
                                ));
                  
        $results = $sql->select("SELECT * FROM funcionario WHERE idFuncionario = LAST_INSERT_ID()");
        if(count($results) > 0)
            $this->setData($results[0]);
            return $results;
    }

    public function update($idFuncionario, $nome, $email, $usuario, $senha, $cpf, $telefone){
        $this->setIdFuncionario($idFuncionario);        
        
        $sql = new Sql();
        $idP = $sql->select("SELECT pessoa_idpessoa FROM funcionario WHERE idFuncionario = :ID",
        array(
            ":ID"=>$this->getIdFuncionario()
        ));
        $this->setIdPessoa($idP[0]['pessoa_idpessoa']);

        $pessoa = new Pessoa();
        $pessoa->update($this->getIdPessoa(), $nome, $email, $usuario, $senha, $cpf, $telefone); 
    }
    
    private function setIdFuncionario($value){
        $this->idFuncionario=$value;
    }
    public function getIdFuncionario(){
        return $this->idFuncionario;
    }    
    private function setIdCargo($value){
        $this->idCargo=$value;
    }
    public function getIdCargo(){
        return $this->idCargo;
    }
    private function setHorario($value){
        $this->horario=$value;
    }
    public function getHorario(){
        return $this->horario;
    }
}
