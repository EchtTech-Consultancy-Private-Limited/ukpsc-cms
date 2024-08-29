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

       <h3 class="card-title"> <i class="fa fa-pencil"></i> Update Details for - <span style="font-weight:bold;"> <?php echo $user['exam_name']; ?> </span> </h3>

    </div>

    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet'>

    <link rel="stylesheet" href="http://localhost/uk/assets/dist/css/cerrs.css">

    <style>



</style>

</head>

<body className='snippet-body'>

<div class="container">

  <div class="card">

   

    <div class="form">

      <div class="left-side">

        <!-- <div class="left-heading">

          <h3></h3>

        </div> -->

        <div class="steps-content">

          <h3 class="mb-0">Step <span class="step-number">6</span></h3>

          <!--<p class="step-number-content active">Enter your School/College Information.</p>

          <p class="step-number-content d-none">Enter your School/College Principal Deatils</p>

          <p class="step-number-content d-none">Enter your School/College Centre Superintendent Details</p>

          <p class="step-number-content d-none">Enter your School/College Centre Infrastructure Details.</p>

		  <p class="step-number-content d-none">Add Bank Details</p>

		  <p class="step-number-content d-none">Add your School/College Images as per required filed</p>-->

		   

        </div>

        <ul class="progress-bar">

          <li >School/College/University Information</li>

          <li>Principal Details</li>

          <li>Centre Superintendent Details</li>

          <li>Infrastructure Details</li>		  

		  <li>Bank Details</li>

		  <li class="active">Preview and Download</li>

		  <li>Upload Images</li>

        </ul>

      </div>

   

      <div class="right-side">

       <?php $this->load->view('admin/includes/_messages.php'); ?>

                <?php echo form_open_multipart(base_url('admin/consent_letter/consent_add'), 'id="xin-form" class="form-horizontal" '); ?> 

        <div class="main">

          <div class="text">

            <h2>School/College/University Information (स्कूल/कॉलेज की जानकारी)</h2>

            <p>Enter your School/College Information.</p>

          </div>

          <div class="input-text">

		  <div class="form-group">

             <label>School Registration No.  (स्कूल पंजीकरण संख्या)</label> 

              <input type="text" name="school_registration_number" id="school_registration_number" required require readonly  value="<?php echo $admin['school_registration_number'] ?>">

            </div>

            <div class="form-group">

              <label>School/College Name (स्कूल/कॉलेज का नाम)</label> 

              <input type="text"  name="school_name" id="school_name" required readonly value="<?php echo $admin['school_name'] ?>">

          </div>

            <div class="form-group">

                  <label>Address (स्कूल/कॉलेज का पता)</label>

               <input type="text" name="address" id="address" required readonly require value="<?php echo $admin['address'] ?>">

            

          </div>

         

         

            <div class="form-group">

                <label>Landmark (लैंडमार्क)</label>

              <input type="text" name="landmark" id="landmark" required readonly require value="<?php echo $admin['landmark'] ?>">

              

               </div>

           

         

			         

            <div class="form-group">

              <label style="font-weight:bold;"> District:</label>

            <input type="text" required readonly require value="<?php echo $admin['district'] ?>">

            </div>

            <div class="form-group">

            <label style="font-weight:bold;"> City:</label>

            <input type="text" name="district" id="district" required readonly require value="<?php echo $admin['city'] ?>">

            </div>

      

          <div class="buttons">

            <!-- <button class="next_button">Next Step</button> -->

              <input type="submit" name="submit" id="submit" class="btn btn-primary btn-block btn-flat next_button" value="Submit">



          </div>

		   </div>

        </div>

	 <?php echo form_close(); ?>

        <?php $this->load->view('admin/includes/_messages.php'); ?>

                <?php echo form_open_multipart(base_url('admin/consent_letter/consent_add'), 'id="xin-form" class="form-horizontal" '); ?> 

        <div class="main">

          <div class="text">

            <h2>Principal's Details (प्राचार्य का विवरण)</h2>

            <p>Enter your School/College/Institute Principal Details</p>

          </div>

          <div class="input-text">

            <div class="form-group">

              

              <label>Principal Name (प्राचार्य का नाम)</label> 

              <input type="text" name="principal_name" id="principal_name" required readonly require  value="<?php echo $admin['principal_name'] ?>" >

          </div>

            <div class="form-group">



              <label>Mobile No. (मोबाइल नंबर)</label>

   <input type="text" name="pri_mobile" id="pri_mobile" required readonly value="<?php echo $admin['pri_mobile'] ?>" >

               </div>

          

		     <div class="form-group">

              

              <label>Email (used for communication with UKPSC) ईमेल (यूकेपीएससी के साथ संचार के लिए प्रयुक्त)</label> 

               <input type="text" name="email" id="email" required readonly require value="<?php echo $admin['email'] ?>" >

          </div>

         

            <div class="form-group">

              

              <label>Whats App No. (व्हाट्सएप नंबर)</label> 

              <input type="text" name="whats_num" id="whats_num" required readonly require value="<?php echo $admin['whats_num'] ?>" >



            </div>

          </div>

          <div class="buttons button_space">

            <button class="back_button">Back</button>

            <!-- <button class="next_button">Next Step</button> -->

              <input type="submit" name="submit" id="submit" class="btn btn-primary btn-block btn-flat next_button" value="Submit">

          </div>

        </div>

         <?php echo form_close(); ?>



        <div class="main">

          <div class="text">

            <h2>Centre Superintendent Details (केंद्र अधीक्षक का विवरण)</h2>

            <p>Enter your School/College/Institute Centre Superintendent Details</p>

          </div>

         <div class="input-text">

            <div class="form-group">

              <input type="text" name="super_name" id="super_name" required require>

              <span>Centre Superintendent Name (केंद्र अधीक्षक का नाम)</span> </div>

			  

			   <div class="form-group">



              <input type="text" name="super_design" id="super_design" required>

              <span>Designation (पदनाम)</span> </div>

            <div class="form-group">



              <input type="text" name="super_mobile" id="super_mobile" required>

              <span>Mobile No. (मोबाइल नंबर)</span> </div>

          

		     <div class="form-group">

              <input type="text"  name="super_email" id="super_email" required require>

              <span>Email ID (ईमेल आईडी)</span> </div>

         

            <div class="form-group">

              <input type="text" name="super_whatspp"  id="super_whatspp"  required require>

              <span>Whats App No. (व्हाट्सएप नंबर)</span> 

            </div>

          </div>

          <div class="buttons button_space">

            <button class="back_button">Back</button>

            <button class="next_button">Next Step</button>

          </div>

        </div>

        <div class="main">

          <div class="text">

            <h2>School/College Infrastructure Details स्कूल/कॉलेज के बुनियादी ढांचे का विवरण</h2> 

            <p>Enter your School/College Infrastructure Details.</p>

          </div>

		  <div class="input-text">

			   <div class="form-group">

				  <input type="text" name="no_room" required>

				  <span>No. of Rooms (कमरों की कुल संख्या)</span> 

				</div>

				<div class="form-group">

				  <input type="text" name="no_sheet"  required>

				  <span>No. of Sheet Rooms (शीट रूम की संख्या)</span>

				</div>

				

         

			   <div class="form-group">

				     <label for="Address1">Is there sufficient furniture in the rooms for the candidates?  </label>

                                     <select class="form-control" name="furniture_avail"  maxlength="60" placeholder="Is Furniture available?"  id="furniture_avail">

                                        <option >Select</option>

                                        <option value="Yes">Yes</option>

                                        <option value="No">No</option>

                                     </select>

				 

				</div>

				<div class="form-group">

				 <label for="Address2">Is Electricity available?</label>

                            <select class="form-control" name="elec_avail" maxlength="60" placeholder="Is Electricity available?" id="elec_avail">

                                <option >Select</option>

                                <option value="Yes">Yes</option>

                                <option value="No">No</option>

                            </select>

				</div>

				

         

			   <div class="form-group">

				 <label for="City" >Is Generator available?</label>

                            <select class="form-control" name="gen_avai" maxlength="60" placeholder="Is Electricity available?" id="gen_avai">

                                <option >Select</option>

                                <option value="Yes">Yes</option>

                                <option value="No">No</option>

                            </select> 

				</div>

				<div class="form-group">

				   <label for="Address1">Is distinct washroom available for Boys and Girl?</label>

                            <select class="form-control" name="wash_rrom" maxlength="60" placeholder="Is Electricity available?" id="wash_rrom">

                                <option >Select</option>

                                <option value="Yes">Yes</option>

                                <option value="No">No</option>

                            </select>

				</div>

				

          

			   <div class="form-group">

				 <label for="Address2">Is ClockRoom available?</label>

                            <select class="form-control" name="clock_room" maxlength="60" placeholder="Is Electricity available?" id="clock_room">

                                <option >Select</option>

                                <option value="Yes">Yes</option>

                                <option value="No">No</option>

                            </select>

				</div>

				<div class="form-group">

				  <label for="City" >Is Vehicle Parking available?</label>

                            <select class="form-control" name="vehicle_avail" maxlength="60" placeholder="Is Electricity available?" id="vehicle_avail">

                                <option >Select</option>

                                <option value="Yes">Yes</option>

                                <option value="No">No</option>

                            </select>

				</div>

			

			   <div class="form-group">

				 <label for="Address1">Is number of staff sufficient?<span style="color:red;font-weight:bold">*</span></label>

                            <select class="form-control" name="staff_suffi" maxlength="60" placeholder="Is Electricity available?" id="staff_suffi">

                                <option >Select</option>

                                <option value="Yes">Yes</option>

                                <option value="No">No</option>

                            </select>

				</div>

				<div class="form-group">

				  <label for="Address2">Is any exam of UKPSC held?</label>

                            <select class="form-control" name="ukpsc_exxma" maxlength="60" placeholder="Is Electricity available?" id="ukpsc_exxma">

                                <option >Select</option>

                                <option value="Yes">Yes</option>

                                <option value="No">No</option>

                            </select>

				</div>

			

			   <div class="form-group">

				  <!-- <label for="City" >Ever Debared (क्या कभी वंचित)</label> -->

                            <input class="form-control" id="debar" maxlength="60" placeholder="DEBAR"  name="debar" type="text" value="" >

                            <span>Ever Debared (क्या कभी वंचित)</span>

				</div>

				<div class="form-group">

				    <input class="form-control" name="bras_Seal"  maxlength="60" placeholder="Brass Seal"  id="bras_Seal"  type="text" value="" >

				  <span>Brass Seal availablity? (पीतल सील उपलब्धता?)</span>

				</div>

			</div>

			  

          <div class="buttons button_space">

            <button class="back_button">Back</button>

            <button class="next_button">Next Step</button>

          </div>

			  

			  

           

          </div>

		  

		  <div class="main">

          <div class="text">

            <h2>Bank Details</h2>

            <p>Add School Bank Details</p>

          </div>

          <div class="input-text1">

			   <div class="form-group">

				  <input class="form-control"  name="acc_holder_name" maxlength="60" id="acc_holder_name" type="text" value="" >

				  <span>School/College/Institute/University account name </span> 

				</div>

				<div class="form-group">

				  <input class="form-control" name="ban_name"  maxlength="60"  id="ban_name"  type="text" value="" >

				  <span>Bank Name</span>

				</div>

		  </div>

		   <div class="input-text1">

			   <div class="form-group">

				   <input class="form-control"  name="branch_name" maxlength="60" id="branch_name" type="text" value="" >

				  <span>Bank Branch Name</span> 

				</div>

				<div class="form-group">

				  <input class="form-control"  name="ifsc" maxlength="60"  id="ifsc" type="text" value="" >

				  <span>Bank IFSC Code</span>

				</div>

		  </div>

		   <div class="input-text1">

			   <div class="form-group">

				  <input class="form-control"  name="acc_num" maxlength="60"  id="acc_num" type="text" value="" >

				  <span>Account Number</span> 

				</div>

                <div class="form-group">

                  <input class="form-control"  name="acc_num_con" maxlength="60"  id="acc_num_con" type="text" value="" >

                  <span>Confirm Account Number</span> 

                </div>

				

		  </div>

		  

          <div class="buttons button_space">

            <button class="back_button">Back</button>

            <button class="next_button">Next Step</button>

          </div>

        </div>

		

		

		<div class="main active">

          <div class="text">

            <h2>Preview and Download</h2>

            <p>Preview the form and download for sign and stamp</p>

          </div>

          <div class="input-text">

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

                  &nbsp; Consent Letter Form        

               </h3>

            </div>

            <!--          <div class="d-inline-block float-right">

               <a href="<?= base_url('admin/profile/change_pwd'); ?>" class="btn btn-success"><i class="fa fa-list"></i> <?= trans('change_password') ?></a>

               </div>-->

         </div>

        <div class="card-body">

            <!-- For Messages -->

            <?php $this->load->view('admin/includes/_messages.php') ?>

        

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

                            <input type="landmark" name="landmark" readonly  value="<?= $admin['landmark']; ?>"  class="form-control" disabled id="landmark" placeholder="">

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

                     <label for="Address1">School/College/Institute/University account name<span style="color:red;font-weight:bold">*</span></label>

                     <input class="form-control" disabled name="acc_holder_name"  maxlength="60" placeholder="School/College/Institute/University Account Name"  id="acc_holder_name"  type="text" value="<?= $admin['acc_holder_name']; ?>"  >

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

                     <input class="form-control" disabled  name="branch_name" maxlength="60" placeholder="School/College/Institute/University Account Name(केवल कैपिटल लेटर)" id="branch_name" type="text" value="<?= $admin['branch_name']; ?>"  >

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

		  </div>

		  

		   

		  

          <div class="buttons button_space">

            <button class="back_button">Back</button>

            <button class="next_button">Next Step</button>

          </div>

        </div>

		  

         <div class="main" >

          <div class="text">

            <h2>Upload Images (तश्वीरें अपलोड करो)</h2>

            <p>Add your School/College/Institute Images as per required filed</p>

          </div>

          <div class="input-text1">

			   <div class="form-group">

				     <input type="file"  class="form-control" name="fileName1" id="fileName1" data-file_detail="file_detail1" onchange="get_detail(this);" />  

				  <span>Image Parking</span> 

				</div>

				<div class="form-group">

				  <input type="file"  class="form-control" name="fileName2" id="fileName2" data-file_detail="file_detail2" onchange="get_detail(this);" />

				  <span>Image Classroom </span>

				</div>

		  </div>

		   <div class="input-text1">

			   <div class="form-group">

				  <input type="file"  class="form-control" name="fileName3" id="fileName3" data-file_detail="file_detail3" onchange="get_detail(this);" />

				  <span>Image Washroom </span> 

				</div>

				<div class="form-group">

				<input type="file"  class="form-control" name="fileName4" id="fileName4" data-file_detail="file_detail4" onchange="get_detail(this);" />

				  <span>Image Main Gate </span>

				</div>

		  </div>

		   <div class="input-text1">

			   <div class="form-group">

				  <input type="file"  class="form-control" name="fileName5" id="fileName5" data-file_detail="file_detail5" onchange="get_detail(this);" />

				  <span>Image Locker</span> 

				</div>

				

		  </div>

		   <div class="buttons button_space">

            <button class="back_button">Back</button>

            <!-- <input type="button" name="submit" value="submit" class="submit_button"> -->

             <input type="submit" name="submit" class="btn btn-primary submit_button " value="Submit"></input>

          </div>

        </div>



		

		 <div class="main" style="text-align:center">

          <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">

            <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none"/>

            <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"/>

          </svg>

          <div class="text congrats">

            <h2>Congratulations!</h2>

            <p>Thanks Mr./Mrs. <span class="shown_name"></span> your information have been submitted successfully for the future reference we will contact you soon.</p>

          </div>

        </div>

        </div>

		 

 

      </div>

    </div>

  </div>

