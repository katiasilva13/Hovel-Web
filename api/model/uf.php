<?php
include('sql.php');
class Uf{
    private $idUf, $uf;
    
    public function __construct($uf="")
    {
        $this->setUf($uf);
    }
    
    public function setData($data){
        $this->setidUf($data['idUf']);
        $this->setUf($data['uf']);
    }
    public function __toString()
    {
        return json_encode(array(
            "idUf"=>$this->getIdUf(),
            "uf"=>$this->getUf()         
        ));
    }

    public static function getList(){
        $sql = new Sql();
        return $sql->select("SELECT * FROM uf ORDER BY idUf ASC;");
    }

    public static function search($nome){
        $sql = new Sql();
        return $sql->select("SELECT * FROM uf where idUf LIKE :SEARCH ORDER BY uf ASC;",
         array(
            ':SEARCH'=>"%".$nome."%"
           ));
    }

    public function loadById($id){
        $sql = new Sql();
        $results = $sql->select("SELECT * FROM uf where idUf = :id", array(":id"=>$id));
        if(count($results) > 0){
            $this->setData($results[0]);
        }
    } 

   
    public function insert(){
        $sql = new Sql();
        $sql->query("INSERT INTO uf (uf) value (:NAME)", 
                        array(":NAME"=>$this->getuf() ));
                                
        $results = $sql->select("SELECT * FROM uf WHERE idUf = LAST_INSERT_ID()");
        if(count($results) > 0)
            $this->setData($results[0]);
    }

    public function update($uf){
        $this->setuf($uf);

        $sql = new Sql();
        $sql->query("UPDATE uf SET uf=:uf WHERE idUf=:ID",
        array(
            ":uf"=>$this->getUf(),
            ":ID"=>$this->getIdUf()
        ));
    }

    public function delete(){
        $sql = new Sql();
        $sql->query("DELETE FROM uf WHERE idUf = :ID",
        array(":ID"=>$this->getIdUf())
        );
        $this->setidUf(0);
        $this->setuf("");
    }

    private function setIdUf($value){
        $this->idUf=$value;
    }
    public function getIdUf(){
        return $this->idUf;
    }
    private function setUf($value){
        $this->uf=$value;
    }
    public function getUf(){
        return $this->uf;
    }
}
