<div class="datalist table-responsive">

   <table id="na_datatable" class="table table-bordered table-hover  " style="overflow: auto; border-collapse: collapse !important;">

      <thead>

         <tr style="text-align: center;">

            <th width="50">S.No.</th>

            <th>Exam Name</th>

            <!-- <th>Subject Line of Letter</th> -->

            <th> Start Date of exam</th>

            <th>End Date of exam</th>

            <!-- <th>Shift of Exam </th> -->

            <!-- <th>Time of Exam </th> -->



            <th width="120" ><?= trans('action') ?></th>

         </tr>

      </thead>

      <tbody>

          

         <?php
            if(!empty($info)){
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

               <?= get_exam_name($row['exam_name']) ?>
              

            </td>

     

            <td>

               <?= date("d-m-Y", strtotime($row['startdate'])); ?>

            </td>

            <td>

               <?= date("d-m-Y", strtotime($row['enddate'])); ?>

            </td>
            <td style="text-align:center;">

            <?php  if ($admin_role_id == 6 )  { ?>

            <a href="<?= base_url("admin/consent_letter/edit_consent/" . $row['id']); ?>" title="Edit" class="btn btn-warning btn-xs mr5" >

            <i class="fa fa-edit"></i>

             </a> 


          <?php }  if ($admin_role_id == 5 )  { ?>



            <?php }

            if ($admin_role_id == 6 ) { ?>

           

            <?php }

            ?>

           
 
           
              <a href="<?= base_url("admin/master/invitation_preview/" . urlencrypt($row['exam_name'])); ?>" title="Preview"  class="btn btn-warning btn-xs">
               <i class="fa fa-eye"></i>
              </a>
            <?php $chek = checkcondidateAssigned($row['exam_name']); if($chek == false) { ?>
              <a  href="<?= base_url("admin/master/date_sheet_del/" . urlencrypt($row['id'])); ?>" onclick="return confirm ('Are You Sure?\nक्या आपको यकीन है?')" title="Delete" class="btn btn-danger btn-xs" >
                  <i class="fa fa-trash"></i>
             </a> 
             <?php }else{ ?>
               <span class="btn btn-danger btn-xs"><i class="fa fa-ban"></i></span>
               <?php } ?>
            </td>

         </tr>

         <?php

            $i++;

            endforeach;

            ?>

      </tbody>
      <?php 
         }else{
            ?>
            <tr>
               <td class="dataTables_empty" style="text-align: center;" colspan="5">No data available in table</td>               
            </tr> 
         <?php
         }
         ?>

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