</div>

     <?php echo form_close(); ?>  

<script type='text/javascript' src='#'></script>

<script type='text/javascript' src='#'></script>

<script type='text/javascript' src='#'></script>

<script type='text/javascript' src='#'></script>

<script type='text/javascript'>

    var next_click=document.querySelectorAll(".next_button");

var main_form=document.querySelectorAll(".main");

var step_list = document.querySelectorAll(".progress-bar li");

var num = document.querySelector(".step-number");

let formnumber=0;



next_click.forEach(function(next_click_form){

    next_click_form.addEventListener('click',function(){

        if(!validateform()){

            return false

        }

       formnumber++;

       updateform();

       progress_forward();

       contentchange();

    });

}); 



var back_click=document.querySelectorAll(".back_button");

back_click.forEach(function(back_click_form){

    back_click_form.addEventListener('click',function(){

       formnumber--;

       updateform();

       progress_backward();

       contentchange();

    });

});



var username=document.querySelector("#principal_name");

var shownname=document.querySelector(".shown_name");

 



var submit_click=document.querySelectorAll(".submit_button");

submit_click.forEach(function(submit_click_form){

    submit_click_form.addEventListener('click',function(){

       shownname.innerHTML= username.value;

       formnumber++;

       updateform(); 

    });

});



var heart=document.querySelector(".fa-heart");

