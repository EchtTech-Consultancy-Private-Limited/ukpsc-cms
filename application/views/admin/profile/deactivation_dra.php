<!-- Content Wrapper. Contains page content -->
<?php if ($_SESSION['admin_role_id'] != 5) {
        $application_mode=0;
}else{
        $application_mode=1;
}

//print_r($_SESSION['admin_role_id']); die;
?>
<link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/jquery.collapsibleCheckboxTree.css" type="text/css" />
<script type="text/javascript">
   jQuery(document).ready(function () {
       $('ul#example').collapsibleCheckboxTree();
   });
</script>
<style type="text/css">
   .btn-primary{
   font-size: 14px;
   }
   .li_root{ float:left;
   width:20%
   }
   .fa-ul li ul li{ float:left;
   width:100%
   }
   .widget .panel-title {
    display: inline;
}
.widget .label-info {
    float: right;
}
.widget li.list-group-item {
    border-radius: 0;
    border: 0;
    border-top: 1px solid #ddd;
}
.widget li.list-group-item:hover {
    background-color: rgba(86, 61, 124, 0.1);
}
.widget .mic-info {
    color: #666666;
    font-size: 11px;
}
.widget .action {
    margin-top: 5px;
}
.widget .comment-text {
    font-size: 12px;
}
.widget .btn-block {
    border-top-left-radius: 0px;
    border-top-right-radius: 0px;
}
.img-user {
    width: 80px;
    height: auto;
}
</style>
<div class="content-wrapper">
   <!-- Main content -->
   <section class="content">
      <div class="card card-default color-palette-bo">
         <div class="card-header">
                <div class="d-inline-block">
                   <h3 class="card-title"> <i class="fa fa-pencil"></i>
                      &nbsp; Remark Approval                  
                   </h3>
                </div>
            <!--          <div class="d-inline-block float-right">
               <a href="<?= base_url('admin/profile/change_pwd'); ?>" class="btn btn-success"><i class="fa fa-list"></i> <?= trans('change_password') ?></a>
               </div>-->
         </div>
         <div class="card-body">
            <!-- For Messages -->
               <?php $this->load->view('admin/includes/_messages.php') ?>
                <?php
                if ($_SESSION['admin_role_id'] == 6) {
                    echo form_open(base_url('admin/grievance/edit_grievance/' . $user['grav_id']), 'id="xin-form" class="form-horizontal" ');

                      }
                ?> 

                <h3 style="text-align:center;  "><span class="label ">*<u>APPLY FOR DEACTIVATION OF ACCOUNT</u>* </span></h3>
                <hr class="style1">
                <div class="col-md-4" >
                    <div class="row">   
                        <div class="form-group">
                            <label for="State">Select a Reason for Surrender:</label>
                           
                             <select class="form-control"  disabled="disabled"   name="type_fee" id="permanent_type">
                         <option value="">Select Type</option>
                         <option value="Due to change in category of clinic" <?php if($user[0]['reason_deactivation']=='Due to change in category of clinic') echo "selected"?>  >Due to change in category of clinic</option>
                         <option value="Due to change of location" <?php if($user[0]['reason_deactivation']=='Due to change of location') echo "selected"?>  >Due to change of location</option>
                         <option value="Due to ceasing to function as a clinical establishment" <?php if($user[0]['reason_deactivation']=='Due to ceasing to function as a clinical establishment') echo "selected"?>  >Due to ceasing to function as a clinical establishment</option>
                         <option value="Due to some other reasons" <?php if($user[0]['reason_deactivation']=='Due to some other reasons') echo "selected"?>  >Due to some other reasons</option>

                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">  
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="City" >Application for the surrender of Clinical Establishment:<span style="color:red">*</span></label>
                                <textarea disabled="disabled"  class="form-control" onkeyup="trimSpaces();" id="reason_deactication"  name="reason_deactication"   rows="6" cols="50">  <?php echo $user[0]['reason_deactication']; ?>
                                </textarea>
                              
                            </div>
                        </div>     
                        <script>
                            function trimSpaces(){
                                    s = document.getElementById("reason_deactication").value;
                                    // s = s.replace(/(^\s*)|(\s*$)/gi,"");
                                    s = s.replace(/[ ]{2,}/gi," ");
                                    s = s.replace(/\n /,"\n");
                                    document.getElementById("reason_deactication").value = s;
                                }
                        </script>
                </div>
            <!-- <hr style="1"> -->
                <div class="row">
                    <div class="form-group  col-sm-3">
                        <label>File Uploaded Name</label>
                        <input type="text" disabled="disabled"  class="form-control" name="fileName1" id="fileName1" value="<?php echo $user[0]['fileName1'] ?>"  />  
                        <!-- <label for="employee_id">Attachment</label>  -->
                    </div>
                </div>
                
                    <table>
                        
                        <tbody>
                            <tr>
                                <td>Date:</td>
                                <td> <input type="text" disabled="disabled"  class="form-control" name="deactivation_date" value="<?php echo $user[0]['deactivation_date'] ?>" /></td>
                            </tr> </br>
                            <tr>
                                <td>Place:</td>
                                <td> <input type="text"  disabled="disabled"  class="form-control" name="deactivation_place" value="<?php echo $user[0]['deactivation_place'] ?>"    placeholder="Place" /></td>
                            </tr>
                        </tbody>
                    </table>
                
            
            
               <?php
                IF ($_SESSION['admin_role_id'] == 6) {
                    ?>
           <div class="card-footer" align="center" >
              
               <input type="submit"  name="submit" class="btn btn-primary " value="Save"></input>
               <input type="button"   class="btn btn-primary "  onclick="history.back()" value="Back"></input>
              
            </div> 

            <?php echo form_close(); ?> <?php } ?>
          
        
          
           <!-- /.box-body -->
            <!--           // DRA Autorization Form starts Here    -->
 <hr class="style1">
            <div class="">

                    <?php echo form_open(base_url('admin/profile/dra_deactivation_action/' . $deaction_id), 'id="xin-form" class="form-horizontal" ') ?> 
               
               
                <label for="employee_id">DRA Action*</label>
                <input type="hidden" name="deaction_id"  class="form-control" id="deaction_id" value="<?php echo $deaction_id;?>" >
                <input type="hidden" name="admin_role_id"  class="form-control" id="admin_role_id" value="<?php echo $_SESSION['admin_role_id']; ?>" > 
                <div class="row">
                    <div class="form-group col-md-3"id="dra_ac">
                        <label for="action">Action</label>
                        <select name="action_dra" id="action_dra" class="form-control select2-hidden-accessible action_dra" data-plugin="select_hrm" data-placeholder="Select Gender" tabindex="-1" aria-hidden="true">
                            <option value="">Choose Acion</option>
                                                
                            <?php  
                            foreach(ALLOWED_FILE_MOVEMENT_ROLE_ID_DEACTIVATION[$_SESSION['admin_role_id']] as $k=>$v){ 
                                echo '<option value="'.$k.'">'.$v.'</option>';
                               }?>
                           
                        </select>
                   </div>
                <!--</div>-->

                 <!--<div class="col-md-2" >-->
                    <div class="form-group col-md-3"id="autho_grav" style="display: none;">
                        <label for="action">Forword To Seniour Authority</label>
                        <select name="seniour_auth_name" id="action_dra" class="form-control select2-hidden-accessible" data-plugin="select_hrm" data-placeholder="Select Gender" tabindex="-1" aria-hidden="true">
                            <option value="">Choose Acion</option>
                                                
                            <?php  
                            foreach(ALLOWED_OFFICER_ROLE_ID[$_SESSION['admin_role_id']] as $k=>$v){ 
                                echo '<option value="'.$k.'">'.$v.'</option>';
                               }?>
                           
                        </select>
                    </div>
                </div>
                                <script type="text/javascript">
    
                        $(document).ready(function(){
                            $('#action_dra').on('change', function() {

//                                alert('hiiii'); 
                            if($('#action_dra').val() == '6') 
                              {
                                $("#autho_grav").show();
                              }
                              else
                              {
                                $("#autho_grav").hide();
                              }
                            });
                        });
                </script>

                </script>


                <div class="col-md-6">
                    <div class="form-group">
                        <label for="remark_dra">Remark</label>
                        <textarea class="form-control dd_person"  id="remark_dra"  name="remark_dra" type="text" value=""  rows="4" cols="50"></textarea>
                    </div>
                </div>   



                <div class="card-footer" align="center" >
                    <input type="submit" name="submit" class="btn btn-primary " value="Save"></input>
                </div>
