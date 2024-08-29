

<div class="datalist table-responsive">

   <table id="na_datatable" class="table table-bordered table-hover " style="overflow: auto; border-collapse: collapse !important; 

    ">

      <thead>

         <tr style="text-align: center;">

            <th width="50">S.No.</th>

            <th>Letter/Email/Speed Post Number</th>

            <th>Exam Name</th>

            <th> Start Date of exam</th>

            <th>End Date of exam</th>

            <!-- <th>Shift of Exam </th> -->

            <!-- <th>Time of Exam </th> -->



            <th width="120" ><?= trans('action') ?></th>

         </tr>

      </thead>

      <tbody>

          

         <?php

         

            $i = 1;

            foreach ($info as $row):


            $admin_role_id = $this->session->userdata('admin_role_id');

            $admin_id = $this->session->userdata('admin_id'); 

      ?>



         <tr>

            <td>

               <?= $i ?>

            </td>

            <td>

               <?php //echo $row['speedpost']; ?>
               <?php if($row['speedpost'] != ''){ ?>
                  <?= $row['speedpost']; ?>

               <?php }else {?>

                  <a href="<?= base_url("admin/examshedule_schedule/create_invt_add/" . urlencrypt($row['id'])); ?>" title="Create Letter" style="color: #E14658;">                  
                     Create Letter
                  </a>

               <?php } ?>   
              

            </td>

            <td>

               <span class="text-bold"> <?= get_exam_name($row['exam_name']) ?></span>

                      

            </td>

            <td>

               <?=  date("d-m-Y", strtotime($row['startdate'])); ?>

            </td>

            <td>

               <?=  date("d-m-Y", strtotime($row['enddate'])); ?>

            </td>
            <td style="text-align:center;">

            <?php  if ($admin_role_id == 6 )  { ?>

            <a href="<?= base_url("admin/consent_letter/edit_consent/" . $row['id']); ?>" title="Edit" class="btn btn-warning btn-xs" >

            <i class="fa fa-edit"></i>

             </a> 


          <?php }  if ($admin_role_id == 5 )  { ?>



            <?php }

            if ($admin_role_id == 6 ) { ?>

           

            <?php }

            ?>

           
<!-- 
            <a   href="<?php //base_url("admin/examshedule_schedule/send_invitation/" . urlencrypt($row['id'])); ?>" title="Send invitations" class="btn btn-success btn-xs mr5"  >

            <i class="fa fa-paper-plane-o"></i>

             </a>  -->
            <?php if($row['speedpost'] != ''){ ?>
              <!-- <a href="<?php //echo base_url("admin/examshedule_schedule/invitation_preview/" . urlencrypt($row['id'])); ?>" title="Preview"  class="btn btn-warning btn-xs  mr5"> -->
               <a href="<?= base_url("admin/examshedule_schedule/consent_letter_preview/" . urlencrypt($row['id'])); ?>" title="consent letter preview"  class="btn btn-warning btn-xs">
                  <i class="fa fa-eye"></i>
               </a>
            <?php }?>
               <!-- <a href="<?= base_url("admin/examshedule_schedule/date_sheet_del/" . urlencrypt($row['id'])); ?>" title="Delete" class="btn btn-danger btn-xs mr5" onclick="return confirm('Do you want to delete ?\nक्या आपको यकीन है?')">
                  <i class="fa fa-trash"></i>
               </a>  -->
               <?php if($row['speedpost'] != ''){ ?>
                  <a href="<?= base_url("admin/examshedule_schedule/date_sheet_edit/" . urlencrypt($row['id'])); ?>" title="Edit" class="btn btn-success btn-xs">
                  <i class="fa fa-pencil-square-o"></i>
                  </a>
               <?php }?>
          

            </td>

         </tr>

         <?php

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


F
      </div>

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

       url: 'get_renew_data_ref_permanent/'+id,

        type:'get',

        dataType: 'html',

        data : {data:id},

        success:function(result){

            $("#gres").html(result);

        } 

    });

   }

 





  $('#publish_permanent').click(function(event) {



    if(!event.detail || event.detail==1){//activate on first click only to avoid hiding again on double clicks

       

        $(this).slideToggle();

    }

});


var table = $('#na_datatable').DataTable( {
    "processing": true,
    "serverSide": false, 
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
      margin-top: 10px;
      border: none !important;
      padding: 4% !important;
      font-weight: lighter !important;
      font-size: 60% !important;

   }



</style>