
<div class="hero-wrap">
<div class="overlay"></div>
<div class="circle-bg"></div>
<div class="circle-bg-2"></div>
<div class="container-fluid">
<div class="slider-text d-md-flex align-items-center" data-scrollax-parent="true">
<div class="one-forth pr-md-4 ftco-animate align-self-md-center" data-scrollax=" properties: { translateY: '70%' }">
<h1 class="mb-4" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">
<!-- Design. <br> Development. <br> Hosting. -->
Looking for a first class 
business plan?
</h1>
<!-- <p class="mb-md-5 mb-sm-3" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">A small river named Duden flows by their place and supplies it with the necessary regelialia.</p> -->
<p data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><a href="<?php echo site_url()."about" ?>" class="btn btn-primary px-4 py-3">Get started</a></p>
</div>

<div class="one-half" style="margin-top:2rem">
<div class="slider-carousel owl-carousel">
<?php foreach ($slideshow as $value): ?>
<div class="item">
<img src="<?php echo base_url().$value->image; ?>" class="img-fluid img" alt="scorers slider" />

</div>
<?php
endforeach;
?>

</div>
</div>

</div>
</div>
</div>

<!-- 
<section class="ftco-section bg-light">
    <div class="container">
        <div class="row justify-content-center mb-5 mt-5">
            <div class="col-md-7 text-center heading-section ftco-animate">
            <span class="subheading">Get domain</span>
            <h2 class="mb-4">Get A Domain Name</h2>
            <p>With FREE Email, DNS, Theft Protection, and other features</p>
            </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-8 ftco-animate">
                    <form action="#" class="domain-form">
                <div class="form-group d-md-flex">
                    <input type="text" class="form-control px-4" placeholder="Enter your domain name...">
                    <input type="submit" class="search-domain btn btn-primary px-5" value="Search Domain">
                    </div>
                    </form>
                    <p class="domain-price text-center"><span><small>.com</small>9.75</span> <span><small>.net</small>9.90</span> <span><small>.biz</small>$8.95</span> <span><small>.me</small>$7.95</span></p>
                </div>
        </div>
    </div>
    </div>
</section> -->
<?php if(in_array('services',$active_pages)): ?>
<section class="ftco-section mt-5">

<div class="container">

    <div class="row justify-content-center pb-5">
        <div class="col-md-7 text-center heading-section ftco-animate">
        <span class="subheading">Services</span>
        <h2 class="mt-3">Our Services</h2>
        </div>
    </div>

<div class="row">
<?php 
    foreach ($services as $value):
?>
<div class="col-md-4 d-flex align-self-stretch ftco-animate">
    <div class="media block-6 services d-block text-center">
        <div class="d-flex justify-content-center">
            <div class="">
                <img src="<?php echo base_url()."images/service.jpg" ?>" alt="scorers service" class='img-fluid'>
            </div>
        </div>
        <div class="media-body p-2 mt-3 ">
            <a href="<?php echo site_url()."services/viewservice/".$value->id ?>"><h3 class="heading"><?php echo $value->category ?></h3></a>
            <!-- <p class='text-justify'>
            <?php //echo $value->description; ?>
            </p> -->
        </div>
    </div>
</div>
<?php
endforeach;
?>

</div> 
</div>
</section>
<?php
endif;
?>

<?php if(in_array('about',$active_pages)): ?>
<section class="ftco-section ftco-counter img" id="section-counter" style="background-image: url(<?php echo base_url(); ?>images/bg_1.jpg);">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-5">
            <div class="col-md-7 text-center heading-section heading-section-white ftco-animate">
                <!-- <span class="subheading">About Us</span> -->
                <?php foreach ($about as $value):
                    ?>
                <h2 class="mb-4">About Us</h2>
                <p class='text-justify'>
                    <?php echo $value->description;?>
                </p>
                <a href="<?php echo site_url()."about" ?>" class='text-danger'>Know More</a>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>



<section class="ftco-section testimony-section bg-light">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-5">
            <div class="col-md-7 text-center heading-section ftco-animate">
                <span class="subheading">Our Team</span>
                <h2 class="mb-4">Meet Our Team</h2>
                <!-- <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in</p> -->
            </div>
        </div>

