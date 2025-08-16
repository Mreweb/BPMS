<script type="text/javascript">
    $(document).ready(function () {
        $("#do_save").click(function (e) {

            $.confirm({
                title: 'ثبت وضعیت درخوایت',
                content: 'آیا مطمئن هستید؟',
                theme: 'dark',
                columnClass: 'col-md-6 col-md-offset-3',
                buttons: {
                    'ثبت': {
                        text: 'ثبت',
                        btnClass: 'btn-green',
                        action: function () {


                            e.preventDefault();
                            toggleLoader();
                            $attachments = [];
                            $inputReqId = $.trim($("#inputReqId").val());
                            $inputResult = $.trim($("#inputResult").val());
                            $inputResultDescription = $.trim($("#inputResultDescription").val());

                            if($inputResult == ""){
                                notify('ثبت وضعیت تایید اجباری است', 'red');
                                return;
                            }
                            if($inputResultDescription == ""){
                                notify('ثبت توضیحات اجباری است', 'red');
                                return;
                            }

                            $sendData = {
                                'inputReqId': $inputReqId,
                                'inputResult': $inputResult,
                                'inputResultDescription': $inputResultDescription
                            };
                            $.ajax({
                                type: 'post',
                                url: base_url + 'Requests/doEditFinal',
                                data: $sendData,
                                success: function (data) {
                                    $result = data;
                                    notify($result['content'], $result['type']);
                                    toggleLoader();
                                }
                            });



                        }
                    },
                    'انصراف': function () {
                    },
                }
            });


        });


    });
</script>
