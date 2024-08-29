<!-- DataTables -->

<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/datatables/dataTables.bootstrap4.css">
<style>
    /* .dataTables_filter, .dataTable, .dataTables_info, .dataTables_paginate {
        display: none;
    } */
    .dt-buttons {
        display: flex;
        justify-content: center;
    }

    .custom-card {
        background: #373250;
    }

    button.dt-button.buttons-excel.buttons-html5 {
        border: none;
        /* padding: 0.6rem 1rem; */
        background: transparent;
        color: #fff;
        cursor: pointer;
        font-size: 1.2rem;
        font-weight: 600;
    }

    button.dt-button.buttons-excel.buttons-html5:focus {
        border: none;
        outline: none;
    }
</style>


<div class="content-wrapper">


    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header border-0">
                            <h3 class="card-title mt-0">
                                <?php echo $title; ?> Exam Name: <?php echo $exam_name ?>
                            </h3>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row mt-4">

                <!-- 1 -->
                <div class="col-md-4">
                    <div class="card custom-card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered d-none" id="consentTable">
                                    <thead>
                                        <tr>
                                            <th>S.No.</th>
                                            <!-- <th>School SNO Uni </th> -->
                                            <th>School Registration No. </th>
                                            <th>School Name </th>
                                            <th>School Address</th>
                                            <th>Landmark</th>
                                            <th>District</th>
                                            <th>City</th>
                                            <th>Principal Name</th>
                                            <th>Principal Mobile</th>
                                            <th>Principal Email</th>
                                            <th>Principal whatsup Number</th>
                                            <th>Centre Superintendent Name</th>
                                            <th>Centre Superintendent Designation</th>
                                            <th>Centre Superintendent Mobile No</th>
                                            <th>Centre Superintendent Email</th>
                                            <th>Centre Superintendent Whatups Number</th>
                                            <th>Total Number of Rooms</th>
                                            <th>Number of Seats for Candidates in Each Room</th>
                                            <th>Maximum number of candidates can be allocated in the center</th>
                                            <th>Sufficient furniture</th>
                                            <th>Lighting facility</th>
                                            <th>Generator facility</th>
                                            <th>Separate Washroom facilities</th>
                                            <th>Clock Room facility</th>
                                            <th>Parking Facility</th>
                                            <th>Number of invigilators and staff</th>
                                            <th>Conduct any Examination</th>
                                            <th>Debarred</th>
                                            <th>Superintendent Brass Seal </th>
                                            <th>Remarks</th>
                                            <th>Account Holder Name</th>
                                            <th>Bank Name</th>
                                            <th>Branch Name</th>
                                            <th>IFSC Code</th>
                                            <th>Account Number</th>
                                            <th>Confirm Account Number</th>
                                            <th>Grade</th>
                                            <th>Consent</th>
                                            <th>Allocation</th>
                                            <?php foreach ($date_exam_consent_recieve as $key1 => $date) { ?>
                                                <th>
                                                    <?php echo $date ?>
                                                    <br>
                                                    (
                                                    <?php echo $shft_exam_consent_recieve[$key1] ?>)
                                                </th>


                                            <?php } ?>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($data as $key => $row) { ?>
                                            <tr>
                                                <td><?php echo $key + 1 ?></td>
                                                <td><?= $row['uniqueSnoschool'] ?></td>
                                                <!-- <td><?= $row['school_registration_number'] ?></td> -->
                                                <td> <?= $row['school_name'] ?></td>
                                                <td><?= $row['address'] ?></td>
                                                <td><?= $row['landmark'] ?></td>
                                                <td><?= $row['district']; ?></td>
                                                <td><?= $row['city']; ?></td>
                                                <td><?= $row['principal_name']; ?></td>
                                                <td><?= $row['pri_mobile'] ?></td>
                                                <td><?= $row['email'] ?></td>
                                                <td><?= $row['whats_num'] ?></td>
                                                <td><?= $row['super_name'] ?></td>
                                                <td><?= $row['super_design'] ?></td>
                                                <td><?= $row['super_mobile'] ?></td>
                                                <td><?= $row['super_email'] ?></td>
                                                <td><?= $row['super_whatspp'] ?></td>
                                                <td><?= $row['no_room'] ?></td>
                                                <td><?= $row['no_sheet'] ?></td>
                                                <td><?= $row['max_allocate_candidate'] ?></td>
                                                <td><?= $row['furniture_avail'] ?></td>
                                                <td><?= $row['elec_avail'] ?></td>
                                                <td><?= $row['gen_avai'] ?></td>
                                                <td><?= $row['wash_rrom'] ?></td>
                                                <td><?= $row['clock_room'] ?></td>
                                                <td><?= $row['vehicle_avail'] ?></td>
                                                <td><?= $row['staff_suffi'] ?></td>
                                                <td><?= $row['ukpsc_exxma'] ?></td>
                                                <td><?= $row['debar'] ?></td>
                                                <td><?= $row['bras_Seal'] ?></td>
                                                <td><?= $row['remark_if'] ?></td>
                                                <td><?= $row['acc_holder_name'] ?></td>
                                                <td><?= $row['ban_name'] ?></td>
                                                <td><?= $row['branch_name'] ?></td>
                                                <td><?= $row['ifsc'] ?></td>
                                                <td><?= $row['acc_num'] ?></td>
                                                <td><?= $row['acc_num_con'] ?></td>
                                                <td><?php echo $row['ranking_admin'] ?></td>
                                                <td><?php echo $row['consent_allocation'] ?></td>
                                                <td><?php echo $row['max_allocate_candidate'] ?></td>

                                                <?php if (count($row['candidateNo']) > 0) { ?>
                                                    <?php
                                                    foreach ($row['candidateNo'] as $key1 => $v) {
                                                    ?>
                                                        <td>
                                                            <?php echo isset($v) ? $v : '' ?>
                                                        </td>
                                                    <?php } ?>
                                                <?php } else { ?>

                                                    <?php foreach ($date_exam_consent_recieve as $key1 => $date) { ?>
                                                        <td>N/A</td>

                                                    <?php } ?>


                                                <?php } ?>

                                                <td>
                                                    <?php
                                                    if ($row['superuserStatus'] == 1) {
                                                        echo 'Recieved';
                                                    }else{
                                                        echo 'Pending';
                                                    }
                                                    
                                                    ?>
                                                </td>

                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- 2 -->
                <div class="col-md-4">
                    <div class="card bg-warning">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered d-none" id="consentNotRecieve">
                                    <thead>
                                        <tr>
                                            <th>S.No.</th>
                                            <th>School Registration No. </th>
                                            <th>School Name </th>
                                            <th>School Address</th>
                                            <th>Landmark</th>
                                            <th>District</th>
                                            <th>City</th>
                                            <th>Principal Name</th>
                                            <th>Principal Mobile</th>
                                            <th>Principal Email</th>
                                            <th>Principal whatsup Number</th>
                                            <th>Centre Superintendent Name</th>
                                            <th>Centre Superintendent Designation</th>
                                            <th>Centre Superintendent Mobile No</th>
                                            <th>Centre Superintendent Email</th>
                                            <th>Centre Superintendent Whatups Number</th>
                                            <th>Total Number of Rooms</th>
                                            <th>Number of Seats for Candidates in Each Room</th>
                                            <th>Maximum number of candidates can be allocated in the center</th>
                                            <th>Sufficient furniture</th>
                                            <th>Lighting facility</th>
                                            <th>Generator facility</th>
                                            <th>Separate Washroom facilities</th>
                                            <th>Clock Room facility</th>
                                            <th>Parking Facility</th>
                                            <th>Number of invigilators and staff</th>
                                            <th>Conduct any Examination</th>
                                            <th>Debarred</th>
                                            <th>Superintendent Brass Seal </th>
                                            <th>Remarks</th>
                                            <th>Account Holder Name</th>
                                            <th>Bank Name</th>
                                            <th>Branch Name</th>
                                            <th>IFSC Code</th>
                                            <th>Account Number</th>
                                            <th>Confirm Account Number</th>
                                            <th>Grade</th>
                                            <th>Consent</th>
                                            <th>Allocation</th>
                                            <?php foreach ($date_exam_consent_not_recieve as $key1 => $date) { ?>
                                                <th>
                                                    <?php echo $date ?>
                                                    <br>
                                                    (
                                                    <?php echo $shft_exam_consent_not_recieve[$key1] ?>)
                                                </th>


                                            <?php } ?>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($notrecieveddata as $key => $row) { ?>
                                            <tr>
                                                <td><?php echo $key + 1 ?></td>
                                                <!-- <td><?= $row['school_registration_number'] ?></td> -->
                                                <td><?= $row['uniqueSnoschool'] ?></td>
                                                <td> <?= $row['school_name'] ?></td>
                                                <td><?= $row['address'] ?></td>
                                                <td><?= $row['landmark'] ?></td>
                                                <td><?= $row['district']; ?></td>
                                                <td><?= $row['city']; ?></td>
                                                <td><?= $row['principal_name']; ?></td>
                                                <td><?= $row['pri_mobile'] ?></td>
                                                <td><?= $row['email'] ?></td>
                                                <td><?= $row['whats_num'] ?></td>
                                                <td><?= $row['super_name'] ?></td>
                                                <td><?= $row['super_design'] ?></td>
                                                <td><?= $row['super_mobile'] ?></td>
                                                <td><?= $row['super_email'] ?></td>
                                                <td><?= $row['super_whatspp'] ?></td>
                                                <td><?= $row['no_room'] ?></td>
                                                <td><?= $row['no_sheet'] ?></td>
                                                <td><?= $row['max_allocate_candidate'] ?></td>
                                                <td><?= $row['furniture_avail'] ?></td>
                                                <td><?= $row['elec_avail'] ?></td>
                                                <td><?= $row['gen_avai'] ?></td>
                                                <td><?= $row['wash_rrom'] ?></td>
                                                <td><?= $row['clock_room'] ?></td>
                                                <td><?= $row['vehicle_avail'] ?></td>
                                                <td><?= $row['staff_suffi'] ?></td>
                                                <td><?= $row['ukpsc_exxma'] ?></td>
                                                <td><?= $row['debar'] ?></td>
                                                <td><?= $row['bras_Seal'] ?></td>
                                                <td><?= $row['remark_if'] ?></td>
                                                <td><?= $row['acc_holder_name'] ?></td>
                                                <td><?= $row['ban_name'] ?></td>
                                                <td><?= $row['branch_name'] ?></td>
                                                <td><?= $row['ifsc'] ?></td>
                                                <td><?= $row['acc_num'] ?></td>
                                                <td><?= $row['acc_num_con'] ?></td>
                                                <td><?php echo $row['ranking_admin'] ?></td>
                                                <td><?php echo $row['consent_allocation'] ?></td>
                                                <td>N/A</td>
                                                <?php if (count($row['candidateNo']) > 0) { ?>
                                                    <?php

                                                    foreach ($row['candidateNo'] as $key1 => $v) {
                                                    ?>
                                                        <td>
                                                            <?php echo isset($v) ? $v : '' ?>
                                                        </td>
                                                    <?php } ?>
                                                <?php } else { ?>
                                                    <?php foreach ($date_exam_consent_not_recieve as $key1 => $date) { ?>
                                                        <td>N/A</td>

                                                    <?php } ?>


                                                <?php } ?>

                                                <td>
                                                 N/A
                                                </td>

                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- 3 -->
                <div class="col-md-4">
                    <div class="card bg-info">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="attendanceMaster" class="table table-bordered table-striped d-none" style="border-collapse: collapse !important;">
                                    <thead>
                                        <tr>
                                            <th>S.No.</th>
                                            <th>Examination Center</th>
                                            <th>Center Code</th>
                                            <th>Date</th>
                                            <th>Shift</th>
                                            <th>Present</th>
                                            <th>Absent</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <?php foreach ($info   as $key => $d) { ?>
                                        <tr>
                                            <td><?php echo $key + 1; ?></td>
                                            <td><?php echo $d['examination_center_name']; ?></td>
                                            <td><?php echo $d['centerCode']; ?></td>
                                            <td><?php echo $d['exam_date']; ?></td>
                                            <td><?php echo $d['exam_shift']; ?></td>
                                            <td><?php echo $d['present_candidate']; ?></td>
                                            <td><?php echo $d['absent_candidate']; ?></td>
                                            <td><?php echo $d['total_candidates']; ?></td>
                                        </tr>
                                    <?php } ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


</div>
<script src="<?= base_url() ?>assets/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables/dataTables.buttons.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables/jszip.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables/buttons.html5.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables/dataTables.bootstrap4.js"></script>

<script>
    $(document).ready(function() {
        $('#consentTable').DataTable({
            dom: 'Bfrtip',
            buttons: [{
                extend: 'excel',
                filename: 'Consent Recieved Report'
            }]
        });
        $('#consentNotRecieve').DataTable({
            dom: 'Bfrtip',
            buttons: [{
                extend: 'excel',
                filename: 'Consent Not Recieved Report'
            }]
        });
        $('#attendanceMaster').DataTable({
            dom: 'Bfrtip',
            buttons: [{
                extend: 'excel',
                filename: 'Attendance Master Report'
            }]
        });
        $('#consentTable_wrapper .dt-buttons .dt-button span').html('Consent Recieved Report');
        $('#consentNotRecieve_wrapper .dt-buttons .dt-button span').html('Consent Not Recieved Report');
        $('#attendanceMaster_wrapper .dt-buttons .dt-button span').html('Attendance Master Report');

        // 
        $('.dataTables_filter, .dataTable, .dataTables_info, .dataTables_paginate').css('display', 'none');
    });
</script>