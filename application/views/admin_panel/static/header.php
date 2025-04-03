<?php $_DIR = base_url();
$ci =& get_instance(); ?>
<!doctype html>
<html lang="fa" dir="rtl">
<head>
    <title><?php echo $pageTitle; ?></title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
    <link rel="icon" href="<?php echo $_DIR; ?>/assets/images/white.png" type="image/png"/>
    <!--plugins-->
    <link href="<?php echo $_DIR ?>assets/plugins/simplebar/css/simplebar.css" rel="stylesheet"/>
    <link href="<?php echo $_DIR ?>assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet"/>
    <link href="<?php echo $_DIR ?>assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet"/>
    <link href="<?php echo $_DIR ?>assets/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet"/>
    <!-- loader-->
    <link href="<?php echo $_DIR ?>assets/css/pace.min.css" rel="stylesheet"/>
    <!-- Bootstrap CSS -->
    <link href="<?php echo $_DIR ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo $_DIR ?>assets/css/bootstrap-extended.css" rel="stylesheet">
    <link href="<?php echo $_DIR ?>assets/css/app.css" rel="stylesheet">
    <link href="<?php echo $_DIR ?>assets/css/icons.css" rel="stylesheet">
    <link href="<?php echo $_DIR ?>assets/plugins/pagination/simplePagination.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo $_DIR ?>assets/fonts/vazir/Farsi-Digits/Vazirmatn-FD-font-face.css">
    <link rel="stylesheet" href="<?php echo $_DIR ?>assets/css/rtl.css">
    <link rel="stylesheet" href="<?php echo $_DIR ?>assets/css/light.css">
    <script src="<?php echo $_DIR ?>assets/js/jquery.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="<?php echo $_DIR ?>assets/js/bootstrap.bundle.min.js"></script>

    <!--plugins-->
    <script src="<?php echo $_DIR ?>assets/js/pace.min.js"></script>

    <script src="<?php echo $_DIR ?>assets/plugins/simplebar/js/simplebar.min.js"></script>
    <script src="<?php echo $_DIR ?>assets/plugins/metismenu/js/metisMenu.min.js"></script>
    <script src="<?php echo $_DIR ?>assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
    <script src="<?php echo $_DIR ?>assets/plugins/apexcharts-bundle/js/apexcharts.min.js"></script>
    <script src="<?php echo $_DIR ?>assets/plugins/pagination/jquery.simplePagination.js"></script>

    <!-- IZI-->
    <link href="<?php echo $_DIR ?>assets/plugins/izi/izi.min.css" rel="stylesheet"/>
    <script src="<?php echo $_DIR ?>assets/plugins/izi/izi.min.js"></script>

    <!-- Confirm -->
    <link href="<?php echo $_DIR ?>assets/plugins/confirm/jquery-confirm.min.css" rel="stylesheet"/>
    <script src="<?php echo $_DIR ?>assets/plugins/confirm/jquery-confirm.min.js"></script>

    <!-- mask input -->
    <script src="<?php echo $_DIR ?>assets/plugins/mask/jquery.mask.min.js"></script>

    <!-- Jdate -->
    <script src="<?php echo $_DIR ?>assets/plugins/JalaliDatePicker/jalalidatepicker.min.js"></script>
    <link href="<?php echo $_DIR ?>assets/plugins/JalaliDatePicker/jalalidatepicker.min.css" rel="stylesheet">

    <!-- select2 -->
    <script src="<?php echo $_DIR ?>assets/plugins/select2/js/select2.min.js"></script>
    <link href="<?php echo $_DIR ?>assets/plugins/select2/css/select2.min.css" rel="stylesheet"/>
    <link href="<?php echo $_DIR ?>assets/plugins/select2/css/select2-bootstrap4.css" rel="stylesheet"/>
    <script src="<?php echo $_DIR ?>assets/plugins/select2/js/select2-custom.js"></script>

    <!-- Datatable -->
    <script src="<?php echo $_DIR ?>assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo $_DIR ?>assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>

    <!--app JS-->
    <script src="<?php echo $_DIR ?>assets/js/app.js"></script>


    <script>
        function setTheme(theme = null) {

            localStorage.setItem("theme", 'bg-theme ' + theme);
            $('body').attr('class', 'bg-theme ' + theme);

            $.ajax({
                type: 'post',
                url: main_url + 'GetCaptcha/setColor/' + theme,
                data: {},
                success: function (data) {
                }
            });
        }


        $(document).ready(function () {


            $.ajaxSetup({
                error: function (data, status, error) {
                    $result = data.responseText;
                    $result = JSON.parse($result);
                    try {
                        if ($result.hasOwnProperty('message')) {
                            iziToast.show({
                                title: $result['message'],
                                color: $result['type'],
                                zindex: 2030,
                                position: 'topLeft'
                            });
                            setTimeout(function () {
                                if ($result.hasOwnProperty('redirect')) {
                                    window.location.href = $result['redirect'];
                                }
                            }, 2000);
                        } else {
                            iziToast.show({
                                title: $result['content'],
                                color: $result['type'],
                                zindex: 2030,
                                position: 'topLeft'
                            });
                            setTimeout(function () {
                                if ($result.hasOwnProperty('redirect')) {
                                    window.location.href = $result['redirect'];
                                }
                            }, 2000);
                        }
                    } catch (e) {
                    }
                    toggleLoader();
                }
            });
            $('.money').mask('000,000,000,000,000,000,000,000', {reverse: true});
            try {
                new PerfectScrollbar('.product-list');
                new PerfectScrollbar('.customers-list');
            } catch (e) {
            }
            jalaliDatepicker.startWatch({
                showTodayBtn: true,
                showEmptyBtn: true,
                time: false,
                separatorChars: {
                    'date': '/'
                },
                topSpace: 10,
                bottomSpace: 30,
                dayRendering(opt, input) {
                    return {
                        isHollyDay: opt.day == 1
                    }
                }
            });
            $('.form-select').select2({
                theme: "bootstrap-5",
                width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
                placeholder: $(this).data('placeholder'),
            });
            $(document).on('click', '.indicator-button', function () {
                $(this).toggleClass('active');
            });

            $(document).on('click', '.switcher li', function () {
                setTheme($(this).attr('id'));
                $('body').attr('class', 'bg-theme bg-' + $(this).attr('id'));
            });


        });

        function noComma($input) {
            return $input.replace(/,/g, '');
        }

        function notify($title, $type, $time = 50000, $position = 'topRight') {
            iziToast.show({
                theme: 'light',
                closeOnEscape: true,
                closeOnClick: true,
                progressBar: false,
                icon: 'icon-person',
                title: $title,
                color: $type,
                zindex: 9060,
                timeout: $time,
                position: $position
            });
        }

        function toggleLoader() {
            $(".pace").toggleClass(' pace-inactive');
        }

        function showLoader() {
            $(".pace").removeClass(' pace-inactive');
        }

        function hideLoader() {
            $(".pace").addClass(' pace-inactive');
        }

        const base_url = "<?php echo base_url('Admin/Dashboard/') ?>";
        const main_url = "<?php echo base_url() ?>";
        const items = <?php echo $ci->config->item('defaultPageSize'); ?>;
        const itemsOnPage = <?php echo $ci->config->item('defaultPageSize'); ?>;

        function copyToClipboard(text) {
            var aux = document.createElement("input");
            aux.setAttribute("value", text);
            document.body.appendChild(aux);
            aux.select();
            document.execCommand("copy");
            document.body.removeChild(aux);
        }

        function numberWithCommas(x) {
            return x.toString().replace(/\B(?<!\.\d*)(?=(\d{3})+(?!\d))/g, ",");
        }
    </script>
    <style>
        .logo-text, .toggle-icon, .user-plus, .topbar .navbar .navbar-nav .nav-link {
            font-size: 15px;
        }

        .jconfirm .jconfirm-box {
            color: #000;
        }

        .table > :not(caption) > * > * {
            padding: .15rem .5rem;
        }

        .fit {
            width: 1%;
            white-space: nowrap;
            text-align: justify;
            direction: rtl;
        }

        .compact-theme li:first-child a, .compact-theme li:first-child span {
            border-left: 0;
            border-radius: 3px 0 0 3px;
        }

        .compact-theme a, .compact-theme span {
            padding: 5px 10px;
        }

        tbody, td, tfoot, th, thead, tr {
            vertical-align: middle;
        }

        .iziToast-texts {
            font-family: Vazirmatn FD, Roboto, sans-serif;
            font-weight: 900;
            letter-spacing: 0px;
        }

        .page-content {
            padding: 1.5rem 1.5rem 0 1.5rem;
            min-height: calc(100vh - 120px);
        }

        .input-group-text {
            min-width: 100px;
        }

        .form-control {
            font-size: 0.8rem;
        }

        .pace.pace-active {
            background-color: rgba(0, 0, 0, 0);
        }

        .Page-Search-Form {

        }

        .Page-Search-Form input {
            padding: 8px;
            /* margin: 6px 0; */
        }

        .highcharts-container {
            font-family: Vazirmatn FD;
        }

        .tooltip-bg {
            background: #fff;
            color: #000;
            font-family: 'Vazirmatn FD';
            padding: 8px;
            border-radius: 6px;
        }

        .icon-hover {
            cursor: pointer;
        }

        .icon-hover:hover {
            color: orange;
        }

        table.dataTable td, table.dataTable th {
            direction: ltr;
        }

        td.success {
            background-color: rgb(14, 168, 68, 0.4);
        }

        td.danger {
            background-color: rgba(211, 8, 45, 0.4);
        }

        td.warning {
            background-color: rgba(208, 181, 9, 0.4);
        }

        .switcher-btn .bx {
            color: #000;
        }
    </style>
