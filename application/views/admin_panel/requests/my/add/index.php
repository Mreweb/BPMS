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
                                <div class="col-12 col-md-6 col-sm-6 mb-2">
                                    <div class="input-group">
                                        <span class="input-group-text">عنوان</span>
                                        <input
                                            type="text"
                                            id="inputTitle"
                                            aria-label=""
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-sm-6 mb-2">
                                    <div class="input-group">
                                        <span class="input-group-text">نوع</span>
                                        <select class="form-select" id="inputReqType" data-placeholder="یک مورد راانتخاب کنید">
                                        <option></option>
                                        <?php foreach ($enum['REQ_TYPE'] as $key => $value) { ?>
                                            <option value="<?php echo $key; ?>">
                                                <?php echo $value; ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-sm-6 mb-2">
                                    <div class="input-group">
                                        <span class="input-group-text">کاربری</span>
                                        <select class="form-select" id="inputReqUseType" data-placeholder="یک مورد راانتخاب کنید">
                                        <option></option>
                                        <?php foreach ($enum['USE_TYPE'] as $key => $value) { ?>
                                            <option value="<?php echo $key; ?>">
                                                <?php echo $value; ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-sm-6 mb-2">
                                    <div class="input-group">
                                        <span class="input-group-text">ارزش گذاری رسمی (تومان)</span>
                                        <input
                                                type="text"
                                                id="inputPrice"
                                                aria-label=""
                                                class="form-control money">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-sm-6 mb-2">
                                    <div class="input-group">
                                        <span class="input-group-text">کد ملی نماینده</span>
                                        <input
                                                type="text"
                                                id="inputAgentNationalCode"
                                                aria-label=""
                                                class="form-control">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-sm-6 mb-2">
                                    <div class="input-group">
                                        <span class="input-group-text">کد ملی بازارگردان</span>
                                        <input
                                                type="text"
                                                id="inputMarketMakerNationalCode"
                                                aria-label=""
                                                class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-12 mb-3">
                                    <label class="col-sm-12 col-md-3 mb-3">توضیحات</label>
                                    <textarea rows="6" id="inputDescription" class="form-control"></textarea>
                                </div>

                                <div class="col-sm-12 mb-3">
                                    <?php include VIEWPATH.'alerts.php'; ?>
                                    <div class="input-group">
                                        <label for="file" class="input-group-text">مدارک را بارگذاری کنید</label>
                                        <input
                                                type="file"
                                                id="file"
                                                aria-label=""
                                                class="form-control">
                                    </div>
                                    <div class="uploaded-files mt-3">
                                        <table class="table table-bordered table-hover table-stripped"  style="display:none;">
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


                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 text-end mb-2">
                    <button id="do_save" class="btn btn-success">ذخیره</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!--end row-->


<div class="form-group d-none alert-form">
    <label class="mb-2">نوع سند را انتخاب کنید</label>
    <select class="type form-control mb-2">
        <?php foreach ($enum['REQ_DOC_TYPE'] as $k=>$v){ ?>
            <option style="background-color: #0b0d0f;" value="<?php echo $k; ?>"><?php echo $v; ?></option>
        <?php } ?>
    </select>
    <label class="name-title mb-2">عنوان سند را وارد کنید</label>
    <input type="text" placeholder="اینجا بنویسید" class="name form-control" required />
</div>
