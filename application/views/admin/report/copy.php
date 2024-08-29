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

                                <?php echo $title;?> Exam Name: <?php echo $exam_name ?>

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

                                <table class="table table-striped table-bordered" id="consentTable">

                                    <thead>

                                        <tr>

                                            <th>S.No.</th>

                                            <th>School Registration Number</th>

                                            <th>Center Name</th>

                                            <th>Examination Center Code</th>

                                            <th>Address</th>

                                            <th>Landmark</th>

                                            <th>District</th>

                                            <th>City</th>

                                            <th>Pricipal name</th>

                                            <th>Pricipal Mobile</th>

                                            <th>Pricipal Email</th>

                                            <th>Whatsapp Number</th>

                                            <th>Superintendent Name</th>

                                            <th>Superintendent Mobile</th>

                                            <th>Superintendent Email</th>

                                            <th>Superintendent whatspp</th>

                                            <th>Total Class Number</th>

                                            <th>Class Sitting Capacity</th> 

                                            <th>Max Num Student</th>

                                            <th>Furniture Available</th>

                                            <th>Electric Available</th>

                                            <th>generator Available</th> 

                                            <th>Wash Room</th>

                                            <th>Clock Room</th> 

                                            <th>Vehicle Available</th>

                                            <th>Account Holder Name</th>

                                            <th>Bank Name</th>

                                            <th>Branch Name</th>

                                            <th>Ifsc Code</th>

                                            <th>Account Number</th>

                                            <th>Account Number Confirm</th>

                                            <th>Grade</th>

                                            <th>Consent</th>

                                            <th>Allocation</th>

                                            <?php foreach ($date_exam_consent_recieve as $key1 => $date) {?>

                                                <th>

                                                    <?php echo $date?>

                                                    <br>

                                                    (

                                                    <?php echo $shft_exam_consent_recieve[$key1]?>)

                                                </th>





                                                <?php } ?>

                                            <th>Status</th>

                                        </tr>

                                    </thead>

                                    <tbody>

                                        <?php foreach ($data as $key=>$row){ ?> 

                                        <tr>

                                           <td><?php echo $key+1?></td>

                                           <td><?php echo $row['school_registration_number']?></td>

                                           <td><?php echo $row['school_name']?></td>

                                           <td><?php echo $row['centerCode']?></td>

                                           <td><?php echo $row['address']?></td>

                                           <td><?php echo $row['landmark']?></td>

                                           <td><?php echo $row['district']?></td>

                                           <td><?php echo $row['city']?></td>

                                           <td><?php echo $row['principal_name']?></td>

                                           <td><?php echo $row['pri_mobile']?></td>

                                           <td><?php echo $row['email']?></td>

                                           <td><?php echo $row['whats_num']?></td>

                                           <td><?php echo $row['super_name']?></td>

                                           <td><?php echo $row['super_mobile']?></td>

                                           <td><?php echo $row['super_email']?></td>

                                           <td><?php echo $row['super_whatspp']?></td>

                                           <td><?php echo $row['total_class_number']?></td>

                                           <td><?php echo $row['class_sitting_capacity']?></td>

                                           <td><?php echo $row['max_num_student']?></td>

                                           <td><?php echo $row['furniture_avail']?></td>

                                           <td><?php echo $row['elec_avail']?></td>

                                           <td><?php echo $row['gen_avai']?></td>

                                           <td><?php echo $row['wash_rrom']?></td>

                                           <td><?php echo $row['clock_room']?></td>

                                           <td><?php echo $row['vehicle_avail']?></td>

                                           <td><?php echo $row['acc_holder_name']?></td>

                                           <td><?php echo $row['ban_name']?></td>

                                           <td><?php echo $row['branch_name']?></td>

                                           <td><?php echo $row['ifsc']?></td>

                                           <td><?php echo $row['acc_num']?></td>

                                           <td><?php echo $row['acc_num_con']?></td>

                                           <td><?php echo $row['ranking_admin']?></td>

                                           <td><?php echo $row['consent_allocation']?></td>

                                           <td><?php echo $row['max_allocate_candidate']?></td>

                                           <?php foreach ($row['candidateNo'] as $key1 => $v) { 

                                                ?>

                                            <td>

                                            <?php echo isset($v)?$v:''?>

                                            </td>

                                            <?php } ?>

                                           <td>

                                            <?php 

                                             if ($row['invt_recieved']==1 && $row['invite_sent']==1) {

                                              echo 'Recieved';

                                            }

                                             ?>

                                           </td>

                                         

                                        </tr>

                                        <?php }?>

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

                                            <th>Center Name</th>

                                            <th>District</th>

                                            <th>City</th>

                                            <th>Pricipal name</th>

                                            <th>Pricipal Mobile</th>

                                            <th>Pricipal Email</th>

                                            <th>Grade</th>

                                            <th>Max No Of Applicant</th>

                                            <th>Status</th>

                                        </tr>

                                    </thead>

                                    <tbody>

                                        <?php foreach ($notrecieveddata[1] as $key=>$row){ ?> 

                                        <tr>

                                           <td><?php echo $key+1?></td>

                                           <td><?php echo $row['school_name']?></td>

                                           <td><?php echo $row['district']?></td>

                                           <td><?php echo $row['city']?></td>

                                           <td><?php echo $row['principal_name']?></td>

                                           <td><?php echo $row['pri_mobile']?></td>

                                           <td><?php echo $row['email']?></td>

                                           <td><?php echo $row['ranking_admin']?></td>

                                           <td><?php echo $row['max_allocate_candidate']?></td>

                                           <td>

                                            <?php 

                                             if ($row['invt_recieved']==0) {

                                              echo 'Pending';

                                            }

                                             ?>

                                           </td>

                                         

                                        </tr>

                                        <?php }?>

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

                                    <?php foreach ($info   as $key=> $d){?> 

                                        <tr>

                                            <td><?php echo $key+1;?></td>

                                            <td><?php echo $d['examination_center_name'];?></td>

                                            <td><?php echo $d['centerCode'];?></td>

                                            <td><?php echo $d['exam_date'];?></td>

                                            <td><?php echo $d['exam_shift'];?></td>

                                            <td><?php echo $d['present_candidate'];?></td>

                                            <td><?php echo $d['absent_candidate'];?></td>

                                            <td><?php echo $d['total_candidates'];?></td>

                                        </tr> 

                                        <?php }?>                  

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

<script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>

<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>

<script src="<?= base_url() ?>assets/plugins/datatables/dataTables.bootstrap4.js"></script>



<script>

    $(document).ready(function() {

        $('#consentTable').DataTable( {

            dom: 'Bfrtip',

            buttons: [

                'excel'

            ]

        } );

        $('#consentNotRecieve').DataTable( {

            dom: 'Bfrtip',

            buttons: [

                'excel'

            ]

        } );

        $('#attendanceMaster').DataTable( {

            dom: 'Bfrtip',

            buttons: [

                'excel'

            ]

        } );

        $('#consentTable_wrapper .dt-buttons .dt-button span').html('Consent Recieved Report');

        $('#consentNotRecieve_wrapper .dt-buttons .dt-button span').html('Consent Not Recieved Report');

        $('#attendanceMaster_wrapper .dt-buttons .dt-button span').html('Attendance Master Report');



        // 

        $('.dataTables_filter, .dataTable, .dataTables_info, .dataTables_paginate').css('display','none');

    } );

</script>