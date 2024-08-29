<!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">
   

    <!-- Main content -->

    <section class="content">

      <div class="card card-default color-palette-bo">

        <div class="card-header">

          <div class="d-inline-block">

              <h3 class="card-title"> <i class="fa fa-pencil"></i>

              &nbsp; <?= trans('profile') ?> </h3>

          </div>

          <div class="d-inline-block float-right">

            <a href="<?= base_url('admin/profile/change_pwd'); ?>" class="btn btn-success"><i class="fa fa-list"></i> <?= trans('change_password') ?></a>

          </div>

        </div>

        <div class="card-body">   

           <!-- For Messages -->

            <?php $this->load->view('admin/includes/_messages.php') ?>



            <?php echo form_open(base_url('admin/profile'), 'class="form-horizontal"' )?> 

              <div class="form-group">

                <label for="username" class="col-sm-2 control-label"><?= trans('username') ?></label>



                <div class="col-md-12">

                  <input type="text" name="username" value="<?= $admin['username']; ?>" class="form-control" id="username" placeholder="">

                </div>

              </div>

              <div class="form-group">

                <label for="firstname" class="col-sm-2 control-label"><?= trans('firstname') ?></label>



                <div class="col-md-12">

                  <input type="text" name="firstname" value="<?= $admin['firstname']; ?>" class="form-control" id="firstname" placeholder="">

                </div>

              </div>



              <div class="form-group">

                <label for="lastname" class="col-sm-2 control-label"><?= trans('lastname') ?></label>



                <div class="col-md-12">

                  <input type="text" name="lastname" value="<?= $admin['lastname']; ?>" class="form-control" id="lastname" placeholder="">

                </div>

              </div>



              <div class="form-group">

                <label for="email" class="col-sm-2 control-label"><?= trans('email') ?></label>



                <div class="col-md-12">

                  <input type="email" name="email" value="<?= $admin['email']; ?>" class="form-control" id="email" placeholder="">

                </div>

              </div>

              <div class="form-group">

                <label for="mobile_no" class="col-sm-2 control-label"><?= trans('mobile_no') ?></label>



                <div class="col-md-12">

                  <input type="number" name="mobile_no" value="<?= $admin['mobile_no']; ?>" class="form-control" id="mobile_no" placeholder="">

                </div>

              </div>

              <div class="form-group">

                <div class="col-md-12">

                  <input type="submit" name="submit" value="<?= trans('update_profile') ?>" class="btn btn-info pull-right">

                </div>

              </div>

            <?php echo form_close(); ?>

        </div>

        <!-- /.box-body -->

      </div>

    </section>

  </div> 









<!--========================================-->    







<div class="content-wrapper">

    <!-- Main content -->

    <section class="content">

        <div class="card card-default color-palette-bo">

            <div class="card-header">

                <div class="d-inline-block">

                    <h3 class="card-title"> <i class="fa fa-pencil"></i>

                        &nbsp; <?= trans('add_certificate') ?>-Permanent 

                    </h3>

                </div>

                <!--          <div class="d-inline-block float-right">

                   <a href="<?= base_url('admin/profile/change_pwd'); ?>" class="btn btn-success"><i class="fa fa-list"></i> <?= trans('change_password') ?></a>

                   </div>-->

            </div>

            <div class="card-body">

                <!-- For Messages -->

                <?php $this->load->view('admin/includes/_messages.php') ?>

