<?php
include('sql.php');
class Cardapio{
    private $idCardapio, $nomeCardapio ,$precoCardapio;
    
    public function __construct($nomeCardapio="", $precoCardapio="")
    {
        $this->setnomeCardapio($nomeCardapio);
        $this->setPrecoCardapio($precoCardapio);
    }
    
    public function setData($data){
        $this->setidCardapio($data['idCardapio']);
        $this->setnomeCardapio($data['nomeCardapio']);
        $this->setPrecoCardapio($data['precoCardapio']);
    }
    public function __toString()
    {
        return json_encode(array(
            "idCardapio"=>$this->getidCardapio(),
            "nomeCardapio"=>$this->getnomeCardapio(),
            "precoCardapio"=>$this->getPrecoCardapio(),
        ));
    }

    public static function getList(){
        $sql = new Sql();
        return $sql->select("SELECT * FROM cardapio ORDER BY nomeCardapio ASC;");
    }

    public static function search($nomeCardapio){
        $sql = new Sql();
        return $sql->select("SELECT * FROM cardapio where nomeCardapio LIKE :SEARCHNOME ORDER BY nomeCardapio;",
         array(
            ':SEARCHNOME'=>"%".$nomeCardapio."%",
           ));
    }

    public function loadById($id){
        $sql = new Sql();
       return $sql->select("SELECT * FROM cardapio where idCardapio = :id", array(":id"=>$id));

      // return $results = $sql->select("SELECT * FROM cardapio where idCardapio = :id", array(":id"=>$id));
       
       // if(count($results) > 0){
           // $this->setData($results[0]);
        //}
    } 

    public function insert(){
        $sql = new Sql();
        $sql->query("INSERT INTO cardapio (nomeCardapio, precoCardapio) 
                                value (:NOMECARDAPIO, PRECOCARDAPIO)", 
                                array(":NOMECARDAPIO"=>$this->getnomeCardapio(), 
                                    ":PRECOCARDAPIO"=>$this->getPrecoCardapio(), 
                                ));      
        
        $results = $sql->select("SELECT * FROM cardapio WHERE idCardapio = LAST_INSERT_ID()");
        if(count($results) > 0)
            $this->setData($results[0]);
    }

    public function update($idCardapio, $nomeCardapio, $precoCardapio){
        $this->setidCardapio($idCardapio);
        $this->setPrecoCardapio($precoCardapio);
        $this->setnomeCardapio($nomeCardapio);

        $sql = new Sql();
        $sql->query("UPDATE cardapio SET nomeCardapio=:NOMECARDAPIO, precoCardapio=:PRECOCARDAPIO, WHERE idCardapio=:ID",
        array(
            ":NOMECARDAPIO"=>$this->getnomeCardapio(),
            ":PRECOCARDAPIO"=>$this->getprecoCardapio(),
            ":ID"=>$this->getidCardapio()
        ));
    }

    public function delete(){
        $sql = new Sql();
        $sql->query("DELETE FROM cardapio WHERE idCardapio = :ID",
        array(":ID"=>$this->getidCardapio())
        );
        //depois que excluiu limpa os dados do objeto
        $this->setidCardapio(0);
        $this->setnomeCardapio("");
        $this->setPrecoCardapio("");
    }

    public function setidCardapio($value){
        $this->idCardapio=$value;
    }
    public function getidCardapio(){
        return $this->idCardapio;
    }
    public function setnomeCardapio($value){
        $this->nomeCardapio=$value;
    }
    public function getnomeCardapio(){
        return $this->nomeCardapio;
    }
    public function setPrecoCardapio($value){
        $this->precoCardapio=$value;
    }
    public function getPrecoCardapio(){
        return $this->precoCardapio;
    }

}
?>