<div class="datalist">
   <table id="example1" class="table table-bordered table-hover" style="overflow: auto;">

      <thead>
         <tr style="text-align: center;">
         <!--     <th> <input type="checkbox" id="select-all" /> Select All </th> -->
            <th width="50">S.No.</th>
            <th>School Registration No.  </th>
            <th>School Name  </th>
            <th>District</th>
            <th>City</th>
            <th>Principal Details</th>              
            <th width="120"> Grade</th>
            <th width="120"><?= trans('action') ?></th>
       
         </tr>
      </thead>
      <tbody>
           <div style="margin-left:83%;padding: 0 0 20px 10px; ">
    <input  type="button"  class="select_all btn btn-success" id="select-all1" onclick="return confirm('Are you sure to send all?')" value="Send All"> 

     <input  type="button" style="" class=" btn btn-success" id="select-all1" onclick="return confirm('Are you sure ?')" value="Send Selected">
    <label style="font-weight:bold;" for="car"></label>
    </div>
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
               <?php echo $row['pri_mobile']; ?>
               </small>
            </td>        
               
            <td>
<h4 style="display:none;"><?php echo $row['status_admin'] ?></h4>
<?php echo $row['ranking_admin'] ?>
            </td>
           

         <td style="text-align: center;">
  <input type="checkbox" id="a" class="checkbox-item" rel="<?php echo $row['id']; ?>">


            <?php  if ($admin_role_id == 5 )  { ?>
            <a href="<?= base_url("admin/examshedule_schedule/send_invitation_user/" . $row['id']); ?>" title="Send Invitations" class="btn btn-success btn-xs mr5" >
            <i class="fa fa-paper-plane-o"></i>
             </a>
          <?php }  if ($admin_role_id == 5 )  { ?>
                                 
            <?php }
            if ($admin_role_id == 1 ) { ?>
           
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
   <!-- Modal -->
     
      </div>
     
<script>


$(document).ready(function(){
 $('.checkbox-item').bind('click',function(){
  var page = $(this).attr('rel');
  alert(page);
 })
})

$('.select_all').click(function(event) {  
    var hrefs = new Array();
   // alert(this.checked).attr('rel');

        // Iterate each checkbox
        $(':checkbox').each(function() {
         // alert(this.checked)
            this.checked = true;     
           var r= $(this).attr('rel'); if(r != 'undefined'){   
            hrefs.push(r);       
            }       

        });


var url = "<?php echo base_url('admin/examshedule_schedule/send_invitation_user_all/')?>"

      $.ajax({

       url: url,

        type:'get',

        dataType: 'text',

        data : {data:hrefs},

        success:function(result){

        } 

    });


  
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
      margin-top: px;
      border: none !important;
      padding: 4% !important;
      font-weight: lighter !important;
      font-size: 60% !important;
      margin-left: 5px;
   }

</style>

