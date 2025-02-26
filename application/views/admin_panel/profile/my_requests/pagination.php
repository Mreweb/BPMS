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
            <td class="fit"># <?php echo $item['ReqId']; ?></td>
            <td class="fit"># <?php echo pipeEnum('PACKAGETYPE',$item['ReqPackageType']); ?></td>
            <td><?php echo pipeEnum('TRANSLATES',$item['ReqClass']); ?></td>
            <td class="fit"><?php echo pipeEnum('TRANSLATES',$item['ReqFunction']); ?></td>
            <td class="fit"><?php echo $item['ReqIp']; ?></td>
            <td class="fit"><?php echo $item['ReqPlatform']; ?></td>
            <td class="fit"><?php echo convertDate($item['CreateDateTime']); ?></td>
            <td class="fit"><?php echo convertTime($item['CreateDateTime']); ?></td>
        </tr>
<?php } } ?>