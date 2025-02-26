<?php $_DIR = base_url(); ?>

<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">کیف پول</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item">
                                <a href="<?php echo base_url('Admin/Dashboard/Persons') ?>">
                                    <i class="bx bx-home-alt"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">کیف پول و موجودی</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!--end breadcrumb-->


            <input type="hidden" id="inputPersonId" value="<?php echo $person['PersonId']; ?>" />

            <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
                <div class="col">
                    <div class="card radius-10">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <p class="mb-0">موجودی</p>
                                    <h4 class="my-1"><?php echo number_format($wallet['AccountBalance']); ?></h4>
                                </div>
                                <div class="widgets-icons ms-auto"><i class="bx bxs-wallet"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- row-->
            <div class="row">
                <div class="col-12 mx-auto">
                    <h6 class="mb-0 text-uppercase">شارژ کیف پول</h6>
                    <hr>
                    <div class="card">
                        <div class="card-body">
                            <p>جهت شارژ کیف پول، لطفا مبلغ مورد نظر را وارد کرده و پرداخت کنبد</p>
                            <div class="row">
                                <div class="col-12 col-md-3 mb-2">
                                    <div class="input-group"><span class="input-group-text">مبلغ شارژ (تومان)</span>
                                        <input  type="text"
                                                placeholder="مبلغ مورد نظر جهت شارژ کیف پول را وارد نمائید"
                                                id="inputBalance"
                                                class="form-control text-center money">
                                    </div>
                                </div>

                                <div class="col-12 col-md-3 mb-2">
                                    <div class="input-group">
                                        <label class="input-group-text" for="inputGateWay">درگاه</label>
                                        <select class="form-select" id="inputGateWay">
                                            <option selected="">انتخاب کنید</option>
                                            <?php setSelectData($enum['GATEWAY']); ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-12 col-md-3 mb-2">
                                    <div class="input-group">
                                        <label class="input-group-text" for="inputAuthority">کد پیگیری</label>
                                        <input  type="text"
                                                placeholder="در صورت وجود کد را وارد نمائید"
                                                id="inputAuthority"
                                                class="form-control text-end ">
                                    </div>
                                </div>

                                <div class="col-12 col-md-3 mb-2">
                                    <div class="input-group">
                                        <label class="input-group-text" for="file">سند</label>
                                        <input  type="file"
                                                placeholder="در صورت وجود سند را وارد نمائید"
                                                id="file"
                                                class="form-control text-end ">
                                    </div>
                                </div>


                                <div class="col-12 mb-2">
                                    <div class="input-group">
                                        <label class="input-group-text" for="inputDescription">توضیحات</label>
                                        <input  type="text"
                                                placeholder="توضیحات را وارد نمائید"
                                                id="inputDescription"
                                                class="form-control text-right ">
                                    </div>
                                </div>

                                <div class="col-12 mb-2 text-end">
                                    <button id="do_save" class="btn btn-success">شارژ کیف پول</button>
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

