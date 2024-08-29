<?php //echo '<pre>'; print_r($admin);exit;?>

<!-- Content Wrapper. Contains page content -->

<link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/jquery.collapsibleCheckboxTree.css" type="text/css" />

<script type="text/javascript">

    jQuery(document).ready(function () {

        $('ul#example').collapsibleCheckboxTree();

    });

</script>

<style type="text/css">

    .container-fluid {

        padding: 2rem 5rem;

    }

    .table td,

    .table th {

        vertical-align: middle;

        /* width: 50%; */

    }

    .custom-table td,

    .custom-table th {

        width: 50%;

    }

    hr {

        margin-bottom: 1.8rem;

    }
@media print{
    #info,
    .card-footer{
    display: none;       
    }
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

<div class="">

    <!-- Main content -->

    <section class="content">

        <div class="container-fluid">

            <div class="row">

                <div class="col-md-12">

                    <div class="card" style="margin-bottom: 0 !important;">

                        <div class="card-header">

                        <h2 class="text-center">Uttarakhand Public Service Commission</h2>

                            <div class="d-inline-block">

                                <h3 class="card-title"> <i class="fa fa-pencil"></i>

                                    &nbsp; Consent for <span style="font-weight:bold;">

                                        <?= get_exam_name($exam_name_replace_subject_id) ?>

                                </h3>

                            </div>

                            <!--          <div class="d-inline-block float-right">

                           <a href="<?= base_url('admin/profile/change_pwd'); ?>" class="btn btn-success"><i class="fa fa-list"></i> <?= trans('change_password') ?></a>

                           </div>-->

                        </div>

                        <div class="card-body" style="">

                            <!-- For Messages -->

                            <div class="row">

                                <div class="col-md-12">

                                    <div class="d-inline-block">

                                        <h3 id="info" class="card-title" center>

                                        Kindly check the following information, then sign and stamp it and then scan and upload it.

                                        </h3>

                                    </div>

                                    <div class="table-responsive">

                                        <table class="table table-bordered table-striped custom-table">

                                            <tbody>

                                                <tr>

                                                    <th>Consent for<br>(के लिए सहमति)</th>

                                                    <td><?= $admin['exam_name']; ?></td>

                                                </tr>

                                                <tr>

                                                    <th>

                                                        School/College/University Registration

                                                        No.

                                                        <br>

                                                        (स्कूल/कॉलेज/विश्वविद्यालय पंजीकरण संख्या)

                                                    </th>

                                                    <td><?= $admin['school_registration_number']; ?></td>

                                                </tr>

                                                <tr>

                                                    <th>

                                                        School/College/University Name

                                                        <br>

                                                        (स्कूल/कॉलेज/विश्वविद्यालय का नाम)

                                                    </th>

                                                    <td><?= $admin['school_name']; ?></td>

                                                </tr>

                                                <tr>

                                                    <th>

                                                        School/College/University Address

                                                        <br>

                                                        (स्कूल/कॉलेज/विश्वविद्यालय पता)

                                                    </th>

                                                    <td><?= $admin['address']; ?></td>

                                                </tr>

                                                <tr>

                                                    <th>

                                                        Landmark <br>(सीमाचिह्न)

                                                    </th>

                                                    <td><?= $admin['landmark']; ?></td>

                                                </tr>

                                                <tr>

                                                    <th>District<br>(जिला)</th>

                                                    <td><?= $admin['district']; ?></td>

                                                </tr>

                                                <tr>

                                                    <th>City<br>(शहर)</th>

                                                    <td><?= $admin['city']; ?></td>

                                                </tr>

                                            </tbody>

                                        </table>

                                    </div>

                                    <hr>

                                    <div class="table-responsive">

                                        <table class="table table-bordered table-striped custom-table">

                                            <tbody>

                                                <tr>

                                                    <th>

                                                        Principal's Name<br>(प्रधानाचार्य का नाम)

                                                    </th>

                                                    <td><?= $admin['principal_name']; ?></td>

                                                </tr>

                                                <tr>

                                                    <th>Mobile No.<br>(मोबाइल नंबर)</th>

                                                    <td><?= $admin['pri_mobile']; ?></td>

                                                </tr>

                                                <tr>

                                                    <th>Email ID<br>(ईमेल आईडी)</th>

                                                    <td><?php echo ($admin['email']); ?></td>

                                                </tr>

                                                <tr>

                                                    <th>

                                                        WhatsApp No.<br>(व्हाट्सएप

                                                        नंबर)

                                                    </th>

                                                    <td><?php echo ($admin['whats_num']); ?></td>

                                                </tr>

                                            </tbody>

                                        </table>

                                    </div>

                                    <hr>

                                    <div class="table-responsive">

                                        <table class="table table-bordered table-striped custom-table">

                                            <tbody>

                                                <tr>

                                                    <th>

                                                        Centre Superintendent Name <br>(केंद्र

                                                        अधीक्षक का नाम)

                                                    </th>

                                                    <td><?= $admin['super_name']; ?></td>

                                                </tr>

                                                <tr>

                                                    <th>Designation<br> (पदनाम)</th>

                                                    <td><?= $admin['super_design']; ?></td>

                                                </tr>

                                                <tr>

                                                    <th>Mobile No.<br>(मोबाइल नंबर)</th>

                                                    <td><?php echo ($admin['super_mobile']); ?></td>

                                                </tr>

                                                <tr>

                                                    <th>Email ID<br> (ईमेल आईडी)</th>

                                                    <td><?php echo ($admin['super_email']); ?></td>

                                                </tr>

                                                <tr>

                                                    <th>

                                                        WhatsApp No.<br> (व्हाट्सएप नंबर)

                                                    </th>

                                                    <td><?php echo ($admin['super_whatspp']); ?></td>

                                                </tr>

                                            </tbody>

                                        </table>

                                    </div>

                                    <hr>

                                    <div class="table-responsive">

                                        <table class="table table-bordered table-striped custom-table">

                                            <tbody>

                                                <tr>

                                                    <th>Total Number of room<br>(कक्षा की कुल संख्या)

                                                    </th>

                                                    <td><?= $admin['no_room']; ?></td>

                                                </tr>

                                                <tr>

                                                    <th>

                                                        Number of seats for candidates in each room.            

                                                        <br>

                                                        (प्रत्येक कक्ष में अभ्यर्थियों के बैठने की संख्या)

                                                    </th>

                                                    <td><?= $admin['no_sheet']; ?></td>

                                                </tr>

                                                <tr>

                                                    <th>

                                                        Maximum number of candidates can be allocated in the center.

                                                        <br>

                                                        (केन्द्र में आबंटित किये जा सकने वाले अधिकतम् अभ्यर्थियों की संख्या)

                                                    </th>

                                                    <td><?= $admin['max_allocate_candidate']; ?></td>

                                                </tr>

                                                <tr>

                                                    <th>

                                                        Is there sufficient furniture in the rooms for the candidates?

                                                        <br>(क्या अभ्यर्थियों हेतु कक्षों में फर्नीचर पर्याप्त है?)

                                                    </th>

                                                    <td><?= $admin['furniture_avail']; ?></td>

                                                </tr>

                                                <tr>

                                                    <th>

                                                        Is proper lighting facility is available in rooms?

                                                        <br>(क्या कक्षों में विद्युत की समुचित व्यवस्था है?)

                                                    </th>

                                                    <td><?= $admin['elec_avail']; ?></td>

                                                </tr>

                                                <tr>

                                                    <th>

                                                        Does School/College/Institute/University have a Generator/Power Back up Facility?

                                                        <br>

                                                        (क्या स्कूल/कॉलेज/संस्थान/विश्वविद्यालय में जनरेटर/पावर बैक अप की सुविधा है।?)

                                                    </th>

                                                    <td><?= $admin['gen_avai']; ?></td>

                                                </tr>

                                                <tr>

                                                    <th>

                                                        Does school have separate washroom facilities for

                                                    girls and boys?

                                                    <br>(क्या विद्यालय/केन्द्र में पुरूष व महिला अभ्यर्थियों के लिए

                                                    अलग-अलग प्रसाधन की समुचित व्यवस्था है?)

                                                    </th>

                                                    <td><?= $admin['wash_rrom']; ?></td>

                                                </tr>

                                                <tr>

                                                    <th>

                                                        Does School have a cloakroom facility for keeping

                                                    valuables of candidates?<br>(क्या विद्यालय/केन्द्र में अभ्यर्थियों के कीमती सामान

                                                    रखने के लिए स्कूल में क्लोकरूम की सुविधा है?)

                                                    </th>

                                                    <td><?= $admin['clock_room']; ?></td>

                                                </tr>

                                                <tr>

                                                    <th>

                                                        Does School have a proper parking facility?<br>(क्या

                                                    विद्यालय/केन्द्र में अभ्यर्थियों हेतु वाहन पार्किंग की व्यवस्था है?)

                                                    </th>

                                                    <td><?= $admin['clock_room']; ?></td>

                                                </tr>

                                                <tr>

                                                    <th>

                                                            Does School have sufficient number of invigilators and

                                                        staff for exam conduction.<br>(क्या परीक्षा संचालन के लिए अन्तरीक्षक व स्टाफ पर्याप्त

                                                        संख्या में उपलब्ध हैं?)

                                                    </th>

                                                    <td><?= $admin['staff_suffi']; ?></td>

                                                </tr>

                                                <tr>

                                                    <th>Does the school conduct any examination by Uttarakhand

                                                public service commission? <br>(क्या विद्यालय/केन्द्र में पूर्व में उत्तराखण्ड लोक

                                                सेवा आयोग की कोई परीक्षा हुई है?)</th>

                                                    <td><?= $admin['ukpsc_exxma']; ?></td>

                                                </tr>

                                                <tr>

                                                    <th>

                                                    Has school been debarred from any examination?<br>(क्या

                                                विद्यालय/केन्द्र कभी परीक्षाओं हेतु प्रतिवारित रहा है?)

                                                    </th>

                                                    <td><?= $admin['debar']; ?></td>

                                                </tr>

                                                <tr>

                                                    <th>

                                                            Is principal/centre superintendent brass seal is

                                                        available if not arrange the same as it is required for conducting the examination

                                                        <br>(क्या प्रधानाचार्य/पर्यवेक्षक की ब्रास सील उपलब्ध है? यदि नही तो विभिन्न लिफाफों

                                                        को सील्ड करने के लिए इसकी आवश्यकता होगी तथा परीक्षा आयोजन की दशा में इसे तैयार करा

                                                        लिया जाए।)

                                                    </th>

                                                    <td><?= $admin['bras_Seal']; ?></td>

                                                </tr>

                                                <tr>

                                                    <th>

                                                        Remarks if any? <br>(उक्त के अतिरिक्त अन्य विवरण जिसे आप उपलब्ध कराना

                                                        उचित एंव आवश्यक समझे।)

                                                    </th>

                                                    <td><?php echo $admin['remark_if']; ?></td>

                                                </tr>

                                            </tbody>

                                        </table>

                                    </div>

                                    <hr>

                                    <div class="table-responsive">

                                        <table class="table table-bordered table-striped custom-table">

                                            <tbody>

                                                <tr>

                                                    <th>School/College/Institute/University Account Name<br>(स्कूल / कॉलेज / संस्थान / विश्वविद्यालय खाता नाम)</th>

                                                    <td><?= $admin['acc_holder_name']; ?></td>

                                                </tr>

                                                <tr>

                                                    <th>Bank Name<br>(बैंक का नाम)</th>

                                                    <td><?= $admin['ban_name']; ?></td>

                                                </tr>

                                                <tr>

                                                    <th>Bank Branch Name<br>(बैंक शाखा का नाम)</th>

                                                    <td><?= $admin['branch_name']; ?></td>

                                                </tr>

                                                <tr>

                                                    <th>Bank IFSC Code<br>(बैंक IFSC कोड)</th>

                                                    <td><?= $admin['ifsc']; ?></td>

                                                </tr>

                                                <tr>

                                                    <th>Account Number<br>(खाता संख्या)</th>

                                                    <td><?= $admin['acc_num']; ?></td>

                                                </tr>

                                                <tr>

                                                    <th>Confirm Account Number<br>(खाता संख्या की पुष्टि

                                                करें)</th>

                                                    <td><?= $admin['acc_num_con']; ?></td>

                                                </tr>

                                            </tbody>

                                        </table>

                                    </div>

                                    <hr>

                                    <div class="table-responsive">

                                        <table class="table table-bordered table-striped custom-table">

                                            <tbody>

                                                <tr>

                                                    <th>Signature And Stamp<br />(हस्ताक्षर एवं मुहर) </th>

                                                    <td></td>

                                                </tr>

                                                <tr>

                                                    <th>Name <br />(नाम)</th>

                                                    <td><?= $admin['principal_name']; ?></td>

                                                </tr>

                                                <tr>

                                                    <th>Date<br />(दिनांक) </th>

                                                    <td><?php echo  date("d/m/Y h:s:a"); ?></td>

                                                </tr>

                                                <tr>

                                                    <th>Place<br />(स्थान) </th>

                                                    <td><?= $admin['city']; ?></td>

                                                </tr>

                                            </tbody>

                                        </table>

                                    </div>

                                    <hr />

                                    <div class="table-responsive">

                                        <table class="table table-bordered table-striped">

                                            <thead>

                                                <tr>

                                                    <th>Date</th>

                                                    <th>Name in English</th>

                                                    <th>Exam Shift</th>

                                                    <th>Exam Time </th>

                                                    <!-- <th>No. of Candidates</th> -->

                                                    <th>Examination Center Option</th>

                                                </tr>

                                            </thead>

                                            <tbody>

                                                <?php

                                                    // echo '<pre>';

                                                    // print_r($sub_info);

                                                    

                                                    foreach($sub_info as $x => $val) {

                                                    //    $all_value = $val['id'];

                                                    // echo '<pre>';

                                                    // print_r($val)

                                                ?>

                                                <tr>

                                                    <td>

                                                        <?= date("d-m-Y", strtotime($val['date_exam'])) ; ?>

                                                    </td>

                                                    <td>

                                                        <?= $val['sub_name_english'].'<br/>'.$val['sub_name_hindi'];?>

                                                    </td>

                                                    <td>

                                                        <?= $val['shft_exam_array']; ?>

                                                    </td>

                                                    <td>

                                                        <?= $val['time_exam_array']; ?>

                                                    </td>

                                                   <!--  <td>

                                                        <?= $val['no_candidate_array']; ?>

                                                    </td> -->

                                                    <td>

                                                        <?= $val['exmin_ceter_option_array']; ?>

                                                    </td>

                                                </tr>

                                                <?php    

                                                        // print_r($val);

                                                    }

                                                    // die;

                                                ?>

                                            </tbody>

                                        </table>

                                    </div>

                                </div>

                            </div>

                        </div>

                        <div class="card-footer" align="center">

            

                            <!-- <a  href="<?= base_url("admin/step6/" ); ?>" class="btn btn-ligh">Back</a> -->

                            <?php $segment_value = $this->uri->segment(5);?>

                            <input type="hidden" name="ci_exam_registrationid5" id="ci_exam_registrationid5"

                                value="<?= $segment_value; ?>">

                            <button class="btn btn-ligh" onclick="history.back()">Back</button>

                            <input type="button" class="btn btn-ligh  Print_preview" value="Print"></input>

                        </div>

            

                    </div>



                </div>

            </div>



        </div>

        <!-- /.box-body -->

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

    function histr() {

        history.back();

    }

    $('document').ready(function () { $('textarea').each(function () { $(this).val($(this).val().trim()); }); });

</script>