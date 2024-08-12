<!-- Content Wrapper. Contains page content -->

<link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/jquery.collapsibleCheckboxTree.css" type="text/css" />
<script type="text/javascript">
    jQuery(document).ready(function () {
        $('ul#example').collapsibleCheckboxTree();
    });
    
<script type="text/javascript">
                  $(function () {
                     $('input').blur(function () {                     
                        $(this).val(
                           $.trim($(this).val())
                        );
                     });
                  });
</script>

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
   .btn-primary{
   font-size: 14px;
   }
   .li_root{ float:left;
   width:20%
   }
   .fa-ul li ul li{ float:left;
   width:100%
   }
   .li_root ul li {
        margin-bottom: 10px;
    }
   .abc{
    font-weight: bold;
    font-size: 23px;
    color: red;
    padding-left: 478px;
    text-decoration: underline;
}
</style>
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="card card-default color-palette-bo">
            <div class="card-header">
                <div class="d-inline-block">
                    <h3 class="card-title"> <i class="fa fa-pencil"></i>
                        &nbsp; Add Consent Grade               
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
                    echo form_open(base_url('admin/consent_letter/edit_consent/' . $id), 'id="xin-form" class="form-horizontal" ');
                }
                ?> 
                <label class="abc">School/College/Institute Details</label>
             <hr style="1">
            <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="username" class="col-sm- control-label">School Registration No.(स्कूल पंजीकरण संख्या)*</label>
                            
                            <input type="text" name="school_registration_number" readonly value="<?= $admin['school_registration_number']; ?>" class="form-control" disabled id="school_registration_number" placeholder="">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="firstname" class="col-sm- control-label">School/College/Institute Name(स्कूल/कॉलेज/संस्थान का नाम)</label>
                            <div class="col-md-12">
                                <input type="text" name="school_name" readonly value="<?= $admin['school_name']; ?>"  class="form-control" disabled id="school_name" placeholder="">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="lastname" class="col-sm- control-label">Address(पता)</label>
                            <input type="text" name="address" readonly value="<?= $admin['address']; ?>" class="form-control" disabled id="address" placeholder="">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4" id="emai_superadmin">
                        <div class="form-group">
                            <label for="email" class="col-sm- control-label">Landmark (सीमाचिह्न)</label>
                            <input type="text" name="landmark" readonly  value="<?= $admin['landmark']; ?>"  class="form-control" disabled id="landmark" placeholder="">
                            <!-- <input type="text" class="form-control" disabled id="sup_mail" > -->
                        </div>
                    </div>
                    <div class="col-md-4" id="emai_all">
                        <div class="form-group">
                            <label for="email" class="col-sm- control-label"> District(जिला)</label>
                            <input type="text" name="district" readonly class="form-control" disabled id="district" value="<?= $admin['district']; ?>" >
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="mobile_no" class="col-sm- control-label">City(शहर)</label>
                            <input type="text" name="city" readonly value="<?= $admin['city']; ?>"  class="form-control" disabled id="city" placeholder="" >
                            
                        </div>
                    </div>
                </div>

                <div class="row">
                   <div class="col-md-4" id="all_user">
                        <div class="form-group">
                            <label for="mobile_no" class="col-sm- control-label">Principal Name(प्राचार्य का नाम)</label>
                            <input type="text" class="form-control" disabled name="principal_name" id="principal_name" value="<?= $admin['principal_name']; ?>" > 
                        </div>
                    </div>
                     <div class="col-md-4" id="all_user">
                        <div class="form-group">
                            <label for="mobile_no" class="col-sm- control-label">Mobile No.(मोबाइल नंबर)</label>
                            <input type="text" class="form-control" disabled name="pri_mobile" id="pri_mobile" value="<?= $admin['pri_mobile']; ?>" > 
                        </div>
                    </div>
                    <div class="col-md-4" >
                        <div class="form-group">
                            <label for="state" class="col-md-12 control-label"> Email ID(ईमेल आईडी) </label>      
                            <input type="text"  name="email" readonly value="<?php echo ($admin['email']); ?>"  class="form-control" disabled id="email" placeholder="">
                        </div>
                    </div>
                    <div class="col-md-4" >
                        <div class="form-group  ">
                            <label for="district" class="col-md-12 control-label">Whats App No.(व्हाट्सएप नंबर)</label>
                            <input type="text"  name="whats_num" value="<?php echo ($admin['whats_num']); ?>"  class="form-control" disabled id="whats_num" placeholder="">
                        </div>
                    </div>
                 
              <!--   </div>
                <div class="row"> -->
                   <div class="col-md-4" id="all_user">
                        <div class="form-group">
                            <label for="mobile_no" class="col-sm- control-label">Centre Superintendent Name (केंद्र अधीक्षक का नाम)</label>
                            <input type="text" class="form-control" disabled name="super_name" id="super_name" value="<?= $admin['super_name']; ?>" > 
                        </div>
                    </div>
                     <div class="col-md-4" id="all_user">
                        <div class="form-group">
                            <label for="mobile_no" class="col-sm- control-label">Designation (पदनाम)</label>
                            <input type="text" class="form-control" disabled name="super_design" id="super_design" value="<?= $admin['super_design']; ?>" > 
                        </div>
                    </div>
                    <div class="col-md-4" >
                        <div class="form-group">
                            <label for="state" class="col-md-12 control-label">Mobile No. (मोबाइल नंबर)</label>      
                            <input type="text"  name="super_mobile" readonly value="<?php echo ($admin['super_mobile']); ?>"  class="form-control" disabled id="super_mobile" placeholder="">
                        </div>
                    </div>
                    <div class="col-md-4" >
                        <div class="form-group  ">
                            <label for="district" class="col-md-12 control-label">Email ID (ईमेल आईडी)</label>
                            <input type="text"  name="super_email" value="<?php echo ($admin['super_email']); ?>"  class="form-control" disabled id="super_email" placeholder="">
                        </div>
                    </div>
                    <div class="col-md-4" >
                        <div class="form-group  ">
                            <label for="district" class="col-md-12 control-label">Whats App No. (व्हाट्सएप नंबर)</label>
                            <input type="text"  name="super_whatspp" value="<?php echo ($admin['super_whatspp']); ?>"  class="form-control" disabled id="super_whatspp" placeholder="">
                        </div>
                    </div>
                 
                </div>

                 <hr style="1">
      <label class="abc"> Consent Letter</label>
       <hr style="1">
            <div class="row">
              
            <div class="col-md-4" style="display:block;" >
                  <div class="form-group">
                     <label for="registration"  control-label>Total Number of Class</label>
                     <input type="text" name="no_room" placeholder="Total Number of Class"  class="form-control" disabled id="no_room" value="<?= $admin['no_room']; ?>" >
                    </div>
            </div>
            <div class="col-md-4" style="display:block;" >
                  <div class="form-group">
                     <label for="registration"  control-label">Class Sitting Capacity</label>
                     <input type="text" name="no_sheet" placeholder="Class Sitting Capacity"  class="form-control" disabled id="no_sheet"  value="<?= $admin['no_sheet']; ?>" >
                    </div>
            </div>
            <div class="col-md-4" style="display:none;" >
                  <div class="form-group">
                     <label for="registration"  control-label">Maximum Number of Student</label>
                     <input type="text" name="max_num_student" placeholder="Maximum Number of Student"  class="form-control" disabled id="max_num_student" value="<?= $admin['total_class_number']; ?>" >
                    </div>
            </div>
           
            </div>
            <div class="row">
               <div class="col-md-4">
                  <div class="form-group">
                     <label for="Address1">Is Furniture available?<span style="color:red;font-weight:bold">*</span></label>
                     <select class="form-control" disabled name="furniture_avail"  maxlength="60" placeholder="Is Furniture available?"  id="furniture_avail">
                        <option >Select</option>
                        
                         <option <?php echo ($admin['furniture_avail'] == 'Yes')?"selected":"" ?> >Yes</option> 
                         <option <?php echo ($admin['furniture_avail'] == 'No')?"selected":"" ?> >NO</option>
                        
                     </select>
                     
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group">
                     <label for="Address2">Is Electricity available?</label>
                  <select class="form-control" disabled name="elec_avail"  maxlength="60" placeholder="Is Furniture available?"  id="elec_avail">
                        <option >Select</option>
                         <option <?php echo ($admin['elec_avail'] == 'Yes')?"selected":"" ?> >Yes</option> 
                         <option <?php echo ($admin['elec_avail'] == 'No')?"selected":"" ?> >NO</option>
                     </select>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group">
                     <label for="City" >Is Generator available?</label>
                     
                     <select class="form-control" disabled name="gen_avai"  maxlength="60" placeholder="Is Furniture available?"  id="gen_avai">
                        <option >Select</option>
                         <option <?php echo ($admin['gen_avai'] == 'Yes')?"selected":"" ?> >Yes</option> 
                         <option <?php echo ($admin['gen_avai'] == 'No')?"selected":"" ?> >NO</option>
                     </select>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-4">
                  <div class="form-group">
                     <label for="Address1">Is distinct washroom available for Boys and Girl?<span style="color:red;font-weight:bold">*</span></label>
                  
                      <select class="form-control" disabled name="wash_rrom"  maxlength="60" placeholder="Is Furniture available?"  id="wash_rrom">
                        <option >Select</option>
                         <option <?php echo ($admin['wash_rrom'] == 'Yes')?"selected":"" ?> >Yes</option> 
                         <option <?php echo ($admin['wash_rrom'] == 'No')?"selected":"" ?> >NO</option>
                     </select>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group">
                     <label for="Address2">Is ClockRoom available?</label>
                     <select class="form-control" disabled name="clock_room"  maxlength="60" placeholder="Is Furniture available?"  id="clock_room">
                        <option >Select</option>
                         <option <?php echo ($admin['clock_room'] == 'Yes')?"selected":"" ?> >Yes</option> 
                         <option <?php echo ($admin['clock_room'] == 'No')?"selected":"" ?> >NO</option>
                     </select>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group">
                     <label for="City" >Is Vehicle Parking available?</label>
                    
                      <select class="form-control" disabled name="clock_room"  maxlength="60" placeholder="Is Furniture available?"  id="clock_room">
                        <option >Select</option>
                         <option <?php echo ($admin['clock_room'] == 'Yes')?"selected":"" ?> >Yes</option> 
                         <option <?php echo ($admin['clock_room'] == 'No')?"selected":"" ?> >NO</option>
                     </select>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-4">
                  <div class="form-group">
                     <label for="Address1">Is number of staff sufficient?<span style="color:red;font-weight:bold">*</span></label>
               <select class="form-control" disabled name="staff_suffi"  maxlength="60" placeholder="Is Furniture available?"  id="staff_suffi">
                        <option >Select</option>
                         <option <?php echo ($admin['staff_suffi'] == 'Yes')?"selected":"" ?> >Yes</option> 
                         <option <?php echo ($admin['staff_suffi'] == 'No')?"selected":"" ?> >NO</option>
                     </select>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group">
                     <label for="Address2">Is any exam of UKPSC held?</label>
                  <select class="form-control" disabled name="ukpsc_exxma"  maxlength="60" placeholder="Is Furniture available?"  id="ukpsc_exxma">
                        <option >Select</option>
                         <option <?php echo ($admin['ukpsc_exxma'] == 'Yes')?"selected":"" ?> >Yes</option> 
                         <option <?php echo ($admin['ukpsc_exxma'] == 'No')?"selected":"" ?> >NO</option>
                     </select>
                  </div>
               </div>
               
               <div class="col-md-4">
                  <div class="form-group">
                     <label for="City" >DEBAR</label>
                     <input class="form-control" disabled id="debar" maxlength="60" placeholder="DEBAR"  name="debar" type="text" value="<?= $admin['total_class_number']; ?>" >
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-4">
                  <div class="form-group">
                     <label for="Address1">Brass Seal <span style="color:red;font-weight:bold">*</span></label>
                     <input class="form-control" disabled name="bras_Seal"  maxlength="60" placeholder="Brass Seal"  id="bras_Seal"  type="text" value="<?= $admin['total_class_number']; ?>" >
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group">
                     <label for="Address2">Any Other Suggetions?</label>
                     
                     <select class="form-control" disabled name="suggetions"  maxlength="60" placeholder="Is Furniture available?"  id="suggetions">
                        <option >Select</option>
                         <option <?php echo ($admin['suggetions'] == 'Yes')?"selected":"" ?> >Yes</option> 
                         <option <?php echo ($admin['suggetions'] == 'No')?"selected":"" ?> >NO</option>
                     </select>
                  </div>
               </div>
               <div class="col-md-4" style="display:block;">
                  <div class="form-group">
                     <label >Any Other Suggetions?</label>
                   <textarea class="form-control" disabled id="yes_sugge" name="yes_sugge" rows="4" cols="50"></textarea>
                  </div>
               </div>
              
            </div>

            <hr style="1">
            <label class="abc"> Online Payment Details</label>
             <hr style="1">
            <div class="row">
               <div class="col-md-4">
                  <div class="form-group">
                     <label for="Address1">Account Holder Name<span style="color:red;font-weight:bold">*</span></label>
                     <input class="form-control" disabled name="acc_holder_name"  maxlength="60" placeholder="Account Holder Name"  id="acc_holder_name"  type="text" value="<?= $admin['acc_holder_name']; ?>"  >
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group">
                     <label for="Address2">
