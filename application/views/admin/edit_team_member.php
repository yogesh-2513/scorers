<div class="content-page">
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Edit Team Member</h4>
                        <ol class="breadcrumb p-0 m-0">
                            <li>
                                <a href="#">Scorers</a>
                            </li>
                            <li>
                                <a href="#">Admin</a>
                            </li>
                            <li class="active">
                                Add Member
                            </li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>


            <!-- Add Team Member Form Container Starts -->
            <div class="row d-flex justify-content-center">
                <div class="col-md-8">
                    <form method="post" enctype="multipart/form-data" id="form_edit_member">
                        <?php
                            foreach ($edit_member as $value):
                        ?>
                        <input type="hidden" name='id' value='<?php echo $value->id ?>'>
                        <input type="hidden" name='old_image' value='<?php echo $value->profile ?>'>
                        <div class="form-group">
                            <label for="image">Profile</label>
                            <input type="file" class="form-control" name='image' accept='.jpg' >
                        </div>
                        <div class="form-group">
                            <label for="topic">Name</label>
                            <input type="text" class="form-control" name='name' value="<?php echo $value->name ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="topic">Designation</label>
                            <input type="text" class="form-control" name='designation' value="<?php echo $value->designation ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class='summernote' name="description"cols="30" rows="5" required>
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
            <!-- Add Team Member Form Container Ends -->



            <!-- Aboutus content Table Container Starts -->
            <div class="row d-flex justify-content-center mt-5">
                <div class="col-md-8" id='table_container'>

                <table class="table table-light" id='table'>
                        <thead class="thead-light">
                            <tr>
                                <th>Profile</th>
                                <th>Name</th>
                                <th>Designation</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                foreach ($team as $value):
                            ?>
                            <tr>
                                <td>

                                <img src="<?php echo base_url().$value->profile ?>" alt="scorers team member profile" height="192" width="192">

                                </td>
                                <td>
                                <?php echo $value->name ?>
                                <td>
                                <?php echo $value->designation ?>
                                </td>
                                <td>
                                <?php echo $value->description ?>
                                </td>
                                </td>
                                <td>
                                    <a class='btn btn-warning btn-sm' href="<?php echo site_url()."admin/about/edit_member/".$value->id ?>" >Edit</a>
                                    <?php
                                        if($value -> status == 0){
                                    ?>
                                        <button class='btn btn-danger btn-sm' onclick="change_member_status('<?php echo $value->id ?>','1')" >Disabled</button>
                                    <?php
                                    }
                                    else{?>
                                    <button class='btn btn-success btn-sm' onclick="change_member_status('<?php echo $value->id ?>','0')" >Enabled</button>
                                    <?php
                                    
                                    }?>
                                    <button class='btn btn-danger btn-sm' onclick="delete_member('<?php echo $value->id ?>','<?php echo $value->profile ?>')" >Delete</button>
                                </td>
                            </tr>
                            <?php
                            endforeach;
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
<!-- Aboutus content Table Container Ends -->


        </div>
    </div>
</div>

<script>
$("#form_edit_member").on('submit',function(event){
    event.preventDefault();
    var formdata=new FormData(this);
    $.ajax({
        url:'<?php echo site_url()."admin/about/edit_team_member" ?>',
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
                $("#form_edit_member").trigger('reset');
                swal("Success",temp['msg'],'success');
                $(".summernote").summernote('code','');
                $("#table_container").load('<?php echo site_url()."admin/about/add_team_members" ?>  #table');
            }else{
                swal("Error",temp['msg'],'error');
            }
        }
    });
});
function change_member_status(id,status){
    var formdata=new FormData();
    formdata.append('id',id);
    formdata.append('status',status);
    $.ajax({
        url:'<?php echo site_url()."admin/about/change_member_status" ?>',
        type:"POST",
        data:formdata,
        processData:false,
        contentType:false,
        success:function(response){
            console.log(response);
            var temp=JSON.parse(response);
            console.log(temp);
            if(temp['error'] == 0){
                $("#form_edit_member").trigger('reset');
                swal("Success",temp['msg'],'success');
                $("#table_container").load('<?php echo site_url()."admin/about/add_team_members" ?>  #table');
            }else{
                swal("Error",temp['msg'],'error');
            }
        }
    });

}

function delete_member(id,profile){
    var formdata=new FormData();
    formdata.append('id',id);
    formdata.append('profile',profile);
    $.ajax({
        url:'<?php echo site_url()."admin/about/delete_member" ?>',
        type:"POST",
        data:formdata,
        processData:false,
        contentType:false,
        success:function(response){
            console.log(response);
            var temp=JSON.parse(response);
            console.log(temp);
            if(temp['error'] == 0){
                $("#form_edit_member").trigger('reset');
                swal("Success",temp['msg'],'success');
                $("#table_container").load('<?php echo site_url()."admin/about/add_team_members" ?>  #table');
            }else{
                swal("Error",temp['msg'],'error');
            }
        }
    });
}

</script>
