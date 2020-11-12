<?php
include('sql.php');
class Funcionario{
    private $idCargo, $nomeCargo;
    
    public function __construct($nomeCargo="")
    {
        $this->setHorario($nomeCargo);
    }
    
    public function setData($data){
        $this->setIdCargo($data['idCargo']);
        $this->setNomeCargo($data['nomeCargo']);
    }
    public function __toString()
    {
        return json_encode(array(
            "idCargo"=>$this->getIdCargo(),
            "nomeCargo"=>$this->getNomeCargo()         
        ));
    }

    public static function getList(){
        $sql = new Sql();
        return $sql->select("SELECT * FROM cargo ORDER BY idCargo ASC;");
    }

    public static function search($nome){
        $sql = new Sql();
        return $sql->select("SELECT * FROM cargo where idCargo LIKE :SEARCH ORDER BY nomeCargo ASC;",
         array(
            ':SEARCH'=>"%".$nome."%"
           ));
    }

    public function loadById($id){
        $sql = new Sql();
        $results = $sql->select("SELECT * FROM cargo where idCargo = :id", array(":id"=>$id));
        if(count($results) > 0){
            $this->setData($results[0]);
        }
    } 

   
    public function insert(){
        $sql = new Sql();
        $sql->query("INSERT INTO cargo (nomeCargo) value (:NAME)", 
                        array(":NAME"=>$this->getNomeCargo() ));
                                
        $results = $sql->select("SELECT * FROM pessoa WHERE idCargo = LAST_INSERT_ID()");
        if(count($results) > 0)
            $this->setData($results[0]);
    }

    public function update($nomeCargo){
        $this->setNomeCargo($nomeCargo);

        $sql = new Sql();
        $sql->query("UPDATE cargo SET nomeCargo=:CARGO WHERE idCargo=:ID",
        array(
            ":CARGO"=>$this->getNomeCargo(),
            ":ID"=>$this->getIdCargo()
        ));
    }

    public function delete(){
        $sql = new Sql();
        $sql->query("DELETE FROM cargo WHERE idCargo = :ID",
        array(":ID"=>$this->getIdCargo())
        );
        $this->setIdCargo(0);
        $this->setNomeCargo("");
    }

    private function setIdCargo($value){
        $this->idCargo=$value;
    }
    public function getIdCargo(){
        return $this->idCargo;
    }
    private function setNomeCargo($value){
        $this->nomeCargo=$value;
    }
    public function getNomeCargo(){
        return $this->nomeCargo;
    }
}
?>