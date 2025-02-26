<script type="text/javascript">
    $(document).ready(function () {
        $("#do_save").click(function (e) {
            e.preventDefault();

            $this = $(this);
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
                            $attachments = [];
                            $inputReqId = $.trim($("#inputReqId").val());
                            $inputTitle = $.trim($("#inputTitle").val());
                            $inputReqType = $.trim($("#inputReqType").val());
                            $inputReqUseType = $.trim($("#inputReqUseType").val());
                            $inputAgentNationalCode = $.trim($("#inputAgentNationalCode").val());
                            $inputMarketMakerNationalCode = $.trim($("#inputMarketMakerNationalCode").val());
                            $inputPrice = $.trim($("#inputPrice").val());
                            $inputDescription = $.trim($("#inputDescription").val());
                            $(".uploaded-files tbody tr").each(function(){
                                $attach = {
                                    'type' : $(this).data('type'),
                                    'name' : $(this).data('name'),
                                    'src'  : $(this).data('src')
                                };
                                $attachments.push($attach);
                            });
                            $sendData = {
                                'inputReqId': $inputReqId,
                                'inputTitle': $inputTitle,
                                'inputReqType': $inputReqType,
                                'inputAgentNationalCode': $inputAgentNationalCode,
                                'inputMarketMakerNationalCode': $inputMarketMakerNationalCode,
                                'inputReqUseType': $inputReqUseType,
                                'inputReqStatus': 'LEGAL',
                                'inputPrice': $inputPrice,
                                'inputDescription': $inputDescription,
                                'inputAttachments': $attachments
                            };
                            $.ajax({
                                type: 'post',
                                url: base_url + 'MyRequests/doEdit',
                                data: $sendData,
                                success: function (data) {
                                    $result = data;
                                    notify($result['content'], $result['type']);
                                    toggleLoader();
                                    location.reload();
                                }
                            });
                        }
                    },
                    'پیش نویس': {
                        text: 'ثبت موقت و عدم ارسال جهت بررسی',
                        btnClass: 'btn-blue',
                        action: function () {
                            toggleLoader();
                            $attachments = [];
                            $inputReqId = $.trim($("#inputReqId").val());
                            $inputTitle = $.trim($("#inputTitle").val());
                            $inputReqType = $.trim($("#inputReqType").val());
                            $inputReqUseType = $.trim($("#inputReqUseType").val());
                            $inputAgentNationalCode = $.trim($("#inputAgentNationalCode").val());
                            $inputMarketMakerNationalCode = $.trim($("#inputMarketMakerNationalCode").val());
                            $inputPrice = $.trim($("#inputPrice").val());
                            $inputDescription = $.trim($("#inputDescription").val());
                            $(".uploaded-files tbody tr").each(function(){
                                $attach = {
                                    'type' : $(this).data('type'),
                                    'name' : $(this).data('name'),
                                    'src'  : $(this).data('src')
                                };
                                $attachments.push($attach);
                            });
                            $sendData = {
                                'inputReqId': $inputReqId,
                                'inputTitle': $inputTitle,
                                'inputReqType': $inputReqType,
                                'inputReqUseType': $inputReqUseType,
                                'inputAgentNationalCode': $inputAgentNationalCode,
                                'inputMarketMakerNationalCode': $inputMarketMakerNationalCode,
                                'inputReqStatus': 'DRAFT',
                                'inputPrice': $inputPrice,
                                'inputDescription': $inputDescription,
                                'inputAttachments': $attachments
                            };
                            $.ajax({
                                type: 'post',
                                url: base_url + 'MyRequests/doEdit',
                                data: $sendData,
                                success: function (data) {
                                    $result = data;
                                    notify($result['content'], $result['type']);
                                    toggleLoader();
                                    location.reload();
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
