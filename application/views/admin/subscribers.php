<div class="content-page">
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Subcribers</h4>
                        <ol class="breadcrumb p-0 m-0">
                            <li>
                                <a href="#">Scorers</a>
                            </li>
                            <li>
                                <a href="#">Admin</a>
                            </li>
                            <li class="active">
                                Subscribers
                            </li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>


        
            <!-- Subscribers Table Container Starts -->
            <div class="row d-flex justify-content-center mt-5">
                <div class="col-md-12" id='table_container'>

                <table class="table table-light" id='table'>
                        <thead class="thead-light">
                            <tr>
                                <th>Mail ID</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                foreach ($subscribers as $value):
                            ?>
                            <tr>
                                <td>

                                    <?php echo $value->email; ?>

                                </td>
                                <td>
                                    <button class='btn btn-danger btn-sm' onclick="delete_subscriber('<?php echo $value->id ?>')" >Delete</button>
                                </td>
                            </tr>
                            <?php
                            endforeach;
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
<!-- Subscribers Table Container Ends -->


        </div>
    </div>
</div>

<script>

function delete_subscriber(id){
    var formdata=new FormData();
    formdata.append('id',id);
    $.ajax({
        url:"<?php echo site_url()."admin/subscribers/delete_subscriber" ?>",
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
                $("#table_container").load('<?php echo site_url()."admin/subscribers/" ?>  #table');
            }else{
                swal("Error",temp['msg'],'error');
            }
        }
    });
}
</script>
