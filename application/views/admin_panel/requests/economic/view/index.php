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
                            <?php  if($request['ReqStatus'] == 'ECONOMIC'){ ?>
                                <div class="row">
                                    <div class="alert alert-success text-white">
                                        لطفا وضعیت درخواست را مشخص کنید
                                    </div>
                                    <div class="col-sm-12 col-md-3 mb-3">
                                        <div class="input-group">
                                            <span class="input-group-text">وضعیت تایید</span>
                                            <select class="form-select" id="inputResult" data-placeholder="یک مورد راانتخاب کنید">
                                                <option></option>
                                                <?php foreach ($enum['ACCEPT'] as $key => $value) { ?>
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
                            <?php } else{ ?>
                                <div class="alert alert-danger text-white">
                                    درخواست در مرحله کمیسیون اقتصادی قرار ندارد.
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="col-12 mx-auto">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div style="pointer-events: none" class="col-sm-12 col-md-3 mb-3">
                                    <div class="input-group">
                                        <span class="input-group-text">عنوان</span>
                                        <input
                                                type="hidden"
                                                <?php setInputValue($request['ReqId']); ?>
                                                id="inputReqId"
                                                aria-label=""
                                                class="form-control">
                                        <input
                                            type="text"
                                            <?php setInputValue($request['ReqTitle']); ?>
                                            id="inputTitle"
                                            aria-label=""
                                            class="form-control">
                                    </div>
                                </div>
                                <div style="pointer-events: none" class="col-sm-12 col-md-3 mb-3">
                                    <div class="input-group">
                                        <span class="input-group-text">نوع</span>
                                        <select class="form-select" id="inputReqType" data-placeholder="یک مورد راانتخاب کنید">
                                        <option></option>
                                        <?php foreach ($enum['REQ_TYPE'] as $key => $value) { ?>
                                            <option
                                                <?php setOptionSelected($key , $request['ReqType']); ?>
                                                    value="<?php echo $key; ?>">
                                                <?php echo $value; ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                    </div>
                                </div>
                                <div style="pointer-events: none" class="col-sm-12 col-md-3 mb-3">
                                    <div class="input-group">
                                        <span class="input-group-text">کاربری</span>
                                        <select class="form-select" id="inputReqUseType" data-placeholder="یک مورد راانتخاب کنید">
                                        <option></option>
                                        <?php foreach ($enum['USE_TYPE'] as $key => $value) { ?>
                                            <option
                                                <?php setOptionSelected($key , $request['ReqUseType']); ?>
                                                    value="<?php echo $key; ?>">
                                                <?php echo $value; ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                    </div>
                                </div>
                                <div style="pointer-events: none" class="col-sm-12 col-md-3 mb-3">
                                    <div class="input-group">
                                        <span class="input-group-text">ارزش گذاری رسمی (تومان)</span>
                                        <input
                                                type="text"
                                            <?php setInputValue($request['ReqPrice']); ?>
                                                id="inputPrice"
                                                aria-label=""
                                                class="form-control money">
                                    </div>
                                </div>
                                <div style="pointer-events: none" class="col-sm-12 mb-3">
                                    <label class="col-sm-12 col-md-3 mb-3">توضیحات</label>
                                    <textarea rows="6" id="inputDescription" class="form-control"><?php echo nl2br($request['ReqDescription']); ?></textarea>
                                </div>

                                <div class="col-sm-12 mb-3">
                                    <div class="uploaded-files mt-3">
                                        <table class="table table-bordered table-hover table-stripped">
                                            <thead>
                                            <tr>
                                                <th>عنوان</th>
                                                <th class="fit">دانلود</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php foreach ($request_attachment as $item) { ?>
                                                <tr data-type='<?php echo $item['AttachType']; ?>'
                                                    data-name='<?php echo $item['AttachTitle']; ?>'
                                                    data-src='<?php echo $item['AttachUrl']; ?>'>
                                                    <td>
                                                        <a target="_blank" href="<?php echo $item['AttachUrl']; ?>"><?php echo $item['AttachTitle']; ?></a>
                                                    </td>
                                                    <td class='fit'>
                                                        <a target="_blank" href="<?php echo $item['AttachUrl']; ?>">
                                                            <button class='btn btn-success btn-sm'>دریافت فایل</button>
                                                        </a>

                                                    </td>
                                                </tr>
                                            <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="container py-2">
                    <h2 class="font-weight-light text-center text-white py-3">تاریخچه عملیات</h2>
                    <?php $index = 0;
                    foreach ($request_comments as $request_comment) { ?>

                        <?php if ($index % 2 == 0) { ?>
                            <div class="row g-0">
                                <div class="col-sm">
                                    <!--spacer-->
                                </div>
                                <div class="col-sm-1 text-center flex-column d-none d-sm-flex">
                                    <div class="row h-50">
                                        <div class="col">&nbsp;</div>
                                        <div class="col">&nbsp;</div>
                                    </div>
                                    <h5 class="m-2">
                                        <span class="badge rounded-pill bg-light border">&nbsp;</span>
                                    </h5>
                                    <div class="row h-50">
                                        <div class="col border-end">&nbsp;</div>
                                        <div class="col">&nbsp;</div>
                                    </div>
                                </div>
                                <div class="col-sm py-2">
                                    <div class="card radius-15">
                                        <div class="card-body">
                                            <div class="float-end small">
                                                <?php echo convertDate($request_comment['CreateDateTime']); ?>
                                                <br>
                                                <?php echo convertTime($request_comment['CreateDateTime']); ?>
                                            </div>
                                            <h4 class="card-title text-white"><?php echo pipeEnum('REQ_STATUS', $request_comment['CommentType']); ?></h4>
                                            <p class="card-text">
                                                <?php echo nl2br($request_comment['CommentContent']); ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } else{ ?> <div class="row g-0">
                            <div class="col-sm py-2">
                                <div class="card radius-15">
                                    <div class="card-body">
                                        <div class="float-end small">

                                            <?php echo convertDate($request_comment['CreateDateTime']); ?>
                                            <br>
                                            <?php echo convertTime($request_comment['CreateDateTime']); ?>
                                        </div>
                                        <h4 class="card-title text-white"><?php echo pipeEnum('REQ_STATUS', $request_comment['CommentType']); ?></h4>
                                        <p class="card-text">
                                            <?php echo nl2br($request_comment['CommentContent']); ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-1 text-center flex-column d-none d-sm-flex">
                                <div class="row h-50">
                                    <div class="col">&nbsp;</div>
                                    <div class="col">&nbsp;</div>
                                </div>
                                <h5 class="m-2">
                                    <span class="badge rounded-pill bg-light border">&nbsp;</span>
                                </h5>
                                <div class="row h-50">
                                    <div class="col border-end">&nbsp;</div>
                                    <div class="col">&nbsp;</div>
                                </div>
                            </div>
                            <div class="col-sm">
                                <!--spacer-->
                            </div>
                        </div>
                        <?php }  ?>
                        <?php $index+=1; } ?>

                </div>

            </div>
        </div>
    </div>
</div>
<!--end row-->

