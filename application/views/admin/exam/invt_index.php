<!-- DataTables -->
<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/datatables/dataTables.bootstrap4.css">
<style>
    .view-btn {
        border-color: #384e4a;
        background-color: #384e4a;
        color: #fff;
    }

    .view-btn:hover {
        border-color: #384e4a;
        background-color: #fff;
        color: #384e4a;
    }

    .view-all--button {
        margin-top: 10px !important;
    }

    .table-main {
        width: 100% !important;
    }

    .loaderWrap {
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        background-color: #000;
        /*Fallback*/
        background-color: rgba(0, 0, 0, .5);
    }

    .loader {
        border: 16px solid #e0e0e0;
        border-radius: 50%;
        border-top: 16px solid #373250;
        border-bottom: 16px solid #373250;
        width: 120px;
        height: 120px;

        -webkit-animation: spin 2s linear infinite;
        /* Safari */
        animation: spin 2s linear infinite;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(50%, 50%)
    }

    /* Safari */
    @-webkit-keyframes spin {
        0% {
            -webkit-transform: rotate(0deg);
        }

        100% {
            -webkit-transform: rotate(360deg);
        }
    }

    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <section class="content">
        <!-- For Messages -->
        <?php $this->load->view('admin/includes/_messages.php') ?>
        <div class="card">
            <div class="card-header border-0">
                <div class="d-inline-block">
                    <h3 class="card-title"><i class="fa fa-list"></i>&nbsp;School/College Center List for sending
                        Invitations&nbsp;(आमंत्रण भेजने के लिए स्कूल/कॉलेज केंद्र सूची)</h3>
                </div>
                <div class="d-inline-block float-right">
                    <?php if ($this->rbac->check_operation_permission('quetion_paper_add')) : ?>
                        <a href="<?= base_url('admin/master/exam_add'); ?>" class="btn btn-success"> Add Exam&nbsp;(परीक्षा
                            जोड़ें)</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="card">

            <div class="card-header">
                <h3 class="card-title" style="color: #373250;">
                    <?php echo get_exam_name(get_exam_name_downloadreport($exam_id)); ?>
                    <input hidden type="text" id="exam_Id" value="<?php echo $exam_id ?>">

                </h3>

            </div>

            <div class="card-body">

                <?php echo form_open("/", 'class="filterdata"') ?>

                <div class="row">

                    <?php

                    if (in_array($_SESSION['admin_role_id'], array(1, 2, 3, 4, 5, 6))) { ?>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>District <br> (ज़िला)</label>
                                <!-- <select name="state" class="form-control dd_state" onchange="filter_data()" > -->
                                <select id="state" name="state" class="form-control dd_state">
                                    <option value="">Select District</option>
                                    <?php foreach ($states as $state) : ?>
                                        <option value="<?= $state->id ?>"><?= $state->name ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    <?php }
                    if (in_array($_SESSION['admin_role_id'], array(1, 2, 3, 4, 5, 6))) {



                    ?>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>City <br> (शहर)</label>
                                <select name="district" id="district" class="form-control">
                                    <option value=""> Select City</option>
                                </select>
                            </div>

                        </div>

                    <?php } ?>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Grade <br> (श्रेणी)</label>
                            <select id="grade" name="status" class="form-control">

                                <option value="">Select Grade</option>



                                <?php foreach (ALLOWED_FILE_MOVEMENT_ROLE_ID[1] as $k => $v) :

                                    if (in_array($_SESSION['admin_role_id'], array(5)) && $k == 5)

                                        continue;

                                ?>



                                    <!-- <option value="<?= $k ?>"><?= $v ?></option> -->
                                    <option value="<?= $v ?>"><?= $v ?></option>

                                <?php endforeach; ?>



                            </select>

                        </div>

                    </div>


                </div>

                <?php echo form_close(); ?>

            </div>

        </div>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="d-flex my-2">
                            <div id="countInDistrict" class="d-none mr-5">
                                <h4 class="text-bold" style="font-size: 17px; color: #373250;">
                                    Total seats available:
                                    <span style="color: #e14658;" id="districtCounts"></span>
                                </h4>
                            </div>
                            <div id="schoolCount" class="d-none">
                                <h4 class="text-bold" style="font-size: 17px; color: #373250;">
                                    Selected school total seats :
                                    <span style="color: #e14658;" id="schoolWiseCounts"></span>
                                </h4>
                            </div>
                        </div>
                    </div>
                    <?php
                    $count = getValues($this->uri->segment(4));
                    if ($count > 0) {
                    ?>
                        <div class="col-md-12">
                            <input type="hidden" id="send_consent_id" name="send_consent_id" value="<?= $this->uri->segment(4); ?>">
                            <!-- </div> -->
                            <div id="allcheckids" class="mb-5" style="">
                                <div class="d-flex justify-centent-between align-items-center">
                                    <div class="check-option">
                                        <input type="button" class="select_all_count btn btn-success" id="select-all1" value="Select All (सभी चुनें)">
                                        <input type="button" class="select_all_uncheck btn btn-success" id="select-all1" value="Uncheck (अनचेक)">
                                    </div>
                                    <div class="send-option">
                                        <input type="button" class="btn btn-success" id="select_all" value="Send to All (सभी को भेजो)">
                                        <input type="button" class="btn btn-success" id="select_single_count" value="Send to Selected (चयनित को भेजें)">
                                    </div>
                                </div>
                                <!-- <label style="font-weight:bold;" for="car"></label> -->
                            </div>
                        </div>
                    <?php } ?>


                </div>

                <div class="table-responsive">
                    <table id="send_invitation_list" class="table table-bordered table-striped table-main" style="border-collapse: collapse !important;">
                        <thead>
                            <tr>
                                <th>S.No.</th>
                                <th>School Name </th>
                                <th>District</th>
                                <th>City</th>
                                <th>Principal Details</th>
                                <th>Grade</th>
                                <th width="120">Max No of Applicant</th>
                                <th width="120"><?= trans('action') ?></th>
                            </tr>
                        </thead>

                    </table>
                </div>
                <div id="invitation_recreate_div"></div>
                <div class="view-all--button  ml-1">
                    <button onclick="window.history.go(-1)" class="btn view-btn">Back (पीछे)</button>
                </div>
            </div>

        </div>

    </section>
