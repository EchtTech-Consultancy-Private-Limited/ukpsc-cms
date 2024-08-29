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
                  &nbsp; Consent Letter Form <br>सहमति पत्र प्रपत्र        
               </h3>
            </div>
            <!--          <div class="d-inline-block float-right">
               <a href="<?= base_url('admin/profile/change_pwd'); ?>" class="btn btn-success"><i class="fa fa-list"></i> <?= trans('change_password') ?></a>
               </div>-->
         </div>
        <div class="card-body">
            <!-- For Messages -->
            <?php $this->load->view('admin/includes/_messages.php') ?>
            <?php echo form_open_multipart(base_url('admin/certificate/edit_permanent/' . ($id)), 'id="xin-form" class="form-horizontal" ') ?> 
            <label class="abc">School/College/University Details<br> स्कूल/कॉलेज/विश्वविद्यालय विवरण</label>
             <hr style="1">
            <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="username" class="col-sm- control-label">School/College/University Registration No.<br>(स्कूल/कॉलेज/विश्वविद्यालय पंजीकरण संख्या)*</label>
                            
                            <input type="text" name="school_registration_number" readonly value="<?= $admin['school_registration_number']; ?>" class="form-control" disabled id="school_registration_number" placeholder="">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="firstname" class="col-sm- control-label">School/College/University Name <br>(स्कूल/कॉलेज/विश्वविद्यालय का नाम)</label>
                            <div class="col-md-12">
                                <input type="text" name="school_name" readonly value="<?= $admin['school_name']; ?>"  class="form-control" disabled id="school_name" placeholder="">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="lastname" class="col-sm- control-label">Address<br>(स्कूल/कॉलेज/विश्वविद्यालय पता)</label>
                            <input type="text" name="address" readonly value="<?= $admin['address']; ?>" class="form-control" disabled id="address" placeholder="">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4" id="emai_superadmin">
                        <div class="form-group">
                            <label for="email" class="col-sm- control-label">Landmark <br>(सीमाचिह्न)</label>
                            <input type="landmark" name="landmark" readonly  value="<?= $admin['landmark']; ?>"  class="form-control" disabled id="landmark" placeholder="">
                            <!-- <input type="text" class="form-control" disabled id="sup_mail" > -->
                        </div>
                    </div>
                    <div class="col-md-4" id="emai_all">
                        <div class="form-group">
                            <label for="email" class="col-sm- control-label"> District<br>(जिला)</label>
                            <input type="text" name="district" readonly class="form-control" disabled id="district" value="<?= $admin['district']; ?>" >
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="mobile_no" class="col-sm- control-label">City<br>(शहर)</label>
                            <input type="text" name="city" readonly value="<?= $admin['city']; ?>"  class="form-control" disabled id="city" placeholder="" >
                            
                        </div>
                    </div>
                </div>
