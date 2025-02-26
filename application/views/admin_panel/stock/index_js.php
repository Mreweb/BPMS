<script type="text/javascript">
    $(document).ready(function () {
        $items = items;
        $itemsOnPage = itemsOnPage;
        $selectedPage = 1;
        $totalResultCount = 0;
        $hasPagination = false;
        function loadData(selectedPage = $selectedPage) {
            toggleLoader();
            $sendData = {
                'inputStockTitle': $("#inputStockTitle").val(),
                'pageIndex': selectedPage
            }
            $.ajax({
                type: 'post',
                url: base_url + 'StockList/doStockPagination',
                data: $sendData,
                success: function (data) {
                    toggleLoader();
                    $result = JSON.parse(data);
                    $(".table-rows").html($result['htmlResult']);
                    $totalResultCount = $result['count'];
                    $(".total-number-result").text($totalResultCount);
                    if ($hasPagination) {
                        $(".simple-pagination").pagination('updateItems', $totalResultCount);
                    } else {
                        $hasPagination = true;
                        $(".simple-pagination").pagination({
                            items: $totalResultCount,
                            itemsOnPage: $itemsOnPage,
                            cssStyle: 'compact-theme',
                            prevText: 'قبلی',
                            nextText: 'بعدی',
                            onPageClick: function (pageNum, e) {
                                loadData(pageNum);
                            }
                        });
                    }
                }
            });
        }
        loadData();
        $(".Page-Search-Form input" ).on( "keydown", function(event) {
            if(event.which === 13){
                loadData();
            }
        });
        $(".Page-Search-Form select" ).on( "change", function(event) {
            loadData();
        });
        $("#doSearch" ).on( "click", function(event) {
            loadData();
        });
        $("form").submit(function(e){
            e.preventDefault();
        });
        $("#get_new_list" ).on( "click", function(event) {
            toggleLoader();
            $.ajax({
                type: 'post',
                url: base_url + 'StockList/getNewList',
                data: $sendData,
                success: function (data) {
                    toggleLoader();
                    $result = JSON.parse(data);
                    notify($result['content'],$result['type']);
                }
            });
        });

        $(document).on('click' , ".icon-hover" , function(){
            copyToClipboard($(this).data('text'));
            notify("کد نماد کپی شد" , 'green');
        });

    });
</script>