</div>

<div class="loaderWrap d-none">
    <div class="loader"></div>

</div>


<!-- DataTables -->
<script src="<?= base_url() ?>assets/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables/dataTables.bootstrap4.js"></script>

<script>
    var total_candidate = location.search.split('total_number=')[1] ? location.search.split('total_number=')[1] : '0';

    $('#total_candidate_display').html(total_candidate);

    $(document).ready(function() {


        window.setTimeout(function() {
            $("#consent_recieved").fadeTo(500, 0).slideUp(500, function() {
                $(this).remove();
                <?php unset($_SESSION['success']) ?>
            });
        }, 4000);

        $('.checkbox-item').bind('click', function() {
            var page = $(this).attr('rel');
            // alert(page);
        })

        $(function() {
            var exam_Id = $('#exam_Id').val();
            $('#state').change(function() {

                var district_id = $(this).val();
                if (district_id != '') {
                    $('#othstate').val('').hide();
                    $('#send_invitation_list').DataTable().destroy();

                    $.ajax({
                        type: "POST",
                        url: base_url + 'admin/location/get_city_by_state_id',
                        dataType: 'html',
                        data: {
                            'district_id': district_id,
                            'csfr_token_name': csfr_token_value
                        },
                        success: function(data) {
                            $('#district').html(data);
                        }
                    });
                }
                var state_id = $('#state').val();
                var grade = '';
                var district_id = '';
                if (state_id != '') {

                    $.ajax({
                        type: "GET",
                        url: base_url + 'admin/Examshedule_schedule/inv_list_data_for_mail',
                        dataType: 'html',
                        data: {
                            'state_id': state_id,
                            'district_id': district_id,
                            'grade': grade,
                            'exam_Id': exam_Id,
                            'csfr_token_name': csfr_token_value
                        },
                        success: function(data) {
                            table.clear().destroy();
                            $('#send_invitation_list').hide();
                            $('#invitation_recreate_div').html(data);
                            table = $('#invitation_recreate_div #send_invitation_list').DataTable();
                            // New Logic For Count Students on the basis of Distrcit Id  
                            $.ajax({
                                type: "GET",
                                url: base_url +
                                    'admin/Examshedule_schedule/districtWiseCountOfStudentsRecieved',
                                // dataType: 'html',
                                data: {
                                    'state_id': state_id,
                                    'district_id': district_id,
                                    'grade': grade,
                                    'exam_Id': exam_Id,
                                    'csfr_token_name': csfr_token_value
                                },
                                success: function(data) {
                                    $('#countInDistrict').removeClass(
                                        "d-none");
                                    $('#districtCounts').html(data);
                                    $('#schoolCount').addClass("d-none");
                                    $('#schoolWiseCounts').html('');
                                }

                            });
                        }
                    });
                } else {
                    location.reload();

                }
            });

            $('#district').change(function() {
                var state_id = $('#state').val();
                var grade = $('#grade').val();
                var district_id = $(this).val();
                if (district_id != '') {
                    $.ajax({
                        type: "GET",
                        url: base_url + 'admin/Examshedule_schedule/inv_list_data_for_mail',
                        dataType: 'html',
                        data: {
                            'district_id': district_id,
                            'state_id': state_id,
                            'grade': grade,
                            'exam_Id': exam_Id,
                            'csfr_token_name': csfr_token_value
                        },
                        success: function(data) {
                            $('#send_invitation_list').DataTable().clear().destroy();
                            $('#send_invitation_list').hide();
                            $('#invitation_recreate_div').html(data);
                            table = $('#invitation_recreate_div #send_invitation_list').DataTable();

                            $.ajax({
                                type: "GET",
                                url: base_url +
                                    'admin/Examshedule_schedule/districtWiseCountOfStudentsRecieved',
                                // dataType: 'html',
                                data: {
                                    'state_id': state_id,
                                    'district_id': district_id,
                                    'grade': grade,
                                    'csfr_token_name': csfr_token_value
                                },
                                success: function(data) {
                                    $('#countInDistrict').removeClass(
                                        "d-none");
                                    $('#districtCounts').html(data);
                                    $('#schoolCount').addClass("d-none");
                                    $('#schoolWiseCounts').html('');

                                }

                            });
                        }
                    });
                } else {
                    location.reload();

                }
            });

            $('#grade').change(function() {
                var grade = $(this).val();
                var state_id = $('#state').val();
                var district_id = $('#district').val();
                if (grade != '') {
                    $.ajax({
                        type: "GET",
                        url: base_url + 'admin/Examshedule_schedule/inv_list_data_for_mail',
                        dataType: 'html',
                        data: {
                            'district_id': district_id,
                            'state_id': state_id,
                            'grade': grade,
                            'exam_Id': exam_Id,
                            'csfr_token_name': csfr_token_value
                        },
                        success: function(data) {
                            $('#send_invitation_list').DataTable().clear().destroy();
                            $('#send_invitation_list').hide();
                            $('#invitation_recreate_div').html(data);
                            table = $('#invitation_recreate_div #send_invitation_list').DataTable();

                            $.ajax({
                                type: "GET",
                                url: base_url +
                                    'admin/Examshedule_schedule/districtWiseCountOfStudentsRecieved',
                                data: {
                                    'state_id': state_id,
                                    'district_id': district_id,
                                    'grade': grade,
                                    'csfr_token_name': csfr_token_value
                                },
                                success: function(data) {
                                    $('#countInDistrict').removeClass(
                                        "d-none");
                                    $('#districtCounts').html(data);
                                    $('#schoolCount').addClass("d-none");
                                    $('#schoolWiseCounts').html('');

                                }

                            });
                        }
                    });
                } else {
                    location.reload();

                }
            });
        });
    });
    //---------------------------------------------------

    let table = $('#send_invitation_list').DataTable({
        "processing": true,
        "serverSide": false,
        "ajax": "<?= base_url('admin/Examshedule_schedule/inv_all_data_for_mail/' . $exam_id) ?>",
        "order": [
            [0, 'asc']
        ],
    });




    $('#select_all').click(function(event) {
        if (confirm("Are you sure you want to send an invitation to all users?\nक्या आप वाकई सभी उपयोगकर्ताओं को निमंत्रण भेजना चाहते हैं?")) {
            var send_consent_id = $("#send_consent_id").val()
            var hrefs = new Array();
            let rows = table.rows({
                'search': 'applied'
            }).nodes();
            // Check checkboxes for all rows in the table
            $('input[type="checkbox"]', rows).prop('checked', true);
            rows.each((row) => {
                if ($('input[type="checkbox"]', row).attr('rel')) {
                    hrefs.push($('input[type="checkbox"]', row).attr('rel'))
                }
            })
        
            if (hrefs.length != 0) {
                $('.loaderWrap').removeClass('d-none');
                $('.loaderWrap').removeClass('d-none');
                var url = "<?php echo base_url('admin/examshedule_schedule/send_invitation_user_all/') ?>"
                $.ajax({
                    url: url,
                    type: 'get',
                    dataType: 'text',
                    data: {
                        data: hrefs,
                        'send_consent_id': send_consent_id
                    },
                    success: function(result) {
                        if (result) {
                            $('.loaderWrap').addClass('d-none');
                            alert("Consent sent sucessfully ");

                            window.location.reload();
                        }
                    }
                });
            } else {
                alert('Please click on send at least one checkbox\n(कृपया कम से कम दो चेकबॉक्स भेजें पर क्लिक करें)');
                $("#allcheckids").focus();
                return false;
            }

        } else {
            return false;
        }

    });


    $('.select_all_count').click(function(event) {
        arr = []
        let rows = table.rows({
            'search': 'applied'
        }).nodes();
        // Check checkboxes for all rows in the table
        $('input[type="checkbox"]', rows).prop('checked', true);
        rows.each((row) => {
            if ($('input[type="checkbox"]', row).attr('rel')) {
                arr.push($('input[type="checkbox"]', row).attr('rel'))
            }
        })
        $.ajax({
            type: "GET",
            url: base_url + 'admin/Examshedule_schedule/totalCountSchoolWise',
            data: {
                'school_ids': arr,
                'csfr_token_name': csfr_token_value
            },
            success: function(data) {
                if(data==0){
                $('#schoolCount').addClass("d-none");
                $('#countInDistrict').addClass("d-none");
                $('#districtCounts').html("");
                $('#schoolWiseCounts').html('');
                }else{
                $('#schoolCount').removeClass("d-none");
                $('#countInDistrict').removeClass("d-none");
                $('#schoolWiseCounts').html(data);
                }
            
            }
        });

    });


    $('.select_all_uncheck').click(function(event) {
        let rows = table.rows({
            'search': 'applied'
        }).nodes();
        // Check checkboxes for all rows in the table
        $('input[type="checkbox"]', rows).prop('checked', false);
        arr = []
        $('#schoolCount').addClass("d-none");
        $('#schoolWiseCounts').html('');
    });


    function single_send_invitations(id) {
        $('.loaderWrap').removeClass('d-none');
        var send_consent_id = $("#send_consent_id").val();
        var url = "<?php echo base_url('admin/examshedule_schedule/send_invitation_user_all/') ?>"
        $.ajax({
            url: url,
            type: 'get',
            dataType: 'text',
            data: {
                id: id,
                'send_consent_id': send_consent_id
            },
            success: function(result) {
                if (result) {
                    $('.loaderWrap').addClass('d-none');
                    alert("Consent sent sucessfully ");
                    this.checked = false;

                    window.location.reload();
                }

            }
        });
    }

    function revokeConsentsInvitations(id) {
        $('.loaderWrap').removeClass('d-none');
        var send_consent_id = $("#send_consent_id").val();
        var url = "<?php echo base_url('admin/examshedule_schedule/revokeConsentsInvitations/') ?>"
        $.ajax({
            url: url,
            type: 'get',
            dataType: 'text',
            data: {
                id: id,
                'send_consent_id': send_consent_id
            },
            success: function(result) {

                if (result) {
                    $('.loaderWrap').addClass('d-none');
                    alert("Revoked consent successfully");
                    this.checked = false;
                    window.location.reload();
                }

            }
        });
    }

    $('#select_single_count').click(function(event) {
        if (confirm("Are you sure you want to send invitation to only selected users?\nक्या आप वाकई केवल चयनित उपयोगकर्ताओं को ही आमंत्रण भेजना चाहते हैं?")) {
            if (arr.length > 0) {
                $('.loaderWrap').removeClass('d-none');
                var send_consent_id = $("#send_consent_id").val();
                var url = "<?php echo base_url('admin/examshedule_schedule/send_invitation_user_all/') ?>"
                $.ajax({
                    url: url,
                    type: 'get',
                    dataType: 'text',
                    data: {
                        data: arr,
                        'send_consent_id': send_consent_id
                    },
                    success: function(result) {
                        if (result) {
                            $('.loaderWrap').addClass('d-none');
                            alert("Consent sent sucessfully ");
                            window.location.reload();
                        }
                    }
                });
            } else {
                alert('Please click on send at least one checkbox\n(कृपया कम से कम दो चेकबॉक्स भेजें पर क्लिक करें)');
                $("#allcheckids").focus();
                return false;
            }
        } else {
            return false;
        }

    });

    let arr = []

    function getCount(id) {
        if (arr.indexOf(id) === -1) {
            arr.push(id)
        } else {
            arr = arr.filter(item => item !== id)
        }
        $.ajax({
            type: "GET",
            url: base_url + 'admin/Examshedule_schedule/totalCountSchoolWise',
            data: {
                'school_ids': arr,
                'csfr_token_name': csfr_token_value
            },
            success: function(data) {

                $('#schoolCount').removeClass("d-none");
                $('#schoolWiseCounts').html(data);
            }
        });
    }
</script>