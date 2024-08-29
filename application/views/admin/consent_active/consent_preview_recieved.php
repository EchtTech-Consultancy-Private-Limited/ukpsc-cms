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

</style>

<div class="content-wrapper">

    <!-- Main content -->

    <section class="content">

        <div class="card card-default color-palette-bo">

            <div class="card-header">

                <div class="d-inline-block">

                    <h3 class="card-title"> <i class="fa fa-pencil"></i>

                        &nbsp; Preview permanent Registration             

                    </h3>

                </div>

                <!--          <div class="d-inline-block float-right">

                   <a href="<?= base_url('admin/profile/change_pwd'); ?>" class="btn btn-success"><i class="fa fa-list"></i> <?= trans('change_password') ?></a>

                   </div>-->

            </div>

            <div class="card-body">

                <!-- For Messages -->

                <?php $this->load->view('admin/includes/_messages.php') ?>

                <?php echo form_open_multipart(base_url('admin/certificate/permanent_preview/' . ($id)),

                        'id="xin-form" class="form-horizontal" ') ?> 

                <h3 style="font-size: 1.00rem; ">ESTABLISHMENT DETAILS: <span style="float: right; font-size: 0.85rem;font-weight:bold;">Status: New Application</span></h3>

                <hr style="1">

                  <div class="row">

                       <div class="col-md-4">

                <div class="form-group">

                    <label for="username" class="col-sm- control-label">Name of the Clinical Establishment</label>

                   

                        <input type="hidden" name="_id"  class="form-control" id="_id" value="<?php echo $id; ?>" >

                        <input type="text" name="establishment" disabled="disabled" class="form-control" id="establishment" value="<?php echo $user['establishment'] ?>" >

                    </div>

                </div>

                 <div class="col-md-4">

                  <div class="form-group">

                     <label for="username" style="" control-label">Registration Number</label>

                     <input type="text" name="certificate_number" disabled="disable" placeholder="Registration Number" class="form-control" id="certificate_number"value="<?php echo $user['certificate_number'] ?>">

                    </div>

               </div>

               <div class="col-md-4">

                  <div class="form-group">

                     <label for="username" style="" control-label">Type</label>

                     <input type="text" name="certificate_number" disabled="disable" placeholder="Registration Number" class="form-control" id="certificate_number"value="<?php echo $user['type_fee'] ?>">

                    </div>

               </div>

               </div>

                <div class="row">

                    <div class="col-md-4">

                        <div class="form-group">

                            <label for="Address1">Address1 </label>

                            <input class="form-control" name="address1" disabled="disabled"  id="establishment_address1"  type="text" value="<?php echo $user['address1'] ?>">

                        </div>

                    </div>

                    <div class="col-md-4">

                        <div class="form-group">

                            <label for="Address2">Address2</label>

                            <input class="form-control"  name="address2" disabled="disabled" id="establishment_address2" type="text" value="<?php echo $user['address2'] ?>">

                        </div>

                    </div>

                    <div class="col-md-4">

                        <div class="form-group">

                            <label for="City" >Village/Town/City</label>

                            <input class="form-control" id="establishment_city"  disabled="disabled" name="city" type="text" value="<?php echo $user['city'] ?>">

                        </div>

                    </div>

                </div>

                <div class="row">

                    <div class="col-md-4">

                        <div class="form-group">

                            <label for="State">State/UT </label>

                            <!--<input class="form-control"   name="state" type="text" value="">-->

                            <select name="state" id="state" class="form-control dd_state" disabled="disabled" data-distric_name="establishment">

                                <option value=""><?= trans('select_state') ?></option>

                                <?php foreach ($states as

                                            $k => $state) { ?>

                                    <option value="<?= $state->id ?>" <?php if ($state->id == $user['state']) echo "selected"; ?> ><?= $state->name ?></option>

<?php } ?>

                            </select>

                        </div>

                    </div>

                    <div class="col-md-4">

                        <div class="form-group">

                            <label for="District"><?= trans('district') ?></label>

                            <!--<input class="form-control"   name="district" type="text" value="">-->

                            <select name="district" id="district_establishment" disabled="disabled" class="form-control">

                                <option value=""><?= trans('select_district') ?></option>

                                <?php foreach ($districts as

                                            $k => $district) { ?>

                                    <option value="<?= $district->id ?>"  <?php if ($district->id == $user['district']) echo "selected"; ?>><?= $district->name ?></option>

<?PHP } ?>

                            </select>

                        </div>

                    </div>

                    <div class="col-md-4">

                        <div class="form-group">

                            <label for="Pin" class="control-label">Pin code</label>

                            <input class="form-control"  id="establishment_pin" disabled="disabled" name="pin" type="number" value="<?php echo $user['pin'] ?>">

                        </div>

                    </div>

                </div>

                <div class="row">

                    <div class="col-md-4">

                        <div class="form-group">

                            <label for="STD">STD code </label>

                            <input class="form-control"  id="establishment_std" disabled="disabled" name="std" type="number" value="<?php echo $user['std'] ?>">

                        </div>

                    </div>

                    <div class="col-md-4">

                        <div class="form-group">

                            <label for="Telephone">Telephone</label>

                            <input class="form-control"  id="establishment_tele" disabled="disabled" name="telephone" type="number" value="<?php echo $user['telephone'] ?>">

                        </div>

                    </div>

                    <div class="col-md-4">

                        <div class="form-group">

                            <label for="Mobile" class="control-label">Mobile</label>

                            <input class="form-control"  id="establishment_mobile" disabled="disabled" name="mobile" type="number" value="<?php echo $user['mobile'] ?>">

                        </div>

                    </div>

                </div>

                <div class="row">

                    <div class="col-md-4">

                        <div class="form-group">

                            <label for="Fax">Fax </label>

                            <input class="form-control"  id="establishment_fax" disabled="disabled" name="fax" type="number" value="<?php echo $user['fax'] ?>">

                        </div>

                    </div>

                    <div class="col-md-4">

                        <div class="form-group">

                            <label for="email">E-mail ID</label>

                            <input class="form-control"  id="establishment_email" disabled="disabled"  name="email" type="text" value="<?php echo $user['email'] ?>">

                        </div>

                    </div>

                    <div class="col-md-4">

                        <div class="form-group">

                            <label for="Website" class="control-label">Website (if any)</label>

                            <input class="form-control"  id="establishment_web" disabled="disabled" name="website" type="text" value="<?php echo $user['website'] ?>">

                        </div>

                    </div>

                </div>

                <hr class="style1">

               <!--  <div>

                    <fieldset id="billingInfo" style="width: 100%;">

                        <label for="sameAsowner">Same as Name of the owner</label>

                        <input name="sameAsowner"   class ="same_as_above" disabled="disabled" id="sameAsowner" type="checkbox"  data-prev_block="establishment" data-data_block="owner"   value="sameAsowner" />

                </div> -->

                <label for="employee_id"> Name of the owner </label>

                <div class="row">

                    <div class="col-md-4">

                        <div class="form-group">

                            <label for="fname">First Name </label>

                            <input class="form-control dd_owner "   id="owner_fname"  disabled="disabled"  placeholder="First Name" name="fname_owner" type="text" value="<?php echo $user['fname_owner'] ?>">

                        </div>

                    </div>

                    <div class="col-md-4">

                        <div class="form-group">

                            <label for="mname">Middle Name</label>

                            <input class="form-control dd_owner"   id="owner_mname" disabled="disabled" placeholder="Patient Middle Name."  name="mname_owner" type="text" value="<?php echo $user['mname_owner'] ?>">

                        </div>

                    </div>

                    <div class="col-md-4">

                        <div class="form-group">

                            <label for="last_name" >Last Name</label>

                            <input class="form-control dd_owner"   id="owner_lname" disabled="disabled" placeholder="Last Name" name="lname_owner" type="text" value="<?php echo $user['lname_owner'] ?>">

                        </div>

                    </div>

                </div>

                <div class="row">

                    <div class="col-md-4">

                        <div class="form-group">

                            <label for="Address1">Address1 </label>

                            <input class="form-control dd_owner"  id="owner_address1" disabled="disabled"  name="add1_owner" type="text" value="<?php echo $user['add1_owner'] ?>">

                        </div>

                    </div>

                    <div class="col-md-4">

                        <div class="form-group">

                            <label for="Address2">Address2</label>

                            <input class="form-control dd_owner" id="owner_address2" disabled="disabled" name="add2_owner" type="text" value="<?php echo $user['add2_owner'] ?>">

                        </div>

                    </div>

                    <div class="col-md-4">

                        <div class="form-group">

                            <label for="Town" >Village/Town/City</label>

                            <input class="form-control dd_owner" id="owner_city" disabled="disabled"  name="city_owner" type="text" value="<?php echo $user['city_owner'] ?>">

                        </div>

                    </div>

                </div>

                <div class="row">

                    <div class="col-md-4">

                        <div class="form-group">

                            <label for="state">State/UT </label>

                            <!--<input class="form-control" required="required"  name="state_owner" type="text" value="">-->

                            <select name="state_owner" id="state2" data-autofill_name="owner" disabled="disabled" class="form-control dd_state dd_owner" data-distric_name="owner">

                                <option value=""><?= trans('select_state') ?></option>

