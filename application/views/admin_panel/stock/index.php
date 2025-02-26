<?php $_DIR = base_url(); ?>

<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">

        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3"><?php echo $pageTitle; ?></div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('Admin/Dashboard/Home'); ?>"><i
                                        class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page"><?php echo $pageTitle; ?></li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                    <button type="button" id="get_new_list" class="btn btn-success">بروزرسانی فهرست</button>
                </div>
            </div>
        </div>
        <!--end breadcrumb-->

        <h6 class="mb-0 text-uppercase"><?php echo $pageTitle; ?></h6>
        <hr/>
        <div class="card">
            <div class="card-body">

                <div class="row Page-Search-Form ">
                    <div class="col-sm-12 col-md-10">
                        <label class="col-sm-12 col-md-2 mb-3">
                            عنوان نماد:
                            <input type="search" class="form-control form-control-sm" id="inputStockTitle"/>
                        </label>
                    </div>

                    <div class="col-sm-12 col-md-2">
                        <label class="col-sm-12 mb-3 text-end">
                            <br>
                            <button type="button" id="doSearch" class="btn btn-light"><i
                                        class="bx bx-search-alt me-0"></i></button>
                        </label>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>نماد</th>
                            <th class="fit">عنوان نماد</th>
                            <th class="fit">کد نماد</th>
                            <th class="fit">بازار</th>
                            <th class="fit">تاریخ</th>
                        </tr>
                        </thead>
                        <tbody class="table-rows"></tbody>
                    </table>
                </div>


                <?php include APPPATH.'pagination.php'; ?>


            </div>
        </div>
    </div>
</div>
<!--end page wrapper -->
