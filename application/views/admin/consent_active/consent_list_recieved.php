<style>
   .reply-btn {
      font-size: 14px !important;
      padding: 5px !important;
   }
   .apply-btn {
      font-size: 15px !important;
      padding: 3px 5px !important;
   }
   table tbody td h4 { 
      font-size: 15px !important;
   }
</style>

<div class="datalist table-responsive">

<table id="example1" class="table table-bordered table-hover" style="overflow: auto; border-collapse: collapse !important;">
   <thead>
      <tr style="text-align: center;">
         <th width="50">S.No.</th>
         <th>Exam Name</th>
         <th>Subject Line of Letter</th>
         <th> Start Date of exam</th>
         <th>End Date of exam</th>
         <th width="120" ><?= trans('action') ?></th>
      </tr>
   </thead>

   <tbody>
      <?php
         $i = 1;
       if(isset($info) && $info!=""){
         foreach ($info as $row):
         $admin_role_id = $this->session->userdata('admin_role_id');
         $admin_id = $this->session->userdata('admin_id'); 
         $schoolId = getSchoolNameFromEmailId($this->session->userdata('username')); 
         
      ?>
      <tr>
         <td>
            <?= $i ?>
         </td>
         <td>
            <?php get_exam_name($row['ref_id']); ?> 
            <span style="color: #E14658;"> <?= get_exam_name(get_exam_name_new_id($row['ref_id'])) ?></span>
         </td>
         <td>
            <span style="color: #E14658;"> <?= $row['exam_name'] ?></span>
         </td>
         <td>
            <?= date("d-m-Y", strtotime($row['startdate']));?>
         </td>
         <td>
            <?= date("d-m-Y", strtotime($row['enddate']));?>
         </td>
         <td style="text-align:center;">
         <?php  if ($admin_role_id == 6 )  { ?>
           <!-- <a href="<?php //echo base_url("admin/examshedule_schedule/invitation_reply/" . urlencrypt($row['ref_id'])); ?>" title="Reply"   class="btn btn-success btn-xs reply-btn"> -->
           <!-- <a href="<?= base_url("admin/examshedule_schedule/invitation_reply/" . urlencrypt($row['id'])); ?>" title="Reply"   class="btn btn-success btn-xs reply-btn"> -->
           <?php
           
               if($row['consents_signstamp_status'] == 1){
               ?>
           <a class="d-none" href="<?= base_url("admin/examshedule_schedule/invitation_reply/" . urlencrypt($row['ref_id'])); ?>" title="Reply"   class="btn btn-success">
            <i class="fa fa-reply"></i>
           </a>
           <button type="button" class="btn btn-sec" disabled>Applied</button>
           <?php
               }   
            ?>
           
            <?php //echo '<pre>'; print_r($row['ref_id']); exit; ?>
            <?php
               if($row['consents_signstamp_status'] != 1){
               ?>
            
                  <a href="<?= base_url("admin/consent_active/consent_add/" . $schoolId).'/'.$row['ref_id']; ?>" title="Apply" rel="<?php echo $row['ref_id'] ?>" class="btn btn-warning">
                     Apply  
                  </a>   
            <?php
               }   
            ?>
           

       <?php }  if ($admin_role_id == 5 )  { ?>



         <?php }

         if ($admin_role_id == 6 ) { ?>

        

         <?php }

         ?>

        

      
       

         </td>

      </tr>

      <?php

         $i++;

         endforeach;
      }

         ?>

   </tbody>

</table>

<!-- Modal -->

   


   </div>

   </div>



<script>

$(document).ready(function () {

   var table = $('#example1').DataTable( {
    "processing": true,
    "serverSide": false, 
  });

   // $("#consent_recieved").show().delay(5000).queue(function(n) {
   //     $(this).remove();
   // });


   // $(window).bind("load", function() {
      // window.setTimeout(function() {
      //    $("#consent_recieved").fadeTo(500, 0).slideUp(500, function(){
      //       $(this).remove();
      //    });
      // }, 4000);
   // });

    $('.update_db').click(function () {
      
        var prov_id = $(this).attr('rel');

        $.ajax({

            url: 'update_exam_name/',

            type: 'get',

            data: {prov_id: prov_id},

            success: function (response) {

             

            }

        });

    });

});

function myfunction(id){

  $.ajax({

    url: 'get_renew_data_ref_permanent/'+id,

     type:'get',

     dataType: 'html',

     data : {data:id},

     success:function(result){

         $("#gres").html(result);

     } 

 });

}




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
   margin-top: 10px;
   border: none !important;
   padding: 4% !important;
   font-weight: lighter !important;
   font-size: 60% !important;

}



</style>