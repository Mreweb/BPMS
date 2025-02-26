<?php $_DIR = base_url(); ?>

<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">ویرایش پروفایل</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item">
                                <a href="<?php echo base_url('Admin/Dashboard/Persons') ?>">
                                    <i class="bx bx-home-alt"></i>
                                    </a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">اطلاعات پروفایل</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!--end breadcrumb-->

            <!-- row-->
            <div class="row">
                <div class="col-12 mx-auto">
                    <h6 class="mb-0 text-uppercase">ویرایش پروفایل</h6>
                    <hr>
                    <div class="card">
                        <div class="card-body">
                            <input <?php setInputValue($person['PersonId']); ?> id="inputPersonId" type="hidden" class="form-control">

                            <div class="row">
                                <div class="col-12 col-md-3 mb-2">
                                    <div class="input-group"><span class="input-group-text">نام</span>
                                        <input <?php setInputValue($person['PersonFirstName']); ?>
                                                type="text"
                                                id="inputPersonFirstName"
                                                aria-label="نام"
                                                class="form-control">
                                    </div>
                                </div>
                                <div class="col-12 col-md-3 mb-2">
                                    <div class="input-group"><span class="input-group-text">نام خانوادگی</span>
                                        <input <?php setInputValue($person['PersonLastName']); ?>
                                                type="text"
                                                id="inputPersonLastName"
                                                aria-label="نام خانوادگی"
                                                class="form-control">
                                    </div>
                                </div>
                                <div class="col-12 col-md-3 mb-2">
                                    <div class="input-group"><span class="input-group-text">کد ملی</span>
                                        <input <?php setInputValue($person['PersonNationalCode']); ?>
                                                type="text"
                                                id="inputPersonNationalCode"
                                                aria-label="کد ملی"
                                                class="form-control">
                                    </div>
                                </div>
                                <div class="col-12 col-md-3 mb-2">
                                    <div class="input-group"><span class="input-group-text">ایمیل</span>
                                        <input <?php setInputValue($person['PersonEmail']); ?>
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
                                            <?php setSelectData($enum['GENDER'] , $person['PersonGender']); ?>
                                        </select>
                                    </div>
                                </div>


                                <div class="col-12 col-md-3 mb-2">
                                    <div class="input-group"><span class="input-group-text">نام کاربری</span>
                                        <input <?php setInputValue($person['Username']); ?>
                                                type="text"
                                                id="inputUsername"
                                                aria-label="نام کاربری"
                                                class="form-control">
                                    </div>
                                </div>

                                <div class="col-12 col-md-3 mb-2">
                                    <div class="input-group"><span class="input-group-text">رمز عبور</span>
                                        <input
                                                placeholder="دز صورت خالی گذاشتن تغییر نخواهد کرد"
                                                type="text"
                                                id="inputPassword"
                                                aria-label="رمز عبور"
                                                class="form-control">
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


            <!-- row-->
            <div class="row">
                <div class="col-12 mx-auto">
                    <h6 class="mb-0 text-uppercase">تغییر تلفن همراه</h6>
                    <hr>
                    <div class="card">
                        <div class="card-body">

                            <div class="row">
                                <div class="col-12 col-md-3 mb-2">
                                    <div class="input-group"><span class="input-group-text">شماره جدید</span>
                                        <input
                                                type="text"
                                                id="inputPersonNewPhone"
                                                aria-label="تلفن"
                                                class="form-control">
                                    </div>
                                </div>
                                <div class="col-12 col-md-3 mb-2">
                                    <div class="input-group"><span class="input-group-text">کد تایید</span>
                                        <input
                                                type="text"
                                                id="inputCode"
                                                aria-label="تلفن"
                                                class="form-control">
                                    </div>
                                    <button id="do_send_code" class="btn btn-primary btn-sm mt-2">دریافت کد تایید</button>
                                </div>
                                <div class="col-12 text-end mb-2">
                                    <button id="do_save_phone" class="btn btn-success">ذخیره</button>
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

