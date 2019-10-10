<div class="content-page">
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Add Service</h4>
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


            <!-- Service Add Container Starts -->
            <div class="row d-flex justify-content-center" >
                <div class="col-md-10" >
                    <form method="post" enctype="multipart/form-data" id="form_add_service">
                        <div class="form-goup">
                            <label for="category">Category</label>
                            <select name="category" class='form-control'  required>
                                <option value="" style="display:none">Choose Category</option>
                                <?php
                                    foreach ($category as $value):
                                ?>
                                <option value="<?php echo $value->id; ?>">
                                    <?php echo $value->category; ?>
                                </option>
                                <?php
                                    endforeach;
                                ?>
                            </select> 
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" class='summernote' cols="30" rows="5" required>
                            </textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class='btn btn-primary btn-sm' id='upload_button'>Add</button>
                            <img src="<?php echo base_url(); ?>images/pre.gif" alt="scorer ajax preloadr" height="32" width="32" id="ajax_preloader" class='invisible'>
                        </div>
                    </form>
                </div>
            </div>
            <!-- Service Add Container Ends -->

              <!-- Service Content Table Container Starts -->
              <div class="row d-flex justify-content-center mt-5">
                <div class="col-md-10" id='table_container'>

                <table class="table table-light" id='table'>
                        <thead class="thead-light">
                            <tr>
                                <th>Category ID</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                foreach ($service as $value):
                            ?>
                            <tr>
                            
                                <td>
                                <?php echo $value->cat_id ?>
                                <td>
                                <?php echo $value->description ?>
                                </td>
                                </td>
                                <td>
                                    <a class='btn btn-warning btn-sm' href="<?php echo site_url()."admin/service/edit_service/".$value->id ?>" >Edit</a>
                                    <?php
                                        if($value -> status == 0){
                                    ?>
                                        <button class='btn btn-danger btn-sm' onclick="change_service_status('<?php echo $value->id ?>','1')" >Disabled</button>
                                    <?php
                                    }
                                    else{?>
                                    <button class='btn btn-success btn-sm' onclick="change_service_status('<?php echo $value->id ?>','0')" >Enabled</button>
                                    <?php
                                    
                                    }?>
                                    <button class='btn btn-danger btn-sm' onclick="delete_service('<?php echo $value->id ?>')" >Delete</button>
                                </td>
                            </tr>
                            <?php
                            endforeach;
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
<!-- Service Content Table Container Ends -->

        </div>
    </div>
</div>


<script>

$("#form_add_service").on('submit',function(e){
    e.preventDefault();
    var formdata=new FormData(this);
    $.ajax({
        url:"<?php echo site_url().'admin/service/do_add_service' ?>",
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
                swal("Success",temp['msg'],'success');
                $(".summernote").summernote('code','');
                $("#table_container").load('<?php echo site_url()."admin/service/add_service" ?>  #table');
            }else{
                swal("Error",temp['msg'],'error');
            }
        }
    });
})

function change_service_status(id,status){
    var formdata=new FormData();
    formdata.append('id',id);
    formdata.append('status',status);
    $.ajax({
        url:'<?php echo site_url()."admin/service/change_service_status" ?>',
        type:"POST",
        data:formdata,
        processData:false,
        contentType:false,
        success:function(response){
            console.log(response);
            var temp=JSON.parse(response);
            console.log(temp);
            if(temp['error'] == 0){
                $("#form_add_member").trigger('reset');
                swal("Success",temp['msg'],'success');
                $("#table_container").load('<?php echo site_url()."admin/service/add_service" ?>  #table');
            }else{
                swal("Error",temp['msg'],'error');
            }
        }
    });

}

function delete_service(id){
    var formdata=new FormData();
    formdata.append('id',id);

    $.ajax({
        url:'<?php echo site_url()."admin/service/delete_service" ?>',
        type:"POST",
        data:formdata,
        processData:false,
        contentType:false,
        success:function(response){
            console.log(response);
            var temp=JSON.parse(response);
            console.log(temp);
            if(temp['error'] == 0){
                $("#form_add_member").trigger('reset');
                swal("Success",temp['msg'],'success');
                $("#table_container").load('<?php echo site_url()."admin/service/add_service" ?>  #table');
            }else{
                swal("Error",temp['msg'],'error');
            }
        }
    });
}
</script>