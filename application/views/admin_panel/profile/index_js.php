<script type="text/javascript">
    $(document).ready(function () {
        $("#do_save").click(function (e) {
            e.preventDefault();
            toggleLoader();
            $inputPersonId = $.trim($("#inputPersonId").val());
            $inputPersonFirstName = $.trim($("#inputPersonFirstName").val());
            $inputPersonLastName = $.trim($("#inputPersonLastName").val());
            $inputPersonNationalCode = $.trim($("#inputPersonNationalCode").val());
            $inputGender = $.trim($("#inputGender").val());
            $inputPersonEmail = $.trim($("#inputPersonEmail").val());
            $inputPersonUserName = $.trim($("#inputUsername").val());
            $inputPersonPassword = $.trim($("#inputPassword").val());

            $sendData = {
                'inputPersonId': $inputPersonId,
                'inputPersonFirstName': $inputPersonFirstName,
                'inputPersonLastName': $inputPersonLastName,
                'inputGender': $inputGender,
                'inputPersonNationalCode': $inputPersonNationalCode,
                'inputPersonEmail': $inputPersonEmail,
                'inputPersonUserName': $inputPersonUserName,
                'inputPersonPassword': $inputPersonPassword
            };
            $.ajax({
                type: 'post',
                url: base_url + 'Profile/doUpdateProfile',
                data: $sendData,
                success: function (data) {
                    $result = data;
                    notify($result['content'], $result['type']);
                    toggleLoader();
                }
            });

        });
        $("#do_send_code").click(function (e) {
            e.preventDefault();
            toggleLoader();
            $inputPersonId = $.trim($("#inputPersonId").val());
            $inputPersonPhone = $.trim($("#inputPersonNewPhone").val());
            $sendData = {
                'inputPersonId': $inputPersonId,
                'inputPersonPhone': $inputPersonPhone
            };
            $.ajax({
                type: 'post',
                url: base_url + 'Profile/doSubmitNewPhone',
                data: $sendData,
                success: function (data) {
                    $result = data;
                    notify($result['content'], $result['type']);
                    toggleLoader();
                }
            });

        });
        $("#do_save_phone").click(function (e) {
            e.preventDefault();
            toggleLoader();
            $inputPersonId = $.trim($("#inputPersonId").val());
            $inputPersonPhone = $.trim($("#inputPersonNewPhone").val());
            $inputCode = $.trim($("#inputCode").val());
            $sendData = {
                'inputPersonPhone': $inputPersonPhone,
                'inputVerifyCode': $inputCode
            };
            $.ajax({
                type: 'post',
                url: base_url + 'Profile/doVerifyPhone',
                data: $sendData,
                success: function (data) {
                    $result = data;
                    notify($result['content'], $result['type']);
                    toggleLoader();
                }
            });

        });

    });
</script>