<?php foreach ($states as $k => $state) { ?>

                                    <option value="<?= $state->id ?>" <?php if ($state->id == $user['state_owner']) echo "selected"; ?> ><?= $state->name ?></option>

<?php } ?>

                            </select>

                        </div>

                    </div>

                    <div class="col-md-4">

                        <div class="form-group">

                            <label for="District"><?= trans('district') ?></label>

                            <select name="district_owner" data-autofill_name="owner" disabled="disabled" id="district_owner" class="form-control dd_owner">

                                <option value=""><?= trans('select_district') ?></option>

<?php foreach ($districts_owner as $k => $district) { ?>

                                    <option value="<?= $district->id ?>"  <?php if ($district->id == $user['district_owner']) echo "selected"; ?>><?= $district->name ?></option>

<?PHP } ?>

                            </select>

                        </div>

                    </div>

                    <div class="col-md-4">

                        <div class="form-group">

                            <label for="Pin" class="control-label">Pin code</label>

                            <input class="form-control dd_owner" id="owner_pin"  disabled="disabled" name="pin_owner" type="number" value="<?php echo $user['pin_owner'] ?>">

                        </div>

                    </div>

                </div>

                <div class="row">

                    <div class="col-md-4">

                        <div class="form-group">

                            <label for="STD">STD code </label>

                            <input class="form-control dd_owner" id="owner_std" disabled="disabled" name="std__owner" type="number" value="<?php echo $user['std__owner'] ?>">

                        </div>

                    </div>

                    <div class="col-md-4">

                        <div class="form-group">

                            <label for="Telephone">Telephone</label>

                            <input class="form-control dd_owner"  id="owner_tele" disabled="disabled"  name="telephone_owner" type="number" value="<?php echo $user['telephone_owner'] ?>">

                        </div>

                    </div>

                    <div class="col-md-4">

                        <div class="form-group">

                            <label for="Mobile" class="control-label">Mobile</label>

                            <input class="form-control dd_owner"  id="owner_mobile" disabled="disabled" name="mobile_owner" type="number" value="<?php echo $user['mobile_owner'] ?>">

                        </div>

                    </div>

                </div>

                <div class="row">

                    <div class="col-md-4">

                        <div class="form-group">

                            <label for="Fax">Fax </label>

                            <input class="form-control dd_owner"    id="owner_fax" disabled="disabled"  name="fax_owner" type="number" value="<?php echo $user['fax_owner'] ?>">

                        </div>

                    </div>

                    <div class="col-md-4">

                        <div class="form-group">

                            <label for="email">E-mail ID</label>

                            <input class="form-control dd_owner"   id="owner_email" disabled="disabled"  name="email_owner" type="text" value="<?php echo $user['email_owner'] ?>">

                        </div>

                    </div>

                    <div class="col-md-4">

                        <div class="form-group">

                            <label for="Website" class="control-label">Website (if any)</label>

                            <input class="form-control dd_owner"   id="owner_web" disabled="disabled"  name="website_owner" type="text" value="<?php echo $user['website_owner'] ?>">

                        </div>

                    </div>

                </div>

                <hr class="style1">

                <label for="employee_id"> Name of the Person In charge </label>

                <div class="row">

                    <div class="col-md-4">

                        <div class="form-group">

                            <label for="fname">First Name </label>

                            <input class="form-control dd_person"   id="person_fname" disabled="disabled" placeholder="Patient ID" name="fname_person" type="text" value="<?php echo $user['fname_person'] ?>">

                        </div>

                    </div>

                    <div class="col-md-4">

                        <div class="form-group">

                            <label for="mname">Middle Name</label>

                            <input class="form-control dd_person"   id="person_mname" disabled="disabled" placeholder="Patient Middle Name."  name="mname_person" type="text" value="<?php echo $user['mname_person'] ?>">

                        </div>

                    </div>

                    <div class="col-md-4">

                        <div class="form-group">

                            <label for="last_name" >Last Name</label>

                            <input class="form-control dd_person"  id="person_lname" disabled="disabled" placeholder="Last Name" name="lname_person" type="text" value="<?php echo $user['lname_person'] ?>">

                        </div>

                    </div>

                </div>

                <!-- <div>

                    <fieldset id="billingInfo" style="width: 100%;">

                        <label for="sameAsowner">Same as Name of the owner</label>

                        <input name="sameAsowner"   class ="same_as_above" disabled="disabled" id="sameAsowner" type="checkbox"  data-prev_block="owner" data-data_block="person"   value="sameAsowner" />

                </div> -->

                <label style="font-weight: bold;" for="employee_id">Medical Qualification </label>

                <div class="row">

                    <div class="col-md-4">

                        <div class="form-group">

                            <label for="degree">Degree :*</label>

                            <select name="degree" data-child_id="catogory_1" disabled="disabled" id="Degree" class="degree form-control select2-hidden-accessible" data-plugin="select_hrm" data-placeholder="Select" tabindex="-1" aria-hidden="true">

                                <option value="0"> Select Degree </option>

                                <?php if (!empty($medical_degree)) {

                                    foreach ($medical_degree as $k => $v) {

                                        ?>

                                        <option value="<?php echo $v['id'] ?>"   <?php if ($v['id'] == $user['degree']) echo "selected"; ?> > <?php echo $v['name'] ?></option>

    <?php }

}

