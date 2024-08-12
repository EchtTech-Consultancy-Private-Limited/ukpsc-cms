<!-- DataTables -->

<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/datatables/dataTables.bootstrap4.css">


<div class="content-wrapper">
    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"><?php echo isset($info[0]['subjectline'])?$info[0]['subjectline']:'' ?></h3>
            </div>
            <div class="card-body">
                <div class="datalist">
                    <?php $this->load->view('admin/includes/_messages.php') ?>
                    <div class="row">
                        <table id="allocationTablesend" class="table table-bordered table-hover"
                            style="border-collapse: collapse !important;">
                            <thead>
                                <tr>
                                    <th>S.No.</th>
                                    <th>Consent recieved</th>
                                    <th>Examination Center code</th>

                                    <?php foreach ($date_exam as $key1 => $date) {?>
                                    <th>
                                        <?php echo date("d-m-Y", strtotime($date));?>
                                        <br>
                                        (
                                        <?php echo $shft_exam[$key1]?>)
                                    </th>


                                    <?php } ?>

                                </tr>


                            </thead>
                            <tbody>

                                <?php
                     
                        $i = 1;
                        foreach ($info as $row):
                            $admin_role_id = $this->session->userdata('admin_role_id');
                            $admin_id = $this->session->userdata('admin_id');
                            if (($admin_role_id != 6) && ((in_array($row['file_movement'], array(1))) )) {
                                continue;
                          }   
                   
                  ?>

                                <tr>

                                    <td>
                                        <?= $i ?>
                                    </td>
                                    <td>
                                        <?php echo $row['max_allocate_candidate'] ?>
                                    </td>
                                    <?php $getCenterCode = getCenterCode( $row['school_id'],$row['id']); 
                                
                                ?>
                                    <td>
                                        <?php echo isset($getCenterCode)?$getCenterCode:''?>
                                    </td>

                                    <input hidden type="text" id="candidate_value_count<?php echo $i?>"
                                        value="<?php echo count($no_candidate)?>">
                                    <input hidden type="text" id="admin_id<?php echo $i?>" name="admin_id"
                                        value="<?php echo $row['admin_id']?>">

                                    <input hidden type="text" id="exam_id" name="exam_id"
                                        value="<?php echo $row['id']?>">

                                    <?php $candidateNo = getCandidateNumbers( $row['school_id'],$row['id']); ?>

                                    <?php foreach ($no_candidate as $key => $value) { 
                                    ?>
                                    <?php if($candidateNo[$key]!=''){ ?>
                                    <td>
                                        <a href="<?= base_url("admin/allocation_user/allocate_user_attendance/" . urlencrypt($row['id'])."/".urlencrypt($key)."/".urlencrypt($candidateNo[$key]))?>"
                                            class="btn btn-success"><?php echo isset($candidateNo[$key])?$candidateNo[$key]:'No Candidate'?></a>
                                    </td>
                                    <?php } else{?>
                                    <td>No Candidate Assign</td>
                                    <?php } ?>

                                    <?php } ?>
                                </tr>


                                <?php
                        $i++;
                        endforeach;
                        ?>
                                <!-- <?php //echo form_close(); ?> -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


    </section>
</div>
<!-- Modal -->


</div>
</div>
<!-- DataTables -->

<script src="<?= base_url() ?>assets/plugins/datatables/jquery.dataTables.js"></script>

<script src="<?= base_url() ?>assets/plugins/datatables/dataTables.bootstrap4.js"></script>

<script>
$(function() {

    $("#allocationTablesend").DataTable();

});
</script>

<style type="text/css">
.permanent_info {
    margin-bottom: 05px;
}

.remarkss {
    padding: 15px;
    /*font-size: 12px;*/
}

.his {
    margin: 0 0 10px 0;
}

.mr5 {
    margin-bottom: 5px;

}
</style>