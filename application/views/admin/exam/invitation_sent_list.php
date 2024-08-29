

<div class="invitation_table">

   <table id="example1" class="table table-bordered table-hover" style="overflow: auto; 

    ">

      <thead>

         <tr style="text-align: center;">

            <th width="50">S.No.</th>

            <!-- <th>Letter/Email/Speed Post Number</th> -->

            <th>Subject Line of Letter</th>
            <th>Total Candidates</th>
            <th>Start Date of exam</th>
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

            <!-- <td>

               <?php //echo $row['speedpost'] ?>
              

            </td> -->

            <td>

               <h4 class="m0 mb5"> <?= $row['subjectline'] ?></h4>

                      

            </td>
            <td>
            <?php

                  $array_value_sum = $row['no_candidate'];
                  $array = explode(',', $array_value_sum);
                  $total_sum = array_sum($array);
                  echo array_sum($array);

                  ?>

            </td>

            <td>

               <?= date("d-m-Y", strtotime($row['startdate'])); ?> 

            </td>

            <td>

               <?= date("d-m-Y", strtotime($row['enddate'])); ?> 

            </td>
            <td style="text-align:center;">

            <?php  if ($admin_role_id == 5 )  { ?>

            <a href="<?=base_url("admin/examshedule_schedule/consent_recieved_by_user_list/" . $row['id']); ?>" title="Consent Recieved" class="btn btn-success consent_recieved btn-xs mr5" >

            <i class="fa fa-eye"></i>

             </a>
             <a href="<?= base_url("admin/examshedule_schedule/consent_not_recieved_by_user_list/" . $row['id']); ?>" title="Consent Not Recieved" class="btn btn-danger consent_not_recieved btn-xs mr5" >

            <i class="fa fa-eye"></i>

             </a> 
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

            ?>

      </tbody>

   </table>

  

      </div>

      </div>



<script>

   $(document).ready(function () {

//        $('.consent_recieved').click(function () {

//          alert($(this).val());


// //           AJAX request

//            $.ajax({

//                url: 'permanent_info/',

//                type: 'get',

//                data: {prov_id: prov_id, 'csfr_token_name': csfr_token_value},

//                success: function (response) {

//                    $('.modal-body').html(response);

//                    $('#empModal').modal('show');

//                }

//            });

//        });

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
      margin-top: 10px;
      border: none !important;
      padding: 4% !important;
      font-weight: lighter !important;
      font-size: 60% !important;

   }



</style>