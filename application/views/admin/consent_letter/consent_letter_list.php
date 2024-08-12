<?php //echo '<pre>';print_r($info);exit;
?>

<!-- <div class="datalist"> -->
<style>
   #consent_listexcel_filter,
   #consent_listexcel_info,
   #consent_listexcel_paginate {
      display: none;
   }

   #consent_list .table-responsive {
      /*display:inline-block; */
      width: 100%;
      overflow-x: auto;
      -webkit-overflow-scrolling: touch;
      -ms-overflow-style: -ms-autohiding-scrollbar;
   }
</style>
<div class="row">
   <?php if (!empty($info)) {   ?>
      <table id="consent_listexcel" class="table table-bordered table-striped table-hover d-none" style="overflow: auto; border-collapse: collapse !important;">
         <thead>
            <tr>
               <th width="50">S.No.</th>
               <th>School Registration No. </th>
               <th>School Name </th>
               <th>School Address</th>
               <th>Landmark</th>
               <th>District</th>
               <th>City</th>
               <th>Principal Name</th>
               <th>Principal Mobile</th>
               <th>Principal Email</th>
               <th>Principal WhatsApp Number</th>
               <th>Centre Superintendent Name</th>
               <th>Centre Superintendent Designation</th>
               <th>Centre Superintendent Mobile No</th>
               <th>Centre Superintendent Email</th>
               <th>Centre Superintendent Whatups Number</th>
               <th>Total Number of Rooms</th>
               <th>Number of Seats for Candidates in Each Room</th>
               <th>Maximum number of candidates can be allocated in the center</th>
               <th>Sufficient furniture</th>
               <th>Lighting facility</th>
               <th>Generator facility</th>
               <th>Separate Washroom facilities</th>
               <th>Clock Room facility</th>
               <th>Parking Facility</th>
               <th>Number of invigilators and staff</th>
               <th>Conduct any Examination</th>
               <th>Debarred</th>
               <th>Superintendent Brass Seal </th>
               <th>Remarks</th>
               <th>Account Holder Name</th>
               <th>Bank Name</th>
               <th>Branch Name</th>
               <th>IFSC Code</th>
               <th>Account Number</th>
               <th>Confirm Account Number</th>

            </tr>
         </thead>
         <tbody>

            <?php
            if (!empty($info)) {
               $i = 1;
               foreach ($info as $row) :

                  $admin_role_id = $this->session->userdata('admin_role_id');
                  $admin_id = $this->session->userdata('admin_id');
                  //    if (($admin_role_id != 6) && ((in_array($row['file_movement'], array(1))) )) {
                  //       continue;
                  // }
                  if ($row['school_registration_number'] != '' && $row['school_name'] != '' && $row['district'] != '') {
                     // if(1==1){      
            ?>

                     <tr>
                        <td><?= $i ?></td>
                        <td><?= $row['school_registration_number'] ?></td>
                        <td> <?= $row['school_name'] ?></td>
                        <td><?= $row['address'] ?></td>
                        <td><?= $row['landmark'] ?></td>
                        <td><?= $row['district']; ?></td>
                        <td><?= $row['city']; ?></td>
                        <td><?= $row['principal_name']; ?></td>
                        <td><?= $row['pri_mobile'] ?></td>
                        <td><?= $row['email'] ?></td>
                        <td><?= $row['whats_num'] ?></td>
                        <td><?= $row['super_name'] ?></td>
                        <td><?= $row['super_design'] ?></td>
                        <td><?= $row['super_mobile'] ?></td>
                        <td><?= $row['super_email'] ?></td>
                        <td><?= $row['super_whatspp'] ?></td>
                        <td><?= $row['no_room'] ?></td>
                        <td><?= $row['no_sheet'] ?></td>
                        <td><?= $row['max_allocate_candidate'] ?></td>
                        <td><?= $row['furniture_avail'] ?></td>
                        <td><?= $row['elec_avail'] ?></td>
                        <td><?= $row['gen_avai'] ?></td>
                        <td><?= $row['wash_rrom'] ?></td>
                        <td><?= $row['clock_room'] ?></td>
                        <td><?= $row['vehicle_avail'] ?></td>
                        <td><?= $row['staff_suffi'] ?></td>
                        <td><?= $row['ukpsc_exxma'] ?></td>
                        <td><?= $row['debar'] ?></td>
                        <td><?= $row['bras_Seal'] ?></td>
                        <td><?= $row['remark_if'] ?></td>
                        <td><?= $row['acc_holder_name'] ?></td>
                        <td><?= $row['ban_name'] ?></td>
                        <td><?= $row['branch_name'] ?></td>
                        <td><?= $row['ifsc'] ?></td>
                        <td><?= $row['acc_num'] ?></td>
                        <td><?= $row['acc_num_con'] ?></td>

                     </tr>
               <?php
                  }
                  $i++;
               endforeach;
            } else {
               ?>
               <tr>
                  <td style="text-align: center;" colspan="11">No data available in table</td>
               </tr>
            <?php
            }
            ?>


         </tbody>
      </table>
      <div class="table-responsive">
         <table id="consent_list111" class="table table-bordered table-striped table-hover" style="overflow: auto; border-collapse: collapse !important;">
            <thead>
               <tr>
                  <th width="50">S.No.</th>
                  <th>School/Center/College (UKPSC Id) </th>
                  <th>School Registration No. </th>
                  <th>School Name </th>
                  <th>School Address </th>

                  <!-- <th>District</th>
            <th>City</th> -->
                  <th>Principal Details</th>
                  <!-- <th>Exam Center Name</th> -->
                  <!-- <th>Bank Details</th>
            <th>Date of Apply</th>
            <th>Documents</th>
            <th width="120">Ranking & <?= trans('status') ?></th>
            <th>Ranking</th>-->
                  <th width="120"><?= trans('action') ?></th>
               </tr>
            </thead>
            <tbody>

               <?php
               if (!empty($info)) {
                  $i = 1;
                  foreach ($info as $row) :

                     $admin_role_id = $this->session->userdata('admin_role_id');
                     $admin_id = $this->session->userdata('admin_id');
                     //    if (($admin_role_id != 6) && ((in_array($row['file_movement'], array(1))) )) {
                     //       continue;
                     // }
                     if ($row['school_registration_number'] != '' && $row['school_name'] != '' && $row['district'] != '') {
                        // if(1==1){      
               ?>

                        <tr>
                           <td>
                              <?= $i ?>
                           </td>
                           <td>
                              <?= rnobyemailid($row['email']) ?>
                           </td>
                           <td>
                              <?= $row['school_registration_number'] ?>
                           </td>
                           <td>
                              <?= ucfirst($row['school_name']); ?>
                           </td>
                           <td>
                              <?= ucfirst($row['address']); ?>
                           </td>
                           <!-- <td>
                  <?= $row['district']; ?>
               </td>
               <td>
                  <?= $row['city']; ?>
               </td> -->
                           <td>
                              <?= ucfirst($row['principal_name']); ?>
                              <br>

                              <small class="text-muted">
                                 <?php echo 'Mobile No. - ' . $row['pri_mobile'] . ' <br> ' . 'Email - ' . $row['email'] . ' <br> ' . 'WhatsApp Number -' . $row['whats_num']; ?>
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
                           <!-- <td>
                  <h4 class="m0 mb5">
                     <?php echo $row['acc_holder_name']; ?>
                  </h4>
               
                  <small class="text-muted">
                  <?php echo $row['ban_name'] . ' ' . 'Branch Name -' . $row['branch_name'] . ' ' . 'IFSC Code -' . $row['ifsc']; ?>
                  </small>
               </td>
               <td>
                  <?= $row['created_at'] . '' . $row['place'] ?>
               </td>
               <td>
                  <?php if ($row['fileName1'] != '') { ?>
                  <a  target="_blank" href="<?= base_url("admin/consent_letter/downolad_consent_pdf/consent_data/fileName1/" . urlencrypt($row['id'])); ?>">Parking</a>
                  <?php }
                        if ($row['fileName2'] != '') { ?>
                  <a target="_blank" href="<?= base_url("admin/consent_letter/downolad_consent_pdf/consent_data/fileName2/" . urlencrypt($row['id'])); ?>">Classroom</a> 
               <?php }
                        if ($row['fileName3'] != '') { ?>
                  <a target="_blank" href="<?= base_url("admin/consent_letter/downolad_consent_pdf/consent_data/fileName3/" . urlencrypt($row['id'])); ?>">Washroom</a>  
               <?php }
                        if ($row['fileName4'] != '') { ?>
                  <a target="_blank" href="<?= base_url("admin/consent_letter/downolad_consent_pdf/consent_data/fileName4/" . urlencrypt($row['id'])); ?>">Main Gate</a> 
                  <?php }
                        if ($row['fileName5'] != '') { ?>
                  <a target="_blank" href="<?= base_url("admin/consent_letter/downolad_consent_pdf/consent_data/fileName5/" . urlencrypt($row['id'])); ?>">Locker</a> 
                  <?php }
                        if ($row['fileName6'] != '') { ?>
                  <a target="_blank" href="<?= base_url("admin/consent_letter/downolad_consent_pdf/consent_data/fileName6/" . urlencrypt($row['id'])); ?>">Singed C-F</a> 
                  <?php } ?>
               </td>
               
               <td>

                  <?= $row['remard_admin'] . '' . '    ' . $row['status_admin'] ?>
                  
               </td>
               <td>

                  <?= $row['ranking_admin'] ?>
                  
               </td> -->



                           <td>
                              <?php if ($admin_role_id == 6) { ?>
                                 <!-- <a href="<?= base_url("admin/consent_letter/consent_add_2/" . $row['id']); ?>" title="Edit" class="btn btn-warning" >
               <i class="fa fa-edit"></i> -->
                                 </a>
                              <?php }
                              if ($admin_role_id == 5) { ?>
                                 <!-- <a href="<?= base_url("admin/consent_letter/add_remark_concent/" . $row['id']); ?>" title="Add Action" class="btn btn-warning">
               <i class="fa fa-edit"></i>
               </a> -->

                              <?php }

                              ?>
                              <a href="<?= base_url("admin/consent_letter/preview_form/" . urlencrypt($row['id'])); ?>" title="Download Form" onclick="return confirm('Download form ?')" class="btn btn-sec"><i class="fa fa-eye"></i></a>
                           </td>
                        </tr>
                  <?php
                     }
                     $i++;
                  endforeach;
               } else {
                  ?>
                  <tr>
                     <td style="text-align: center;" colspan="11">No data available in table</td>
                  </tr>
               <?php
               }
               ?>


            </tbody>
         </table>

      </div>



      <!-- </div> -->
      <!-- Modal -->


</div>

</div>
<?php } else {  $admin_role_id = $this->session->userdata('admin_role_id');?>
   <?php if($admin_role_id!=1){?>
   <div class="col-lg-4 col-6">
      <div class="small-box bg-warning" style="margin-bottom: 0 !important;">

         <div class="d-flex justify-content-between p-3 align-items-center">
            <div class="inner">
               <h5 class="text-white mb-0 text-bold">Edit Registration Details</h5>
            </div>

            <div class="img-wrapper">
               <img src=" <?php echo base_url("assets/dist/img/people_2.png") ?>" height="100" alt="">
            </div>
         </div>
         <a href="<?= base_url("admin/step1"); ?>" class="small-box-footer">
            Edit your information <i class="fa fa-arrow-circle-right"></i>
         </a>

      </div>
   </div>
   <?php } else {?>
      <div class="table-responsive">
         <table id="" class="table table-bordered table-striped table-hover" style="overflow: auto; border-collapse: collapse !important;">
            <thead>
               <tr>
                  <th width="50">S.No.</th>
                  <th>School/Center/College (UKPSC Id) </th>
                  <th>School Registration No. </th>
                  <th>School Name </th>
                  <th>School Address </th>
                  <th>Principal Details</th>
              
                  <th width="120"><?= trans('action') ?></th>
               </tr>
            </thead>
            <tbody>

                  <tr>
                     <td style="text-align: center;" colspan="11">No data available in table</td>
                  </tr>
              


            </tbody>
         </table>

      </div>
      <?php } ?>
   </div>
<?php } ?>

<script>
   $(document).ready(function() {
      $('.permanent_info').click(function() {
         var prov_id = $(this).data('id');
         var establishment = $(this).data('establishment');
         var remark_dra = $(this).data('remark_dra');
         $('#exampleModalLongTitle').html(establishment);

      });
   });

   function myfunction(id) {
      $.ajax({
         url: 'send_mail/',
         type: 'get',
         dataType: 'html',
         success: function(result) {
            alert('Mail Sent Sucessfully!')
         }
      });
   }



   $('#publish_permanent').click(function(event) {

      if (!event.detail || event.detail == 1) { //activate on first click only to avoid hiding again on double clicks

         $(this).slideToggle();
      }
   });


   var table = $('#consent_listexcel').DataTable({
      // retrieve: true,
      // paging: true, 
      dom: 'Bfrtip',
      buttons: [{
         extend: 'excel',
         filename: 'School List'
      }]
   });
   var table = $('#consent_list111').DataTable({
      retrieve: true,
      paging: true,

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
<script>
   $('document').ready(function() {
      // excel btn
      $('.buttons-html5 span').html('Download Excel');

   })
</script>