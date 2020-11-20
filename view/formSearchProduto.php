<?php require_once("header.php") ?>

<div class="page-wrapper">
  <div class="page-breadcrumb">
    <div class="row">
      <div class="col-12 d-flex no-block align-items-center">
        <h4 class="page-title">Produtos</h4>
        <div class="ml-auto text-right">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Pesquisar produtos</li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </div>

  <div class="container-fluid">

    <!-- ============================================================== -->
    <!-- Pesquisar por pesquisar  -->
    <!-- ============================================================== -->
    <form action="formSearchProduto.php" method="GET" id='form-contato' class="form-horizontal col-md-10">
      <div class='col-md-10'>
        <input type="text" class="form-control" id="pesquisar" name="pesquisar" placeholder="Pesquise por Nome">
      </div>
      <div class="row">
        <div class="col">
          &nbsp;
        </div>
      </div>

      <button type="submit" class="btn btn-primary">Pesquisar</button>
      <a href='formListProduto.php' class="btn btn-primary">Ver Todos</a>
      <!-- Formulario de cadastro -->
      <a href='formRegisterProduto.php' class="btn btn-success pull-right">Cadastrar Produto</a>
      <div class='clearfix'></div>
      <div class="row">
        <div class="col">
          &nbsp;
        </div>
      </div>
    </form>
    <!-- ============================================================== -->
    <!-- Fim pesquisar por pesquisar  -->
    <!-- ============================================================== -->
    <div class="row">
      <!-- column -->
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <th>ID</th>
                <th>Nome</th>
                <th>Quantidade</th>
                <th>Preço</th>
                <th colspan="2"></th>

                <?php
                $tipo = "unico";

                include("../api/controller/searchProduto.php");

                foreach ($retorno as $value) {
                  $id = $value["idProduto"];
                ?>
                  <tr>
                    <td><?= $value["idProduto"]; ?></td>
                    <td><?= $value["nomeProduto"]; ?></td>
                    <td><?= $value["quantidade"]; ?></td>
                    <td><?= $value["preco"]; ?></td>
                    <td>
                      <a href="formUpdateProduto.php?id=<?= $id; ?>" class="btn btn-primary">Editar</a>
                      <a href="..\api\controller\deleteProduto.php?id=<?= $id; ?>" class="btn btn-danger link_exclusao">Excluir</a>
                    </td>
                    </td>
                  </tr>
                <?php
                }
                ?>
              </table>
              <?php
              echo "Foram encontrados " . count($retorno) . " registros";
              ?>
            </div>
          </div>

        </div>
        <footer class="footer text-center">
          © 2020 Quattro Formaggi. All Rights Reserved.
        </footer>