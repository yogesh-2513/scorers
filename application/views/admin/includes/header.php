<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Scorers Inc. Admin of the scorers can upload their contents for the clients.">
        <meta name="author" content="Coderthemes">

        <!-- App favicon -->
        <!-- <link rel="shortcut icon" href="assets/images/logo.png"> -->
        <!-- App title -->
        <title>SCORERS | ADMIN HOME</title>

        <!-- Summernote css -->
        <link href="<?php echo base_url(); ?>plugins/summernote/summernote.css" rel="stylesheet" />

        <!-- Select2 -->
        <link href="<?php echo base_url(); ?>plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />

        <!-- Jquery filer css -->
        <link href="<?php echo base_url(); ?>plugins/jquery.filer/css/jquery.filer.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>plugins/jquery.filer/css/themes/jquery.filer-dragdropbox-theme.css" rel="stylesheet" />

        <!-- App css -->
        <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/css/menu.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/css/responsive.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>plugins/switchery/switchery.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/picker.css">
        <script src="<?php echo base_url(); ?>assets/js/modernizr.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>js/sweetalert.min.js"></script>
        <style>
        .d-flex{
            display:flex !important;
        }
        .justify-content-center{
            justify-content:center !important;
        }
        p > img {
            max-width: 320px;
            max-height: 250px;
        }
        </style>
    </head>


    <body class="fixed-left">

        <!-- Begin page -->
        <div id="wrapper">

        <div class="topbar">

<!-- LOGO -->
<div class="topbar-left">
    <a href="<?php echo site_url()."admin/dashboard" ?>" class="logo"><span>SCOR<span>ERS</span></span><i class="mdi mdi-layers"></i></a>
    <!-- Image logo -->
    <!--<a href="index.html" class="logo">-->
        <!--<span>-->
            <!--<img src="assets/images/logo.png" alt="" height="30">-->
        <!--</span>-->
        <!--<i>-->
            <!--<img src="assets/images/logo_sm.png" alt="" height="28">-->
        <!--</i>-->
    <!--</a>-->
</div>

<!-- Button mobile view to collapse sidebar menu -->
<div class="navbar navbar-default" role="navigation">
    <div class="container">

        <!-- Navbar-left -->
        <ul class="nav navbar-nav navbar-left">
            <li>
                <button class="button-menu-mobile open-left waves-effect">
                    <i class="mdi mdi-menu"></i>
                </button>
            </li>
     
    
        </ul>

        <!-- Right(Notification) -->
        <ul class="nav navbar-nav navbar-right">
          

            <li class="dropdown user-box">
                <a href="" class="dropdown-toggle waves-effect user-link" data-toggle="dropdown" aria-expanded="true">
                    <img src="<?php echo base_url(); ?>assets/images/users/avatar-1.jpg" alt="user-img" class="img-circle user-img">
                </a>

                <ul class="dropdown-menu dropdown-menu-right arrow-dropdown-menu arrow-menu-right user-list notify-list">
                    <li>
                        <h5>Hi, Admin</h5>
                    </li>
              
                    <!-- <li><a href="change-password.php"><i class="ti-settings m-r-5"></i> Chnage Password</a></li> -->
           
                    <li>
                    <a href="<?php echo site_url()."admin/logout" ?>"><i class="ti-power-off m-r-5"></i> Logout</a>
                    </li>
                </ul>
            </li>

        </ul> <!-- end navbar-right -->

    </div><!-- end container -->
</div><!-- end navbar -->
</div>