<label class="abc">Principal Details<br>प्रधानाचार्य का विवरण</label>
				<hr style="1">
                <div class="row">
				
                   <div class="col-md-4" id="all_user">
                        <div class="form-group">
                            <label for="mobile_no" class="col-sm- control-label">Principal Name<br>(प्रधानाचार्य का नाम)</label>
                            <input type="text" class="form-control" disabled name="principal_name" id="principal_name" value="<?= $admin['principal_name']; ?>" > 
                        </div>
                    </div>
                     <div class="col-md-4" id="all_user">
                        <div class="form-group">
                            <label for="mobile_no" class="col-sm- control-label">Mobile No.<br>(मोबाइल नंबर)</label>
                            <input type="text" class="form-control" disabled name="pri_mobile" id="pri_mobile" value="<?= $admin['pri_mobile']; ?>" > 
                        </div>
                    </div>
                    <div class="col-md-4" >
                        <div class="form-group">
                            <label for="state" class="col-md-12 control-label"> Email ID<br>(ईमेल आईडी) </label>      
                            <input type="text"  name="email" readonly value="<?php echo ($admin['email']); ?>"  class="form-control" disabled id="email" placeholder="">
                        </div>
                    </div>
                    <div class="col-md-4" >
                        <div class="form-group  ">
                            <label for="district" class="col-md-12 control-label">Whats App No.<br>(व्हाट्सएप नंबर)</label>
                            <input type="text"  name="whats_num" value="<?php echo ($admin['whats_num']); ?>"  class="form-control" disabled id="whats_num" placeholder="">
                        </div>
                    </div>
                 
                </div>
				<label class="abc">Centre Superintendent Details<br>केंद्र अधीक्षक का विवरण</label>
				<hr style="1">
                <div class="row"> 
				
                   <div class="col-md-4" id="all_user">
                        <div class="form-group">
                            <label for="mobile_no" class="col-sm- control-label">Centre Superintendent Name <br>(केंद्र अधीक्षक का नाम)</label>
                            <input type="text" class="form-control" disabled name="super_name" id="super_name" value="<?= $admin['super_name']; ?>" > 
                        </div>
                    </div>
                     <div class="col-md-4" id="all_user">
                        <div class="form-group">
                            <label for="mobile_no" class="col-sm- control-label">Designation<br> (पदनाम)</label>
                            <input type="text" class="form-control" disabled name="super_design" id="super_design" value="<?= $admin['super_design']; ?>" > 
                        </div>
                    </div>
                    <div class="col-md-4" >
                        <div class="form-group">
                            <label for="state" class="col-md-12 control-label">Mobile No.<br> (मोबाइल नंबर)</label>      
                            <input type="text"  name="super_mobile" readonly value="<?php echo ($admin['super_mobile']); ?>"  class="form-control" disabled id="super_mobile" placeholder="">
                        </div>
                    </div>
                    <div class="col-md-4" >
                        <div class="form-group  ">
                            <label for="district" class="col-md-12 control-label">Email ID<br> (ईमेल आईडी)</label>
                            <input type="text"  name="super_email" value="<?php echo ($admin['super_email']); ?>"  class="form-control" disabled id="super_email" placeholder="">
                        </div>
                    </div>
                    <div class="col-md-4" >
                        <div class="form-group  ">
                            <label for="district" class="col-md-12 control-label">Whats App No.<br> (व्हाट्सएप नंबर)</label>
                            <input type="text"  name="super_whatspp" value="<?php echo ($admin['super_whatspp']); ?>"  class="form-control" disabled id="super_whatspp" placeholder="">
                        </div>
                    </div>
                 
                </div>

                 <hr style="1">
      <label class="abc"> School/College/University Infrastructure  Details<br>स्कूल/कॉलेज/विश्वविद्यालय के बुनियादी ढांचे का विवरण</label>
       <hr style="1">
            <div class="row">
              
            <div class="col-md-4" style="display:block;" >
                  <div class="form-group">
                     <label for="registration"  control-label>Total Number of room<br>कक्षा की कुल संख्या</label>
                     <input type="text" name="no_room" placeholder="Total Number of Class"  class="form-control" disabled id="no_room" value="<?= $admin['no_room']; ?>" >
                    </div>
            </div>
            <div class="col-md-4" style="display:block;" >
                  <div class="form-group">
                     <label for="registration"  control-label">Number of seats for candidates in each room.<br>प्रत्येक कक्ष में अभ्यर्थियों के बैठने की संख्या</label>
                     <input type="text" name="no_sheet" placeholder="Class Sitting Capacity"  class="form-control" disabled id="no_sheet"  value="<?= $admin['no_sheet']; ?>" >
                    </div>
            </div>
            <div class="col-md-4" style="" >
                  <div class="form-group">
                     <label for="registration"  control-label">Maximum number of candidates can be allocated in the center.<br>केन्द्र में आबंटित किये जा सकने वाले अधिकतम् अभ्यर्थियों की संख्या</label>
                     <input type="text" name="max_num_student" placeholder="Maximum Number of Student"  class="form-control" disabled id="max_num_student" value="<?= $admin['total_class_number']; ?>" >
                    </div>
            </div>
           
            </div>
            <div class="row">
               <div class="col-md-4">
                  <div class="form-group">
                     <label for="Address1">Is there sufficient furniture in the rooms for the candidates?<br>क्या अभ्यर्थियों हेतु कक्षों में फर्नीचर पर्याप्त है?<span style="color:red;font-weight:bold">*</span></label>
                     <select class="form-control" disabled name="furniture_avail"  maxlength="60" placeholder="Is Furniture available?"  id="furniture_avail">
                        <option >Select</option>
                        
                         <option <?php echo ($admin['furniture_avail'] == 'Yes')?"selected":"" ?> >Yes</option> 
                         <option <?php echo ($admin['furniture_avail'] == 'No')?"selected":"" ?> >NO</option>
                        
                     </select>
                     
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group">
                     <label for="Address2">Is proper lighting facility is available in rooms? <br>क्या कक्षों में विद्युत की समुचित व्यवस्था है?</label>
                  <select class="form-control" disabled name="elec_avail"  maxlength="60" placeholder="Is Furniture available?"  id="elec_avail">
                        <option >Select</option>
                         <option <?php echo ($admin['elec_avail'] == 'Yes')?"selected":"" ?> >Yes</option> 
                         <option <?php echo ($admin['elec_avail'] == 'No')?"selected":"" ?> >NO</option>
                     </select>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group">
                     <label for="City" >Does School/College have a Generator facility?<br>क्या विद्यालय/केन्द्र में जनरेटर उपलब्ध है? </label>
                     
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
                     <label for="Address1">Does school have separate washroom facilities for girls and boys?<br>क्या विद्यालय/केन्द्र में पुरूष व महिला अभ्यर्थियों के लिए अलग-अलग प्रसाधन की समुचित व्यवस्था है?<span style="color:red;font-weight:bold">*</span></label>
                  
                      <select class="form-control" disabled name="wash_rrom"  maxlength="60" placeholder="Is Furniture available?"  id="wash_rrom">
                        <option >Select</option>
                         <option <?php echo ($admin['wash_rrom'] == 'Yes')?"selected":"" ?> >Yes</option> 
                         <option <?php echo ($admin['wash_rrom'] == 'No')?"selected":"" ?> >NO</option>
                     </select>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group">
                     <label for="Address2">Does School have a cloakroom facility for keeping valuables of candidates?<br>क्या विद्यालय/केन्द्र में अभ्यर्थियों के कीमती सामान रखने के लिए स्कूल में क्लोकरूम की सुविधा है?</label>
                     <select class="form-control" disabled name="clock_room"  maxlength="60" placeholder="Is Furniture available?"  id="clock_room">
                        <option >Select</option>
                         <option <?php echo ($admin['clock_room'] == 'Yes')?"selected":"" ?> >Yes</option> 
                         <option <?php echo ($admin['clock_room'] == 'No')?"selected":"" ?> >NO</option>
                     </select>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group">
                     <label for="City" >Does School have a proper parking facility?<br>क्या विद्यालय/केन्द्र में अभ्यर्थियों हेतु वाहन पार्किंग की व्यवस्था है?</label>
                    
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
                     <label for="Address1">Does School have sufficient number of invigilators and staff for exam conduction.<br>क्या परीक्षा संचालन के लिए अन्तरीक्षक व स्टाफ पर्याप्त संख्या में उपलब्ध हैं?<span style="color:red;font-weight:bold">*</span></label>
               <select class="form-control" disabled name="staff_suffi"  maxlength="60" placeholder="Is Furniture available?"  id="staff_suffi">
                        <option >Select</option>
                         <option <?php echo ($admin['staff_suffi'] == 'Yes')?"selected":"" ?> >Yes</option> 
                         <option <?php echo ($admin['staff_suffi'] == 'No')?"selected":"" ?> >NO</option>
                     </select>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group">
                     <label for="Address2">Does the school conduct any examination by Uttarakhand public service commission? <br>क्या विद्यालय/केन्द्र में पूर्व में उत्तराखण्ड लोक सेवा आयोग की कोई परीक्षा हुई है?</label>
                  <select class="form-control" disabled name="ukpsc_exxma"  maxlength="60" placeholder="Is Furniture available?"  id="ukpsc_exxma">
                        <option >Select</option>
                         <option <?php echo ($admin['ukpsc_exxma'] == 'Yes')?"selected":"" ?> >Yes</option> 
                         <option <?php echo ($admin['ukpsc_exxma'] == 'No')?"selected":"" ?> >NO</option>
                     </select>
                  </div>
               </div>
               
               <div class="col-md-4">
                  <div class="form-group">
                     <label for="City" >Has school been debarred from any examination?<br>क्या विद्यालय/केन्द्र कभी परीक्षाओं हेतु प्रतिवारित रहा है?</label>
                    <select class="form-control" disabled name="debar"  maxlength="60" placeholder="DEBAR?"  id="debar">
						<option >Select</option>
                         <option <?php echo ($admin['debar'] == 'Yes')?"selected":"" ?> >Yes</option> 
                         <option <?php echo ($admin['debar'] == 'No')?"selected":"" ?> >NO</option>
						 </select>
				 </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-4">
                  <div class="form-group">
                     <label for="Address1">Is principal/centre superintendent brass seal is available if not arrange the same as it is required for conducting the examination <br>(क्या प्रधानाचार्य/पर्यवेक्षक की ब्रास सील उपलब्ध है? यदि नही तो विभिन्न लिफाफों को सील्ड करने के लिए इसकी आवश्यकता होगी तथा परीक्षा आयोजन की दशा में इसे तैयार करा लिया जाए।) <span style="color:red;font-weight:bold">*</span></label>
                     <input class="form-control" disabled name="bras_Seal"  maxlength="60" placeholder="Brass Seal"  id="bras_Seal"  type="text" value="<?= $admin['total_class_number']; ?>" >
                  </div>
               </div>
              
               <div class="col-md-4" style="display:none;">
                  <div class="form-group">
                     <label >Any Other Suggetions? <br>(उक्त के अतिरिक्त अन्य विवरण जिसे आप उपलब्ध कराना उचित एंव आवश्यक समझे)</label>
                   <textarea class="form-control" disabled id="yes_sugge" name="yes_sugge" rows="4" cols="50"></textarea>
                  </div>
               </div>
              
            </div>

            <hr style="1">
            <label class="abc"> School/College/University Bank Details<br>स्कूल/कॉलेज/विश्वविद्यालय बैंक विवरण</label>
             <hr style="1">
            <div class="row">
               <div class="col-md-4">
                  <div class="form-group">
                     <label for="Address1">Account Holder Name<br>खाता धारक का नाम<span style="color:red;font-weight:bold">*</span></label>
                     <input class="form-control" disabled name="acc_holder_name"  maxlength="60" placeholder="Account Holder Name"  id="acc_holder_name"  type="text" value="<?= $admin['acc_holder_name']; ?>"  >
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group">
                     <label for="Address2">
