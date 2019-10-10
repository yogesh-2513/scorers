<div class="content-page">
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Edit Promotion</h4>
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


            <!-- Slideshow Image Upload Form Container Starts -->
            <div class="row d-flex justify-content-center">
                <div class="col-md-10">
                    <form method="post" id="form_edit_promotion">
                        <?php 
                            foreach ($edit_promotion as $value):
                        ?>
                        <input type="hidden" name="id" value="<?php echo $value->id; ?>">
                        <div class="form-group">
                            <label for="promotion">Promotion</label>
                            <input type="text" class="form-control" name='promotion' value="<?php echo $value->promotion; ?>">
                        </div>
                        <div class="form-group">
                            
                            <button type="submit" class='btn btn-primary btn-sm' id='upload_button'>Save</button>
                            <img src="<?php echo base_url(); ?>images/pre.gif" alt="scorer ajax preloadr" height="32" width="32" id="ajax_preloader" class='invisible'>
                        </div>
                            <?php endforeach; ?>
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
                                <th>Promotion</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                foreach ($promotion as $value):
                            ?>
                            <tr>
                                <td>
                                <?php
                                    echo $value->promotion;
                                ?>
                                </td>
                                <td>
                                    <a class='btn btn-warning btn-sm' href="<?php echo site_url()."admin/promotion/edit_promotion/".$value->id; ?>">Edit</a>
                                    <button class='btn btn-danger btn-sm' onclick="delete_promotion('<?php echo $value->id ?>')" >Delete</button>
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
$("#form_edit_promotion").on('submit',function(e){
    e.preventDefault();
    var formdata=new FormData(this);
    $.ajax({
        url:"<?php echo site_url()."admin/promotion/do_edit_promotion" ?>",
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
                $("#form_edit_promotion").trigger('reset');
                swal("Success",temp['msg'],'success');
                $("#table_container").load('<?php echo site_url()."admin/promotion/promotion_page" ?>  #table');
            }else{
                swal("Error",temp['msg'],'error');
            }
        }
    });
});

function delete_promotion(id){
    var formdata=new FormData();
    formdata.append('id',id);
    $.ajax({
        url:"<?php echo site_url()."admin/promotion/delete_promotion" ?>",
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
                $("#table_container").load('<?php echo site_url()."admin/promotion/promotion_page" ?>  #table');
            }else{
                swal("Error",temp['msg'],'error');
            }
        }
    });
}

</script>