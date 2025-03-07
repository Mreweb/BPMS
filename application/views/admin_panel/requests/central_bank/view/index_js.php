<script type="text/javascript">
    $(document).ready(function () {
        $("#do_save").click(function (e) {
            e.preventDefault();
            toggleLoader();


            $inputReqId = $.trim($("#inputReqId").val());
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
             $inputResult = $.trim($("#inputResult").val());
            $inputResultDescription= $.trim($("#inputResultDescription").val());
            
            $sendData = {
                'inputReqId': $inputReqId,
                'inputFinalPropertyPercentageOwnership': $inputFinalPropertyPercentageOwnership,
                'inputFinalPropertyAcquire': $inputFinalPropertyAcquire,
                'inputFinalPropertyType': $inputFinalPropertyType,
                'inputFinalPropertyBuyDate': $inputFinalPropertyBuyDate,
                'inputFinalPropertySurplus': $inputFinalPropertySurplus,
                'inputFinalPropertyExcluded': $inputFinalPropertyExcluded,
                'inputFinalPropertyExcludeReason': $inputFinalPropertyExcludeReason,
                'inputFinalPropertyUnopposed': $inputFinalPropertyUnopposed,
                'inputFinalPropertyHasLegal': $inputFinalPropertyHasLegal,
                'inputFinalPropertyOrderDate': $inputFinalPropertyOrderDate,
                'inputFinalPropertyVote': $inputFinalPropertyVote,
                'inputFinalPropertyWithdrawBenefit': $inputFinalPropertyWithdrawBenefit,
                'inputFinalPropertyDocFinalStatus': $inputFinalPropertyDocFinalStatus,
                'inputFinalPropertySummary': $inputFinalPropertySummary,
                'inputFinalPropertyValue': $inputFinalPropertyValue,
                'inputFinalPropertyValueCheck': $inputFinalPropertyValueCheck,
                'inputFinalPropertyCheckValue': $inputFinalPropertyCheckValue,
                'inputFinalPropertySurvey': $inputFinalPropertySurvey,
                'inputResult': $inputResult,
                'inputResultDescription': $inputResultDescription
            };
            $.ajax({
                type: 'post',
                url: base_url + 'Requests/doEditCentralBank',
                data: $sendData,
                success: function (data) {
                    $result = data;
                    notify($result['content'], $result['type']);
                    toggleLoader();
                    location.reload();
                }
            });
        });
    });
</script>
