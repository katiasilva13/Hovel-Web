<?php
include('sql.php');
class Venda{
    private $idVenda, $valorTotal, $tipoPagamento;

    public function __construct($valorTotal="", $tipoPagamento="")
    {
        $this->setValorTotal($valorTotal);
        $this->setTipoPagamento($tipoPagamento);
    }
    
    public function setData($data){
        $this->setidVenda($data['idVenda']);
        $this->setValorTotal($data['valorTotal']);
        $this->setTipoPagamento($data['tipoPagamento']);
    }
    public function __toString()
    {
        return json_encode(array(
            "idVenda"=>$this->getidVenda(),
            "valorTotal"=>$this->getvalorTotal(),
            "tipoPagamento"=>$this->getTipoPagamento(),
        ));
    }

    public static function getList(){
        $sql = new Sql();
        return $sql->select("SELECT * FROM venda ORDER BY idVenda ASC;");
    }

    public static function search($idVenda){
        $sql = new Sql();
        return $sql->select("SELECT * FROM venda where idVenda LIKE :SEARCH ORDER BY idVenda;",
         array(
            ':SEARCHID'=>"%".$idVenda."%",
           ));
    }

    public function loadById($id){
        $sql = new Sql();
        $results = $sql->select("SELECT * FROM venda where idVenda = :id", array(":id"=>$id));
        if(count($results) > 0){
            $this->setData($results[0]);
        }
    } 

    public function insert(){
        $sql = new Sql();
        $sql->query("INSERT INTO venda (tipoPagamento) 
                                value (:tipoPagamento)", 
                                array(":tipoPagamento"=>$this->getTipoPagamento(), 
                                ));      
        
        $results = $sql->select("SELECT * FROM venda WHERE idVenda = LAST_INSERT_ID()");
        if(count($results) > 0)
            $this->setData($results[0]);
        return $results;
    }

    public function update($idVenda, $valorTotal, $tipoPagamento){
        $this->setidVenda($idVenda);
        $tipoPagamento($tipoPagamento);
        $this->setValorTotal($valorTotal);

        $sql = new Sql();
        $sql->query("UPDATE venda SET valorTotal=:VALORTOTAL, tipoPagamento=:tipoPagamento, WHERE idVenda=:ID",
        array(
            ":VALORTOTAL"=>$this->getValorTotal(),
            ":tipoPagamento"=>$this->getTipoPagamento(),
            ":ID"=>$this->getidVenda()
        ));
    }

    public function delete(){
        $sql = new Sql();
        $sql->query("DELETE FROM venda WHERE idVenda = :ID",
        array(":ID"=>$this->getidVenda())
        );
        //depois que excluiu limpa os dados do objeto
        $this->setidVenda(0);
        $this->setValorTotal("");
        $this->setTipoPagamento("");
    }

    public function setidVenda($value){
        $this->idVenda=$value;
    }
    public function getidVenda(){
        return $this->idVenda;
    }
    public function setValorTotal($value){
        $this->valorTotal=$value;
    }
    public function getValorTotal(){
        return $this->valorTotal;
    }
    public function setTipoPagamento($value){
        $this->tipoPagamento=$value;
    }
    public function getTipoPagamento(){
        return $this->tipoPagamento;
    }

}


?>