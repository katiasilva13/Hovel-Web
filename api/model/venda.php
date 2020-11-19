<?php
include('sql.php');
class Venda{
    private $idPedido, $status, $valorTotal, $tipoPagamento;

    public function __construct($status="", $valorTotal="", $tipoPagamento="")
    {
        $this->setStatus($status);
        $this->setValorTotal($valorTotal);
        $this->setTipoPagamento($tipoPagamento);
    }
    
    public function setData($data){
        $this->setIdPedido($data['idpedido']);
        $this->setStatus($data['status']);
        $this->setValorTotal($data['valorTotal']);
        $this->setTipoPagamento($data['tipoPagamento']);
    }
    public function __toString()
    {
        return json_encode(array(
            "idpedido"=>$this->getIdPedido(),
            "status"=>$this->getStatus(),
            "valorTotal"=>$this->getvalorTotal(),
            "tipoPagamento"=>$this->getTipoPagamento(),
        ));
    }

    public static function getList(){
        $sql = new Sql();
        return $sql->select("SELECT * FROM pedido ORDER BY idPedido ASC;");
    }

    public static function search($idPedido){
        $sql = new Sql();
        return $sql->select("SELECT * FROM pedido where idPedido LIKE :SEARCH ORDER BY idPedido;",
         array(
            ':SEARCHNOME'=>"%".$idPedido."%",
           ));
    }

    public function loadById($id){
        $sql = new Sql();
        $results = $sql->select("SELECT * FROM pedido where idPedido = :id", array(":id"=>$id));
        if(count($results) > 0){
            $this->setData($results[0]);
        }
    } 

    public function insert(){
        $sql = new Sql();
        $sql->query("INSERT INTO pedido (status, valorTotal, tipoPagamento) 
                                value (:STATUS, :VALORTOTAL, :tipoPagamento)", 
                                array(":STATUS"=>$this->getStatus(), 
                                    ":VALORTOTAL"=>$this->getValorTotal(), 
                                    ":tipoPagamento"=>$this->getTipoPagamento(), 
                                ));      
        
        $results = $sql->select("SELECT * FROM pedido WHERE idpedido = LAST_INSERT_ID()");
        if(count($results) > 0)
            $this->setData($results[0]);
    }

    public function update($idpedido, $status, $valorTotal, $tipoPagamento){
        $this->setIdpedido($idpedido);
        $tipoPagamento($tipoPagamento);
        $this->setValorTotal($valorTotal);
        $this->setStatus($status);

        $sql = new Sql();
        $sql->query("UPDATE pedido SET status=:STATUS, valorTotal=:VALORTOTAL, tipoPagamento=:tipoPagamento, WHERE idpedido=:ID",
        array(
            ":STATUS"=>$this->getStatus(),
            ":VALORTOTAL"=>$this->getValorTotal(),
            ":tipoPagamento"=>$this->getTipoPagamento(),
            ":ID"=>$this->getIdpedido()
        ));
    }

    public function delete(){
        $sql = new Sql();
        $sql->query("DELETE FROM pedido WHERE idpedido = :ID",
        array(":ID"=>$this->getIdpedido())
        );
        //depois que excluiu limpa os dados do objeto
        $this->setIdpedido(0);
        $this->setStatus("");
        $this->setValorTotal("");
        $this->setTipoPagamento("");
    }

    public function setIdpedido($value){
        $this->idpedido=$value;
    }
    public function getIdpedido(){
        return $this->idpedido;
    }
    public function setStatus($value){
        $this->status=$value;
    }
    public function getStatus(){
        return $this->status;
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