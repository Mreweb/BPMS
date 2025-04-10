<div class="main-body">
    <div class="row">
        <div class="col-lg-5">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex flex-column align-items-center text-center">
                        <div class="mt-3">
                            <h4><?php echo($request['ReqTitle']); ?></h4>
                        </div>
                    </div>
                    <hr class="my-4"/>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-0">نوع</h6>
                            <span class="text-white">
                                 <?php
                                 foreach ($enum['REQ_TYPE'] as $key => $value) {
                                     if ($key == $request['ReqType']) {
                                         echo $value;
                                     }
                                 }
                                 ?>
                            </span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-0">کاربری</h6>
                            <span class="text-white">
                                 <?php foreach ($enum['USE_TYPE'] as $key => $value) {
                                     if ($key == $request['ReqUseType']) {
                                         echo $value;
                                     }
                                 } ?>
                            </span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-0">ارزش گذاری رسمی</h6>
                            <span class="text-white"><?php echo $request['ReqPrice']; ?></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-0">کد ملی نماینده</h6>
                            <span class="text-white"><?php echo $request['ReqAgentNationalCode']; ?></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-0">کد ملی بازارگردان</h6>
                            <span class="text-white"><?php echo $request['ReqMarketMakerNationalCode']; ?></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <span class="text-white"
                                  style="text-align:justify"><?php echo $request['ReqDescription']; ?></span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="d-flex align-items-center mb-3 bg bg-success alert">اسناد بارگذاری شده</h5>

                            <div class="mt-3">
                                <table class="table table-bordered table-hover table-stripped">
                                    <thead>
                                    <tr>
                                        <th>عنوان</th>
                                        <th class="fit">دریافت فایل</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($request_attachment as $item) { ?>
                                        <tr>
                                            <td><?php echo $item['AttachTitle']; ?></td>
                                            <td class="fit">
                                                <a target="_blank" href="<?php echo $item['AttachUrl']; ?>">
                                                    <button class="btn btn-success">دریافت فایل</button>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <h5 class="d-flex align-items-center mb-3 bg bg-success alert">تصاویر بارگذاری شده</h5>

                            <div class="mt-3">
                                <table class="table table-bordered table-hover table-stripped">
                                    <thead>
                                    <tr>
                                        <th>عنوان</th>
                                        <th class="fit">دریافت فایل</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($request_attachment_images as $item) { ?>
                                        <tr>
                                            <td><img width="100" height="100" src="<?php echo $item['Image']; ?>" /></td>
                                            <td class="fit">
                                                <a target="_blank" href="<?php echo $item['Image']; ?>">
                                                    <button class="btn btn-success">دریافت فایل</button>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <h5 class="d-flex align-items-center mb-3 bg bg-success alert">لوکیشن</h5>

                            <div class="mt-3">
                                <table class="table table-bordered table-hover table-stripped">
                                    <thead>
                                    <tr>
                                        <th>عنوان</th>
                                        <th class="fit">مشاهده</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>گوگل مپ</td>
                                            <td class="fit">
                                                <a target="_blank" href="<?php echo $request_property_locations['Google']; ?>">
                                                    <button class="btn btn-success">مشاهده</button>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>نشان</td>
                                            <td class="fit">
                                                <a target="_blank" href="<?php echo $request_property_locations['Neshan']; ?>">
                                                    <button class="btn btn-success">مشاهده</button>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>بلد</td>
                                            <td class="fit">
                                                <a target="_blank" href="<?php echo $request_property_locations['Balad']; ?>">
                                                    <button class="btn btn-success">مشاهده</button>
                                                </a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>



                    <div class="card">
                        <div class="card-body">
                            <h5 class="d-flex align-items-center mb-3 bg bg-success alert">اطلاعات ملک</h5>

                            <div class="mt-3">
                                <table class="table table-bordered table-hover table-stripped">
                                    <tbody>
                                    <tr>
                                        <td>شناسه ملک</td>
                                        <td class="fit"><?php echo $request_property_info['PropertyID']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>تاریخ ثبت</td>
                                        <td class="fit"><?php echo $request_property_info['PropertyRegisterDate']; ?></td>
                                    </tr>

                                    <tr>
                                        <td>کاربری</td>
                                        <td class="fit"><?php foreach ($enum['USE_TYPE'] as $key => $value) {
                                                if ($key == $request_property_info['PropertyUseType']) {
                                                    echo $value;
                                                }
                                            } ?></td>
                                    </tr>
                                    <tr>
                                        <td>نوع سند</td>
                                        <td class="fit"><?php foreach ($enum['DOC_TYPE'] as $key => $value) {
                                                if ($key == $request_property_info['PropertyDocType']) {
                                                    echo $value;
                                                }
                                            } ?></td>
                                    </tr>
                                    <tr>
                                        <td>دلیل استفاده</td>
                                        <td class="fit"><?php echo $request_property_info['PropertyUseReason']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>شناسه یکتا</td>
                                        <td class="fit"><?php echo $request_property_info['PropertyUUID']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>رمز تصدیق</td>
                                        <td class="fit"><?php echo $request_property_info['PropertyPassword']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>مساحت عرصه</td>
                                        <td class="fit"><?php echo $request_property_info['PropertyAreaSupply']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>مساحت اعیان</td>
                                        <td class="fit"><?php echo $request_property_info['PropertyAreaNobility']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>پلاک ثبتی (اصلی- فرعی)</td>
                                        <td class="fit"><?php echo $request_property_info['PropertyRegistrationPlate']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>مفروز از مجزی از</td>
                                        <td class="fit"><?php foreach ($enum['YES_NO'] as $key => $value) {
                                                if ($key == $request_property_info['PropertySeparate']) {
                                                    echo $value;
                                                }
                                            } ?></td>
                                    </tr>
                                    <tr>
                                        <td>قطعه</td>
                                        <td class="fit"><?php echo $request_property_info['PropertyPiece']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>بخش ثبتی</td>
                                        <td class="fit"><?php echo $request_property_info['PropertyRegistrationDepartment']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>ناحیه</td>
                                        <td class="fit"><?php echo $request_property_info['PropertyDistrict']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>بلوک</td>
                                        <td class="fit"><?php echo $request_property_info['PropertyBlock']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>طبقه</td>
                                        <td class="fit"><?php echo $request_property_info['PropertyFloor']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>سمت</td>
                                        <td class="fit"><?php echo $request_property_info['PropertySide']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>سال ساخت</td>
                                        <td class="fit"><?php echo $request_property_info['PropertyBuildYear']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>کد پستی</td>
                                        <td class="fit"><?php echo $request_property_info['PropertyPostalCode']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>آدرس</td>
                                        <td class="fit"><?php echo $request_property_info['PropertyAddress']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>پهنه کاربری</td>
                                        <td class="fit"><?php echo $request_property_info['PropertyUseTypeSide']; ?></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h5 class="d-flex align-items-center mb-3 bg bg-success alert">اطلاعات مالک</h5>
                            <div class="mt-3">
                                <table class="table table-bordered table-hover table-stripped">
                                    <tbody>
                                    <tr>
                                        <td>شناسه ملی مالک</td>
                                        <td class="fit"><?php echo $request_owner_info['OwnerNationalCode']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>نام مالک(شرکت - موسسه اعتباری)</td>
                                        <td class="fit"><?php echo $request_owner_info['OwnerName']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>رابطه با بانک</td>
                                        <td class="fit"><?php foreach ($enum['BANK_RELATION'] as $key => $value) {
                                                if ($key == $request_owner_info['OwnerBankRelation']) {
                                                    echo $value;
                                                }
                                            } ?></td>
                                    </tr>
                                    <tr>
                                        <td>نوع شرکت شرکت تضامني</td>
                                        <td class="fit"><?php foreach ($enum['COMPANY_TYPE'] as $key => $value) {
                                                if ($key == $request_owner_info['OwnerCompanyType']) {
                                                    echo $value;
                                                }
                                            } ?></td>
                                    </tr>
                                    <tr>
                                        <td>نوع شخص وابسته</td>
                                        <td class="fit"><?php foreach ($enum['PERSON_RELATION_TYPE'] as $key => $value) {
                                                if ($key == $request_owner_info['OwnerTypeDependentPerson']) {
                                                    echo $value;
                                                }
                                            } ?></td>
                                    </tr>
                                    <tr>
                                        <td>درصد مالیکت موسسه اعتباری بر شخص وابسته</td>
                                        <td class="fit"><?php echo $request_owner_info['OwnerOwnershipPercentage']; ?></td>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <?php if (!empty($request_central_bank_info)) { ?>
                        <div class="card">
                            <div class="card-body">
                                <h5 class="d-flex align-items-center mb-3 bg bg-success alert">اطلاعات تملک (وارد شده
                                    توسط بانک مرکزی)</h5>
                                <div class="mt-3">
                                    <table class="table table-bordered table-hover table-stripped">
                                        <tbody>
                                        <tr>
                                            <td>درصد مالکیت مالک بر ملک</td>
                                            <td class="fit"><?php echo $request_central_bank_info['FinalPropertyPercentageOwnership']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>نحوه تملک</td>
                                            <td class="fit"><?php foreach ($enum['PROPERTY_BUY_TYPE'] as $key => $value) {
                                                    if ($key == $request_central_bank_info['FinalPropertyAcquire']) {
                                                        echo $value;
                                                    }
                                                } ?></td>
                                        </tr>
                                        <tr>
                                            <td>نوع دارایی</td>
                                            <td class="fit"><?php foreach ($enum['PROPERTY_TYPE'] as $key => $value) {
                                                    if ($key == $request_central_bank_info['FinalPropertyType']) {
                                                        echo $value;
                                                    }
                                                } ?></td>
                                        </tr>
                                        <tr>
                                            <td>درصد مالکیت مالک بر ملک</td>
                                            <td class="fit"><?php echo $request_central_bank_info['FinalPropertyPercentageOwnership']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>مازاد بودن ملک</td>
                                            <td class="fit"><?php foreach ($enum['YES_NO'] as $key => $value) {
                                                    if ($key == $request_central_bank_info['FinalPropertySurplus']) {
                                                        echo $value;
                                                    }
                                                } ?></td>
                                        </tr>
                                        <tr>
                                            <td>تاریخ تملک/خرید تحصیل</td>
                                            <td class="fit"><?php echo $request_central_bank_info['FinalPropertyBuyDate']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>مستثنی بودن ملک</td>
                                            <td class="fit"><?php foreach ($enum['YES_NO'] as $key => $value) {
                                                    if ($key == $request_central_bank_info['FinalPropertyExcluded']) {
                                                        echo $value;
                                                    }
                                                } ?></td>
                                        </tr>
                                        <tr>
                                            <td>منشا ایجاد استثنا</td>
                                            <td class="fit"><?php echo $request_central_bank_info['FinalPropertyExcludeReason']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>بلامعارض بودن</td>
                                            <td class="fit"><?php foreach ($enum['YES_NO'] as $key => $value) {
                                                    if ($key == $request_central_bank_info['FinalPropertyUnopposed']) {
                                                        echo $value;
                                                    }
                                                } ?></td>
                                        </tr>
                                        <tr>
                                            <td>پرونده حقوقی دارد</td>
                                            <td class="fit"><?php foreach ($enum['YES_NO'] as $key => $value) {
                                                    if ($key == $request_central_bank_info['FinalPropertyHasLegal']) {
                                                        echo $value;
                                                    }
                                                } ?></td>
                                        </tr>
                                        <tr>
                                            <td>تاریخ آخرین حکم</td>
                                            <td class="fit"><?php echo $request_central_bank_info['FinalPropertyOrderDate']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>نتیجه حکم صادره</td>
                                            <td class="fit"><?php foreach ($enum['PROPERTY_JUDGE_RESULT'] as $key => $value) {
                                                    if ($key == $request_central_bank_info['FinalPropertyVote']) {
                                                        echo $value;
                                                    }
                                                } ?></td>
                                        </tr>
                                        <tr>
                                            <td>ارزش برآوردي خروج منافع درصورت حکم عليه</td>
                                            <td class="fit"><?php echo $request_central_bank_info['FinalPropertyWithdrawBenefit']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>قطعی یا وکالتی بودن سند</td>
                                            <td class="fit"><?php foreach ($enum['PROPERTY_DOC_EXACT'] as $key => $value) {
                                                    if ($key == $request_central_bank_info['FinalPropertyDocFinalStatus']) {
                                                        echo $value;
                                                    }
                                                } ?></td>
                                        </tr>
                                        <tr>
                                            <td>سرفصل خلاصه دفترکل طبقه بندی شده ملک</td>
                                            <td class="fit"><?php echo $request_central_bank_info['FinalPropertySummary']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>ارزش دفتری</td>
                                            <td class="fit"><?php echo $request_central_bank_info['FinalPropertyValue']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>تاریخ آخرین کارشناسی رسمی</td>
                                            <td class="fit"><?php echo $request_central_bank_info['FinalPropertyValueCheck']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>ارزش آخرین کارشناسی رسمی</td>
                                            <td class="fit"><?php echo $request_central_bank_info['FinalPropertyCheckValue']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>مرجع کارشناسی</td>
                                            <td class="fit"><?php echo $request_central_bank_info['FinalPropertySurvey']; ?></td>
                                        </tr>


                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    <?php } ?>

                </div>
            </div>
        </div>
        <div class="col-lg-7">
            <?php include 'request_comment.php'; ?>
        </div>
    </div>
</div>