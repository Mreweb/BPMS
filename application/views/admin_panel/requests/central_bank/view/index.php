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
                        <input
                                type="hidden"
                                <?php setInputValue($request['ReqId']); ?>
                                id="inputReqId"
                                aria-label=""
                                class="form-control">
                    </ol>
                </nav>
            </div>
            <!--end breadcrumb-->

            <!-- row-->
            <div class="row">
                <div class="col-12 mx-auto">

                    <div class="card">
                        <div class="card-body">
                            <?php if ( in_array($request['ReqStatus'] , array('CENTRALBANK' , 'CENTRALBANKACCEPT')  ) ) { ?>
                                <div class="row forms">
                                    <?php if ( in_array($request['ReqStatus'] , array('CENTRALBANK' , 'CENTRALBANKACCEPT')  ) ) { ?>
                                        <div class="alert alert-success text-white">
                                            لطفا بعد از تکمیل اطلاعات تملک، وضعیت درخواست را مشخص کنید.
                                        </div>
                                    <?php }  ?>
                                    <style>
                                        #primaryprofileOwner .input-group-text {
                                            min-width: 200px;
                                        }
                                    </style>
                                    <div class="row">
                                        <div class="col-12 col-md-6 col-sm-6 mb-2">
                                            <div class="input-group">
                                                <span class="input-group-text">درصد مالکیت مالک بر ملک</span>
                                                <input type="text"
                                                    <?php setInputValue($request_central_bank_info['FinalPropertyPercentageOwnership']); ?>
                                                       id="inputFinalPropertyPercentageOwnership" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-sm-6 mb-2">
                                            <div class="input-group">
                                                <span class="input-group-text">نحوه تملک</span>
                                                <select class="form-select" id="inputFinalPropertyAcquire"
                                                        data-placeholder="یک مورد راانتخاب کنید">
                                                    <option></option>
                                                    <?php foreach ($enum['PROPERTY_BUY_TYPE'] as $key => $value) { ?>
                                                        <option
                                                            <?php setOptionSelected($key, $request_central_bank_info['FinalPropertyAcquire']); ?>
                                                                value="<?php echo $key; ?>">
                                                            <?php echo $value; ?>
                                                        </option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-sm-6 mb-2">
                                            <div class="input-group">
                                                <span class="input-group-text">نوع دارایی</span>
                                                <select class="form-select" id="inputFinalPropertyType"
                                                        data-placeholder="یک مورد راانتخاب کنید">
                                                    <option></option>
                                                    <?php foreach ($enum['PROPERTY_TYPE'] as $key => $value) { ?>
                                                        <option
                                                            <?php setOptionSelected($key, $request_central_bank_info['FinalPropertyType']); ?>
                                                                value="<?php echo $key; ?>">
                                                            <?php echo $value; ?>
                                                        </option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-sm-6 mb-2">
                                            <div class="input-group">
                                                <span class="input-group-text">تاریخ تملک/خرید تحصیل</span>
                                                <input type="text"
                                                    <?php setInputValue($request_central_bank_info['FinalPropertyBuyDate']); ?>
                                                       id="inputFinalPropertyBuyDate" name="<?php echo md5(rand()); ?>" class="form-control" data-jdp>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-sm-6 mb-2">
                                            <div class="input-group">
                                                <span class="input-group-text">مازاد بودن ملک</span>
                                                <select class="form-select" id="inputFinalPropertySurplus"
                                                        data-placeholder="یک مورد راانتخاب کنید">
                                                    <option></option>
                                                    <?php foreach ($enum['YES_NO'] as $key => $value) { ?>
                                                        <option
                                                            <?php setOptionSelected($key, $request_central_bank_info['FinalPropertySurplus']); ?>
                                                                value="<?php echo $key; ?>">
                                                            <?php echo $value; ?>
                                                        </option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-sm-6 mb-2">
                                            <div class="input-group">
                                                <span class="input-group-text">مستثنی بودن ملک</span>
                                                <select class="form-select" id="inputFinalPropertyExcluded"
                                                        data-placeholder="یک مورد راانتخاب کنید">
                                                    <option></option>
                                                    <?php foreach ($enum['YES_NO'] as $key => $value) { ?>
                                                        <option
                                                            <?php setOptionSelected($key, $request_central_bank_info['FinalPropertyExcluded']); ?>
                                                                value="<?php echo $key; ?>">
                                                            <?php echo $value; ?>
                                                        </option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-sm-6 mb-2">
                                            <div class="input-group">
                                                <span class="input-group-text">منشا ایجاد استثنا</span>
                                                <input type="text"
                                                    <?php setInputValue($request_central_bank_info['FinalPropertyExcludeReason']); ?>
                                                       id="inputFinalPropertyExcludeReason" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-sm-6 mb-2">
                                            <div class="input-group">
                                                <span class="input-group-text">بلامعارض بودن</span>
                                                <select class="form-select" id="inputFinalPropertyUnopposed"
                                                        data-placeholder="یک مورد راانتخاب کنید">
                                                    <option></option>
                                                    <?php foreach ($enum['YES_NO'] as $key => $value) { ?>
                                                        <option
                                                            <?php setOptionSelected($key, $request_central_bank_info['FinalPropertyUnopposed']); ?>
                                                                value="<?php echo $key; ?>">
                                                            <?php echo $value; ?>
                                                        </option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-sm-6 mb-2">
                                            <div class="input-group">
                                                <span class="input-group-text">پرونده حقوقی دارد</span>
                                                <select class="form-select" id="inputFinalPropertyHasLegal"
                                                        data-placeholder="یک مورد راانتخاب کنید">
                                                    <option></option>
                                                    <?php foreach ($enum['YES_NO'] as $key => $value) { ?>
                                                        <option
                                                            <?php setOptionSelected($key, $request_central_bank_info['FinalPropertyHasLegal']); ?>
                                                                value="<?php echo $key; ?>">
                                                            <?php echo $value; ?>
                                                        </option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-sm-6 mb-2">
                                            <div class="input-group">
                                                <span class="input-group-text">تاریخ آخرین حکم</span>
                                                <input type="text"
                                                    <?php setInputValue($request_central_bank_info['FinalPropertyOrderDate']); ?>
                                                       id="inputFinalPropertyOrderDate" name="<?php echo md5(rand()); ?>" class="form-control" data-jdp>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-sm-6 mb-2">
                                            <div class="input-group">
                                                <span class="input-group-text">نتیجه حکم صادره</span>
                                                <select class="form-select" id="inputFinalPropertyVote"
                                                        data-placeholder="یک مورد راانتخاب کنید">
                                                    <option></option>
                                                    <?php foreach ($enum['PROPERTY_JUDGE_RESULT'] as $key => $value) { ?>
                                                        <option
                                                            <?php setOptionSelected($key, $request_central_bank_info['FinalPropertyVote']); ?>
                                                                value="<?php echo $key; ?>">
                                                            <?php echo $value; ?>
                                                        </option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-12 col-sm-12 mb-2">
                                            <div class="input-group">
                                                <span class="input-group-text">ارزش برآوردي خروج منافع درصورت حکم عليه</span>
                                                <input type="text"
                                                    <?php setInputValue($request_central_bank_info['FinalPropertyWithdrawBenefit']); ?>
                                                       id="inputFinalPropertyWithdrawBenefit" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-sm-6 mb-2">
                                            <div class="input-group">
                                                <span class="input-group-text">قطعی یا وکالتی بودن سند</span>
                                                <select class="form-select" id="inputFinalPropertyDocFinalStatus"
                                                        data-placeholder="یک مورد راانتخاب کنید">
                                                    <option></option>
                                                    <?php foreach ($enum['PROPERTY_DOC_EXACT'] as $key => $value) { ?>
                                                        <option
                                                            <?php setOptionSelected($key, $request_central_bank_info['FinalPropertyDocFinalStatus']); ?>
                                                                value="<?php echo $key; ?>">
                                                            <?php echo $value; ?>
                                                        </option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-sm-6 mb-2">
                                            <div class="input-group">
                                                <span class="input-group-text">سرفصل خلاصه دفترکل طبقه بندی شده ملک</span>
                                                <input type="text"
                                                    <?php setInputValue($request_central_bank_info['FinalPropertySummary']); ?>
                                                       id="inputFinalPropertySummary" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-sm-6 mb-2">
                                            <div class="input-group">
                                                <span class="input-group-text">ارزش دفتری</span>
                                                <input type="text"
                                                    <?php setInputValue($request_central_bank_info['FinalPropertyValue']); ?>
                                                       id="inputFinalPropertyValue" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-sm-6 mb-2">
                                            <div class="input-group">
                                                <span class="input-group-text">تاریخ آخرین کارشناسی رسمی</span>
                                                <input type="text"
                                                    <?php setInputValue($request_central_bank_info['FinalPropertyValueCheck']); ?>
                                                       id="inputFinalPropertyValueCheck" name="<?php echo md5(rand()); ?>" class="form-control" data-jdp>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-sm-6 mb-2">
                                            <div class="input-group">
                                                <span class="input-group-text">ارزش آخرین کارشناسی رسمی</span>
                                                <input type="text"
                                                    <?php setInputValue($request_central_bank_info['FinalPropertyCheckValue']); ?>
                                                       id="inputFinalPropertyCheckValue" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-sm-6 mb-2">
                                            <div class="input-group">
                                                <span class="input-group-text">مرجع کارشناسی</span>
                                                <input type="text"
                                                    <?php setInputValue($request_central_bank_info['FinalPropertySurvey']); ?>
                                                       id="inputFinalPropertySurvey" class="form-control">
                                            </div>
                                        </div>


                                    </div>

                                    <div class="col-sm-12 col-md-12 mb-3">

                                        <div class="alert bg-success">
                                            لطفا وضعیت درخواست را مشخص کنید
                                        </div>

                                        <div class="input-group">
                                            <span class="input-group-text">وضعیت تایید</span>
                                            <select class="form-select" id="inputResult"
                                                    data-placeholder="یک مورد راانتخاب کنید">
                                                <option></option>
                                                <?php foreach ($enum['CENTRALBANKACCEPT'] as $key => $value) { ?>
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
                            <?php }
                            else { ?>
                                <div class="alert alert-danger text-white">
                                    درخواست در مرحله تایید بانک مرکزی قرار ندارد.
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="col-12 mx-auto">
                    <?php include APPPATH.'views/request_detail.php';?>
                </div>
            </div>
        </div>
    </div>
</div>
<!--end row-->

