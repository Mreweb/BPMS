<script type="text/javascript">
    $(document).ready(function () {
        $("#do_save").click(function (e) {
            e.preventDefault();

            $.confirm({
                title: 'تغییر وضعیت',
                theme: 'dark',
                content: 'آیا مطمئن هستید؟',
                buttons: {
                    بله: {
                        btnClass: 'btn btn-success',
                        action: function () {
                            e.preventDefault();
                            toggleLoader();
                            $inputStatus = $.trim($("#inputStatus").val());
                            $inputBalancePaymentId = $.trim($("#inputBalancePaymentId").val());
                            $sendData = {
                                'inputStatus': $inputStatus,
                                'inputBalancePaymentId': $inputBalancePaymentId
                            };
                            $.ajax({
                                type: 'post',
                                url: base_url + 'Finance/doChangePaymentStatus',
                                data: $sendData,
                                success: function (data) {
                                    $result = data;
                                    notify($result['content'], $result['type']);
                                    toggleLoader();
                                    if($result['success']){
                                        location.reload();
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
        $("#inputStatus").change(function (e) {
            e.preventDefault();
            $(".message").addClass('d-none');
            $("."+$(this).val()).removeClass('d-none');
        });
    });
</script>
