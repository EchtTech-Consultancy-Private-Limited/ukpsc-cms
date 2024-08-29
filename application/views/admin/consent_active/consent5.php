<?php
// echo '<pre>';
// print_r($sub_name);
// die;
?>
<script type="text/javascript">
    $(function() {
        $('input').blur(function() {
            $(this).val(
                $.trim($(this).val())
            );
        });
    });
</script>
<style>
    img {
        width: 100% !important;
        height: 200px !important;
        object-fit: contain !important;
    }

    .table-ms td,
    .table-ms th {
        border: 1px solid black;
    }

    .table-ms td:last-child {
        /* border-right: none; */
    }

    .formatColor {
        color: red;
        font-size: 0.99rem;
    }
</style>
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="card card-default color-palette-bo">
            <div class="card-header">
                <div class="d-inline-block">
                    <h3 class="card-title"> <i class="fa fa-pencil"></i> Update Details for - <span style="font-weight:bold;">
                            <?php echo get_exam_name($exam_name_replace_subject_id); ?>
                        </span> </h3>
                </div>
            </div>
            <div class="card-body">
                <div class="container">
                    <div class="card">
                        <div class="form">
                            <div class="left-side">
                                <!-- <div class="left-heading">
                                        <h3></h3>
                                    </div> -->
                                <div class="steps-content">
                                    <h3 class="mb-0">Step <span class="step-number">6</span></h3>
                                </div>
                                <ul class="progress-bar">
                                    <li>School/College/University Information <br>स्कूल/कॉलेज/विश्वविद्यालय विवरण</li>
                                    <li>Principal Details<br>प्रधानाचार्य का विवरण</li>
                                    <li>Centre Superintendent Details<br>केंद्र अधीक्षक का विवरण</li>
                                    <li>Infrastructure Details<br>बुनियादी ढांचे का विवरण</li>
                                    <li>Bank Details<br>बैंक विवरण</li>
                                    <li class="active">Upload Images<br>तश्वीरें अपलोड करो</li>
                                </ul>
                            </div>
                            <div class="right-side">
                                <?php echo form_open_multipart(base_url('admin/consent_active/consent_add_5'), 'id="xin-form" class="form-horizontal" '); ?>

                                <script>
                                    function valueChanged() {
                                        if ($('#checkbox2').is(":checked")) {
                                            $("#down_form_up").hide();
                                            $("#upload_from").show();
                                            // $('#dwn').prop('disabled', true);
                                        } else {
                                            // $("#upload_from").hide();
                                            $("#upload_from").show();
                                        }
                                    }
                                </script>
                                <!-- <div class="main active" id="upload_from" style="display:none;" > -->
                                <div class="main active" id="upload_from">
                                    <div class="text">
                                        <h2>Upload Images (तश्वीरें अपलोड करो)</h2>
                                        <p>Add your School/College/University Images as per required filed</p>
                                    </div>
                                    <?php
                                    $file_url =  base_url('uploads/consent_data/');
                                    $notFoundUrl = $file_url . 'Image-not-available.jpg';
                                    $fileNameType1 = $info['fileName1'] !=''? $file_url  . $info['fileName1']:$file_url.'invalidImage404.jpg';
                                    $fileNameType1 = @get_headers($fileNameType1)[0]=='HTTP/1.1 404 Not Found'?$notFoundUrl:$fileNameType1;
                                    $fileNameType2 = $info['fileName2'] !=''? $file_url  . $info['fileName2']:$file_url.'invalidImage404.jpg';
                                    $fileNameType2 = @get_headers($fileNameType2)[0]=='HTTP/1.1 404 Not Found'?$notFoundUrl:$fileNameType2;  
                                    $fileNameType3 = $info['fileName3'] !=''? $file_url  . $info['fileName3']:$file_url.'invalidImage404.jpg';
                                    $fileNameType3 = @get_headers($fileNameType3)[0]=='HTTP/1.1 404 Not Found'?$notFoundUrl:$fileNameType3;
                                    $fileNameType4 = $info['fileName4'] !=''? $file_url  . $info['fileName4']:$file_url.'invalidImage404.jpg';
                                    $fileNameType4 = @get_headers($fileNameType4)[0]=='HTTP/1.1 404 Not Found'?$notFoundUrl:$fileNameType4;
                                    $fileNameType5 = $info['fileName5'] !=''? $file_url  . $info['fileName5']:$file_url.'invalidImage404.jpg';
                                    $fileNameType5 = @get_headers($fileNameType5)[0]=='HTTP/1.1 404 Not Found'?$notFoundUrl:$fileNameType5;
                                    $fileNameType6 = $info['fileName6'] !=''? $file_url  . $info['fileName6']:$file_url.'invalidImage404.jpg';
                                    $fileNameType6 = @get_headers($fileNameType6)[0]=='HTTP/1.1 404 Not Found'?$notFoundUrl:$fileNameType6;
                                    ?>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label>Parking Area Image <span class="formatColor">(JPG format Only)*
                                                </span><i style="color:#ff0000; font-size:12px;"></i>
                                            </label>
                                            <img src="<?php echo $fileNameType1 ?>" />
                                            <input type="file" style="height: 35px !important; font-size: 14px !important;" class="form-control ImageValidationClass" name="fileName1" id="fileName1" data-file_detail="file_detail1" />

                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Classroom Image 1 <span class="formatColor">(JPG format Only)*
                                                </span><i style="color:#ff0000; font-size:12px;"></i></label>
                                            <img src="<?php echo $fileNameType2 ?>" />
                                            <input type="file" style="height: 35px !important; font-size: 14px !important;" class="form-control ImageValidationClass" name="fileName2" id="fileName2" data-file_detail="file_detail2" />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label>Furniture Image <span class="formatColor">(JPG format Only)*
                                                </span><i style="color:#ff0000; font-size:12px;"></i></label>
                                            <img src="<?php echo $fileNameType3 ?>" />
                                            <input type="file" style="height: 35px !important; font-size: 14px !important;" class="form-control ImageValidationClass" name="fileName3" id="fileName3" data-file_detail="file_detail3" />

                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Class Room Image 2 <span class="formatColor">(JPG format Only)*
                                                </span><i style="color:#ff0000; font-size:12px;"></i></label>
                                            <img src="<?php echo $fileNameType4 ?>" />
                                            <input type="file" style="height: 35px !important; font-size: 14px !important;" class="form-control ImageValidationClass" name="fileName4" id="fileName4" data-file_detail="file_detail4" />

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label>Cloak Room Image <span class="formatColor">(JPG format Only)*
                                                </span><i style="color:#ff0000; font-size:12px;"></i></label>
                                            <img src="<?php echo $fileNameType5 ?>" />
                                            <input type="file" style="height: 35px !important; font-size: 14px !important;" class="form-control ImageValidationClass" name="fileName5" id="fileName5" data-file_detail="file_detail5" />

                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Main Gate Image <span class="formatColor">(JPG format Only)*
                                                </span><i style="color:#ff0000; font-size:12px;"></i></label>
                                            <img src="<?php echo $fileNameType6 ?>" />
                                            <input type="file" style="height: 35px !important; font-size: 14px !important;" class="form-control ImageValidationClass" name="fileName6" id="fileName6" data-file_detail="file_detail5" />

                                        </div>
                                    </div>
                                    <div class="row mt-4">
                                        <div class="col-md-12">
                                            <h5 style="color: #373250;">Exam Name :-
                                                <span class="text-bold" style="color: #e14658;">
                                                    <?php echo get_exam_name($exam_name_replace_subject_id); ?>
                                                </span>
                                            </h5>
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-hover table-striped" style="">
                                                    <thead>
                                                        <tr>
                                                            <th>Date</th>
                                                            <th>Name in english</th>
                                                            <th>Exam shift</th>
                                                            <th>Exam Time </th>
                                                            <?php if (count($sub_info) != 1) { ?>
                                                                <th>Options</th>
                                                            <?php }else{
                                                                ?>
                                                                <th>Option</th>
                                                                <?php
                                                            } ?>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php

                                                        foreach ($sub_info as $x => $val) {
                                                            $all_value = $val['id'];
                                                            // $passValue = ['dateExam'=>date("d-m-Y", strtotime($val['date_exam'])),'shiftExam'=>$val['shft_exam_array'],'timeExam'=>$val['time_exam_array'],'examId'=>$examinationid,'schoolId'=>$schoolId]
                                                            $passValue = $examinationid . "," . $schoolId . "," . date("d-m-Y", strtotime($val['date_exam'])) . "," . $val['shft_exam_array'] . "," . $val['time_exam_array'];

                                                        ?>

                                                            <tr>
                                                                <td>
                                                                    <?= date("d-m-Y", strtotime($val['date_exam'])); ?>
                                                                </td>
                                                                <td>
                                                                    <?= $val['sub_name_english'] . '<br/>' . $val['sub_name_hindi']; ?>
                                                                </td>
                                                                <td>
                                                                    <?= $val['shft_exam_array']; ?>
                                                                </td>
                                                                <td>
                                                                    <?= $val['time_exam_array']; ?>
                                                                </td>
                                                                <?php if(count($sub_info)!=1){
                                                                        ?>
                                                                <td>

                                                                    <input type="hidden" id="yes" id="examincation_ids" name="examincation_ids" value="<?= $val['sub_name'] ?>">
                                                                    <input type="radio" id="yes<?= $x?>"  onclick="optionFunction('<?= $passValue ?>','yes','<?= $x?>')" name="exmin_ceter_option[]<?= $x; ?>" value="Yes" checked>Yes
                                                                    <input type="radio" id="no<?= $x?>"class="checkClass" onclick="optionFunction('<?= $passValue ?>','no','<?= $x?>')" name="exmin_ceter_option[]<?= $x; ?>" value="No">No
                                                                    <input type="hidden" name="examincation_id" id="examincation_id" value="<?= $all_value; ?>" />
                                                                </td>
                                                                <?php }else{
                                                                    ?>
                                                            <td>

                                                                <input type="hidden" id="yes" id="examincation_ids" name="examincation_ids" value="<?= $val['sub_name'] ?>">
                                                                <input type="radio" id="yes" class="yesNoCount" onclick="optionFunction('<?= $passValue ?>','yes','<?= $x?>')" name="exmin_ceter_option[]<?= $x; ?>" value="Yes" checked>Yes
                                                                <!-- <input type="radio" id="no" onclick="optionFunction('<?= $passValue ?>','no')" name="exmin_ceter_option[]<?= $x; ?>" value="No">No -->
                                                                <input type="hidden" name="examincation_id" id="examincation_id" value="<?= $all_value; ?>" />
                                                            </td>
                                                                    <?php
                                                                 }

                                                                  ?>



                                                            </tr>

                                                        <?php

                                                        }

                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <?php $segment_value = $this->uri->segment(4);?>
                                            <input type="hidden" name="ci_exam_registrationid5" id="ci_exam_registrationid5" value="<?= $segment_value; ?>">
                                            <div class="form-group">
                                                <a href="<?= base_url("admin/consent_active/consent_add_4" . '/' . $segment_value); ?>" id="dwn" class="btn btn-sec">
                                                    Back
                                                </a>
                                                <input type="submit" name="submit" id="submit" class="btn btn-primary next_button"  value="Preview and Download Form">
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <?php echo form_close(); ?>
                                
                                <?php echo form_open_multipart(base_url('admin/consent_active/consent_add_5'), 'id="from_upload" class="form-horizontal" '); ?>

                                <div class="main active" id="from_upload_show">
                                    <div class="text ">
                                        <h2>Upload Downloaded Consent Form (Signed and Stamped)<span class="formatColor">(Only PDF & Maximum size 30MB)* </span></h2>
                                        <!-- <p>Add your School/College/Institute Images as per required filed</p> -->
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <input type="file" style="height: 35px !important; font-size: 14px !important;" class="form-control pdfValidationClass" name="from_upload_file" id="from_upload_file" data-file_detail="file_detail1" />
                                            <!-- <span>Upload File (दस्तावेज अपलोड करें) <i style="color:#ff0000; font-size:12px;">*</i> </span> -->
                                        </div>
                                        <!-- onchange="get_detail(this);" -->
                                    </div>
                                    <div class="input-text1">
                                        <?php $segment_value = $this->uri->segment(4); ?>
                                        <input type="hidden" name="ci_exam_fileupload6" id="ci_exam_fileupload6" value="<?= $segment_value; ?>">
                                        <input type="submit" name="submitupload" id="submitupload" class="btn btn-primary btn-block btn-flat next_button" value="Upload Consent Form">
                                    </div>
                                </div>
                                <?php echo form_close(); ?>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php echo form_close(); ?>