<div class="row ftco-animate">
    <div class="col-md-12">

        <div class="carousel-testimony owl-carousel ftco-owl">
            <?php
                foreach ($team as $value):
            ?>
            <div class="item">
                <div class="testimony-wrap p-4 pb-5">
                <div class="user-img mb-5" style="background-image: url(<?php echo base_url().$value->profile; ?>)">
                <span class="quote d-flex align-items-center justify-content-center">
                <i class="icon-quote-left"></i>
                </span>
                </div>
                <div class="text">
                <!-- <p class="mb-5">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p> -->
                <p class="name"><?php echo $value->name; ?></p>
                <span class="position"><?php echo $value->designation; ?></span>
                </div>
                </div>
            </div>
            <?php
                endforeach;
            ?>

            <!-- <div class="item">
                <div class="testimony-wrap p-4 pb-5">
                <div class="user-img mb-5" style="background-image: url(<?php echo base_url(); ?>images/member.png)">
                <span class="quote d-flex align-items-center justify-content-center">
                <i class="icon-quote-left"></i>
                </span>
                </div>
                <div class="text">
                <p class="mb-5">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                <p class="name">Dennis Green</p>
                <span class="position">Interface Designer</span>
                </div>
                </div>
            </div>

            <div class="item">
                <div class="testimony-wrap p-4 pb-5">
                <div class="user-img mb-5" style="background-image: url(<?php echo base_url(); ?>images/member.png)">
                <span class="quote d-flex align-items-center justify-content-center">
                <i class="icon-quote-left"></i>
                </span>
                </div>
                <div class="text">
                <p class="mb-5">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                <p class="name">Dennis Green</p>
                <span class="position">UI Designer</span>
                </div>
                </div>
            </div> -->

            



        </div>

    </div>

    </div>
</div>
<div class="col-lg-12 text-center">
    <a href="<?php echo site_url()."about" ?>">View More</a>
</div>
</section>
<?php endif; ?>

