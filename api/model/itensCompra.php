<?php 
include("sql.php");
    class itensCompra
    {
      private  $idItensCompra, $idCardapio, $idVenda, $quantidade, $precoCardapio, $precoTotal;
      private $conexao;
    
      public function __construct($quantidade="", $precoCardapio="", $precoTotal="")
    {
        $this->setQuantidade($quantidade);
        $this->setPrecoCardapio($precoCardapio);
        $this->setPrecoTotal($precoTotal);
    }
    
    public function setData($data){
        $this->setIditensCompra($data['idItensCompra']);
        $this->setQuantidade($data['precoQuantidade']);
        $this->setQuantidade($data['precoCardapio']);
        $this->setPrecoTotal($data['precoTotal']);
    }
    public function __toString()
    {
        return json_encode(array(
            "idItensCompra"=>$this->getIdItensCompra(),
            "precoCardapio"=>$this->getPrecoCardapio(),
            "quantidade"=>$this->getQuantidade(),
            "precoTotal"=>$this->getPrecoTotal(),
        ));
    }

    public static function getList(){
        $sql = new Sql();
        return $sql->select("SELECT * FROM itenscompra ORDER BY idItensCompra ASC;");
    }

    public function loadById($id){
        $sql = new Sql();
       return $sql->select("SELECT * FROM itenscompra where iditensCompra = :id", array(":id"=>$id));

      // return $results = $sql->select("SELECT * FROM itenscompra where iditensCompra = :id", array(":id"=>$id));
       
       // if(count($results) > 0){
           // $this->setData($results[0]);
        //}
    } 

    public function insert(){
        $sql = new Sql();
        $sql->query("INSERT INTO itenscompra (quantidade, precoCardapio, precoTotal) 
                                value (:QUANTIDADE, :PRECOCARDAPIO, :PRECOTOTAL)", 
                                array(":QUANTIDADE"=>$this->getQuantidade(),  
                                    ":PRECOCARDAPIO"=>$this->getPrecoCardapio(),
                                    ":PRECOTOTAL"=>$this->getPrecoTotal(), 
                                ));      
        
        $results = $sql->select("SELECT * FROM itenscompra WHERE iditensCompra = LAST_INSERT_ID()");
        if(count($results) > 0)
            $this->setData($results[0]);
    }

    public function delete(){
        $sql = new Sql();
        $sql->query("DELETE FROM itenscompra WHERE iditensCompra = :ID",
        array(":ID"=>$this->getIdItensCompra())
        );
        //depois que excluiu limpa os dados do objeto
        $this->setIditensCompra(0);
        $this->setQuantidade("");
        $this->setPrecoCardapio("");
        $this->setPrecoTotal("");
    }

    public function setIditensCompra($value){
        $this->iditensCompra=$value;
    }
    public function getIdItensCompra(){
        return $this->iditensCompra;
    }
    public function setQuantidade($value){
        $this->quantidade=$value;
    }
    public function getQuantidade(){
        return $this->quantidade;
    }
    public function setPrecoCardapio($value){
        $this->precoCardapio=$value;
    }
    public function getPrecoCardapio(){
        return $this->precoCardapio;
    }
    public function setPrecoTotal($value){
        $this->precoTotal=$value;
    }
    public function getPrecoTotal(){
        return $this->precoTotal;
    }

}
?>