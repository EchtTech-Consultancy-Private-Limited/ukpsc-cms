
<?php //echo '<pre>';print_r($data);exit;?>

<!-- <div class="datalist"> -->
<!-- <div> -->

   <div class="row">
   <table id="consentRecievedRecreatedTable" class="table table-bordered table-striped" style="border-collapse: collapse !important;">
      <thead>
      <tr>
         <th>S.No.</th>
         <th>School Name </th>
         <th>District</th>
         <th>City</th>
         <th>Principal Details</th>
         <th>Mobile</th>
         <th>Grade</th>
         <th width="120">Max No of Applicant</th>
         <th width="120"><?= trans('action') ?></th>
      </tr>
      </thead>
      <tbody>
          
         <?php
            if(!empty($main_data)){   
               $i = 0;
                  foreach ($main_data as $row):
                     $admin_role_id = $this->session->userdata('admin_role_id');
                     $admin_id = $this->session->userdata('admin_id');
     
               if(1==1){           
         ?>
            <?php $invitationStatus = checkExamInvitationStatus($exam_id,$row['id']);
            $invt_recieved = isset($invitationStatus['invt_recieved'])?$invitationStatus['invt_recieved']:0;
            $invite_sent = isset($invitationStatus['invite_sent'])?$invitationStatus['invite_sent']:0;
            
            if($invt_recieved==0 && $invite_sent==1)
            {?>

            <tr>
               <td>
                  <?= $i ?>
               </td>
               <td>
                  <?= $row['school_name'] ?>
               </td>
               <td>
                  <?= $row['district'] ?>        
               </td>
               <td>
                  <?= $row['city']; ?>
               </td>
               <td>
                  <?= $row['principal_name']; ?>
               </td>
               <td>
                  <h4 class="m0 mb5">
                     <?php echo $row['pri_mobile']; ?>
                  </h4>
               
                  <small class="text-muted">
                  <?php echo $row['email']; ?>
                  </small>
               </td>  
               <td>
                  <?= $row['ranking_admin']; ?>
               </td>             
               <td>
                  <?= $row['max_allocate_candidate']; ?>
               </td>             
               <td style="text-align: center;">
                     <input type="checkbox" id="a" class="send_email_ids" onClick="getCount(<?php echo $row['id']?>)" name="send_email_ids" rel="<?php echo $row['id']; ?>">
                     
                        <?php  if ($admin_role_id == 5 )  { ?>
                          
                           <a onClick="single_send_invitations(<?php echo $row['id']; ?>)" title="Re-Send Invitation" class="btn btn-success btn-xs mr5" >
                              <i class="fa fa-paper-plane-o"></i>
                           </a>
                        <?php }  if ($admin_role_id == 5 )  { ?>
                                             
                        <?php }
                           if ($admin_role_id == 1 ) { ?>
                     
                        <?php }
                        ?>               
               </td>
            </tr>
            <?php }?>

         <?php
         }
            $i++;
            endforeach;
         }else{
            ?>
            <tr>
               <td style="text-align: center;" colspan="11">No data available in table</td>               
            </tr> 
         <?php
         }
         ?>

         
      </tbody>
   </table>
<!-- </div> -->
   <!-- Modal -->
   
       
      </div>
      </div>

<script>
   $(document).ready(function () {
       $('.permanent_info').click(function () {
           var prov_id = $(this).data('id');
           var establishment = $(this).data('establishment');
           var remark_dra = $(this).data('remark_dra');
           $('#exampleModalLongTitle').html(establishment);
           // $('#exampleModalLongTitle').html(remark_dra);
           // AJAX request
           // $.ajax({
           //     url: 'permanent_info/',
           //     type: 'get',
           //     data: {prov_id: prov_id, 'csfr_token_name': csfr_token_value},
           //     success: function (response) {
           //         $('.modal-body').html(response);
           //         $('#empModal').modal('show');
           //     }
           // });
       });
   });
   function myfunction(id){
     $.ajax({
       url: 'send_mail/',
        type:'get',
        dataType: 'html',
        // data : {data:id},
        success:function(result){
            alert('Mail Sent Sucessfully!')
        } 
    });
   }
 


  $('#publish_permanent').click(function(event) {

    if(!event.detail || event.detail==1){//activate on first click only to avoid hiding again on double clicks
       
        $(this).slideToggle();
    }
});


</script>
<style type="text/css">
   .permanent_info{
      margin-bottom: 05px;
   }
   .remarkss{
      padding: 15px;
      /*font-size: 12px;*/
   }
   .his{
      margin: 0 0 10px 0;
   }
   .mr5{
      margin-bottom: 5px;
      
   }

</style>