<div class="content-page">
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Edit Blog</h4>
                        <ol class="breadcrumb p-0 m-0">
                            <li>
                                <a href="#">Scorers</a>
                            </li>
                            <li>
                                <a href="#">Admin</a>
                            </li>
                            <li class="active">
                                Blog
                            </li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>


            <!-- Blog Upload Form Container Starts -->
            <div class="row d-flex justify-content-center">
                <div class="col-md-10">
                    <form method="post" enctype="multipart/form-data" id="form_edit_blog">

                        <?php
                            foreach ($edit_blog as $value):
                        ?>
                        <input type="hidden" name="id" value="<?php echo $value->id; ?>">
                        <input type="hidden" name="old_image" value="<?php echo $value->image; ?>">
                        <div class="form-group">
                            <label for="image">Choose Image</label>
                            <input type="file" class="form-control" name='image' accept='.jpg'>
                        </div>
                        <div class="form-group">
                            <label for="topic">Blog Topic</label>
                            <input type="text" class="form-control" name='topic' value="<?php echo $value->topic; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Blog Description</label>
                            <textarea name="description" class='summernote' cols="30" rows="5" requirede>
                            <?php echo $value->description; ?>
                            </textarea>
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
            <!-- Blog Upload Form Container Ends -->



            <!-- Blog List Table Container Starts -->
            <div class="row d-flex justify-content-center mt-3">
                <div class="col-md-10" id='table_container'>

                    <table class="table table-light" id='table'>
                        <thead class="thead-light">
                            <tr>
                                <th>Blog Image</th>
                                <th>Topic</th>
                                <th>Blog Description</th>
                                <th>Action</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                foreach ($blog as $value):
                            ?>
                            <tr>
                                <td>

                                <img src="<?php echo base_url().$value->image ?>" alt="scorers blogs images" height="192" width="192">

                                </td>
                                <td>
                                    <?php echo $value->topic; ?>
                                </td>
                                <td>
                                    <?php echo $value->description; ?>
                                </td>
                                <td>
                                    <a class='btn btn-warning btn-sm' href="<?php echo site_url()."admin/blog/edit/".$value->id; ?>">Edit</a>
                                    
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
                                    <button class='btn btn-danger btn-sm' onclick="delete_blog('<?php echo $value->id ?>','<?php echo $value->image ?>')" >Delete</button>
                                </td>
                            </tr>
                            <?php
                            endforeach;
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- Blog List Table Container Ends -->
            

        </div>
    </div>
</div>



<script>

$("#form_edit_blog").on('submit',function(event){
    event.preventDefault();
    var formdata=new FormData(this);
    $.ajax({
        url:"<?php echo site_url().'admin/blog/do_edit_blog' ?>",
        type:'POST',
        data:formdata,
        processData:false,
        contentType:false,
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
                $("#form_edit_blog").trigger('reset');
                $(".summernote").summernote('code','');
                swal("Success",temp['msg'],'success');
                $("#table_container").load('<?php echo site_url()."admin/blog/" ?>  #table');
            }else{
                swal("Error",temp['msg'],'error');
            }
        }
    })
})


function change_status(id,status){
    var formdata=new FormData();
    formdata.append('id',id);
    formdata.append('status',status);
    $.ajax({
        url:"<?php echo site_url().'admin/blog/change_status' ?>",
        type:'POST',
        data:formdata,
        processData:false,
        contentType:false,
        success:function(response)
        {
            console.log(response);
            var temp=JSON.parse(response);
            console.log(temp);
            if(temp['error'] == 0){
                $("#form_edit_blog").trigger('reset');
                swal("Success",temp['msg'],'success');
                $("#table_container").load('<?php echo site_url()."admin/blog/" ?>  #table');
            }else{
                swal("Error",temp['msg'],'error');
            }
        }
    })
}


function delete_blog(id,path){
    var formdata=new FormData();
    formdata.append('id',id);
    formdata.append('path',path);
    $.ajax({
        url:"<?php echo site_url().'admin/blog/delete_blog' ?>",
        type:'POST',
        data:formdata,
        processData:false,
        contentType:false,
        success:function(response)
        {
            console.log(response);
            var temp=JSON.parse(response);
            console.log(temp);
            if(temp['error'] == 0){
                $("#form_edit_blog").trigger('reset');
                swal("Success",temp['msg'],'success');
                $("#table_container").load('<?php echo site_url()."admin/blog/" ?>  #table');
            }else{
                swal("Error",temp['msg'],'error');
            }
        }
    })
}

</script>
