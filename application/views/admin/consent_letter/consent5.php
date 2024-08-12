<script type="text/javascript">
    $(function () {
        $('input').blur(function () {
            $(this).val(
                $.trim($(this).val())
            );
        });
    });
</script>
<style>
    .formatColor {
        color:red;
        font-size:0.99rem;
    }
</style>
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="card card-default color-palette-bo">
            <div class="card-header">
                <div class="d-inline-block">
                    <h3 class="card-title"> <i class="fa fa-pencil"></i> Registration for UKPSC Exam Centre
                        (यूके0पी0एस0सी0 परीक्षा केंद्र के लिए पंजीकरण) </h3>
                </div>
            </div>
            <div class="card-body">
                <div class="container">
                    <div class="card">
                        <div class="form">
                            <div class="left-side">
                                <div class="left-heading">
                                    <h3></h3>
                                </div>
                                <div class="steps-content">
                                    <h3>Step <span class="step-number">6</span></h3>
                                   
                                </div>
                                <ul class="progress-bar">
                                    <li>School/College/University Information <br>स्कूल/कॉलेज/विश्वविद्यालय विवरण</li>
                                    <li>Principal Deatils<br>प्रधानाचार्य का विवरण</li>
                                    <li>Centre Superintendent Details<br>केंद्र अधीक्षक का विवरण</li>
                                    <li>Infrastructure Details<br>बुनियादी ढांचे का विवरण</li>
                                    <li>Bank Details<br>बैंक विवरण</li>
                                    <li class="active">Upload Images<br>तश्वीरें अपलोड करो</li>
                                </ul>
                            </div>
                            <div class="right-side">
                                <div class="main active pb-0">

                                    <div class="row mt-4">
                                        <div class="col-md-6">

                                            <a href="<?= base_url("admin/step5/" ); ?>"
                                                id="dwn" class="btn btn-sec w-100">Back</a>

                                        </div>
                                        <div class="col-md-6">

                                            <a target="_blank" href="<?= base_url("admin/consent_letter/down_form/" .
                                                $admin['admin_id']); ?>" title="Download Form"
                                                onclick="return confirm('Download form ?')" class="btn btn-primary w-100
                                                ">Preview and Download Form</a>

                                        </div>
                                    </div>
                                    <!-- <p class="formatColor mt-4 mb-0"> <strong> Instructions :</strong> Kindly click on preview and download form and take the printout of filled information, sign it and then click on ready to upload the form with sign and stamp and images.</p> -->
                                    <div class="input-text">
                                        <div id="input-text down_form_up">


                                            <input type="checkbox" id="checkbox2" onchange="valueChanged()"
                                                name="checkbox" value="">
                                            <label for="checkbox2">Ready to upload the images</label><br>
                                        </div>
                                    </div>



                                </div>


                                <?php echo form_open_multipart(base_url('admin/step6'), 'id="xin-form" class="form-horizontal" '); ?>

                                <script>
                                    function valueChanged() {
                                        if ($('#checkbox2').is(":checked")) {
                                            $("#down_form_up").hide();
                                            $("#upload_from").show();
                                            // $('#dwn').prop('disabled', true);
                                        } else {
                                            $("#upload_from").hide();
                                        }
                                    }

                                </script>
                                <div class="main active" id="upload_from" style="display:none;">
                                    <div class="text">
                                        <h2>Upload Images (तश्वीरें अपलोड करो)</h2>
                                        <p class="mt-0">Add your School/College/Institute Images as per required filed</p>
                                    </div>
                                    <div class="row mt-4">
                                        <div class="form-group col-md-6">
                                            <label>Parking Area Image <span class="formatColor">(JPG format Only)* </span></label>
                                            <input type="file" class="form-control ImageValidationClass"  name="fileName1" id="fileName1"
                                                data-file_detail="file_detail1" onchange="get_detail(this);" style="height: 35px !important; font-size: 14px !important;"/>
                                            
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Classroom Image <span class="formatColor">(JPG format Only)*<span></label>
                                            <input type="file" class="form-control ImageValidationClass" name="fileName2" id="fileName2"
                                                data-file_detail="file_detail2" onchange="get_detail(this);" style="height: 35px !important; font-size: 14px !important;"/>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label>Furniture Image <span class="formatColor">(JPG format Only)*<span></label>
                                            <input type="file" class="form-control ImageValidationClass" name="fileName3" id="fileName3"
                                                data-file_detail="file_detail3" onchange="get_detail(this);" style="height: 35px !important; font-size: 14px !important;"/>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Class Room Image 2 <span class="formatColor">(JPG format Only)*<span></label>
                                            <input type="file" class="form-control ImageValidationClass" name="fileName4" id="fileName4"
                                                data-file_detail="file_detail4" onchange="get_detail(this);" style="height: 35px !important; font-size: 14px !important;"/>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label>Cloak Room Image <span class="formatColor">(JPG format Only)*<span></label>
                                            <input type="file" class="form-control ImageValidationClass" name="fileName5" id="fileName5"
                                                data-file_detail="file_detail5" onchange="get_detail(this);" style="height: 35px !important; font-size: 14px !important;"/>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Main Gate Image   <span class="formatColor">(JPG format Only)*<span></label>
                                            <input type="file" class="form-control ImageValidationClass" name="fileName6" id="fileName6"
                                                data-file_detail="file_detail5" onchange="get_detail(this);" style="height: 35px !important; font-size: 14px !important;"/>
                                        </div>
                                    </div>
                                    <div class="">

                                        <!--   <a target="_blank" href="<?= base_url("admin/consent_letter/down_form/" . $admin['admin_id']); ?>" style="width: 77px;" title="Download Form"  onclick="return confirm('Download form ?')" class="btn btn-success "><i class="fa fa-download"></i></br>Download</a> -->
                                        <!-- <input type="button" name="submit" value="submit" class="submit_button"> -->
                                        <input type="submit" name="submit" class="btn btn-primary  submit_button "
                                            value="Submit"></input>
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
<script type='text/javascript' src='#'></script>
<script type='text/javascript' src='#'></script>
<script type='text/javascript' src='#'></script>
<script type='text/javascript' src='#'></script>
<script type='text/javascript'>
    var next_click = document.querySelectorAll(".next_button");
    var main_form = document.querySelectorAll(".main");
    var step_list = document.querySelectorAll(".progress-bar li");
    var num = document.querySelector(".step-number");
    let formnumber = 0;

    next_click.forEach(function (next_click_form) {
        next_click_form.addEventListener('click', function () {
            if (!validateform()) {
                return false
            }
            formnumber++;
            updateform();
            progress_forward();
            contentchange();
        });
    });

    var back_click = document.querySelectorAll(".back_button");
    back_click.forEach(function (back_click_form) {
        back_click_form.addEventListener('click', function () {
            formnumber--;
            updateform();
            progress_backward();
            contentchange();
        });
    });

    var username = document.querySelector("#principal_name");
    var shownname = document.querySelector(".shown_name");


    var submit_click = document.querySelectorAll(".submit_button");
    submit_click.forEach(function (submit_click_form) {
        submit_click_form.addEventListener('click', function () {
            shownname.innerHTML = username.value;
            formnumber++;
            updateform();
        });
    });

    var heart = document.querySelector(".fa-heart");
    heart.addEventListener('click', function () {
        heart.classList.toggle('heart');
    });


    var share = document.querySelector(".fa-share-alt");
    share.addEventListener('click', function () {
        share.classList.toggle('share');
    });



    function updateform() {
        main_form.forEach(function (mainform_number) {
            mainform_number.classList.remove('active');
        })
        main_form[formnumber].classList.add('active');
    }

    function progress_forward() {
        // step_list.forEach(list => {

        //     list.classList.remove('active');

        // }); 


        num.innerHTML = formnumber + 1;
        step_list[formnumber].classList.add('active');
    }

    function progress_backward() {
        var form_num = formnumber + 1;
        step_list[form_num].classList.remove('active');
        num.innerHTML = form_num;
    }

    var step_num_content = document.querySelectorAll(".step-number-content");

    function contentchange() {
        step_num_content.forEach(function (content) {
            content.classList.remove('active');
            content.classList.add('d-none');
        });
        step_num_content[formnumber].classList.add('active');
    }


                                                // function validateform() {
                                                //     validate = true;
                                                //     var validate_inputs = document.querySelectorAll(".main.active input");
                                                //     validate_inputs.forEach(function (vaildate_input) {
                                                //         vaildate_input.classList.remove('warning');
                                                //         if (vaildate_input.hasAttribute('require')) {
                                                //             if (vaildate_input.value.length == 0) {
                                                //                 validate = false;
                                                //                 vaildate_input.classList.add('warning');
                                                //             }
                                                //         }
                                                //     });
                                                //     return validate;

                                                // }