<script type='text/javascript'>
    var myLink = document.querySelector('a[href="#"]');
    myLink.addEventListener('click', function(e) {
        e.preventDefault();
    });
</script>
<script>
    $(document).ready(function() {

        const file1 = '<?php echo $fileNameType1; ?>'
        const file2 = '<?php echo $fileNameType2; ?>'
        const file3 = '<?php echo $fileNameType3; ?>'
        const file4 = '<?php echo $fileNameType4; ?>'
        const file5 = '<?php echo $fileNameType5; ?>'
        const file6 = '<?php echo $fileNameType6; ?>'

        function toDataUrl(url, callback) {
            var xhr = new XMLHttpRequest();
            xhr.onload = function() {
                callback(xhr.response);
            };
            xhr.open('GET', url);
            xhr.responseType = 'blob';
            xhr.send();
        }
        // Filename Name 1
        toDataUrl(file1, function(x) {
            let blankURL = '<?= base_url("uploads/consent_data/Image-not-available.jpg"); ?>';
            let newUpdateFile = file1 === blankURL ? '' :  '<?php echo $info['fileName1']; ?>';

            if (newUpdateFile === '') {
                $('#fileName1').val('');
            } else {
                let fileName = newUpdateFile;
                let file = new File([x], fileName, {
                    type: "image/jpeg",
                    lastModified: new Date().getTime()
                }, 'utf-8');
                let container = new DataTransfer();
                container.items.add(file);
                document.querySelector('#fileName1').files = container.files;
            }

        })
        // Filename Name 2
        toDataUrl(file2, function(x) { 
             let blankURL = '<?= base_url("uploads/consent_data/Image-not-available.jpg"); ?>';
            let newUpdateFile = file2 === blankURL ? '' : '<?php echo $info['fileName2']; ?>';
            if (newUpdateFile === '') {
                $('#fileName2').val('');
            } else {
                let fileName = newUpdateFile;
                let file = new File([x], fileName, {
                    type: "image/jpeg",
                    lastModified: new Date().getTime()
                }, 'utf-8');
                let container = new DataTransfer();
                container.items.add(file);
                document.querySelector('#fileName2').files = container.files;
            }
        })
        // Filename Name 3
        toDataUrl(file3, function(x) {
            let blankURL = '<?= base_url("uploads/consent_data/Image-not-available.jpg"); ?>';
            let newUpdateFile = file3 === blankURL ? '' : '<?php echo $info['fileName3']; ?>';
            if (newUpdateFile === '') {
                $('#fileName3').val('');
            } else {
                let fileName = newUpdateFile;
                let file = new File([x], fileName, {
                    type: "image/jpeg",
                    lastModified: new Date().getTime()
                }, 'utf-8');
                let container = new DataTransfer();
                container.items.add(file);
                document.querySelector('#fileName3').files = container.files;
            }
        })
        // Filename Name 4
        toDataUrl(file4, function(x) {
            let blankURL = '<?= base_url("uploads/consent_data/Image-not-available.jpg"); ?>';
            let newUpdateFile = file4 === blankURL ? '' : '<?php echo $info['fileName4']; ?>';
            if (newUpdateFile === '') {
                $('#fileName4').val('');
            } else {
                let fileName = newUpdateFile;
                let file = new File([x], fileName, {
                    type: "image/jpeg",
                    lastModified: new Date().getTime()
                }, 'utf-8');
                let container = new DataTransfer();
                container.items.add(file);
                document.querySelector('#fileName4').files = container.files;
            }
        })
        // Filename Name 5
        toDataUrl(file5, function(x) {
            let blankURL = '<?= base_url("uploads/consent_data/Image-not-available.jpg"); ?>';
            let newUpdateFile = file5 === blankURL ? '' : '<?php echo $info['fileName5']; ?>';
            if (newUpdateFile === '') {
                $('#fileName5').val('');
            } else {
                let fileName = newUpdateFile;
                let file = new File([x], fileName, {
                    type: "image/jpeg",
                    lastModified: new Date().getTime()
                }, 'utf-8');
                let container = new DataTransfer();
                container.items.add(file);
                document.querySelector('#fileName5').files = container.files;
            }
        })
        // Filename Name 6
        toDataUrl(file6, function(x) {
            let blankURL = '<?= base_url("uploads/consent_data/Image-not-available.jpg"); ?>';
            let newUpdateFile = file6 === blankURL ? '' : '<?php echo $info['fileName6']; ?>';
            if (newUpdateFile === '') {
                $('#fileName6').val('');
            } else {
                let fileName = newUpdateFile;
                let file = new File([x], fileName, {
                    type: "image/jpeg",
                    lastModified: new Date().getTime()
                }, 'utf-8');
                let container = new DataTransfer();
                container.items.add(file);
                document.querySelector('#fileName6').files = container.files;
            }
        })
        $("#xin-form")["submit"](function() {

            var fileName1 = $("#fileName1").val();
            var extension1 = fileName1.split('.').pop().toUpperCase();
            if (fileName1 == "") {
                alert("Please upload images 'Parking'\nकृपया चित्र अपलोड करें 'पार्किंग'");
                $("#fileName1").focus();
                return false;
            } else if (extension1 != "PDF" && extension1 != "JPG" && extension1 != "JPEG") {
                avatarok = 0;
                alert("Invalid extension " + extension1 + " Please upload PDF,JPG,JPEG\n" +
                    "अमान्य एक्सटेंशन" + extension1 + "कृपया पीडीएफ, जेपीजी, जेपीईजी अपलोड करें");
                $("#fileName1").focus();
                return false;
            }

            var fileName2 = $("#fileName1").val();
            var extension2 = fileName2.split('.').pop().toUpperCase();
            if ($("#fileName2").val() == "") {
                alert("Please upload images 'Classroom'\nकृपया चित्र अपलोड करें 'कक्षा'");
                $("#fileName2").focus();
                return false;
            } else if (extension2 != "PDF" && extension2 != "JPG" && extension2 != "JPEG") {
                avatarok = 0;
                alert("Invalid extension " + extension2 + " Please upload PDF,JPG,JPEG\n" +
                    "अमान्य एक्सटेंशन" + extension2 + "कृपया पीडीएफ, जेपीजी, जेपीईजी अपलोड करें");
                $("#fileName2").focus();
            }

            var fileName3 = $("#fileName1").val();
            var extension3 = fileName3.split('.').pop().toUpperCase();
            if ($("#fileName3").val() == "") {
                alert("Please upload images 'Washroom'\nकृपया चित्र अपलोड करें 'वाशरूम'");
                $("#fileName3").focus();
                return false;
            } else if (extension3 != "PDF" && extension3 != "JPG" && extension3 != "JPEG") {
                avatarok = 0;
                alert("Invalid extension " + extension3 + " Please upload PDF,JPG,JPEG\n" +
                    "अमान्य एक्सटेंशन" + extension3 + "कृपया पीडीएफ, जेपीजी, जेपीईजी अपलोड करें");
                $("#fileName3").focus();
                return false;
            }

            var fileName4 = $("#fileName4").val();
            var extension4 = fileName4.split('.').pop().toUpperCase();
            if ($("#fileName4").val() == "") {
                alert("Please upload images 'Main Gate'\nकृपया चित्र अपलोड करें 'मेन गेट'");
                $("#fileName4").focus();
                return false;
            } else if (extension4 != "PDF" && extension4 != "JPG" && extension4 != "JPEG") {
                avatarok = 0;
                alert("Invalid extension " + extension4 + " Please upload PDF,JPG,JPEG\n" +
                    "अमान्य एक्सटेंशन" + extension4 + "कृपया पीडीएफ, जेपीजी, जेपीईजी अपलोड करें");
                $("#fileName4").focus();
                return false;
            }

            var fileName5 = $("#fileName5").val();
            var extension5 = fileName5.split('.').pop().toUpperCase();
            if (fileName5 == "") {
                alert("Please upload images 'Locker'\nकृपया चित्र अपलोड करें 'लॉकर'");
                $("#fileName5").focus();
                return false;
            } else if (extension5 != "PDF" && extension5 != "JPG" && extension5 != "JPEG") {
                avatarok = 0;
                alert("Invalid extension " + extension5 + " Please upload PDF,JPG,JPEG\n" +
                    "अमान्य एक्सटेंशन" + extension5 + "कृपया पीडीएफ, जेपीजी, जेपीईजी अपलोड करें");
                $("#fileName5").focus();
                return false;
            }

            var fileName6 = $("#fileName6").val();
            var extension6 = fileName6.split('.').pop().toUpperCase();
            if (fileName6 == "") {
                alert("Please upload 'Main Gate Image'\nकृपया 'मेन गेट इमेज' अपलोड करें");
                $("#fileName6").focus();
                return false;
            } else if (extension6 != "PDF" && extension6 != "JPG" && extension6 != "JPEG") {
                avatarok = 0;
                alert("Invalid extension " + extension6 + " Please upload PDF,JPG,JPEG\n" +
                    "अमान्य एक्सटेंशन" + extension6 + "कृपया पीडीएफ, जेपीजी, जेपीईजी अपलोड करें");
                $("#fileName6").focus();
                return false;
            }

        });

        $("#submitupload").click(function() {
            var from_upload_file = $("#from_upload_file").val();
            var from_upload_fileex = from_upload_file.split('.').pop().toUpperCase();
            if (from_upload_file == "") {
                alert(
                    "Please upload file 'Upload Sign and Stamp Consent Form'\nकृपया फ़ाइल अपलोड करें 'अपलोड साइन और स्टाम्प सहमति फॉर्म'"
                );
                $("#from_upload_file").focus();
                return false;
            } else if (from_upload_fileex != "PDF") {
                avatarok = 0;
                alert("Invalid extension " + from_upload_fileex + " Please upload PDF\n" +
                    "अमान्य एक्सटेंशन" + from_upload_fileex + "कृपया पीडीएफ अपलोड करें");
                $("#from_upload_file").focus();
                return false;
            }
            $("#submitupload").submit();
        });


        // VAlidation of image and pdf 
        $('.ImageValidationClass').change(function() {
            var fileExtension = ['jpeg', 'jpg'];
            let filteTpeExtension = $(this).val().split('.').pop().toLowerCase();
            if (!fileExtension.includes(filteTpeExtension)) {
                alert("Only '.jpeg','.jpg' formats are allowed.");
                $(this).val('');
            }
        })

        $('.pdfValidationClass').change(function() {
            var fileExtension = ['pdf'];
            let filteTpeExtension = $(this).val().split('.').pop().toLowerCase();
            if (!fileExtension.includes(filteTpeExtension)) {
                alert("Only '.pdf' formats are allowed.");
                $(this).val('');
            } else {
                var convertInMB = ((this.files[0].size / 1024) / 1024);
                if (convertInMB > 30) {
                    alert("pdf file should be less and equal to 30MB");
                    $(this).val('');

                }
            }
        })

    });
    // yes ANd No Function 
    var yes = 0;
    var no = 0;
    var totalCount ='<?php echo count($sub_info)?>';
    
    function optionFunction(passArray, option,autoId) {
    
       let count =  $('input.checkClass:checked').length;
        if(option==='yes'){
           no = no-1;
        $('#yes'+autoId).prop('checked',true);
        $('#no'+autoId).prop('checked',false); 
        }else{
            no = no+1;
        $('#yes'+autoId).prop('checked',false);
        $('#no'+autoId).prop('checked',true); 

        }
        if(Number(totalCount)===Number(no) || Number(totalCount) === count){
            no = no-1;
           alert("Please select at least one yes option");
           $('#yes'+autoId).prop('checked',true);
           $('#no'+autoId).prop('checked',false);    
          
        }else{
            $('.next_button').attr("disabled", false);
        }
        var url = "<?php echo base_url('admin/Consent_active/optionsCheck/') ?>"
        $.ajax({
            url: url,
            type: 'get',
            data: {
                passArray: passArray,
                option: option
            },
            success: function(result) {
                return false;
                if (result) {
                    $('.loader').addClass('d-none');
                    alert("success, Sent Sucessfully");
                    this.checked = false;
                    window.location.reload();
                }

            }
        });

    }


    
</script>