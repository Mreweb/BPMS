<script type="text/javascript">
    $(document).ready(function () {
        $inputAttachmentSource = "";
        $("#do_save").click(function (e) {
            $.confirm({
                title: 'افزایش موجودی',
                theme: 'dark',
                content: 'آیا از افزایش موجودی مطمئن هستید؟',
                buttons: {
                    بله: {
                        btnClass: 'btn btn-success',
                        action: function () {
                            e.preventDefault();
                            toggleLoader();
                            $inputBalance = $.trim($("#inputBalance").cleanVal());
                            $sendData = {
                                'inputBalance': $inputBalance
                            };
                            $.ajax({
                                type: 'post',
                                url: base_url + 'Wallet/doReadyIncreaseBalance',
                                data: $sendData,
                                success: function (data) {
                                    $result = data;
                                    notify($result['content'], $result['type']);
                                    toggleLoader();
                                    if($result['PaymentId'] !== undefined){
                                        location.href = $result['redirect'];
                                    }
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

    });
</script>
