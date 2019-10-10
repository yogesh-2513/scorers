
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
<p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-2"><a href="<?php echo site_url()."home" ?>">Home</a></span> <span>Careers</span></p>
<h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Careers</h1>
</div>
</div>
</div>
</div>


<section class="ftco-section">

<div class="container">
    
    <div class="row p-3">
        <div class="col-md-8 text-center heading-section ftco-animate">
        <?php foreach ($careers as $value): ?>
            <h2 class="mb-4"><?php echo $value->topic; ?></h2>
            <p class='text-justify'>
            <?php echo $value->description; ?>
            </p>
<?php endforeach; ?>
        </div>


        <div class="col-md-4 text-center heading-section ftco-animate">
            <h4 class="mb-4">Promotions</h4>
            
            <div id="accordion">
                <div class="row">
                    <div class="col-md-12">

                        <div class="card">
                        <?php foreach ($promotions as $value): ?>
                            <div class="card-header">
                            <a class="card-link text-success p-1" href="<?php echo  site_url()."careers/viewcareer/".$value->id; ?>" ><?php echo $value->promotion; ?></a>
                            </div>
                            <?php
                                endforeach;
                            ?>
                           

                            <!-- <div id="menuone" class="collapse show">
                            <div class="card-body">
                            <p>When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrove, the headline of Alphabet Village and the subline of her own road, the Line Lane. Pityful a rethoric question ran over her cheek, then she continued her way.</p>
                            </div>
                            </div> -->

                        </div>

                    </div>
                </div>                     
            </div>

        </div>


    </div>
    

</div>
</section>

