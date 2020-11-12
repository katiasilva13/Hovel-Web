<?php
//include('sql.php');
include('pessoa.php');
class Funcionario extends Pessoa{
    private $idFuncionario, $idPessoa, $idCargo, $horario;
    /*
    public function __construct($nome, $email, $usuario, $senha, $cpf, $horario="")
    {
        parent::__construct($nome, $email, $usuario, $senha, $cpf);
        $this->setHorario($horario);
    }
    
    public function setData($data){
        $this->setIdFuncionario($data['idFuncionario']);
        $this->setIdPessoa($data['idPessoa']);
        $this->setIdCargo($data['idCargo']);
        $this->setHorario($data['horario']);
    }
    public function __toString()
    {
        return json_encode(array(
            "idFuncionario"=>$this->getIdFuncionario(),
            "idPessoa"=>$this->getIdPessoa(),
            "idCargo"=>$this->getIdCargo(),
            "horario"=>$this->getHorario()         
        ));
    }


    
    public static function getList(){
        $sql = new Sql();
        return $sql->select("SELECT * FROM funcionario ORDER BY idPessoa ASC;");
    }

    public static function search($nome){
        $sql = new Sql();
        return $sql->select("SELECT * FROM funcionario where idPessoa LIKE :SEARCH ORDER BY idPessoa;",
         array(
            ':SEARCH'=>"%".$nome."%"
           ));
    }

    public function loadById($id){
        $sql = new Sql();
        $results = $sql->select("SELECT * FROM pessoa where idPessoa = :id", array(":id"=>$id));
        if(count($results) > 0){
            $this->setData($results[0]);
        }
    } 

    public function login($usuario, $senha){
        $sql = new Sql();
        $results = $sql->select("SELECT * FROM pessoa where usuario = :LOGIN and senha = :PASSWORD", 
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
                                
        $results = $sql->select("SELECT * FROM pessoa WHERE idusuario = LAST_INSERT_ID()");
        if(count($results) > 0)
            $this->setData($results[0]);
    }

    public function update($usuario, $senha){
        $this->setUsuario($usuario);
        $this->setSenha($senha);

        $sql = new Sql();
        $sql->query("UPDATE pessoa SET usuario=:LOGIN, senha=:PASSWORD WHERE idPessoa=:ID",
        array(
            ":LOGIN"=>$this->getUsuario(),
            ":PASSWORD"=>$this->getSenha(),
            ":ID"=>$this->getIdPessoa()
        ));
    }

    public function delete(){
        $sql = new Sql();
        $sql->query("DELETE FROM pessoa WHERE idPessoa = :ID",
        array(":ID"=>$this->getIdPessoa())
        );
        //depois que excluiu limpa os dados do objeto
        $this->setIdFuncionario(0);
        $this->setHorario("");
    }

    private function setIdFuncionario($value){
        $this->idFuncionario=$value;
    }
    public function getIdFuncionario(){
        return $this->idFuncionario;
    }
    private function setIdPessoa($value){
        $this->idPessoa=$value;
    }
    public function getIdPessoa(){
        return $this->idPessoa;
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
    }*/
}
?>