?>

                            </select>

                        </div>

                    </div>

                    <div class="col-md-4" id="degree_1"  >

                        <div class="form-group">

                            <label for="catogory" id="base_sector" >Category*</label>

                            <select name="catogory_1" data-child_id="catogory_2" disabled="disabled" id="catogory_1" class="degree form-control select2-hidden-accessible" data-plugin="select_hrm" data-placeholder="Select " tabindex="-1" aria-hidden="true">

                                <option value="0"> Select Category </option>

<?php if (!empty($medical_catogory_1)) {

    foreach ($medical_catogory_1 as $k => $v) {

        ?>

                                        <option value="<?php echo $v['id'] ?>"   <?php if ($v['id'] == $user['catogory_1']) echo "selected"; ?> > <?php echo $v['name'] ?></option>

    <?php }

}

?>

                            </select>

                        </div>

                    </div>

                    <div class="col-md-4">

                        <div class="form-group">

                            <label for="catogory_2">Sub Category* </label>

                            <select name="catogory_2" data-child_id="catogory_3"  disabled="disabled" id="catogory_2" class="degree form-control select2-hidden-accessible" data-plugin="select_hrm" data-placeholder="Select " tabindex="-1" aria-hidden="true">

                                <option value="0"> Select Sub Category </option>

<?php if (!empty($medical_catogory_2)) {

    foreach ($medical_catogory_2 as $k => $v) {

        ?>

                                        <option value="<?php echo $v['id'] ?>"   <?php if ($v['id'] == $user['catogory_2']) echo "selected"; ?> > <?php echo $v['name'] ?></option>

    <?php }

}

