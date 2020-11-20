<?php
include('sql.php');
class Produto{
    private $idProduto, $nomeProduto, $quantidade, $preco;
    
    public function __construct($nomeProduto="", $quantidade="", $preco="")
    {
        $this->setNomeProduto($nomeProduto);
        $this->setQuantidade($quantidade);
        $this->setPreco($preco);
    }
    
    public function setData($data){
        $this->setIdProduto($data['idProduto']);
        $this->setNomeProduto($data['nomeProduto']);
        $this->setQuantidade($data['quantidade']);
        $this->setPreco($data['preco']);
    }
    public function __toString()
    {
        return json_encode(array(
            "idProduto"=>$this->getIdProduto(),
            "nomeProduto"=>$this->getNomeProduto(),
            "quantidade"=>$this->getQuantidade(),
            "preco"=>$this->getPreco(),
        ));
    }

    public static function getList(){
        $sql = new Sql();
        return $sql->select("SELECT * FROM produto ORDER BY nomeProduto ASC;");
    }

    public static function search($nomeProduto){
        $sql = new Sql();
        return $sql->select("SELECT * FROM produto where nomeProduto LIKE :SEARCHNOME ORDER BY nomeProduto;",
         array(
            ':SEARCHNOME'=>"%".$nomeProduto."%",
           ));
    }

    public function loadById($id){
        $sql = new Sql();
       return $sql->select("SELECT * FROM produto where idProduto = :id", array(":id"=>$id));

      // return $results = $sql->select("SELECT * FROM produto where idProduto = :id", array(":id"=>$id));
       
       // if(count($results) > 0){
           // $this->setData($results[0]);
        //}
    } 

    public function insert(){
        $sql = new Sql();
        $sql->query("INSERT INTO produto (nomeProduto, quantidade, preco) 
                                value (:NOMEPRODUTO, :QUANTIDADE, :PRECO)", 
                                array(":NOMEPRODUTO"=>$this->getNomeProduto(), 
                                    ":QUANTIDADE"=>$this->getQuantidade(), 
                                    ":PRECO"=>$this->getPreco(), 
                                ));      
        
       /* $results = $sql->select("SELECT * FROM Produto WHERE idProduto = LAST_INSERT_ID()");
        if(count($results) > 0)
            $this->setData($results[0]);*/
    }

    public function update($idProduto, $nomeProduto, $quantidade, $preco){
        $this->setIdProduto($idProduto);
        $this->setPreco($preco);
        $this->setQuantidade($quantidade);
        $this->setNomeProduto($nomeProduto);

        $sql = new Sql();
        return $sql->query("UPDATE produto SET nomeProduto=:NOMEPRODUTO, quantidade=:QUANTIDADE, preco=:PRECO, WHERE idProduto=:ID",
        array(
            ":NOMEPRODUTO"=>$this->getnomeProduto(),
            ":QUANTIDADE"=>$this->getQuantidade(),
            ":PRECO"=>$this->getpreco(),
            ":ID"=>$this->getIdProduto()
        ));
    }

    public function delete(){
        $sql = new Sql();
        $sql->query("DELETE FROM produto WHERE idProduto = :ID",
        array(":ID"=>$this->getIdProduto())
        );
        //depois que excluiu limpa os dados do objeto
        $this->setIdProduto(0);
        $this->setNomeProduto("");
        $this->setQuantidade("");
        $this->setPreco("");
    }

    public function setIdProduto($value){
        $this->idProduto=$value;
    }
    public function getIdProduto(){
        return $this->idProduto;
    }
    public function setNomeProduto($value){
        $this->nomeProduto=$value;
    }
    public function getnomeProduto(){
        return $this->nomeProduto;
    }
    public function setQuantidade($value){
        $this->quantidade=$value;
    }
    public function getQuantidade(){
        return $this->quantidade;
    }
    public function setPreco($value){
        $this->preco=$value;
    }
    public function getPreco(){
        return $this->preco;
    }

}
?>