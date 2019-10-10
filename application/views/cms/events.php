
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
<p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-2"><a href="<?php echo site_url()."home" ?>">Home</a></span> <span>Events</span></p>
<h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Events</h1>
</div>
</div>
</div>
</div>


<section class="ftco-section">

<div class="container">
    
    <div class="row p-3">
        <?php
            foreach ($events as $value):
        ?>
        <div class="col-md-4 text-center heading-section ftco-animate">
            <h2 class="mb-4"><?php echo $value->topic; ?></h2>
            <img src="<?php echo base_url().$value->image; ?>" alt="scorers <?php echo $value->topic; ?>" style="max-height:310px" class='img-fluid'>
            <p class='mt-4 text-justify'>
            <?php echo $value->description; ?>
            </p>
            <span class='text-primary'>
            <?php $date=date_create($value->date); $time=date_create('');  echo date_format($date,"d M Y").' '.$value->time; ?>
            </span><br>
            <span class='text-warning'>
            <?php echo $value->location; ?>
            </span>
        </div>

        <?php
            endforeach;
        ?>
       
    </div>
    

</div>
</section>