<?php echo form_open_multipart(base_url('admin/certificate/provisional'), 'id="xin-form" class="form-horizontal" ') ?> 

                <h3>ESTABLISHMENT DETAILS <span class="label label-default">Status: New Application</span></h3>

                <div class="form-group">

                    <label for="username" class="col-sm-4 control-label">Name of the Clinical Establishment</label>

                    <div class="col-md-8">



                        <input type="text" name="establishment" placeholder="Name of the Clinical Establishment" class="form-control" id="establishment" value="" >

                        <select name="appication_mode" id="appication_mode" class="form-control  hide" data-distric_name="establishment">

                            <option value=""><?= trans('select_state') ?></option>

                            <?php foreach (APPLICATION_MODE as $k => $v) { ?>

                                <option value="<?= $k ?>" <?php if ($k == $application_mode) echo "selected"; ?> ><?= $v ?></option>

<?php } ?>

                        </select>

                    </div>

                </div>

                <div class="row">

                    <div class="col-md-4">

                        <div class="form-group">

                            <label for="Address1">Address1 </label>

                            <input class="form-control" name="address1" placeholder="Address1" id="establishment_address1"  type="text" value="">

                        </div>

                    </div>

                    <div class="col-md-4">

                        <div class="form-group">

                            <label for="Address2">Address2</label>

                            <input class="form-control"  name="address2" placeholder="Address2" id="establishment_address2" type="text" value="">

                        </div>

                    </div>

                    <div class="col-md-4">

                        <div class="form-group">

                            <label for="City" >Village/Town/City</label>

                            <input class="form-control" id="establishment_city" placeholder="City" name="city" type="text" value="">

                        </div>

                    </div>

                </div>

                <div class="row">

                    <div class="col-md-4">

                        <div class="form-group">

                            <label for="State">State/UT </label>

                            <!--<input class="form-control"   name="state" type="text" value="">-->

                            <select name="state" id="state" class="form-control dd_state" data-distric_name="establishment">

                                <option value=""><?= trans('select_state') ?></option>

                                <?php foreach ($states as $k => $state) {

                                 

                                    if(in_array($_SESSION['admin_role_id'], array(5,4,3)) && $_SESSION['state_id']!=$state->id) 

                                        continue;

                                    ?>

                                

                                    <option value="<?= $state->id ?>"  ><?= $state->name ?></option>

<?php } ?>

                            </select>

                        </div>

                    </div>

                    <div class="col-md-4">

                        <div class="form-group">

                            <label for="District"><?= trans('district') ?></label>

                            <!--<input class="form-control"   name="district" type="text" value="">-->

                            <select name="district" id="district_establishment" class="form-control">

                                <option value=""><?= trans('select_district') ?></option>

                            </select>

                        </div>

                    </div>

                    <div class="col-md-4">

                        <div class="form-group">

                            <label for="Pin" class="control-label">Pin code</label>

                            <input class="form-control" placeholder="Pin" id="establishment_pin" name="pin" type="text" value="">

                        </div>

                    </div>

                </div>

                <div class="row">

                    <div class="col-md-4">

                        <div class="form-group">

                            <label for="STD">STD Code </label>

                            <input class="form-control" placeholder="STD Code " id="establishment_std" name="std" type="text" value="">

                        </div>

                    </div>

                    <div class="col-md-4">

                        <div class="form-group">

                            <label for="Telephone">Telephone</label>

                            <input class="form-control" placeholder="Telephone" id="establishment_tele"  name="telephone" type="text" value="">

                        </div>

                    </div>

                    <div class="col-md-4">

                        <div class="form-group">

                            <label for="Mobile" class="control-label">Mobile</label>

                            <input class="form-control" placeholder="Mobile" id="establishment_mobile"  name="mobile" type="text" value="">

                        </div>

                    </div>

                </div>

                <div class="row">

                    <div class="col-md-4">

                        <div class="form-group">

                            <label for="Fax">Fax </label>

                            <input class="form-control" placeholder="Fax" id="establishment_fax"  name="fax" type="text" value="">

                        </div>

                    </div>

                    <div class="col-md-4">

                        <div class="form-group">

                            <label for="email">E-mail ID</label>

                            <input class="form-control" placeholder="E-mail ID" id="establishment_email"  name="email" type="text" value="">

                        </div>

                    </div>

                    <div class="col-md-4">

                        <div class="form-group">

                            <label for="Website" class="control-label">Website (if any)</label>

                            <input class="form-control" placeholder="Website" id="establishment_web" name="website" type="text" value="">

                        </div>

                    </div>

                </div>

                <hr class="style1">

                <div>

                    <fieldset id="billingInfo1" style="width: 100%;">

                        <label for="sameAsowner">Same as Name of the owner</label>

                        <input name="sameAsowner"   class ="same_as_above" id="sameAsowner1" type="checkbox"  data-prev_block="establishment" data-data_block="owner"   value="sameAsowner" />

                </div>

                <label for="employee_id"> Name of the owner </label>

                <div class="row">

                    <div class="col-md-4">

                        <div class="form-group">

                            <label for="fname">First Name </label>

                            <input class="form-control dd_owner "   id="owner_fname"   placeholder="First Name" name="fname_owner" type="text" value="">

                        </div>

                    </div>

                    <div class="col-md-4">

                        <div class="form-group">

                            <label for="mname">Middle Name</label>

                            <input class="form-control dd_owner"   id="owner_mname" placeholder="Middle Name."  name="mname_owner" type="text" value="">

                        </div>

                    </div>

                    <div class="col-md-4">

                        <div class="form-group">

                            <label for="last_name" >Last Name</label>

                            <input class="form-control dd_owner" id="owner_lname" placeholder="Last Name" name="lname_owner" type="text" value="">

                        </div>

                    </div>

                </div>

                <div class="row">

                    <div class="col-md-4">

                        <div class="form-group">

                            <label for="Address1">Address1 </label>

                            <input class="form-control dd_owner"  id="owner_address1" placeholder="Address1" name="add1_owner" type="text" value="">

                        </div>

                    </div>

                    <div class="col-md-4">

                        <div class="form-group">

                            <label for="Address2">Address2</label>

                            <input class="form-control dd_owner" placeholder="Address2" id="owner_address2" name="add2_owner" type="text" value="">

                        </div>

                    </div>

                    <div class="col-md-4">

                        <div class="form-group">

                            <label for="Town" >Village/Town/City</label>

                            <input class="form-control dd_owner" id="owner_city" placeholder="Village/Town/City"  name="city_owner" type="text" value="">

                        </div>

                    </div>

                </div>

                <div class="row">

                    <div class="col-md-4">

                        <div class="form-group">

                            <label for="state">State/UT </label>

                            <!--<input class="form-control" required="required"  name="state_owner" type="text" value="">-->

                            <select name="state_owner" id="state2" data-autofill_name="owner" class="form-control dd_state dd_owner" data-distric_name="owner">

                                <option value=""><?= trans('select_state') ?></option>

                               <?php foreach ($states as $k => $state) {

                                 

                                    if(in_array($_SESSION['admin_role_id'], array(5,4,3)) && $_SESSION['state_id']!=$state->id) 

                                        continue;

                                    ?>

                                

                                    <option value="<?= $state->id ?>"  ><?= $state->name ?></option>

<?php } ?>

                            </select>

                        </div>

                    </div>

                    <div class="col-md-4">

                        <div class="form-group">

                            <label for="District"><?= trans('district') ?></label>

                             <!--<input class="form-control"   name="district" type="text" value="">-->

                            <select name="district_owner" data-autofill_name="owner" id="district_owner" class="form-control dd_owner">

                                <option value=""><?= trans('select_district') ?></option>

                            </select>

                        </div>

                    </div>

                    <div class="col-md-4">

                        <div class="form-group">

                            <label for="Pin" class="control-label">Pin Code</label>

                            <input class="form-control dd_owner" placeholder="Pin Code" id="owner_pin"  name="pin_owner" type="text" value="">

                        </div>

                    </div>

                </div>

                <div class="row">

                    <div class="col-md-4">

                        <div class="form-group">

                            <label for="STD">STD Code </label>

                            <input class="form-control dd_owner" placeholder="STD Code" id="owner_std"  name="std__owner" type="text" value="">

                        </div>

                    </div>

                    <div class="col-md-4">

                        <div class="form-group">

                            <label for="Telephone">Telephone</label>

                            <input class="form-control dd_owner" placeholder="Telephone" id="owner_tele"  name="telephone_owner" type="text" value="">

                        </div>

                    </div>

                    <div class="col-md-4">

                        <div class="form-group">

                            <label for="Mobile" class="control-label">Mobile</label>

                            <input class="form-control dd_owner" placeholder="Mobile" id="owner_mobile"  name="mobile_owner" type="text" value="">

                        </div>

                    </div>

                </div>

                <div class="row">

                    <div class="col-md-4">

                        <div class="form-group">

                            <label for="Fax">Fax </label>

                            <input class="form-control dd_owner" placeholder="Fax" id="owner_fax" name="fax_owner" type="text" value="">

                        </div>

                    </div>

                    <div class="col-md-4">

                        <div class="form-group">

                            <label for="email">E-mail ID</label>

                            <input class="form-control dd_owner" placeholder="E-mail ID"  id="owner_email"  name="email_owner" type="text" value="">

                        </div>

                    </div>

                    <div class="col-md-4">

                        <div class="form-group">

                            <label for="Website" class="control-label">Website (if any)</label>

                            <input class="form-control dd_owner" placeholder="Website (if any)" id="owner_web"  name="website_owner" type="text" value="">

                        </div>

                    </div>

                </div>

                <hr class="style1">

                <label for="employee_id"> Name of the Person In charge </label>

                <div class="row">

                    <div class="col-md-4">

                        <div class="form-group">

                            <label for="fname">First Name </label>

                            <input class="form-control dd_person"   id="person_fname"  placeholder="First Name" name="fname_person" type="text" value="">

                        </div>

                    </div>

                    <div class="col-md-4">

                        <div class="form-group">

                            <label for="mname">Middle Name</label>

                            <input class="form-control dd_person"   id="person_mname"  placeholder="Middle Name."  name="mname_person" type="text" value="">

                        </div>

                    </div>

                    <div class="col-md-4">

                        <div class="form-group">

                            <label for="last_name" >Last Name</label>

                            <input class="form-control dd_person"  id="person_lname" placeholder="Last Name" name="lname_person" type="text" value="">

                        </div>

                    </div>

                </div>



                <div>

                    <fieldset id="billingInfo" style="width: 100%;">

                        <label for="sameAsowner">Same as Name of the owner</label>

                        <input name="sameAsowner"   class ="same_as_above" id="sameAsowner" type="checkbox"  data-prev_block="owner" data-data_block="person"   value="sameAsowner" />

                </div>



                <label style="font-weight: bold;" for="employee_id">Medical Qualification </label>

                <div class="row">

                    <div class="col-md-4">

                        <div class="form-group">

                            <label for="degree">Degree :*</label>

                            <select name="degree" data-child_id="catogory_1" data-label_name="Category" id="Degree" class="degree form-control select2-hidden-accessible" data-plugin="select_hrm" data-placeholder="Select" tabindex="-1" aria-hidden="true">

                                <option value="0"> Select Degree </option>

                                <?php if (!empty($medical_degree)) {

                                    foreach ($medical_degree as $k => $v) { ?>

                                        <option value="<?php echo $v['id'] ?>"> <?php echo $v['name'] ?></option>

								<?php }

								} ?>



                            </select>

                        </div>

                    </div>   

                    <div class="col-md-4" id="degree_1"  >

                        <div class="form-group">

                            <label for="catogory" id="base_sector" >Category*</label>

                            <select name="catogory_1" data-child_id="catogory_2" data-label_name="Sub Category" id="catogory_1" class="degree form-control select2-hidden-accessible" data-plugin="select_hrm" data-placeholder="Select " tabindex="-1" aria-hidden="true">

                                <option value="0"> Select Category </option>

                            </select>

                        </div>



                    </div>   <div class="col-md-4">

                        <div class="form-group">

                            <label for="catogory_2">Sub Category* </label>

                            <select name="catogory_2" data-child_id="catogory_3" id="catogory_2" class="degree form-control select2-hidden-accessible" data-plugin="select_hrm" data-placeholder="Select " tabindex="-1" aria-hidden="true">

                                <option value="0"> Select Sub Category </option>



                            </select>

                        </div>

                    </div>

                    <div class="col-md-4">

                        <div class="form-group">

                            <label for="person_registration">Registration Number </label>

                            <input class="form-control dd_person" placeholder="Registration Number"  id="person_registration" name="person_registration" type="text" value="">

                        </div>

                    </div>

                    <div class="col-md-4">

                        <div class="form-group">

                            <label for="person_central_cauncil">Name of Central/State Council (with which registered):</label>

                            <input class="form-control dd_person" placeholder="Name of Central/State Council (with which registered):" id="person_central_cauncil" name="person_central_cauncil" type="text" value="">

                        </div>

                    </div>

                    <div class="col-md-4">

                        <div class="form-group">

                            <label for="STD">STD Code </label>

                            <input class="form-control dd_person" placeholder="STD Code" id="person_std"  name="std_person" type="text" value="">

                        </div>

                    </div>

                </div>

                <div class="row">

                    <div class="col-md-4">

                        <div class="form-group">

                            <label for="Telephone">Telephone</label>

                            <input class="form-control dd_person"  id="person_tele" placeholder="Telephone" name="telephone_person" type="text" value="">

                        </div>

                    </div>

                    <div class="col-md-4">

                        <div class="form-group">

                            <label for="Mobile" class="control-label">Mobile</label>

                            <input class="form-control dd_person" placeholder="Mobile" id="person_mobile"  name="mobile_person" type="text" value="">

                        </div>

                    </div>

                    <div class="col-md-4">

                        <div class="form-group">

                            <label for="email">E-mail ID</label>

                            <input class="form-control dd_person" placeholder="E-mail ID" id="person_email"  name="email_person" type="text" value="">

                        </div>

                    </div>

                </div>

                <hr class="style1">

                <div class="row">

                    <div class="col-md-4">

                        <div class="form-group">

                            <label for="Ownership">Type </label>

                            <select name="ownership" id="Ownership" class="form-control select2-hidden-accessible" data-plugin="select_hrm" data-placeholder="Select Gender" tabindex="-1" aria-hidden="true">

                                <option value="0"> Select Ownership </option>

