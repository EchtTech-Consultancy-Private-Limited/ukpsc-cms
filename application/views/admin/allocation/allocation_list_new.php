<div class="datalist">
    <div class="table-responsive">
        <table id="allocationTable_recreate" class="table table-bordered table-hover dataTable no-footer" style="border-collapse: collapse !important;">
            <thead>
                <tr>
                    <th>S.No.</th>
                    <th>Examination Center Name</th>
                    <th>Consent recieved</th>
                    <th>Examination Center code</th>
                    <?php foreach ($date_exam as $key1 => $date) {?>
                    <th>
                        <?php echo date('d-m-Y', strtotime($date));$date?>
                        <br>
                        (<?php echo $shft_exam[$key1]?>)
                    </th>
    
    
                    <?php } ?>
    
                    <th><?= trans('action') ?></th>
                </tr>
    
    
            </thead>
            <tbody>
    
                <?php
                 
                $i = 1;
                foreach ($info as $row):
                    $admin_role_id = $this->session->userdata('admin_role_id');
                    $admin_id = $this->session->userdata('admin_id');
                  //   if (($admin_role_id != 6) && ((in_array($row['file_movement'], array(1))) )) {
                  //       continue;
                  // }   
           
          ?>
    
                <tr>
    
                    <td>
                        <?= $i ?>
                    </td>
    
                    <td>
                        <?php echo $row['school_name'].  '<br>'. '<small>'. $row['address'] .'</small>'  ?>
                        <input hidden type="text" id="school_id_new<?php echo $i?>" name="school_id_new<?php echo $i?>"
                            value="<?php echo $row['school_id']?>">
                    </td>
                    <td>
                        <?php echo $row['max_allocate_candidate'] ?>
                        <input hidden type="text" id="consent<?php echo $i?>" name="consent<?php echo $i?>"
                            value="<?php echo $row['max_allocate_candidate']?>">
                    </td>
    
                    <td>
                        <?php $getCenterCode = getCenterCode( $row['school_id'],$row['id']); 
                        
                        ?>
                        <input type="text" class="form-control" onkeypress="return onlyNumberKey(event)"
                            id="exam_center_code<?php echo $i?>" name="exam_center_code"
                            value="<?php echo isset($getCenterCode)?$getCenterCode:''?>">
                    </td>
    
                    <input hidden type="text" id="candidate_value_count<?php echo $i?>"
                        value="<?php echo count($no_candidate)?>">
    
                    <input hidden type="text" id="admin_id<?php echo $i?>" name="admin_id"
                        value="<?php echo $row['admin_id']?>">
    
                    <input hidden type="text" id="exam_id" name="exam_id" value="<?php echo $row['id']?>">
    
                    <?php 
                      $candidateNo = getCandidateNumbers( $row['school_id'],$row['id']); 
            
                    
                    ?>
    
                    <?php foreach ($no_candidate as $key => $value) { 
                  
                            ?>
                    <td>
                        <?php  $option = checkOption($row['id'],$row['school_id'],date('d-m-Y',strtotime($date_exam[$key])),$shft_exam[$key]);
                            if($option=='no'){
                        ?>
                         <input type="text" hidden class="form-control" onkeypress="return onlyNumberKey(event)"
                            id="candidate_value_school_id_new<?php echo $i.$key?>"
                            value="<?php echo isset($candidateNo[$key])?$candidateNo[$key]:''?>">
    
                         <?php }else{
                            ?>
                            
                            <input type="text" class="form-control" onkeypress="return onlyNumberKey(event)"
                            id="candidate_value_school_id_new<?php echo $i.$key?>"
                            value="<?php echo isset($candidateNo[$key])?$candidateNo[$key]:''?>">
    
                            <?php
    
                         }?>
                            
                    </td>
                    <?php } ?>
                    <td>
                        <?php  if ($admin_role_id == 6 )  { ?>
    
                        </a>
                        <?php }  if ($admin_role_id == 5 )  { ?>
    
                        <button class="btn btn-admin" onclick="formdataSubmit(<?php echo $i; ?>)"> Submit</button>
    
                        <?php }
                       if ($admin_role_id == 5 ) { ?>
    
                        <?php }
                        ?>
    
                    </td>
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
<!-- Modal -->


</div>
</div>
<!-- DataTables -->
<script src="<?= base_url() ?>assets/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables/dataTables.bootstrap4.js"></script>
<script>
var table = $('#allocationTable').DataTable({
    "processing": false,
    "serverSide": false,
});
</script>
<script>
function myfunction(id) {
    $.ajax({
        url: 'send_mail/',
        type: 'get',
        dataType: 'html',
        // data : {data:id},
        success: function(result) {
            alert('Mail Sent Sucessfully!')
        }
    });
}



$('#publish_permanent').click(function(event) {


});

function formdataSubmit(id) {
    var school_id = $('#school_id_new' + id).val();
    var consentCount = $('#consent' + id).val();

    var exam_center_code = $('#exam_center_code' + id).val();
    var admin_id = $('#admin_id' + id).val();
    var exam_id = $('#exam_id').val();
    var candidate_value_count = $('#candidate_value_count' + id).val();
    var candidate_array = [];
    for (let k = 0; k < candidate_value_count; k++) {
        var candi_count = $('#candidate_value_school_id_new' + id + k).val();
        if (consentCount >= candi_count) {
            candidate_array.push(candi_count);
        } else {
            alert('Allocation can not be greater than Consent Recieved');
            return false;
        }

    }
    $.ajax({
        type: "GET",
        url: base_url + 'admin/allocation_admin/save',
        data: {
            'school_id': school_id,
            'exam_center_code': exam_center_code,
            'admin_id': admin_id,
            'exam_id': exam_id,
            'candidate_array': candidate_array,
            'csfr_token_name': csfr_token_value
        },
        success: function(data) {
            if (data === '200') {
                alert('Allocation Created Successfully');
                window.location.reload();
            } else {
                alert('Allocation Updated Successfully');
                window.location.reload();
            }
        }

    });

}
</script>
<script>
function onlyNumberKey(evt) {

    // Only ASCII character in that range allowed
    var ASCIICode = (evt.which) ? evt.which : evt.keyCode
    if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
        return false;
    return true;
}
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