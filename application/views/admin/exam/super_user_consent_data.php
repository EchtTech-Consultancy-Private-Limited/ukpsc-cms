<!-- DataTables -->

<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/datatables/dataTables.bootstrap4.css">

<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper">


    <!-- Main content -->

    <section class="content mt10">
        <div class="card">
            <div class="card-body table-responsive">
               <h3><?php echo  $exam_name;?></h3>
                <table id="consent_recieved_by_super_user" class="table table-bordered table-striped"
                    style="border-collapse: collapse !important;">
                    <thead>
                        <tr>
                            <th>S.No.</th>
                            <th>School Name </th>
                            <th>District</th>
                            <th>City</th>
                            <th>Principal Details</th>
                            <th>Grade</th>
                            <th width="120">Max No of Applicant</th>
                            <th width="120"><?= trans('action') ?></th>
                            <th> View Consent</th>
                          
                        </tr>
                    </thead>
                     <?php  foreach ($data   as $key=> $d){?> 
                        <tr>
                            <td><?php echo $key+1; ?></td>
                            <td><?php echo $d['school_name'];?></td>
                            <td><?php echo $d['district'];?> </td>
                            <td><?php echo $d['city'];?> </td>
                            <td><?php echo $d['principal_name'];?></td>
                            <td><?php echo $d['ranking_admin'];?> </td>
                            <td><?php echo $d['max_allocate_candidate'];?> </td>
                        
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                <?php if($d['superuserStatus']==1){ ?>
                                    <button class="btn btn-success" disabled="">Approved</button>
                                 <?php }else {?>

                                <button class="btn btn-success" onclick="superUserButtonHandle('<?php echo $d['ref_id'];?>','<?php echo $d['school_id'];?>' ,1)">Approved</button>
                                <button class="btn btn-primary" onclick="superUserButtonHandle('<?php echo $d['ref_id'];?>','<?php echo $d['school_id'];?>',0)">Dis Approved</button>
                                    <?php }?>
                            </div>
                            </td>
                          <td><a href= "<?=base_url("uploads/consent_form/".$d["consents_signstamp_file"]);?>" target="_blank" class="btn btn-info">Download Consent</a></td>
                        
                        </tr> 
                        <?php }?> 

                </table>
            </div>
        </div>

    </section>

    <!-- /.content -->

</div>
<!-- DataTables -->

<script src="<?= base_url() ?>assets/plugins/datatables/jquery.dataTables.js"></script>

<script src="<?= base_url() ?>assets/plugins/datatables/dataTables.bootstrap4.js"></script>
<script>

  $(function () {

    $("#consent_recieved_by_super_user").DataTable();

  });
function superUserButtonHandle(exam_id ,school_id,status)
{
   let action =  (status===1) ? 'Approve' : 'Dis-Approve';
   text = "Do you want to "+action+"?";
  if (confirm(text) == true) {
     $.ajax({
        type: "GET",
        url: base_url +
            'admin/Super_user/superUserStatus',
        // dataType: 'html',
        data: {
            'exam_id': exam_id,
            'school_id': school_id,
            'status': status,
            'csfr_token_name': csfr_token_value
        },
        success: function(data) {
        action =  (status===1) ? 'Approved' : 'Dis-Approved';
         alert(action + " Successfully");
         window.location.reload();
        }

    });
  } else {
    return false;
  }
     
}


</script> 