<?php if (!empty($ownership_level)) {

    foreach ($ownership_level as $k => $v) { ?>

                                        <option value="<?php echo $v['id'] ?>"> <?php echo $v['name'] ?></option>

    <?php }

} ?>

                            </select>

                        </div>

                    </div>

                    <div class="col-md-4" id="Ownership_1" style="display: none;">

                        <div class="form-group">

                            <label for="show_owners" id="base_sector">Ownership</label>

                            <select name="ownership2" id="show_owners" class="form-control select2-hidden-accessible" data-plugin="select_hrm" data-placeholder="Select Gender" tabindex="-1" aria-hidden="true">

                                <option value="0">Select Ownership</option>



                            </select>

                        </div>

                    </div>



                </div>

                <hr class="style1">

                <label for="employee_id"> Systems of Medicine: (please tick whichever is applicable) - You can select more than one options  </label>

                <div class="col-md-12">

                    <div class="row mb-3">

<?php

foreach (SYSTEMS_OF_MEDICINE as $k => $v) {

    ?>

                            <div class="col-md-3 pb-3"> 

                                <span class="pull-left">

                                    <input type="checkbox" class="tgl " name="systems_of_medicine[]" id="<?= $k ?>" value="<?= $k ?>">

                                    <label class="tgl-btn" for="<?= $v ?> "></label> 

                                </span>

                                <span class="mt-15 pl-3">

    <?= $v ?>                                          </span>

                            </div>

<?php } ?>



                    </div>

                </div>

                <hr class="style1">

                <label for="employee_id"> Type of Clinical Services : *</label>

                <div class="col-md-4">

                    <div class="row mb-3">

                            <?php set_select('role') ?>

                        <select name="clinical_services" id="clinical_services" class="form-control select2-hidden-accessible" data-plugin="select_hrm" data-placeholder="Select Gender" tabindex="-1" aria-hidden="true">

                            <option value="0"> Select Clinical Services </option>

