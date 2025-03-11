<script type="text/javascript">
    $(document).ready(function () {
        $("#show_hide_password a").on('click', function (event) {
            event.preventDefault();
            if ($('#show_hide_password input').attr("type") == "text") {
                $('#show_hide_password input').attr('type', 'password');
                $('#show_hide_password i').addClass("bx-hide");
                $('#show_hide_password i').removeClass("bx-show");
            } else if ($('#show_hide_password input').attr("type") == "password") {
                $('#show_hide_password input').attr('type', 'text');
                $('#show_hide_password i').removeClass("bx-hide");
                $('#show_hide_password i').addClass("bx-show");
            }
        });
        $("#login").click(function (e) {
            e.preventDefault();
            toggleLoader();
            $inputPhone = $("#inputPhone").val();
            $inputCaptcha = $("#inputCaptcha").val();
            if ( $inputPhone != "" && $inputCaptcha != "") {
                $sendData = {
                    'inputPhone': $inputPhone,
                    'inputCaptcha': $inputCaptcha
                }
                $.ajax({
                    type: 'post',
                    url: base_url + 'Account/do_phone_login',
                    data: $sendData,
                    success: function (data) {
                        toggleLoader();
                        $result = data;
                        iziToast.show({
                            title: $result['content'],
                            color: $result['type'],
                            zindex: 2030,
                            position: 'topLeft'
                        });
                        if ($result['success']) {
                            $(".phone").addClass('deactive');
                            $(".phone-button").hide();
                            $(".verify-code").show();
                            $(".verify-button").show();
                            $(".verify-code input").focus();
                            $("#inputCaptcha").val('');
                        }
                        $(".recaptcha").click();
                    }
                });
            } else {
                toggleLoader();
                iziToast.show({
                    title: 'لطفا تمامی مقادیر را کامل کنید',
                    color: 'yellow', // blue, red, green, yellow
                    zindex: 2030000,
                    position: 'topLeft'
                });
            }
        });
        $("#login_verify").click(function (e) {
            e.preventDefault();
            toggleLoader();
            $inputPhone = $("#inputPhone").val();
            $inputVerifyCode = $("#inputVerifyCode").val();
            $inputCaptcha = $("#inputCaptcha").val();
            if ( $inputPhone != "" && $inputCaptcha != "") {
                $sendData = {
                    'inputPhone': $inputPhone,
                    'inputVerifyCode': $inputVerifyCode,
                    'inputCaptcha': $inputCaptcha
                }
                $.ajax({
                    type: 'post',
                    url: base_url + 'Account/do_verify_phone',
                    data: $sendData,
                    success: function (data) {
                        toggleLoader();
                        $result = data;
                        iziToast.show({
                            title: $result['content'],
                            color: $result['type'],
                            zindex: 2030,
                            position: 'topLeft'
                        });
                        if ($result['success']) {
                            window.location.href = "<?php echo base_url('Admin/Dashboard/Home');  ?>";
                        }
                    }
                });
            } else {
                toggleLoader();
                iziToast.show({
                    title: 'لطفا تمامی مقادیر را کامل کنید',
                    color: 'yellow', // blue, red, green, yellow
                    zindex: 2030000,
                    position: 'topLeft'
                });
            }
        });
        $(".recaptcha").click(function(){
            $src = $(this).prev('img').attr('src');
            $src = $src +"?date=" +Date.now();
            $(this).prev('img').attr('src' , $src);
        });

        setTimeout(function(){
            $("input").val('');
        } , 1000);
    });
</script>