<?php $_DIR = base_url(); ?>

<!--start page wrapper -->
<div class="page-wrapper">

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
                                <a class="nav-link" data-bs-toggle="tab" href="#primaryprofileOwner" role="tab"
                                   aria-selected="false" tabindex="-1">
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
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" data-bs-toggle="tab" href="#primarynote" role="tab"
                                   aria-selected="false" tabindex="-1">
                                    <div class="d-flex align-items-center">
                                        <div class="tab-icon"><i class="bx bx-user-pin font-18 me-1"></i>
                                        </div>
                                        <div class="tab-title">یادداشت ها و توضیحات</div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content py-3">
                            <div class="tab-pane fade active show" id="primaryhome" role="tabpanel">

                                <div class="row">
                                    <div class="col-12 col-md-6 col-sm-6 mb-2">
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
                                    <div class="col-12 col-md-6 col-sm-6 mb-2">
                                        <div class="input-group">
                                            <span class="input-group-text">نوع</span>
                                            <select class="form-select" id="inputReqType"
                                                    data-placeholder="یک مورد راانتخاب کنید">
                                                <option></option>
                                                <?php foreach ($enum['REQ_TYPE'] as $key => $value) { ?>
                                                    <option
                                                        <?php setOptionSelected($key, $request['ReqType']); ?>
                                                            value="<?php echo $key; ?>">
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
                                                <?php setInputValue($request['ReqPrice']); ?>
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
                                                <?php setInputValue($request['ReqAgentNationalCode']); ?>
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
                                                <?php setInputValue($request['ReqMarketMakerNationalCode']); ?>
                                                    aria-label=""
                                                    class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 mb-3">
                                        <label class="col-sm-12 col-md-3 mb-3">توضیحات</label>
                                        <textarea rows="6" id="inputDescription"
                                                  class="form-control"><?php echo nl2br($request['ReqDescription']); ?></textarea>
                                    </div>
                                    <div class="col-sm-12 mb-3">
                                        <?php include VIEWPATH . 'alerts.php'; ?>


                                        <?php if ($request['ReqStatus'] == 'DRAFT') { ?>
                                            <div class="input-group">
                                                <span class="input-group-text">اسناد را بارگذاری کنید</span>
                                                <input
                                                        type="file"
                                                        id="file"
                                                        aria-label=""
                                                        class="form-control">
                                            </div>
                                        <?php } ?>

                                        <div class="uploaded-files mt-3">
                                            <table class="table table-bordered table-hover table-stripped">
                                                <thead>
                                                <tr>
                                                    <th>عنوان</th>
                                                    <th>حذف</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php foreach ($request_attachment as $item) { ?>
                                                    <tr data-type='<?php echo $item['AttachType']; ?>'
                                                        data-name='<?php echo $item['AttachTitle']; ?>'
                                                        data-src='<?php echo $item['AttachUrl']; ?>'>
                                                        <td><a target="_blank"
                                                               href="<?php echo $item['AttachUrl']; ?>"><?php echo $item['AttachTitle']; ?></a>
                                                        </td>
                                                        <td class='fit'>
                                                            <button class='btn btn-danger btn-sm remove-file'>X
                                                            </button>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                                </tbody>
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
                                            <input type="text"
                                                <?php setInputValue($request_owner_info['OwnerNationalCode']); ?>
                                                   id="inputOwnerNationalCode" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4 col-sm-6 mb-2">
                                        <div class="input-group">
                                            <span class="input-group-text">نام مالک(شرکت - موسسه اعتباری)</span>
                                            <input type="text"
                                                <?php setInputValue($request_owner_info['OwnerName']); ?>
                                                   id="inputOwnerName" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4 col-sm-6 mb-2">
                                        <div class="input-group">
                                            <span class="input-group-text">رابطه با بانک</span>

                                            <select class="form-select" id="inputOwnerBankRelation"
                                                    data-placeholder="یک مورد راانتخاب کنید">
                                                <option></option>
                                                <?php foreach ($enum['BANK_RELATION'] as $key => $value) { ?>
                                                    <option
                                                        <?php setOptionSelected($key, $request_owner_info['OwnerBankRelation']); ?>
                                                            value="<?php echo $key; ?>">
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
                                                    <option <?php setOptionSelected($key, $request_owner_info['OwnerCompanyType']); ?>
                                                            value="<?php echo $key; ?>">
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
                                                    <option <?php setOptionSelected($key, $request_owner_info['OwnerTypeDependentPerson']); ?>
                                                            value="<?php echo $key; ?>">
                                                        <?php echo $value; ?>
                                                    </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4 col-sm-6 mb-2">
                                        <div class="input-group">
                                            <span class="input-group-text">درصد مالیکت موسسه اعتباری بر شخص وابسته</span>
                                            <input type="text"
                                                <?php setInputValue($request_owner_info['OwnerOwnershipPercentage']); ?>
                                                   id="inputOwnerOwnershipPercentage" class="form-control">
                                        </div>
                                    </div>

                                </div>

                            </div>
                            <div class="tab-pane fade" id="primaryprofile" role="tabpanel">

                                <div class="row">
                                    <div class="col-12 col-md-4 col-sm-6 mb-2">
                                        <div class="input-group">
                                            <span class="input-group-text">شناسه ملک</span>
                                            <input type="text"
                                                <?php setInputValue($request_property_info['PropertyID']); ?>
                                                   id="inputPropertyID" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4 col-sm-6 mb-2">
                                        <div class="input-group">
                                            <span class="input-group-text">تاریخ ثبت</span>
                                            <input type="text" <?php setInputValue($request_property_info['PropertyRegisterDate']); ?>
                                                   id="inputPropertyRegisterDate" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4 col-sm-6 mb-2">
                                        <div class="input-group">
                                            <span class="input-group-text">نوع ملک</span>
                                            <select class="form-select" id="inputPropertyType"
                                                    data-placeholder="یک مورد راانتخاب کنید">
                                                <option></option>
                                                <?php foreach ($enum['PROPERTY_TYPE'] as $key => $value) { ?>
                                                    <option <?php setOptionSelected($key, $request_property_info['PropertyType']); ?>
                                                            value="<?php echo $key; ?>">
                                                        <?php echo $value; ?>
                                                    </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4 col-sm-6 mb-2">
                                        <div class="input-group">
                                            <span class="input-group-text">وضعیت خاص</span>
                                            <input type="text"
                                                <?php setInputValue($request_property_info['PropertySpecialStatus']); ?>
                                                   id="inputPropertySpecialStatus" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4 col-sm-6 mb-2">
                                        <div class="input-group">
                                            <span class="input-group-text">کاربری</span>
                                            <select class="form-select" id="inputPropertyUseType"
                                                    data-placeholder="یک مورد راانتخاب کنید">
                                                <option></option>
                                                <?php foreach ($enum['USE_TYPE'] as $key => $value) { ?>
                                                    <option <?php setOptionSelected($key, $request_property_info['PropertyUseType']); ?>
                                                            value="<?php echo $key; ?>">
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
                                                    <option <?php setOptionSelected($key, $request_property_info['PropertyDocType']); ?>
                                                            value="<?php echo $key; ?>">
                                                        <?php echo $value; ?>
                                                    </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4 col-sm-6 mb-2">
                                        <div class="input-group">
                                            <span class="input-group-text">دلیل استفاده</span>
                                            <input type="text"
                                                <?php setInputValue($request_property_info['PropertyUseReason']); ?>
                                                   id="inputPropertyUseReason" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4 col-sm-6 mb-2">
                                        <div class="input-group">
                                            <span class="input-group-text">شناسه یکتا</span>
                                            <input type="text"
                                                <?php setInputValue($request_property_info['PropertyUUID']); ?>
                                                   id="inputPropertyUUID" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4 col-sm-6 mb-2">
                                        <div class="input-group">
                                            <span class="input-group-text">رمز تصدیق</span>
                                            <input type="text"
                                                <?php setInputValue($request_property_info['PropertyPassword']); ?>
                                                   id="inputPropertyPassword" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4 col-sm-6 mb-2">
                                        <div class="input-group">
                                            <span class="input-group-text">مساحت عرصه</span>
                                            <input type="text"
                                                <?php setInputValue($request_property_info['PropertyAreaSupply']); ?>
                                                   id="inputPropertyAreaSupply" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4 col-sm-6 mb-2">
                                        <div class="input-group">
                                            <span class="input-group-text">مساحت اعیان</span>
                                            <input type="text"
                                                <?php setInputValue($request_property_info['PropertyAreaNobility']); ?>
                                                   id="inputPropertyAreaNobility" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4 col-sm-6 mb-2">
                                        <div class="input-group">
                                            <span class="input-group-text">پلاک ثبتی (اصلی- فرعی)</span>
                                            <input type="text"
                                                <?php setInputValue($request_property_info['PropertyRegistrationPlate']); ?>
                                                   id="inputPropertyRegistrationPlate" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4 col-sm-6 mb-2">
                                        <div class="input-group">
                                            <span class="input-group-text">مفروز از مجزی از</span>
                                            <input type="text"
                                                <?php setInputValue($request_property_info['PropertySeparate']); ?>
                                                   id="inputPropertySeparate" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4 col-sm-6 mb-2">
                                        <div class="input-group">
                                            <span class="input-group-text">قطعه</span>
                                            <input type="text"
                                                <?php setInputValue($request_property_info['PropertyPiece']); ?>
                                                   id="inputPropertyPiece" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4 col-sm-6 mb-2">
                                        <div class="input-group">
                                            <span class="input-group-text">بخش ثبتی</span>
                                            <input type="text"
                                                <?php setInputValue($request_property_info['PropertyRegistrationDepartment']); ?>
                                                   id="inputPropertyRegistrationDepartment" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4 col-sm-6 mb-2">
                                        <div class="input-group">
                                            <span class="input-group-text">ناحیه</span>
                                            <input type="text"
                                                <?php setInputValue($request_property_info['PropertyDistrict']); ?>
                                                   id="inputPropertyDistrict" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4 col-sm-6 mb-2">
                                        <div class="input-group">
                                            <span class="input-group-text">بلوک</span>
                                            <input type="text"
                                                <?php setInputValue($request_property_info['PropertyBlock']); ?>
                                                   id="inputPropertyBlock" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4 col-sm-6 mb-2">
                                        <div class="input-group">
                                            <span class="input-group-text">طبقه</span>
                                            <input type="text"
                                                <?php setInputValue($request_property_info['PropertyFloor']); ?>
                                                   id="inputPropertyFloor" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4 col-sm-6 mb-2">
                                        <div class="input-group">
                                            <span class="input-group-text">سمت</span>
                                            <input type="text"
                                                <?php setInputValue($request_property_info['PropertySide']); ?>
                                                   id="inputPropertySide" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4 col-sm-6 mb-2">
                                        <div class="input-group">
                                            <span class="input-group-text">سال ساخت</span>
                                            <input
                                                <?php setInputValue($request_property_info['PropertyBuildYear']); ?>
                                                    type="text" id="inputPropertyBuildYear" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4 col-sm-6 mb-2">
                                        <div class="input-group">
                                            <span class="input-group-text">کد پستی</span>
                                            <input
                                                <?php setInputValue($request_property_info['PropertyPostalCode']); ?>
                                                    type="text" id="inputPropertyPostalCode" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4 col-sm-6 mb-2">
                                        <div class="input-group">
                                            <span class="input-group-text">آدرس</span>
                                            <input
                                                <?php setInputValue($request_property_info['PropertyAddress']); ?>
                                                    type="text" id="inputPropertyAddress" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4 col-sm-6 mb-2">
                                        <div class="input-group">
                                            <span class="input-group-text">پهنه کاربری</span>
                                            <input
                                                <?php setInputValue($request_property_info['PropertyUseTypeSide']); ?>
                                                    type="text" id="inputPropertyUseTypeSide" class="form-control">
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
                                                   id="inputFinalPropertyBuyDate" class="form-control">
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
                                                   id="inputFinalPropertyOrderDate" class="form-control">
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
                                                   id="inputFinalPropertyValueCheck" class="form-control">
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
                                    <?php if ($request['ReqStatus'] == 'DRAFT') { ?>
                                        <div class="col-12 text-end mb-2">
                                            <button id="do_save" class="btn btn-success">ذخیره</button>
                                        </div>
                                    <?php } else { ?>
                                        <div class="alert bg-danger text-white">
                                            درخواست در مرحله بررسی بوده و قابل ویرایش نمی باشد.
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>


                            <div class="tab-pane fade" id="primarynote" role="tabpanel">
                                <div class="col-12 text-start mb-2">
                                    <div class="col-12 mx-auto">
                                        <?php include APPPATH . 'views/request_comment.php'; ?>
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
