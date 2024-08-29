
<!-- Content Wrapper. Contains page content -->
<?php
// print_r($_SESSION); die();

if ($_SESSION['admin_role_id'] != 6) {
    $application_mode = 0;
} else {
    $application_mode = 1;
}

// $complaint_number= now();
$certificate_number = 'G-' . $_SESSION['state_id'] . '/' . $_SESSION['district_id'] . now();
?>

<link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/jquery.collapsibleCheckboxTree.css" type="text/css" />
<script type="text/javascript">
    jQuery(document).ready(function () {
        $('ul#example').collapsibleCheckboxTree();
    });
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
                        &nbsp; <?= trans('add_grav') ?> Module 
                    </h3>
                </div>

            </div>
            <div class="card-body">
                <!-- For Messages -->
                <?php $this->load->view('admin/includes/_messages.php') ?>
                <?php
                echo form_open_multipart(base_url('admin/grievance/grievance'),
                        'id="xin-form" class="form-horizontal" ')
                ?> 
                <h3 style="text-align:center;"><span class="label">Apply for Grievance </span></h3>
                <hr class="style1">
                <div class="row">
                    <div class="col-md-4" style="display:none;" >
                        <div class="form-group">
                            <label for="registration"  control-label" >Complaint Number</label>
                            <input type="text" name="gravience_number" placeholder="Complaint Number" readonly class="form-control" id="gravience_number" value="<?php echo $certificate_number ?>">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label">User Name<span style="color:red">*</span></label>
                            <input type="text" name="user_name_grav" placeholder="User Name" class="form-control" id="user_name_grav" readonly value="<?php echo $data_list['firstname'] . ' ' . $data_list['middlename'] . ' ' . $data_list['lastname']; ?>"  >
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="username"  control-label">Title<span style="color:red">*</span></label>
                            <input type="text" name="title_grav" placeholder="Title" class="form-control" id="title_grav" value="" >
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="State">Authority</label>
                            <select name="auth_grav" id="auth_grav" class="form-control ">
                                <!-- <option value="">Select Authority</option> -->
                                <?php
                                foreach ($grav_against as $k => $grav_against) {
                                    if (in_array($_SESSION['admin_role_id'], array(5, 4, 3)) && $_SESSION['grav_against'] != $grav_against->admin_role_id)
                                        continue;
                                    ?>
                                    <option value="<?= $grav_against->admin_role_id ?>"  ><?= $grav_against->admin_role_title ?></option>
<?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                                        <!-- <div class="row"> -->
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="State">State/UT </label>
                            <select name="state" id="state" class="form-control dd_state" data-distric_name="establishment">
                                <option value=""><?= trans('select_state') ?></option>
                          <?php
                                foreach ($states as $k => $state) {
                                    if (in_array($_SESSION['admin_role_id'], array(5, 4, 3)) && $_SESSION['state_id'] != $state->id)
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
                            <select name="district" id="district_establishment" class="form-control">
                                <option value=""><?= trans('select_district') ?></option>
                                <?php foreach ($district as $k => $district) { ?>
                                    <option value="<?= $district->id ?>"  <?php if ($district->id == $data_list['district_id']) echo "selected"; ?>><?= $district->name ?></option>
<?PHP } ?>
                            </select>
                        </div>
                    </div>
                                        <div class="col-md-4">
                        <div class="form-group">
                            <label for="Pin" class="control-label">Pin code</label>
                            <input class="form-control" min="1"  placeholder="Pin" id="establishment_pin" name="pin" type="number" value="">
                        </div>
                    </div>

                    <!-- </div> -->
                </div>

                <!------------------------------------------------------------------------------------------------------------>

                <div class="row">
                    
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="Address1">Mobile Number<span style="color:red">*</span></label>
                            <input class="form-control" name="mobile_grav" placeholder="Mobile Number"  id="mobile_grav"  type="text" value="" >
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="Address2">Email Id<span style="color:red">*</span></label>
                            <input class="form-control"  name="email_grav" placeholder="Email Id" id="email_grav" type="text" readonly value="<?php echo $data_list['email']; ?>" >
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="City" >Complaint Against<span style="color:red">*</span></label>
                            <input class="form-control" id="complain_grav" placeholder="Complaint Against"  name="complain_grav" type="text" value="" >
                        </div>
                    </div>


                </div>
                <!------------------------------------------------------------------------------------------->
                <div class="row">   
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="City" >Description<span style="color:red">*</span></label>
                            <textarea  class="form-control" onkeyup="trimSpaces();" id="des_grav" id="des_grav" name="des_grav" rows="2" cols="50">
                            </textarea>
                        </div>
                    </div>
                </div>
                <script>
                    function trimSpaces(){
                            s = document.getElementById("des_grav").value;
                            s = s.replace(/(^\s*)|(\s*$)/gi,"");
                            s = s.replace(/[ ]{2,}/gi," ");
                            s = s.replace(/\n /,"\n");
                            document.getElementById("des_grav").value = s;
                        }
                </script>
                <!-------------------------------------------------------------------------------------------------------->
                <hr style="1">
                <div class="row">

                    <div class="form-group  col-sm-3">
                        <label>Choose Files</label>
                        <input type="file"  class="form-control" name="fileName1" id="fileName1"  />  
                        <!-- <label for="employee_id">Attachment</label>  -->
                    </div>


                </div>
                <hr class="style1">
                <!--  <label for="employee_id"><u>Declaration *</u></label> <br>
                 <span>i'm
                 <input type="text" class="tgl " value="" name="declaration"  > </span>  
                 on behalf of myself and the company/ 
                 society/association/body hereby declare that the statements above are correct and  true to the best of 
                 my knowledge and I shall abide by all the provisions made under the Clinical Establishment 
                 (Registration and Regulation) Act 2010. 
                 I undertake that I shall inform the DistrictRegistering Authority of any changes in the particulars 
                 given above.
                 I shall comply with the minimum standards prescribed under Clinical Establishment Act for the 
                 services provided by us and also all other conditions of registration as stipulated under the aforesaid 
                 Act and Rule there-under.</span> -->
                <div class="row">
                    <table>
                        <thead>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Date:</td>
                                <td> <input type="text" placeholder="<?php
                                            echo date("Y/m/d");
                                            ?>"  </td>
                            </tr>
                            <tr>
                                <td>Place:</td>
                                <td> <input type="text" name="name_grav"    placeholder="Place" </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div><br>



            <div class="card-footer" align="center" >
                <input type="submit"  name="submit" class="btn btn-primary " value="Save as Draft"></input>
                <input type="submit"   name="submit" class="btn btn-primary" value="Save"></input>
                <a href="javascript:history.back()" class="btn btn-primary">Back</a> 
              <!-- <input type="button"   class="btn btn-primary " value="Back"></input> -->

            </div>
<?php echo form_close(); ?>
        </div>
        <!-- /.box-body -->
</div>
</section>
</div>

<script type="text/javascript" src="<?= base_url() ?>assets/dist/js/grav.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/dist/js/jquery.collapsibleCheckboxTree.js"></script>
<script type="text/javascript">

    // function get_detail(f)
    // {

    //     var file_detail = $(f).data('file_detail');

    //     var size = (parseInt($(f)[0].files[0].size) / (1024 * 1024)).toFixed(2);
    //     ;//.toFixed(2);
    //     var extension = $(f).val().replace(/^.*\./, '');
    //     if (extension != 'pdf') {

    //         alert("Please select pdf file only");
    //        // $(f)[0].files[0].val()='';
    //     }
    //     $("#" + file_detail).html("File Size : " + size + "Mb");
    // }

    /* Used for Showing Charges of Clinical establishment Types of Checkboxs */

    $('#btnfee').on('click', function () {

        var sIdBedCount = "";
        let get_id;
        let isChecked;
        let allIds = [];
        let countBadIds = '';
        var state_id = $("#state").val();
        // alert(state_id);

        var btn = $(this).find("input[type=click]:focus").val();
        if ($("#provisional_type").val() == "") {
            alert("Please Select 'Type' field");
            $("#provisional_type").focus();
            return false;
        }
        if ($("#state").val() == "") {
            alert("Please Select 'State' field");
            $("#state").focus();
            return false;
        }



        $('.selectedEstablishment').each(function () {
            get_id = $(this).val();

            isChecked = $('#checked_' + get_id).is(':checked');
            let bedCount = $('#txtfee_' + get_id).val();
            var sThisVal = (this.checked ? $(this).val() : "");
            if (isChecked) {
                if (bedCount > 0)
                    locDetails = get_id + '#' + bedCount;
                else
                    locDetails = get_id + '#' + 0;
                // countBadIds = locDetails+','+countBadIds;
                allIds.push(locDetails);
            }
        });

        countBadIds = countBadIds.slice(0, -1);

        let token = $("input[name=csrf_test_name]").val();
        let provisional_type = $('#provisional_type').val();

        $.ajax({
            type: 'POST',
            data: {
                'all_id': allIds,
                'provisional_type': provisional_type,
                'state_id': state_id,
                'csrf_test_name': token},
            url: '<?= base_url('admin/certificate/totalFeeCount') ?>',
            dataType: 'json',
            success: function (result) {
                // alert(result);
                //  console.log(result);
                $('#fee_display').val(result.html);
                $('#fee_total').val(result.totalFee);
            }
        });
    });
</script>