

<!-- footer section starts -->
<footer class="ftco-footer ftco-bg-dark ftco-section mt-5">
    <div class="container">
        <div class="row">
            <div class="col-md">
            <div class="ftco-footer-widget mb-4">
            <h2 class="ftco-heading-2">SCORERS INC.</h2>
            <p>
            Scorers is one of the India's most fastest growing unconventional, dynamic and young-spirited marketing & Advertising companies. We thrive to deliver excellence in service to both our clients and customers and today we are one of the fastest growing Marketing Organization. 
            </p>
            <p class="mt-4"><a href="<?php echo site_url()."about" ?>" class="btn btn-primary p-3">Get in touch</a></p>
            </div>
            </div>
            <div class="col-md">
            <div class="ftco-footer-widget mb-4 ml-md-5">
            <h2 class="ftco-heading-2">Events</h2>

            <ul class="list-unstyled">
            
            <marquee behavior="scroll" direction="up" onmouseover="this.stop()" onmouseout="this.start()">
            <?php foreach ($events as $value): ?>
            <li><a href="<?php echo site_url()."events" ?>" class="py-2 d-block"><?php echo $value->topic; ?></a></li>
            <?php endforeach;?>
            </marquee>
            
            </ul>
            </div>
            </div>
          

            <div class="col-md">
            <div class="ftco-footer-widget mb-4">
            <h2 class="ftco-heading-2">News Letter</h2>
            <p>Subcribe us to get our latest events</p>
            <form id="form_subscriber" method="post">
            <div class="form-group">
                <input type="email" class='form-control' name="email" placeholder="Email" required>
            </div>
            <div class="form-group">
                <input type="submit" class='btn btn-sm btn-danger' value="Subscribe Us">
            </div>
            </form>
            </div>
            </div>
            <div class="col-md">
            <div class="ftco-footer-widget mb-4">
            <div class="block-23 mb-3">
            <ul>
            <?php foreach ($contact as $value):?>
            <li><span class="icon icon-map-marker"></span><span class="text">
            <?php echo $value->address; ?>
            </span></li>
            <li><a href="#"><span class="icon icon-phone"></span><span class="text"><?php echo $value->phno; ?></span></a></li>
            <li><a href="#"><span class="icon icon-envelope"></span><span class="text "><?php echo $value->email; ?></span></a></li>
            <!-- <li><span class="icon icon-clock-o"></span><span class="text">Saturday &mdash; Sunday 8:00am - 5:00pm</span></li> -->
            </ul>
            </div>
            <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
            <li class="ftco-animate"><a href="<?php echo $value->twitter; ?>"><span class="icon-twitter"></span></a></li>
            <li class="ftco-animate"><a href="<?php echo $value->facebook; ?>"><span class="icon-facebook"></span></a></li>
            <li class="ftco-animate"><a href="<?php echo $value->instagram; ?>"><span class="icon-instagram"></span></a></li>
            <?php endforeach; ?>
            </ul>
            </div>
            </div>
            </div>
            <div class="row">
            <div class="col-md-12 text-center">
            <p>
            Copyright &copy;
            <script type="text/javascript">document.write(new Date().getFullYear());</script>
            All rights reserved | Developed by <a href="https://www.anjanainfotech.in/" target="_blank">Anjana Infotech</a>
            </p>
            </div>
        </div>
    </div>
</footer>
<!-- footer section ends -->

<!-- preloader -->
<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" /><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" /></svg></div>

<!-- scripts -->

<script src="<?php echo base_url(); ?>js/jquery-migrate-3.0.1.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>js/popper.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>js/jquery.easing.1.3.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>js/jquery.waypoints.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>js/jquery.stellar.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>js/owl.carousel.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>js/jquery.magnific-popup.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>js/aos.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>js/jquery.animateNumber.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>js/bootstrap-datepicker.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>js/scrollax.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>js/main.js" type="text/javascript"></script>
<script>
$("#form_subscriber").on('submit',function(event){
    event.preventDefault();
    var formdata=new FormData(this);
    $.ajax({
        url:"<?php echo site_url()."home/add_subscriber" ?>",
        type:"POST",
        processData:false,
        contentType:false,
        data:formdata,
        success:function(response)
        {
            console.log(response);
            var temp=JSON.parse(response);
            if(temp['error']==0){
                alert("Thank you for subscribing us !!");
                $("#form_subscriber").trigger('reset');
            }else{
                alert("Sorry !! Can't proceed your request. Kindly try again...");
            }
        }

    });
})
</script>
</body>
<!-- body section ends -->
</html>