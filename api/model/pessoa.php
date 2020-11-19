<?php
include('sql.php');
class Pessoa{
    private $idPessoa, $idEndereco, $usuario, $senha, $email, $nome, $cpf, $telefone;
    
    public function __construct($nome="", $email="", $usuario="", $senha="", $cpf="", $telefone="")
    {
        $this->setNome($nome);
        $this->setEmail($email);
        $this->setUsuario($usuario);
        $this->setSenha($senha);
        $this->setCpf($cpf);
        $this->setTelefone($telefone);
    }
    
    public function setData($data){
        $this->setIdPessoa($data['idPessoa']);
        $this->setNome($data['nome']);
        $this->setEmail($data['email']);
        $this->setUsuario($data['usuario']);
        $this->setSenha($data['senha']);
        $this->setCpf($data['cpf']);
        $this->setTelefone($data['telefone']);
    }
    public function __toString()
    {
        return json_encode(array(
            "idPessoa"=>$this->getIdPessoa(),
            "nome"=>$this->getNome(),
            "email"=>$this->getEmail(),
            "usuario"=>$this->getUsuario(),
            "senha"=>$this->getSenha(),
            "cpf"=>$this->getCpf(),
            "telefone"=>$this->getTelefone()          
        ));
    }

    public static function getList(){
        $sql = new Sql();
        return $sql->select("SELECT * FROM pessoa ORDER BY nome ASC;");
    }

    public static function search($nome){
        $sql = new Sql();
        return $sql->select("SELECT * FROM pessoa where nome LIKE :SEARCH ORDER BY nome;",
         array(
            ':SEARCH'=>"%".$nome."%"
           ));
    }

    public function loadById($id){
        $this->setIdPessoa($id);   
        $sql = new Sql();
        $results = $sql->select("SELECT * FROM pessoa where idPessoa = :id", array(":id"=>$id));
        if(count($results) > 0){
          $this->setData($results[0]);
        }
    } 

    public function login($usuario, $senha){
        $senha = md5($senha); 
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
        
        $results = $sql->select("SELECT * FROM pessoa WHERE idPessoa = LAST_INSERT_ID()");
        if(count($results) > 0){
            $this->setData($results[0]);
        }
            
    }

    public function update($idPessoa, $nome, $email, $usuario, $senha, $cpf, $telefone){
    //  $this->setIdEndereco($idEndereco);
        $this->setIdPessoa($idPessoa);
        $this->setUsuario($usuario);
        $this->setSenha($senha);
        $this->setEmail($email);
        $this->setNome($nome);
        $this->setCpf($cpf);
        $this->setTelefone($telefone);

        $sql = new Sql();
        $sql->query("UPDATE pessoa SET nome=:NOME, telefone=:TELEFONE, cpf=:CPF, email=:EMAIL, usuario=:LOGIN, senha=:PASSWORD WHERE idPessoa=:ID",
        array(
          //  ":ID_END"=>$this->getIdEndereco(),
            ":LOGIN"=>$this->getUsuario(),
            ":PASSWORD"=>$this->getSenha(),
            ":NOME"=>$this->getNome(),
            ":EMAIL"=>$this->getEmail(),
            ":CPF"=>$this->getCpf(),
            ":TELEFONE"=>$this->getTelefone(),
            ":ID"=>$this->getIdPessoa()
        ));
    }

    public function delete(){
        $sql = new Sql();
        $sql->query("DELETE FROM pessoa WHERE idPessoa = :ID",
        array(":ID"=>$this->getIdPessoa())
        );
        //depois que excluiu limpa os dados do objeto
        $this->setIdPessoa(0);
        $this->setNome("");
        $this->setEmail("");
        $this->setUsuario("");
        $this->setSenha("");
        $this->setCpf("");
        $this->setTelefone("");
    }

    public function setIdPessoa($value){
        $this->idPessoa=$value;
    }
    public function getIdPessoa(){
        return $this->idPessoa;
    }
    public function setIdEndereco($value){
        $this->idEndereco=$value;
    }
    public function getIdEndereco(){
        return $this->idEndereco;
    }
    public function setNome($value){
        $this->nome=$value;
    }
    public function getNome(){
        return $this->nome;
    }
    public function setEmail($value){
        $this->email=$value;
    }
    public function getEmail(){
        return $this->email;
    }
    public function setUsuario($value){
        $this->usuario=$value;
    }
    public function getUsuario(){
        return $this->usuario;
    }
    public function setSenha($value){
        $this->senha=md5($value);
    }
    public function getSenha(){
        return $this->senha;
    }
    public function setCpf($value){
        $this->cpf=$value;
    }
    public function getCpf(){
        return $this->cpf;
    }
    public function setTelefone($value){
        $this->telefone=$value;
    }
    public function getTelefone(){
        return $this->telefone;
    }
}
?>