<div class="content-page">
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Edit Events</h4>
                        <ol class="breadcrumb p-0 m-0">
                            <li>
                                <a href="#">Scorers</a>
                            </li>
                            <li>
                                <a href="#">Admin</a>
                            </li>
                            <li class="active">
                                Events
                            </li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>


            <!-- Career Content Form Container Starts -->
            <div class="row d-flex justify-content-center">
                <div class="col-md-10">
                    <form method="post" enctype="multipart/form-data" id="form_edit_event">
                    <?php foreach ($edit_event as $key => $value):?>
                        <input type="hidden" name="id" value="<?php echo $value->id; ?>">
                        <input type="hidden" name="old_image" value="<?php echo $value->image; ?>">
                        <div class="form-group">
                            <label for="topic">Choose Image</label>
                            <input type="file" name='image' class="form-control" accept=".jpg">
                        </div>
                        <div class="form-group">
                            <label for="topic">Topic</label>
                            <input type="text" name='topic' class="form-control" required value="<?php echo $value->topic; ?>">
                        </div>
                        <div class="form-group">
                            <label for="date">Date</label>
                            <input type="text" name='date' class="form-control" id='date' placeholder="YYYY/MM/DD" required value="<?php echo $value->date; ?>">
                        </div>
                        <div class="form-group">
                            <label for="time">Time</label>
                            <input type="text" name='time' class="form-control" id='time' placeholder="HH:MM:SS" required value="<?php echo $value->time; ?>">
                        </div>
                        <div class="form-group">
                            <label for="location">Location</label>
                            <input type="location" name='location' class="form-control" value="<?php echo $value->location; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="topic">Description</label>
                            <textarea name="description" class='form-conrtol summernote' cols="30" rows="5" required>
                            <?php echo $value->description; ?>
                            </textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class='btn btn-primary btn-sm' id='upload_button'>Save</button>
                            <img src="<?php echo base_url(); ?>images/pre.gif" alt="scorer ajax preloadr" height="32" width="32" id="ajax_preloader" class='invisible'>
                        </div>
                    <?php endforeach; ?>
                    </form>
                </div>
            </div>
            <!-- Career Content Form Container Ends -->



            <!-- Career Content List Table Container Starts -->
            <div class="row d-flex justify-content-center mt-3">
                <div class="col-md-10" id='table_container'>

                    <table class="table table-light" id='table'>
                        <thead class="thead-light">
                            <tr>
                                <th>Topic</th>
                                <th>Image</th>
                                <th>Time</th>
                                <th>Location</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                foreach ($events as $value):
                            ?>
                            <tr>
                                <td>

                                <?php echo $value->topic ?>

                                </td>
                                <td>

                                <img src="<?php echo base_url().$value->image; ?>" alt="scorers events images" height="152" width="152">

                                </td>
                                <td>
                                <?php echo $value->date.' '.$value->time ?>
                                </td>
                                <td>
                                <?php echo $value->location; ?>
                                </td>
                                <td>
                                <?php echo $value->description ?>
                                </td>
                                <td>  
                                    <a href="<?php echo site_url()."admin/events/edit_event/".$value->id; ?>" class='btn btn-warning btn-sm'>Edit</a>
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
                                    <button class='btn btn-danger btn-sm' onclick="delete_event('<?php echo $value->id ?>','<?php echo $value->image ?>')" >Delete</button>
                                </td>
                            </tr>
                            <?php
                            endforeach;
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- Career Content List Table Container Ends -->
        </div>
    </div>
</div>


<script>

$(document).ready(function(){
    let date=document.getElementById('date');
    let time=document.getElementById('time');
    var pickerDate = new Picker(date, {
        format: 'YYYY-MM-DD',
    });
    var pickerTime = new Picker(time, {
        format: 'HH:mm:ss',
    });

})


$("#form_edit_event").on('submit',function(e){
    e.preventDefault();
    var formdata=new FormData(this);
    $.ajax({
        url:"<?php echo site_url()."admin/events/do_edit_event" ?>",
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
                $("#form_edit_event").trigger('reset');
                $(".summernote").summernote('code','');
                swal("Success",temp['msg'],'success');
                $("#table_container").load('<?php echo site_url()."admin/events/" ?>  #table');
            }else{
                swal("Error",temp['msg'],'error');
            }
        }
    });
})


function change_status(id,status){
    var formdata=new FormData();
    formdata.append('id',id);
    formdata.append('status',status);
    $.ajax({
        url:"<?php echo site_url()."admin/events/change_status" ?>",
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
                $("#table_container").load('<?php echo site_url()."admin/events/" ?>  #table');
            }else{
                swal("Error",temp['msg'],'error');
            }
        }
    });
}

function delete_event(id,path){
    var formdata=new FormData();
    formdata.append('id',id);
    formdata.append('path',path);
    $.ajax({
        url:"<?php echo site_url()."admin/events/delete_event" ?>",
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
                $("#table_container").load('<?php echo site_url()."admin/events/" ?>  #table');
            }else{
                swal("Error",temp['msg'],'error');
            }
        }
    });
}

</script>