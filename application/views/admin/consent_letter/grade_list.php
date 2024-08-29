<style>
   #example1excel_filter,
   #example1excel_info,
   #example1excel_paginate
    {
      display: none;
   }
</style>
<div class="datalist table-responsive">
<table id="example1excel" class="table table-bordered table-hover d-none" style="overflow: auto;
    ">
      <thead>
         <tr>
         <th width="50">S.No.</th>
            <th>School Registration No.  </th>
            <th>School Name  </th>
            <th>School Address</th>
            <th>Landmark</th>
            <th>District</th>
            <th>City</th>
            <th>Principal Name</th>
            <th>Principal Mobile</th>
            <th>Principal Email</th>
            <th>Principal whatsup Number</th>
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
            <th>Ranking</th>
            <th>Status</th>
         </tr>
      </thead>
      <tbody>
          
         <?php
         
            $i = 1;
            foreach ($info as $row):
      
                $admin_role_id = $this->session->userdata('admin_role_id');
                $admin_id = $this->session->userdata('admin_id');
            //     if (($admin_role_id != 6) && ((in_array($row['file_movement'], array(1))) )) {
            //         continue;
            //   }
              if($row['school_registration_number'] != '' && $row['school_name'] != '' && $row['district'] != ''){ 
               ?>

                  <tr>
                  <td><?= $i ?></td>
                  <td><?=$row['school_registration_number'] ?></td>
                  <td> <?=$row['school_name'] ?></td>
                  <td><?=$row['address'] ?></td>
                  <td><?=$row['landmark'] ?></td>
                  <td><?=$row['district']; ?></td>
                  <td><?=$row['city']; ?></td>
                  <td><?=$row['principal_name']; ?></td>
                  <td><?=$row['pri_mobile']?></td>
                  <td><?=$row['email']?></td>
                  <td><?=$row['whats_num']?></td>
                  <td><?=$row['super_name']?></td>
                  <td><?=$row['super_design']?></td>
                  <td><?=$row['super_mobile']?></td>
                  <td><?=$row['super_email']?></td>
                  <td><?=$row['super_whatspp']?></td>
                  <td><?=$row['no_room']?></td>
                  <td><?=$row['no_sheet']?></td>
                  <td><?=$row['max_allocate_candidate']?></td>
                  <td><?=$row['furniture_avail']?></td>
                  <td><?=$row['elec_avail']?></td>
                  <td><?=$row['gen_avai']?></td>
                  <td><?=$row['wash_rrom']?></td>
                  <td><?=$row['clock_room']?></td>
                  <td><?=$row['vehicle_avail']?></td>
                  <td><?=$row['staff_suffi']?></td>
                  <td><?=$row['ukpsc_exxma']?></td>
                  <td><?=$row['debar']?></td>
                  <td><?=$row['bras_Seal']?></td>
                  <td><?=$row['remark_if']?></td>
                  <td><?=$row['acc_holder_name']?></td>
                  <td><?=$row['ban_name']?></td>
                  <td><?=$row['branch_name']?></td>
                  <td><?=$row['ifsc']?></td>
                  <td><?=$row['acc_num']?></td>
                  <td><?=$row['acc_num_con']?></td>
               <td><?= $row['ranking_admin']; ?></td>
               <td><?= $row['status_admin']; ?></td>
            
             </tr>
            <?php
              }
            $i++;
            endforeach;
            ?>
      </tbody>
   </table>
   <table id="example1"  class="table table-bordered table-hover" style="overflow: auto;
    ">
      <thead>
         <tr>
            <th width="50">S.No.</th>
            <th>School Registration No.  </th>
            <th>School Name  </th>
            <th>District</th>
            <th>City</th>
            <th>Principal Details</th>
              
            <th width="120">Ranking & <?= trans('status') ?></th>
            <!-- <th width="120"><?= trans('action') ?></th> -->
         </tr>
      </thead>
      <tbody>
          
         <?php
         
            $i = 1;
            foreach ($info as $row):
      
                $admin_role_id = $this->session->userdata('admin_role_id');
                $admin_id = $this->session->userdata('admin_id');
            //     if (($admin_role_id != 6) && ((in_array($row['file_movement'], array(1))) )) {
            //         continue;
            //   }
              if($row['school_registration_number'] != '' && $row['school_name'] != '' && $row['district'] != ''){ 
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
                        <span class="">
                           <?php echo $row['principal_name']; ?>
                        </span>
                        <br>
                     
                        <small class="text-muted">
                        <?php echo $row['pri_mobile']; ?>
                        </small>
                        <br>
                        <small class="text-muted">
                        <?php echo $row['email']; ?>
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
                  <?php $admin_id = $this->session->userdata('admin_id'); ?>
                  <?php if($admin_id == 31){ ?>
                     <select name="grade" id="grade" style="height:20px; width:150px;" class="gra form-control" rel="<?php echo $row['id']; ?>">        
                        <option value="">Select Grade</option>
                        <option value="A" <?php if($row['ranking_admin'] == 'A'){ echo "selected";}?> >A</option>
                        <option value="B" <?php if($row['ranking_admin'] == 'B'){ echo "selected";}?> >B</option>
                        <option value="C" <?php if($row['ranking_admin'] == 'C'){ echo "selected";}?>>C</option>
                        <option value="Reject"<?php if($row['ranking_admin'] == 'Reject'){ echo "selected";}?> >Reject</option>
                     </select>      
                     <select name="st_grade" id="st_grade" class="st_grade form-control" rel="<?php echo $row['id']; ?>" style="margin-top:10px;height:20px;width:150px;" >        
                           <option value="">Select Status</option>
                           <option value="Active" <?php if($row['status_admin'] == 'Active'){ echo "selected";}?> >Active</option>
                           <option value="Inactive" <?php if($row['status_admin'] == 'Inactive'){ echo "selected";}?>>Inactive</option>
                     </select>
                  <?php } else { ?>
                     <?= $row['ranking_admin']; ?>
                        </br>
                     <?= $row['status_admin']; ?>
                  <?php } ?>   
                  
               </td>
            
                  </tr>
            <?php
              }
            $i++;
            endforeach;
            ?>
      </tbody>
   </table>

   <!-- Modal -->
      <div class="modal fade " id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered " role="document">
         <div class="modal-content remarkss">
            <!-- <div class="modal-header"> -->
            <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"> -->
               <label style="text-align:center; font-size: 16px;"><u>Remark By DRA</u></label>
               <h5 id="exampleModalLongTitle" style="text-align:justify; font-size: 14px;padding: 0px 14px 5px 13px;"><?= $row['remark_dra'] ?> </h5>
            <!-- </button> -->
            <!-- </div> -->
            <!-- <div class="modal-body"> -->
            </div>
          <!--   <div class="modal-footer">
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
               <button type="button" class="btn btn-primary">Save changes</button>
            </div> -->
         </div>
        
      </div>
       <div class="modal fade " id="exampleModalCenter1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered " role="document">
      <div class="modal-content remarkss">
         
  <label style="text-align:center; font-size: 16px;"><u>Application History</u></label>
            <div id="gres"></div>

        </div>

      </div>

      </div>
      </div>
      </div>

<script>
   $(document).ready(function () {
$('.gra').on('change',function () {
   var val =$(this).val();
   var rel = $(this).attr('rel');
   // var url = "<?php //echo base_url('admin/consent_letter/update_grade') ?>";
      // alert(rel);
      // alert(url);
      $.ajax({
      url: 'update_grade/'+rel,
      type:'get',
      dataType: 'html',
      data : {val:val,rel:rel},
      success:function(result){

                  alert('Success! Grade Updated');

        } 

    });
          
       });
$('.st_grade').on('change',function () {
   var val =$(this).val();
   // val = confirm('Are you sure you want to change?');
   var rel = $(this).attr('rel');
   // alert(rel);
      $.ajax({
      url: 'update_status/'+rel,
      type:'get',
      dataType: 'html',
      data : {val:val,rel:rel},
      success:function(result){
             alert('Success! Status Updated');

  } 

    });
          
       });
   });



</script>
<script>
  $(document).ready(function() {
     $('#example1').DataTable();
     $('#example1excel').DataTable( {
            dom: 'Bfrtip',
            buttons: [
                'excel'
            ]
        } );
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
   td,th{

   }

</style>