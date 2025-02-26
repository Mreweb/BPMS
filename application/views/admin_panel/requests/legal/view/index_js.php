<script type="text/javascript">
    $(document).ready(function () {
        $("#do_save").click(function (e) {
            e.preventDefault();
            toggleLoader();
            $attachments = [];
            $inputReqId = $.trim($("#inputReqId").val());
            $inputResult = $.trim($("#inputResult").val());
            $inputResultDescription = $.trim($("#inputResultDescription").val());
            $sendData = {
                'inputReqId': $inputReqId,
                'inputResult': $inputResult,
                'inputResultDescription': $inputResultDescription
            };
            $.ajax({
                type: 'post',
                url: base_url + 'Requests/doEditLegal',
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
