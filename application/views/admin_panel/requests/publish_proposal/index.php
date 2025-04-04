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
                        <input type="hidden" <?php setInputValue($request['ReqId']); ?>id="inputReqId"/>
                    </ol>
                </nav>
            </div>
            <!--end breadcrumb-->


            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                    <tr>
                        <th class="fit">شناسه</th>
                        <th>عنوان</th>
                        <th class="fit">نوع</th>
                        <th class="fit">ارزش گذاری رسمی</th>
                        <th class="fit">وضعیت</th>
                        <th class="fit">ثبت کننده</th>
                        <th class="fit">کد ملی</th>
                        <th class="fit">تلفن</th>
                        <th class="fit">تاریخ ثبت</th>
                    </tr>
                    </thead>
                    <tbody class="table-rows">
                    <tr class="item">
                        <td class="fit">
                            # <?php echo $request['ReqId']; ?>
                        </td>
                        <td>
                            <?php echo $request['ReqTitle']; ?>
                        </td>
                        <td class="fit">
                            <?php echo pipeEnum('REQ_TYPE', $request['ReqType'], 'badge bg-success'); ?>
                        </td>
                        <td>
                            <?php echo $request['ReqPrice']; ?>
                        </td>
                        <td class="fit">
                            <?php echo pipeEnum('REQ_STATUS', $request['ReqStatus'], getRequestsStatusClass($request['ReqStatus'])); ?>
                        </td>
                        <td class="fit">
                            <?php echo $request['PersonFirstName'] . " " . $request['PersonLastName']; ?>
                        </td>
                        <td class="fit">
                            <?php echo $request['PersonNationalCode']; ?>
                        </td>
                        <td class="fit">
                            <?php echo $request['PersonPhone']; ?>
                        </td>
                        <td class="fit">
                            <?php echo convertDate($request['RequestCreateDateTime']); ?><br>
                            <?php echo convertTime($request['RequestCreateDateTime']); ?>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>


            <!-- row-->
            <div class="row">
                <div class="col-12 mx-auto">

                    <?php if ($request['ReqContractStatus'] == '0') { ?>
                        <div class="alert bg-danger text-white">
                            قراردادهوشمند برای این درخواست ایجاد نشده است.
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="col-12 text-center mb-2">
                                    <button id="do_deploy_contract" class="btn btn-lg btn-success">انتشار قرارداد هوشمند
                                        بر بستر بلاکچین
                                    </button>
                                </div>
                            </div>
                        </div>
                    <?php } else { ?>
                        <div class="alert bg-success text-white">
                            قراردادهوشمند برای این درخواست ایجاد شده است.
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="col-12 text-center mb-2">
                                    <a target="_blank"
                                       href="<?php echo blockChainUrl() . 'address/' . $request['ReqContractAddress']; ?>">
                                        <button class="btn btn-primary">
                                            مشاهده قرارداد هوشمند
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>


                    <?php if ($request['ReqProposalStatus'] == '0') { ?>
                        <div class="alert bg-danger text-white">
                            پروپوزال برای این درخواست ایجاد نشده است.
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12 col-md-6 mb-3">
                                        <label class="col-sm-12 mb-3">نماد پروپوزال (به زبان انگلیسی باشد)</label>
                                        <input type="text" class="form-control" id="inputProposalTitle"/>
                                    </div>
                                </div>
                                <div class="col-12 text-end mb-2">
                                    <button id="do_create_proposal" class="btn btn-success">ایجاد پروپوزال و ارسال به
                                        بلاکچین
                                    </button>
                                </div>
                            </div>
                        </div>
                    <?php } else { ?>
                        <div class="alert bg-success text-white">
                            پروپوزال برای این درخواست ایجاد شده است.
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="col-12 text-center mb-2">

                                    <?php
                                    $tx = "";
                                    foreach ($request_transactions as $item) {
                                        if ($item['FunctionCall'] == 'createProposal') {
                                            $tx = $item['TransactionHash'];
                                        }
                                    }
                                    ?>
                                    <a target="_blank" href="<?php echo blockChainUrl() . 'tx/' . $tx; ?>">
                                        <button class="btn btn-primary">
                                            مشاهده تراکنش ایجاد پروپوزال
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>


                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th class="fit">شناسه</th>
                                <th class="fit">نوع</th>
                                <th>داده ورودی</th>
                                <th class="fit">تاریخ ثبت</th>
                            </tr>
                            </thead>
                            <tbody class="table-rows">
                            <?php foreach ($request_transactions as $item) { ?>
                                <tr class="item">
                                    <td class="fit">
                                        <a target="_blank" href="<?php echo blockChainUrl() . 'tx/' . $item['TransactionHash']; ?>">
                                        # <?php echo $item['TransactionHash']; ?>
                                        </a>
                                    </td>
                                    <td class="fit">
                                        <?php echo $item['FunctionCall']; ?>
                                    </td>
                                    <td class="text-end">
                                        <?php foreach (json_decode($item['InputData'],true) as $key=>$value) {
                                            echo $key.':'.$value."<br>";
                                        } ?>
                                    </td>
                                    <td class="fit">
                                        <?php echo convertDate($item['CreateDateTime']); ?><br>
                                        <?php echo convertTime($item['CreateDateTime']); ?>
                                    </td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
<!--end row-->