Bank Name</label>
                     <input class="form-control" disabled  name="ban_name" maxlength="60" placeholder="Exam Center Name(अंग्रेजी मे)" id="ban_name" type="text" value="<?= $admin['ban_name']; ?>"  >
                  </div>
               </div> 
               <div class="col-md-4">
                  <div class="form-group">
                     <label for="Address2">
Bank Branch Name</label>
                     <input class="form-control" disabled  name="branch_name" maxlength="60" placeholder="Account Holder Name(केवल कैपिटल लेटर)" id="branch_name" type="text" value="<?= $admin['branch_name']; ?>"  >
                  </div>
               </div>
            </div> 
            <div class="row">
               <div class="col-md-4">
                  <div class="form-group">
                     <label for="Address1">
Bank IFSC Code<span style="color:red;font-weight:bold">*</span></label>
                     <input class="form-control" disabled name="ifsc"  maxlength="60" placeholder="Bank Name(केवल कैपिटल लेटर)"  id="ifsc"  type="text" value="<?= $admin['ifsc']; ?>"  >
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group">
                     <label for="Address2">
Account Number</label>
                     <input class="form-control" disabled  name="acc_num" maxlength="60" placeholder="Branch Name/Place" id="acc_num" type="text" value="<?= $admin['acc_num']; ?>"  >
                  </div>
               </div> 
               <div class="col-md-4">
                  <div class="form-group">
                     <label for="Address2">
                        Confirm Account Number</label>
                     <input class="form-control" disabled  name="acc_num_con" maxlength="60" placeholder="IFSC Code" id="acc_num_con" type="text" value="<?= $admin['acc_num_con']; ?>"  >
                  </div>
               </div>
              
            </div>
            <hr style="1">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="">
                            Name
                        </label>
                        <input class="form-control" disabled id="name_fill" type="text" readonly>
                  </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="">
                            Date
                        </label>
                        <input class="form-control" disabled type="text" name="date" readonly placeholder="<?php echo date("d/m/Y h:s:a"); ?>">
                  </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="">
                            Place
                        </label>
                        <input class="form-control" disabled name="place" type="text" placeholder="Place">
                  </div>
                </div>
            </div>
            
                            <?php
                            IF ($_SESSION['admin_role_id'] == 6) {
                                ?>
                    <div class="card-footer" align="center" >
                        <input type="submit"  onclick="sure_to_submite()" name="submit" class="btn btn-primary " value="Save as Draft"></input>
                        <input type="submit"  onclick="sure_to_submite()" name="submit" class="btn btn-primary " value="Apply"></input>
                        <input type="button"  onclick="sure_to_submite()" class="btn btn-primary " value="Back"></input>
                        <input type="button" class="btn btn-primary  Print_preview" value="Print_preview"></input>
                    </div> <?php echo form_close(); ?> <?php } ?>



            <hr class="style1">
            <label class="abc">Only For Official Use</label>
            <hr class="style1">
           

                <?php echo form_open(base_url('admin/consent_letter/add_remark_concent/' . $id), 'id="xin-form" class="form-horizontal" ') ?> 

                <?php
                IF ($_SESSION['admin_role_id'] == 5) {
                    ?>
                    <div class="row">
                    <div class="col-md-12 mb-3">
                    <label for="employee_id" style="font-size: 15px;"> Admin Action :</label>
                    
                    <input type="hidden" name="con_id"  class="form-control" id="con_id" value="<?php echo $id; ?>" >
                    <input type="hidden" name="admin_role_id"  class="form-control" id="admin_role_id" value="<?php echo $_SESSION['admin_role_id']; ?>" >
                    </div>
                    </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="action">Ranking</label>
                           <!--  <select name="ranking_admin" id="ranking_admin" class="form-control select2-hidden-accessible" data-plugin="select_hrm"  tabindex="-1" aria-hidden="true">
                                <option value="0">Choose Ranking</option>
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="C">C</option>
                                <option value="Black Listed">Black Listed</option>

                            </select> -->
                             <select name="action_dra" id="action_dra" class="form-control select2-hidden-accessible" data-plugin="select_hrm" data-placeholder="Select Gender" tabindex="-1" aria-hidden="true">
                            <option value="0">Choose Acion</option>
                            
                            <?php  
                            foreach(ALLOWED_FILE_MOVEMENT_ROLE_ID[$_SESSION['admin_role_id']] as $k=>$v){ 
                                echo '<option value="'.$k.'">'.$v.'</option>';
                               }?>  
                           
                        </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="action">Status</label>
                            <select name="status_admin" id="status_admin" class="form-control" >
                                <option value="">Choose Status</option>
                                <option value="Active">Active</option>
                                <option value="In-Active">In-Active</option>
  
                            </select>
                        </div>
                    </div>
                     <div class="col-md-4">
                        <div class="form-group">
                            <label for="action">Date</label>
                           <input type="date" name="admin_date" class="form-control" name="status_admin">
                        </div>
                    </div>
                </div>
                <?php } ?>
                <?php
                IF ($_SESSION['admin_role_id'] == 3) {
                    ?>

                <?php } ?>
                <?php
                IF ($_SESSION['admin_role_id'] == 4) {
                    ?>

                <?php } ?>

                <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="remark_dra">Remark</label>
                        <textarea class="form-control dd_person"  id="remard_admin"  name="remard_admin" type="text" value=""  rows="3"></textarea>
                    </div>
                </div> 
                </div> 
                </div> 
                <div class="card-footer" align="center" >
                    <input type="submit" name="submit" class="btn btn-primary " value="Save"></input>
                </div>
                
<?php echo form_close(); ?>
        </div>
</div>
</section>
</div>
