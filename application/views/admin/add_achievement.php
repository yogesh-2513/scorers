<div class="content-page">
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Add Achievement</h4>
                        <ol class="breadcrumb p-0 m-0">
                            <li>
                                <a href="#">Scorers</a>
                            </li>
                            <li>
                                <a href="#">Admin</a>
                            </li>
                            <li class="active">
                                Achievement
                            </li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>


            <!-- Achievement Content Upload Form Container Starts -->
            <div class="row d-flex justify-content-center">
                <div class="col-md-8">
                    <form method="post" enctype="multipart/form-data" id="add_achievement">
                        <div class="form-group">
                            <label for="image">Choose Image</label>
                            <input type="file" class="form-control" name='image' accept='.jpg' required>
                        </div>
                        <div class="form-group">
                            <label for="topic">Topic</label>
                            <input type="text" class="form-control" name='topic' required>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class='summernote' name="description"cols="30" rows="5" required>
                            </textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class='btn btn-primary btn-sm' id='upload_button'>Add</button>
                            <img src="<?php echo base_url(); ?>images/pre.gif" alt="scorer ajax preloadr" height="32" width="32" id="ajax_preloader" class='invisible'>
                        </div>
                    </form>
                </div>
            </div>
            <!-- Achievement Content Upload Form Container Ends -->



            <!-- Achievement content Table Container Starts -->
            <div class="row d-flex justify-content-center mt-5">
                <div class="col-md-8" id='table_container'>

                <table class="table table-light" id='table'>
                        <thead class="thead-light">
                            <tr>
                                <th>Image</th>
                                <th>Topic</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                foreach ($achievement as $value):
                            ?>
                            <tr>
                                <td>

                                <img src="<?php echo base_url().$value->image ?>" alt="scorers achievement image" height="192" width="192">

                                </td>
                                <td>
                                <?php echo $value->topic ?>
                                <td>
                                <?php echo $value->description ?>
                                </td>
                                </td>
                                <td>
                                    <a class='btn btn-warning btn-sm' href="<?php echo site_url()."admin/achievement/edit/".$value->id; ?>" >Edit</a>
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
                                    <button class='btn btn-danger btn-sm' onclick="delete_content('<?php echo $value->id ?>','<?php echo $value->image ?>')" >Delete</button>
                                </td>
                            </tr>
                            <?php
                            endforeach;
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
<!-- Achievement content Table Container Ends -->


        </div>
    </div>
</div>

<script>
$("#add_achievement").on('submit',function(event){
    event.preventDefault();
    var formdata=new FormData(this);
    $.ajax({
        url:'<?php echo site_url()."admin/achievement/add_achievement_content" ?>',
        type:"POST",
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
        success:function(response){
            console.log(response);
            var temp=JSON.parse(response);
            console.log(temp);
            
            if(temp['error'] == 0){
                $("#add_achievement").trigger('reset');
                $(".summernote").summernote('code','');
                swal("Success",temp['msg'],'success');
                
                $("#table_container").load('<?php echo site_url()."admin/achievement/" ?>  #table');
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
        url:"<?php echo site_url()."admin/achievement/change_status" ?>",
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
                $("#table_container").load('<?php echo site_url()."admin/achievement/" ?>  #table');
            }else{
                swal("Error",temp['msg'],'error');
            }
        }
    });
}
function delete_content(id,path){
    var formdata=new FormData();
    formdata.append('id',id);
    formdata.append('path',path);
    $.ajax({
        url:"<?php echo site_url()."admin/achievement/delete_achievement" ?>",
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
                $("#table_container").load('<?php echo site_url()."admin/achievement/" ?>  #table');
            }else{
                swal("Error",temp['msg'],'error');
            }
        }
    });
}
</script>
