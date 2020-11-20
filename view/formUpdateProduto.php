<?php require_once("header.php"); ?>

<!-- ============================================================== -->
<!-- End Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
  <!-- ============================================================== -->
  <!-- Bread crumb and right sidebar toggle -->
  <!-- ============================================================== -->
  <div class="page-breadcrumb">
    <div class="row">
      <div class="col-12 d-flex no-block align-items-center">
        <h4 class="page-title">Alterar produto</h4>
        <div class="ml-auto text-right">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="home.php">Home</a></li>
              <li class="breadcrumb-item active"><a href="formListProduto.php">Estoque</a></li>
              <li class="breadcrumb-item active" aria-current="page">Alterar produto</li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </div>
  <div class="container-fluid">
    <!-- Conteúdo aqui -->
    <div class="row">
      <div class="col-lg-10 col-xlg-9 col-md-7">
        <div class="card">
          <!-- Tab panes -->
          <div class="card-body">
            <?php

            if (!isset($_GET) || empty($_GET)) {
              //$erro = 'Nada foi postado.';
            } else {
              if (empty($_GET["id"])) {
                if ($_GET["mensagem"]) {
                  $mensagem = $_GET["mensagem"];
                  if ($mensagem == "sucesso") {
            ?>
                    <div class="alert alert-success" role="alert">
                      Produto alterado com sucesso!!!
                    </div>
                  <?php
                  } elseif ($mensagem == "erro") {
                  ?>
                    <div class="alert alert-danger" role="alert">
                      Ocorreu um erro ao alterar o produto!!!
                    </div>
                  <?php
                  }
                }
              } elseif ($_GET["id"]) {
                $id = $_GET["id"]; //2
                $tipo = "unico";
                include("../api/controller/listProduto.php");
                foreach ($retorno as $value) {
                  ?>

                  <form class="form-horizontal form-material form-row" action="../api/controller/updateProduto.php" method="post">
                    <div class="form-group col-md-4">
                      <label class="col-md-12">Nome produto </label>
                      <div class="col-md-12">
                        <input type="text" id="nomeProduto" name="nomeProduto" value='<?= $value["nomeProduto"]; ?>' class="form-control form-control-line">
                      </div>
                    </div>
                    <div class="form-group col-md-3">
                      <label class="col-md-12">Quantidade</label>
                      <div class="col-md-12">
                        <input type="integer" id="quantidade" name="quantidade" value=<?= $value["quantidade"]; ?> class="form-control form-control-line">
                      </div>
                    </div>
                    <div class="form-group col-md-3">
                      <label class="col-md-12">Preço</label>
                      <div class="col-md-12">
                        <input type="float" id="preco" name="preco" value=<?= $value["preco"]; ?> class="form-control form-control-line">
                      </div>
                    </div>
                    <div class="form-group col-md-12">
                      <div class="col-sm-12">
                        <input type="hidden" name="idProduto" value=<?= $value["idProduto"]; ?>>
                        <button type="submit" class="btn btn-primary">Alterar</button>
                        <button type="reset" class="btn btn-primary">Limpar</button>
                      </div>
                    </div>
                  </form>

          </div>
        </div>

      </div>

      <!-- Column -->
    </div>
<?php
                }
              }
            }
?>
<!-- Row -->

  </div>
</div>

</div>
</div>
</div>
<div class="row">
  <div class="col">
    &nbsp;
  </div>
</div>
<footer class="footer text-center">
  © 2020 Quattro Formaggi. All Rights Reserved.
</footer>
<!-- ============================================================== -->
<!-- End footer -->
<!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Page wrapper  -->
<!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- All Jquery -->
<!-- ============================================================== -->
<script src="../assets/libs/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="../assets/libs/popper.js/dist/umd/popper.min.js"></script>
<script src="../assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="../assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
<script src="../assets/extra-libs/sparkline/sparkline.js"></script>
<!--Wave Effects -->
<script src="../dist/js/waves.js"></script>
<!--Menu sidebar -->
<script src="../dist/js/sidebarmenu.js"></script>
<!--Custom JavaScript -->
<script src="../dist/js/custom.min.js"></script>

</body>

</html>