<!-- Content Wrapper. Contains page content -->
<link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/jquery.collapsibleCheckboxTree.css" type="text/css" />
<script type="text/javascript">
    jQuery(document).ready(function () {
        $('ul#example').collapsibleCheckboxTree();
    });
</script>
<style type="text/css">
    .table th,
    .table td {
        vertical-align: middle;
        width: 50%;
    }
    .btn-primary {
        font-size: 14px;
    }

    .li_root {
        float: left;
        width: 20%
    }

    .fa-ul li ul li {
        float: left;
        width: 100%
    }

    .abc {
        font-weight: bold;
        font-size: 15px;

        padding-left: auto;
        text-decoration: underline;
    }

    .ss1 {

        border: none !important;
        background-color: #fff !important;
        text-align: left;
        //padding: 20px;
    }

    .rr {
        border: 1px solid black;
    }

    .lab {
        border-right: 1px solid black;
        WIDTH: 100%;

        HEIGHT: 100%;
        padding: 5px;

    }

    label {
        height: auto;
        color: #000;
        font-size: 16px;
    }

    input,
    select {
        color: #000;
        font-size: 16px;
    }

    .card {
        opacity: 1;
    }

    select:disabled {
        opacity: 1;
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
<div class="container-fluid" style="background: #f0f8ff;">
    <!-- Main content -->
    <section class="content p-5">
        <div class="card">
            <div class="card-header">
                <div class="d-inline-block">
                    <h3 class="card-title">
                        <i class="fa fa-pencil"></i>
                        &nbsp; Registration Form &nbsp; (पंजीकरण फॉर्म)
                    </h3>
                </div>
            </div>
            
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>School/College/University Registration No.<br>(स्कूल/कॉलेज/विश्वविद्यालय पंजीकरण
                                        संख्या)</th>
                                    <td>
                                        <?= isset($admin['school_registration_number'])?$admin['school_registration_number']:''; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>School/College/University Name <br>(स्कूल/कॉलेज/विश्वविद्यालय का नाम)</th>
                                    <td>
                                        <?= isset($admin['school_name'])?$admin['school_name']:''; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>School/College/University Address<br>(स्कूल/कॉलेज/विश्वविद्यालय पता)</th>
                                    <td>
                                        <?= isset($admin['address'])?$admin['address']:''; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Landmark <br>(सीमाचिह्न)</th>
                                    <td>
                                        <?= isset($admin['landmark'])?$admin['landmark']:''; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>District<br>(जिला)</th>
                                    <td>
                                        <?= isset($admin['district'])?$admin['district']:''; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>City<br>(शहर)</th>
                                    <td>
                                        <?= isset($admin['city'])?$admin['city']:''; ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <hr>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>Principal Name<br>(प्रधानाचार्य का नाम)</th>
                                    <td>
                                        <?= isset($admin['principal_name'])?$admin['principal_name']:''; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Mobile No.<br>(मोबाइल नंबर)</th>
                                    <td>
                                        <?= isset($admin['pri_mobile'])?$admin['pri_mobile']:''; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Email ID<br>(ईमेल आईडी)</th>
                                    <td>
                                        <?php echo isset(($admin['email']))?($admin['email']):''; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>WhatsApp No.<br>(व्हाट्सएप नंबर)</th>
                                    <td>
                                        <?php echo isset(($admin['whats_num']))?($admin['whats_num']):''; ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <hr>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>Centre Superintendent Name <br>(केंद्र अधीक्षक का नाम)</th>
                                    <td>
                                        <?= isset($admin['super_name'])?$admin['super_name']:''; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Designation<br> (पदनाम)</th>
                                    <td>
                                        <?= isset($admin['super_design'])?$admin['super_design']:''; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Mobile No.<br>(मोबाइल नंबर)</th>
                                    <td>
                                        <?php echo (isset($admin['super_mobile'])?$admin['super_mobile']:''); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Email ID<br> (ईमेल आईडी)</th>
                                    <td>
                                        <?php echo (isset($admin['super_email'])?$admin['super_email']:''); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>WhatsApp No.<br> (व्हाट्सएप नंबर)</th>
                                    <td>
                                        <?php echo (isset($admin['super_whatspp'])?$admin['super_whatspp']:''); ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <hr>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>Total Number of Rooms<br>कक्षा की कुल संख्या</th>
                                    <td>
                                        <?= isset($admin['no_room'])?$admin['no_room']:''; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Number of Seats for Candidates in Each Room<br>(प्रत्येक कक्ष में अभ्यर्थियों के
                                        बैठने की संख्या)</th>
                                    <td>
                                        <?= isset($admin['no_sheet'])?$admin['no_sheet']:''; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Maximum number of candidates can be allocated in the center<br>(केन्द्र में
                                        आबंटित किये जा सकने वाले अधिकतम् अभ्यर्थियों की संख्या)</th>
                                    <td>
                                        <?= isset($admin['max_allocate_candidate'])?$admin['max_allocate_candidate']:''; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Is there sufficient furniture in the rooms for the candidates?<br>(क्या
                                        अभ्यर्थियों हेतु कक्षों में फर्नीचर पर्याप्त है?)</th>
                                    <td>
                                        <?= isset($admin['furniture_avail'])?$admin['furniture_avail']:''; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Is proper lighting facility is available in rooms? <br>(क्या कक्षों में विद्युत
                                        की समुचित व्यवस्था है?)</th>
                                    <td>
                                        <?= isset($admin['elec_avail'])?$admin['elec_avail']:''; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Does School/College/Institute/University have a Generator/Power Back up Facility?<br>(क्या स्कूल/कॉलेज/संस्थान/विश्वविद्यालय में जनरेटर/पावर बैक अप की सुविधा है?) </th>
                                    <td>
                                        <?= isset($admin['gen_avai'])?$admin['gen_avai']:''; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Does school have separate washroom facilities for girls and boys?<br>(क्या
                                        विद्यालय/केन्द्र में पुरूष व महिला अभ्यर्थियों के लिए अलग-अलग प्रसाधन की समुचित
                                        व्यवस्था है?)</th>
                                    <td>
                                        <?= isset($admin['wash_rrom'])?$admin['wash_rrom']:''; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Does School have a cloakroom facility for keeping valuables of
                                        candidates?<br>(क्या विद्यालय/केन्द्र में अभ्यर्थियों के कीमती सामान रखने के लिए
                                        स्कूल में क्लोकरूम की सुविधा है?)</th>
                                    <td>
                                        <?= isset($admin['clock_room'])?$admin['clock_room']:''; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Does School have a proper parking facility?<br>क्या विद्यालय/केन्द्र में
                                        अभ्यर्थियों हेतु वाहन पार्किंग की व्यवस्था है?</th>
                                    <td>
                                        <?= isset($admin['clock_room'])?$admin['clock_room']:''; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Does School have sufficient number of invigilators and staff for exam
                                        conduction?<br>(क्या परीक्षा संचालन के लिए अन्तरीक्षक व स्टाफ पर्याप्त संख्या
                                        में उपलब्ध हैं?)</th>
                                    <td>
                                        <?= isset($admin['staff_suffi'])?$admin['staff_suffi']:''; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Does the school conduct any examination by Uttarakhand public service
                                        commission? <br>(क्या विद्यालय/केन्द्र में पूर्व में उत्तराखण्ड लोक सेवा आयोग की
                                        कोई परीक्षा हुई है?)</th>
                                    <td>
                                        <?= isset($admin['ukpsc_exxma'])?$admin['ukpsc_exxma']:''; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Has school been debarred from any examination?<br>(क्या विद्यालय/केन्द्र कभी
                                        परीक्षाओं हेतु प्रतिवारित रहा है?)</th>
                                    <td>
                                        <?= isset($admin['debar'])?$admin['debar']:''; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Is principal/centre superintendent brass seal is available if not arrange the
                                        same as it is required for conducting the examination <br>(क्या
                                        प्रधानाचार्य/पर्यवेक्षक की ब्रास सील उपलब्ध है? यदि नही तो विभिन्न लिफाफों को
                                        सील्ड करने के लिए इसकी आवश्यकता होगी तथा परीक्षा आयोजन की दशा में इसे तैयार करा
                                        लिया जाए।)</th>
                                    <td>
                                        <?= isset($admin['bras_Seal'])?$admin['bras_Seal']:''; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Remarks if any? <br>(उक्त के अतिरिक्त अन्य विवरण जिसे आप उपलब्ध कराना उचित एंव
                                        आवश्यक समझे।)</th>
                                    <td>
                                        <?php echo isset($admin['remark_if'])?$admin['remark_if']:''; ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <hr>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>School/College/Institute/University Account Name<br>(स्कूल / कॉलेज / संस्थान / विश्वविद्यालय खाता नाम)</th>
                                    <td>
                                        <?= isset($admin['acc_holder_name'])?$admin['acc_holder_name']:''; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Bank Name<br>(बैंक का नाम)</th>
                                    <td>
                                        <?= isset($admin['ban_name'])?$admin['ban_name']:''; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Bank Branch Name<br>(बैंक शाखा का नाम)</th>
                                    <td>
                                        <?= isset($admin['branch_name'])?$admin['branch_name']:''; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Bank IFSC Code<br>(बैंक IFSC कोड)</th>
                                    <td>
                                        <?= isset($admin['ifsc'])?$admin['ifsc']:''; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Account Number<br>(खाता संख्या)</th>
                                    <td>
                                        <?= isset($admin['acc_num'])?$admin['acc_num']:''; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Confirm Account Number<br>(खाता संख्या की पुष्टि करें)</th>
                                    <td>
                                        <?= isset($admin['acc_num_con'])?$admin['acc_num_con']:''; ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <hr>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>Name</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>Date</th>
                                    <td>
                                        <?php echo date("d/m/Y h:s a"); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Place</th>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <hr>
            <div class="card-footer" align="center">

                <a href="<?= base_url("admin/profile/consent_user" ); ?>" class="btn btn-ligh">Back</a>
                <input type="button" class="btn btn-ligh  Print_preview" value="Print"></input>
            </div>
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
    function histr() {
        history.back();
    }
    $('document').ready(function () { $('textarea').each(function () { $(this).val($(this).val().trim()); }); });
</script>