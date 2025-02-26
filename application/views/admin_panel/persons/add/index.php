<?php $_DIR = base_url(); ?>

<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">افزودن کاربر</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="<?php echo base_url('Admin/Dashboard/Persons') ?>"><i
                                            class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">اطلاعات حقیقی و حقوقی</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!--end breadcrumb-->

            <!-- row-->
            <div class="row">
                <div class="col-12 mx-auto">
                    <h6 class="mb-0 text-uppercase">اطلاعات حقیقی و حقوقی کاربر</h6>
                    <hr>
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-md-3 mb-2">
                                    <div class="input-group"><span class="input-group-text">نام</span>
                                        <input
                                                type="text"
                                                id="inputPersonFirstName"
                                                aria-label="نام"
                                                class="form-control">
                                    </div>
                                </div>
                                <div class="col-12 col-md-3 mb-2">
                                    <div class="input-group"><span class="input-group-text">نام خانوادگی</span>
                                        <input
                                                type="text"
                                                id="inputPersonLastName"
                                                aria-label="نام خانوادگی"
                                                class="form-control">
                                    </div>
                                </div>
                                <div class="col-12 col-md-3 mb-2">
                                    <div class="input-group"><span class="input-group-text">تلفن</span>
                                        <input
                                                type="text"
                                                id="inputPersonPhone"
                                                aria-label="تلفن"
                                                class="form-control">
                                    </div>
                                </div>
                                <div class="col-12 col-md-3 mb-2">
                                    <div class="input-group"><span class="input-group-text">کد ملی</span>
                                        <input
                                                type="text"
                                                id="inputPersonNationalCode"
                                                aria-label="کد ملی"
                                                class="form-control">
                                    </div>
                                </div>
                                <div class="col-12 col-md-3 mb-2">
                                    <div class="input-group"><span class="input-group-text">ایمیل</span>
                                        <input
                                                type="text"
                                                id="inputPersonEmail"
                                                aria-label="ایمیل"
                                                class="form-control">
                                    </div>
                                </div>

                                <div class="col-12 col-md-3 mb-2">
                                    <div class="input-group">
                                        <label class="input-group-text" for="inputGender">جنسیت</label>
                                        <select class="form-select" id="inputGender">
                                            <option selected="">انتخاب کنید</option>
                                            <?php setSelectData($enum['GENDER']); ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-12 col-md-3 mb-2">
                                    <div class="input-group"><span class="input-group-text">نام کاربری</span>
                                        <input
                                                type="text"
                                                id="inputUsername"
                                                aria-label="نام کاربری"
                                                class="form-control">
                                    </div>
                                </div>

                                <div class="col-12 col-md-3 mb-2">
                                    <div class="input-group"><span class="input-group-text">رمز عبور</span>
                                        <input
                                                type="text"
                                                id="inputPassword"
                                                aria-label="رمز عبور"
                                                class="form-control">
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-12 col-md-3 mb-2">
                                    <div class="input-group"><span class="input-group-text">نام سازمان</span>
                                        <input
                                                type="text"
                                                id="inputLegalOrganizationName"
                                                aria-label="نام سازمان"
                                                class="form-control">
                                    </div>
                                </div>
                                <div class="col-12 col-md-3 mb-2">
                                    <div class="input-group"><span class="input-group-text">کد اقتصادی</span>
                                        <input
                                                type="text"
                                                id="inputLegalFinanceCode"
                                                aria-label="کد اقتصادی	"
                                                class="form-control">
                                    </div>
                                </div>
                                <div class="col-12 col-md-3 mb-2">
                                    <div class="input-group"><span class="input-group-text">شناسه ملی</span>
                                        <input
                                                type="text"
                                                id="inputLegalCompanyCode"
                                                aria-label="شناسه ملی"
                                                class="form-control">
                                    </div>
                                </div>
                                <div class="col-12 col-md-3 mb-2">
                                    <div class="input-group"><span class="input-group-text">شناسه ثبت</span>
                                        <input
                                                type="text"
                                                id="inputLegalRegisterNumber"
                                                aria-label="کد ملی"
                                                class="form-control">
                                    </div>
                                </div>
                                <div class="col-12 col-md-3 mb-2">
                                    <div class="input-group"><span class="input-group-text">تلفن ثابت</span>
                                        <input
                                                type="text"
                                                id="inputLegalPhone"
                                                aria-label="تلفن ثابت دفتر مرکزی"
                                                class="form-control">
                                    </div>
                                </div>

                                <div class="col-12 col-md-3 mb-2">
                                    <div class="input-group">
                                        <label class="input-group-text" for="inputLegalProvinceId">استان</label>
                                        <select class="form-select" id="inputLegalProvinceId">
                                            <option>انتخاب کنید</option>
                                            <?php
                                            foreach ($province as $row) {echo "<option value='" .  $row['ProvinceId'] . "'>";
                                                echo $row['ProvinceName'];
                                                echo "</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-md-3 mb-2">
                                    <div class="input-group">
                                        <label class="input-group-text" for="inputRole">نقش</label>
                                        <select class="form-select" id="inputRole">
                                            <option selected="">انتخاب کنید</option>
                                            <?php setSelectData($enum['ROLES']); ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-md-3 mb-2">
                                    <div class="input-group">
                                        <label class="input-group-text" for="inputIsActive">وضعیت</label>
                                        <select class="form-select" id="inputIsActive">
                                            <option selected="">انتخاب کنید</option>
                                            <?php setSelectData($enum['ACTIVEUSER']); ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-12 text-end mb-2">
                                    <button id="do_save" class="btn btn-success">ذخیره</button>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end row-->



        </div>
    </div>
</div>