<?php

foreach (CLINICAL_SERVICES as $k => $v) {

    ?>

                                <option value="<?= $k ?>"> <?= $v ?></option>

<?php } ?>

                        </select>

                    </div>

                </div>

                <hr class="style1">

                <label for="employee_id"> Type of Clinical Establishment: (please tick whichever is applicable) - You can select more than one options : *</label>

                <div class="row">

                    <div class="col-md-12 "><span id="a" class="a" style="font-weight:bold;">a)</span>  

                        <div class="col-md-12" style="">

                            <ul id="example">

                                <?php

                                foreach ($rootClinicalEstablishment as $k => $v) {

                                    $nole_address = "0_" . $v['id'];

                                    echo '<li class="li_root">';

                                    if ($v['child_count'] <= 0)

                                        echo '<input type="checkbox" name="clinical_establishment[]" data-nole_address="' . $nole_address . '" value="' . $v['id'] . '" />';

                                    echo $v['name'];

                                    get_clinical_establishment_child($v['id'], $nole_address);

                                    echo '</li>';

                                }

                                ?>

                            </ul>

                        </div>

                    </div>

                </div>

                <hr class="style1">

                <div class="row">

                    <div class="col-md-2 form-group" id="">

                        <span id="a" class="a" style="font-weight:bold;">b(ii) Number of Beds:</span>   

                        <input type="number" class="tgl form-control" name="beds" placeholder="Beds in Number" id="beds" class="form-control">

                    </div>

                </div>



                <hr class="style1">

                <label for="employee_id">Fee applicable: *</label>

                <div class="col-md-3 pb-3"> 

                    <input type="radio" id="yes" name="yes" value="1">

                    <label for="yes">YES</label><br>

                    <input type="radio" id="no" name="no" value="0">

                    <label for="no">NO</label><br>

                </div>

                <hr class="style1">

                <label for="employee_id">File Upload *</label>

                <div class="row">

                    <div class="form-group  col-sm-3">

                        <label>Choose Files</label>

                        <input type="file"  class="form-control" name="fileName1" id="fileName1" data-file_detail="file_detail1" onchange="get_detail(this);" />	

                        <p id="file_detail1"></p>

                    </div>   

                    <div class="form-group  col-sm-3">

                        <label>Choose Files</label>

                        <input type="file"  class="form-control" name="fileName2" id="fileName2" data-file_detail="file_detail2" onchange="get_detail(this);" />	

                        <p id="file_detail2"></p>

                    </div>   

                    <div class="form-group  col-sm-3">

                        <label>Choose Files</label>

                        <input type="file"  class="form-control" name="fileName3" id="fileName3" data-file_detail="file_detail3" onchange="get_detail(this);" />	

                        <p id="file_detail3"></p>

                    </div>   

                    <div class="form-group  col-sm-3">

                        <label>Choose Files</label>

                        <input type="file"  class="form-control" name="fileName4" id="fileName4" data-file_detail="file_detail4" onchange="get_detail(this);" />	

                        <p id="file_detail4"></p>

                    </div>   

                </div>

                <hr class="style1">

                <label for="employee_id">Declaration *</label>

                <input type="checkbox" id="declaration" name="declaration" value="">

                <span>I hereby declare that the statement above are correct and true to the best of my knowledge and shall abide by all the rules and declarations under the Clinical Establishment (Registration and Regulation) Act-2010. I undertake that I shall intimate to the appropriate registering authority any change in the particular given above.</span>

                <div class="card-footer" align="center" >

                    <input type="submit" onclick="sure_to_submite()" name="submit" class="btn btn-primary " value="Save as Draft"></input>

                    <input type="submit" onclick="sure_to_submite()" name="submit" class="btn btn-primary " value="Apply"></input>

                    <input type="button" onclick="sure_to_submite()" class="btn btn-primary " value="Back"></input>

                    <input type="button"  class="btn btn-primary  Print_preview" value="Print_preview"></input>

                </div>



<?php echo form_close(); ?>

            </div>

            <!-- /.box-body -->

        </div>

    </section>

</div>













