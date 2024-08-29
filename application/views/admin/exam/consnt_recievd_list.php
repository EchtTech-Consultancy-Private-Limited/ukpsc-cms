



<div class="datalist">



   <table id="example1" class="table table-bordered table-hover" style="overflow: auto;



    display: ;">



      <thead>



         <tr>



            <th width="50">S.No.</th>



            <th>School Name</th>



            <th>District Name</th>



            <th>City Name</th>



            <th>Principal Name</th>



            <th>Grade</th>



           

            <th width="120"><?= trans('action') ?></th>





      </tr>



      </thead>



      <tbody>



          



         <?php



         



            $i = 1;



            foreach ($info as $row):

               // echo "<pre>";

               // print_r($row); die();

               //   echo "</pre>";



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



               <?= $row['school_name'] ?>



            </td>



            <td>



               <h4 class="m0 mb5"> <?= $row['district'] ?></h4>



                      



            </td>



            <td>



               <?= $row['city']; ?>



            </td>



            <td>



      <?php echo $row['principal_name'] . ' </br>' . $row['email']. '</br> ' .'Mobille Number -'.$row['pri_mobile']; ?>


            </td>



            <td>

                  <?php echo $row['ranking_admin']; ?>         



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



           <a href="<?= base_url("admin/examshedule_schedule/view_recieved_consent/" . urlencrypt($row['ref_id'])); ?>" title="Delete" class="btn btn-success btn-xs mr5" >



            <i class="fa fa-eye"></i>



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