<!-- <section class="ftco-section">
<div class="container">
<div class="row justify-content-center mb-5 pb-5">
<div class="col-md-7 text-center heading-section ftco-animate">
<span class="subheading">Services</span>
<h2 class="mb-4">How it works</h2>
</div>
</div>
<div class="row">
<div class="col-md-12 nav-link-wrap mb-5 pb-md-5 pb-sm-1 ftco-animate">
<div class="nav ftco-animate nav-pills justify-content-center text-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">
<a class="nav-link active" id="v-pills-nextgen-tab" data-toggle="pill" href="#v-pills-nextgen" role="tab" aria-controls="v-pills-nextgen" aria-selected="true">Next gen VPS</a>
<a class="nav-link" id="v-pills-performance-tab" data-toggle="pill" href="#v-pills-performance" role="tab" aria-controls="v-pills-performance" aria-selected="false">Performance</a>
<a class="nav-link" id="v-pills-effect-tab" data-toggle="pill" href="#v-pills-effect" role="tab" aria-controls="v-pills-effect" aria-selected="false">Effectiveness</a>
</div>
</div>
<div class="col-md-12 align-items-center ftco-animate">
<div class="tab-content ftco-animate" id="v-pills-tabContent">
<div class="tab-pane fade show active" id="v-pills-nextgen" role="tabpanel" aria-labelledby="v-pills-nextgen-tab">
<div class="d-md-flex">
<div class="one-forth align-self-center">
<img src="<?php echo base_url(); ?>images/dashboard_full_1.jpg" class="img-fluid border" alt="">
</div>
<div class="one-half ml-md-5 align-self-center">
<h2 class="mb-4">Next gen VPS hosting</h2>
<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt voluptate, quibusdam sunt iste dolores consequatur</p>
</div>
</div>
</div>
<div class="tab-pane fade" id="v-pills-performance" role="tabpanel" aria-labelledby="v-pills-performance-tab">
<div class="d-md-flex">
<div class="one-forth order-last align-self-center">
<img src="<?php echo base_url(); ?>images/dashboard_full_2.jpg" class="img-fluid border" alt="">
</div>
<div class="one-half order-first mr-md-5 align-self-center">
<h2 class="mb-4">Performance VPS hosting</h2>
<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt voluptate, quibusdam sunt iste dolores consequatur</p>
</div>
</div>
</div>
<div class="tab-pane fade" id="v-pills-effect" role="tabpanel" aria-labelledby="v-pills-effect-tab">
<div class="d-md-flex">
<div class="one-forth align-self-center">
<img src="<?php echo base_url(); ?>images/dashboard_full_1.jpg" class="img-fluid border" alt="">
</div>
<div class="one-half ml-md-5 align-self-center">
<h2 class="mb-4">Effective VPS hosting</h2>
<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt voluptate, quibusdam sunt iste dolores consequatur</p>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</section> -->
<?php if(in_array('gallery',$active_pages)): ?>
<section class="ftco-section-parallax">
    <div class="parallax-img d-flex align-items-center">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-md-7 text-center heading-section heading-section-white ftco-animate">
                <a class='text-white' href="<?php echo site_url()."gallery" ?>"><h2>Gallery</h2></a>
                
                <!-- <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in</p> -->
                    
                    <!-- <div class="row d-flex justify-content-center mt-5">
                        <div class="col-md-6">
                            <form action="#" class="subscribe-form">
                                <div class="form-group">
                                    <span class="icon icon-paper-plane"></span>
                                    <input type="text" class="form-control" placeholder="Enter email address">
                                </div>
                            </form>
                        </div>
                    </div> -->

                </div>
            </div>




            <div class="row ftco-animate">
    <div class="col-md-12">

        <div class="carousel-testimony owl-carousel ftco-owl">
            
            <?php
                foreach ($gallery as $value):
            ?>
            <div class="item">
                <div class="testimony-wrap p-4 pb-5">

                    <!-- <div class="user-img mb-5" style="background-image: url(<?php echo base_url(); ?>images/person_1.jpg)">
                        <span class="quote d-flex align-items-center justify-content-center">
                        <i class="icon-quote-left"></i>
                        </span>
                    </div>

                    <div class="text">
                        <p class="mb-5">
                        Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                        <p class="name">Dennis Green</p>
                        <span class="position">Marketing Manager</span>
                    </div> -->
                    <img src="<?php echo base_url().$value->image; ?>" alt="scorers image" class='img-fluid'>
                </div>
            </div>

            <?php
                endforeach;
            ?>
    
        </div>

    </div>


    

    </div>
















    
        </div>
        
    </div>
    
</section>
<?php endif; ?>

<!-- 
<section class="ftco-section bg-light">
<div class="container">
<div class="row justify-content-center mb-5 pb-5">
<div class="col-md-7 text-center heading-section ftco-animate">
<span class="subheading">Blog</span>
<h2>Recent Blog</h2>
<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in</p>
</div>
</div>
<div class="row">
<div class="col-md-4 ftco-animate">
<div class="blog-entry">
<a href="blog-single.html" class="block-20" style="background-image: url('<?php echo base_url(); ?>images/image_1.jpg');">
</a>
<div class="text p-4 d-block">
<div class="meta mb-3">
<div><a href="#">August 12, 2018</a></div>
<div><a href="#">Admin</a></div>
<div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
</div>
<h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about the blind texts</a></h3>
</div>
</div>
</div>
<div class="col-md-4 ftco-animate">
<div class="blog-entry" data-aos-delay="100">
<a href="blog-single.html" class="block-20" style="background-image: url('<?php echo base_url(); ?>images/image_2.jpg');">
</a>
<div class="text p-4">
<div class="meta mb-3">
<div><a href="#">August 12, 2018</a></div>
<div><a href="#">Admin</a></div>
<div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
</div>
<h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about the blind texts</a></h3>
</div>
</div>
</div>
<div class="col-md-4 ftco-animate">
<div class="blog-entry" data-aos-delay="200">
<a href="blog-single.html" class="block-20" style="background-image: url('<?php echo base_url(); ?>images/image_3.jpg');">
</a>
<div class="text p-4">
<div class="meta mb-3">
<div><a href="#">August 12, 2018</a></div>
<div><a href="#">Admin</a></div>
<div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
</div>
<h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about the blind texts</a></h3>
</div>
</div>
</div>
</div>
</div>
</section> -->
