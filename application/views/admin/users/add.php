<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="card card-default color-palette-bo">
            <div class="card-header">
                <div class="d-inline-block">
                    <h3 class="card-title"> <i class="fa fa-plus"></i>
                        <?= trans('add_new_admin') ?> </h3>
                </div>
                <div class="d-inline-block float-right">
                    <a href="<?= base_url('admin/admin'); ?>" class="btn btn-success"><i class="fa fa-list"></i> <?= trans('admin_list') ?></a>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="box">
                            <!-- form start -->
                            <div class="box-body">

                                <!-- For Messages -->
                                <?php $this->load->view('admin/includes/_messages.php') ?>

                                <?php echo form_open(base_url('admin/admin/add'), 'id="xin-form" class="form-horizontal" '); ?> 
                                <div class="form-group ">
                                    <label for="role" class="col-md-3 control-label"><?= trans('select_admin_role') ?><span class="text-coral">*</span></label>

                                    <div class="col-md-12">
                                        <?php set_select('role') ?>
                                        <select name="role" id="role" class="form-control">
                                            <option value=""><?= trans('select_role') ?></option>
                                            <?php foreach ($admin_roles as $role): ?>
                                                <option value="<?= $role['admin_role_id']; ?>"  <?php echo set_select('role', $role['admin_role_id']); ?>><?= $role['admin_role_title']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="firstname" class="col-md-12 control-label"><?= trans('firstname') ?></label>

                                    <div class="col-md-12">
                                        <input type="text"  name="firstname" class="form-control" id="firstname" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="lastname" class="col-md-12 control-label"><?= trans('middlename') ?></label>

                                    <div class="col-md-12">
                                        <input type="text"   name="middlename" class="form-control" id="middlename" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="lastname" class="col-md-12 control-label"><?= trans('lastname') ?></label>

                                    <div class="col-md-12">
                                        <input type="text"  name="lastname"   class="form-control" id="lastname" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="username" class="col-md-12 control-label"><?= trans('username') ?></label>

                                    <div class="col-md-12">
                                        <input type="text"  name="username"  class="form-control" id="username" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="email" class="col-md-12 control-label"><?= trans('email') ?></label>

                                    <div class="col-md-12">
                                        <input type="text"  name="email" class="form-control" id="email" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="phone_no" class="col-md-12 control-label"><?= trans('phone_no') ?></label>

                                    <div class="col-md-12">
                                        <input type="number"   name="phone_no" class="form-control" id="phone_no" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="mobile_no" class="col-md-12 control-label"><?= trans('mobile_no') ?></label>

                                    <div class="col-md-12">
                                        <input type="number"  name="mobile_no" class="form-control" id="mobile_no" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="designation" class="col-md-12 control-label"><?= trans('designation') ?></label>

                                    <div class="col-md-12">
                                        <input type="text"  name="designation" class="form-control" id="designation" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="idproof" class="col-md-12 control-label"><?= trans('idproof') ?></label>

                                    <div class="col-md-12">
                                        <select id="idproof"  name="idproof" class="form-control">
                                            <option value=""><?= trans('select_idproof') ?></option>
                                            <?php foreach(IDPROOFLIST as $k=>$v){?>
                                                <option value="<?php echo $k;?>" ><?php echo $v;?></option>
                                                <?php }?>
                                            
                                            
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="idproof_no" class="col-md-12 control-label">ID Proof Number</label>

                                    <div class="col-md-12">
                                        <input type="text"  name="idproof_no" class="form-control" id="idproof_no" placeholder="">
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="state" class="col-md-12 control-label"><?= trans('state') ?></label>
                                    
                                    <div class="col-md-12">
                                        <select name="state" id="state" class="form-control">
                                            <option value=""><?= trans('select_state') ?></option>
                                            <?php foreach($states as $k=>$state){?>
                                            <option value="<?= $state->id?>"  ><?= $state->name?></option>
                                            <?php }?>
                                            
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group hide" id="div_district">
                                    <label for="district" class="col-md-12 control-label"><?= trans('district') ?></label>

                                    <div class="col-md-12">
                                        <select name="district" id="district" class="form-control">
                                            <option value=""><?= trans('select_district') ?></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="status" class="col-md-12 control-label"><?= trans('status') ?></label>
                                    <div class="col-md-12">
                                        <select name="status" id="status" class="form-control">
                                            <option value=""><?= trans('select_status') ?></option>
                                            <option value="1"  ><?= trans('active') ?></option>
                                            <option value="0" ><?= trans('inactive') ?></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="password" class="col-md-12 control-label"><?= trans('password') ?></label>

                                    <div class="col-md-12">
                                        <input type="password" name="password" class="form-control" id="password" placeholder="">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-12">
                                        <input type="submit" name="submit" value="<?= trans('add_admin') ?>" class="btn btn-primary pull-right">
                                    </div>
                                </div>
                                <?php echo form_close(); ?>
                            </div>
                            <!-- /.box-body -->
                        </div>
                    </div>
                </div>  
            </div>
        </div>
    </section> 
