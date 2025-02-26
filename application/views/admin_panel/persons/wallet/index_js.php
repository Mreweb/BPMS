<script type="text/javascript">
    $(document).ready(function () {
        $inputAttachmentSource = "";
        $("#do_save").click(function (e) {
            $.confirm({
                title: 'افزایش موجودی',
                theme: 'dark',
                content: 'آیا مطمئن هستید؟',
                buttons: {
                    بله: {
                        btnClass: 'btn btn-success',
                        action: function () {
                            e.preventDefault();
                            toggleLoader();
                            $inputBalance = $.trim($("#inputBalance").cleanVal());
                            $inputPersonId = $.trim($("#inputPersonId").val());
                            $inputGateWay = $.trim($("#inputGateWay").val());
                            $inputAuthority = $.trim($("#inputAuthority").val());
                            $inputDescription = $.trim($("#inputDescription").val());
                            $sendData = {
                                'inputPersonId': $inputPersonId,
                                'inputAttachmentSource': $inputAttachmentSource,
                                'inputBalance': $inputBalance,
                                'inputGateWay': $inputGateWay,
                                'inputAuthority': $inputAuthority,
                                'inputDescription': $inputDescription
                            };
                            $.ajax({
                                type: 'post',
                                url: base_url + 'Persons/doUpdateWallet',
                                data: $sendData,
                                success: function (data) {
                                    $result = data;
                                    notify($result['content'], $result['type']);
                                    toggleLoader();
                                    location.reload();
                                }
                            });
                        },
                    },
                    انصراف: {
                        btnClass: 'btn btn-default',
                        action: function () { }
                    }
                }
            });
        });

        function readURL(input) {
            toggleLoader();
            if (input.files && input.files[0] && input.files[0].name.match(/\.(jpg|jpeg|png|gif|pdf|word|zip|rar)$/)) {
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
                                    $(".uploaded-files tbody").append("<tr data-name='" + $result['fileName'] + "' data-src='" + $result['fileSrc'] + "'><td>" + $result['fileName'] + "</td><td  class='fit'><button class='btn btn-danger btn-sm remove-file'>X</button></td></tr>");
                                    $(".uploaded-files table").show();
                                } else{
                                    notify($result['content'], 'red');
                                }
                                toggleLoader();
                            },
                            error: function (data) {
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
            readURL(this);
        });

    });
</script>
