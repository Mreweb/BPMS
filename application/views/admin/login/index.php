<?php
$_URL = base_url();
$_DIR = base_url('assets');
?>
<!doctype html>
<html lang="fa" dir="rtl">
<head>
    <title><?php echo $pageTitle; ?></title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
    <link rel="icon" href="<?php echo $_DIR ?>/images/favicon-32x32.png" type="image/png"/>
    <!--plugins-->
    <link href="<?php echo $_DIR ?>/plugins/simplebar/css/simplebar.css" rel="stylesheet"/>
    <link href="<?php echo $_DIR ?>/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet"/>
    <link href="<?php echo $_DIR ?>/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet"/>

    <!-- loader-->
    <link href="<?php echo $_DIR ?>/css/pace.min.css" rel="stylesheet"/>
    <script  src="<?php echo $_DIR ?>/js/pace.min.js"></script>

    <!-- IZI-->
    <link href="<?php echo $_DIR ?>/plugins/izi/izi.min.css" rel="stylesheet"/>
    <script  src="<?php echo $_DIR ?>/plugins/izi/izi.min.js"></script>

    <!-- Bootstrap CSS -->
    <link href="<?php echo $_DIR ?>/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo $_DIR ?>/css/bootstrap-extended.css" rel="stylesheet">
    <link href="<?php echo $_DIR ?>/css/app.css" rel="stylesheet">
    <link href="<?php echo $_DIR ?>/css/icons.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo $_DIR ?>/fonts/vazir/Farsi-Digits/Vazirmatn-FD-font-face.css">
    <link rel="stylesheet" href="<?php echo $_DIR ?>/css/rtl.css">

    <!-- Bootstrap JS -->
    <script src="<?php echo $_DIR ?>/js/bootstrap.bundle.min.js"></script>
    <!--plugins-->
    <script src="<?php echo $_DIR ?>/js/jquery.min.js"></script>
    <script type="text/javascript">
        var base_url = "<?php echo base_url(); ?>";
        function toggleLoader() {
            $(".preloader").fadeToggle();
        }
        function reCaptcha() {
            $(".recaptcha").addClass('fa-spin');
            $src = $(".captcha_img").attr('src');
            $(".captcha_img").attr('src' , '').css({
                width: '100px',
                height: '50px',
                display: 'inline-block',
                opacity: '0'
            });
            setTimeout(function(){
                $(".captcha_img").attr('src' , $src).css({
                    width: '100px',
                    height: '50px',
                    display: 'inline-block',
                    opacity: '1'
                });
                $(".recaptcha").removeClass('fa-spin');
            } , 400);
        }
        $(document).ready(function(){
            $.ajaxSetup({
                error: function (data, status, error) {
                    $result = data.responseJSON;
                    if($result['message'] != undefined){
                        iziToast.show({
                            title: $result['message'],
                            color: $result['type'],
                            zindex: 2030,
                            position: 'topLeft'
                        });
                    } else{
                        iziToast.show({
                            title: $result['content'],
                            color: $result['type'],
                            zindex: 2030,
                            position: 'topLeft'
                        });
                    }
                }
            });
        });
    </script>
</head>
<body class="bg-theme bg-theme2">

<!--wrapper-->
<div class="wrapper">
    <div class="section-authentication-signin d-flex align-items-center justify-content-center my-5 my-lg-0">
        <div class="container">
            <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
                <div class="col mx-auto">
                    <div class="card mb-0">
                        <div class="card-body">
                            <div class="p-4">
                                <div class="mb-3 text-center">
                                    <img src="<?php echo $_DIR ?>/images/logo-icon.png" width="60" alt="توضیح تصویر"/>
                                </div>
                                <div class="text-center mb-4">
                                    <h5 class="">ورود به داشبورد</h5>
                                    <p class="mb-0">برای ورود اطلاعات خود را وارد کنید</p>
                                </div>
                                <div class="form-body">
                                    <form class="row g-3" autocomplete="off">
                                        <div class="col-12">
                                            <label for="inputEmailAddress" class="form-label">نام کاربری</label>
                                            <input type="text" class="form-control" id="inputPhone"
                                                   name="<?php echo md5(rand(1000,9999)); ?>"
                                                   placeholder="">
                                        </div>
                                        <div class="col-12">
                                            <label for="inputPassword" class="form-label">رمز ورود</label>
                                            <div class="input-group" id="show_hide_password">
                                                <input type="password" class="form-control border-end-0"
                                                       id="inputPassword" value=""
                                                       placeholder="رمز ورود خود را وارد کنید">
                                                <a href="javascript:;"
                                                   class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <label for="inputCaptcha" class="form-label">کد امنیتی</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control border-end-0"
                                                       id="inputCaptcha"
                                                       placeholder="کد امنیتی خود را وارد کنید">
                                                <span href="javascript:;" class="input-group-text bg-transparent">
                                                    <img src="<?php echo base_url('GetCaptcha') ?>" class="img_captcha" />
                                                    <i style="font-size: 24px;cursor: pointer;" class="bx bx-refresh recaptcha"></i>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="d-grid">
                                                <button type="submit" class="btn btn-light" id="login">ورود</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="login-separater text-center mb-4"> <span>یا از طریق تلفن همراه وارد شوید</span>
                                    <hr/>
                                </div>
                                <div class="list-inline contacts-social text-center">
                                    <a href="<?php echo base_url('Account/phone_login'); ?>" class="list-inline-item bg-light text-white border-0 rounded-3">
                                        <i class="bx bx-phone"></i>
                                    </a>
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
<!--end wrapper-->


</body>
</html>
