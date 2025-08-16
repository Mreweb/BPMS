<?php
$counter = 0;
if ($data == NULL || empty($data)) {
    isRecordExists($data);
} else {
foreach ($data as $item) { ?>
        <tr class="item">
            <td class="fit">
                # <?php echo $item['ReqId']; ?>
            </td>
            <td>
                <?php echo $item['ReqTitle']; ?>
            </td>
            <td class="fit">
                <?php echo pipeEnum('PROPERTY_TYPE', $item['ReqType'], 'badge bg-success'); ?>
            </td>
            <td>
                <?php echo $item['ReqPrice']; ?>
            </td>
            <td class="fit">
                <?php echo pipeEnum('REQ_STATUS', $item['ReqStatus'], getRequestsStatusClass( $item['ReqStatus'])); ?>
            </td>
            <td class="fit">
                <?php echo $item['PersonFirstName']." " .$item['PersonLastName']; ?>
            </td>
            <td class="fit">
                <?php echo $item['PersonNationalCode']; ?>
            </td>
            <td class="fit">
                <?php echo $item['PersonPhone']; ?>
            </td>
            <td class="fit">
                <?php echo convertDate($item['RequestCreateDateTime']); ?><br>
                <?php echo convertTime($item['RequestCreateDateTime']); ?>
            </td>
            <td class="fit">
                <a href=" <?php echo base_url('Admin/Dashboard/Requests/EditFinal/'.$item['ReqId']); ?>" class="edit btn btn-default">
                    <button class="btn btn-primary btn-sm">
                        <i class="bx bxs-edit"></i>
                    </button>
                </a>
            </td>
        </tr>
<?php } } ?>