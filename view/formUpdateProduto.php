
<div class="container-fluid">
      <!-- Conteúdo aqui -->
      <div class="row">
        <div class="col">
          <?php
          if ( !isset( $_GET ) || empty( $_GET ) ) {
        	   //$erro = 'Nada foi postado.';
          }else{
            if(empty($_GET["id"])){
              if ($_GET["mensagem"]){
                $mensagem = $_GET["mensagem"];
                if($mensagem=="sucesso"){
                  ?>
                  <div class="alert alert-success" role="alert">
                    Produto Alterado com sucesso!!!
                </div>
                <?php
                }elseif($mensagem=="erro") {
                ?>
                <div class="alert alert-danger" role="alert">
                  Ocorreu um erro ao alterar o Produto!!!
                </div>
                <?php
                }
              }
          }elseif($_GET["id"]){
            $id = $_GET["id"];//2
            $tipo = "unico";
            include("../api/controller/listProduto.php");
            
            
            foreach ($retorno as $value){

              ?>
              <form action="../api/controller/updateProduto.php" method="post">

                <div class="row">
                  <div class="col-4">
                    <label for="nomeProduto">nomeProduto:</label>
                    <input type="text" id="nomeProduto" name="nomeProduto" value='<?=$value["nomeProduto"];?>' class="form-control" placeholder="nomeProduto">
                  </div>

                  <div class="col-4">
                    <label for="quantidade">Quantidade:</label>
                    <input type="float" id="quantidade" name="quantidade" value=<?=$value["quantidade"];?> class="form-control" placeholder="quantidade">
                  </div>
                </div>

                <div class="row">
                  <div class="col">
                    &nbsp;
                  </div>
                </div>

                <div class="row">
                  <div class="col-3">
                    <label for="preco">Preço:</label>
                    <input type="float" id="preco" name="preco" value=<?=$value["preco"];?> class="form-control" placeholder="preco">
                  </div>
                </div>

                <div class="row">
                  <div class="col">
                    &nbsp;
                  </div>
                </div>
                <div class="row">
                  <div class="col-12">
                    <input type="hidden" name="id" value=<?=$value["id"];?>>
                    <button type="submit" class="btn btn-primary">Alterar</button>
                    <button type="reset" class="btn btn-primary">Limpar</button>
                  </div>
                </div>
              </form>
            <?php
          }
        }
      }

 ?>  </div>