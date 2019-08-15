<?php
$cakeDescription = 'Admin 2tollfree';
$base = $this->request->getAttribute('webroot');
$action = $this->request->getParam('action');
$controller = $this->request->getParam('controller');
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

        <!-- Plugins css -->
        <?php //if($this->request->getParam('action') == "dashboard"):?>
            <link href="<?=$base?>assets/libs/flatpickr/flatpickr.min.css" rel="stylesheet" type="text/css" />
        <?php //else:?>
            <link href="<?=$base?>assets/libs/jquery-nice-select/nice-select.css" rel="stylesheet" type="text/css" />
            <link href="<?=$base?>assets/libs/switchery/switchery.min.css" rel="stylesheet" type="text/css" />
            <link href="<?=$base?>assets/libs/multiselect/multi-select.css" rel="stylesheet" type="text/css" />
            <link href="<?=$base?>assets/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
            <link href="<?=$base?>assets/libs/bootstrap-select/bootstrap-select.min.css" rel="stylesheet" type="text/css" />
            <link href="<?=$base?>assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.css" rel="stylesheet" type="text/css" /> 
            <link href="<?=$base?>assets/libs/clockpicker/bootstrap-clockpicker.min.css" rel="stylesheet" type="text/css" />
            <link href="<?=$base?>assets/libs/jquery-toast/jquery.toast.min.css" rel="stylesheet" type="text/css" />
        <?php// endif;?>       

        <!-- App css -->
        <link href="<?=$base?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=$base?>assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=$base?>assets/css/app.min.css" rel="stylesheet" type="text/css" />


        <!-- Code Google Analitics -->
        

    </head>

    <body>

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Topbar Start -->
            <div class="navbar-custom">
                <ul class="list-unstyled topnav-menu float-right mb-0">                    

                    <li class="dropdown notification-list">
                        <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <img src="<?=$base?>assets/images/users/user-1.jpg" alt="user-image" class="rounded-circle">
                            <span class="pro-user-name ml-1">
                                <?=$currentUser['name']?> <i class="mdi mdi-chevron-down"></i> 
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                            <!-- item-->
                            <div class="dropdown-header noti-title">
                                <h6 class="text-overflow m-0">Bienvenido !</h6>
                            </div>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="fe-user"></i>
                                <span>Mi Perfil</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="fe-settings"></i>
                                <span>Settings</span>
                            </a>

                            <div class="dropdown-divider"></div>

                            <!-- item-->
                            <a href="<?=$this->Url->build(["controller" => "Users", "action" => "logout"])?>" class="dropdown-item notify-item">
                                <i class="fe-log-out"></i>
                                <span>Salir</span>
                            </a>

                        </div>
                    </li>

                </ul>

                <!-- LOGO -->
                <div class="logo-box" style="background-color: #FFFFFF;">
                    <a href="index.html" class="logo text-center">
                        <span class="logo-lg">
                            <img src="<?=$base?>assets/images/logo.png" alt="" height="60">
                            <!-- <span class="logo-lg-text-light">UBold</span> -->
                        </span>
                        <span class="logo-sm">
                            <!-- <span class="logo-sm-text-dark">U</span> -->
                            <img src="<?=$base?>assets/images/logo.png" alt="" height="24">
                        </span>
                    </a>
                </div>

                <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
                    <li>
                        <button class="button-menu-mobile waves-effect waves-light">
                            <i class="fe-menu"></i>
                        </button>
                    </li>
                </ul>
            </div>
            <!-- end Topbar -->

            <!-- ========== Left Sidebar Start ========== -->
            <div class="left-side-menu">

                <div class="slimscroll-menu">

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">

                        <?=$this->element('menuleft')?>

                    </div>
                    <!-- End Sidebar -->

                    <div class="clearfix"></div>

                </div>
                <!-- Sidebar -left -->

            </div>
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">
                    <?= $this->Flash->render() ?>
                    <!-- Start Content-->
                    <div class="container-fluid">

                        <?= $this->fetch('content') ?>
                        <?=$this->element('modal_add', ["controller" => ""])?>
                        <?=$this->element('modal_edit', ["controller" => ""])?>
                        <?=$this->element('modal_delete', ["controller" => ""])?>
                        <?=$this->element('modal_ads', ["controller" => ""])?>
                        
                    </div> <!-- container -->

                </div> <!-- content -->

                <!-- Footer Start -->
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <?=date('Y')?> &copy; Desarrollado por <a href="http://aap.cloud">AAP NEGOCIOS EN LA NUBE</a> 
                            </div>
                        </div>
                    </div>
                </footer>
                <!-- end Footer -->                
            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->
            <?php                 
                if($action == "index" || $action == "dashboard" || $action == "generatecode")
                {
                    echo $this->Form->hidden('moduleIndex', ['id' => 'moduleIndex', 'value' => $this->Url->build(["action" => $controller ])]);
                }
            ?>
        </div>
        <!-- END wrapper -->            

        <!-- Vendor js -->
        <script src="<?=$base?>assets/js/vendor.min.js"></script>  

        <!-- Plugins js-->
        <script src="<?=$base?>assets/libs/flatpickr/flatpickr.min.js"></script>  
        <?php //if($action == "dashboard"):?>            
            <!--<script src="<?=$base?>assets/libs/jquery-knob/jquery.knob.min.js"></script>
            <script src="<?=$base?>assets/libs/jquery-sparkline/jquery.sparkline.min.js"></script>
            <script src="<?=$base?>assets/libs/flot-charts/jquery.flot.js"></script>
            <script src="<?=$base?>assets/libs/flot-charts/jquery.flot.time.js"></script>
            <script src="<?=$base?>assets/libs/flot-charts/jquery.flot.tooltip.min.js"></script>
            <script src="<?=$base?>assets/libs/flot-charts/jquery.flot.selection.js"></script>
            <script src="<?=$base?>assets/libs/flot-charts/jquery.flot.crosshair.js"></script> -->
            <!-- Dashboar 1 init js
            <script src="<?=$base?>assets/js/pages/dashboard-1.init.js"></script>-->

            <script src="<?=$base?>assets/libs/highcharts-712/code/highcharts.js"></script>
            <!--<script src="<?=$base?>assets/libs/highcharts-712/code/modules/series-label.js"></script>-->
            <script src="<?=$base?>assets/libs/highcharts-712/code/modules/exporting.js"></script>
            <script src="<?=$base?>assets/libs/highcharts-712/code/modules/export-data.js"></script>
            
        <?php //else:?>
            <script src="<?=$base?>assets/libs/jquery-nice-select/jquery.nice-select.min.js"></script>
            <script src="<?=$base?>assets/libs/switchery/switchery.min.js"></script>
            <script src="<?=$base?>assets/libs/multiselect/jquery.multi-select.js"></script>
            <script src="<?=$base?>assets/libs/select2/js/select2.min.js"></script>
            <script src="<?=$base?>assets/libs/select2/js/i18n/es.js"></script>
            <script src="<?=$base?>assets/libs/jquery-mockjax/jquery.mockjax.min.js"></script>
            <script src="<?=$base?>assets/libs/autocomplete/jquery.autocomplete.min.js"></script>
            <script src="<?=$base?>assets/libs/bootstrap-select/bootstrap-select.min.js"></script>
            <script src="<?=$base?>assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
            <script src="<?=$base?>assets/libs/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>
            <script src="<?=$base?>assets/libs/jquery-form/jquery.form.min.js"></script>
            <script src="<?=$base?>assets/libs/clockpicker/bootstrap-clockpicker.min.js"></script>
            <script src="<?=$base?>assets/libs/jquery-toast/jquery.toast.min.js"></script>
            
            <!-- Init js-->
            <!--<script src="<?=$base?>assets/js/pages/form-advanced.init.js"></script> -->
            <script src="<?=$base?>assets/js/pages/form-ajax.init.js"></script>
            <script src="<?=$base?>assets/js/pages/form-elements.init.js"></script> 
            <script src="<?=$base?>assets/js/pages/form-ajax-actions.init.js"></script>
            <!--<script src="<?=$base?>assets/js/pages/toastr.init.js"></script>-->        
        <?php //endif;?>   
        <!-- App js -->
        <script src="<?=$base?>assets/js/app.min.js"></script>
        <script type="text/javascript">
            /*$('#dash-range-datepicker').flatpickr({
                mode: "range"
            });*/

            $('[data-plugin="switchery"]').each(function (idx, obj) {
                new Switchery($(this)[0], $(this).data());
            });
        </script> 
    </body>
</html>