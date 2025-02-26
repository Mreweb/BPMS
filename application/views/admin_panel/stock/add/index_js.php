<script type="text/javascript">
    $(document).ready(function () {
        $("#do_save").click(function (e) {
            e.preventDefault();
            toggleLoader();
            $inputPersonFirstName = $.trim($("#inputPersonFirstName").val());
            $inputPersonLastName = $.trim($("#inputPersonLastName").val());
            $inputPersonPhone = $.trim($("#inputPersonPhone").val());
            $inputPersonNationalCode = $.trim($("#inputPersonNationalCode").val());
            $inputGender = $.trim($("#inputGender").val());
            $inputIsActive = $.trim($("#inputIsActive").val());
            $inputRole = $.trim($("#inputRole").val());
            $inputPersonEmail = $.trim($("#inputPersonEmail").val());
            $inputPersonUserName = $.trim($("#inputUsername").val());
            $inputPersonPassword = $.trim($("#inputPassword").val());
            $inputLegalOrganizationName = $.trim($("#inputLegalOrganizationName").val());
            $inputLegalFinanceCode = $.trim($("#inputLegalFinanceCode").val());
            $inputLegalCompanyCode = $.trim($("#inputLegalCompanyCode").val());
            $inputLegalRegisterNumber  = $.trim($("#inputLegalRegisterNumber").val());
            $inputLegalPhone  = $.trim($("#inputLegalPhone").val());
            $inputLegalProvinceId = $.trim($("#inputLegalProvinceId").val());


            $sendData = {
                'inputPersonFirstName': $inputPersonFirstName,
                'inputPersonLastName': $inputPersonLastName,
                'inputGender': $inputGender,
                'inputIsActive': $inputIsActive,
                'inputRole': $inputRole,
                'inputPersonPhone': $inputPersonPhone,
                'inputPersonNationalCode': $inputPersonNationalCode,
                'inputPersonEmail': $inputPersonEmail,
                'inputPersonUserName': $inputPersonUserName,
                'inputPersonPassword': $inputPersonPassword,
                'inputLegalOrganizationName': $inputLegalOrganizationName,
                'inputLegalFinanceCode': $inputLegalFinanceCode,
                'inputLegalCompanyCode': $inputLegalCompanyCode,
                'inputLegalRegisterNumber': $inputLegalRegisterNumber,
                'inputLegalPhone': $inputLegalPhone,
                'inputLegalProvinceId': $inputLegalProvinceId
            };
            $.ajax({
                type: 'post',
                url: base_url + 'Persons/doAddPerson',
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
