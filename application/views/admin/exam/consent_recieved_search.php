
<div class="row"><b>Consent Recieved Count :- </b>&nbsp;<?php echo $count; ?></div>
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
         <th width="120">Download Consent</th>
      </tr>
      </thead>
      <tbody>
          
         <?php
            if(!empty($main_data)){   
                  $i = 1;
                  foreach ($main_data as $row):
                     // echo '<pre>';print_r($row);
                     $admin_role_id = $this->session->userdata('admin_role_id');
                     $admin_id = $this->session->userdata('admin_id');
                  //    if (($admin_role_id != 6) && ((in_array($row['file_movement'], array(1))) )) {
                  //       continue;
                  // }
               // if($row['school_name'] != '' && $row['school_name'] != '' && $row['district'] != ''){      
               if(1==1){      
               // if($value[1] ){      
               // if($row['school_name'] != 'count'){      
         ?>

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
                  <input style="height: 1px;width: 1px;" type="checkbox" id="a" id="sum_value" name="sum_value" class="checkbox-item sum" rel="<?php echo $row['max_allocate_candidate']; ?>">
               </td>             
               <td style="text-align: center;">
                        <?php  if ($admin_role_id == 5 )  { 
                           if ($row['superuserStatus']==1){
                           ?>
                             Recieved
                         <?php }else{
                           ?>Pending at government officer for approval	
                           <?php
                         }?>
                        <?php }  if ($admin_role_id == 5 )  { ?>
                                             
                        <?php }
                           if ($admin_role_id == 1 ) { ?>
                     
                        <?php }
                        ?>               
               </td>
               <td>
                  <?php
                     if(isset($row["superuserStatus"]) && $row["superuserStatus"]==1)
                     {
                        $file = $row["consents_signstamp_file"];
                        ?>
                        <a href="<?= base_url(); ?>uploads/consent_form/<?php echo $file;?>" target="_blank" class="btn btn-primary">Download Consent</a>
                        <?php
                     }
                     else{
                        ?>
                        <button class="btn btn-default" disabled>Consent Not available</button>
                        <?php
                     }?>
               </td>


            </tr>
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