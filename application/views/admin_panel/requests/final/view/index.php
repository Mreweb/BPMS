<?php $_DIR = base_url(); ?>

<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item">
                            <a href="<?php echo base_url('Admin/Dashboard/Persons') ?>">
                                <i class="bx bx-home-alt"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page"><?php echo $pageTitle; ?></li>
                    </ol>
                </nav>
            </div>
            <!--end breadcrumb-->

            <!-- row-->
            <div class="row">
                <div class="col-12 mx-auto">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="alert alert-success text-white">
                                    لطفا وضعیت درخواست را مشخص کنید
                                </div>
                                <div class="col-sm-12 col-md-3 mb-3">
                                    <div class="input-group">
                                        <span class="input-group-text">وضعیت تایید</span>
                                        <select class="form-select" id="inputResult" data-placeholder="یک مورد راانتخاب کنید">
                                            <option></option>
                                            <?php
                                            foreach ($enum['REQ_STATUS'] as $key => $value) { ?>
                                                <option value="<?php echo $key; ?>">
                                                    <?php echo $value; ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-12 mb-3">
                                    <label class="col-sm-12 col-md-3 mb-3">توضیحات</label>
                                    <textarea rows="6" id="inputResultDescription" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="col-12 text-end mb-2">
                                <button id="do_save" class="btn btn-success">ذخیره</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 mx-auto">
                    <?php include APPPATH.'views/request_detail.php';?>
                </div>

                <div class="container py-2">
                    <?php include APPPATH.'views/request_comment.php';?>
                </div>
            </div>
        </div>
    </div>
</div>
<!--end row-->

