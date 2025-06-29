<script type="text/javascript">
    $(document).ready(function () {
        $("#do_save").click(function (e) {
            e.preventDefault();
            $this = $(this);
            $attachments = [];
            $attachmentsImages = [];


            /*Request Info*/
            $inputTitle = $.trim($("#inputTitle").val());
            $inputReqType = $.trim($("#inputReqType").val());
            $inputAgentNationalCode = $.trim($("#inputAgentNationalCode").val());
            $inputMarketMakerNationalCode = $.trim($("#inputMarketMakerNationalCode").val());
            $inputPrice = $.trim($("#inputPrice").val());
            $inputDescription = $.trim($("#inputDescription").val());
            $inputProvince = $.trim($("#inputProvince").val());
            $inputCity = $.trim($("#inputCity").val());

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


            /* Final Property Info  */
            $inputFinalPropertyPercentageOwnership = $.trim($("#inputFinalPropertyPercentageOwnership").val());
            $inputFinalPropertyAcquire = $.trim($("#inputFinalPropertyAcquire").val());
            $inputFinalPropertyType = $.trim($("#inputFinalPropertyType").val());
            $inputFinalPropertyBuyDate = $.trim($("#inputFinalPropertyBuyDate").val());
            $inputFinalPropertySurplus = $.trim($("#inputFinalPropertySurplus").val());
            $inputFinalPropertyExcluded = $.trim($("#inputFinalPropertyExcluded").val());
            $inputFinalPropertyExcludeReason  = $.trim($("#inputFinalPropertyExcludeReason").val());
            $inputFinalPropertyUnopposed  = $.trim($("#inputFinalPropertyUnopposed").val());
            $inputFinalPropertyHasLegal = $.trim($("#inputFinalPropertyHasLegal").val());
            $inputFinalPropertyOrderDate = $.trim($("#inputFinalPropertyOrderDate").val());
            $inputFinalPropertyVote  = $.trim($("#inputFinalPropertyVote").val());
            $inputFinalPropertyWithdrawBenefit = $.trim($("#inputFinalPropertyWithdrawBenefit").val());
            $inputFinalPropertyDocFinalStatus  = $.trim($("#inputFinalPropertyDocFinalStatus").val());
            $inputFinalPropertySummary = $.trim($("#inputFinalPropertySummary").val());
            $inputFinalPropertyValue = $.trim($("#inputFinalPropertyValue").val());
            $inputFinalPropertyValueCheck  = $.trim($("#inputFinalPropertyValueCheck").val());
            $inputFinalPropertyCheckValue = $.trim($("#inputFinalPropertyCheckValue").val());
            $inputFinalPropertySurvey = $.trim($("#inputFinalPropertySurvey").val());

            /*Request Property Owner Info*/
            $inputPropertyGoogleMap = $.trim($("#inputPropertyGoogleMap").val());
            $inputPropertyNeshan = $.trim($("#inputPropertyNeshan").val());
            $inputPropertyBalad = $.trim($("#inputPropertyBalad").val());


            $(".uploaded-files tbody tr").each(function(){
                $attach = {
                    'type' : $(this).data('type'),
                    'name' : $(this).data('name'),
                    'src'  : $(this).data('src')
                };
                $attachments.push($attach);
            });


            $(".uploaded-image-files tr").each(function(){
                $attach = {
                    'src'  : $(this).data('src')
                };
                $attachmentsImages.push($attach);
            });


            $sendData = {

                /* Property Info */
                'inputPropertyID': "شناسه ملک",
                'inputPropertyRegisterDate': "1404/04/09",
                'inputPropertyType': "1",
                'inputPropertySpecialStatus': "2",
                'inputPropertyUseType': "",
                'inputPropertyDocType': "3",
                'inputPropertyUseReason': "دلیل استفاده",
                'inputPropertyUUID': "شناسه یکتا",
                'inputPropertyPassword': "رمز تصدیق",
                'inputPropertyAreaSupply': "مساحت عرصه",
                'inputPropertyAreaNobility': "مساحت اعیان",
                'inputPropertyRegistrationPlate': "پلاک ثبتی (اصلی- فرعی)",
                'inputPropertySeparate': "مفروز از / مجزی از",
                'inputPropertyPiece': "قطعه",
                'inputPropertyRegistrationDepartment': "بخش ثبتی",
                'inputPropertyDistrict': "RfgtbF14",
                'inputPropertyBlock': "بلوک",
                'inputPropertyFloor': "طبقه",
                'inputPropertySide': "سمت",
                'inputPropertyBuildYear': "سمت",
                'inputPropertyPostalCode': "1685665817",
                'inputPropertyAddress': "تهران شهریار خیابان ولیعصر",
                'inputPropertyUseTypeSide': "پهنه کاربری",

                /* Request Info */
                'inputTitle': "درخواست شماره 250",
                'inputReqType': "2",
                'inputAgentNationalCode': "",
                'inputMarketMakerNationalCode': "",
                'inputPrice': "540,000,000,000",
                'inputDescription': "توضیحات مد نظر",
                'inputAttachments': "PROPERTY_DEED",
                'inputAttachmentImages': [{
                    'name':'سند ملک',
                    'src': 'http://localhost:8080/BPMS/uploads/80222c255786ca21afd93226c4872bd4_5367214908.xlsx'
                }],


                /* Property Owner Info */
                'inputOwnerNationalCode': "تهران",
                'inputOwnerName': "kmb",
                'inputOwnerBankRelation': "2",
                'inputOwnerCompanyType': "2",
                'inputOwnerTypeDependentPerson': "2",
                'inputOwnerOwnershipPercentage': "90",



                /* Property Owner Info */
                'inputPropertyGoogleMap': "https://maps.app.goo.gl/eysqVNFZ5VadRj2V9",
                'inputPropertyNeshan': "https://nshn.ir/_bvS9RQxp7Ao",
                'inputPropertyBalad': "https://balad.ir/p/27hl8jTwO2cwsa",

                /* Property Province */
                'inputProvince': "8",
                'inputCity': "547",

                /* Final Property Info  */
                'inputFinalPropertyPercentageOwnership': "95",
                'inputFinalPropertyAcquire': "1",
                'inputFinalPropertyType': "2",
                'inputFinalPropertyBuyDate': "1404/04/07",
                'inputFinalPropertySurplus': "0",
                'inputFinalPropertyExcluded': "1",
                'inputFinalPropertyExcludeReason': "املاک استثنا",
                'inputFinalPropertyUnopposed': "0",
                'inputFinalPropertyHasLegal': "1",
                'inputFinalPropertyOrderDate': "1404/04/02",
                'inputFinalPropertyVote': "0",
                'inputFinalPropertyWithdrawBenefit': "1520000000",
                'inputFinalPropertyDocFinalStatus': "1",
                'inputFinalPropertySummary': "2150000",
                'inputFinalPropertyValue': "",
                'inputFinalPropertyValueCheck': "1404/04/19",
                'inputFinalPropertyCheckValue': "1540000000",
                'inputFinalPropertySurvey': "ایرنا",

            };
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

        function readImageURL(input , name) {
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

                                    $(".uploaded-image-files tbody").append("<tr data-src='" + $inputAttachmentSource + "'><td><img width='100' height='100' src='" + $inputAttachmentSource   + "' /></td><td  class='fit'><button class='btn btn-danger btn-sm remove-file'>X</button></td></tr>");
                                    $(".uploaded-image-files table").show();
                                    $("#file-image").val('');
                                } else{
                                    notify($result['content'], 'red');
                                    $("#file-image").val('');
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
        $("#file-image").change(function () {
            readImageURL(this)
        });

        $('#inputProvince').change(function () {
            toggleLoader();
            $("#inputCity").html('');
            $stateId = $(this).val();
            $.ajax({
                type: 'post',
                url: "<?php echo base_url(); ?>" + 'Country/getCityByProvinceId/' + $stateId,
                success: function (data) {
                    toggleLoader();
                    $result = jQuery.parseJSON(data);
                    for (let i = 0; i < $result.length; i++) {
                        $("#inputCity").append('<option value="' + $result[i].CityId + '">' + $result[i].CityName + '</option>');
                    }
                    cutSelectOptionLongText();
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    iziToast.show({
                        title: 'خطای ارتباط با سرور.دقایقی دیگر تلاش کنید',
                        color: 'red',
                        zindex: 9060,
                        position: 'topLeft'
                    });
                    toggleLoader();
                }
            });
        });

    });
</script>
