<div class="content-page">
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Add Slideshow Image</h4>
                        <ol class="breadcrumb p-0 m-0">
                            <li>
                                <a href="#">Scorers</a>
                            </li>
                            <li>
                                <a href="#">Admin</a>
                            </li>
                            <li class="active">
                                    Slideshow
                            </li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>


            <!-- Slideshow Image Upload Form Container Starts -->
            <div class="row d-flex justify-content-center">
                <div class="col-md-10">
                    <form method="post" enctype="multipart/form-data" id="upload_image">
                        <div class="form-group">
                            <label for="image">Choose Image</label>
                            <input type="file" class="form-control" name='image' accept='.jpg' required>
                        </div>
                        <div class="form-group">
                            
                            <button type="submit" class='btn btn-primary btn-sm' id='upload_button'>Upload</button>
                            <img src="<?php echo base_url(); ?>images/pre.gif" alt="scorer ajax preloadr" height="32" width="32" id="ajax_preloader" class='invisible'>
                        </div>
                    </form>
                </div>
            </div>
            <!-- Slideshow Image Upload Form Container Ends -->



            <!-- Slideshow Image List Table Container Starts -->
            <div class="row d-flex justify-content-center mt-3">
                <div class="col-md-10" id='table_container'>

                    <table class="table table-light" id='table'>
                        <thead class="thead-light">
                            <tr>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                foreach ($slideshow as $value):
                            ?>
                            <tr>
                                <td>

                                <img src="<?php echo base_url().$value->image ?>" alt="scorers slideshow image" height="192" width="192">

                                </td>
                                <td>
                                    <?php
                                        if($value -> status == 0){
                                    ?>
                                        <button class='btn btn-danger btn-sm' onclick="change_status('<?php echo $value->id ?>','1')" >Disabled</button>
                                    <?php
                                    }
                                    else{?>
                                    <button class='btn btn-success btn-sm' onclick="change_status('<?php echo $value->id ?>','0')" >Enabled</button>
                                    <?php
                                    
                                    }?>
                                    <button class='btn btn-danger btn-sm' onclick="delete_image('<?php echo $value->id ?>','<?php echo $value->image ?>')" >Delete</button>
                                </td>
                            </tr>
                            <?php
                            endforeach;
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- Slideshow Image List Table Container Ends -->
            

        </div>
    </div>
</div>

<script>
$("#upload_image").on('submit',function(event){
    event.preventDefault();
    var formData=new FormData(this);
    $.ajax({
        url:"<?php echo site_url()."admin/Slideshow/slideshow_add" ?>",
        type:"POST",
        processData:false,
        contentType:false,
        data:formData,
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
        success:function(response)
        {
            console.log(response);
            var temp=JSON.parse(response);
            console.log(temp);
            if(temp['error'] == 0){
                $("#upload_image").trigger('reset');
                swal("Success",temp['msg'],'success');
                $("#table_container").load('<?php echo site_url()."admin/slideshow/" ?>  #table');
            }else{
                swal("Error",temp['msg'],'error');
            }
        }
    });
});

function change_status(id,status){
    var formdata=new FormData();
    formdata.append('id',id);
    formdata.append('status',status);
    $.ajax({
        url:"<?php echo site_url()."admin/Slideshow/slideshow_status" ?>",
        type:"POST",
        processData:false,
        contentType:false,
        data:formdata,
        success:function(response)
        {
            console.log(response);
            var temp=JSON.parse(response);
            console.log(temp);
            if(temp['error'] == 0){
                swal("Success",temp['msg'],'success');
                $("#table_container").load('<?php echo site_url()."admin/slideshow/" ?>  #table');
            }else{
                swal("Error",temp['msg'],'error');
            }
        }
    });
}

function delete_image(id,path){
    var formdata=new FormData();
    formdata.append("id",id);
    formdata.append("path",path);
    $.ajax({
        url:"<?php echo site_url()."admin/Slideshow/slideshow_delete" ?>",
        type:"POST",
        processData:false,
        contentType:false,
        data:formdata,
        success:function(response)
        {
            console.log(response);
            var temp=JSON.parse(response);
            console.log(temp);
            if(temp['error'] == 0){
                swal("Success",temp['msg'],'success');
                $("#table_container").load('<?php echo site_url()."admin/slideshow/" ?>  #table');
            }else{
                swal("Error",temp['msg'],'error');
            }
        }
    });
}
</script>
