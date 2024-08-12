<?php //echo '<pre>';print_r($admin);exit; ?>

<?php  if($_SESSION['admin_role_id'] != 1 &&  $_SESSION['admin_role_id'] != 5){  ?>



<div class="content-wrapper">

    <!-- Main content -->

    <section class="content">

        <div class="card card-default color-palette-bo">

            <div class="card-header">

                <div class="d-inline-block">

                    <h3 class="card-title">

                        <i class="fa fa-user mr-1"></i>

                        Profile

                    </h3>

                </div>

                <div class="d-inline-block float-right">

                </div>

            </div>

            <div class="card-body">

                <!-- For Messages -->

                <?php $this->load->view('admin/includes/_messages.php') ?>

                <?php echo form_open(base_url('admin/profile'), 'class="form-horizontal"' )?>

                <!-- 

                    </div> -->

                <div class="row">

                    <div class="col-md-4">

                        <div class="form-group">

                            <label for="username" class="col-sm- control-label">School Registration No.<br />(स्कूल

                                पंजीकरण संख्या)</label>

                            <input type="hidden" value="<?php echo $_SESSION['admin_role_id']; ?>" class="form-control"

                                id="admin_id" placeholder="">

                            <input type="text" name="school_registration_number" readonly

                                value="<?= $admin['school_registration_number']; ?>" class="form-control"

                                id="school_registration_number" placeholder="">

                        </div>

                    </div>

                    <div class="col-md-4">

                        <div class="form-group">

                            <label for="firstname" class="col-sm- control-label">School/College/Institute

                                Name<br />(स्कूल/कॉलेज/संस्थान का नाम)</label>

                            <div class="col-md-12">

                                <input type="text" name="school_name" readonly value="<?= $admin['school_name']; ?>"

                                    class="form-control" id="school_name" placeholder="">

                            </div>

                        </div>

                    </div>

                    <div class="col-md-4">

                        <div class="form-group">

                            <label for="lastname" class="col-sm- control-label">Address<br />(पता)</label>

                            <input type="text" name="address" readonly value="<?= $admin['address']; ?>"

                                class="form-control" id="address" placeholder="">

                        </div>

                    </div>

                </div>

                <div class="row">

                    <div class="col-md-4" id="emai_superadmin">

                        <div class="form-group">

                            <label for="email" class="col-sm- control-label">Landmark<br />(सीमाचिह्न)</label>

                            <input type="landmark" name="landmark" readonly value="<?= $admin['landmark']; ?>"

                                class="form-control" id="landmark" placeholder="">

                            <!-- <input type="text" class="form-control" id="sup_mail" > -->

                        </div>

                    </div>

                    <div class="col-md-4" id="emai_all">

                        <div class="form-group">

                            <label for="email" class="col-sm- control-label"> District<br />(जिला)</label>

                            <input type="text" name="district" readonly class="form-control" id="district" value="<?= get_district_name($admin['district']); ?>">

                        </div>

                    </div>

                    <div class="col-md-4">

                        <div class="form-group">

                            <label for="mobile_no" class="col-sm- control-label">City<br />(शहर)</label>

                            <input type="text" name="city" readonly value="<?= get_subcity_name($admin['city']); ?>"

                                class="form-control" id="city" placeholder="">



                        </div>

                    </div>

                    <div class="col-md-4" id="all_user">

                        <div class="form-group">

                            <label for="mobile_no" class="col-sm- control-label">Principal Name<br />(प्राचार्य का

                                नाम)</label>

                            <input type="text" class="form-control" readonly name="principal_name" id="principal_name"

                                value="<?= $admin['principal_name']; ?>">

                        </div>

                    </div>





                </div>



                <div class="row">

                    <div class="col-md-4" id="all_user">

                        <div class="form-group">

                            <label for="mobile_no" class="col-sm- control-label">Mobile No.<br />(मोबाइल नंबर)</label>

                            <input type="text" class="form-control" readonly name="pri_mobile" id="pri_mobile"

                                value="<?= $admin['pri_mobile']; ?>">

                        </div>

                    </div>

                    <div class="col-md-4">

                        <div class="form-group">

                            <label for="state" class="col-md-12 control-label"> Email ID<br />(ईमेल आईडी) </label>

                            <input type="text" name="email" readonly value="<?php echo ($admin['email']); ?>"

                                class="form-control" id="email" placeholder="">

                        </div>

                    </div>

                    <div class="col-md-4">

                        <div class="form-group  ">

                            <label for="district" class="col-md-12 control-label">Whats App No.<br />(व्हाट्सएप

                                नंबर)</label>

                            <input type="text" name="whats_num" readonly value="<?php echo ($admin['whats_num']); ?>"

                                class="form-control" id="whats_num" placeholder="">

                        </div>

                    </div>



                </div>



                <div class="form-group mb-0" style="text-align:center;">

                    <div class="col-md-12 mt-4">

                        <!-- <input type="submit" name="submit" value="Update Admin" class="btn btn-primary pull-right"> -->

                        <input type="button" onclick="window.history.go(-1)" class="btn btn-sec"

                            value="Back"></input>

                            
                          

                    </div>

                </div>

                <?php echo form_close(); ?>

            </div>

            <!-- /.box-body -->

        </div>

    </section>

</div>

<?php    } else { ?>



<div class="content-wrapper">

    <!-- Main content -->

    <section class="content">

        <div class="card card-default color-palette-bo">

            <div class="card-header">

                <div class="d-inline-block">

                    <h3 class="card-title"> <i class="fa fa-plus"></i>

                        <!-- <?php //echo trans('add_new_admin') ?> </h3> -->

                        <?= trans('user_profile') ?> </h3>

                </div>



            </div>

            <div class="card-body">





                <?php echo form_open(base_url('admin/admin/add'), 'id="xin-form" class="form-horizontal" '); ?>

                <div class="row">

                    <div class="col-md-4">

                        <div class="form-group ">

                            <label for="role" class="col-md-12 control-label"><?= trans('select_admin_role') ?><span style="color:red;font-weight:bold">*</span></label>

                            <input type="text" name="firstname" class="form-control" id="firstname" placeholder="Enter first Name" value="<?= get_admin_role($admin['admin_role_id']); ?>" readonly>

                            <?php //set_select('role') ?>

                            <!-- <select name="role" id="role" class="form-control">

                                <option value=""><?php // trans('select_role') ?></option>

                                <?php //foreach ($admin_roles as $role): ?>

                                <option value="<?php // $role['admin_role_id']; ?>"

                                    <?php //echo set_select('role', $role['admin_role_id']); ?>>

                                    <?php //$role['admin_role_title']; ?></option>

                                <?php //endforeach; ?>

                            </select> -->

                        </div>

                    </div>

                    <div class="col-md-4">

                        <div class="form-group">

                            <label for="firstname" class="col-md-12 control-label"><?= trans('firstname') ?><span

                                    style="color:red;font-weight:bold">*</span></label>



                            <input type="text" name="firstname" class="form-control" id="firstname" value="<?= $admin['firstname'];?>" placeholder="Enter first Name" readonly>

                        </div>

                    </div>

                    <div class="col-md-4">

                        <div class="form-group">

                            <label for="lastname" class="col-md-12 control-label"><?= trans('middlename') ?></label>



                            <input type="text" name="middlename" class="form-control" id="middlename" value="<?= $admin['middlename'];?>" placeholder="Enter Middle Name" readonly>

                        </div>

                    </div>

                </div>

                <div class="row">

                    <div class="col-md-4">

                        <div class="form-group">

                            <label for="lastname" class="col-md-12 control-label"><?= trans('lastname') ?><span style="color:red;font-weight:bold">*</span></label>

                            <input type="text" name="lastname" class="form-control" id="lastname" value="<?= $admin['lastname'];?>" placeholder="Enter Last Name" readonly>

                        </div>

                    </div>

                    <div class="col-md-4">

                        <div class="form-group">

                            <label for="username" class="col-md-12 control-label"><?= trans('username') ?><span style="color:red;font-weight:bold">*</span></label>

                            <input type="text" name="username" class="form-control" id="username" value="<?= $admin['username'];?>" placeholder="Enter Username" readonly>

                        </div>

                    </div>

                    <div class="col-md-4">

                        <div class="form-group">

                            <label for="email" class="col-md-12 control-label"><?= trans('email') ?><span style="color:red;font-weight:bold">*</span></label>

                            <input type="text" name="email" class="form-control" id="email" value="<?= $admin['email'];?>" placeholder="Enter Email" readonly> 

                        </div>

                    </div>

                </div>

                <div class="row">

                    <div class="col-md-4">

                        <div class="form-group">

                            <label for="phone_no" class="col-md-12 control-label"><?= trans('phone_no') ?><span style="color:red;font-weight:bold">*</span></label>

                            <input type="text" maxlength="15" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" name="phone_no" class="form-control" id="phone_no" placeholder="Enter Phone Number" value="<?= $admin['phone_no'];?>" readonly>

                        </div>

                    </div>

                    <div class="col-md-4">

                        <div class="form-group">

                            <label for="mobile_no" class="col-md-12 control-label"><?= trans('mobile_no') ?><span

                                    style="color:red;font-weight:bold">*</span></label>

                                    <input type="text" maxlength="15" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" name="mobile_no" class="form-control" id="mobile_no" placeholder="Enter mobile Number" value="<?= $admin['mobile_no'];?>" readonly>



                            <!-- <input type="text" name="mobile_no" id="mobile_no" maxlength="10"

                                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"

                                value="<?php if(old('mobile_no') != " " ){ echo old('mobile_no');}?>"

                                class="form-control" placeholder="<?= trans('mobile_no') ?>" value="<?= $admin['mobile_no'];?>" readonly> -->

                        </div>

                    </div>

                    <div class="col-md-4">

                        <div class="form-group">

                            <label for="designation" class="col-md-12 control-label"><?= trans('designation') ?></label>

                            <input type="text" name="designation" class="form-control" id="designation" placeholder="Enter Designation" value="<?= $admin['designation'];?>" readonly>

                        </div>

                    </div>

                </div>

                <div class="row">

                    <!-- <div class="col-md-4">

                        <div class="form-group">

                            <label for="idproof" class="col-md-12 control-label"><?= trans('idproof') ?><span

                                    style="color:red;font-weight:bold">*</span></label>



                                    <input type="text" name="idproof" class="form-control" id="idproof" placeholder="Enter Designation" value="<?= $admin['idproof'];?>" readonly>

                            <select id="idproof" name="idproof" class="form-control">

                                <option value=""><?php // trans('select_idproof') ?></option>

                                <?php //foreach(IDPROOFLIST as $k=>$v){?>

                                <option value="<?php //echo $k;?>"><?php //echo $v;?></option>

                                <?php //}?>





                            </select> 

                        </div>

                    </div>-->

                    <!-- <div class="col-md-4">

                        <div class="form-group">

                            <label for="idproof_no" class="col-md-12 control-label">ID Proof Number<span

                                    style="color:red;font-weight:bold">*</span></label>

                                    <input type="text" name="idproof_no" class="form-control" id="idproof_no" placeholder="Enter Designation" value="<?= $admin['idproof'];?>" readonly>

                        </div>

                    </div> -->

                    <!-- <div class="col-md-4">

                        <div class="form-group">

                            <label for="state" class="col-md-12 control-label"><?= trans('district') ?><span style="color:red;font-weight:bold">*</span></label>

                            <input type="text" name="state" class="form-control" id="state" placeholder="Enter State" value="<?= get_district_name($admin['district']); ?>" readonly>    

                                                                       

                        </div>

                    </div> -->

                </div>

                <div class="row">

                    <div class="col-md-4">

                        <div class="form-group">

                            <label for="state" class="col-md-12 control-label"><?= trans('district') ?><span style="color:red;font-weight:bold">*</span></label>

                            <input type="text" name="state" class="form-control" id="state" placeholder="Enter State" value="<?= get_district_name($admin['state_id']); ?>" readonly>    

                                                                       

                        </div>

                    </div>

                    <div class="col-md-4" id="div_district">

                        <div class="form-group ">

                            <label for="district" class="col-md-12 control-label"><?= trans('city') ?><?php //echo $admin['district_id'];?> <span style="color:red;font-weight:bold">*</span></label>

                            <!-- <input type="text" name="state" class="form-control" id="state" placeholder="Enter District"  value="<?= $admin['city']; ?>" readonly>  -->

                            <input type="text" name="state" class="form-control" id="state" placeholder="Enter District"  value="<?= get_subcity_name($admin['district_id']); ?>" readonly> 

                            <!-- <select name="district" id="district" class="form-control">

                                <option value="<?php //get_district_name($admin['district_id']); ?>"><?= trans('select_district') ?></option>

                            </select> -->

                        </div>

                    </div>

                    <div class="col-md-4">

                        <div class="form-group">

                            <label for="status" class="col-md-12 control-label"><?= trans('status') ?></label>

                            <input type="text" name="state" class="form-control" id="state" placeholder="Enter Status"  value="<?php if($admin['is_active']){ echo trans('active'); }else{ echo trans('inactive'); }; ?>" readonly>

                            <!-- <select name="status" id="status" class="form-control">

                                <option value=""><?php // trans('select_status') ?></option>

                                <option value="1"><?php //trans('active') ?></option>

                                <option value="0"><?php // trans('inactive') ?></option>

                            </select> -->

                        </div>

                    </div>

                    <div class="col-md-4">

                        <div class="form-group">

                            <!-- <label for="password" class="col-md-12 control-label"><?php // trans('password') ?></label> -->

                            <!-- <input type="password" name="password" class="form-control" id="password" placeholder="Enter Password "> -->

                        </div>

                    </div>

                </div>





                <div class="form-group" style="text-align:center;">

                    <div class="col-md-12">

                            <a href="<?= base_url('admin/dashboard'); ?>" class="btn btn-sec px-3 py-2">Back</a>

                    </div>

                </div>



                <?php echo form_close(); ?>

            </div>

        </div>

    </section>

</div>





<?php } ?>



<script type="text/javascript">

$(document).ready(function() {



    var mainStr = $('#mobile_no').val();

    var admin_ids = $('#admin_id').val();

    if (admin_ids != 1) {

        $('#sup_admin').hide()

        vis = mainStr.slice(-4),

            countNum = '';



        for (var i = (mainStr.length) - 4; i > 0; i--) {

            countNum += '*';

        }

        var num = countNum + vis;

        $("#sup").val(num);

    } else {



        $('#all_user').hide()

    }

});

</script>

<script type="text/javascript">

$(document).ready(function() {



    var email = $('#email').val();

    var admin_ids = $('#admin_id').val();

    var hiddenEmail = "";

    if (admin_ids != 1) {

        $('#emai_superadmin').hide()

        for (i = 0; i < email.length; i++) {

            if (i > 2 && i < email.indexOf("@")) {

                hiddenEmail += "*";

            } else {

                hiddenEmail += email[i];

            }

        }

        $("#sup_mail").val(hiddenEmail);

    } else {

        $('#emai_all').hide()

    }

});

</script>