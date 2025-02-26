<?php
$counter = 0;
if ($data == NULL || empty($data)) { ?>
    <div class="col-12 prl-10px">
        <div class="item">
            موردی یافت نشد
        </div>
    </div>
<?php } else {
foreach ($data as $item) { ?>
        <tr class="item">
            <td><?php echo $item['StockTicker']; ?></td>
            <td class="fit"><?php echo $item['StockTitle']; ?></td>
            <td class="fit text-end">
                <?php echo $item['StockINSCode']; ?>
                <i data-text="<?php echo $item['StockINSCode']; ?>" class="bx bx-copy icon-hover"></i>
            </td>
            <td class="fit"><?php echo $item['StockMarket']; ?></td>
            <td class="fit"><?php echo convertDate($item['CreateDateTime']); ?></td>
        </tr>
<?php } } ?>