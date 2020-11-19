<?php
include("sql.php");
class Pedido_has_produto{
    private $idPedido, $idProduto, $valor, $dataPedido;


public function __construct($idPedido, $idProduto, $valor="", $dataPedido="")
    {
        $this->setIdPedido($idPedido);
        $this->setIdProduto($idProduto);
        $this->setValor($valor);
        $this->setDataPedido($dataPedido);
    }
    
    public function setData($data){
        $this->setIdPedido($data['idpedido']);
        $this->setIdProduto($data['idProduto']);
        $this->setValor($data['valor']);
        $this->setDataPedido($data['dataPedido']);
    }
    public function __toString()
    {
        return json_encode(array(
            "idpedido"=>$this->getIdPedido(),
            "idproduto"=>$this->getIdProduto(),
            "valor"=>$this->getValor(),
            "dataPedido"=>$this->getDataPedido(),
        ));
    }

    public function setIdpedido($value){
        $this->idpedido=$value;
    }
    public function getIdpedido(){
        return $this->idpedido;
    }
    public function setIdProduto($value){
        $this->IdProduto=$value;
    }
    public function getIdProduto(){
        return $this->IdProduto;
    }
    public function setValor($value){
        $this->valor=$value;
    }
    public function getValor(){
        return $this->valor;
    }
    public function setDataPedido($value){
        $this->dataPedido=$value;
    }
    public function getDataPedido(){
        return $this->dataPedido;
    }
    
}
?>