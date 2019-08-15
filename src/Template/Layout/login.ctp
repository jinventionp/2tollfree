<?php
$cakeDescription = 'Admin 2tollfree';
$base = $this->request->getAttribute('webroot');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>
            <?= $cakeDescription ?> - 
            <?= $this->fetch('title') ?>
        </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="" name="description" />
        <meta content="AAP" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="<?=$base?>assets/images/favicon.ico">

        <!-- App css -->
        <link href="<?=$base?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=$base?>assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=$base?>assets/css/app.min.css" rel="stylesheet" type="text/css" />

    </head>

    <body class="authentication-bg authentication-bg-pattern">

        <div class="account-pages mt-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card bg-pattern">

                            <div class="card-body p-4">
                                
                                <div class="text-center w-75 m-auto">
                                    <a href="index.html">
                                        <span><img src="<?=$base?>assets/images/logo.png" alt="" height="82"></span>
                                    </a>
                                    <p class="text-muted mb-4 mt-3">Ingrese su correo electrónico y contraseña para acceder al panel de administración.</p>
                                </div>

                                <?= $this->Flash->render() ?>
                                <?= $this->fetch('content') ?>                                

                                <!--<div class="text-center">
                                    <h5 class="mt-3 text-muted">Sign in with</h5>
                                    <ul class="social-list list-inline mt-3 mb-0">
                                        <li class="list-inline-item">
                                            <a href="javascript: void(0);" class="social-list-item border-primary text-primary"><i class="mdi mdi-facebook"></i></a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="javascript: void(0);" class="social-list-item border-danger text-danger"><i class="mdi mdi-google"></i></a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="javascript: void(0);" class="social-list-item border-info text-info"><i class="mdi mdi-twitter"></i></a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="javascript: void(0);" class="social-list-item border-secondary text-secondary"><i class="mdi mdi-github-circle"></i></a>
                                        </li>
                                    </ul>
                                </div>-->

                            </div> <!-- end card-body -->
                        </div>
                        <!-- end card -->

                        <div class="row mt-3">
                            <div class="col-12 text-center">
                                <p> <a href="pages-recoverpw.html" class="text-white-50 ml-1">¿Olvidaste tu contraseña?</a></p>
                                <p class="text-white-50">¿No tienes una cuenta? <a href="pages-register.html" class="text-white ml-1"><b>Regístrate</b></a></p>
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->

                    </div> <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end page -->


        <footer class="footer footer-alt">
            <?=date('Y')?> &copy; 2tollfree <a href="http://aap.cloud" class="text-white-50">aap.cloud</a> 
        </footer>

        <!-- Vendor js -->
        <script src="<?=$base?>assets/js/vendor.min.js"></script>

        <!-- App js -->
        <script src="<?=$base?>assets/js/app.min.js"></script>
        
    </body>
</html>