heart.addEventListener('click',function(){

   heart.classList.toggle('heart');

});





var share=document.querySelector(".fa-share-alt");

share.addEventListener('click',function(){

   share.classList.toggle('share');

});



 



function updateform(){

    main_form.forEach(function(mainform_number){

        mainform_number.classList.remove('active');

    })

    main_form[formnumber].classList.add('active');

} 

 

function progress_forward(){

    // step_list.forEach(list => {

        

    //     list.classList.remove('active');

         

    // }); 

    

     

    num.innerHTML = formnumber+1;

    step_list[formnumber].classList.add('active');

}  



function progress_backward(){

    var form_num = formnumber+1;

    step_list[form_num].classList.remove('active');

    num.innerHTML = form_num;

} 

 

var step_num_content=document.querySelectorAll(".step-number-content");



 function contentchange(){

     step_num_content.forEach(function(content){

        content.classList.remove('active'); 

        content.classList.add('d-none');

     }); 

     step_num_content[formnumber].classList.add('active');

 } 

 

 

function validateform(){

    validate=true;

    var validate_inputs=document.querySelectorAll(".main.active input");

    validate_inputs.forEach(function(vaildate_input){

        vaildate_input.classList.remove('warning');

        if(vaildate_input.hasAttribute('require')){

            if(vaildate_input.value.length==0){

                validate=false;

                vaildate_input.classList.add('warning');

            }

        }

    });

    return validate;

    

}</script>

<script type='text/javascript'>var myLink = document.querySelector('a[href="#"]');

                                myLink.addEventListener('click', function(e) {

                                  e.preventDefault();

                                });</script>

</script>

