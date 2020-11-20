

<div class="container">
  <!-- Conteúdo aqui -->
  <h1>Formulário de Compra</h1>
  <div class="row">
    <div class="col">
      <?php
      if (!isset($_GET) || empty($_GET)) {
        //$erro = 'Nada foi postado.';
      } else {
        if ($_GET["mensagem"] != "erro") {
      ?>
          <div class="alert alert-success" role="alert">
            Compra realizada com sucesso!!!
          </div>
        <?php
        } else if ($_GET["mensagem"] == "erroFinalizar") {
        ?>
          <div class="alert alert-success" role="alert">
            Ocorreu um erro ao finalizar a compra!!!
          </div>
        <?php
        } else {
        ?>
          <div class="alert alert-danger" role="alert">
            Ocorreu um erro ao gravar a compra!!!
          </div>
      <?php
        }
      }
      ?>
    </div>
  </div>
  <form action="../controller/registerVenda.php" method="post">

    <div class="row">
      <div class="col-4">
        <label for="nomeCardapio">Nome:</label>

        <?php
        /*include("../model/Usuario.php");
        $objetoRetorno = new Funcionario();
        $retorno = $objetoRetorno->loadById();*/
        ?>
       <!-- <select class="form-control" name="idUsuario">-->

          <?php
          //foreach ($retorno as $key => $value) {
          ?>
            <option value=<?= $value["idCardapio"] ?>><?= $value["nomeCardapio"]; ?></option>
          <?php
         // }
          ?>
        </select>
      </div>
      <div class="col-4">
        <label for="tipoPagamento">Forma de Pagamento:</label>
        <select class="form-control" name="tipoPagamento">
          <option value="1">Dinheiro</option>
          <option value="1">Cartão Debito</option>
          <option value="2">Cartão credito</option>
        </select>
      </div>
    </div>
    <div class="row">
      <div class="col">
        &nbsp;
      </div>
    </div>

    <div class="row">
      <div class="col-12">
        <button type="submit" class="btn btn-primary">Abrir Venda nova</button>
        <button type="reset" class="btn btn-primary">Limpar</button>
      </div>
    </div>

  </form>
</div>
<div class="row">
  <div class="col">
    &nbsp;
  </div>
</div>

