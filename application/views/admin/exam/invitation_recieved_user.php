
<style type="text/css">
 .datalist{
    margin: 0 0 0 19%;
 }  

  
</style>
<div class="datalist">

   <table id="example1" class="table table-bordered table-hover" style="overflow: auto;

   ">

      <thead>

         <tr>

            <th width="50">S.No.</th>

         

            <th>Subject Name</th>

            <th>Date of Exam</th>
               <th>Shift of Exam </th>
            

            <th>Time Of Exam</th>
            <th>No. of Candidate</th>
         

        
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

               <?= $row['sub_name_re'] ?>

            </td>

            <td>

               <h4 class="m0 mb5"> <?= $row['date_exam_re'] ?></h4>

                      

            </td>

            <td>

               <?= $row['shft_exam']; ?>

            </td>

            <td>

               <?= $row['time_exam']; ?>

            </td>

            <td>

               <h4 class="m0 mb5">

                  <?php echo $row['cand_no']; ?>

               </h4>

              

            </td>

             

           

         </tr>

         <?php

            $i++;

            endforeach;

            ?>

      </tbody>

   </table>

   <!-- Modal -->

       <div class="modal fade " id="exampleModalCenter1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">

      <div class="modal-dialog modal-dialog-centered " role="document">

      <div class="modal-content remarkss">

         

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