?>

                            </select>

                        </div>

                    </div>

                    <div class="col-md-4">

                        <div class="form-group">

                            <label for="person_registration">Registration Number </label>

                            <input class="form-control dd_person" placeholder="Registration Number"  disabled="disabled" id="person_registration" name="person_registration" type="number" value="<?php echo $user['telephone_person'] ?>">

                        </div>

                    </div>

                    <div class="col-md-4">

                        <div class="form-group">

                            <label for="person_central_cauncil">Name of Central/State Council (with which registered):</label>

                            <input class="form-control dd_person" placeholder="Name of Central/State Council (with which registered):" disabled="disabled" id="person_central_cauncil" name="person_central_cauncil" type="text" value="<?php echo $user['person_central_cauncil'] ?>">

                        </div>

                    </div>

                    <div class="col-md-4">

                        <div class="form-group">

                            <label for="STD">STD Code </label>

                            <input class="form-control dd_person" placeholder="STD Code" id="person_std" disabled="disabled" name="std_person" type="number" value="<?php echo $user['std_person'] ?>">

                        </div>

                    </div>

                </div>

                <div class="row">

                    <div class="col-md-4">

                        <div class="form-group">

                            <label for="Telephone">Telephone</label>

                            <input class="form-control dd_person"  id="person_tele" disabled="disabled" name="telephone_person" type="number" value="<?php echo $user['telephone_person'] ?>">

                        </div>

                    </div>

                    <div class="col-md-4">

                        <div class="form-group">

                            <label for="Mobile" class="control-label">Mobile</label>

                            <input class="form-control dd_person" id="person_mobile" disabled="disabled"  name="mobile_person" type="number" value="<?php echo $user['mobile_person'] ?>">

                        </div>

                    </div>

                    <div class="col-md-4">

                        <div class="form-group">

                            <label for="email">E-mail ID</label>

                            <input class="form-control dd_person"  id="person_email" disabled="disabled"  name="email_person" type="text" value="<?php echo $user['email_person'] ?>">

                        </div>

                    </div>

                </div>

                <hr class="style1">

                <div class="row">

                    <div class="col-md-4">

                        <div class="form-group">

                            <label for="Ownership">Ownership </label>

                            <select name="ownership" id="Ownership" disabled="disabled" class="form-control select2-hidden-accessible" data-plugin="select_hrm" data-placeholder="Select Gender" tabindex="-1" aria-hidden="true">

                                <option value="0"> Select Ownership </option>

<?php

if (!empty($ownership_level)) {

    foreach ($ownership_level as $k => $v) {

        ?>

                                        <option value="<?php echo $v['id'] ?>" <?php if ($user['ownership'] == $v['id']) echo "selected"; ?>  > <?php echo $v['name'] ?></option>

                                    <?php

                                    }

                                }

                                ?>

                            </select>

                        </div>

                    </div>

                    <div class="col-md-4" id="Ownership_1" >

                        <div class="form-group">

                            <label for="show_owners" id="base_sector">Private Sector</label>

                            <select name="ownership2" id="show_owners"  disabled="disabled" class="form-control select2-hidden-accessible" data-plugin="select_hrm" data-placeholder="Select Gender" tabindex="-1" aria-hidden="true">

                                <option value="0">Select Ownership</option>

<?php

