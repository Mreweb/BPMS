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
            $inputPhone = $("#inputPhone").val();
            $inputPassword = $("#inputPassword").val();
            $inputCaptcha = $("#inputCaptcha").val();
            if ($inputPassword != "" && $inputPhone != "" && $inputCaptcha != "") {
                $sendData = {
                    'inputPhone': $inputPhone,
                    'inputPassword': $inputPassword,
                    'inputCaptcha': $inputCaptcha
                }
                $.ajax({
                    type: 'post',
                    url: base_url + 'Account/do_login',
                    data: $sendData,
                    success: function (data) {
                        $result = data;
                        iziToast.show({
                            title: $result['content'],
                            color: $result['type'],
                            zindex: 2030,
                            position: 'topLeft'
                        });
                        $(".recaptcha").click();
                        if ($result['success']) {
                            setTimeout(function () {
                                window.location.href = "<?php echo base_url('Admin/Dashboard/Home');  ?>";
                            }, 2000);
                        }
                    },
                    error: function(data){
                        $result = data.responseJSON;
                        iziToast.show({
                            title: $result['content'],
                            color: $result['type'],
                            zindex: 2030,
                            position: 'topLeft'
                        });
                        $(".recaptcha").click();
                    }
                });
            }
            else {
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