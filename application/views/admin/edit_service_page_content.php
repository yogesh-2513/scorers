<div class="content-page">
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Edit Service Page Content</h4>
                        <ol class="breadcrumb p-0 m-0">
                            <li>
                                <a href="#">Scorers</a>
                            </li>
                            <li>
                                <a href="#">Admin</a>
                            </li>
                            <li class="active">
                                Service
                            </li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>


            <!-- Service page content Upload Form Container Starts -->
            <div class="row d-flex justify-content-center">
                <div class="col-md-10">
                    <form method="post" enctype="multipart/form-data" id="form_edit_service_page_content">

                        <?php
                            foreach ($edit_page_content as $value):
                        ?>
                        <input type="hidden" name="id" value="<?php echo $value->id; ?>">
                        <div class="form-group">
                            <label for="topic">Content Topic</label>
                            <input type="text" class="form-control" name='topic'required value="<?php echo $value->topic ?>">
                        </div>
                        <div class="form-group">
                            <label for="description">Content Description</label>
                            <textarea name="description" class='summernote' cols="30" rows="5" requirede>
                            <?php echo $value->description ?>
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
            <!-- Service page content Upload Form Container Ends -->



            <!-- Service page contents Table Container Starts -->
            <div class="row d-flex justify-content-center mt-3">
                <div class="col-md-10" id='table_container'>

                    <table class="table table-light" id='table'>
                        <thead class="thead-light">
                            <tr>
                                <th>Content Topic</th>
                                <th>Description</th>
                                <th>Action</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                foreach ($page_content as $value):
                            ?>
                            <tr>
                                <td>
                                    <?php echo $value->topic; ?>
                                </td>
                                <td>
                                    <?php echo $value->description; ?>
                                </td>
                                <td>
                                    <a class='btn btn-warning btn-sm' href="<?php echo site_url()."admin/service/edit_page_content/".$value->id; ?>">Edit</a>
                                    
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
                                    <button class='btn btn-danger btn-sm' onclick="delete_content('<?php echo $value->id ?>')" >Delete</button>
                                </td>
                            </tr>
                            <?php
                            endforeach;
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- Service page contents Table Container Ends -->
            

        </div>
    </div>
</div>



<script>

$("#form_edit_service_page_content").on('submit',function(event){
    event.preventDefault();
    var formdata=new FormData(this);
    $.ajax({
        url:"<?php echo site_url().'admin/service/do_edit_page_content' ?>",
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
                $("#form_edit_service_page_content").trigger('reset');
                swal("Success",temp['msg'],'success');
                $(".summernote").summernote('code','');
                $("#table_container").load('<?php echo site_url()."admin/service/service_page_content" ?>  #table');
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
        url:"<?php echo site_url().'admin/service/change_content_status' ?>",
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
                $("#form_edit_service_page_content").trigger('reset');
                swal("Success",temp['msg'],'success');
                $("#table_container").load('<?php echo site_url()."admin/service/service_page_content" ?>  #table');
            }else{
                swal("Error",temp['msg'],'error');
            }
        }
    })
}


function delete_content(id){
    var formdata=new FormData();
    formdata.append('id',id);
    $.ajax({
        url:"<?php echo site_url().'admin/service/delete_content' ?>",
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
                $("#form_edit_service_page_content").trigger('reset');
                swal("Success",temp['msg'],'success');
                $("#table_container").load('<?php echo site_url()."admin/service/service_page_content" ?>  #table');
            }else{
                swal("Error",temp['msg'],'error');
            }
        }
    })
}

</script>
