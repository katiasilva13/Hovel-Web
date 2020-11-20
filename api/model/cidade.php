<?php
include('sql.php');
class Cidade{
    private $idCidade, $cidade;
    
    public function __construct($cidade="")
    {
        $this->setCidade($cidade);
    }
    
    public function setData($data){
        $this->setIdCidade($data['idCidade']);
        $this->setCidade($data['cidade']);
    }
    public function __toString()
    {
        return json_encode(array(
            "idCidade"=>$this->getIdCidade(),
            "cidade"=>$this->getCidade()         
        ));
    }

    public static function getList(){
        $sql = new Sql();
        return $sql->select("SELECT * FROM cidade ORDER BY idCidade ASC;");
    }

    public static function search($nome){
        $sql = new Sql();
        return $sql->select("SELECT * FROM cidade where idCidade LIKE :SEARCH ORDER BY cidade ASC;",
         array(
            ':SEARCH'=>"%".$nome."%"
           ));
    }

    public function loadById($id){
        $sql = new Sql();
        $results = $sql->select("SELECT * FROM cidade where idCidade = :id", array(":id"=>$id));
        if(count($results) > 0){
            $this->setData($results[0]);
        }
    } 

   
    public function insert(){
        $sql = new Sql();
        $sql->query("INSERT INTO cidade (cidade) value (:NAME)", 
                        array(":NAME"=>$this->getcidade() ));
                                
        $results = $sql->select("SELECT * FROM cidade WHERE idCidade = LAST_INSERT_ID()");
        if(count($results) > 0)
            $this->setData($results[0]);
    }

    public function update($cidade){
        $this->setcidade($cidade);

        $sql = new Sql();
        $sql->query("UPDATE cidade SET cidade=:CIDADE WHERE idCidade=:ID",
        array(
            ":CIDADE"=>$this->getcidade(),
            ":ID"=>$this->getidCidade()
        ));
    }

    public function delete(){
        $sql = new Sql();
        $sql->query("DELETE FROM cidade WHERE idCidade = :ID",
        array(":ID"=>$this->getidCidade())
        );
        $this->setidCidade(0);
        $this->setcidade("");
    }

    private function setidCidade($value){
        $this->idCidade=$value;
    }
    public function getidCidade(){
        return $this->idCidade;
    }
    private function setcidade($value){
        $this->cidade=$value;
    }
    public function getcidade(){
        return $this->cidade;
    }
}
