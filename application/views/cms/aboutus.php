
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
<p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-2"><a href="<?php echo site_url()."home" ?>">Home</a></span> <span>About</span></p>
<h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">About Us</h1>
</div>
</div>
</div>
</div>
<?php $i=2; foreach($about as $value): 
    ?>
<section class="ftco-section bg-light mt-2">
<div class="container">
<div class="row d-md-flex">
    <?php 

        if($i%2 == 0){

    ?>
    <div class="col-md-6 ftco-animate img about-image p-3" >
    <img src="<?php echo base_url().$value->image; ?>" class='img-fluid' 
    alt="scorers <?php echo base_url().$value->image; ?>" >
    </div>

    <div class="col-md-6 ftco-animate p-md-5">
        <div class="row">

            <div class="col-md-12 nav-link-wrap mb-5">
                <div class="nav ftco-animate nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <a class="nav-link active" id="v-pills-whatwedo-tab" data-toggle="pill" href="#v-pills-whatwedo" role="tab" aria-controls="v-pills-whatwedo" aria-selected="true"><?php echo $value->topic; ?></a>
                </div>
                </div>

                <div class="col-md-12 d-flex align-items-center">
                <div class="tab-content ftco-animate" id="v-pills-tabContent">
                <div class="tab-pane fade show active" id="v-pills-whatwedo" role="tabpanel" aria-labelledby="v-pills-whatwedo-tab">
                <div>
                <p>
                <?php echo $value->description; ?>
                </p>

                </div>
                </div>

                </div>
            </div>

        </div>
    </div>

    <?php }else{ ?>
        <div class="col-md-6 ftco-animate p-md-5">
        <div class="row">

            <div class="col-md-12 nav-link-wrap mb-5">
                <div class="nav ftco-animate nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <a class="nav-link active" id="v-pills-whatwedo-tab" data-toggle="pill" href="#v-pills-whatwedo" role="tab" aria-controls="v-pills-whatwedo" aria-selected="true"><?php echo $value->topic; ?></a>
                </div>
                </div>

                <div class="col-md-12 d-flex align-items-center">
                <div class="tab-content ftco-animate" id="v-pills-tabContent">
                <div class="tab-pane fade show active" id="v-pills-whatwedo" role="tabpanel" aria-labelledby="v-pills-whatwedo-tab">
                <div>
                <p>
                <?php echo $value->description; ?>
                </p>

                </div>
                </div>

                </div>
            </div>

        </div>
    </div>
    <div class="col-md-6 ftco-animate img about-image" style="background-image: url(<?php echo base_url().$value->image; ?>);">
    </div>
    <?php }?>


</div>
</div>
</section>

    <?php $i++;endforeach; ?>

<section class="ftco-section">
<div class="container">
<div class="row justify-content-center mb-5 pb-5">
<div class="col-md-7 text-center heading-section ftco-animate">
<span class="subheading">Team</span>
<h2 class="mb-4">Our Team</h2>
<!-- <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in</p> -->
</div>
</div>
<div class="row">
<?php foreach ($team as  $value):?>
<div class="col-md-4 mb-5 ftco-animate">
<div class="block-10">
<div class="person-info mb-2">
<span class="name"><?php echo $value->name; ?></span>
<span class="position "><?php echo $value->designation; ?></span>
</div>
<img src="<?php echo base_url().$value->profile; ?>" alt="scorers team member <?php echo $value->name; ?>" class="img-fluid mb-3" style="height:345px;width:345px">
<p class='text-justify'>
<?php echo $value->description; ?>
</p>
</div>
</div>
<?php endforeach; ?>


</div>
</section>