if (!empty($ownership_level2)) {

    foreach ($ownership_level2 as $k => $v) {

        ?>

                                        <option value="<?php echo $v['id'] ?>" <?php if ($user['ownership2'] == $v['id']) echo "selected"; ?>  > <?php echo $v['name'] ?></option>

                            <?php

                            }

                        }

                        ?>

                            </select>

                        </div>

                    </div>

                </div>

                <hr class="style1">

                <label for="employee_id"> Systems of Medicine: (please tick whichever is applicable) - You can select more than one options  </label>

                <div class="col-md-12">

                    <div class="row mb-3">

                                <?php

                                $checked_arr = explode(",",

                                        $user['systems_of_medicine']);

                                foreach (SYSTEMS_OF_MEDICINE as $k => $v) {

                                    if (in_array($k, $checked_arr)) {

                                        $checked = "checked";

                                    } else

                                        $checked = "";

                                    ?>

                            <div class="col-md-3 pb-3"> 

                                <span class="pull-left">

                                    <input type="checkbox" class="tgl " disabled="disabled" <?php echo $checked; ?> name="systems_of_medicine[]" id="<?= $k ?>" value="<?= $k ?>">

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

                        <select name="clinical_services" disabled="disabled" id="clinical_services" class="form-control select2-hidden-accessible" data-plugin="select_hrm" data-placeholder="Select Gender" tabindex="-1" aria-hidden="true">

                            <option value="0"> Select Clinical Services </option>

                                <?php

                                foreach (CLINICAL_SERVICES as $k => $v) {

                                    ?>

                                <option value="<?= $k ?>" <?php if ($user['clinical_services'] == $k) echo "selected"; ?>  > <?= $v ?></option>

                                <?php } ?>

                        </select>

                    </div>

                </div>

                <hr class="style1">

                <label for="employee_id"> Type of Clinical Establishment: (please tick whichever is applicable) - You can select more than one options : *</label>

                <div  class="row">

                    <div class="col-md-12 ">

                        <span id="a"  class="a" style="font-weight:bold;">a)</span>  

                        <div class="col-md-12"  style="">

                            <ul  id="example">

                                <?php

                                $arr_selected_estab = explode(',',

                                        $user['clinical_establishment']);



                                foreach ($rootClinicalEstablishment as $k => $v) {

                                    $nole_address = "0_" . $v['id'];



                                    if (in_array($v['id'], $arr_selected_estab))

                                        $is_checked = 'checked';

                                    else

                                        $is_checked = '';



                                    //                            echo '<li class="li_root"><input type="checkbox" name="clinical_establishment[]" data-nole_address="'.$nole_address.'" '. $is_checked.' value="'.$v['id'].'" />' . $v['name'];

                                    echo '<li  class="li_root">';

                                    if ($v['child_count'] <= 0)

                                        echo '<input  type="text" disabled="disabled" name="clinical_establishment[]" data-nole_address="' . $nole_address . '" ' . $is_checked . ' value="' . $v['id'] . '" />';

                                    echo $v['name'];

                                    get_clinical_establishment_child($v['id'],

                                            $nole_address, $arr_selected_estab);

                                    echo '</li>';

                                }

                                ?>

                            </ul>

                        </div>

                    </div>

                </div>

                <hr class="style1">

                <label for="infrastructure" style="font-size:16px;" >INFRASTRUCTURE DETAILS:*</label>

                <div class="row">

                    <div class="col-md-4 "><span id="a" class="a" style="font-weight:bold;">a). Area of the establishment (in sqft):</span>  

                        <input type="text" class="tgl form-control " disabled="disabled" placeholder="Area of the establishment" name="area_establishmet" id="area_establishmet" value="<?php echo $user['area_establishmet'] ?>" >   

                    </div>

                    <div class="col-md-4  "><span id="a" class="a" style="font-weight:bold;">b). Constructed area :</span>  

                        <input type="text" class="tgl form-control " disabled="disabled" placeholder="Constructed area" name="constructed_area" id="constructed_area" value="<?php echo $user['constructed_area'] ?>" >   

                    </div>

                </div>

                <hr class="style1">

                <label for="out_patient"><u>Out Patient Department:*</u></label>

                <div class="row">

                    <div class="col-md-4  "><span id="a" class="a" style="font-weight:bold;">a). Total no. of OPD Clinics:</span>  

                        <input type="text" class="tgl form-control" disabled="disabled" placeholder="Total no. of OPD Clinics" name="opd_clinics" id="opd_clinics" value="<?php echo $user['opd_clinics'] ?>" >   

                    </div>

                </div>

                <hr class="style1">

                <label for="employee_id"><u>Specialty-wise distribution of OPD Clinic:*</u></label>

                <div class="row">

                    <div class="datalist">

                        <table style="border:1px solid black;margin-left:auto;margin-right:auto; id="example1" class="table table-bordered table-hover">

                            <thead>

                                <tr>

                                    <th>S.No.</th>

                                    <th>Specialty</th>

                                </tr>

                            </thead>

                            <tbody>

                                <tr>

                                    <td> <input type="number" disabled="disabled" placeholder="S.No"  name="serial_no1" id="serial_no1" class="form-control" value="<?php echo $user['serial_no1'] ?>" >   </td>

                                    <td> <input type="text" disabled="disabled" placeholder="Specialty" name="specialty_no1" id="specialty_no1" class="form-control" value="<?php echo $user['specialty_no1'] ?>" >   </td>

                                </tr>

                                <tr>

                                    <td> <input type="number" disabled="disabled" placeholder="S.No"  name="serial_no2" id="serial_no2" class="form-control" value="<?php echo $user['serial_no2'] ?>" >   </td>

                                    <td> <input type="text" disabled="disabled" placeholder="Specialty" name="specialty_no2" id="specialty_no2" class="form-control" value="<?php echo $user['specialty_no2'] ?>" >   </td>

                                </tr>

                                <tr>

                                    <td> <input type="number" disabled="disabled" placeholder="S.No"  name="serial_no3" id="serial_no3" class="form-control" value="<?php echo $user['serial_no3'] ?>" >   </td>

                                    <td> <input type="text" disabled="disabled" placeholder="Specialty" name="specialty_no3" id="specialty_no3" class="form-control" value="<?php echo $user['specialty_no3'] ?>" >   </td>

                                </tr>

                                <tr>

                                    <td> <input type="number" disabled="disabled" placeholder="S.No"  name="serial_no4" id="serial_no4" class="form-control" value="<?php echo $user['serial_no4'] ?>" >   </td>

                                    <td> <input type="text" disabled="disabled" placeholder="Specialty" name="specialty_no4" id="specialty_no4" class="form-control" value="<?php echo $user['specialty_no4'] ?>" >   </td>

                                </tr>

                            </tbody>

                        </table>

                        </table>

                    </div>

                </div>

                <hr class="style1">

                <label for="employee_id" style="font-size:16px;" >In Patient Department:*</label>

                <div class="row">

                    <div class="col-md-2 "><span id="a" class="a" style="font-weight:bold;">Total number of beds:</span>  

                        <input type="text" class="tgl form-control " placeholder="No. of Beds " name="totalbeds" id="totalbeds" disabled value="<?php echo $user['totalbeds'] ?>" >   

                    </div>

                </div>

                <hr class="style1">

                <label for="employee_id"><u>Specialty-wise distribution of beds, please specify:*</u></label>

                <div class="row">

                    <div class="datalist">

                        <table style="border:1px solid black;margin-left:auto;margin-right:auto; id="example1" class="table table-bordered table-hover">

                            <thead>

                                <tr>

                                    <th>S.No.</th>

                                    <th>Specialty</th>

                                    <th>Beds</th>

                                </tr>

                            </thead>

                            <tbody>

                                <tr>

                                    <td> <input type="number" disabled="disabled" placeholder="S.No" name="serial_no5" id="serial_no5" class="form-control" value="<?php echo $user['serial_no5'] ?>" >   </td>

                                    <td> <input type="text" disabled="disabled" placeholder="Specialty"  name="specialty_no5" id="specialty_no5" class="form-control" value="<?php echo $user['specialty_no5'] ?>" >   </td>

                                    <td> <input type="number" disabled="disabled" placeholder="Beds"  name="specialty_bed1" id="specialty_bed1" class="form-control" value="<?php echo $user['specialty_bed1'] ?>" >   </td>

                                </tr>

                                <tr>

                                    <td> <input type="number" disabled="disabled" placeholder="S.No" name="serial_no6" id="serial_no6" class="form-control" value="<?php echo $user['serial_no6'] ?>" >   </td>

                                    <td> <input type="text" disabled="disabled" placeholder="Specialty" name="specialty_no6" id="specialty_no6" class="form-control" value="<?php echo $user['specialty_no6'] ?>" >   </td>

                                    <td> <input type="number" disabled="disabled" placeholder="Beds" name="specialty_bed2" id="specialty_bed2" class="form-control" value="<?php echo $user['specialty_bed2'] ?>" >   </td>

                                </tr>

                                <tr>

                                    <td> <input type="number" disabled="disabled" placeholder="S.No" name="serial_no7" id="serial_no7" class="form-control" value="<?php echo $user['serial_no7'] ?>" >   </td>

                                    <td> <input type="text" disabled="disabled" placeholder="Specialty" name="specialty_no7" id="specialty_no7" class="form-control" value="<?php echo $user['specialty_no7'] ?>" >   </td>

                                    <td> <input type="number" disabled="disabled" placeholder="Beds"  name="specialty_bed3" id="specialty_bed3" class="form-control" value="<?php echo $user['specialty_bed3'] ?>" >   </td>

                                </tr>

                                <tr>

                                    <td> <input type="number" disabled="disabled" placeholder="S.No" name="serial_no8" id="serial_no8" class="form-control" value="<?php echo $user['serial_no8'] ?>" >   </td>

                                    <td> <input type="text" disabled="disabled" placeholder="Specialty" name="specialty_no8" id="specialty_no8" class="form-control" value="<?php echo $user['specialty_no8'] ?>" >   </td>

                                    <td> <input type="number" disabled="disabled" placeholder="Beds"  name="specialty_bed4" id="specialty_bed4" class="form-control" value="<?php echo $user['specialty_bed4'] ?>" >   </td>

                                </tr>

                                <tr>

                                    <td> <input type="number" disabled="disabled" placeholder="S.No"  name="serial_no9" id="serial_no9" class="form-control" value="<?php echo $user['serial_no9'] ?>" >   </td>

                                    <td> <input type="text" disabled="disabled" placeholder="Specialty" name="specialty_no9" id="specialty_no9" class="form-control" value="<?php echo $user['specialty_no9'] ?>" >   </td>

                                    <td> <input type="number" disabled="disabled" placeholder="Beds"  name="specialty_bed5" id="specialty_bed5" class="form-control" value="<?php echo $user['specialty_bed5'] ?>" >   </td>

                                </tr>

                            </tbody>

                        </table>

                    </div>

                </div>

                <hr class="style1">

                <label for="employee_id"><u>Biomedical waste Management:</u></label>

                <div class="col-md-12">

                    <div class="row mb-3">

                        <div class="col-md-3 pb-3"> 

                            <span class="pull-left">

                                <input type="radio" class="tgl " disabled="disabled" value="1" name="common_facility" id="common_facility" class="form-control"  onclick="ShowHideDiv(this)" 

