
<?php //echo '<pre>';print_r($info);exit;?>

<!-- <div class="datalist"> -->
   <div class="row">
   <table id="consent_list" class="table table-bordered table-hover" style="overflow: auto; width: inherit;
    ">
      <thead>
         <tr>
            <th width="50">S.No.</th>
            <th>School Registration No.  </th>
            <th>School Name  </th>
            <th>District</th>
            <th>City</th>
            <th>Principal Details</th>
            <!-- <th>Exam Center Name</th> -->
            <th>Bank Details</th>
            <th>Date of Apply</th>
            <th>Documents</th>
            <th width="120">Ranking & <?= trans('status') ?></th>
            <th>Ranking</th>
            <th width="120"><?= trans('action') ?></th>
         </tr>
      </thead>
      <tbody>
          
         <?php
            if(!empty($info)){   
                  $i = 1;
                  foreach ($info as $row):
            
                     $admin_role_id = $this->session->userdata('admin_role_id');
                     $admin_id = $this->session->userdata('admin_id');
                  //    if (($admin_role_id != 6) && ((in_array($row['file_movement'], array(1))) )) {
                  //       continue;
                  // }
               if($row['school_registration_number'] != '' && $row['school_name'] != '' && $row['district'] != ''){      
               // if(1==1){      
         ?>

            <tr>
               <td>
                  <?= $i ?>
               </td>
               <td>
                  <?= $row['school_registration_number'] ?>
               </td>
               <td>
                  <?= $row['school_name'] ?>        
               </td>
               <td>
                  <?= $row['district']; ?>
               </td>
               <td>
                  <?= $row['city']; ?>
               </td>
               <td>
                  <h4 class="m0 mb5">
                     <?php echo $row['principal_name']; ?>
                  </h4>
               
                  <small class="text-muted">
                  <?php echo $row['pri_mobile'] . ' ' . $row['email']. ' ' .'WhatsApp Number -'.$row['whats_num']; ?>
                  </small>
               </td>
            <!--   <td>
                  <h4 class="m0 mb5">
                     <?php echo $row['exam_center_hindi'] ?>
                  </h4>
                  <small class="text-muted"><?=
                     $row['exam_center_eng']
                     ?></small>
                  </td> -->
               <td>
                  <h4 class="m0 mb5">
                     <?php echo $row['acc_holder_name']; ?>
                  </h4>
               
                  <small class="text-muted">
                  <?php echo $row['ban_name'] . ' ' .'Branch Name -'. $row['branch_name']. ' ' .'IFSC Code -'.$row['ifsc']; ?>
                  </small>
               </td>
               <td>
                  <?= $row['created_at'].''.$row['place'] ?>
               </td>
               <td>
                  <?php  if($row['fileName1'] !='' ){?>
                  <a  target="_blank" href="<?= base_url("admin/consent_letter/downolad_consent_pdf/consent_data/fileName1/" . urlencrypt($row['id'])); ?>">Parking</a>
                  <?php } if($row['fileName2'] !='' ){?>
                  <a target="_blank" href="<?= base_url("admin/consent_letter/downolad_consent_pdf/consent_data/fileName2/" . urlencrypt($row['id'])); ?>">Classroom</a> 
               <?php } if($row['fileName3'] !='' ){?>
                  <a target="_blank" href="<?= base_url("admin/consent_letter/downolad_consent_pdf/consent_data/fileName3/" . urlencrypt($row['id'])); ?>">Washroom</a>  
               <?php } if($row['fileName4'] !='' ){?>
                  <a target="_blank" href="<?= base_url("admin/consent_letter/downolad_consent_pdf/consent_data/fileName4/" . urlencrypt($row['id'])); ?>">Main Gate</a> 
                  <?php } if($row['fileName5'] !='' ){?>
                  <a target="_blank" href="<?= base_url("admin/consent_letter/downolad_consent_pdf/consent_data/fileName5/" . urlencrypt($row['id'])); ?>">Locker</a> 
                  <?php } if($row['fileName6'] !='' ){?>
                  <a target="_blank" href="<?= base_url("admin/consent_letter/downolad_consent_pdf/consent_data/fileName6/" . urlencrypt($row['id'])); ?>">Singed C-F</a> 
                  <?php }?>
               </td>
               
               <td>

                  <?= $row['remard_admin'] .''.'    '.$row['status_admin'] ?>
                  
               </td>
               <td>

                  <?= $row['ranking_admin'] ?>
                  
               </td>
               
               

               <td>
               <?php  if ($admin_role_id == 6 )  { ?>
               <a href="<?= base_url("admin/consent_letter/consent_add_2/" . $row['id']); ?>" title="Edit" class="btn btn-warning btn-xs mr5" >
               <i class="fa fa-edit"></i>
               </a> 
            <?php }  if ($admin_role_id == 5 )  { ?>
               <a href="<?= base_url("admin/consent_letter/add_remark_concent/" . $row['id']); ?>" title="Add Action" class="btn btn-warning btn-xs mr5"  style="margin-top: 8px !important; padding:3% !important;  font-weight: 100 !important; font-size: 15px;">
               <i class="fa fa-edit"></i>
               </a>

               <?php }
               if ($admin_role_id == 5 ) { ?>
               <a href="<?= base_url("admin/consent_active/send_mail/" . $row['id']) ?>" onclick="myfunction()" title="Send Email" class="btn btn-success"  style="margin-top: ; font-size: 13px; padding:2% !important;  font-weight: 50 !important;">
               <i class="fa fa-paper-plane"></i>
               </a>
               <?php }
               ?>
               <a href="<?= base_url("admin/consent_letter/preview_form/" . urlencrypt($row['id'])); ?>" title="Download Form"  onclick="return confirm('Download form ?')" class="btn btn-warning btn-xs"  style="margin-top: 5px;  padding:2% !important;  font-weight: 100 !important; font-size:13px;"><i class="fa fa-eye"></i></a>
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


var table = $('#consent_list').DataTable( {
      retrieve: true,
      paging: true, 
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