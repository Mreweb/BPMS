<script type="text/javascript">
    $(document).ready(function () {

        $("#do_deploy_contract").click(function (e) {
            e.preventDefault();
            toggleLoader();
            $inputReqId = $.trim($("#inputReqId").val());
            $sendData = {
                'inputReqId': $inputReqId
            };
            $.ajax({
                type: 'post',
                url: base_url + 'Requests/doPublishProposal',
                data: $sendData,
                success: function (data) {
                    $result = data;
                    notify($result['content'], $result['type']);
                    toggleLoader();
                }
            });
        });

        $("#do_create_proposal").click(function (e) {

            e.preventDefault();
            $.confirm({
                title: 'انتشار پروپوزال',
                theme: 'dark',
                content: 'آیا از انتشار مطمئن هستید؟',
                buttons: {
                    بله: {
                        btnClass: 'btn btn-success',
                        action: function () {
                            e.preventDefault();
                            toggleLoader();
                            $inputReqId = $.trim($("#inputReqId").val());
                            $inputProposalTitle  = $.trim($("#inputProposalTitle").val());
                            $sendData = {
                                'inputReqId': $inputReqId,
                                'inputProposalTitle': $inputProposalTitle
                            };
                            $.ajax({
                                type: 'post',
                                url: base_url + 'Requests/doPublishProposal',
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

    });
</script>
