<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="<?php echo base_url(); ?>asset/images_kopertis_1/logo.png"/> 
    <title>Selamat datang admin</title>
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url(); ?>asset/admin/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Menu CSS -->
    <link href="<?php echo base_url(); ?>asset/admin/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
    <!-- toast CSS -->
    <link href="<?php echo base_url(); ?>asset/admin/plugins/bower_components/toast-master/css/jquery.toast.css" rel="stylesheet">
    <!-- morris CSS -->
    <link href="<?php echo base_url(); ?>asset/admin/plugins/bower_components/morrisjs/morris.css" rel="stylesheet">
    <!-- chartist CSS -->
    <link href="<?php echo base_url(); ?>asset/admin/plugins/bower_components/chartist-js/dist/chartist.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>asset/admin/plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css" rel="stylesheet">
    <!-- animation CSS -->
    <link href="<?php echo base_url(); ?>asset/admin/css/animate.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo base_url(); ?>asset/admin/css/style.css" rel="stylesheet">
    <!-- color CSS -->
    <link href="<?php echo base_url(); ?>asset/admin/css/colors/default.css" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="fix-header">
    <!-- ============================================================== -->
    <!-- Preloader -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
        </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Wrapper -->
    <!-- ============================================================== -->
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-static-top m-b-0">
            <div class="navbar-header">
                <div class="top-left-part">
                    <!-- Logo -->
                    <center><a class="logo" href="/" style="color:black;text-align:center;">LAPORAN KEUANGAN</a></center>
                </div>
                <!-- /Logo -->
                
            </div>
            <!-- /.navbar-header -->
            <!-- /.navbar-top-links -->
            <!-- /.navbar-static-side -->
        </nav>
        <!-- End Top Navigation -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav slimscrollsidebar">
                <div class="sidebar-head">
                    <h3><span class="fa-fw open-close"><i class="ti-close ti-menu"></i></span> <span class="hide-menu">Navigation</span></h3>
                </div>
                <ul class="nav" id="side-menu">
                    <li style="padding: 70px 0 0;">
                        <a href="<?php echo base_url(); ?>home/" class="waves-effect "><i class="fa fa-folder-open-o fa-fw" aria-hidden="true"></i>Jurnal</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>home/bukubesar" class="waves-effect "><i class="fa fa-file fa-fw" aria-hidden="true"></i>Buku besar</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>home/rugilaba" class="waves-effect "><i class="fa fa-dollar fa-fw" aria-hidden="true"></i>Rugi laba</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>home/monitoring" class="waves-effect "><i class="fa fa-desktop fa-fw" aria-hidden="true"></i>Monitoring DP</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>home/logout" class="waves-effect"><i class="fa fa-sign-out fa-fw" aria-hidden="true"></i>Logout</a>
                    </li>
                    
                </ul>
               
            </div>
            
        </div>
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Dashboard</h4> </div>
                    <!-- /.col-lg-12 -->
                </div>
               <?php echo $_config_content; ?>
            </div>
            <!-- /.container-fluid -->
            <footer class="footer text-center"> Copyright © 2018 nicolahara</footer>
        </div>
    </div>
    
    <script src="<?php echo base_url(); ?>asset/admin/plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url(); ?>asset/admin/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Menu Plugin JavaScript -->
    <script src="<?php echo base_url(); ?>asset/admin/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
    <!--slimscroll JavaScript -->
    <script src="<?php echo base_url(); ?>asset/admin/js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="<?php echo base_url(); ?>asset/admin/js/waves.js"></script>
    <!--Counter js -->
    <script src="<?php echo base_url(); ?>asset/admin/plugins/bower_components/waypoints/lib/jquery.waypoints.js"></script>
    <script src="<?php echo base_url(); ?>asset/admin/plugins/bower_components/counterup/jquery.counterup.min.js"></script>
    <!-- chartist chart -->
    <script src="<?php echo base_url(); ?>asset/admin/plugins/bower_components/chartist-js/dist/chartist.min.js"></script>
    <script src="<?php echo base_url(); ?>asset/admin/plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js"></script>
    <!-- Sparkline chart JavaScript -->
    <script src="<?php echo base_url(); ?>asset/admin/plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url(); ?>asset/admin/js/custom.min.js"></script>
    <script src="<?php echo base_url(); ?>asset/admin/js/dashboard1.js"></script>
    <script src="<?php echo base_url(); ?>asset/admin/plugins/bower_components/toast-master/js/jquery.toast.js"></script>
</body>

</html>