<?php if ($user['common_facility'] == "1") {

    echo "checked";

} ?>>   

                                <label for="employee_id"><?= BIOMEDICAL_WASTE[1] ?></label> 

                            </span>

                            <span class="mt-15 pl-3">

                            </span>

                        </div>

                        <div class="col-md-3 pb-3"> 

                            <span class="pull-left">

                                <input type="radio" class="tgl " disabled="disabled" value="2" name="common_facility" id="onsite_facility" class="form-control" onclick="ShowHideDiv(this)"

<?php if ($user['common_facility'] == "2") {

    echo "checked";

} ?>>   

                                <label for="employee_id"><?= BIOMEDICAL_WASTE[2] ?></label> 

                            </span>

                            <span class="mt-15 pl-3">

                            </span>

                        </div>

                        <div class="col-md-3 pb-3">

                            <span class="pull-left">

                                <input type="radio" class="tgl " disabled="disabled" value="3" name="common_facility" id="any_other_facility" class="form-control" onclick="ShowHideDiv(this)" 

<?php if ($user['common_facility'] == "3") {

    echo "checked";

} ?>>

                                <label for="employee_id"><?= BIOMEDICAL_WASTE[3] ?></label> 

                                <div id="dvPassport" name="common_facility" style="display: none">

                                    Please specify:

                                    <textarea id="w3review" disabled="disabled" name="w3review" rows="4" cols="50">

                                    </textarea>

                                    <span class="mt-15 pl-3">

                                    </span>

                                </div>

                        </div>

                    </div>

                </div>

                <hr class="style1">

                <label for="employee_id"><u>Whether authorization from Pollution Control Board/Pollution Control Committee obtained?</u></label>

                <div class="col-md-12">

                    <div class="row mb-3">

                        <div class="col-md-3 pb-3"> 

                            <span class="pull-left">

                                <input type="radio" class="tgl "  disabled="disabled" name="auth_yes" id="auth_yes" class="form-control" value="1"   <?php if ($user['auth_yes'] == "1") {

    echo "checked";

} ?>    >   

                                <label for="employee_id"><?= POLLUTION_CONTROL[1] ?></label> 

                            </span> 

                            <span class="mt-15 pl-3">

                            </span>

                        </div>

                        <div class="col-md-3 pb-3"> 

                            <span class="pull-left">

                                <input type="radio" class="tgl " disabled="disabled" name="auth_yes" id="auth_no" class="form-control"  value="2"  <?php if ($user['auth_yes'] == "2") {

    echo "checked";

} ?>  >   

                                <label for="employee_id"><?= POLLUTION_CONTROL[2] ?></label> 

                            </span>

                            <span class="mt-15 pl-3">

                            </span>

                        </div>

                        <div class="col-md-3 pb-3">

                            <span class="pull-left">

                                <input type="radio" class="tgl " disabled="disabled" name="auth_yes" id="auth_aplied_for" class="form-control" value="3" <?php if ($user['auth_yes'] == "3") {

    echo "checked";

} ?> >

                                <label for="employee_id"><?= POLLUTION_CONTROL[3] ?></label>

                                <div id="dvPassport" name="common_facility" style="display: none">

                                    Please specify:

                                    <textarea id="w3review"  disabled="disabled" name="w3review" rows="4" cols="50">

                                    </textarea>

                                    <span class="mt-15 pl-3">

                                    </span>

                                </div>

                        </div>

                        <div class="col-md-3 pb-3">

                            <span class="pull-left">

                                <input type="radio" class="tgl " disabled="disabled" name="auth_yes" id="auth_not_apllicable" class="form-control" value="4" <?php if ($user['auth_yes'] == "4") {

    echo "checked";

} ?> >

                                <label for="employee_id"><?= POLLUTION_CONTROL[4] ?></label>

                                <div id="dvPassport" name="common_facility" style="display: none">

                                    Please specify:

                                    <textarea id="w3review"  disabled="disabled" name="w3review" rows="4" cols="50">

                                    </textarea>

                                    <span class="mt-15 pl-3">

                                    </span>

                                </div>

                        </div>

                    </div>

                </div>

                <hr class="style1">

                <label for="human_resource" style="font-size:16px;" ><b>HUMAN RESOURCES *</b></label> <br>

                <label for="total_no_staff"><u>Total number of Staff (as on date of application):</u></label>

                <div class="row">

                    <div class="col-md-4 "><span id="a" class="a" style="font-weight:bold;">No. of permanent staff: *</span>

                        <input type="text"  disabled="disabled" class="tgl form-control " placeholder="No. of permanent staff" name="permanent_staff" id="permanent_staff" value="<?php echo $user['permanent_staff'] ?>" >   

                    </div>

                    <div class="col-md-4 "><span id="a" class="a" style="font-weight:bold;">No. of temporary staff :*</span>  

                        <input type="text" disabled="disabled"  class="tgl form-control " placeholder="No. of temporary staff" name="temporary_staff" id="temporary_staff" value="<?php echo $user['temporary_staff'] ?>" >   

                    </div>

                </div>

                <hr class="style1">

                <label for="employee_id"><u>Please furnish the following details:-</u>-</label>

                <div class="row">

                    <div class="datalist">

                        <table style="border:1px solid black;margin-left:auto;margin-right:auto; id="example1" class="table table-bordered table-hover">

                            <thead>

                                <tr>

                                    <th>Category of staff </th>

                                    <th>Name</th>

                                </tr>

                            </thead>

                            <tbody>

                                <tr>

                                    <td>Doctors</td>

                                    <td> <input type="text" disabled="disabled" placeholder="Number" name="doctor_name" id="doctor_name" class="form-control" value="<?php echo $user['doctor_name'] ?>" >   </td>



                                </tr>

                                <tr>

                                    <td>Nursing staff</td>

                                    <td> <input type="text" disabled="disabled" placeholder="Number" name="nurshing_name" id="nurshing_name" class="form-control" value="<?php echo $user['nurshing_name'] ?>" >   </td>



                                </tr>

                                <tr>

                                    <td>Para-medical staff</td>

                                    <td> <input type="text" disabled="disabled" placeholder="Number" name="para_name" id="para_name" class="form-control" value="<?php echo $user['para_name'] ?>" >   </td>



                                <tr>

                                    <td>Pharmacists</td>

                                    <td> <input type="text" disabled="disabled" placeholder="Number" name="pharmacists_name" id="pharmacists_name" class="form-control" value="<?php echo $user['pharmacists_name'] ?>" >   </td>



                                </tr>

                                <tr>

                                    <td>Administrative staff's</td>

                                    <td> <input type="text" disabled="disabled" placeholder="Number" name="administrative_name" id="administrative_name" class="form-control" value="<?php echo $user['administrative_name'] ?>" >   </td>



                                </tr>

                                <tr>

                                    <td>Others, please specify</td>

                                    <td> <input type="text" disabled="disabled" placeholder="Number" name="others_name" id="others_name" class="form-control" value="<?php echo $user['others_name'] ?>" >   </td>



                                </tr>

                            </tbody>

                        </table>

                        </table>        

                    </div>

                </div>

                <label for="employee_id"><i>Separate annexure may be attached. </i></label>

                <hr class="style1">

                <label for="employee_id"><u>Support Staff *</u></label>

                <div class="row">

                    <div class="datalist">

                        <table style="border:1px solid black;margin-left:auto;margin-right:auto; id="example1" class="table table-bordered table-hover">

                            <thead>

                                <tr>

                                    <th>Category</th>

                                    <th>Total no. </th>

                                    <th>Remark</th>

                                </tr>

                            </thead>

                            <tbody>

                                <tr>

                                    <td> <input type="text" disabled="disabled" placeholder="Category" name="cat_1" id="cat_1" class="form-control" value="<?php echo $user['cat_1'] ?>" >   </td>

                                    <td> <input type="number" disabled="disabled" placeholder="Total no." name="totl_1" id="totl_1" class="form-control" value="<?php echo $user['totl_1'] ?>" >   </td>

                                    <td> <input type="text" disabled="disabled" placeholder="Remark" name="remark_1" id="remark_1" class="form-control" value="<?php echo $user['remark_1'] ?>" >   </td>

                                </tr>

                                <tr>

                                    <td> <input type="text" disabled="disabled" placeholder="Category" name="cat_2" id="cat_2" class="form-control" value="<?php echo $user['cat_2'] ?>" >   </td>

                                    <td> <input type="number" disabled="disabled" placeholder="Total no." name="totl_2" id="totl_2" class="form-control" value="<?php echo $user['totl_2'] ?>" >   </td>

                                    <td> <input type="text" disabled="disabled" placeholder="Remark" name="remark_2" id="remark_2" class="form-control" value="<?php echo $user['remark_2'] ?>" >   </td>

                                </tr>

                                <tr>

                                    <td> <input type="text" disabled="disabled" placeholder="Category" name="cat_3" id="cat_3" class="form-control" value="<?php echo $user['cat_3'] ?>" >   </td>

                                    <td> <input type="number" disabled="disabled" placeholder="Total no." name="totl_3" id="totl_3" class="form-control" value="<?php echo $user['totl_3'] ?>" >   </td>

                                    <td> <input type="text" disabled="disabled" placeholder="Remark" name="remark_3" id="remark_3" class="form-control" value="<?php echo $user['remark_3'] ?>" >   </td>

                                </tr>

                            </tbody>

                        </table>

                    </div>

                </div>

                <hr class="style1">

                <label for="employee_id">  <u>Payment options for Registration Fees *:</u></label>

                <div class="col-md-12">

                    <div class="row mb-3" >

                        <div class="col-md-3 pb-3"> 

                            <span class="pull-left">

                                <input type="radio" class="tgl "disabled="disabled"  name="payment_op"  id="online_payments" class="form-control" value="1"  

