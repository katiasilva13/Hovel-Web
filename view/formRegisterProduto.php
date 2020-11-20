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
        <h4 class="page-title">Cadastrar produto</h4>
        <div class="ml-auto text-right">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="home.php">Home</a></li>
              <li class="breadcrumb-item active"><a href="formListProduto.php">Estoque</a></li>
              <li class="breadcrumb-item active" aria-current="page">Cadastrar produto</li>
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
              if ($_GET["mensagem"] == "sucesso") {
            ?>
                <div class="alert alert-success" role="alert">
                  Produto Cadastrado com sucesso!!!
                </div>
              <?php
              } else {
              ?>
                <div class="alert alert-danger" role="alert">
                  Ocorreu um erro ao gravar o Produto!!!
                </div>
            <?php
              }
            }
            ?>
          </div>

          <form class="form-horizontal form-material form-row" action="../api/controller/registerProduto.php" method="post">
            <div class="form-group col-md-4">
              <label class="col-md-12">Nome produto: </label>
              <div class="col-md-12">
                <input type="text" id="nomeProduto" name="nomeProduto" class="form-control form-control-line" placeholder="Nome">
              </div>
            </div>
            <div class="form-group col-md-3">
              <label class="col-md-12">Quantidade:</label>
              <div class="col-md-12">
                <input type="integer" id="quantidade" name="quantidade" class="form-control form-control-line" placeholder="Quantidade">
              </div>
            </div>
            <div class="form-group col-md-3">
              <label class="col-md-12">Preço:</label>
              <div class="col-md-12">
                <input type="float" id="preco" name="preco" class="form-control form-control-line" placeholder="Preço">
              </div>
            </div>
            <div class="form-group col-md-12">
              <div class="col-sm-12">




                <button type="submit" class="btn btn-primary">Cadastrar</button>

                <button type="reset" class="btn btn-primary">Limpar</button>

              </div>
            </div>
          </form>

        </div>
      </div>

    </div>

    <!-- Column -->
  </div>
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