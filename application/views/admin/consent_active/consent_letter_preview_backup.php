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
        width: 50%;
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
                            <div class="d-inline-block">
                                <h3 class="card-title"> <i class="fa fa-pencil"></i>
                                    &nbsp; Consent for <span style="font-weight:bold;">
                                        <?= $admin['exam_name']; ?>
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
                                        <h3 class="card-title" center>
                                            Please form check, Stamp and upload documents
                                        </h3>
                                    </div>
                                    <div class="row rr">
                                        <div class="col-lg-6 col-md-6 col-sm-10 col-xs-10">
                                            <label for="username" class="lab">Consent for<br>(के लिए सहमति)</label>
                                        </div>
            
                                        <div class="col-lg-6 col-md-6 col-sm-10 col-xs-10">
                                            <input type="text" name="school_registration_number" readonly
                                                value="<?= $admin['exam_name']; ?>" class="ss1" disabled
                                                id="school_registration_number" placeholder="">
                                        </div>
                                        <div class="col-lg-0 col-md-0 col-sm-2 col-xs-2"></div>
                                    </div>
                                    <div class="row rr">
                                        <div class="col-lg-6 col-md-6 col-sm-10 col-xs-10">
                                            <label for="username" class="lab">School/College/University Registration
                                                No.<br>(स्कूल/कॉलेज/विश्वविद्यालय पंजीकरण संख्या)</label>
                                        </div>
            
                                        <div class="col-lg-6 col-md-6 col-sm-10 col-xs-10">
                                            <input type="text" name="school_registration_number" readonly
                                                value="<?= $admin['school_registration_number']; ?>" class="ss1" disabled
                                                id="school_registration_number" placeholder="">
                                        </div>
                                        <div class="col-lg-0 col-md-0 col-sm-2 col-xs-2"></div>
                                    </div>
                                    <div class="row rr">
                                        <div class="col-lg-6 col-md-6 col-sm-10 col-xs-10">
                                            <label for="firstname" class="control-label lab">School/College/University Name
                                                <br>(स्कूल/कॉलेज/विश्वविद्यालय का नाम)</label>
                                        </div>
            
                                        <div class="col-lg-6 col-md-6 col-sm-10 col-xs-10">
                                            <input type="text" name="school_name" readonly value="<?= $admin['school_name']; ?>"
                                                class="ss1" disabled id="school_name" placeholder="">
                                        </div>
                                        <div class="col-lg-0 col-md-0 col-sm-2 col-xs-2"></div>
                                    </div>
                                    <div class="row rr">
                                        <div class="col-lg-6 col-md-6 col-sm-10 col-xs-10">
                                            <label for="lastname" class="control-label lab">Address<br>(स्कूल/कॉलेज/विश्वविद्यालय
                                                पता)</label>
                                        </div>
            
                                        <div class="col-lg-6 col-md-6 col-sm-10 col-xs-10">
                                            <input type="text" name="address" readonly value="<?= $admin['address']; ?>" class="ss1"
                                                disabled id="address" placeholder="">
                                        </div>
                                        <div class="col-lg-0 col-md-0 col-sm-2 col-xs-2"></div>
                                    </div>
                                    <div class="row rr">
            
                                        <!--<div id="emai_superadmin">-->
                                        <div class="col-lg-6 col-md-6 col-sm-10 col-xs-10">
                                            <label for="email" class="control-label lab">Landmark <br>(सीमाचिह्न)</label>
                                        </div>
            
                                        <div class="col-lg-6 col-md-6 col-sm-10 col-xs-10">
                                            <input type="landmark" name="landmark" readonly value="<?= $admin['landmark']; ?>"
                                                class="ss1" disabled id="landmark" placeholder="">
                                            <!-- <input type="text" class="form-control" disabled id="sup_mail" > -->
                                        </div>
                                        <div class="col-lg-0 col-md-0 col-sm-2 col-xs-2"></div>
                                    </div>
                                    <div class="row rr">
            
                                        <!--<div class="col-md-4" id="emai_all">-->
                                        <div class="col-lg-6 col-md-6 col-sm-10 col-xs-10">
                                            <label for="email" class="control-label lab"> District<br>(जिला)</label>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-10 col-xs-10">
                                            <input type="text" name="district" readonly class="ss1" disabled id="district"
                                                value="<?= $admin['district']; ?>">
                                        </div>
                                        <div class="col-lg-0 col-md-0 col-sm-2 col-xs-2"></div>
            
                                    </div>
            
            
                                    <div class="row rr">
                                        <div class="col-lg-6 col-md-6 col-sm-10 col-xs-10">
                                            <label for="mobile_no" class="control-label lab">City<br>(शहर)</label>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-10 col-xs-10">
                                            <input type="text" name="city" readonly value="<?= $admin['city']; ?>" class="ss1"
                                                disabled id="city" placeholder="">
                                        </div>
                                        <div class="col-lg-0 col-md-0 col-sm-2 col-xs-2"></div>
                                    </div>
            
                                </div>
                            </div>
            
            
                            <div class="row ">
                                <div class="col-lg-2 col-md-2 col-sm-1 col-xs-1"></div>
                                <div class="col-lg-8 col-md-8 col-sm-10 col-xs-10">
            
            
                                    <div class="row rr">
                                        <div class="col-lg-6 col-md-6 col-sm-10 col-xs-10" id="all_user">
                                            <label for="mobile_no" class="control-label lab">Principal Name
                                                adsgfasdfasdfas<br>(प्रधानाचार्य का नाम)</label>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-10 col-xs-10">
                                            <input type="text" class="ss1" disabled name="principal_name" id="principal_name"
                                                value="<?= $admin['principal_name']; ?>">
                                        </div>
                                        <div class="col-lg-0 col-md-0 col-sm-2 col-xs-2"></div>
                                    </div>
            
            
                                    <div class="row rr">
                                        <div class="col-lg-6 col-md-6 col-sm-10 col-xs-10" id="all_user">
                                            <label for="mobile_no" class="control-label lab">Mobile No.<br>(मोबाइल नंबर)</label>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-10 col-xs-10">
                                            <input type="text" class="ss1" disabled name="pri_mobile" id="pri_mobile"
                                                value="<?= $admin['pri_mobile']; ?>">
                                        </div>
                                        <div class="col-lg-0 col-md-0 col-sm-2 col-xs-2"></div>
                                    </div>
                                    <div class="row rr">
                                        <div class="col-lg-6 col-md-6 col-sm-10 col-xs-10">
                                            <label for="state" class="control-label lab">Email ID<br>(ईमेल आईडी) </label>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-10 col-xs-10">
                                            <input type="text" name="email" readonly value="<?php echo ($admin['email']); ?>"
                                                class="ss1" disabled id="email" placeholder="">
                                        </div>
                                        <div class="col-lg-0 col-md-0 col-sm-2 col-xs-2"></div>
                                    </div>
                                    <div class="row rr">
                                        <div class="col-lg-6 col-md-6 col-sm-10 col-xs-10">
                                            <label for="district" class="control-label lab">Whats App No.<br>(व्हाट्सएप
                                                नंबर)</label>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-10 col-xs-10">
                                            <input type="text" name="whats_num" value="<?php echo ($admin['whats_num']); ?>"
                                                class="ss1" disabled id="whats_num" placeholder="">
                                        </div>
                                        <div class="col-lg-0 col-md-0 col-sm-2 col-xs-2"></div>
                                    </div>
            
                                </div>
                            </div>
            
                            <div class="row">
                                <div class="col-lg-2 col-md-2 col-sm-1 col-xs-1"></div>
                                <div class="col-lg-8 col-md-8 col-sm-10 col-xs-10">
            
            
                                    <div class="row rr">
                                        <div class="col-lg-6 col-md-6 col-sm-10 col-xs-10" id="all_user">
                                            <label for="mobile_no" class="control-label lab">Centre Superintendent Name <br>(केंद्र
                                                अधीक्षक का नाम)</label>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-10 col-xs-10">
            
                                            <input type="text" class="ss1" disabled name="super_name" id="super_name"
                                                value="<?= $admin['super_name']; ?>">
                                        </div>
                                        <div class="col-lg-0 col-md-0 col-sm-2 col-xs-2"></div>
                                    </div>
            
                                    <div class="row rr">
                                        <div class="col-lg-6 col-md-6 col-sm-10 col-xs-10" id="all_user">
                                            <label for="mobile_no" class="control-label lab">Designation<br> (पदनाम)</label>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-10 col-xs-10">
                                            <input type="text" class="ss1" disabled name="super_design" id="super_design"
                                                value="<?= $admin['super_design']; ?>">
                                        </div>
                                        <div class="col-lg-0 col-md-0 col-sm-2 col-xs-2"></div>
                                    </div>
            
                                    <div class="row rr">
                                        <div class="col-lg-6 col-md-6 col-sm-10 col-xs-10" id="all_user">
                                            <label for="state" class="control-label lab">Mobile No.<br>(मोबाइल नंबर)</label>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-10 col-xs-10">
                                            <input type="text" name="super_mobile" readonly
                                                value="<?php echo ($admin['super_mobile']); ?>" class="ss1" disabled
                                                id="super_mobile" placeholder="">
                                        </div>
                                        <div class="col-lg-0 col-md-0 col-sm-2 col-xs-2"></div>
                                    </div>
            
                                    <div class="row rr">
                                        <div class="col-lg-6 col-md-6 col-sm-10 col-xs-10" id="all_user">
                                            <label for="district" class="control-label lab">Email ID<br> (ईमेल आईडी)</label>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-10 col-xs-10">
                                            <input type="text" name="super_email" value="<?php echo ($admin['super_email']); ?>"
                                                class="ss1" disabled id="super_email" placeholder="">
                                        </div>
                                        <div class="col-lg-0 col-md-0 col-sm-2 col-xs-2"></div>
                                    </div>
            
                                    <div class="row rr">
                                        <div class="col-lg-6 col-md-6 col-sm-10 col-xs-10" id="all_user">
                                            <label for="district" class="control-label lab">Whats App No.<br> (व्हाट्सएप
                                                नंबर)</label>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-10 col-xs-10">
                                            <input type="text" name="super_whatspp" value="<?php echo ($admin['super_whatspp']); ?>"
                                                class="ss1" disabled id="super_whatspp" placeholder="">
                                        </div>
                                        <div class="col-lg-0 col-md-0 col-sm-2 col-xs-2"></div>
                                    </div>
                                </div>
                            </div>
            
                            <div class="row">
                                <div class="col-lg-2 col-md-2 col-sm-1 col-xs-1"></div>
                                <div class="col-lg-8 col-md-8 col-sm-10 col-xs-10">
            
            
                                    <div class="row rr">
                                        <div class="col-lg-6 col-md-6 col-sm-10 col-xs-10" id="all_user">
                                            <label for="registration" class="control-label lab">Total Number of room<br>कक्षा की कुल
                                                संख्या</label>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-10 col-xs-10">
                                            <input type="text" name="no_room" placeholder="Total Number of Class" class="ss1"
                                                disabled id="no_room" value="<?= $admin['no_room']; ?>">
                                        </div>
                                        <div class="col-lg-0 col-md-0 col-sm-2 col-xs-2"></div>
                                    </div>
            
                                    <div class="row rr">
                                        <div class="col-lg-6 col-md-6 col-sm-10 col-xs-10" id="all_user">
                                            <label for="registration" class="control-label lab">Number of seats for candidates in
                                                each room.<br>प्रत्येक कक्ष में अभ्यर्थियों के बैठने की संख्या</label>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-10 col-xs-10">
                                            <input type="text" name="no_sheet" placeholder="Class Sitting Capacity" class="ss1"
                                                disabled id="no_sheet" value="<?= $admin['no_sheet']; ?>">
                                        </div>
                                        <div class="col-lg-0 col-md-0 col-sm-2 col-xs-2"></div>
                                    </div>
            
                                    <div class="row rr">
                                        <div class="col-lg-6 col-md-6 col-sm-10 col-xs-10" id="all_user">
                                            <label for="registration" class="control-label lab">Maximum number of candidates can be
                                                allocated in the center.<br>केन्द्र में आबंटित किये जा सकने वाले अधिकतम् अभ्यर्थियों
                                                की संख्या</label>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-10 col-xs-10">
                                            <input type="text" name="max_num_student" placeholder="Maximum Number of Student"
                                                class="ss1" disabled id="max_num_student"
                                                value="<?= $admin['max_allocate_candidate']; ?>">
                                        </div>
                                        <div class="col-lg-0 col-md-0 col-sm-2 col-xs-2"></div>
                                    </div>
            
                                    <div class="row rr">
                                        <div class="col-lg-6 col-md-6 col-sm-10 col-xs-10" id="all_user">
                                            <label for="Address1" class="lab">Is there sufficient furniture in the rooms for the
                                                candidates?<br>क्या अभ्यर्थियों हेतु कक्षों में फर्नीचर पर्याप्त है?
                                                <!-- <span style="color:red;font-weight:bold">*</span> -->
                                            </label>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-10 col-xs-10">
                                            <input type="text" class="ss1" disabled value="<?= $admin['furniture_avail']; ?>">
            
                                        </div>
                                        <div class="col-lg-0 col-md-0 col-sm-2 col-xs-2"></div>
                                    </div>
            
            
                                    <div class="row rr">
                                        <div class="col-lg-6 col-md-6 col-sm-10 col-xs-10" id="all_user">
                                            <label for="Address2" class="lab">Is proper lighting facility is available in rooms?
                                                <br>क्या कक्षों में विद्युत की समुचित व्यवस्था है?</label>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-10 col-xs-10">
                                            <input type="text" class="ss1" disabled value="<?= $admin['elec_avail']; ?>">
            
                                        </div>
                                        <div class="col-lg-0 col-md-0 col-sm-2 col-xs-2"></div>
                                    </div>
            
            
                                    <div class="row rr">
                                        <div class="col-lg-6 col-md-6 col-sm-10 col-xs-10" id="all_user">
                                            <label for="City" class="lab">Does School/College have a Generator facility?<br>क्या
                                                विद्यालय/केन्द्र में जनरेटर उपलब्ध है? </label>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-10 col-xs-10">
                                            <input type="text" class="ss1" disabled value="<?= $admin['gen_avai']; ?>">
            
                                        </div>
                                        <div class="col-lg-0 col-md-0 col-sm-2 col-xs-2"></div>
                                    </div>
            
                                    <div class="row rr">
                                        <div class="col-lg-6 col-md-6 col-sm-10 col-xs-10" id="all_user">
                                            <label for="Address1" class="lab">Does school have separate washroom facilities for
                                                girls and boys?<br>क्या विद्यालय/केन्द्र में पुरूष व महिला अभ्यर्थियों के लिए
                                                अलग-अलग प्रसाधन की समुचित व्यवस्था है?
                                                <!-- <span style="color:red;font-weight:bold">*</span> -->
                                            </label>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-10 col-xs-10">
                                            <input type="text" class="ss1" disabled value="<?= $admin['wash_rrom']; ?>">
            
            
            
                                        </div>
                                        <div class="col-lg-0 col-md-0 col-sm-2 col-xs-2"></div>
                                    </div>
            
            
                                    <div class="row rr">
                                        <div class="col-lg-6 col-md-6 col-sm-10 col-xs-10" id="all_user">
                                            <label for="Address2" class="lab">Does School have a cloakroom facility for keeping
                                                valuables of candidates?<br>क्या विद्यालय/केन्द्र में अभ्यर्थियों के कीमती सामान
                                                रखने के लिए स्कूल में क्लोकरूम की सुविधा है?</label>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-10 col-xs-10">
                                            <input type="text" class="ss1" disabled value="<?= $admin['clock_room']; ?>">
            
                                        </div>
                                        <div class="col-lg-0 col-md-0 col-sm-2 col-xs-2"></div>
                                    </div>
            
                                    <div class="row rr">
                                        <div class="col-lg-6 col-md-6 col-sm-10 col-xs-10" id="all_user">
                                            <label for="City" class="lab">Does School have a proper parking facility?<br>क्या
                                                विद्यालय/केन्द्र में अभ्यर्थियों हेतु वाहन पार्किंग की व्यवस्था है?</label>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-10 col-xs-10">
                                            <input type="text" class="ss1" disabled value="<?= $admin['clock_room']; ?>">
            
                                        </div>
                                        <div class="col-lg-0 col-md-0 col-sm-2 col-xs-2"></div>
                                    </div>
            
            
                                    <div class="row rr">
                                        <div class="col-lg-6 col-md-6 col-sm-10 col-xs-10" id="all_user">
                                            <label for="Address1" class="lab">Does School have sufficient number of invigilators and
                                                staff for exam conduction.<br>क्या परीक्षा संचालन के लिए अन्तरीक्षक व स्टाफ पर्याप्त
                                                संख्या में उपलब्ध हैं?
                                                <!-- <span style="color:red;font-weight:bold">*</span> -->
                                            </label>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-10 col-xs-10">
                                            <input type="text" class="ss1" disabled value="<?= $admin['staff_suffi']; ?>">
            
                                        </div>
                                        <div class="col-lg-0 col-md-0 col-sm-2 col-xs-2"></div>
                                    </div>
            
            
                                    <div class="row rr">
                                        <div class="col-lg-6 col-md-6 col-sm-10 col-xs-10" id="all_user">
                                            <label for="Address2" class="lab">Does the school conduct any examination by Uttarakhand
                                                public service commission? <br>क्या विद्यालय/केन्द्र में पूर्व में उत्तराखण्ड लोक
                                                सेवा आयोग की कोई परीक्षा हुई है?</label>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-10 col-xs-10">
                                            <input type="text" class="ss1" disabled value="<?= $admin['ukpsc_exxma']; ?>">
                                        </div>
                                        <div class="col-lg-0 col-md-0 col-sm-2 col-xs-2"></div>
                                    </div>
            
                                    <div class="row rr">
                                        <div class="col-lg-6 col-md-6 col-sm-10 col-xs-10" id="all_user">
                                            <label for="City" class="lab">Has school been debarred from any examination?<br>क्या
                                                विद्यालय/केन्द्र कभी परीक्षाओं हेतु प्रतिवारित रहा है?</label>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-10 col-xs-10">
                                            <input type="text" class="ss1" disabled value="<?= $admin['debar']; ?>">
            
                                        </div>
                                        <div class="col-lg-0 col-md-0 col-sm-2 col-xs-2"></div>
                                    </div>
            
            
                                    <div class="row rr">
                                        <div class="col-lg-6 col-md-6 col-sm-10 col-xs-10" id="all_user">
                                            <label for="Address1" class="lab">Is principal/centre superintendent brass seal is
                                                available if not arrange the same as it is required for conducting the examination
                                                <br>(क्या प्रधानाचार्य/पर्यवेक्षक की ब्रास सील उपलब्ध है? यदि नही तो विभिन्न लिफाफों
                                                को सील्ड करने के लिए इसकी आवश्यकता होगी तथा परीक्षा आयोजन की दशा में इसे तैयार करा
                                                लिया जाए।)
                                                <!-- <span style="color:red;font-weight:bold">*</span> -->
                                            </label>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-10 col-xs-10">
                                            <input class="ss1" disabled name="bras_Seal" maxlength="60" placeholder="Brass Seal"
                                                id="bras_Seal" type="text" value="<?= $admin['bras_Seal']; ?>">
                                        </div>
                                        <div class="col-lg-0 col-md-0 col-sm-2 col-xs-2"></div>
                                    </div>
            
            
                                    <div class="row rr">
                                        <div class="col-lg-6 col-md-6 col-sm-10 col-xs-10" id="all_user">
                                            <label class="lab">Remarks if any? <br>(उक्त के अतिरिक्त अन्य विवरण जिसे आप उपलब्ध कराना
                                                उचित एंव आवश्यक समझे।)</label>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-10 col-xs-10">
                                            <textarea class="ss1" disabled id="yes_sugge" name="yes_sugge" rows="4" cols="50">
                                                            <?php echo $admin['remark_if']; ?>
            
                                                        </textarea>
                                        </div>
                                        <div class="col-lg-0 col-md-0 col-sm-2 col-xs-2"></div>
                                    </div>
                                </div>
                            </div>
            
            
                            <div class="row">
                                <div class="col-lg-2 col-md-2 col-sm-1 col-xs-1"></div>
                                <div class="col-lg-8 col-md-8 col-sm-10 col-xs-10">
            
            
                                    <div class="row rr">
                                        <div class="col-lg-6 col-md-6 col-sm-10 col-xs-10" id="all_user">
                                            <label for="Address1" class="lab">Account Holder Name<br>खाता धारक का नाम
                                                <!-- <span style="color:red;font-weight:bold">*</span> -->
                                            </label>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-10 col-xs-10">
                                            <input class="ss1" disabled name="acc_holder_name" maxlength="60"
                                                placeholder="Account Holder Name" id="acc_holder_name" type="text"
                                                value="<?= $admin['acc_holder_name']; ?>">
                                        </div>
                                        <div class="col-lg-0 col-md-0 col-sm-2 col-xs-2"></div>
                                    </div>
            
                                    <div class="row rr">
                                        <div class="col-lg-6 col-md-6 col-sm-10 col-xs-10" id="all_user">
                                            <label for="Address2" class="lab">Bank Name<br>बैंक का नाम</label>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-10 col-xs-10">
                                            <input class="ss1" disabled name="ban_name" maxlength="60"
                                                placeholder="Exam Center Name(अंग्रेजी मे)" id="ban_name" type="text"
                                                value="<?= $admin['ban_name']; ?>">
                                        </div>
                                        <div class="col-lg-0 col-md-0 col-sm-2 col-xs-2"></div>
                                    </div>
            
                                    <div class="row rr">
                                        <div class="col-lg-6 col-md-6 col-sm-10 col-xs-10" id="all_user">
                                            <label for="Address2" class="lab">Bank Branch Name<br>बैंक शाखा का नाम</label>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-10 col-xs-10">
                                            <input class="ss1" disabled name="branch_name" maxlength="60"
                                                placeholder="Account Holder Name(केवल कैपिटल लेटर)" id="branch_name" type="text"
                                                value="<?= $admin['branch_name']; ?>">
                                        </div>
                                        <div class="col-lg-0 col-md-0 col-sm-2 col-xs-2"></div>
                                    </div>
            
                                    <div class="row rr">
                                        <div class="col-lg-6 col-md-6 col-sm-10 col-xs-10" id="all_user">
                                            <label for="Address1" class="lab">Bank IFSC Code<br>बैंक IFSC कोड<span
                                                    style="color:red;font-weight:bold">*</span></label>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-10 col-xs-10">
                                            <input class="ss1" disabled name="ifsc" maxlength="60"
                                                placeholder="Bank Name(केवल कैपिटल लेटर)" id="ifsc" type="text"
                                                value="<?= $admin['ifsc']; ?>">
                                        </div>
                                        <div class="col-lg-0 col-md-0 col-sm-2 col-xs-2"></div>
                                    </div>
            
            
                                    <div class="row rr">
                                        <div class="col-lg-6 col-md-6 col-sm-10 col-xs-10" id="all_user">
                                            <label for="Address2" class="lab">Account Number<br>खाता संख्या</label>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-10 col-xs-10">
                                            <input class="ss1" disabled name="acc_num" maxlength="60"
                                                placeholder="Branch Name/Place" id="acc_num" type="text"
                                                value="<?= $admin['acc_num']; ?>">
                                        </div>
                                        <div class="col-lg-0 col-md-0 col-sm-2 col-xs-2"></div>
                                    </div>
            
                                    <div class="row rr">
                                        <div class="col-lg-6 col-md-6 col-sm-10 col-xs-10" id="all_user">
                                            <label for="Address2" class="lab">Confirm Account Number<br>खाता संख्या की पुष्टि
                                                करें</label>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-10 col-xs-10">
                                            <input class="ss1" disabled name="acc_num_con" maxlength="60" placeholder="IFSC Code"
                                                id="acc_num_con" type="text" value="<?= $admin['acc_num_con']; ?>">
                                        </div>
                                        <div class="col-lg-0 col-md-0 col-sm-2 col-xs-2"></div>
                                    </div>
            
            
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-lg-2 col-md-2 col-sm-1 col-xs-1"></div>
                                <div class="col-lg-8 col-md-8 col-sm-10 col-xs-10">
                                    <div class="row rr" style="height: 8rem;">
                                        <div class="col-lg-6 col-md-6 col-sm-10 col-xs-10" id="all_user">
                                            <label for="" class="lab">Signature And Stamp<br />(हस्ताक्षर एवं मुहर) </label>
                                        </div>
                                    </div>
                                    <!-- <div class="row rr">
                                                <div class="col-lg-6 col-md-6 col-sm-10 col-xs-10" id="all_user" >
                                                            <label for="" class="lab"></label>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-10 col-xs-10" >
                                                            <input class="ss1" disabled id="name_fill" type="text" readonly >
                                                </div> 
                                                <div class="col-lg-0 col-md-0 col-sm-2 col-xs-2"></div>  
                                        </div> -->
                                    <div class="row rr">
                                        <div class="col-lg-6 col-md-6 col-sm-10 col-xs-10" id="all_user">
                                            <label for="" class="lab">Name <br />नाम </label>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-10 col-xs-10">
                                            <input class="ss1" disabled id="name_fill" value="<?= $admin['principal_name']; ?>"
                                                type="text" readonly>
                                        </div>
                                        <div class="col-lg-0 col-md-0 col-sm-2 col-xs-2"></div>
                                    </div>
                
                
                                    <div class="row rr">
                                        <div class="col-lg-6 col-md-6 col-sm-10 col-xs-10" id="all_user">
                                            <label for="" class="lab">Date<br />दिनांक </label>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-10 col-xs-10">
                                            <div class="ss1">
                                                <?php echo date("d/m/Y h:s:a"); ?>
                                            </div>
                                        </div>
                                        <div class="col-lg-0 col-md-0 col-sm-2 col-xs-2"></div>
                                    </div>
                
                
                                    <div class="row rr">
                                        <div class="col-lg-6 col-md-6 col-sm-10 col-xs-10" id="all_user">
                                            <label for="" class="lab">Place<br />Place</label>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-10 col-xs-10">
                                            <input class="ss1" disabled name="place" type="text" value="<?= $admin['city']; ?>"
                                                placeholder="Place">
                                        </div>
                                        <div class="col-lg-0 col-md-0 col-sm-2 col-xs-2"></div>
                                    </div>
                                </div>
                
                
                            </div>
            
                            <hr />
            
                            <table class="center table-ms" style="border: 1px solid black; width:67.5%">
                                <tr>
                                    <td>Date</td>
                                    <td>Name in english</td>
                                    <td>shft exam shift</td>
                                    <td>Exam Time </td>
                                    <td>No Candidate</td>
                                    <td>Exmin Ceter Option</td>
                                </tr>
                
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
                                        <?= $val['date_exam']; ?>
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
                                    <td>
                                        <?= $val['no_candidate_array']; ?>
                                    </td>
                                    <td>
                                        <?= $val['exmin_ceter_option_array']; ?>
                                    </td>
                                    <!-- <td> -->
                                    <!-- <input type="radio" id="yes" name="exmin_ceter_option[]<?= $x; ?>" value="Yes" checked>Yes
                                                                        <input type="radio" id="no" name="exmin_ceter_option[]<?= $x; ?>" value="No">No -->
                                    <!-- </td> -->
                                    <!-- <td> -->
                                    <!-- <input type="text" name="examincation_id[]" id="examincation_id" value="<?= $all_value; ?>"/> -->
                                    <!-- </td> -->
                                </tr>
                                <?php    
                                                                    // print_r($val);
                                                                }
                                                                // die;
                                                            ?>
                            </table>
                        </div>
            
                        
            
                        <div class="card-footer" align="center">
            
                            <!-- <a  href="<?= base_url("admin/step6/" ); ?>" class="btn btn-ligh">Back</a> -->
                            <?php $segment_value = $this->uri->segment(5);?>
                            <input type="hidden" name="ci_exam_registrationid5" id="ci_exam_registrationid5"
                                value="<?= $segment_value; ?>">
                            <a href="<?= base_url(" admin/consent_active/consent_add_5/".$segment_value); ?>" class="btn
                                btn-ligh">Back</a>
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