<?php if ($user['payment_op'] == "1") {

    echo "checked";

} ?>>   

                                <label for="employee_id"><?= PAYMENT_OPTIONS[1] ?></label> &nbsp &nbsp &nbsp &nbsp

                            </span>

                            <span class="mt-15 pl-3">

                            </span>

                        </div>

                        <div class="col-md-3 pb-3"> 

                            <span class="pull-left">

                                <input type="radio" class="tgl " disabled="disabled" name="payment_op" id="demand_draft" class="form-control" value="2"  

<?php if ($user['payment_op'] == "2") {

    echo "checked";

} ?>>   

                                <label for="employee_id"><?= PAYMENT_OPTIONS[2] ?></label> &nbsp &nbsp &nbsp &nbsp

                            </span>

                            <span class="mt-15 pl-3">

                            </span>

                        </div>

                        <div class="col-md-3 pb-3">

                            <span class="pull-left">

                                <input type="radio" class="tgl " disabled="disabled" name="payment_op" id="bank_chalan" class="form-control" value="3" 

<?php if ($user['payment_op'] == "3") {

    echo "checked";

} ?>>

                                <label for="employee_id"><?= PAYMENT_OPTIONS[3] ?></label> &nbsp &nbsp &nbsp &nbsp

                        </div>

                    </div>

                </div>

                <hr class="style1">

                <label for="employee_id"><u>Declaration *</u></label> <br>

                <span>i'm

                    <input type="text" class="tgl " disabled="disabled"  value="<?php echo $user['fname_owner'] ?>" name="declaration"  > </span>  

                on behalf of myself and the company/ 

                society/association/body hereby declare that the statements above are correct and  true to the best of 

                my knowledge and I shall abide by all the provisions made under the Clinical Establishment 

                (Registration and Regulation) Act 2010. 

                I undertake that I shall inform the DistrictRegistering Authority of any changes in the particulars 

                given above.

                I shall comply with the minimum standards prescribed under Clinical Establishment Act for the 

                services provided by us and also all other conditions of registration as stipulated under the aforesaid 

                Act and Rule there-under.</span>

                <hr class="style1">

                <div class="row">

                    <table>

                        <thead>

                        </thead>

                        <tbody>

                            <tr>

                                <td>Date</td>

                                <td> <input type="text" disabled="disabled" placeholder="<?php

