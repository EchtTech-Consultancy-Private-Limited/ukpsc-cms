<!-- Content Wrapper. Contains page content -->
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
   .abc{
    font-weight: bold;
    font-size: 23px;
    color: red;
    padding-left: 478px;
    text-decoration: underline;
    }
</style>

<script type="text/javascript">
                  $(function () {
                     $('input').blur(function () {                     
                        $(this).val(
                           $.trim($(this).val())
                        );
                     });
                  });
</script>

<div class="content-wrapper">
   <!-- Main content -->
   <section class="content">
      <div class="card card-default color-palette-bo">
         <div class="card-header">
            <div class="d-inline-block">
               <h3 class="card-title"> <i class="fa fa-pencil"></i>
                  &nbsp; Edit Consent Letter           
               </h3>
            </div>
            <!--          <div class="d-inline-block float-right">
               <a href="<?= base_url('admin/profile/change_pwd'); ?>" class="btn btn-success"><i class="fa fa-list"></i> <?= trans('change_password') ?></a>
               </div>-->
         </div>
         <div class="card-body">
            <!-- For Messages -->
            <?php $this->load->view('admin/includes/_messages.php') ?>
            <?php echo form_open_multipart(base_url('admin/consent_letter/edit_consent/' . ($id)), 'id="xin-form" class="form-horizontal" ') ?> 
            <label class="abc">School/College/Institute Details</label>
             <hr style="1">
            <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="username" class="col-sm- control-label">School Registration No.(स्कूल पंजीकरण संख्या)*</label>
                            
                            <input type="text" name="school_registration_number" readonly value="<?= $admin['school_registration_number']; ?>" class="form-control" id="school_registration_number" placeholder="">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="firstname" class="col-sm- control-label">School/College/Institute Name(स्कूल/कॉलेज/संस्थान का नाम)</label>
                            <div class="col-md-12">
                                <input type="text" name="school_name" readonly value="<?= $admin['school_name']; ?>"  class="form-control" id="school_name" placeholder="">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="lastname" class="col-sm- control-label">Address(पता)</label>
                            <input type="text" name="address" readonly value="<?= $admin['address']; ?>" class="form-control" id="address" placeholder="">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4" id="emai_superadmin">
                        <div class="form-group">
                            <label for="email" class="col-sm- control-label">Landmark (सीमाचिह्न)</label>
                            <input type="landmark" name="landmark" readonly  value="<?= $admin['landmark']; ?>"  class="form-control" id="landmark" placeholder="">
                            <!-- <input type="text" class="form-control" id="sup_mail" > -->
                        </div>
                    </div>
                    <div class="col-md-4" id="emai_all">
                        <div class="form-group">
                            <label for="email" class="col-sm- control-label"> District(जिला)</label>
                            <input type="text" name="district" readonly class="form-control" id="district" value="<?= $admin['district']; ?>" >
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="mobile_no" class="col-sm- control-label">City(शहर)</label>
                            <input type="text" name="city" readonly value="<?= $admin['city']; ?>"  class="form-control" id="city" placeholder="" >
                            
                        </div>
                    </div>
                </div>

                <div class="row">
                   <div class="col-md-4" id="all_user">
                        <div class="form-group">
                            <label for="mobile_no" class="col-sm- control-label">Principal Name(प्राचार्य का नाम)</label>
                            <input type="text" class="form-control" name="principal_name" id="principal_name" value="<?= $admin['principal_name']; ?>" > 
                        </div>
                    </div>
                     <div class="col-md-4" id="all_user">
                        <div class="form-group">
                            <label for="mobile_no" class="col-sm- control-label">Mobile No.(मोबाइल नंबर)</label>
                            <input type="text" class="form-control" name="pri_mobile" id="pri_mobile" value="<?= $admin['pri_mobile']; ?>" > 
                        </div>
                    </div>
                    <div class="col-md-4" >
                        <div class="form-group">
                            <label for="state" class="col-md-12 control-label"> Email ID(ईमेल आईडी) </label>      
                            <input type="text"  name="email" readonly value="<?php echo ($admin['email']); ?>"  class="form-control" id="email" placeholder="">
                        </div>
                    </div>
                    <div class="col-md-4" >
                        <div class="form-group  ">
                            <label for="district" class="col-md-12 control-label">Whats App No.(व्हाट्सएप नंबर)</label>
                            <input type="text"  name="whats_num" value="<?php echo ($admin['whats_num']); ?>"  class="form-control" id="whats_num" placeholder="">
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
                     <input type="text" name="total_class_number" placeholder="Total Number of Class"  class="form-control" id="total_class_number" value="<?= $admin['total_class_number']; ?>" >
                    </div>
            </div>
            <div class="col-md-4" style="display:block;" >
                  <div class="form-group">
                     <label for="registration"  control-label">Class Sitting Capacity</label>
                     <input type="text" name="class_sitting_capacity" placeholder="Class Sitting Capacity"  class="form-control" id="class_sitting_capacity"  value="<?= $admin['total_class_number']; ?>" >
                    </div>
            </div>
            <div class="col-md-4" style="display:block;" >
                  <div class="form-group">
                     <label for="registration"  control-label">Maximum Number of Student</label>
                     <input type="text" name="max_num_student" placeholder="Maximum Number of Student"  class="form-control" id="max_num_student" value="<?= $admin['total_class_number']; ?>" >
                    </div>
            </div>
           
            </div>
            <div class="row">
               <div class="col-md-4">
                  <div class="form-group">
                     <label for="Address1">Is Furniture available?<span style="color:red;font-weight:bold">*</span></label>
                     <select class="form-control" name="furniture_avail"  maxlength="60" placeholder="Is Furniture available?"  id="furniture_avail">
                        <option >Select</option>
                        
                         <option <?php echo ($admin['furniture_avail'] == 'Yes')?"selected":"" ?> >Yes</option> 
                         <option <?php echo ($admin['furniture_avail'] == 'No')?"selected":"" ?> >NO</option>
                        
                     </select>
                     
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group">
                     <label for="Address2">Is Electricity available?</label>
                  <select class="form-control" name="elec_avail"  maxlength="60" placeholder="Is Furniture available?"  id="elec_avail">
                        <option >Select</option>
                         <option <?php echo ($admin['elec_avail'] == 'Yes')?"selected":"" ?> >Yes</option> 
                         <option <?php echo ($admin['elec_avail'] == 'No')?"selected":"" ?> >NO</option>
                     </select>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group">
                     <label for="City" >Is Generator available?</label>
                     
                     <select class="form-control" name="gen_avai"  maxlength="60" placeholder="Is Furniture available?"  id="gen_avai">
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
                  
                      <select class="form-control" name="wash_rrom"  maxlength="60" placeholder="Is Furniture available?"  id="wash_rrom">
                        <option >Select</option>
                         <option <?php echo ($admin['wash_rrom'] == 'Yes')?"selected":"" ?> >Yes</option> 
                         <option <?php echo ($admin['wash_rrom'] == 'No')?"selected":"" ?> >NO</option>
                     </select>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group">
                     <label for="Address2">Is ClockRoom available?</label>
                     <select class="form-control" name="clock_room"  maxlength="60" placeholder="Is Furniture available?"  id="clock_room">
                        <option >Select</option>
                         <option <?php echo ($admin['clock_room'] == 'Yes')?"selected":"" ?> >Yes</option> 
                         <option <?php echo ($admin['clock_room'] == 'No')?"selected":"" ?> >NO</option>
                     </select>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group">
                     <label for="City" >Is Vehicle Parking available?</label>
                    
                      <select class="form-control" name="clock_room"  maxlength="60" placeholder="Is Furniture available?"  id="clock_room">
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
               <select class="form-control" name="staff_suffi"  maxlength="60" placeholder="Is Furniture available?"  id="staff_suffi">
                        <option >Select</option>
                         <option <?php echo ($admin['staff_suffi'] == 'Yes')?"selected":"" ?> >Yes</option> 
                         <option <?php echo ($admin['staff_suffi'] == 'No')?"selected":"" ?> >NO</option>
                     </select>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group">
                     <label for="Address2">Is any exam of UKPSC held?</label>
                  <select class="form-control" name="ukpsc_exxma"  maxlength="60" placeholder="Is Furniture available?"  id="ukpsc_exxma">
                        <option >Select</option>
                         <option <?php echo ($admin['ukpsc_exxma'] == 'Yes')?"selected":"" ?> >Yes</option> 
                         <option <?php echo ($admin['ukpsc_exxma'] == 'No')?"selected":"" ?> >NO</option>
                     </select>
                  </div>
               </div>
               
               <div class="col-md-4">
                  <div class="form-group">
                     <label for="City" >DEBAR</label>
                     <input class="form-control" id="debar" maxlength="60" placeholder="DEBAR"  name="debar" type="text" value="" >
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-4">
                  <div class="form-group">
                     <label for="Address1">Brass Seal <span style="color:red;font-weight:bold">*</span></label>
                     <input class="form-control" name="bras_Seal"  maxlength="60" placeholder="Brass Seal"  id="bras_Seal"  type="text" value="" >
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group">
                     <label for="Address2">Any Other Suggetions?</label>
                     
                     <select class="form-control" name="suggetions"  maxlength="60" placeholder="Is Furniture available?"  id="suggetions">
                        <option >Select</option>
                         <option <?php echo ($admin['suggetions'] == 'Yes')?"selected":"" ?> >Yes</option> 
                         <option <?php echo ($admin['suggetions'] == 'No')?"selected":"" ?> >NO</option>
                     </select>
                  </div>
               </div>
               <div class="col-md-4" style="display:block;">
                  <div class="form-group">
                     <label >Any Other Suggetions?</label>
                   <textarea class="form-control" id="yes_sugge" name="yes_sugge" rows="4" cols="50"></textarea>
                  </div>
               </div>
             <!--   <script>
                  
                  $("#suggetions option:selected").ready(function(){
                     var divID = $(this).val();
                    alert(divID);
                      if(a== 'Yes'){
                        alert("hi");
                        $('#yes_sugge').show();
                      }else{
                        $('#yes_sugge').hide();
                      }      
                   
                  });
               </script> -->
            </div>

            <hr style="1">
            <label class="abc"> Online Payment Details</label>
             <hr style="1">
            <div class="row">
               <div class="col-md-4">
                  <div class="form-group">
                     <label for="Address1">Exam Center Name(हिंदी मे) <span style="color:red;font-weight:bold">*</span></label>
                     <input class="form-control" name="exam_center_hindi"  maxlength="60" placeholder="Exam Center Name(हिंदी मे) "  id="exam_center_hindi"  type="text" value="" >
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group">
                     <label for="Address2">Exam Center Name(अंग्रेजी मे) </label>
                     <input class="form-control"  name="exam_center_eng" maxlength="60" placeholder="Exam Center Name(अंग्रेजी मे)" id="exam_center_eng" type="text" value="" >
                  </div>
               </div> 
               <div class="col-md-4">
                  <div class="form-group">
                     <label for="Address2">Account Holder Name(केवल कैपिटल लेटर)</label>
                     <input class="form-control"  name="acc_holder_name" maxlength="60" placeholder="Account Holder Name(केवल कैपिटल लेटर)" id="acc_holder_name" type="text" value="" >
                  </div>
               </div>
            </div> 
            <div class="row">
               <div class="col-md-4">
                  <div class="form-group">
                     <label for="Address1">Bank Name(केवल कैपिटल लेटर) <span style="color:red;font-weight:bold">*</span></label>
                     <input class="form-control" name="ban_name"  maxlength="60" placeholder="Bank Name(केवल कैपिटल लेटर)"  id="ban_name"  type="text" value="" >
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group">
                     <label for="Address2">Branch Name/Place </label>
                     <input class="form-control"  name="branch_name" maxlength="60" placeholder="Branch Name/Place" id="branch_name" type="text" value="" >
                  </div>
               </div> 
               <div class="col-md-4">
                  <div class="form-group">
                     <label for="Address2">IFSC Code</label>
                     <input class="form-control"  name="ifsc" maxlength="60" placeholder="IFSC Code" id="ifsc" type="text" value="" >
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group">
                     <label for="Address2">Account Number</label>
                     <input class="form-control"  name="acc_num" maxlength="60" placeholder="Account Number" id="acc_num" type="text" value="" >
                  </div>
               </div>
            </div>
            <hr class="style1">
            <label for="employee_id">File Upload <span style="color:red; font-weight: bold;">*</span></label>
            <div class="row">
               <div class="form-group  col-sm-2">
                                             <label>Upload Signature</label>
                     <input type="file"  class="form-control" name="fileName1" id="fileName1" data-file_detail="file_detail1" onchange="get_detail(this);" />  
                     
               </div>
          
               <div class="form-group  col-sm-2">
                  <label>Mohar</label>
                  <input type="file"  class="form-control" name="fileName2" id="fileName2" data-file_detail="file_detail2"onchange="get_detail(this);" />   
                 
               </div>         
            </div>
            <hr style="1">
            <div class="row">
               <table>
                  <thead>
                  </thead>
                  <tbody>
                     <tr>
                        <td>Name</td>
                        <td> <input class="form-control" id="name_fill" type="text" readonly </td>
                     </tr> </br> </br> </br> </br><tr>
                        <td>Date</td>
                        <td> <input class="form-control" type="text" name="date" readonly placeholder="<?php echo date("d/m/Y h:s:a"); ?>"  </td>
                     </tr> </br> </br> </br> </br>
                     <tr>
                        <td>Place</td>
                        <td> <input class="form-control" name="place" type="text" placeholder="Place" </td>
                     </tr>
                  </tbody>
               </table>
            </div>
            </div>
            <div class="card-footer" align="center" >
               <input type="submit"  onclick="sure_to_submite()" name="submit" class="btn btn-primary " value="Save as Draft"></input>
               <input type="submit"  onclick="sure_to_submite()" name="submit" class="btn btn-primary " value="Apply"></input>
               <input type="button"  onclick="sure_to_submite()" class="btn btn-primary " value="Back"></input>
               <input type="button" class="btn btn-primary  Print_preview" value="Print_preview"></input>
            </div>
            <?php echo form_close(); ?>
         </div>
         <!-- /.box-body -->
      </div>
   </section>
</div>

<script type="text/javascript" src="<?= base_url() ?>assets/dist/js/jquery.collapsibleCheckboxTree.js"></script>