</div>
<script>
    $( document ).ready(function() {
    $("#xin-form")["submit"](function(d) {
        var role = $("select#role option").filter(":selected").val();
        if (role == "") {
		alert("Please fill 'Select System Role' field");
                $("select#role").focus();
		return false;
	}


	if ($("#firstname").val() == "") {
		alert("Please fill 'First Name' field");
		$("#firstname").focus();
		return false;
	}
        if ($("#lastname").val() == "") {
		alert("Please fill 'Last Name' field");
		$("#lastname").focus();
		return false;
	}


	if ($("#username").val() == "") {
		alert("Please fill 'User Name' field");
		$("#username").focus();
		return false;
	}
        //Validation For Emailid
	var femail = $("#email").val();
	if (femail == "") {
		alert("Please fill 'Email Address' field");
		$("#email").focus();
		return false;
	}
	var mailformat = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	if (!femail.match(mailformat)) {
		alert("You have entered an invalid email address!");
		$("#email").focus();
		return false;
	}
        
        //Validation For Phone no
        //
        //var fmobileno = document.forms["myform"]["mobile_no"].value;
	if ($('#phone_no').val() == "") {
		alert("Please fill 'Phone No(with STD code)' field");
		$('#phone_no').focus();
		return false;
	}
        //
        //Validation For Mobile no
	var fmobileno = $('#mobile_no').val();
	if (fmobileno == "") {
		alert("Please fill 'Mobile Number' field");
		$('#mobile_no').focus();
		return false;
	}
	if (fmobileno.length != 10) {
		alert("Please fill 'Mobile Number' field with 10 digit number");
		$('#mobile_no').focus();
		return false;
	}

	var phoneno = /^\+?([6-9]{1})\)?[-. ]?([0-9]{5})[-. ]?([0-9]{4})$/;
	if (!fmobileno.match(phoneno)) {
		alert("You have to enter Phone no that start {9,8,7,6}!");
		$('#mobile_no').focus();
		return false;
	}
        
        //Id Proof
        var idproof = $("select#idproof option").filter(":selected").val();
        if (idproof == "") {
		alert("Please fill 'Id Proof' field");
                 $("select#idproof").focus();
		return false;
	}
        
        var idproof_no = $("#idproof_no").val();
        if (idproof != '' && idproof_no == "") {
		alert("Please fill 'Id Proof Number' field");
                 $("#idproof_no").focus();
		return false;
	}

	if ($("#designation").val() == "") {
		alert("Please fill 'Designation' field");
		$("#designation").focus();
		return false;
	}
        var state = $("select#state option").filter(":selected").val();
        if (state == "") {
		alert("Please fill 'State' field");
                 $("select#state").focus();
		return false;
	}


	var district = $("select#district option").filter(":selected").val();
         var role_id = $('#role').val()
        if (role_id == 5 && district == "") {
		alert("Please fill 'District' field");
                 $("select#district").focus();
		return false;
	}
        if ($("#status").val() == "") {
		alert("Please fill 'Status' field");
		$("#status").focus();
		return false;
	}


	if ($("#password").val() == "") {
		alert("Please fill 'Password' field");
		$("#password").focus();
		return false;
	}

    });
    
    $('#role').on('change', function(){
        var role_id = $(this).val();
        if(role_id == 5 ){
            $("#div_district").removeClass('hide');
            $("#div_district").addClass('show');
        }else{
            $("#div_district").removeClass('show');
            $("#div_district").addClass('hide');
            $('#district').val('');
        }
    })
$(function() {
    $('#state').change( function() {
        var state_id = $(this).val();
        if (state_id != '') {
            $('#othstate').val('').hide();
            
            $.ajax({
               type: "POST", 
               url: base_url+'admin/location/get_city_by_state_id',
               dataType: 'html',
               data: { 'state_id' : state_id, 'csfr_token_name':csfr_token_value },
               success: function(data) {
                   $('#district').html( data );
               }
            });
        }
        else {
           $('#state').val('').hide();
           $('#othstate').show();
        }
    });
});
});

</script>