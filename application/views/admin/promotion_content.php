<div class="content-page">
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Add Promotion Content</h4>
                        <ol class="breadcrumb p-0 m-0">
                            <li>
                                <a href="#">Scorers</a>
                            </li>
                            <li>
                                <a href="#">Admin</a>
                            </li>
                            <li class="active">
                                Promotion
                            </li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>


            <!-- Promotion Upload Form Container Starts -->
            <div class="row d-flex justify-content-center">
                <div class="col-md-10">
                    <form method="post" id="form_promotion_content" enctype='multipart/form-data'>
                        <div class="form-group">
                            <label for="promotion">Promotion</label>
                            <select name="promotion"  class="form-control" required>
                                <option value="" style="display:none">Choose Promotion</option>
                                <?php
                                    foreach ($promotion as $value):
                                ?>
                                    <option value="<?php echo $value->id; ?>">
                                    <?php echo $value->promotion; ?>
                                    </option>
                                <?php
                                    endforeach;
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" class='summernote' cols="30" rows="5">
                            </textarea>
                        </div>
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" name="image" class='form-control' required>
                        </div>
                        <div class="form-group">
                            
                            <button type="submit" class='btn btn-primary btn-sm' id='upload_button'>Add</button>
                            <img src="<?php echo base_url(); ?>images/pre.gif" alt="scorer ajax preloadr" height="32" width="32" id="ajax_preloader" class='invisible'>
                        </div>
                    </form>
                </div>
            </div>
            <!-- Promotion Upload Form Container Ends -->



            <!-- Promotion List Table Container Starts -->
            <div class="row d-flex justify-content-center mt-3">
                <div class="col-md-10" id='table_container'>

                    <table class="table table-light" id='table'>
                        <thead class="thead-light">
                            <tr>
                                <th>Promotion ID</th>
                                <th>Image</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                foreach ($promotion_content as $value):
                            ?>
                            <tr>
                                <td>
                                <?php
                                    echo $value->pro_id;
                                ?>
                                </td>
                                <td>
                                <img src="<?php
                                    echo base_url().$value->image;
                                ?>" alt="scorer promotion images" width="172" height="172">
                                </td>

                                <td>
                                <?php
                                    echo $value->description;
                                ?>
                                </td>
                                
                                <td>
                                    <a class='btn btn-warning btn-sm' href="<?php echo site_url()."admin/promotion/edit_promotion_content/".$value->id; ?>">Edit</a>
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
                                    <button class='btn btn-danger btn-sm' onclick="delete_promotion_content('<?php echo $value->id ?>','<?php echo $value->image ?>')" >Delete</button>
                                </td>
                            </tr>
                            <?php
                            endforeach;
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- Promotion List Table Container Ends -->
            

        </div>
    </div>
</div>

<script>
$("#form_promotion_content").on('submit',function(event){
    event.preventDefault();
    var formdata=new FormData(this);
    $.ajax({
        url:"<?php echo site_url()."admin/promotion/add_promotion_content" ?>",
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
                $("#form_promotion_content").trigger('reset');
                swal("Success",temp['msg'],'success');
                $(".summernote").summernote('code','');
                $("#table_container").load('<?php echo site_url()."admin/promotion/add_content" ?>  #table');
            }else{
                swal("Error",temp['msg'],'error');
            }
        }
    });
});

function delete_promotion_content(id){
    var formdata=new FormData();
    formdata.append('id',id);
    $.ajax({
        url:"<?php echo site_url()."admin/promotion/delete_promotion_content" ?>",
        type:"POST",
        data:formdata,
        contentType:false,
        processData:false,
        success:function(response){
            console.log(response);
            var temp=JSON.parse(response);
            console.log(temp);
            if(temp['error'] == 0){
                swal("Success",temp['msg'],'success');
                $("#table_container").load('<?php echo site_url()."admin/promotion/add_content" ?>  #table');
            }else{
                swal("Error",temp['msg'],'error');
            }
        }
    });
}


function change_status(id,status){
    var formdata=new FormData();
    formdata.append('id',id);
    formdata.append('status',status);
    $.ajax({
        url:"<?php echo site_url()."admin/promotion/content_status_change" ?>",
        type:"POST",
        data:formdata,
        contentType:false,
        processData:false,
        success:function(response){
            console.log(response);
            var temp=JSON.parse(response);
            console.log(temp);
            if(temp['error'] == 0){
                swal("Success",temp['msg'],'success');
                $("#table_container").load('<?php echo site_url()."admin/promotion/add_content" ?>  #table');
            }else{
                swal("Error",temp['msg'],'error');
            }
        }
    });
}
</script>