<?php require_once("headerr.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="css/custom.css">
  <title>Document</title>
</head>
<body>
  

<div class="page-wrapper">
    <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Produtos</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Ferramentas</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

<div class="container-fluid">
      <div class="row">
        <div class="col">
          <?php
          if ( !isset( $_GET ) || empty( $_GET ) ) {
        	   //$erro = 'Nada foi postado.';
          }else{
            if($_GET["mensagem"]=="sucesso"){
              ?>
              <div class="alert alert-success" role="alert">
                Produto Cadastrado com sucesso!!!
              </div>
              <?php
            }else {
              ?>
              <div class="alert alert-danger" role="alert">
                Ocorreu um erro ao gravar o Produto!!!
              </div>
              <?php
            }
          }
          ?>
        </div>
      </div>

 

    <form action="../api/controller/registerProduto.php" method="post">
    
    <div class="row">
          <div class="col-3">
            <label for="nomeProduto">Nome:</label>
            <input type="text" id="nomeProduto" name="nomeProduto" class="form-control" placeholder="Nome">
          </div>
          </div>

          <div class="row">
          <div class="col-2">
            <label for="quantidade">Quantidade:</label>
            <input type="number" id="quantidade" name="quantidade" class="form-control" placeholder="Quantidade">
          </div>
          </div>

          <div class="row">
          <div class="col-2">
            <label for="preco">Preço</label>
            <input type="float" id="preco" name="preco" class="form-control" placeholder="Preço">
          </div>
          </div>

          <div class="row">
          <div class="col-1">
        <button type="submit" class="btn btn-primary">Cadastrar</button>
        </div>
        <div class="col-1">
        <button type="reset" class="btn btn-primary">Limpar</button>
      </div>
        </div>
    </div>
    </div>
 
    </form>
 </div>
 <script type="text/javascript" src="../js/custom.js"></script>
 <footer class="footer text-center">
                © 2020 Quattro Formaggi. All Rights Reserved.
            </footer>
            </body>
</html>