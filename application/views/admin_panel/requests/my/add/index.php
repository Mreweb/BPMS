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
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#primaryhome" role="tab"
                                       aria-selected="true">
                                        <div class="d-flex align-items-center">
                                            <div class="tab-icon"><i class="bx bx-home font-18 me-1"></i>
                                            </div>
                                            <div class="tab-title">فرم درخواست</div>
                                        </div>
                                    </a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" data-bs-toggle="tab" href="#primarycontact" role="tab"
                                       aria-selected="false" tabindex="-1">
                                        <div class="d-flex align-items-center">
                                            <div class="tab-icon"><i class="bx bx-user-pin font-18 me-1"></i>
                                            </div>
                                            <div class="tab-title">اطلاعات مالک</div>
                                        </div>
                                    </a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" data-bs-toggle="tab" href="#primaryprofile" role="tab"
                                       aria-selected="false" tabindex="-1">
                                        <div class="d-flex align-items-center">
                                            <div class="tab-icon"><i class="bx bx-user-pin font-18 me-1"></i>
                                            </div>
                                            <div class="tab-title">اطلاعات ملک</div>
                                        </div>
                                    </a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" data-bs-toggle="tab" href="#primaryprofileOwner" role="tab" aria-selected="false" tabindex="-1">
                                        <div class="d-flex align-items-center">
                                            <div class="tab-icon"><i class="bx bx-user-pin font-18 me-1"></i>
                                            </div>
                                            <div class="tab-title">اطلاعات تملک</div>
                                        </div>
                                    </a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" data-bs-toggle="tab" href="#primarysave" role="tab"
                                       aria-selected="false" tabindex="-1">
                                        <div class="d-flex align-items-center">
                                            <div class="tab-icon"><i class="bx bx-user-pin font-18 me-1"></i>
                                            </div>
                                            <div class="tab-title">ارسال درخواست</div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                            <div class="tab-content py-3">
                                <div class="tab-pane fade active show" id="primaryhome" role="tabpanel">

                                    <style>
                                        #primaryhome .input-group-text {
                                            min-width: 175px !important;
                                        }
                                    </style>
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
                                                <select class="form-select" id="inputReqType"
                                                        data-placeholder="یک مورد راانتخاب کنید">
                                                    <option></option>
                                                    <?php foreach ($enum['PROPERTY_TYPE'] as $key => $value) { ?>
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
                                        <div class="col-12 col-md-6 col-sm-6 mb-2 d-none">
                                            <div class="input-group">
                                                <span class="input-group-text">کد ملی نماینده</span>
                                                <input
                                                        type="text"
                                                        id="inputAgentNationalCode"
                                                        aria-label=""
                                                        class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-sm-6 mb-2 d-none">
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
                                            <?php include VIEWPATH . 'alerts.php'; ?>
                                            <div class="input-group">
                                                <label for="file" class="input-group-text">مدارک را بارگذاری کنید</label>
                                                <input
                                                        type="file"
                                                        id="file"
                                                        aria-label=""
                                                        class="form-control">
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


                                        <div class="col-sm-12 mb-3">
                                            <?php include VIEWPATH . 'photo-alerts.php'; ?>
                                            <div class="input-group">
                                                <label for="file" class="input-group-text">تصاویر را بارگذاری کنید</label>
                                                <input
                                                        type="file"
                                                        id="file-image"
                                                        aria-label=""
                                                        class="form-control">
                                            </div>
                                            <div class="uploaded-image-files mt-3">
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


                                    </div>

                                </div>
                                <div class="tab-pane fade" id="primarycontact" role="tabpanel">

                                    <div class="row">
                                        <div class="col-12 col-md-4 col-sm-6 mb-2">
                                            <div class="input-group">
                                                <span class="input-group-text">شناسه ملی مالک</span>
                                                <input type="text" maxlength="11" id="inputOwnerNationalCode"
                                                       class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-4 col-sm-6 mb-2">
                                            <div class="input-group">
                                                <span class="input-group-text">نام مالک(شرکت - موسسه اعتباری)</span>
                                                <input type="text" id="inputOwnerName" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-4 col-sm-6 mb-2">
                                            <div class="input-group">
                                                <span class="input-group-text">رابطه با بانک</span>
                                                <select class="form-select" id="inputOwnerBankRelation"
                                                        data-placeholder="یک مورد راانتخاب کنید">
                                                    <option></option>
                                                    <?php foreach ($enum['BANK_RELATION'] as $key => $value) { ?>
                                                        <option value="<?php echo $key; ?>">
                                                            <?php echo $value; ?>
                                                        </option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-12 col-md-4 col-sm-6 mb-2">
                                            <div class="input-group">
                                                <span class="input-group-text">نوع شرکت</span>
                                                <select class="form-select" id="inputOwnerCompanyType"
                                                        data-placeholder="یک مورد راانتخاب کنید">
                                                    <option></option>
                                                    <?php foreach ($enum['COMPANY_TYPE'] as $key => $value) { ?>
                                                        <option value="<?php echo $key; ?>">
                                                            <?php echo $value; ?>
                                                        </option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-12 col-md-4 col-sm-6 mb-2">
                                            <div class="input-group">
                                                <span class="input-group-text">نوع شخص وابسته</span>
                                                <select class="form-select" id="inputOwnerTypeDependentPerson"
                                                        data-placeholder="یک مورد راانتخاب کنید">
                                                    <option></option>
                                                    <?php foreach ($enum['PERSON_RELATION_TYPE'] as $key => $value) { ?>
                                                        <option value="<?php echo $key; ?>">
                                                            <?php echo $value; ?>
                                                        </option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-4 col-sm-6 mb-2">
                                            <div class="input-group">
                                                <span class="input-group-text">درصد مالیکت موسسه اعتباری بر شخص وابسته</span>
                                                <input type="text" id="inputOwnerOwnershipPercentage"
                                                       class="form-control">
                                            </div>
                                        </div>

                                    </div>

                                </div>
                                <div class="tab-pane fade" id="primaryprofile" role="tabpanel">

                                    <div class="row">
                                        <div class="col-12 col-md-4 col-sm-6 mb-2">
                                            <div class="input-group">
                                                <span class="input-group-text">شناسه ملک</span>
                                                <input type="text" id="inputPropertyID" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-4 col-sm-6 mb-2">
                                            <div class="input-group">
                                                <span class="input-group-text">تاریخ ثبت</span>
                                                <input type="text" id="inputPropertyRegisterDate" name="<?php echo md5(rand()); ?>" class="form-control" data-jdp>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-4 col-sm-6 mb-2">
                                            <div class="input-group">
                                                <span class="input-group-text">وضعیت خاص</span>
                                                <select class="form-select" id="inputPropertySpecialStatus"
                                                        data-placeholder="یک مورد راانتخاب کنید">
                                                    <option></option>
                                                    <?php foreach ($enum['PROPERTY_SPECIAL_STATUS'] as $key => $value) { ?>
                                                        <option value="<?php echo $key; ?>">
                                                            <?php echo $value; ?>
                                                        </option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-4 col-sm-6 mb-2">
                                            <div class="input-group">
                                                <span class="input-group-text">کاربری</span>
                                                <select class="form-select" id="inputPropertyUseType"
                                                        data-placeholder="یک مورد راانتخاب کنید">
                                                    <option></option>
                                                    <?php foreach ($enum['USE_TYPE'] as $key => $value) { ?>
                                                        <option value="<?php echo $key; ?>">
                                                            <?php echo $value; ?>
                                                        </option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-4 col-sm-6 mb-2">
                                            <div class="input-group">
                                                <span class="input-group-text">نوع سند</span>
                                                <select class="form-select" id="inputPropertyDocType"
                                                        data-placeholder="یک مورد راانتخاب کنید">
                                                    <option></option>
                                                    <?php foreach ($enum['DOC_TYPE'] as $key => $value) { ?>
                                                        <option value="<?php echo $key; ?>">
                                                            <?php echo $value; ?>
                                                        </option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-4 col-sm-6 mb-2">
                                            <div class="input-group">
                                                <span class="input-group-text">دلیل استفاده</span>
                                                <input type="text" id="inputPropertyUseReason" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-4 col-sm-6 mb-2">
                                            <div class="input-group">
                                                <span class="input-group-text">شناسه یکتا</span>
                                                <input type="text" id="inputPropertyUUID" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-4 col-sm-6 mb-2">
                                            <div class="input-group">
                                                <span class="input-group-text">رمز تصدیق</span>
                                                <input type="text" id="inputPropertyPassword" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-4 col-sm-6 mb-2">
                                            <div class="input-group">
                                                <span class="input-group-text">مساحت عرصه</span>
                                                <input type="text" id="inputPropertyAreaSupply" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-4 col-sm-6 mb-2">
                                            <div class="input-group">
                                                <span class="input-group-text">مساحت اعیان</span>
                                                <input type="text" id="inputPropertyAreaNobility" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-4 col-sm-6 mb-2">
                                            <div class="input-group">
                                                <span class="input-group-text">پلاک ثبتی (اصلی- فرعی)</span>
                                                <input type="text" id="inputPropertyRegistrationPlate"
                                                       class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-4 col-sm-6 mb-2">
                                            <div class="input-group">
                                                <span class="input-group-text">مفروز از / مجزی از</span>
                                                <input type="text" id="inputPropertySeparate" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-4 col-sm-6 mb-2">
                                            <div class="input-group">
                                                <span class="input-group-text">قطعه</span>
                                                <input type="text" id="inputPropertyPiece" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-4 col-sm-6 mb-2">
                                            <div class="input-group">
                                                <span class="input-group-text">بخش ثبتی</span>
                                                <input type="text" id="inputPropertyRegistrationDepartment"
                                                       class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-4 col-sm-6 mb-2">
                                            <div class="input-group">
                                                <span class="input-group-text">ناحیه</span>
                                                <input type="text" id="inputPropertyDistrict" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-4 col-sm-6 mb-2">
                                            <div class="input-group">
                                                <span class="input-group-text">بلوک</span>
                                                <input type="text" id="inputPropertyBlock" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-4 col-sm-6 mb-2">
                                            <div class="input-group">
                                                <span class="input-group-text">طبقه</span>
                                                <input type="text" id="inputPropertyFloor" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-4 col-sm-6 mb-2">
                                            <div class="input-group">
                                                <span class="input-group-text">سمت</span>
                                                <input type="text" id="inputPropertySide" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-4 col-sm-6 mb-2">
                                            <div class="input-group">
                                                <span class="input-group-text">سال ساخت</span>
                                                <input type="text" id="inputPropertyBuildYear" class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-12 col-md-4 col-sm-6 mb-2">
                                            <div class="input-group">
                                                <span class="input-group-text">استان</span>
                                                <select id="inputProvince" class="form-control">
                                                    <?php foreach ($provinceList as $pr) { ?>
                                                        <option <?php setOptionSelected($request['ReqProvinceId'], $pr['ProvinceId']); ?>
                                                                value="<?php echo $pr['ProvinceId']; ?>">
                                                            <?php echo $pr['ProvinceName']; ?>
                                                        </option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-4 col-sm-6 mb-2">
                                            <div class="input-group">
                                                <span class="input-group-text">شهر</span>
                                                <select id="inputCity" class="form-control">
                                                    <?php foreach ($provinceList as $pr) { ?>
                                                        <option <?php setOptionSelected($request['ReqProvinceId'], $pr['ProvinceId']); ?>
                                                                value="<?php echo $pr['ProvinceId']; ?>">
                                                            <?php echo $pr['ProvinceName']; ?>
                                                        </option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-12 col-md-4 col-sm-6 mb-2">
                                            <div class="input-group">
                                                <span class="input-group-text">کد پستی</span>
                                                <input type="text" id="inputPropertyPostalCode" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-4 col-sm-6 mb-2">
                                            <div class="input-group">
                                                <span class="input-group-text">آدرس</span>
                                                <input type="text" id="inputPropertyAddress" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-4 col-sm-6 mb-2">
                                            <div class="input-group">
                                                <span class="input-group-text">پهنه کاربری</span>
                                                <input type="text" id="inputPropertyUseTypeSide" class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-12 col-md-4 col-sm-6 mb-2">
                                            <div class="input-group">
                                                <span class="input-group-text">آدرس گوگل مپ</span>
                                                <input type="text" id="inputPropertyGoogleMap" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-4 col-sm-6 mb-2">
                                            <div class="input-group">
                                                <span class="input-group-text">آدرس نشان</span>
                                                <input type="text" id="inputPropertyNeshan" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-4 col-sm-6 mb-2">
                                            <div class="input-group">
                                                <span class="input-group-text">آدرس بلد</span>
                                                <input type="text" id="inputPropertyBalad" class="form-control">
                                            </div>
                                        </div>

                                    </div>

                                </div>
                                <div class="tab-pane fade" id="primaryprofileOwner" role="tabpanel">

                                    <style>
                                        #primaryprofileOwner .input-group-text {
                                            min-width: 200px;
                                        }
                                    </style>
                                    <div class="row">
                                        <div class="col-12 col-md-6 col-sm-6 mb-2">
                                            <div class="input-group">
                                                <span class="input-group-text">درصد مالکیت مالک بر ملک</span>
                                                <input type="text" id="inputFinalPropertyPercentageOwnership" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-sm-6 mb-2">
                                            <div class="input-group">
                                                <span class="input-group-text">نحوه تملک</span>
                                                <select class="form-select" id="inputFinalPropertyAcquire"
                                                        data-placeholder="یک مورد راانتخاب کنید">
                                                    <option></option>
                                                    <?php foreach ($enum['PROPERTY_BUY_TYPE'] as $key => $value) { ?>
                                                        <option value="<?php echo $key; ?>">
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
                                                        <option value="<?php echo $key; ?>">
                                                            <?php echo $value; ?>
                                                        </option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-sm-6 mb-2">
                                            <div class="input-group">
                                                <span class="input-group-text">تاریخ تملک/خرید تحصیل</span>
                                                <input type="text" id="inputFinalPropertyBuyDate" name="<?php echo md5(rand()); ?>" class="form-control" data-jdp>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-sm-6 mb-2">
                                            <div class="input-group">
                                                <span class="input-group-text">مازاد بودن ملک</span>
                                                <select class="form-select" id="inputFinalPropertySurplus"
                                                        data-placeholder="یک مورد راانتخاب کنید">
                                                    <option></option>
                                                    <?php foreach ($enum['YES_NO'] as $key => $value) { ?>
                                                        <option value="<?php echo $key; ?>">
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
                                                        <option value="<?php echo $key; ?>">
                                                            <?php echo $value; ?>
                                                        </option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-sm-6 mb-2">
                                            <div class="input-group">
                                                <span class="input-group-text">منشا ایجاد استثنا</span>
                                                <input type="text" id="inputFinalPropertyExcludeReason" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-sm-6 mb-2">
                                            <div class="input-group">
                                                <span class="input-group-text">بلامعارض بودن</span>
                                                <select class="form-select" id="inputFinalPropertyUnopposed"
                                                        data-placeholder="یک مورد راانتخاب کنید">
                                                    <option></option>
                                                    <?php foreach ($enum['YES_NO'] as $key => $value) { ?>
                                                        <option value="<?php echo $key; ?>">
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
                                                        <option value="<?php echo $key; ?>">
                                                            <?php echo $value; ?>
                                                        </option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-sm-6 mb-2">
                                            <div class="input-group">
                                                <span class="input-group-text">تاریخ آخرین حکم</span>
                                                <input type="text" id="inputFinalPropertyOrderDate" name="<?php echo md5(rand()); ?>" class="form-control" data-jdp>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-sm-6 mb-2">
                                            <div class="input-group">
                                                <span class="input-group-text">نتیجه حکم صادره</span>
                                                <select class="form-select" id="inputFinalPropertyVote"
                                                        data-placeholder="یک مورد راانتخاب کنید">
                                                    <option></option>
                                                    <?php foreach ($enum['PROPERTY_JUDGE_RESULT'] as $key => $value) { ?>
                                                        <option value="<?php echo $key; ?>">
                                                            <?php echo $value; ?>
                                                        </option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-12 col-sm-12 mb-2">
                                            <div class="input-group">
                                                <span class="input-group-text">ارزش برآوردي خروج منافع درصورت حکم عليه</span>
                                                <input type="text" id="inputFinalPropertyWithdrawBenefit" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-sm-6 mb-2">
                                            <div class="input-group">
                                                <span class="input-group-text">قطعی یا وکالتی بودن سند</span>
                                                <select class="form-select" id="inputFinalPropertyDocFinalStatus"
                                                        data-placeholder="یک مورد راانتخاب کنید">
                                                    <option></option>
                                                    <?php foreach ($enum['PROPERTY_DOC_EXACT'] as $key => $value) { ?>
                                                        <option value="<?php echo $key; ?>">
                                                            <?php echo $value; ?>
                                                        </option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-sm-6 mb-2">
                                            <div class="input-group">
                                                <span class="input-group-text">سرفصل خلاصه دفترکل طبقه بندی شده ملک</span>
                                                <input type="text" id="inputFinalPropertySummary" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-sm-6 mb-2">
                                            <div class="input-group">
                                                <span class="input-group-text">ارزش دفتری</span>
                                                <input type="text" id="inputFinalPropertyValue" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-sm-6 mb-2">
                                            <div class="input-group">
                                                <span class="input-group-text">تاریخ آخرین کارشناسی رسمی</span>
                                                <input type="text" id="inputFinalPropertyValueCheck" name="<?php echo md5(rand()); ?>" class="form-control" data-jdp>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-sm-6 mb-2">
                                            <div class="input-group">
                                                <span class="input-group-text">ارزش آخرین کارشناسی رسمی</span>
                                                <input type="text" id="inputFinalPropertyCheckValue" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-sm-6 mb-2">
                                            <div class="input-group">
                                                <span class="input-group-text">مرجع کارشناسی</span>
                                                <input type="text" id="inputFinalPropertySurvey" class="form-control">
                                            </div>
                                        </div>


                                    </div>

                                </div>
                                <div class="tab-pane fade" id="primarysave" role="tabpanel">
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
    </div>
</div>
<!--end row-->


<div class="form-group d-none alert-form">
    <label class="mb-2">نوع سند را انتخاب کنید</label>
    <select class="type form-control mb-2">
        <?php foreach ($enum['REQ_DOC_TYPE'] as $k => $v) { ?>
            <option style="background-color: #0b0d0f;" value="<?php echo $k; ?>"><?php echo $v; ?></option>
        <?php } ?>
    </select>
    <label class="name-title mb-2">عنوان سند را وارد کنید</label>
    <input type="text" placeholder="اینجا بنویسید" class="name form-control" required/>
</div>
