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

   /* public function additensCompra($idProduto, $idCompra, $quantidade, $desconto)
  {
    $estoque = $this->relatorioUnico($idProduto);

    if ($estoque[0]["qtd"] >= $quantidade) {
      $this->idProduto = $idProduto;
      $this->idCompra = $idCompra;
      $this->quantidade = $quantidade;
      $this->desconto = $desconto;

      $baixaEstoque = $estoque[0]["qtd"] - $quantidade;

      if ($this->getConexao()) {
        $buscaPreco = $this->relatorioUnico($this->getIdProduto());

        $this->precoOriginalProduto = $buscaPreco[0]["precoVenda"]; //PONTO DE MELHORIA

        $descontoProduto = ($buscaPreco[0]["precoVenda"] * $this->getDesconto()) / 100;
        $this->precoProduto = $buscaPreco[0]["precoVenda"] - $descontoProduto;

        $query = "INSERT INTO itenscompra (idProduto, idCompra, quantidade, precoOriginalProduto, desconto, precoProduto)
          VALUE ('{$this->getIdProduto()}', '{$this->getIdCompra()}', '{$this->getQuantidade()}',  '{$this->getPrecoOriginalProduto()}','{$this->getDesconto()}', '{$this->getPrecoProduto()}'
              )";

        $insert = $this->conexao->query($query);
        if ($this->conexao->affected_rows) {
          $query1 = "update produto set qtd = $baixaEstoque where id = '{$this->getIdProduto()}'";
          $baixarEstoque = $this->conexao->query($query1);
          $array = array($this->getIdCompra(), 1);
          return $array;
        } else {
          $array = array($this->getIdCompra(), 0);
          return $array;
        }
      } else {
        echo "Não conectado ao BD"; //ok
      }
      //*********
    } else {
      $this->idCompra = $idCompra;
      $array = array($this->getIdCompra(), 0);
      return $array;
    }
  }*/
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