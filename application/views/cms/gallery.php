
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
<p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-2"><a href="<?php echo site_url()."home" ?>">Home</a></span> <span>Gallery</span></p>
<h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Gallery</h1>
</div>
</div>
</div>
</div>

<section class="ftco-section bg-light">

<div class="container">
<div class="row" id="gallery_container">
<?php
    foreach ($gallery as $value):
?>
<div class="col-md-4 ftco-animate">
    <div class="blog-entry">
        <a href="<?php echo base_url().$value->image ?>" class="block-20" style="background-image: url('<?php echo base_url().$value->image ?>');">
        </a>
    </div>
</div>
<?php
    endforeach;
?>

        
</div>
</div>
</section>
<script  src="<?php echo base_url(); ?>js/magnific-popup.js" defer></script>
<script>
 $(document).ready(function() {

    $('#gallery_container').magnificPopup({
        delegate: 'a',
        type: 'image',
        tLoading: 'Loading !!',
        mainClass: 'mfp-img-mobile',
        gallery: {
            enabled: true,
            navigateByImgClick: true,
            preload: [0,1] // Will preload 0 - before current, and 1 after the current image
        },
        image: {
            tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
            titleSrc: function(item) {
            return '<small>Scorers Gallery Image</small>';
            }
        }
    });

});
</script>

