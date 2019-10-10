
<style>
.overlay{
    background:url('<?php echo base_url(); ?>images/banner.jpg') !important;
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
<p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-2"><a href="<?php echo site_url()."home" ?>">Home</a></span> <span>Services</span> </p>
<h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }" id="current_service"></h1>
</div>
</div>
</div>
</div>
<style>
p > img{
    max-width:100%;
}
p > span{
    text-align:justify;
}
</style>

<section class="ftco-section">

<div class="container">
    
    <div class="row p-3">
        <div class="col-md-9 text-center heading-section ftco-animate ">
            
            
        
        <?php
        $service_heading='';
        foreach ($single_service as $value):
            
        ?>
    <h2 class="mb-4">
    <?php
     
     if($service_heading!=$value->category){
        echo $value->category; 
        $service_heading=$value->category;
     }
     
     ?></h2>
        <p class='text-justify'>
        <?php echo $value->description; ?>

            </p>
            <script>
            $("#current_service").html('<?php echo $value->category; ?>');
            </script>
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

