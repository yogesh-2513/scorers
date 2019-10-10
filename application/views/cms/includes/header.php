<!DOCTYPE html>
<html lang="en">

<!-- head section starts -->
<head>
    <title>SCORERS | HOME</title>
    <!-- meta tag -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta name="robots" content="index, follow" />
    <!-- stylesheets -->
    <link rel="shortcut icon" href="<?php echo base_url()."images/logo2.ico" ?>" type="image/x-icon" >
    <script src="<?php echo base_url(); ?>js/jquery.min.js" type="text/javascript"></script>
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/animate.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/magnific-popup.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/aos.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/ionicons.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/jquery.timepicker.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/flaticon.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/icomoon.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/style.css">
    <style>
    p > span{
        text-align:justify;
    }
    p > img{
        max-width:100%;
    }

    .owl-carousel .owl-stage, .owl-carousel.owl-drag .owl-item{
        -ms-touch-action: auto !important;
            touch-action: auto !important;
    }
    </style>
</head>
<!-- head section ends -->

<!-- body section starts -->
<body>

<!-- navbar section starts -->
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="<?php echo site_url()."home" ?>" > 
        <img src="<?php echo base_url()."images/logo2.png" ?>" alt="SCORERS INC." class='img-fluid' style="height:60px">
        </a>
        <!-- <div class="tag-line">
        <span>Be One Of Us</span>
        </div> -->

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="oi oi-menu"></span> Menu
            </button>
        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item <?php if(isset($active_page))if($active_page == "home"){ echo "active"; } ?>">
                    <a href="<?php echo site_url()."home" ?>" class="nav-link">
                        Home
                    </a>
                </li>
                <?php
                    
                    foreach ($modules as $value):
                ?>

                <li class="nav-item <?php if(isset($active_page))if($active_page == strtolower($value->name)){ echo "active"; } ?>">
                    <a href="<?php echo site_url().$value->name ?>" class="nav-link">
                        <?php echo ucfirst($value->name);  ?>
                    </a>
                </li>

                <?php
                    endforeach;
                ?>

                
                
                <!-- <li class="nav-item <?php //if(isset($active_page))if($active_page == "about"){ echo "active"; } ?>">
                    <a href="<?php //echo site_url()."about" ?>" class="nav-link">
                        About
                    </a>
                </li>
                
                <li class="nav-item <?php //if(isset($active_page))if($active_page == "services"){ echo "active"; } ?>"><a href="<?php //echo site_url()."services" ?>" class="nav-link">Services</a></li>
                
                <li class="nav-item <?php //if(isset($active_page))if($active_page == "careers"){ echo "active"; } ?>"><a class="nav-link" href="<?php //echo site_url()."careers" ?>">Careers</a></li>
                
                <li class="nav-item <?php //if(isset($active_page))if($active_page == "blog"){ echo "active"; } ?>"><a class="nav-link" href="<?php //echo site_url()."blog" ?>">Blog</a></li>
                
                <li class="nav-item <?php //if(isset($active_page))if($active_page == "gallery"){ echo "active"; } ?>"><a class="nav-link" href="<?php //echo site_url()."gallery" ?>">Gallery</a></li>
                
                <li class="nav-item <?php //if(isset($active_page))if($active_page == "events"){ echo "active"; } ?>"><a class="nav-link" href="<?php //echo site_url()."events" ?>">Events</a></li>
                
                <li class="nav-item <?php //if(isset($active_page))if($active_page == "achievements"){ echo "active"; } ?>"><a href="<?php //echo site_url()."achievements" ?>" class="nav-link">Achievements</a></li>
                
                <li class="nav-item <?php //if(isset($active_page))if($active_page == "contact"){ echo "active"; } ?>"><a href="<?php //echo site_url()."contact" ?>" class="nav-link">Contact</a></li>
             -->
            </ul>
        </div>
    </div>
</nav>

<!-- navbar section ends -->
