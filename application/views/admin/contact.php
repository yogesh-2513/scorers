<div class="content-page">
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Add Contact Details</h4>
                        <ol class="breadcrumb p-0 m-0">
                            <li>
                                <a href="#">Scorers</a>
                            </li>
                            <li>
                                <a href="#">Admin</a>
                            </li>
                            <li class="active">
                                Contact
                            </li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>


            <!-- Contact Form Container Starts -->
            <div class="row d-flex justify-content-center" >
                <div class="col-md-10" >
                    <form method="post" enctype="multipart/form-data" id="form_contact">
                        <?php
                            foreach ($contact as $value):
                        ?>
                        <div class="form-group">
                            <label for="sitemap">Sitemap</label>
                            <textarea name="sitemap" class='summernote' cols="30" rows="5">
                            <?php echo $value->sitemap; ?>
                            </textarea>
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <textarea name="address" class='summernote' cols="30" rows="5">
                            <?php echo $value->address; ?>
                            </textarea>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name='email' class="form-control" value=<?php echo $value->email; ?>>
                        </div>
                        <div class="form-group">
                            <label for="phonenumber">Phone Number</label>
                            <input type="text" name='phno' class="form-control" value=<?php echo $value->phno; ?>>
                        </div>
                        <div class="form-group">
                            <label for="facebook">Facebook</label>
                            <input type="text" name='facebook' class="form-control" value=<?php echo $value->facebook; ?>>
                        </div>
                        <div class="form-group">
                            <label for="twitter">Twitter</label>
                            <input type="text" name='twitter' class="form-control" value=<?php echo $value->twitter; ?>>
                        </div>
                        <div class="form-group">
                            <label for="instagram">Instagram</label>
                            <input type="text" name='instagram' class="form-control" value=<?php echo $value->instagram; ?>>
                        </div>
                        
                        <div class="form-group">
                            <button type="submit" class='btn btn-primary btn-sm' id='upload_button'>Save</button>
                            <img src="<?php echo base_url(); ?>images/pre.gif" alt="scorer ajax preloadr" height="32" width="32" id="ajax_preloader" class='invisible'>
                        </div>
                        <?php
                        endforeach;
                        ?>
                    </form>
                </div>
            </div>
            <!-- Contact Form Container Ends -->

        </div>
    </div>
</div>


<script>

$("#form_contact").on('submit',function(e){
    e.preventDefault();
    var formdata=new FormData(this);
    $.ajax({
        url:"<?php echo site_url()."admin/contact/add" ?>",
        type:"POST",
        data:formdata,
        contentType:false,
        processData:false,
        beforeSend:function(){
            $("#ajax_preloader").removeClass('invisible');
            $("#ajax_preloader").addClass('visible');
            $("#upload_button").attr('disabled',true);
        },
        complete:function(){
            $("#ajax_preloader").addClass('invisible');
            $("#ajax_preloader").removeClass('visible');
            $("#upload_button").attr('disabled',false);
        },
        success:function(response){
            console.log(response);
            var temp=JSON.parse(response);
            console.log(temp);
            if(temp['error'] == 0){
                swal("Success",temp['msg'],'success').then(location.reload());
            }else{
                swal("Error",temp['msg'],'error');
            }
        }
    });
})


</script>