<!--###########################################-->
<?php echo form_close(); ?>
            </div>
        </div>
    </div>
    </section>
</div>

<script type="text/javascript">
   $(document).on('change', '#Ownership', function ()
   {
          });
  
   $("#xin-form")["submit"](function (d) {
       if ($("#action_dra").val() == "") {
           alert("Please select 'Action' field");
           $("#action_dra").focus();
           return false;
       }
 if ($("#remark_dra").val() == "") {
           alert("Please fill 'Remark' field");
           $("#remark_dra").focus();
           return false;
       }

     

       
       //-------------------------------------------------------------------------------------------------------------------------------
       
         var extension=$('#fileName2').val().replace(/^.*\./, '');
         if( btn =='Apply'){ 
             if(extension=='') {
            $("#fileName2").focus();
             alert("Please select fileName2"); $('#fileName2').val('')
           return false;
          
       }
   }
       if(extension !='' && extension!='pdf') {
            $("#fileName2").focus();
             alert("Please select pdf in fileName2"); $('#fileName2').val('')
           return false;
          
       }
        var fsize=$('#fileName2')[0].files[0].size;
       
               const file2 = Math.round((fsize / 1024));
       if( extension !='' && file >1024) {
            $("#fileName2").focus();
             alert("fileName2 should be less than 1Mb"); 
           return false;
          
       }
       
       //-----------------------------------------------------------------------------------------------------------------------------------------------
       
         var extension=$('#fileName3').val().replace(/^.*\./, '');
        if( btn =='Apply'){
            if(extension=='') {
            $("#fileName3").focus();
             alert("Please select fileName3"); $('#fileName1').val('')
           return false;
          
       }
   }
       if( extension !='' && extension!='pdf') {
            $("#fileName3").focus();
             alert("Please select pdf in fileName3"); $('#fileName3').val('')
           return false;
          
       }
        var fsize=$('#fileName3')[0].files[0].size;
       
               const file3 = Math.round((fsize / 1024));
       if( extension !='' && file >1024) {
            $("#fileName3").focus();
             alert("fileName3 should be less than 1Mb"); 
           return false;
          
       }
       
       //------------------------------------------------------------------------------------------------------------------------------------------------------
         var extension=$('#fileName4').val().replace(/^.*\./, '');
       
       if( btn =='Apply'){
           if(extension=='') {
            $("#fileName4").focus();
             alert("Please select fileName4"); $('#fileName4').val('')
           return false;
          
       }
   }
       if(extension !='' && extension!='pdf') {
            $("#fileName4").focus();
             alert("Please select pdf in fileName4"); $('#fileName4').val('')
           return false;
          
       }
        var fsize=$('#fileName4')[0].files[0].size;
       
               const file4 = Math.round((fsize / 1024));
       if(extension !='' &&  file >1024) {
            $("#fileName4").focus();
             alert("fileName4 should be less than 1Mb"); 
           return false;
          
       }
         function sure_to_submite() {
                       confirm("Are you sure!");
                       }
   
   
   });
   
   $(function () {
       $('.dd_state').change(function () {
           var state_id = $(this).val();
           var distric_name = $(this).data('distric_name');
           if (state_id != '') {
               $('#othstate').val('').hide();
               $.ajax({
                   type: "POST",
                   url: base_url + 'admin/location/get_city_by_state_id',
                   dataType: 'html',
                   data: {'state_id': state_id, 'csfr_token_name': csfr_token_value},
                   success: function (data) {
                       $('#district_' + distric_name).html(data);
                   }
               });
           } else {
               $('#state').val('').hide();
               $('#othstate').show();
           }
       });
   });
   $(document).on('click', '.show_hide_form', function () {
       let input_id = $(this).attr('id');
       let isChecked = $(this).is(':checked');
   
       if (isChecked) {
           $('#div_' + input_id).show();
       } else {
           $('#div_' + input_id).hide();
       }
   });
   $(document).ready(function () {
   
   
       $(".Print_preview").click(function () {
           alert("Handler for .click() called.");
           window.print();
       });
   })
</script>
<script type="text/javascript" src="<?= base_url() ?>assets/dist/js/jquery.collapsibleCheckboxTree.js"></script>