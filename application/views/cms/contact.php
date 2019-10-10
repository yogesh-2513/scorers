
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
<style>
iframe{
    max-width:100%;
}
</style>
<div class="hero-wrap">
<div class="overlay"></div>
<div class="circle-bg"></div>
<div class="circle-bg-2"></div>
<div class="container-fluid">
<div class="row no-gutters d-flex slider-text align-items-center justify-content-center" data-scrollax-parent="true">
<div class="col-md-6 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
<p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-2"><a href="<?php echo site_url()."home" ?>">Home</a></span> <span>Contact</span></p>
<h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Contact</h1>
</div>
</div>
</div>
</div>
<section class="ftco-section contact-section ftco-degree-bg">

<div class="container">
<div class="row d-flex mb-5 contact-info">
<div class="col-md-12 mb-4">
<h2 class="h4">Contact Information</h2>
</div>
<div class="w-100"></div>
<?php foreach ($contact as $value):?>
<div class="col-md-3">
<p><span>Address:</span> <?php echo $value->address; ?></p>
</div>
<div class="col-md-3">
<p><span>Phone:</span> <a href="tel://1234567920"><?php echo $value->phno; ?></a></p>
</div>
<div class="col-md-3">
<p><span>Email:</span> <a href="##"><?php echo $value->email; ?></a></p>
</div>

<?php $sitemap=$value->sitemap; endforeach;?>
<div class="col-md-3">
<!-- <p><span>Website</span> <a href="#">yoursite.com</a></p> -->
</div>
</div>
<div class="row block-9">
<div class="col-md-6 pr-md-5">
<form method="POST" id="form_contact">
<div class="form-group">
<input type="text" class="form-control" placeholder="Your Name" name="name" pattern="[a-zA-Z\s\.]+" required>
</div>
<div class="form-group">
<input type="email" class="form-control" placeholder="Your Email" name="email" required>
</div>
<div class="form-group">
<input type="text" class="form-control" name='number' placeholder="Your Mobile Number" pattern="[0-9]{10}" maxlength="10" required>
</div>
<div class="form-group">
<input type="text" class="form-control" placeholder="Subject" name="subject" required>
</div>
<div class="form-group">
<textarea name="message" required cols="30" rows="7" class="form-control" placeholder="Message"></textarea>
</div>
<div class="form-group">
    <input type="submit" value="Send Message" class="btn btn-primary py-3 px-5">
</div>
</form>
</div>
<div class="col-md-6" id="map" >
<?php echo $sitemap; ?>
</div>
</div>
</div>
</section>
<script>

$("#form_contact").on("submit",function(event){
    event.preventDefault();
    var formdata=new FormData(this);
    $.ajax({
        url:"<?php echo site_url()."contact/send_mail" ?>",
        type:"POST",
        processData:false,
        contentType:false,
        data:formdata,
        success:function(response){
            console.log(response);
            var temp=JSON.parse(response);
            if(temp['error'] == 0){
                alert("Message sent successfully !!");
            }else{
                alert("Failed to send the message");
            }
        }
    });
})

</script>