</head>
<body class="bg-theme bg-<?php if (isset($_COOKIE['theme'])) {
    echo $_COOKIE['theme'];
} else {
    echo 'theme22';
} ?>">
<!--wrapper-->
<div class="wrapper">
    <!--sidebar wrapper -->
    <div class="sidebar-wrapper" data-simplebar="true">
        <div class="sidebar-header">
            <div>
                <img src="<?php echo $_DIR; ?>/assets/images/white.png" class="logo-icon" alt="توضیح تصویر">
            </div>
            <div>
                <h4 class="logo-text"><?php echo getEnum('APP_Name'); ?></h4>
            </div>
            <div class="toggle-icon ms-auto"><i class='bx bx-arrow-back'></i>
            </div>
        </div>
        <!--navigation-->
        <ul class="metismenu" id="menu">
            <li>
                <a href="<?php echo base_url('Admin/Dashboard/Home'); ?>" class="has-arrow">
                    <div class="menu-title">داشبورد</div>
                </a>
            </li>

            <?php if (getLoginRoles()[0] == 'ADMIN') { ?>
                <li>
                    <a href="javascript:;" class="has-arrow">
                        <div class="parent-icon"><i class="bx bx-category"></i></div>
                        <div class="menu-title">کاربران</div>
                    </a>
                    <ul>
                        <li>
                            <a href="<?php echo base_url('Admin/Dashboard/Persons'); ?>">
                                <i class='bx bx-radio-circle'></i>
                                فهرست
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('Admin/Dashboard/Persons/add'); ?>">
                                <i class='bx bx-radio-circle'></i>
                                افزودن
                            </a>
                        </li>
                    </ul>
                </li>
            <?php } ?>

            <?php if (getLoginRoles()[0] == 'ADMIN' || getLoginRoles()[0] == 'MANAGER') { ?>
            <li>
                <a href="javascript:;" class="has-arrow">
                    <div class="parent-icon"><i class="bx bx-category"></i></div>
                    <div class="menu-title">درخواست ها</div>
                </a>
                <ul>
                    <li>
                        <a href="<?php echo base_url('Admin/Dashboard/Requests'); ?>">
                            <i class='bx bx-radio-circle'></i>
                            فهرست
                        </a>
                    </li>
            </li>
        </ul>
        </li>
        <?php } ?>

        <?php if (getLoginRoles()[0] == 'PUBLISHER' || getLoginRoles()[0] == 'ADMIN') { ?>
            <li>
                <a href="javascript:;" class="has-arrow">
                    <div class="parent-icon"><i class="bx bx-category"></i></div>
                    <div class="menu-title">درخواست های من</div>
                </a>
                <ul>
                    <li>
                        <a href="<?php echo base_url('Admin/Dashboard/MyRequests'); ?>">
                            <i class='bx bx-radio-circle'></i>
                            فهرست
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('Admin/Dashboard/MyRequests/add'); ?>">
                            <i class='bx bx-radio-circle'></i>
                            افزودن
                        </a>
                    </li>
                </ul>
            </li>
        <?php } ?>

        <?php if (getLoginRoles()[0] == 'ADMIN' || getLoginRoles()[0] == 'CENTRALBANK') { ?>
            <li>
                <a href="<?php echo base_url('Admin/Dashboard/Requests/centralBank'); ?>">
                    <div class="parent-icon"><i class="bx bx-category"></i></div>
                    <div class="menu-title">کارتابل بانک مرکزی</div>
                </a>
            </li>
        <?php } ?>

        <?php if (getLoginRoles()[0] == 'ADMIN' || getLoginRoles()[0] == 'LEGAL') { ?>
            <li>
                <a href="<?php echo base_url('Admin/Dashboard/Requests/legal'); ?>">
                    <div class="parent-icon"><i class="bx bx-category"></i></div>
                    <div class="menu-title">کارتابل حقوقی</div>
                </a>
            </li>
        <?php } ?>

        <?php if (getLoginRoles()[0] == 'ADMIN' || getLoginRoles()[0] == 'ECONOMIC') { ?>
            <li>
                <a href="<?php echo base_url('Admin/Dashboard/Requests/economic'); ?>">
                    <div class="parent-icon"><i class="bx bx-category"></i></div>
                    <div class="menu-title">کارتابل اقتصادی</div>
                </a>
            </li>
        <?php } ?>
        <?php if (getLoginRoles()[0] == 'ADMIN' || getLoginRoles()[0] == 'MANAGER') { ?>
            <li>
                <a href="<?php echo base_url('Admin/Dashboard/Requests/final'); ?>">
                    <div class="parent-icon"><i class="bx bx-category"></i></div>
                    <div class="menu-title">کارتابل نهایی</div>
                </a>
            </li>
            <li>
                <a href="<?php echo base_url('Admin/Dashboard/Requests/finished'); ?>">
                    <div class="parent-icon"><i class="bx bx-category"></i></div>
                    <div class="menu-title">درخواست های نهایی شده</div>
                </a>
            </li>
        <?php } ?>

        </ul>
        <!--end navigation-->
    </div>
    <!--end sidebar wrapper -->
    <!--start header -->
    <header>
        <div class="topbar d-flex align-items-center">
            <nav class="navbar navbar-expand gap-3">
                <div class="mobile-toggle-menu"><i class='bx bx-menu'></i>
                </div>
                <div class="top-menu ms-auto">
                    <ul class="navbar-nav align-items-center gap-1">
                        <!--                        <li class="nav-item mobile-search-icon d-flex d-lg-none" data-bs-toggle="modal"-->
                        <!--                            data-bs-target="#SearchModal">-->
                        <!--                            <a class="nav-link" href="javascript:;"><i class='bx bx-search'></i>-->
                        <!--                            </a>-->
                        <!--                        </li>-->
                        <li class="nav-item dropdown dropdown-app d-none">
                            <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" data-bs-toggle="dropdown"
                               href="javascript:;"><i class='bx bx-grid-alt'></i></a>
                            <div class="dropdown-menu dropdown-menu-end p-0">
                                <div class="app-container p-2 my-2">
                                    <div class="row gx-0 gy-2 row-cols-3 justify-content-center p-2">
                                        <div class="col">
                                            <a href="javascript:;">
                                                <div class="app-box text-center">
                                                    <div class="app-icon">
                                                        <img src="<?php echo $_DIR; ?>/assets/images/app/slack.png"
                                                             width="30"
                                                             alt="توضیح تصویر">
                                                    </div>
                                                    <div class="app-name">
                                                        <p class="mb-0 mt-1">اسلک</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col">
                                            <a href="javascript:;">
                                                <div class="app-box text-center">
                                                    <div class="app-icon">
                                                        <img src="<?php echo $_DIR; ?>/assets/images/app/behance.png"
                                                             width="30"
                                                             alt="توضیح تصویر">
                                                    </div>
                                                    <div class="app-name">
                                                        <p class="mb-0 mt-1">بیهنس</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col">
                                            <a href="javascript:;">
                                                <div class="app-box text-center">
                                                    <div class="app-icon">
                                                        <img src="<?php echo $_DIR; ?>/assets/images/app/google-drive.png"
                                                             width="30"
                                                             alt="توضیح تصویر">
                                                    </div>
                                                    <div class="app-name">
                                                        <p class="mb-0 mt-1">دریبل</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col">
                                            <a href="javascript:;">
                                                <div class="app-box text-center">
                                                    <div class="app-icon">
                                                        <img src="<?php echo $_DIR; ?>/assets/images/app/outlook.png"
                                                             width="30"
                                                             alt="توضیح تصویر">
                                                    </div>
                                                    <div class="app-name">
                                                        <p class="mb-0 mt-1">اوتلوک</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col">
                                            <a href="javascript:;">
                                                <div class="app-box text-center">
                                                    <div class="app-icon">
                                                        <img src="<?php echo $_DIR; ?>/assets/images/app/github.png"
                                                             width="30"
                                                             alt="توضیح تصویر">
                                                    </div>
                                                    <div class="app-name">
                                                        <p class="mb-0 mt-1">گیت هاب</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col">
                                            <a href="javascript:;">
                                                <div class="app-box text-center">
                                                    <div class="app-icon">
                                                        <img src="<?php echo $_DIR; ?>/assets/images/app/stack-overflow.png"
                                                             width="30"
                                                             alt="توضیح تصویر">
                                                    </div>
                                                    <div class="app-name">
                                                        <p class="mb-0 mt-1">استک</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col">
                                            <a href="javascript:;">
                                                <div class="app-box text-center">
                                                    <div class="app-icon">
                                                        <img src="<?php echo $_DIR; ?>/assets/images/app/figma.png"
                                                             width="30"
                                                             alt="توضیح تصویر">
                                                    </div>
                                                    <div class="app-name">
                                                        <p class="mb-0 mt-1">استک</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col">
                                            <a href="javascript:;">
                                                <div class="app-box text-center">
                                                    <div class="app-icon">
                                                        <img src="<?php echo $_DIR; ?>/assets/images/app/twitter.png"
                                                             width="30"
                                                             alt="توضیح تصویر">
                                                    </div>
                                                    <div class="app-name">
                                                        <p class="mb-0 mt-1">توییتر</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col">
                                            <a href="javascript:;">
                                                <div class="app-box text-center">
                                                    <div class="app-icon">
                                                        <img src="<?php echo $_DIR; ?>/assets/images/app/google-calendar.png"
                                                             width="30"
                                                             alt="توضیح تصویر">
                                                    </div>
                                                    <div class="app-name">
                                                        <p class="mb-0 mt-1">تقویم</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col">
                                            <a href="javascript:;">
                                                <div class="app-box text-center">
                                                    <div class="app-icon">
                                                        <img src="<?php echo $_DIR; ?>/assets/images/app/spotify.png"
                                                             width="30"
                                                             alt="توضیح تصویر">
                                                    </div>
                                                    <div class="app-name">
                                                        <p class="mb-0 mt-1">اسپاتیفای</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col">
                                            <a href="javascript:;">
                                                <div class="app-box text-center">
                                                    <div class="app-icon">
                                                        <img src="<?php echo $_DIR; ?>/assets/images/app/google-photos.png"
                                                             width="30"
                                                             alt="توضیح تصویر">
                                                    </div>
                                                    <div class="app-name">
                                                        <p class="mb-0 mt-1">تصاویر</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col">
                                            <a href="javascript:;">
                                                <div class="app-box text-center">
                                                    <div class="app-icon">
                                                        <img src="<?php echo $_DIR; ?>/assets/images/app/pinterest.png"
                                                             width="30"
                                                             alt="توضیح تصویر">
                                                    </div>
                                                    <div class="app-name">
                                                        <p class="mb-0 mt-1">تصاویر</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col">
                                            <a href="javascript:;">
                                                <div class="app-box text-center">
                                                    <div class="app-icon">
                                                        <img src="<?php echo $_DIR; ?>/assets/images/app/linkedin.png"
                                                             width="30"
                                                             alt="توضیح تصویر">
                                                    </div>
                                                    <div class="app-name">
                                                        <p class="mb-0 mt-1">لینکدین</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col">
                                            <a href="javascript:;">
                                                <div class="app-box text-center">
                                                    <div class="app-icon">
                                                        <img src="<?php echo $_DIR; ?>/assets/images/app/dribble.png"
                                                             width="30"
                                                             alt="توضیح تصویر">
                                                    </div>
                                                    <div class="app-name">
                                                        <p class="mb-0 mt-1">دریبل</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col">
                                            <a href="javascript:;">
                                                <div class="app-box text-center">
                                                    <div class="app-icon">
                                                        <img src="<?php echo $_DIR; ?>/assets/images/app/youtube.png"
                                                             width="30"
                                                             alt="توضیح تصویر">
                                                    </div>
                                                    <div class="app-name">
                                                        <p class="mb-0 mt-1">یوتیوب</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col">
                                            <a href="javascript:;">
                                                <div class="app-box text-center">
                                                    <div class="app-icon">
                                                        <img src="<?php echo $_DIR; ?>/assets/images/app/google.png"
                                                             width="30"
                                                             alt="توضیح تصویر">
                                                    </div>
                                                    <div class="app-name">
                                                        <p class="mb-0 mt-1">اخبار</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col">
                                            <a href="javascript:;">
                                                <div class="app-box text-center">
                                                    <div class="app-icon">
                                                        <img src="<?php echo $_DIR; ?>/assets/images/app/envato.png"
                                                             width="30"
                                                             alt="توضیح تصویر">
                                                    </div>
                                                    <div class="app-name">
                                                        <p class="mb-0 mt-1">انواتو</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col">
                                            <a href="javascript:;">
                                                <div class="app-box text-center">
                                                    <div class="app-icon">
                                                        <img src="<?php echo $_DIR; ?>/assets/images/app/safari.png"
                                                             width="30"
                                                             alt="توضیح تصویر">
                                                    </div>
                                                    <div class="app-name">
                                                        <p class="mb-0 mt-1">سافاری</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>

                                    </div><!--end row-->
                                </div>
                            </div>
                        </li>
                        <!--                        <li class="nav-item dropdown dropdown-large">-->
                        <!--                            <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="#"-->
                        <!--                               data-bs-toggle="dropdown"><span class="alert-count">7</span>-->
                        <!--                                <i class='bx bx-bell'></i>-->
                        <!--                            </a>-->
                        <!--                            <div class="dropdown-menu dropdown-menu-end">-->
                        <!--                                <a href="javascript:;">-->
                        <!--                                    <div class="msg-header">-->
                        <!--                                        <p class="msg-header-title">اعلانها</p>-->
                        <!--                                        <p class="msg-header-badge">8 جدید</p>-->
                        <!--                                    </div>-->
                        <!--                                </a>-->
                        <!--                                <div class="header-notifications-list">-->
                        <!--                                    <a class="dropdown-item" href="javascript:;">-->
                        <!--                                        <div class="d-flex align-items-center">-->
                        <!--                                            <div class="user-online">-->
                        <!--                                                <img src="-->
                        <?php //echo $_DIR; ?><!--/assets/images/avatars/avatar-1.png"-->
                        <!--                                                     class="msg-avatar"-->
                        <!--                                                     alt="توضیح تصویر">-->
                        <!--                                            </div>-->
                        <!--                                            <div class="flex-grow-1">-->
                        <!--                                                <h6 class="msg-name">دنیا اوحدی<span class="msg-time float-end">5-->
                        <!--															ثانیه قبل</span></h6>-->
                        <!--                                                <p class="msg-info">لورم ایپسوم متن ساختگی</p>-->
                        <!--                                            </div>-->
                        <!--                                        </div>-->
                        <!--                                    </a>-->
                        <!--                                    <a class="dropdown-item" href="javascript:;">-->
                        <!--                                        <div class="d-flex align-items-center">-->
                        <!--                                            <div class="notify bg-light-danger text-danger">د س</div>-->
                        <!--                                            <div class="flex-grow-1">-->
                        <!--                                                <h6 class="msg-name">سفارشات جدید <span class="msg-time float-end">2-->
                        <!--															دقیقه قبل</span></h6>-->
                        <!--                                                <p class="msg-info">سفارشات جدیدی ثبت شده است</p>-->
                        <!--                                            </div>-->
                        <!--                                        </div>-->
                        <!--                                    </a>-->
                        <!--                                    <a class="dropdown-item" href="javascript:;">-->
                        <!--                                        <div class="d-flex align-items-center">-->
                        <!--                                            <div class="user-online">-->
                        <!--                                                <img src="-->
                        <?php //echo $_DIR; ?><!--/assets/images/avatars/avatar-2.png"-->
                        <!--                                                     class="msg-avatar"-->
                        <!--                                                     alt="توضیح تصویر">-->
                        <!--                                            </div>-->
                        <!--                                            <div class="flex-grow-1">-->
                        <!--                                                <h6 class="msg-name">عطا کریمی <span class="msg-time float-end">14-->
                        <!--															ثانیه قبل</span></h6>-->
                        <!--                                                <p class="msg-info">با تولید سادگی نامفهوم از صنعت چاپ </p>-->
                        <!--                                            </div>-->
                        <!--                                        </div>-->
                        <!--                                    </a>-->
                        <!--                                    <a class="dropdown-item" href="javascript:;">-->
                        <!--                                        <div class="d-flex align-items-center">-->
                        <!--                                            <div class="notify bg-light-success text-success">-->
                        <!--                                                <img src="-->
                        <?php //echo $_DIR; ?><!--/assets/images/app/outlook.png" width="25"-->
                        <!--                                                     alt="توضیح تصویر">-->
                        <!--                                            </div>-->
                        <!--                                            <div class="flex-grow-1">-->
                        <!--                                                <h6 class="msg-name">حساب ایجاد شد<span-->
                        <!--                                                            class="msg-time float-end">28 دقیقه قبل</span></h6>-->
                        <!--                                                <p class="msg-info"> با استفاده از طراحان گرافیک است</p>-->
                        <!--                                            </div>-->
                        <!--                                        </div>-->
                        <!--                                    </a>-->
                        <!--                                    <a class="dropdown-item" href="javascript:;">-->
                        <!--                                        <div class="d-flex align-items-center">-->
                        <!--                                            <div class="notify bg-light-info text-info">س س</div>-->
                        <!--                                            <div class="flex-grow-1">-->
                        <!--                                                <h6 class="msg-name">محصول جدید تایید شد <span-->
                        <!--                                                            class="msg-time float-end">2 ساعت قبل</span></h6>-->
                        <!--                                                <p class="msg-info">محصول جدید شما تایید شد</p>-->
                        <!--                                            </div>-->
                        <!--                                        </div>-->
                        <!--                                    </a>-->
                        <!--                                    <a class="dropdown-item" href="javascript:;">-->
                        <!--                                        <div class="d-flex align-items-center">-->
                        <!--                                            <div class="user-online">-->
                        <!--                                                <img src="-->
                        <?php //echo $_DIR; ?><!--/assets/images/avatars/avatar-4.png"-->
                        <!--                                                     class="msg-avatar"-->
                        <!--                                                     alt="توضیح تصویر">-->
                        <!--                                            </div>-->
                        <!--                                            <div class="flex-grow-1">-->
                        <!--                                                <h6 class="msg-name">کوثر پرهام <span class="msg-time float-end">15-->
                        <!--															دقیقه قبل</span></h6>-->
                        <!--                                                <p class="msg-info">چاپگرها و متون بلکه روزنامه و مجله </p>-->
                        <!--                                            </div>-->
                        <!--                                        </div>-->
                        <!--                                    </a>-->
                        <!--                                    <a class="dropdown-item" href="javascript:;">-->
                        <!--                                        <div class="d-flex align-items-center">-->
                        <!--                                            <div class="notify bg-light-success text-success"><i-->
                        <!--                                                        class='bx bx-check-square'></i>-->
                        <!--                                            </div>-->
                        <!--                                            <div class="flex-grow-1">-->
                        <!--                                                <h6 class="msg-name">سفارش ارسال شد <span-->
                        <!--                                                            class="msg-time float-end">5 ساعت قبل</span></h6>-->
                        <!--                                                <p class="msg-info">سفارش شما با موفقیت ارسال شد</p>-->
                        <!--                                            </div>-->
                        <!--                                        </div>-->
                        <!--                                    </a>-->
                        <!--                                    <a class="dropdown-item" href="javascript:;">-->
                        <!--                                        <div class="d-flex align-items-center">-->
                        <!--                                            <div class="notify bg-light-primary">-->
                        <!--                                                <img src="-->
                        <?php //echo $_DIR; ?><!--/assets/images/app/github.png" width="25"-->
                        <!--                                                     alt="توضیح تصویر">-->
                        <!--                                            </div>-->
                        <!--                                            <div class="flex-grow-1">-->
                        <!--                                                <h6 class="msg-name">24 ناشر جدید<span class="msg-time float-end">1-->
                        <!--															روز قبل</span></h6>-->
                        <!--                                                <p class="msg-info">24 ناشر جدید هفته گذشته ثبت نام کرده اند</p>-->
                        <!--                                            </div>-->
                        <!--                                        </div>-->
                        <!--                                    </a>-->
                        <!--                                    <a class="dropdown-item" href="javascript:;">-->
                        <!--                                        <div class="d-flex align-items-center">-->
                        <!--                                            <div class="user-online">-->
                        <!--                                                <img src="-->
                        <?php //echo $_DIR; ?><!--/assets/images/avatars/avatar-8.png"-->
                        <!--                                                     class="msg-avatar"-->
                        <!--                                                     alt="توضیح تصویر">-->
                        <!--                                            </div>-->
                        <!--                                            <div class="flex-grow-1">-->
                        <!--                                                <h6 class="msg-name">پدرام کوکبی <span class="msg-time float-end">6-->
                        <!--															ساعت قبل</span></h6>-->
                        <!--                                                <p class="msg-info"> در ستون و سطرآنچنان که لازم است</p>-->
                        <!--                                            </div>-->
                        <!--                                        </div>-->
                        <!--                                    </a>-->
                        <!--                                </div>-->
                        <!--                                <a href="javascript:;">-->
                        <!--                                    <div class="text-center msg-footer">-->
                        <!--                                        <button class="btn btn-light w-100">نمایش همه اعلان ها</button>-->
                        <!--                                    </div>-->
                        <!--                                </a>-->
                        <!--                            </div>-->
                        <!--                        </li>-->
                        <li class="nav-item dropdown dropdown-large d-none">
                            <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="#"
                               role="button" data-bs-toggle="dropdown" aria-expanded="false"> <span
                                        class="alert-count">8</span>
                                <i class='bx bx-shopping-bag'></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a href="javascript:;">
                                    <div class="msg-header">
                                        <p class="msg-header-title">سبد خرید</p>
                                        <p class="msg-header-badge">10 مورد</p>
                                    </div>
                                </a>
                                <div class="header-message-list">
                                    <a class="dropdown-item" href="javascript:;">
                                        <div class="d-flex align-items-center gap-3">
                                            <div class="position-relative">
                                                <div class="cart-product rounded-circle bg-light">
                                                    <img src="<?php echo $_DIR; ?>/assets/images/products/11.png"
                                                         class=""
                                                         alt="توضیح تصویر">
                                                </div>
                                            </div>
                                            <div class="flex-grow-1">
                                                <h6 class="cart-product-title mb-0">تیشرت سفید مردانه</h6>
                                                <p class="cart-product-price mb-0">1 * 290000</p>
                                            </div>
                                            <div class="">
                                                <p class="cart-price mb-0">250000</p>
                                            </div>
                                            <div class="cart-product-cancel"><i class="bx bx-x"></i>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item" href="javascript:;">
                                        <div class="d-flex align-items-center gap-3">
                                            <div class="position-relative">
                                                <div class="cart-product rounded-circle bg-light">
                                                    <img src="<?php echo $_DIR; ?>/assets/images/products/02.png"
                                                         class=""
                                                         alt="توضیح تصویر">
                                                </div>
                                            </div>
                                            <div class="flex-grow-1">
                                                <h6 class="cart-product-title mb-0">تیشرت سفید مردانه</h6>
                                                <p class="cart-product-price mb-0">1 * 290000</p>
                                            </div>
                                            <div class="">
                                                <p class="cart-price mb-0">250000</p>
                                            </div>
                                            <div class="cart-product-cancel"><i class="bx bx-x"></i>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item" href="javascript:;">
                                        <div class="d-flex align-items-center gap-3">
                                            <div class="position-relative">
                                                <div class="cart-product rounded-circle bg-light">
                                                    <img src="<?php echo $_DIR; ?>/assets/images/products/03.png"
                                                         class=""
                                                         alt="توضیح تصویر">
                                                </div>
                                            </div>
                                            <div class="flex-grow-1">
                                                <h6 class="cart-product-title mb-0">تیشرت سفید مردانه</h6>
                                                <p class="cart-product-price mb-0">1 * 290000</p>
                                            </div>
                                            <div class="">
                                                <p class="cart-price mb-0">250000</p>
                                            </div>
                                            <div class="cart-product-cancel"><i class="bx bx-x"></i>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item" href="javascript:;">
                                        <div class="d-flex align-items-center gap-3">
                                            <div class="position-relative">
                                                <div class="cart-product rounded-circle bg-light">
                                                    <img src="<?php echo $_DIR; ?>/assets/images/products/04.png"
                                                         class=""
                                                         alt="توضیح تصویر">
                                                </div>
                                            </div>
                                            <div class="flex-grow-1">
                                                <h6 class="cart-product-title mb-0">تیشرت سفید مردانه</h6>
                                                <p class="cart-product-price mb-0">1 * 290000</p>
                                            </div>
                                            <div class="">
                                                <p class="cart-price mb-0">250000</p>
                                            </div>
                                            <div class="cart-product-cancel"><i class="bx bx-x"></i>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item" href="javascript:;">
                                        <div class="d-flex align-items-center gap-3">
                                            <div class="position-relative">
                                                <div class="cart-product rounded-circle bg-light">
                                                    <img src="<?php echo $_DIR; ?>/assets/images/products/05.png"
                                                         class=""
                                                         alt="توضیح تصویر">
                                                </div>
                                            </div>
                                            <div class="flex-grow-1">
                                                <h6 class="cart-product-title mb-0">تیشرت سفید مردانه</h6>
                                                <p class="cart-product-price mb-0">1 * 290000</p>
                                            </div>
                                            <div class="">
                                                <p class="cart-price mb-0">250000</p>
                                            </div>
                                            <div class="cart-product-cancel"><i class="bx bx-x"></i>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item" href="javascript:;">
                                        <div class="d-flex align-items-center gap-3">
                                            <div class="position-relative">
                                                <div class="cart-product rounded-circle bg-light">
                                                    <img src="<?php echo $_DIR; ?>/assets/images/products/06.png"
                                                         class=""
                                                         alt="توضیح تصویر">
                                                </div>
                                            </div>
                                            <div class="flex-grow-1">
                                                <h6 class="cart-product-title mb-0">تیشرت سفید مردانه</h6>
                                                <p class="cart-product-price mb-0">1 * 290000</p>
                                            </div>
                                            <div class="">
                                                <p class="cart-price mb-0">250000</p>
                                            </div>
                                            <div class="cart-product-cancel"><i class="bx bx-x"></i>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item" href="javascript:;">
                                        <div class="d-flex align-items-center gap-3">
                                            <div class="position-relative">
                                                <div class="cart-product rounded-circle bg-light">
                                                    <img src="<?php echo $_DIR; ?>/assets/images/products/07.png"
                                                         class=""
                                                         alt="توضیح تصویر">
                                                </div>
                                            </div>
                                            <div class="flex-grow-1">
                                                <h6 class="cart-product-title mb-0">تیشرت سفید مردانه</h6>
                                                <p class="cart-product-price mb-0">1 * 290000</p>
                                            </div>
                                            <div class="">
                                                <p class="cart-price mb-0">250000</p>
                                            </div>
                                            <div class="cart-product-cancel"><i class="bx bx-x"></i>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item" href="javascript:;">
                                        <div class="d-flex align-items-center gap-3">
                                            <div class="position-relative">
                                                <div class="cart-product rounded-circle bg-light">
                                                    <img src="<?php echo $_DIR; ?>/assets/images/products/08.png"
                                                         class=""
                                                         alt="توضیح تصویر">
                                                </div>
                                            </div>
                                            <div class="flex-grow-1">
                                                <h6 class="cart-product-title mb-0">تیشرت سفید مردانه</h6>
                                                <p class="cart-product-price mb-0">1 * 290000</p>
                                            </div>
                                            <div class="">
                                                <p class="cart-price mb-0">250000</p>
                                            </div>
                                            <div class="cart-product-cancel"><i class="bx bx-x"></i>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item" href="javascript:;">
                                        <div class="d-flex align-items-center gap-3">
                                            <div class="position-relative">
                                                <div class="cart-product rounded-circle bg-light">
                                                    <img src="<?php echo $_DIR; ?>/assets/images/products/09.png"
                                                         class=""
                                                         alt="توضیح تصویر">
                                                </div>
                                            </div>
                                            <div class="flex-grow-1">
                                                <h6 class="cart-product-title mb-0">تیشرت سفید مردانه</h6>
                                                <p class="cart-product-price mb-0">1 * 290000</p>
                                            </div>
                                            <div class="">
                                                <p class="cart-price mb-0">250000</p>
                                            </div>
                                            <div class="cart-product-cancel"><i class="bx bx-x"></i>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <a href="javascript:;">
                                    <div class="text-center msg-footer">
                                        <div class="d-flex align-items-center justify-content-between mb-3">
                                            <h5 class="mb-0">قیمت کل</h5>
                                            <h5 class="mb-0 ms-auto">4890000</h5>
                                        </div>
                                        <button class="btn btn-light w-100">تسویه حساب</button>
                                    </div>
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="user-box dropdown px-3">
                    <a class="d-flex align-items-center nav-link dropdown-toggle gap-3 dropdown-toggle-nocaret"
                       href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="user-info">
                            <p class="user-name mb-0">
                                <?php echo getLoginInfo()['PersonFirstName']; ?>
                            </p>
                            <p class="designattion mb-0">
                                <?php echo getLoginInfo()['PersonLastName']; ?>
                            </p>
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item d-flex align-items-center"
                               href="<?php echo base_url('Admin/Dashboard/Profile'); ?>"><i class="bx bx-user fs-5"></i><span>پروفایل</span></a>
                        </li>
                        <li>
                            <div class="dropdown-divider mb-0"></div>
                        </li>
                        <li><a class="dropdown-item d-flex align-items-center"
                               href="<?php echo base_url('Admin/Dashboard/Home/log_out'); ?>"><i
                                        class="bx bx-log-out-circle"></i><span>خروج</span></a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>
    <!--end header -->