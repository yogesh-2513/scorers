<div class="content-page">
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Dashboard</h4>
                        <ol class="breadcrumb p-0 m-0">
                            <li>
                                <a href="#">Scorers</a>
                            </li>
                            <li>
                                <a href="#">Admin</a>
                            </li>
                            <li class="active">
                                    Dashboard
                            </li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>

             <!-- Breadcums Container Starts -->

                <div class="row" >
                    <a href="<?php echo site_url()."admin/gallery" ?>">    
                        <div class="col-lg-4 col-md-4 col-sm-6">
                            <div class="card-box widget-box-one">
                                <i class="mdi mdi-chart-areaspline widget-one-icon"></i>
                                <div class="wigdet-one-content">
                                    Gallery Images
                                    
                                    <h2><?php  if(isset($gallery_count))echo $gallery_count; ?><small></small></h2>
                                    
                                
                                </div>
                            </div>
                        </div>
                    </a>

                    <a href="<?php echo site_url()."admin/blog" ?>">    
                        <div class="col-lg-4 col-md-4 col-sm-6">
                            <div class="card-box widget-box-one">
                                <i class="mdi mdi-chart-areaspline widget-one-icon"></i>
                                <div class="wigdet-one-content">
                                    Blogs
                                    <h2><?php  if(isset($blogs_count))echo $blogs_count; ?><small></small></h2>
                                
                                </div>
                            </div>
                        </div>
                    </a>

                    <a href="<?php echo site_url()."admin/events" ?>">    
                        <div class="col-lg-4 col-md-4 col-sm-6">
                            <div class="card-box widget-box-one">
                                <i class="mdi mdi-chart-areaspline widget-one-icon"></i>
                                <div class="wigdet-one-content">
                                    Events
                                    <h2><?php  if(isset($events_count))echo $events_count; ?><small></small></h2>
                                
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

            <!-- Breadcums Container Ends -->


        </div>
    </div>
</div>



           

    
