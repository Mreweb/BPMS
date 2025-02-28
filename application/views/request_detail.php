
<div class="card">
    <div class="card-body">
        <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active" data-bs-toggle="tab" href="#primaryhome" role="tab" aria-selected="true">
                    <div class="d-flex align-items-center">
                        <div class="tab-icon"><i class="bx bx-home font-18 me-1"></i>
                        </div>
                        <div class="tab-title">فرم درخواست</div>
                    </div>
                </a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" data-bs-toggle="tab" href="#primaryprofile" role="tab" aria-selected="false" tabindex="-1">
                    <div class="d-flex align-items-center">
                        <div class="tab-icon"><i class="bx bx-user-pin font-18 me-1"></i>
                        </div>
                        <div class="tab-title">اطلاعات ملک</div>
                    </div>
                </a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" data-bs-toggle="tab" href="#primarycontact" role="tab" aria-selected="false" tabindex="-1">
                    <div class="d-flex align-items-center">
                        <div class="tab-icon"><i class="bx bx-user-pin font-18 me-1"></i>
                        </div>
                        <div class="tab-title">اطلاعات مالک</div>
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
                            <span class="input-group-text">کاربری</span>
                            <select class="form-select" id="inputReqUseType"
                                    data-placeholder="یک مورد راانتخاب کنید">
                                <option></option>
                                <?php foreach ($enum['USE_TYPE'] as $key => $value) { ?>
                                    <option <?php setOptionSelected($key, $request['ReqUseType']); ?>
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
                    <div class="col-12 col-md-6 col-sm-6 mb-2">
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
                    <div class="col-12 col-md-6 col-sm-6 mb-2">
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


                        <?php  if($request['ReqStatus'] == 'DRAFT'){ ?>
                            <div class="input-group">
                                <span class="input-group-text">اسناد را بارگذاری کنید</span>
                                <input
                                    type="file"
                                    id="file"
                                    aria-label=""
                                    class="form-control">
                            </div>
                        <?php  } ?>

                        <div class="uploaded-files mt-3">
                            <table class="table table-bordered table-hover table-stripped">
                                <thead>
                                <tr>
                                    <th>عنوان</th>
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
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
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
                                <?php setInputValue($request['PropertyID']); ?>
                                   id="inputPropertyID" class="form-control">
                        </div>
                    </div>
                    <div class="col-12 col-md-4 col-sm-6 mb-2">
                        <div class="input-group">
                            <span class="input-group-text">تاریخ ثبت</span>
                            <input type="text" <?php setInputValue($request['PropertyRegisterDate']); ?>
                                   id="inputPropertyRegisterDate" class="form-control">
                        </div>
                    </div>
                    <div class="col-12 col-md-4 col-sm-6 mb-2">
                        <div class="input-group">
                            <span class="input-group-text">نوع ملک</span>
                            <select class="form-select" id="inputPropertyType" data-placeholder="یک مورد راانتخاب کنید">
                                <option></option>
                                <?php foreach ($enum['REQ_TYPE'] as $key => $value) { ?>
                                    <option <?php setOptionSelected($key, $request['PropertyType']); ?>
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
                                <?php setInputValue($request['PropertySpecialStatus']); ?>
                                   id="inputPropertySpecialStatus" class="form-control">
                        </div>
                    </div>
                    <div class="col-12 col-md-4 col-sm-6 mb-2">
                        <div class="input-group">
                            <span class="input-group-text">کاربری</span>
                            <select class="form-select" id="inputPropertyUseType" data-placeholder="یک مورد راانتخاب کنید">
                                <option></option>
                                <?php foreach ($enum['USE_TYPE'] as $key => $value) { ?>
                                    <option <?php setOptionSelected($key, $request['PropertyUseType']); ?>
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
                            <select class="form-select" id="inputPropertyDocType" data-placeholder="یک مورد راانتخاب کنید">
                                <option></option>
                                <?php foreach ($enum['DOC_TYPE'] as $key => $value) { ?>
                                    <option <?php setOptionSelected($key, $request['PropertyDocType']); ?>
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
                                <?php setInputValue($request['PropertyUseReason']); ?>
                                   id="inputPropertyUseReason" class="form-control">
                        </div>
                    </div>
                    <div class="col-12 col-md-4 col-sm-6 mb-2">
                        <div class="input-group">
                            <span class="input-group-text">شناسه یکتا</span>
                            <input type="text"
                                <?php setInputValue($request['PropertyUUID']); ?>
                                   id="inputPropertyUUID" class="form-control">
                        </div>
                    </div>
                    <div class="col-12 col-md-4 col-sm-6 mb-2">
                        <div class="input-group">
                            <span class="input-group-text">رمز تصدیق</span>
                            <input type="text"
                                <?php setInputValue($request['PropertyPassword']); ?>
                                   id="inputPropertyPassword" class="form-control">
                        </div>
                    </div>
                    <div class="col-12 col-md-4 col-sm-6 mb-2">
                        <div class="input-group">
                            <span class="input-group-text">مساحت عرصه</span>
                            <input type="text"
                                <?php setInputValue($request['PropertyAreaSupply']); ?>
                                   id="inputPropertyAreaSupply" class="form-control">
                        </div>
                    </div>
                    <div class="col-12 col-md-4 col-sm-6 mb-2">
                        <div class="input-group">
                            <span class="input-group-text">مساحت اعیان</span>
                            <input type="text"
                                <?php setInputValue($request['PropertyAreaNobility']); ?>
                                   id="inputPropertyAreaNobility" class="form-control">
                        </div>
                    </div>
                    <div class="col-12 col-md-4 col-sm-6 mb-2">
                        <div class="input-group">
                            <span class="input-group-text">پلاک ثبتی (اصلی- فرعی)</span>
                            <input type="text"
                                <?php setInputValue($request['PropertyRegistrationPlate']); ?>
                                   id="inputPropertyRegistrationPlate" class="form-control">
                        </div>
                    </div>
                    <div class="col-12 col-md-4 col-sm-6 mb-2">
                        <div class="input-group">
                            <span class="input-group-text">مفروز از مجزی از</span>
                            <select class="form-select" id="inputPropertySeparate" data-placeholder="یک مورد راانتخاب کنید">
                                <option></option>
                                <?php foreach ($enum['YES_NO'] as $key => $value) { ?>
                                    <option <?php setOptionSelected($key, $request['PropertySeparate']); ?>
                                        value="<?php echo $key; ?>">
                                        <?php echo $value; ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-12 col-md-4 col-sm-6 mb-2">
                        <div class="input-group">
                            <span class="input-group-text">قطعه</span>
                            <input type="text"
                                <?php setInputValue($request['PropertyPiece']); ?>
                                   id="inputPropertyPiece" class="form-control">
                        </div>
                    </div>
                    <div class="col-12 col-md-4 col-sm-6 mb-2">
                        <div class="input-group">
                            <span class="input-group-text">بخش ثبتی</span>
                            <input type="text"
                                <?php setInputValue($request['PropertyRegistrationDepartment']); ?>
                                   id="inputPropertyRegistrationDepartment" class="form-control">
                        </div>
                    </div>
                    <div class="col-12 col-md-4 col-sm-6 mb-2">
                        <div class="input-group">
                            <span class="input-group-text">ناحیه</span>
                            <input type="text"
                                <?php setInputValue($request['PropertyDistrict']); ?>
                                   id="inputPropertyDistrict" class="form-control">
                        </div>
                    </div>
                    <div class="col-12 col-md-4 col-sm-6 mb-2">
                        <div class="input-group">
                            <span class="input-group-text">بلوک</span>
                            <input type="text"
                                <?php setInputValue($request['PropertyBlock']); ?>
                                   id="inputPropertyBlock" class="form-control">
                        </div>
                    </div>
                    <div class="col-12 col-md-4 col-sm-6 mb-2">
                        <div class="input-group">
                            <span class="input-group-text">طبقه</span>
                            <input type="text"
                                <?php setInputValue($request['PropertyFloor']); ?>
                                   id="inputPropertyFloor" class="form-control">
                        </div>
                    </div>
                    <div class="col-12 col-md-4 col-sm-6 mb-2">
                        <div class="input-group">
                            <span class="input-group-text">سمت</span>
                            <input type="text"
                                <?php setInputValue($request['PropertySide']); ?>
                                   id="inputPropertySide" class="form-control">
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
                                <?php setInputValue($request['OwnerNationalCode']); ?>
                                   id="inputOwnerNationalCode" class="form-control">
                        </div>
                    </div>
                    <div class="col-12 col-md-4 col-sm-6 mb-2">
                        <div class="input-group">
                            <span class="input-group-text">نام مالک(شرکت - موسسه اعتباری)</span>
                            <input type="text"
                                <?php setInputValue($request['OwnerName']); ?>
                                   id="inputOwnerName" class="form-control">
                        </div>
                    </div>
                    <div class="col-12 col-md-4 col-sm-6 mb-2">
                        <div class="input-group">
                            <span class="input-group-text">رابطه با بانک</span>
                            <input type="text"
                                <?php setInputValue($request['OwnerBankRelation']); ?>
                                   id="inputOwnerBankRelation" class="form-control">
                        </div>
                    </div>
                    <div class="col-12 col-md-4 col-sm-6 mb-2">
                        <div class="input-group">
                            <span class="input-group-text">نوع شرکت</span>
                            <select class="form-select" id="inputOwnerCompanyType" data-placeholder="یک مورد راانتخاب کنید">
                                <option></option>
                                <?php foreach ($enum['CompanyType'] as $key => $value) { ?>
                                    <option <?php setOptionSelected($key, $request['OwnerCompanyType']); ?>
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
                            <input type="text"
                                <?php setInputValue($request['OwnerTypeDependentPerson']); ?>
                                   id="inputOwnerTypeDependentPerson" class="form-control">
                        </div>
                    </div>
                    <div class="col-12 col-md-4 col-sm-6 mb-2">
                        <div class="input-group">
                            <span class="input-group-text">درصد مالیکت موسسه اعتباری بر شخص وابسته</span>
                            <input type="text"
                                <?php setInputValue($request['OwnerOwnershipPercentage']); ?>
                                   id="inputOwnerOwnershipPercentage" class="form-control">
                        </div>
                    </div>

                </div>


            </div>
        </div>
    </div>
</div>