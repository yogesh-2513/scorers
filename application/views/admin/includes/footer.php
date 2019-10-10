
<footer class="footer text-right">
    <?php echo date("Y") ?> © Developed by Anjana Infotech.
</footer>


</div>
    <!-- ============================================================== -->
    <!-- End Right content here -->
    <!-- ============================================================== -->


</div>
<!-- END wrapper -->

<script>
    var resizefunc = [];
</script>

<!-- jQuery  -->

<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/detect.js"></script>
<script src="<?php echo base_url(); ?>assets/js/fastclick.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.blockUI.js"></script>
<script src="<?php echo base_url(); ?>assets/js/waves.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.slimscroll.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.scrollTo.min.js"></script>
<script src="<?php echo base_url(); ?>plugins/switchery/switchery.min.js"></script>
<script src="<?php echo base_url(); ?>js/picker.js"></script>
<!--Summernote js-->
<script src="<?php echo base_url(); ?>plugins/summernote/summernote.min.js"></script>
<!-- Select 2 -->
<script src="<?php echo base_url(); ?>plugins/select2/js/select2.min.js"></script>
<!-- Jquery filer js -->
<script src="<?php echo base_url(); ?>plugins/jquery.filer/js/jquery.filer.min.js"></script>

<!-- page specific js -->
<script src="<?php echo base_url(); ?>assets/pages/jquery.blog-add.init.js"></script>

<!-- App js -->
<script src="<?php echo base_url(); ?>assets/js/jquery.core.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.app.js"></script>

<script>

    jQuery(document).ready(function(){

        $('.summernote').summernote({
            height: 240,                 // set editor height
            minHeight: null,             // set minimum height of editor
            maxHeight: null,             // set maximum height of editor
            focus: false                 // set focus to editable area after initializing summernote
        });
        // Select2
        $(".select2").select2();

        $(".select2-limiting").select2({
            maximumSelectionLength: 2
        });
    });
    if($(document).width() <=991){
        if($(".row").hasClass("d-flex")){
            $(".row").removeClass("d-flex");
        }
    }
</script>
<script src="<?php echo base_url(); ?>plugins/switchery/switchery.min.js"></script>

        <!--Summernote js-->
<script src="<?php echo base_url(); ?>plugins/summernote/summernote.min.js"></script>
</body>
</html>

    

