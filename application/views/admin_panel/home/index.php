<?php $_DIR = base_url(); ?>
<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        <div class="row">
            <div class="col-xl-4">

                <?php if(isset($_GET['msg'])){ ?>
                    <div class="alert bg-danger text-white">
                        <?php echo strip_tags($_GET['msg']); ?>
                    </div>
                <?php } ?>

            </div>
        </div>
        <!--end row-->
    </div>
</div>
<!--end page wrapper -->
