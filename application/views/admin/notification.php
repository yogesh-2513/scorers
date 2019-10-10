<div class="content-page">
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Send Notification</h4>
                        <ol class="breadcrumb p-0 m-0">
                            <li>
                                <a href="#">Scorers</a>
                            </li>
                            <li>
                                <a href="#">Admin</a>
                            </li>
                            <li class="active">
                                Notification
                            </li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>


            <!-- Career Content Form Container Starts -->
            <div class="row d-flex justify-content-center">
                <div class="col-md-10">
                    <form method="post" enctype="multipart/form-data" id="form_notification">
                        <div class="form-group">
                            <label for="topic">Subject</label>
                            <input type="text" name='subject' class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="topic">Message</label>
                            <textarea name="message" class='form-conrtol summernote' cols="30" rows="5">
                            </textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class='btn btn-primary btn-sm' id='upload_button'>Send</button>
                            <img src="<?php echo base_url(); ?>images/pre.gif" alt="scorer ajax preloadr" height="32" width="32" id="ajax_preloader" class='invisible'>
                        </div>
                    </form>
                </div>
            </div>
            <!-- Career Content Form Container Ends -->
        </div>
    </div>
</div>


<script>

$("#form_notification").on('submit',function(e){
    e.preventDefault();
    var formdata=new FormData(this);
    $.ajax({
        url:"<?php echo site_url()."admin/notification/send" ?>",
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
                $("#form_notification").trigger('reset');
                $(".summernote").summernote('code','');
                swal("Success",temp['msg'],'success');
            }else{
                swal("Error",temp['msg'],'error');
            }
        }
    });
})


</script>

