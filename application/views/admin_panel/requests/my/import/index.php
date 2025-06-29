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
                                            <?php include VIEWPATH . 'alerts-file.php'; ?>
                                            <div class="input-group">
                                                <label for="file" class="input-group-text">فایل اکسل را بارگذاری کنید</label>
                                                <input type="file"  id="file"  aria-label="" class="form-control">
                                            </div>
                                            <div class="uploaded-files mt-3">
                                                <table class="table table-bordered table-hover table-stripped" style="display:none;">
                                                    <thead>
                                                    <tr>
                                                        <th>عنوان</th>
                                                        <th>حذف</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody></tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="col-12 text-start mb-2">
                                            <div class="alert border-0 alert-dismissible fade show py-2">
                                                <div class="d-flex align-items-center">
                                                    <div class="font-35 text-white"><i class="bx bx-bookmark-heart"></i>
                                                    </div>
                                                    <div class="ms-3">
                                                        <h6 class="mb-0 text-white">هشدار</h6>
                                                        <div class="text-white">لطفا جهت تسریع در فرآیند بررسی، از صحت
                                                            اطلاعات وارد شده اطمینان حاصل نمائید.
                                                        </div>
                                                    </div>
                                                </div>
                                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                        aria-label="یستن"></button>
                                            </div>
                                            <button id="do_save" class="btn btn-success">ذخیره</button>


                                    </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!--end row-->


