<?php
include('sql.php');
class Pessoa{
    private $idPessoa, $idEndereco, $usuario, $senha, $email, $nome, $telefone, $cpf;
    
    public function __construct($nome, $email, $usuario, $senha, $cpf)
    {
        $this->setNome($nome);
        $this->setEmail($email);
        $this->setUsuario($usuario);
        $this->setSenha($senha);
        $this->setCpf($cpf);
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
        if(count($results) > 0)
            $this->setData($results[0]);
    }

    public function update($usuario, $senha){
        $senha = md5($senha); 
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
        $this->setIdPessoa(0);
        $this->setNome("");
        $this->setEmail("");
        $this->setUsuario("");
        $this->setSenha("");
        $this->setCpf("");
        $this->setTelefone("");
    }

    private function setIdPessoa($value){
        $this->idPessoa=$value;
    }
    public function getIdPessoa(){
        return $this->idPessoa;
    }
    private function setIdEndereco($value){
        $this->idEndereco=$value;
    }
    public function getIdEndereco(){
        return $this->idEndereco;
    }
    private function setNome($value){
        $this->nome=$value;
    }
    public function getNome(){
        return $this->nome;
    }
    private function setEmail($value){
        $this->email=$value;
    }
    public function getEmail(){
        return $this->email;
    }
    private function setUsuario($value){
        $this->usuario=$value;
    }
    public function getUsuario(){
        return $this->usuario;
    }
    private function setSenha($value){
        $this->senha=md5($value);
    }
    public function getSenha(){
        return $this->senha;
    }
    private function setCpf($value){
        $this->cpf=$value;
    }
    public function getCpf(){
        return $this->cpf;
    }
    private function setTelefone($value){
        $this->telefone=$value;
    }
    public function getTelefone(){
        return $this->telefone;
    }
}
?>