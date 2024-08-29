<style>
/*.card-body {
    overflow: auto;
    flex: 1 1 auto;
    padding: 1.25rem;
}*/
table.dataTable {
    clear: both;
    margin-top: 6px !important;
    margin-bottom: 6px !important;
    max-width: none !important;
    border-collapse: collapse!important;
}
.table th, .table td {
    padding: 0.5rem;
}
.table thead th {
    vertical-align: inherit;
    border-bottom: 2px solid #dee2e6;
}
   </style>
<input type="button" id="ajax_hit" value="HitAjax" style="display: none;" > </input>
<div class="datalist">
   <table id="example1" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th width="50">S.No</th>
                            <th>Owner Name</th>
                            <th>Date</th>
                            <th>Place</th>
                            <th>Reason for Surrender</th>
                            <th>Remark by DRA</th>
                            <th>File Uploaded</th>
                          
                             <th width="100"><?= trans('status') ?></th>
                            <th width="100"><?= trans('action') ?></th>

                        </tr>
                    </thead>
      <tbody>
          <?php

          // print_r($_SESSION); die();
          $i = 1;


          foreach ($info as $row):
              $admin_role_id = $this->session->userdata('admin_role_id');
              $admin_id = $this->session->userdata('admin_id');
             // if (($admin_role_id != 6) && ((in_array($row['file_movement'], array(1))) )) {
             //        continue;
             //    }
            //   echo "<pre>";
            // print_r($row);
            // die();
              ?>


         <tr>
            <td>
               <?= $i ?>
            </td>
            <td>
               <h4 class="m0 mb5">   <?php echo $row['name']; ?></h4>
            </td>
            <td>
              <?php echo $row['deactivation_date']; ?>
            </td>

            <td>
              <?php echo $row['deactivation_place']; ?>
            </td>
            <td>
              <?php echo $row['reason_deactivation']; ?>
            </td>
            
            <?php if($row['remark_by_auth'] == ""){?>
                 <td> No Remark Yet !   </td>
           <?php } else { ?>
            <td>
              <?php echo $row['remark_by_auth']; ?>
            </td>
            <?php } ?>
            
            <td>
                 <?php echo $row['fileName1']; ?>
               
            </td>
        
              
               <td>
                <?php if($row['file_movement'] == '5'){?>
               <button type="button" class="btn btn-success provisional_info" data-establishment='<?php echo $row['establishment']; ?>' >
               <?php echo FILE_MOVEMENT[$row['file_movement']]; ?>
               </button>
               <?php } if($row['file_movement'] == '3') {?> 
                <button type="button" class="btn btn-danger provisional_info" data-establishment='<?php echo $row['establishment']; ?>' >
               <?php echo FILE_MOVEMENT[$row['file_movement']]; ?>
               </button>
           <?php } if($row['file_movement'] == '2') {?>
            <button type="button" class="btn btn-primary provisional_info" data-establishment='<?php echo $row['establishment']; ?>' >
               <?php echo FILE_MOVEMENT[$row['file_movement']]; ?>
               </button>
           <?php } ?>
            </td>
            
            
            <td>
               <?php if($_SESSION['admin_role_id'] == 5){?>
                  <a href="<?= base_url("admin/profile/dra_deactivation_action/" . $row['id']); ?>" class="btn btn-warning btn-xs mr5" >
               <i class="fa fa-comments"></i>
               </a>
               
               <?php }if ($admin_role_id == 4) { ?>
              
                <?php }if ($admin_role_id == 3) { ?>
                    
                 <?php }if ($admin_role_id == 2) { ?>
                  
            <?php }if (($admin_role_id == 6) && ((in_array($row['file_movement'], array(5))) )) { ?>
               <a href="javascript: void(0)" hrefLink="<?= base_url("admin/profile/deaction_button/" ); ?>" title="Deactivate Profile" class="btn btn-warning btn-xs deactivateBtn"><i class="fa fa-power-off"></i></a>
               
                 <?php } ?>
                     <a href="<?= base_url("admin/profile/deactivation_preview/" . $row['id']); ?>" title="Preview"  onclick="return confirm('Show Preview ?')" class="btn btn-warning btn-xs"><i class="fa fa-eye"></i></a>        
            </td>
         </tr>
         <?php
            $i++;
            endforeach;
            ?>
      </tbody>
   </table>
   <!-- Modal -->
   <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
         <div class="modal-content">
            <div class="modal-header">
           
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body">
               ...
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
               <button type="button" class="btn btn-primary">Save changes</button>
            </div>
         </div>
      </div>
   </div>
</div>
<script>

     $(document).on('click', '.deactivateBtn', function() {
            let getUrl = $(this).attr('hrefLink');
            if (confirm('Are you sure, you want to de-activate this record?')) {
                $.ajax({
                        url: getUrl,
                        type: 'GET',
                        success: function(response) {
                            if (response) {
                                alert('Your account has been de-activated successfully,Thank You!');
                                window.location.href = '<?= base_url('admin/auth/login'); ?>'; 
                            }
                        }

                });
            }
        });

</script>
