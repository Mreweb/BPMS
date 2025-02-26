<?php $_DIR = base_url(); ?>

<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">جزئیات تراکنش</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="<?php echo base_url('Admin/Dashboard/Finance') ?>">
                                    <i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">جزئیات تراکنش</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!--end breadcrumb-->

            <!-- row-->
            <div class="row">
                <div class="col-12 mx-auto">


                    <input type="hidden" id="inputBalancePaymentId" <?php setInputValue($payment['BalancePaymentId']); ?>   />

                    <h6 class="mb-0 text-uppercase">جزئیات و تغییر وضعیت تراکنش</h6>
                    <hr>
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th class="fit">شناسه کاربری</th>
                                        <th>نام و نام خانوادگی</th>
                                        <th class="fit">تلفن همراه</th>
                                        <th class="fit">شرکت</th>
                                        <th class="fit">مبلغ پرداخت</th>
                                        <th class="fit">وضعیت پرداخت</th>
                                        <th class="fit">درگاه پرداخت</th>
                                        <th class="fit">وضعیت کاربر</th>
                                        <th class="fit">تاریخ تراکنش</th>
                                    </tr>
                                    </thead>
                                    <tbody class="table-rows">
                                    <tr class="item">
                                        <td class="fit">
                                            # <?php echo $payment['BalancePersonId']; ?>
                                        </td>
                                        <td>
                                            <?php echo $payment['PersonFirstName'] . " " . $payment['PersonLastName']; ?>
                                        </td>
                                        <td class="fit">
                                            <?php echo $payment['PersonPhone']; ?>
                                        </td>
                                        <td class="fit">
                                            <?php echo $payment['LegalOrganizationName']; ?>
                                        </td>

                                        <td class="fit">
                                            <?php echo number_format($payment['BalanceAmount']); ?>
                                        </td>
                                        <td class="fit">
                                            <?php
                                            $class = getPeymentClass($payment['Status']);
                                            echo pipeEnum('PAYMENTSTATUS', $payment['Status'], $class); ?>
                                        </td>
                                        <td class="fit">
                                            <?php echo pipeEnum('GATEWAY', $payment['GateWay']); ?>
                                        </td>

                                        <td class="fit">
                                            <?php
                                            if ($item['IsActive']) {
                                                echo pipeEnum('ACTIVEUSER', $payment['IsActive'], 'badge bg-success');
                                            } else {
                                                echo pipeEnum('ACTIVEUSER', $payment['IsActive'], 'badge bg-danger');
                                            }
                                            ?>
                                        </td>
                                        <td class="fit">
                                            <?php echo convertDate($payment['TransactionDateTime']); ?>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th class="fit">شناسه تراکنش زرین پال</th>
                                        <th class="fit">شناسه رفرنس</th>
                                    </tr>
                                    </thead>
                                    <tbody class="table-rows">
                                    <tr class="item">
                                        <td>
                                            <?php echo $payment['Authority']; ?>
                                        </td>
                                        <td class="fit">
                                            <?php echo $payment['RefID']; ?>
                                        </td>
                                    <tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 mb-2">
                                    <div class="">لطفا در انتخاب وضعیت دقت کنید</div>
                                </div>

                                <div class="col-12 col-md-3 mb-2">
                                    <div class="input-group">
                                        <label class="input-group-text" for="inputStatus">وضعیت</label>
                                        <select class="form-select" id="inputStatus">
                                            <option value="">انتخاب کنید</option>
                                            <?php setSelectData($enum['PAYMENTSTATUS'], $person['PersonGender']); ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-12 col-md-4 mb-2 DONE message d-none">
                                    <div class="bg-success p-2">در صورت ناموفق بودن وضعیت فعلی پرداخت، مبلغ تراکنش به موجودی کاربر اضافه خواهد شد</div>
                                </div>
                                <div class="col-12 col-md-4  mb-2 FAILED message d-none">
                                    <div class="bg-danger p-2">درصورت موفق بودن وضعیت فعلی پرداخت، مبلغ تراکنش از موجودی کاربر کسر خواهد شد</div>
                                </div>
                                <div class="col-12 col-md-4  mb-2 PENDING message d-none">
                                    <div class="bg-danger p-2">درصورت موفق بودن وضعیت فعلی پرداخت، مبلغ تراکنش از موجودی کاربر کسر خواهد شد</div>
                                </div>
                                <div class="col-12 col-md-4  mb-2 REJECT message d-none">
                                    <div class="bg-danger p-2">درصورت موفق بودن وضعیت فعلی پرداخت، مبلغ تراکنش از موجودی کاربر کسر خواهد شد</div>
                                </div>
                                <div class="col-12 col-md-4  mb-2 RETURNED message d-none">
                                    <div class="bg-danger p-2">درصورت موفق بودن وضعیت فعلی پرداخت، مبلغ تراکنش از موجودی کاربر کسر خواهد شد</div>
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

