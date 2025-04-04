<?php $_DIR = base_url(); ?>

<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">

        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('Admin/Dashboard/Home'); ?>"><i
                                        class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page"><?php echo $pageTitle; ?></li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                    <a href="<?php echo base_url('Admin/Dashboard/Requests/add'); ?>">
                        <button type="button" class="btn btn-success">درخواست جدید</button>
                    </a>
                </div>
            </div>
        </div>
        <!--end breadcrumb-->
        <div class="card">
            <div class="card-body">


                <div class="row Page-Search-Form ">
                    <div class="col-sm-12 col-md-10 row">
                        <div class="col-sm-12 col-md-2 mb-3">
                            عنوان:
                            <input type="text" id="inputTitle" class="form-control">
                        </div>
                        <div class="col-sm-12 col-md-2 mb-3">
                            کد ملی:
                            <input type="text" id="inputNationalCode" class="form-control">
                        </div>
                        <div class="col-sm-12 col-md-2 mb-3">
                            نام یا نام خانوادگی:
                            <input type="text" id="inputName" class="form-control">
                        </div>
                        <div class="col-sm-12 col-md-2 mb-3">
                            از تاریخ:
                            <input type="text" id="inputFromDate" name="<?php echo md5(rand()); ?>" class="form-control" data-jdp>
                        </div>
                        <div class="col-sm-12 col-md-2 mb-3">
                            تا تاریخ:
                            <input type="text" id="inputToDate" name="<?php echo md5(rand()); ?>" class="form-control" data-jdp>
                        </div>
                        <div class="col-sm-12 col-md-2 mb-3">
                            <label>وضعیت:</label>
                            <select class="form-select" id="inputReqStatus" data-placeholder="یک وضعیت راانتخاب کنید">
                                <option value="">همه</option>
                                <?php foreach ($enum['REQ_STATUS'] as $key=>$value) { ?>
                                    <option value="<?php echo $key; ?>">
                                        <?php echo $value; ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>

                    </div>
                    <div class="col-sm-12 col-md-2">
                        <label class="col-sm-12 mb-3 text-end">
                            <br>
                            <button type="button" id="doSearch" class="btn btn-light"><i class="bx bx-search-alt me-0"></i></button>
                        </label>
                    </div>
                </div>


                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                        <tr>
                            <th class="fit">شناسه</th>
                            <th>عنوان</th>
                            <th class="fit">نوع</th>
                            <th class="fit">ارزش گذاری رسمی</th>
                            <th class="fit">وضعیت</th>
                            <th class="fit">ثبت کننده</th>
                            <th class="fit">کد ملی</th>
                            <th class="fit">تلفن</th>
                            <th class="fit">تاریخ ثبت</th>
                            <th class="fit">ویرایش</th>
                            <th class="fit">قراردادهوشمند</th>
                            <th class="fit">پروپوزال</th>
                            <th class="fit">مدیریت قراردادهوشمند</th>
                        </tr>
                        </thead>
                        <tbody class="table-rows"></tbody>
                    </table>
                </div>


                <?php include APPPATH.'pagination.php'; ?>


            </div>
        </div>
    </div>
</div>
<!--end page wrapper -->
