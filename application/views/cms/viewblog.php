
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
<p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-2"><a href="<?php echo site_url()."home" ?>">Home</a></span> <span class="mr-2"><a href="<?php echo site_url()."blog" ?>">Blog</a></span > <span id='current_blog'></span></p>
<h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Blog</h1>
</div>
</div>
</div>
</div>
<style>
p > img{
    max-width:100%;
}
</style>
<section class="ftco-section ftco-degree-bg" id="section">
<div class="container" id="container">
<div class="row">
<?php 
foreach ($single_blog as $value):
  $blog_id=$value->id;
?>

<div class="col-md-8 ftco-animate">
<h2 class="mb-3"><?php echo $value->topic; ?></h2>

<img src="<?php echo base_url().$value->image; ?>" alt="scorers <?php echo $value->topic; ?>" class="img-fluid">
<p class='text-justify mt-4 text-dark'>
<?php echo $value->description; ?></p>
<?php
endforeach;
?>
<div class="pt-5 mt-5">
<h3 class="mb-5"> Comments</h3>

<ul class="comment-list">

<?php
foreach ($comments as $value):
  
?>
<li class="comment">

  <div class="comment-body">
  <h3><?php echo $value->name; ?></h3>
  <div class="meta"><?php echo $value->date; ?></div>
  <p><?php echo $value->message; ?></p>
  </div>
  <?php if($value->answer !=null): ?>
  <ul class="children">
    <li class="comment">
    <div class="comment-body">
    <h3>Admin</h3>
      <p><?php echo $value->answer; ?></p>
    </div>
    </li>
  </ul>
<?php endif; ?>
</li>

<?php
endforeach;
?>


</ul>

<div class="comment-form-wrap pt-5">
<h3 class="mb-5">Leave a comment</h3>

  <form method="POST" id="form_comment" class="p-5 bg-light">
    <input type="hidden" name="id" value="<?php echo $blog_id; ?>" >
    <div class="form-group">
      <label for="name">Name *</label>
      <input type="text" class="form-control" name="name" pattern="[a-zA-Z\s\.]+" required>
    </div>
    <div class="form-group">
      <label for="email">Email *</label>
      <input type="email" class="form-control" name="email" required>
    </div>
    <div class="form-group">
      <label for="message">Message</label>
      <textarea name="message" id="message" cols="30" rows="10" class="form-control" required></textarea>
    </div>
    <div class="form-group">
      <button type="submit" class='btn py-3 px-4 btn-primary'>Post Comment</button>
    </div>
  </form>
</div>

</div>
</div> 


<div class="col-md-4 sidebar ftco-animate">
<div class="sidebar-box ftco-animate">
<h3>Recent Blogs</h3>
<?php foreach ($blogs as $value): ?>
<div class="block-21 mb-4 d-flex">
<a class="blog-img mr-4" href="<?php echo site_url()."blog/viewblog/".$value->id; ?>" style="background-image: url(<?php echo base_url().$value->image; ?>);"></a>
<div class="text">
<h3 class="heading"><a href="<?php echo site_url()."blog/viewblog/".$value->id; ?>"><?php echo $value->topic; ?></a></h3>
</div>
</div>
<?php
endforeach;
?>


</div>
</div>
</div>
</section> 

<script>
$("#form_comment").on('submit',function(event){
  event.preventDefault();
  var formdata=new FormData(this);
    $.ajax({
        url:"<?php echo site_url()."blog/add_comment" ?>",
        type:"POST",
        processData:false,
        contentType:false,
        data:formdata,
        success:function(response){
            console.log(response);
            var temp=JSON.parse(response);
            if(temp['error'] == 0){
                alert(temp['msg']);
                $("#section")
            }else{
              alert(temp['msg']);
            }
        }
    });
})
</script>
