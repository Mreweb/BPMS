<script type="text/javascript">
    $(document).ready(function () {
        $("#do_save").click(function (e) {
            e.preventDefault();

            $(".progress-form").show();
            $titles = [
                "دریافت اطلاعات ملک",
                "دریافت اطلاعات مالک",
                "دریافت اطلاعات تملک",
                "دریافت اطلاعات حقوقی",
                "در حال ثبت نهایی",
            ]
            $index = 0;
            $width = 20;
            $timer = setInterval(function(){

                $(".progress-form h2").text($titles[$index++]);
                $(".progress-bar-striped").css('width',$width+'%');
                $width+=20;
                if($width > 100){
                    clearInterval($timer);

                    $sendData = {
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


                        'inputOwnerNationalCode': "تهران",
                        'inputOwnerName': "kmb",
                        'inputOwnerBankRelation': "2",
                        'inputOwnerCompanyType': "2",
                        'inputOwnerTypeDependentPerson': "2",
                        'inputOwnerOwnershipPercentage': "90",



                        'inputPropertyGoogleMap': "https://maps.app.goo.gl/eysqVNFZ5VadRj2V9",
                        'inputPropertyNeshan': "https://nshn.ir/_bvS9RQxp7Ao",
                        'inputPropertyBalad': "https://balad.ir/p/27hl8jTwO2cwsa",

                        'inputProvince': "8",
                        'inputCity': "547",

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
                        }
                    });
                }
            },3000);


        });


    });
</script>
