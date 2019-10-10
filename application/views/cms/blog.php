
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
<p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-2"><a href="<?php echo site_url()."home" ?>">Home</a></span> <span>Blog</span></p>
<h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Blog</h1>
</div>
</div>
</div>
</div>

<section class="ftco-section bg-light">
<div class="container">
<div class="row">
<?php foreach ($blogs as $value): ?>
<div class="col-md-4 ftco-animate">
<div class="blog-entry">
<a href="<?php echo site_url()."blog/viewblog/".$value->id; ?>" class="block-20" style="background-image: url('<?php echo base_url().$value->image; ?>');">
</a>
<div class="text p-4 d-block">
<div class="meta mb-3">
<div><a class='text-dark' href="<?php echo site_url()."blog/viewblog/".$value->id; ?>"><?php echo $value->topic; ?></a></div>
<!-- <div><a href="#">Admin</a></div> -->
<!-- <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div> -->
</div>
<h3 class="heading text-justify"><a href="<?php echo site_url()."blog/viewblog/".$value->id; ?>"><?php echo $value->description; ?></a></h3>
</div>
</div>
</div>
<?php
endforeach;
?>



<!-- <div class="row mt-5">
<div class="col text-center">
<div class="block-27">
<ul>
<li><a href="#">&lt;</a></li>
<li class="active"><span>1</span></li>
<li><a href="#">2</a></li>
<li><a href="#">3</a></li>
<li><a href="#">4</a></li>
<li><a href="#">5</a></li>
<li><a href="#">&gt;</a></li>
</ul>
</div>
</div>
</div> -->
</div>
</section>


