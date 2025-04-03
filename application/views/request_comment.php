<?php if (!empty($request_comments)) { ?>
    <h2 class="font-weight-light text-center text-white py-3">تاریخچه پردازش درخواست</h2>
    <?php $index = 0; foreach ($request_comments as $request_comment) { ?>

        <?php if ($index % 2 == 0) { ?>
            <div class="row g-0">
                <div class="col-sm">
                    <!--spacer-->
                </div>
                <div class="col-sm-1 text-center flex-column d-none d-sm-flex">
                    <div class="row h-50">
                        <div class="col">&nbsp;</div>
                        <div class="col">&nbsp;</div>
                    </div>
                    <h5 class="m-2">
                        <span class="badge rounded-pill bg-light border">&nbsp;</span>
                    </h5>
                    <div class="row h-50">
                        <div class="col border-end">&nbsp;</div>
                        <div class="col">&nbsp;</div>
                    </div>
                </div>
                <div class="col-sm py-2">
                    <div class="card radius-15">
                        <div class="card-body">
                            <div class="float-end small">
                                <?php echo convertDate($request_comment['CreateDateTime']); ?>
                                <br>
                                <?php echo convertTime($request_comment['CreateDateTime']); ?>
                            </div>
                            <h4 class="card-title text-white"><?php echo pipeEnum('REQ_STATUS', $request_comment['CommentType']); ?></h4>
                            <p class="card-text">
                                <?php echo nl2br($request_comment['CommentContent']); ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        <?php } else { ?>
            <div class="row g-0">
                <div class="col-sm py-2">
                    <div class="card radius-15">
                        <div class="card-body">
                            <div class="float-end small">

                                <?php echo convertDate($request_comment['CreateDateTime']); ?>
                                <br>
                                <?php echo convertTime($request_comment['CreateDateTime']); ?>
                            </div>
                            <h4 class="card-title text-white"><?php echo pipeEnum('REQ_STATUS', $request_comment['CommentType']); ?></h4>
                            <p class="card-text">
                                <?php echo nl2br($request_comment['CommentContent']); ?>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-1 text-center flex-column d-none d-sm-flex">
                    <div class="row h-50">
                        <div class="col">&nbsp;</div>
                        <div class="col">&nbsp;</div>
                    </div>
                    <h5 class="m-2">
                        <span class="badge rounded-pill bg-light border">&nbsp;</span>
                    </h5>
                    <div class="row h-50">
                        <div class="col border-end">&nbsp;</div>
                        <div class="col">&nbsp;</div>
                    </div>
                </div>
                <div class="col-sm">
                    <!--spacer-->
                </div>
            </div>
        <?php } ?>
        <?php $index += 1;
    } ?>
<?php } ?>