</script>
<script type='text/javascript'>var myLink = document.querySelector('a[href="#"]');
    myLink.addEventListener('click', function (e) {
        e.preventDefault();
    });
</script>
<script>
    $(document).ready(function () {

        $("#xin-form")["submit"](function () {
            if ($("#fileName1").val() == "") {
                alert("Please upload images 'Parking Area' ");
                $("#fileName1").focus();
                return false;
            }
            if ($("#fileName2").val() == "") {
                alert("Please upload images 'Classroom Image' ");
                $("#fileName2").focus();
                return false;
            }
            if ($("#fileName3").val() == "") {
                alert("Please upload images 'Furniture Image' ");
                $("#fileName3").focus();
                return false;
            }
            if ($("#fileName4").val() == "") {
                alert("Please upload images 'Class Room Image 2' ");
                $("#fileName4").focus();
                return false;
            }
            if ($("#fileName5").val() == "") {
                alert("Please upload images 'Cloak Room Image' ");
                $("#fileName5").focus();
                return false;
            }
            if ($("#fileName6").val() == "") {
                alert("Please upload  'Main Gate Image'  ");
                $("#fileName6").focus();
                return false;
            }

        });

        // VAlidation of image and pdf 
        $('.ImageValidationClass').change(function() {
            var fileExtension = ['jpeg', 'jpg'];
            let filteTpeExtension = $(this).val().split('.').pop().toLowerCase();
            if(!fileExtension.includes(filteTpeExtension)){
                alert("Only '.jpeg','.jpg' formats are allowed.");
                $(this).val('');
            }
            })

           $('.pdfValidationClass').change(function() {
            var fileExtension = ['pdf'];
            let filteTpeExtension = $(this).val().split('.').pop().toLowerCase();
            if(!fileExtension.includes(filteTpeExtension)){
                alert("Only '.pdf' formats are allowed.");
                $(this).val('');
            }
            })

    });

</script>