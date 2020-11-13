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
                    <h4 class="page-title">Perfil</h4>
                    <div class="ml-auto text-right">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="../home.php">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Perfil</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">   
            <!-- ============================================================== -->
            <!-- Start Page Content -->
            <!-- ============================================================== -->
            <!-- Row -->
            <div class="row">
                <!-- Column -->
                <div class="col-lg-4 col-xlg-3 col-md-5">
                    <div class="card">
                        <div class="card-body">
                            <center class="m-t-30"> <img src="../assets/images/users/1.jpg" class="img-circle" width="150" />
                                <h4 class="card-title m-t-10">
                                    <br>Aparato Futurista 1
                                </h4>
                                <h6 class="card-subtitle">Dono</h6>
                            </center>
                        </div>
                    </div>
                </div>
                <!-- Column -->
                <!-- Column -->
                <div class="col-lg-8 col-xlg-9 col-md-7">
                    <div class="card">
                        <!-- Tab panes -->
                        <div class="card-body">
                            <form class="form-horizontal form-material form-row">                                
                                <div class="form-group col-md-12">
                                    <label class="col-md-10">Nome Completo</label>
                                    <div class="col-md-12">
                                        <input type="text" placeholder="Aparato Futurista"
                                            class="form-control form-control-line">
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="col-md-9">CPF</label>
                                    <div class="col-md-9">
                                        <input type="text" placeholder="123.456.789-00"
                                            class="form-control form-control-line">
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="col-md-10">Telefone</label>
                                    <div class="col-md-10">
                                        <input type="text" placeholder="(44) 9 3276 0000"
                                            class="form-control form-control-line">
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="col-md-8">Nascimento</label>
                                    <div class="col-md-8">
                                        <input type="text" placeholder="12/12/2000"
                                            class="form-control form-control-line">
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="example-email" class="col-md-12">Email</label>
                                    <div class="col-md-12">
                                        <input type="email" placeholder="aparato@futurista.com"
                                            class="form-control form-control-line" name="example-email"
                                            id="example-email">
                                    </div>
                                </div> 
                                <div class="form-group col-md-6">
                                    <label class="col-md-8">Senha</label>
                                    <div class="col-md-8">
                                        <input type="password" value="password"
                                            class="form-control form-control-line">
                                    </div>
                                </div>      
                                <label class="col-md-12"><h5>Endereço</h5> </label>                        
                                <div class="form-group col-md-5">
                                    <label for="example-email" class="col-md-12">Rua</label>
                                    <div class="col-md-12">
                                        <input type="text" placeholder="ABCD"
                                            class="form-control form-control-line" name="example-rua"
                                            id="example-rua">
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="example-email" class="col-md-10">Número</label>
                                    <div class="col-md-10">
                                        <input type="text" placeholder="440"
                                            class="form-control form-control-line" name="example-num"
                                            id="example-num">
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="col-md-12">Complemento</label>
                                    <div class="col-md-12">
                                        <input type="text" placeholder="Apartamento, casa..."
                                            class="form-control form-control-line">
                                    </div>
                                </div> 
                                <div class="form-group col-md-12">
                                    <label class="col-md-12">Bairro</label>
                                    <div class="col-md-12">
                                        <input type="text" placeholder="ABC"
                                            class="form-control form-control-line">
                                    </div>
                                </div> 
                                <div class="form-group col-md-5">
                                    <label class="col-md-12">Cidade</label>
                                    <div class="col-md-12">
                                        <input type="text" placeholder="Cidade Teste"
                                            class="form-control form-control-line">
                                    </div>
                                </div> 
                                <div class="form-group col-md-4">
                                    <label class="col-md-12">UF</label>
                                    <select id="inputState" class="form-control">
                                        <option selected>Escolha...</option>
                                        <option>...</option>
                                      </select>
                                </div> 
                                <div class="form-group col-md-3">
                                    <label class="col-md-12">CEP</label>
                                    <div class="col-md-12">
                                        <input type="text" placeholder="87000-000"
                                            class="form-control form-control-line">
                                    </div>
                                </div> 
                                <div class="form-group col-md-12">
                                    <div class="col-sm-12">
                                        <button type="submit" class="btn btn-success">Salvar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Column -->
            </div>
            <!-- Row -->
            <!-- ============================================================== -->
            <!-- End PAge Content -->
            <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
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