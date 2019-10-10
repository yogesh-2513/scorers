
<style>
.overlay{
    background:url('images/banner.jpg') !important;
    background-repeat:no-repeat !important;
    background-position: center !important;
    background-size: cover !important;
    background-attachment:fixed !important;
}
.hero-wrap{
    height:450px !important;

}
.slider-text {
    height: 450px !important;
}
</style>
<div class="hero-wrap">
<div class="overlay"></div>
<div class="circle-bg"></div>
<div class="circle-bg-2"></div>
<div class="container-fluid">
<div class="row no-gutters d-flex slider-text align-items-center justify-content-center" data-scrollax-parent="true">
<div class="col-md-6 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
<p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-2"><a href="<?php echo site_url()."home" ?>">Home</a></span> <span>Services</span></p>
<h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Services</h1>
</div>
</div>
</div>
</div>


<section class="ftco-section">

<div class="container">
    
    <div class="row p-3">
        <div class="col-md-9 text-center heading-section ftco-animate ">
            <!-- <h2 class="mb-4">Service Topic</h2> -->
            
        
        <?php
        foreach ($content as $value):
        ?>

        <h2 class="mb-4">
        <?php echo $value->topic; ?>
        </h2>
        <p class='text-justify'>
        <?php echo $value->description; ?>
            </p>
<?php
endforeach;
?>

      


        </div>


        <div class="col-md-3 text-center heading-section ftco-animate">
            <h5 class="mb-4">
            Services
            
            </h5>
            <?php foreach ($services as  $value):?>
            <p>
            
            <a href="<?php echo site_url()."services/viewservice/".$value->id ?>"> <?php echo $value->category ?></a>
            
            </p>
            <?php endforeach; ?>
        </div>

        
    </div>
    

</div>
</section>