Bank Name<br>बैंक का नाम</label>
                     <input class="form-control" disabled  name="ban_name" maxlength="60" placeholder="Exam Center Name(अंग्रेजी मे)" id="ban_name" type="text" value="<?= $admin['ban_name']; ?>"  >
                  </div>
               </div> 
               <div class="col-md-4">
                  <div class="form-group">
                     <label for="Address2">
Bank Branch Name<br>बैंक शाखा का नाम</label>
                     <input class="form-control" disabled  name="branch_name" maxlength="60" placeholder="Account Holder Name(केवल कैपिटल लेटर)" id="branch_name" type="text" value="<?= $admin['branch_name']; ?>"  >
                  </div>
               </div>
            </div> 
            <div class="row">
               <div class="col-md-4">
                  <div class="form-group">
                     <label for="Address1">
Bank IFSC Code<br>बैंक IFSC कोड<span style="color:red;font-weight:bold">*</span></label>
                     <input class="form-control" disabled name="ifsc"  maxlength="60" placeholder="Bank Name(केवल कैपिटल लेटर)"  id="ifsc"  type="text" value="<?= $admin['ifsc']; ?>"  >
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group">
                     <label for="Address2">
Account Number<br>खाता संख्या</label>
                     <input class="form-control" disabled  name="acc_num" maxlength="60" placeholder="Branch Name/Place" id="acc_num" type="text" value="<?= $admin['acc_num']; ?>"  >
                  </div>
               </div> 
               <div class="col-md-4">
                  <div class="form-group">
                     <label for="Address2">
