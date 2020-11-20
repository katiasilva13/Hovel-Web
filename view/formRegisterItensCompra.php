<!-- <div class="container-fluid"> utilizado para largura total-->

<div class="container">
  <!-- Conteúdo aqui -->
  <div class="row">
    <div class="col">
      &nbsp;
    </div>
  </div>
  <!--<h3>Formulário de Compra</h3>-->
  <div class="row">
    <div class="col">
      <?php
      if (!isset($_GET) || empty($_GET)) {
        //$erro = 'Nada foi postado.';
      } else {
        //  if($_GET["mensagem"] == "sucesso"){

        if ($_GET["mensagem"]) {
          $mensagem = $_GET["mensagem"];
          if ($mensagem == "compraSucesso") {
      ?>
            <div class="alert alert-success" role="alert">
              Compra aberta com sucesso!!!
            </div>
          <?php
          } elseif ($mensagem == "sucesso") {
          ?>
            <div class="alert alert-success" role="alert">
              Alterado com sucesso!!!
            </div>
          <?php
          } elseif ($mensagem == "faltaEstoque") {
          ?>
            <div class="alert alert-danger" role="alert">
              Produto em falta!!!
            </div>
          <?php
          } elseif ($mensagem == "itemCompraSucesso") {
          ?>
            <div class="alert alert-success" role="alert">
              Produto incluido com sucesso!!!
            </div>
          <?php
          } elseif ($mensagem == "RemoveSuccess") {
          ?>
            <div class="alert alert-success" role="alert">
              Produto removido com sucesso!!!
            </div>
          <?php
          } else {
          ?>
            <div class="alert alert-danger" role="alert">
              Ocorreu um erro ao gravar!!! Tente voltar para a página anterior!
            </div>
      <?php
          }
        }
      }
      ?>
    </div>
  </div>

  <?php
  //***************************************************
  //DEIXAR DINÂMICO
  //***************************************************

  $idVenda = $_GET["idVenda"];

  include("../api/model/cardapio.php");
  $objetoRetorno = new Cardapio();
  //PONTO DE MELHORIA

  $retornoCompra = $objetoRetorno->devolveCompra($idVenda);
  $retornoItensCompra = $objetoRetorno->produtosCompra($idVenda);
  ?>

  <h5>Busca de Produto</h5>
  <div class="alert alert-dark" role="alert">
    <form action="../api/controller/registerItensCompra.php" method="post">
      <div class="row">
        <div class="col-2">
          <label for="nome">Produto:</label>
          <select class="form-control" name="id" required>
            <?php
            $retornoCardapio = $objetoRetorno->getList();
            foreach ($retornoCardapio as $key => $value) {
            ?>
              <option value=<?= $value["idCardapio"] ?>><?= $value["nomeCardapio"]; ?></option>
            <?php
            }
            ?>
          </select>
        </div>
        <div class="col-2">
          <label for="quantidade">Quantidade:</label>
          <input type="number" id="quantidade" name="quantidade" class="form-control" placeholder="Quantidade" required>
        </div>
      <div class="row">
        <div class="col-4">
          <input type="hidden" name="idVenda" value=<?= $idVenda; ?>>
          <button type="submit" class="btn btn-primary">Adcionar</button>
        </div>
      </div>
    </form>
  </div>
  <!--dados da compra aqui.-->
  <div class="card">
    <!--PONTO DE MELHORIA-->
    <div class="card-body">
      <!--PONTO DE MELHORIA-->
      <h4>ITENS DA COMPRA</h4>
      <div class="row">
        <div class="col">
          <div class="table-responsive">
            <table class="table">
              <th>ITEM</th>
              <th>PRODUTO</th>
              <th>QTD</th>
              <th>PREÇO ORIGINAL (R$)</th>
              
              
              <!--PONTO DE MELHORIA-->
              <th colspan="2">AÇÃO</th>
              <?php
              $total = 0; //PONTO DE MELHORIA

              $i = 1;
              foreach ($retornoItensCompra as $value) {
                $id = $value["idItensCompra"];
                print_r("oi",$retornoItensCompra, $value);
                var_dump("opa",$id);
              ?>
                <tr>
                  <td><?= $i++ ?></td>
                  <td><?= $value["nomeCardapio"]; ?></td>
                  <td><?= $value["quantidade"]; ?></td>
                  <td style="text-align: right;">
                    <?php
                    //PONTO DE MELHORIA
                    //$value["precoProduto"];
                    echo  number_format($value["precoCardapio"], 2, ',', '.');
                    ?>
                  </td>
                  <td style="text-align: right;">
                    <?php
                    $precoTotal = $value["quantidade"] * ($value["precoCardapio"] / 100);
                    //  $totalProduto = $value["precoProduto"] - ($value["precoProduto"] * $value["desconto"])/100;
                    echo  number_format($precoTotal, 2, ',', '.');
                    ?>
                  </td>
                  <td>
                    <?php
                    // echo "<a class= 'btn btn-success btn-xs' href=../controller/alterarCarrinho.php?id=$id&idVenda=$idVenda>ALTERAR</a>";
                    ?>
                    <form action="altararQtdItem.php" method="post">
                      <input type="hidden" name="id_item" value="<?php echo $value['idItensCompra'] ?>">
                      <input type="hidden" name="id_compra" value="<?php echo $_GET['idVenda'] ?>">
                      <button class="btn btn-success" type="submit">Alterar</button>
                    </form>
                  </td>
                  <td>
                    <?php
                    echo "<a class= 'btn btn-danger btn-xs' href=../controller/removerCarrinho.php?id=$id&idVenda=$idVenda>EXCLUIR</a>";
                    ?>
                  </td>
                </tr>
              <?php
                $total = $total + $totalProduto;
              } 
              //fecha foreach
              ?>
            </table>
          </div>

          <div class="row">
            <div class="alert alert-success" role="alert">
              <h4>TOTAL COMPRA = R$ <?= number_format($total, 2, ',', '.'); ?> </h4>
              <h5>Forma de Pagamento = <?= $retornoCompra[0]["tipoPagamento"] ?></h5>
              <h5>Parcelamento = <?php

                                  $valorParcela = $total / $retornoCompra[0]["tipoPagamento"];
                                  echo number_format($valorParcela, 2, ',', '.');

                                  ?></h5>
              <?php
              echo "<a class= 'btn btn-success btn-xs' href=../controller/fecharCompra.php?idVenda=" . $idVenda . "&totalCompra=" . $total . ">
              FECHAR COMPRA
            </a>";
              ?>
            </div>

          </div>
        </div>
      </div>

    </div>
  </div>
  <!-- ******** -->

</div>


<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script>
  window.jQuery || document.write('<script src=" /site/docs/4.4/assets/js/vendor/jquery.slim.min.js"><\/script>')
</script>
<script src="../bootstrap-4.4.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-6khuMg9gaYr5AxOqhkVIODVIvm9ynTT5J4V1cfthmT+emCG6yVmEZsRHdxlotUnm" crossorigin="anonymous"></script>

<!--<script src="bootstrap-4.1.3-dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>-->
</body>

</html>