<script type="text/javascript">

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

                    <h3 class="card-title"> <i class="fa fa-pencil"></i> Registration for UKPSC exam Centre (यूके0पी0एस0सी0 परीक्षा केंद्र के लिए पंजीकरण) </h3>

                </div>

                <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet'>

                <link rel="stylesheet" href="http://localhost/uk/assets/dist/css/cerrs.css">

                <style>

                </style>

                </head>

                <body className='snippet-body'>

                    <div class="container">

                        <div class="card">

                            <div class="form">

                                <div class="left-side">

                                    <div class="left-heading">

                                        <h3></h3>

                                    </div>

                                    <div class="steps-content">

                                        <h3>Step <span class="step-number">6</span></h3>

                                        <!--<p class="step-number-content active">Enter your School/College Information.</p>

                                            <p class="step-number-content d-none">Enter your School/College Principal Deatils</p>

                                            <p class="step-number-content d-none">Enter your School/College Centre Superintendent Details</p>

                                            <p class="step-number-content d-none">Enter your School/College Centre Infrastructure Details.</p>

                                            <p class="step-number-content d-none">Add Bank Details</p>

                                            <p class="step-number-content d-none">Add your School/College Images as per required filed</p>-->

                                    </div>

                                    <ul class="progress-bar">

                                          <li >School/College Information <br>स्कूल/कॉलेज/विश्वविद्यालय विवरण</li>

                                          <li >Principal Details<br>प्रधानाचार्य का विवरण</li>

                                          <li >Centre Superintendent Details<br>केंद्र अधीक्षक का विवरण</li>

                                          <li >Infrastructure Details<br>बुनियादी ढांचे का विवरण</li>       

                                          <li >Bank Details<br>बैंक विवरण</li>

                                          <li class="active">Upload Images<br>तश्वीरें अपलोड करो</li>

                                    </ul>

                                </div>

                                <div class="right-side">

								 <div class="main active">

								 

								  <div class="input-text1">

									   <div class="input-div">

									  

										   <a  href="<?= base_url("admin/step5/" ); ?>" style="width: 85%;"  id="dwn"  class="btn btn-success ">Back</a>

										

										</div>

										<div class="input-div">

										

										   <a target="_blank" href="<?= base_url("admin/consent_letter/down_form/" . $admin['admin_id']); ?>" style="width: 85%;" title="Download Form"  onclick="return confirm('Download form ?')" class="btn btn-success ">Preview and Download Form</a>

										

										</div>

								</div>

								 

								 

								 

								 

								 

								 

								 

                                        

                                        <div class="col-md-8">

                                             <div id="input-text down_form_up">

											  <div class="input-div">

                                       

                                                                            </div> 

																			 <div class="input-div">

                                       

                                      </div> 

                                         </div>

										 

                                        </div>

										 <div class="input-text">

										 <div id="input-text down_form_up">

                                        



                                        <input type="checkbox" id="checkbox2" onchange="valueChanged()" name="checkbox" value="">

                                        <label for="checkbox2"> Ready to upload the form with sign and stamp and images</label><br>

                                         </div>

										 </div>

                                     

                                      

                                      

                                    </div>

                                    

                                <div id="buttons button_space">

                                       

                                       

                                </div>

                                    

                                    

                                    <?php echo form_open_multipart(base_url('admin/step6'), 'id="xin-form" class="form-horizontal" '); ?> 

                                    

                                    <script>

                               function valueChanged()

                                    {

                                        if($('#checkbox2').is(":checked")){   

                                            $("#down_form_up").hide();

                                            $("#upload_from").show();

                                             // $('#dwn').prop('disabled', true);

                                        }else{

                                            $("#upload_from").hide();

                                        }

                                    }



                                    </script>

                                    <div class="main active" id="upload_from" style="display:none;" >

                                        <div class="text">

                                            <h2>Upload Images (तश्वीरें अपलोड करो)</h2>

                                            <p>Add your School/College/Institute Images as per required filed</p>

                                        </div>

                                        <div class="input-text1">

                                            <div class="input-div">

                                                <input type="file"  class="form-control" name="fileName1" id="fileName1" data-file_detail="file_detail1" onchange="get_detail(this);" />  

                                                <span>Parking Image </span> 

                                            </div>

                                            <div class="input-div">

                                                <input type="file"  class="form-control" name="fileName2" id="fileName2" data-file_detail="file_detail2" onchange="get_detail(this);" />

                                                <span>Classroom Image  </span>

                                            </div>

                                        </div>

                                        <div class="input-text1">

                                            <div class="input-div">

                                                <input type="file"  class="form-control" name="fileName3" id="fileName3" data-file_detail="file_detail3" onchange="get_detail(this);" />

                                                <span>Washroom Image  </span> 

                                            </div>

                                            <div class="input-div">

                                                <input type="file"  class="form-control" name="fileName4" id="fileName4" data-file_detail="file_detail4" onchange="get_detail(this);" />

                                                <span>Main Gate Image  </span>

                                            </div>

                                        </div>

                                        <div class="input-text1">

                                            <div class="input-div">

                                                <input type="file"  class="form-control" name="fileName5" id="fileName5" data-file_detail="file_detail5" onchange="get_detail(this);" />

                                                <span>Locker Image </span> 

                                            </div>

                                            <div class="input-div">

                                                <input type="file"  class="form-control" name="fileName6" id="fileName6" data-file_detail="file_detail5" onchange="get_detail(this);" />

                                                <span>Upload Sign and Stamp Consent Form</span> 

                                            </div>

                                        </div>

                                        <div class="buttons button_space col-md-3">

                                            

                                          <!--   <a target="_blank" href="<?= base_url("admin/consent_letter/down_form/" . $admin['admin_id']); ?>" style="width: 77px;" title="Download Form"  onclick="return confirm('Download form ?')" class="btn btn-success "><i class="fa fa-download"></i></br>Download</a> -->

                                            <!-- <input type="button" name="submit" value="submit" class="submit_button"> -->

                                            <input type="submit" name="submit" class="btn btn-primary submit_button " value="Submit"></input>

                                        </div>

                                    </div>

                                    <?php echo form_close(); ?>

                                </div>

                            </div>

                        </div>

                    </div>

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

                alert("Please upload images 'Parking' ");

                $("#fileName1").focus();

                return false;

            }

              if ($("#fileName2").val() == "") {

                alert("Please upload images 'Classroom ' ");

                $("#fileName2").focus();

                return false;

            } 

              if ($("#fileName3").val() == "") {

                alert("Please upload images 'Washroom' ");

                $("#fileName3").focus();

                return false;

            }

              if ($("#fileName4").val() == "") {

                alert("Please upload images 'Main Gate' ");

                $("#fileName4").focus();

                return false;

            }

            if ($("#fileName5").val() == "") {

                alert("Please upload images 'Locker' ");

                $("#fileName5").focus();

                return false;

            } 

              if ($("#fileName6").val() == "") {

                alert("Please upload  'Singed Consent Form'  ");

                $("#fileName6").focus();

                return false;

            }



      });



    });



</script>

       