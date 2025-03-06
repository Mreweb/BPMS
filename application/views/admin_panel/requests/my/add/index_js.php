<script type="text/javascript">
    $(document).ready(function () {
        $("#do_save").click(function (e) {
            e.preventDefault();
            $this = $(this);
            $attachments = [];


            /*Request Info*/
            $inputTitle = $.trim($("#inputTitle").val());
            $inputReqType = $.trim($("#inputReqType").val());
            $inputAgentNationalCode = $.trim($("#inputAgentNationalCode").val());
            $inputMarketMakerNationalCode = $.trim($("#inputMarketMakerNationalCode").val());
            $inputPrice = $.trim($("#inputPrice").val());
            $inputDescription = $.trim($("#inputDescription").val());

            /*Request Property Info*/
            $inputPropertyID = $.trim($("#inputPropertyID").val());
            $inputPropertyRegisterDate = $.trim($("#inputPropertyRegisterDate").val());
            $inputPropertyType = $.trim($("#inputPropertyType").val());
            $inputPropertySpecialStatus = $.trim($("#inputPropertySpecialStatus").val());
            $inputPropertyUseType = $.trim($("#inputPropertyUseType").val());
            $inputPropertyDocType = $.trim($("#inputPropertyDocType").val());
            $inputPropertyUseReason = $.trim($("#inputPropertyUseReason").val());
            $inputPropertyUUID = $.trim($("#inputPropertyUUID").val());
            $inputPropertyPassword = $.trim($("#inputPropertyPassword").val());
            $inputPropertyAreaSupply = $.trim($("#inputPropertyAreaSupply").val());
            $inputPropertyAreaNobility = $.trim($("#inputPropertyAreaNobility").val());
            $inputPropertyRegistrationPlate = $.trim($("#inputPropertyRegistrationPlate").val());
            $inputPropertySeparate = $.trim($("#inputPropertySeparate").val());
            $inputPropertyPiece = $.trim($("#inputPropertyPiece").val());
            $inputPropertyRegistrationDepartment = $.trim($("#inputPropertyRegistrationDepartment").val());
            $inputPropertyDistrict = $.trim($("#inputPropertyDistrict").val());
            $inputPropertyBlock = $.trim($("#inputPropertyBlock").val());
            $inputPropertyFloor = $.trim($("#inputPropertyFloor").val());
            $inputPropertySide = $.trim($("#inputPropertySide").val());
            $inputPropertyBuildYear = $.trim($("#inputPropertyBuildYear").val());
            $inputPropertyPostalCode = $.trim($("#inputPropertyPostalCode").val());
            $inputPropertyAddress= $.trim($("#inputPropertyAddress").val());
            $inputPropertyUseTypeSide = $.trim($("#inputPropertyUseTypeSide").val());

            /*Request Property Owner Info*/
            $inputOwnerNationalCode = $.trim($("#inputOwnerNationalCode").val());
            $inputOwnerName = $.trim($("#inputOwnerName").val());
            $inputOwnerBankRelation = $.trim($("#inputOwnerBankRelation").val());
            $inputOwnerCompanyType = $.trim($("#inputOwnerCompanyType").val());
            $inputOwnerTypeDependentPerson = $.trim($("#inputOwnerTypeDependentPerson").val());
            $inputOwnerOwnershipPercentage = $.trim($("#inputOwnerOwnershipPercentage").val());

            $(".uploaded-files tbody tr").each(function(){
                $attach = {
                    'type' : $(this).data('type'),
                    'name' : $(this).data('name'),
                    'src'  : $(this).data('src')
                };
                $attachments.push($attach);
            });

            $sendData = {

                /* Property Info */
                'inputPropertyID': $inputPropertyID,
                'inputPropertyRegisterDate': $inputPropertyRegisterDate,
                'inputPropertyType': $inputPropertyType,
                'inputPropertySpecialStatus': $inputPropertySpecialStatus,
                'inputPropertyUseType': $inputPropertyUseType,
                'inputPropertyDocType': $inputPropertyDocType,
                'inputPropertyUseReason': $inputPropertyUseReason,
                'inputPropertyUUID': $inputPropertyUUID,
                'inputPropertyPassword': $inputPropertyPassword,
                'inputPropertyAreaSupply': $inputPropertyAreaSupply,
                'inputPropertyAreaNobility': $inputPropertyAreaNobility,
                'inputPropertyRegistrationPlate': $inputPropertyRegistrationPlate,
                'inputPropertySeparate': $inputPropertySeparate,
                'inputPropertyPiece': $inputPropertyPiece,
                'inputPropertyRegistrationDepartment': $inputPropertyRegistrationDepartment,
                'inputPropertyDistrict': $inputPropertyDistrict,
                'inputPropertyBlock': $inputPropertyBlock,
                'inputPropertyFloor': $inputPropertyFloor,
                'inputPropertySide': $inputPropertySide,
                'inputPropertyBuildYear': $inputPropertyBuildYear,
                'inputPropertyPostalCode': $inputPropertyPostalCode,
                'inputPropertyAddress': $inputPropertyAddress,
                'inputPropertyUseTypeSide': $inputPropertyUseTypeSide,

                /* Request Info */
                'inputTitle': $inputTitle,
                'inputReqType': $inputReqType,
                'inputAgentNationalCode': $inputAgentNationalCode,
                'inputMarketMakerNationalCode': $inputMarketMakerNationalCode,
                'inputPrice': $inputPrice,
                'inputDescription': $inputDescription,
                'inputAttachments': $attachments,


                /* Property Owner Info */
                'inputOwnerNationalCode': $inputOwnerNationalCode,
                'inputOwnerName': $inputOwnerName,
                'inputOwnerBankRelation': $inputOwnerBankRelation,
                'inputOwnerCompanyType': $inputOwnerCompanyType,
                'inputOwnerTypeDependentPerson': $inputOwnerTypeDependentPerson,
                'inputOwnerOwnershipPercentage': $inputOwnerOwnershipPercentage,

            };


            $.confirm({
                title: 'ثبت درخواست',
                content: 'آیا از ثبت درخواست مطمئن هستید؟',
                theme: 'dark',
                columnClass: 'col-md-6 col-md-offset-3',
                buttons: {
                    'ثبت نهایی': {
                        text: 'ثبت و ارسال جهت بررسی',
                        btnClass: 'btn-green',
                        action: function () {
                            toggleLoader();
                            $.ajax({
                                type: 'post',
                                url: base_url + 'MyRequests/doAdd',
                                data: $sendData,
                                success: function (data) {
                                    $result = data;
                                    notify($result['content'], $result['type']);
                                    toggleLoader();
                                    window.history.back();
                                }
                            });
                        }
                    },
                    'پیش نویس': {
                        text: 'ثبت موقت و عدم ارسال جهت بررسی',
                        btnClass: 'btn-blue',
                        action: function () {
                            toggleLoader();
                            $.ajax({
                                type: 'post',
                                url: base_url + 'MyRequests/doAdd?draft=true',
                                data: $sendData,
                                success: function (data) {
                                    $result = data;
                                    notify($result['content'], $result['type']);
                                    toggleLoader();
                                    window.history.back();
                                }
                            });
                        }
                    },
                    'انصراف': function () {
                    },
                }
            });
        });
        $(document).on('click', '.remove-file',function(){
            $this = $(this);
            $.confirm({
                title: 'حذف سند',
                content: 'آیا از حذف سند مطمئن هستید؟',
                theme: 'dark',
                buttons: {
                    'ثبت': {
                        text: 'حذف',
                        btnClass: 'btn-red',
                        action: function () {
                            $this.parent().parent().remove();
                        }
                    },
                    'انصراف': function () {
                    },
                }
            });
        });
        function readURL(input , name) {
            toggleLoader();
            if (input.files && input.files[0] && input.files[0].name.match(/\.(jpg|JPG|JPEG|jpeg|png|PNG|gif|pdf|word|zip|docx|doc|xlsx|xls|rar)$/)) {
                $FileSize = input.files[0].size / 1024 / 1024;
                if ($FileSize < 20) {
                    if (input.files && input.files[0]) {
                        var reader = new FileReader();
                        reader.onload = function (e) {
                            var file = e.target.result;
                        };
                        reader.readAsDataURL(input.files[0]);
                        var file_data = input.files[0];
                        var form_data = new FormData();
                        form_data.append('file',file_data);
                        $.ajax({
                            url: base_url + '/Home/uploadFile',
                            dataType: 'text',
                            cache: false,
                            contentType: false,
                            processData: false,
                            data: form_data,
                            type: 'post',
                            success: function (data) {
                                $result = JSON.parse(data);
                                if($result['success']) {
                                    $inputAttachmentSource = $result['fileSrc'];
                                    notify('بارگذاری فایل با موفقیت انجام شد', 'green');
                                    $cloned = $(".alert-form").clone();
                                    $.confirm({
                                        title: 'عنوان سند',
                                        theme: 'dark',
                                        content: $cloned.removeClass('d-none'),
                                        buttons: {
                                            'ثبت': {
                                                text: 'ثبت',
                                                btnClass: 'btn-blue',
                                                action: function () {
                                                    var name = this.$content.find('.name').val();
                                                    var type = this.$content.find('.type').val();
                                                    if(!name){
                                                        $.alert('لطفا یک عنوان معتبر انتخاب کنید');
                                                        return false;
                                                    }

                                                    $(".uploaded-files tbody").append("<tr data-type='" + type + "'  data-name='" + name + "' data-src='" + $result['fileSrc'] + "'><td>" + name + "</td><td  class='fit'><button class='btn btn-danger btn-sm remove-file'>X</button></td></tr>");
                                                    $(".uploaded-files table").show();
                                                    $("#file").val('');

                                                }
                                            },
                                            'انصراف': function () {
                                                $("#file").val('');
                                            },
                                        }
                                    });
                                } else{
                                    notify($result['content'], 'red');
                                    $("#file").val('');
                                }
                                toggleLoader();
                            },
                            error: function (data) {
                                $("#file").val('');
                            }
                        });
                    }
                }
                else {
                    toggleLoader();
                    notify("فایل شما باید کمتر از هشت مگابایت باشد", "red");
                }
            }
            else {
                toggleLoader();
                notify("فرمت فایل نامعتبر است", "red");
            }
        }
        $("#file").change(function () {
            readURL(this)
        });
        $(document).on('change' , '.alert-form select' , function(){
            if($(this).val() == 'OTHER'){
                $(this).parent().find("input").show();
                $(this).parent().find(".name-title").show();
            } else{
                $(this).parent().find("input").val($(this).find('option:selected').text());
                $(this).parent().find("input").hide();
                $(this).parent().find(".name-title").hide();
            }
        });
        $('.alert-form select').change();
    });
</script>
