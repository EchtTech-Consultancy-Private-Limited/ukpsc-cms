<div class="datalist table-responsive">

    <table id="adminList" class="table table-bordered table-hover" style="border-collapse: collapse !important; width: 100%;">

        <thead>

            <tr>

                <th width="50"><?= trans('id') ?></th>

                <th><?= trans('user') ?></th>

                <th><?= trans('username') ?></th>

                <th><?= trans('email') ?></th>

                <th>District</th>

                <th><?= trans('city') ?></th>

                <th><?= trans('role') ?></th>

                <th width="100"><?= trans('status') ?></th>

                <th width="120"><?= trans('action') ?></th>

            </tr>

        </thead>

        <tbody>

            <?php  foreach ($info as $key=>$row): ?>

                <tr>

                    <td>

                        <?= $row['admin_id'] ?>

                    </td>

                    <td>

                        <h4 class="m0 mb5"><?= $row['firstname'] ?> <?= $row['lastname'] ?></h4>

                        <small class="text-muted"><?= $row['admin_role_title'] ?></small>

                    </td>

                    <td>

                        <?= $row['username'] ?>

                    </td> 

                    <td>

                        <?= $row['email'] ?>

                    </td>

                    <td>

                        <?= get_district_name(getStateInSuperAdminList($row['admin_id'])) ?>

                    </td>

                    <td>

                    
                        <?= get_subcity_name(getcityInSuperAdminList($row['admin_id'])) ?>

                    </td>

                    <td>

                        <button class="btn btn-xs btn-success"><?= $row['admin_role_title'] ?></button>

                    </td> 

                    <td><input class='tgl tgl-ios tgl_checkbox' 

                               data-id="<?= $row['admin_id'] ?>" 

                               id='cb_<?= $row['admin_id'] ?>' 

                               type='checkbox' <?php echo ($row['is_active'] == 1) ? "checked" : ""; ?> />

                        <label class='tgl-btn' for='cb_<?= $row['admin_id'] ?>'></label>

                    </td>

                    <td>

                        <a href="<?= base_url("admin/admin/edit/" . urlencrypt($row['admin_id'])); ?>" class="btn btn-warning btn-xs mr5" data-toggle="tooltip" data-placement="top" title="Edit" >

                            <i class="fa fa-edit"></i>

                        </a>

                        <a href="<?= base_url("admin/admin/delete/" . urlencrypt($row['admin_id'])); ?>" onclick="return confirm('are you sure to delete?')" class="btn btn-danger btn-xs" data-toggle="tooltip" data-placement="top" title="delete"><i class="fa fa-remove"></i></a>

                    </td>

                </tr>

            <?php endforeach; ?>

        </tbody>

    </table>

</div>

<script>
    $(document).ready(function() {
    $('#adminList').DataTable( {
        dom: 'Qlfrtip'
    });

    $(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
});
</script>



