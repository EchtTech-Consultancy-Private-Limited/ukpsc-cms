

<div class="datalist">

   <table id="example1" class="table table-bordered table-hover" style="overflow: auto;

    display: block;">

      <thead>

         <tr>

            <th width="50">S.No.</th>

            <th>Exam Name</th>

            <th>Subject Name</th>

            <th>No. of Candidate</th>

            <th>Date Of Exam</th>

            <th>Shift of Exam </th>

            <th>Time of Exam </th>



            <th width="120"><?= trans('action') ?></th>

         </tr>

      </thead>

      <tbody>

          

         <?php

         

            $i = 1;

            foreach ($info as $row):



            $admin_role_id = $this->session->userdata('admin_role_id');

            $admin_id = $this->session->userdata('admin_id');

                if (($admin_role_id != 6) && ((in_array($row['file_movement'], array(1))) )) {

                    continue;

              }      

      ?>



         <tr>

            <td>

               <?= $i ?>

            </td>

            <td>

               <?= $row['exam_name'] ?>

            </td>

            <td>

               <h4 class="m0 mb5"> <?= get_subject_name($row['sub_name']) ?></h4>

                      

            </td>

            <td>

               <?= $row['no_candidate']; ?>

            </td>

            <td>

               <?= $row['date_exam']; ?>

            </td>

            <td>

               <h4 class="m0 mb5">

                  <?php echo $row['shft_exam']; ?>

               </h4>

              

            </td>

            <td>

               <h4 class="m0 mb5">

                  <?php echo $row['time_exam'] ?>

               </h4>

                </td>

   

            <td>

            <?php  if ($admin_role_id == 6 )  { ?>

            <a href="<?= base_url("admin/consent_letter/edit_consent/" . $row['id']); ?>" title="Edit" class="btn btn-warning btn-xs mr5" >

            <i class="fa fa-edit"></i>

             </a> 


          <?php }  if ($admin_role_id == 5 )  { ?>



            <?php }

            if ($admin_role_id == 6 ) { ?>

           

            <?php }

            ?>

           

            <a href="<?= base_url("admin/examshedule_schedule/date_sheet_list_edit/" . $row['id']); ?>" title="Edit" class="btn btn-warning btn-xs mr5" >

            <i class="fa fa-edit"></i>

             </a> 
			  <a href="<?= base_url("admin/examshedule_schedule/date_sheet_del/" . urlencrypt($row['id'])); ?>" title="Delete" class="btn btn-danger btn-xs mr5" >

            <i class="fa fa-trash"></i>

             </a> 
			 

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