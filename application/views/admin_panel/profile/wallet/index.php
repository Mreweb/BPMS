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
                                <a href="<?php echo base_url('Admin/Dashboard/Home') ?>">
                                    <i class="bx bx-home-alt"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">کیف پول و موجودی</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!--end breadcrumb-->



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

                            <?php
                            if (isset($payment)) {
                                if ($payment['Result'] && $_GET['Status'] == 'OK') { ?>
                                    <div class="alert bg-success">
                                        <?php echo $message; ?>
                                    </div>
                                    <div class="alert">
                                        کد رهگیری:
                                        <span>
                                            <?php echo $payment['RefId']; ?>
                                        </span>
                                    </div>
                                <?php } else { ?>
                                    <div class="alert bg-danger">
                                        <?php echo $message; ?>
                                    </div>
                                <?php }
                            }
                            ?>


                            <?php if (!isset($payment)) { ?>
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

                                    <div class="col-12 mb-2 text-end">
                                        <button id="do_save" class="btn btn-success">شارژ کیف پول</button>
                                    </div>
                                </div>
                            <?php } ?>

                            <?php if (isset($payment)) { ?>
                                <p>
                                    <a class="btn btn-primary" href="<?php echo base_url('Admin/Dashboard/Wallet'); ?>">
                                         بازگشت به کیف پول
                                    </a>
                                </p>
                            <?php } ?>


                        </div>
                    </div>
                </div>
            </div>
            <!--end row-->


            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                    <tr>
                        <th class="fit">شناسه</th>
                        <th>مبلغ پرداخت</th>
                        <th class="fit">وضعیت پرداخت</th>
                        <th class="fit">درگاه پرداخت</th>
                        <th class="fit">وضعیت کاربر</th>
                        <th class="fit">تاریخ تراکنش</th>
                    </tr>
                    </thead>
                    <tbody class="table-rows">
                    <?php
                    $counter = 0;
                    if ($personPaymentsHistory == NULL || empty($personPaymentsHistory)) { ?>
                        <div class="col-12 prl-10px">
                            <div class="item">
                                موردی یافت نشد
                            </div>
                        </div>
                    <?php } else {
                        foreach ($personPaymentsHistory as $item) { ?>
                            <tr class="item">
                                <td class="fit">
                                    # <?php echo $item['BalancePaymentId']; ?>
                                </td>

                                <td>
                                    <?php echo number_format($item['BalanceAmount']); ?>
                                </td>
                                <td class="fit">
                                    <?php
                                    $class= getPeymentClass($item['Status']);
                                    echo pipeEnum('PAYMENTSTATUS',$item['Status'] , $class); ?>
                                </td>
                                <td class="fit">
                                    <?php echo pipeEnum('GATEWAY',$item['GateWay']); ?>
                                </td>

                                <td class="fit">
                                    <?php
                                    if($item['IsActive']) {
                                        echo pipeEnum('ACTIVEUSER', $item['IsActive'], 'badge bg-success');
                                    } else{
                                        echo pipeEnum('ACTIVEUSER', $item['IsActive'], 'badge bg-danger');
                                    }
                                    ?>
                                </td>
                                <td class="fit">
                                    <?php echo convertDate($item['TransactionDateTime']); ?><br>
                                    <?php echo convertTime($item['TransactionDateTime']); ?>
                                </td>
                            </tr>
                        <?php } } ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>

