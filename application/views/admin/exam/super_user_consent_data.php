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
                                 <?php }elseif($d['superuserStatus']==2) {?>
                                  <button class="btn btn-danger" disabled="">Dis-Approved</button>
                                <?php }else { ?>
                                  <button class="btn btn-success" onclick="superUserButtonHandle('<?php echo $d['ref_id'];?>','<?php echo $d['school_id'];?>' ,1)">Approve</button>
                                  <button class="btn btn-primary" onclick="superUserButtonHandleA('<?php echo $d['ref_id'];?>','<?php echo $d['school_id'];?>',2)"
                                       >Dis Approve</button>
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
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Dis Approve</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="closeButton()">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="remarkForm">
      <div class="modal-body">
        <input type="hidden" name="dataIDs" id="dataID">
        <label>Remark<span style="color:red">*</span></label>
        <textarea rows="2" cols="50" name="remark" form="usrform" placeholder="Enter the Dis Approve Reason..." required></textarea>  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="closeButton()">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- DataTables -->

<script src="<?= base_url() ?>assets/plugins/datatables/jquery.dataTables.js"></script>

<script src="<?= base_url() ?>assets/plugins/datatables/dataTables.bootstrap4.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
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
        url: base_url +'admin/Super_user/superUserStatus',
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
function superUserButtonHandleA(exam_id ,school_id,status){
    $('#exampleModalCenter').modal('show');
    $('#dataID').val(exam_id+','+school_id+','+status);
}
$(function() {
        $("#remarkForm").on('submit', function(e) {
            e.preventDefault();
            if($("textarea[name='remark']").val() ==''){
               alert('Enter the remark');
            }else{
            var description = $("textarea[name='remark']").val();
            var dataid = $("input[name='dataIDs']").val();
            text = "Do you want to Dis-Approve";
            if (confirm(text) == true) {
            $.ajax({
                url: base_url +'admin/Super_user/superUserStatusDisApprove',
                type: 'GET',
                data: {description: description,ess:dataid},
                error: function() {
                    alert('Something is wrong');
                },
                success: function(response){
                    console.log(response);
                    if(response.status == 'success') {
                        $("#exampleModalCenter").hide();
                        toastr.success(response.message);
                        setTimeout(function(){
                            $("#overlay").fadeOut(300);
                            window.location.reload();
                        },500);
                    }else{
                        toastr.error('An error occurred. Please try again.');
                        setTimeout(function(){
                            $("#overlay").fadeOut(300);
                           window.location.reload();
                        },500);
                    }
                    //$("#message").html(response.message);
                }
            });
            } else {
            return false;
            }}
        });
    });

    function closeButton(){
        window.top.location = window.top.location;
    }
</script> 