echo date("Y/m/d");

?>"  </td>

                            </tr>

                            <tr>

                                <td>Place</td>

                                <td> <input type="text" disabled="disabled" placeholder="Place" </td>

                            </tr>

                        </tbody>

                    </table>

                </div>

                <hr class="style1">

                <label for="employee_id">File Upload *</label>

                <div class="row">

                    <div class="form-group  col-sm-2">

                     

                        <span class="pull-left">

                            <input type="text" disabled="disabled" placeholder="Category" name="cat_3" id="cat_3" class="form-control" value="<?php echo $user['fileName1'] ?>" > 

                            <label for="employee_id"><?= FILE_UPLOAD[1] ?></label> 

                        </span>



                    </div>

                    <div class="form-group  col-sm-2">

                        <span class="pull-left">

                           <input type="text" disabled="disabled" placeholder="Category" name="cat_3" id="cat_3" class="form-control" value="<?php echo $user['fileName2'] ?>" >  

                            <label for="employee_id"><?= FILE_UPLOAD[2] ?></label> 

                        </span>

                    </div>

                    <div class="form-group  col-sm-2">

                        <span class="pull-left">

                            <input type="text" disabled="disabled" placeholder="Category" name="cat_3" id="cat_3" class="form-control" value="<?php echo $user['fileName3'] ?>" >   

                            <label for="employee_id"><?= FILE_UPLOAD[3] ?></label> 

                        </span>

                    </div>

                    <div class="form-group  col-sm-2">

                        <!--                        <label>Choose Files</label>

                           <input type="file"  class="form-control" name="fileName4" id="fileName4" data-file_detail="file_detail4"onchange="get_detail(this);" />	

                           <p id="file_detail4"></p>-->

                        <span class="pull-left">

                          <input type="text" disabled="disabled" placeholder="Category" name="cat_3" id="cat_3" class="form-control" value="<?php echo $user['fileName4'] ?>" >    

                            <label for="employee_id"><?= FILE_UPLOAD[4] ?></label> 

                        </span>

                    </div>

        <!--             <div class="form-group  col-sm-2">

                     

                        <span class="pull-left">

                            <input type="file" class="form-control"  value="5" name="fileName5" id="fileName3" data-file_detail="file_detail5" onchange="get_detail(this);"

 if //($user['fileName5'] == 5)  >   

                            <label for="employee_id"><?= FILE_UPLOAD[5] ?></label> 

                        </span>

                    </div> -->

                </div>

                <div class="card-footer" align="center" >

                     <input type="button" onclick="window.history.go(-1)" class="btn btn-primary " value="Back"></input>

                    <input type="button" class="btn btn-primary  Print_preview" value="Print Preview"></input>

                </div>

<?php echo form_close(); ?>

            </div>

            <!-- /.box-body -->

        </div>

    </section>

</div>

<script type="text/javascript">

    

    $(document).ready(function () {





        $(".Print_preview").click(function () {

            alert("Click Ok!!");

            window.print();

        });

    })

</script>

<script type="text/javascript" src="<?= base_url() ?>assets/dist/js/jquery.collapsibleCheckboxTree.js"></script>