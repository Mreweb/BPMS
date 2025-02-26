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
            <td class="fit">
                # <?php echo $item['PersonId']; ?>
            </td>
            <td>
                <?php echo $item['PersonFirstName']." ".$item['PersonLastName']; ?>
            </td>
            <td class="fit">
                <?php
                if($item['IsActive']) {
                    echo pipeEnum('ACTIVE_USER', $item['IsActive'], 'badge bg-success');
                } else{
                    echo pipeEnum('ACTIVE_USER', $item['IsActive'], 'badge bg-danger');
                }
                ?>
            </td>
            <td class="fit">
                <?php echo $item['PersonNationalCode']; ?>
            </td>
            <td class="fit">
                <?php echo $item['PersonPhone']; ?>
            </td>
            <td class="fit">
                <?php echo convertDate($item['CreateDateTime']); ?>
            </td>
            <td class="fit">
                <a href=" <?php echo base_url('Admin/Dashboard/Persons/Edit/'.$item['PersonId']); ?>" class="edit btn btn-default">
                    <button class="btn btn-primary btn-sm">
                        <i class="bx bxs-edit"></i>
                    </button>
                </a>
            </td>
        </tr>
<?php } } ?>