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

                            <style>
                                #primaryhome .input-group-text {
                                    min-width: 175px !important;
                                }
                            </style>
                            <div class="row">

                                <div class="col-sm-12 mb-3">
                                    <div class="input-group">
                                        <label for="file" class="input-group-text">شناسه ملک را وارد کنید</label>
                                        <input type="text" id="id" aria-label="" class="form-control">
                                    </div>
                                </div>
                                <div class="col-12 text-start mb-2">
                                    <button id="do_save" class="btn btn-success">ذخیره</button>
                                </div>

                                <div class="col-sm-12 mb-3 text-center progress-form" style="display: none;">
                                    <h2>دریافت اطلاعات</h2>
                                    <div class="progress mb-3" style="height:15px;">
                                        <div class="progress-bar progress-bar-striped bg-success" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end row-->


