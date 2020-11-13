<?php
 //require("validateLogin.php");
?>

<!DOCTYPE html>
<html dir="ltr" lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
    <title>Login - Hovel</title>
    <!-- Custom CSS -->
    <link href="../dist/css/style.min.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    
</head>

<body>
    <div class="main-wrapper">
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <div class="preloader">
            <div class="lds-ripple">
                <div class="lds-pos"></div>
                <div class="lds-pos"></div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center bg-dark">
            <div class="auth-box bg-dark border-top border-secondary">
                <div id="loginform">
                    <div class="text-center p-t-20 p-b-20">
                        <span class="db"><img src="../assets/images/logo.png" alt="logo" /></span>
                    </div>
                    <!-- Form -->
                    <div class="row">
                        <div class="col">
                            <?php
                            if (!isset($_GET) || empty($_GET)) {
                                //$erro = 'Nada foi postado.';
                            } else {
                                $mensagem = $_GET["mensagem"];
                                if ($mensagem == "sucesso") {
                            ?>
                                    <div class="alert alert-success" role="alert">
                                        Logado
                                    </div>
                                <?php
                                } elseif ($mensagem == "erroUsuario") {
                                ?>
                                    <div class="alert alert-danger" role="alert">
                                        Ocorreu um erro ao logar no sistema. <br>Usuário Inválido!!!
                                    </div>
                                <?php
                                } elseif ($mensagem == "erroCampos") {
                                ?>
                                    <div class="alert alert-danger" role="alert">
                                        Ocorreu um erro ao logar no sistema!!!<br>Campos não preenchidos!!!
                                    </div>
                                <?php
                                } elseif ($mensagem == "erroPOST") {
                                ?>
                                    <div class="alert alert-danger" role="alert">
                                        Ocorreu um erro ao logar no sistema!!!<br>Os dados não foram enviados!!!
                                    </div>
                            <?php
                                }
                            }
                            ?>
                        </div>                          
                 </div>  
                    <form class="form-horizontal m-t-20" id="loginform" action="../api/controller/login.php" method="post">
                        <div class="row p-b-30">
                            <div class="col-12">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-success text-white" id="basic-addon1"><i class="ti-user"></i></span>
                                    </div>
                                    <input type="text" class="form-control form-control-lg" placeholder="Usuário" aria-label="usuario" name="usuario" aria-describedby="basic-addon1" required="">
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-warning text-white" id="basic-addon2"><i class="ti-pencil"></i></span>
                                    </div>
                                    <input type="password" class="form-control form-control-lg" placeholder="Senha" aria-label="senha" name="senha" aria-describedby="basic-addon1" required="">
                                </div>
                            </div>
                        </div>
                        <div class="row border-top border-secondary">
                            <div class="col-12">
                                <div class="form-group">
                                    <div class="p-t-20">
                                        <button class="btn btn-info" id="to-recover" type="button"><i class="fa fa-lock m-r-5"></i> Esqueci minha senha</button>
                                        <button class="btn btn-success float-right" type="submit">Login</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div id="recoverform">
                    <div class="text-center">
                        <span class="text-white">Insira seu e-mail abaixo e enviaremos instruções para recuperação de senha.</span>
                    </div>
                    <div class="row m-t-20">
                        <!-- Form -->
                        <!-- action= enviar pra classe que faz envio de email -->
                        <form class="col-12" action="../home.php">
                            <!-- email -->
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-dark text-white" id="basic-addon1"><i class="ti-email"></i></span>
                                </div>
                                <input type="email" class="form-control form-control-lg" placeholder="Email" aria-label="Usuário" aria-describedby="basic-addon1">
                            </div>
                            <!-- pwd -->
                            <div class="row m-t-20 p-t-20 border-top border-secondary">
                                <div class="col-12">
                                    <a class="btn btn-success" href="#" id="to-login" name="action">Voltar ao Login</a>
                                    <button class="btn btn-info float-right" type="button" name="action">Recuperar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- All Required js -->
    <!-- ============================================================== -->
    <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- ============================================================== -->
    <!-- This page plugin js -->
    <!-- ============================================================== -->
    <script>

    $('[data-toggle="tooltip"]').tooltip();
    $(".preloader").fadeOut();
    // ============================================================== 
    // Login and Recover Password 
    // ============================================================== 
    $('#to-recover').on("click", function() {
        $("#loginform").slideUp();
        $("#recoverform").fadeIn();
    });
    $('#to-login').click(function(){
        
        $("#recoverform").hide();
        $("#loginform").fadeIn();
    });
    </script>

</body>

</html>