Confirm Account Number<br>
खाता संख्या की पुष्टि करें</label>
                     <input class="form-control" disabled  name="acc_num_con" maxlength="60" placeholder="IFSC Code" id="acc_num_con" type="text" value="<?= $admin['acc_num_con']; ?>"  >
                  </div>
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
                        <td> <input class="form-control" disabled id="name_fill" type="text" readonly </td>
                     </tr> </br> </br> </br> </br><tr>
                        <td>Date</td>
                        <td> <input class="form-control" disabled type="text" name="date" readonly placeholder="<?php echo date("d/m/Y h:s:a"); ?>"  </td>
                     </tr> </br> </br> </br> </br>
                     <tr>
                        <td>Place</td>
                        <td> <input class="form-control" disabled name="place" type="text" placeholder="Place" </td>
                     </tr>
                  </tbody>
               </table>
            </div>
            </div>
            <div class="card-footer" align="center" >

               <input type="button"  onclick="sure_to_submite()" class="btn btn-ligh" value="Back"></input>
               <input type="button" class="btn btn-ligh  Print_preview" value="Print"></input>
            </div>
            <?php echo form_close(); ?>
         </div>
         <!-- /.box-body -->
      </div>
   </section>
</div>

<script type="text/javascript" src="<?= base_url() ?>assets/dist/js/jquery.collapsibleCheckboxTree.js"></script>
<script>
 $(document).ready(function () {


        $(".Print_preview").click(function () {
            // alert("Click Ok");
            window.print();
        });
    })

</script>