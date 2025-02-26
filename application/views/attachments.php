<div class="uploaded-files mt-3">
    <table class="table table-bordered table-hover table-stripped">
        <thead>
        <tr>
            <th>عنوان</th>
            <th>حذف</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($request_attachment as $item) { ?>
            <tr data-type='<?php echo $item['AttachType']; ?>'
                data-name='<?php echo $item['AttachTitle']; ?>'
                data-src='<?php echo $item['AttachUrl']; ?>'>
                <td><a target="_blank"
                       href="<?php echo $item['AttachUrl']; ?>"><?php echo $item['AttachTitle']; ?></a>
                </td>
                <td class='fit'>
                    <button class='btn btn-danger btn-sm remove-file'>X</button>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>