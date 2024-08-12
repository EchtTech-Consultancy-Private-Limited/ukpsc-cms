<?php // echo '<pre>'; print_r($city_name[0]->subcityname);exit; ?>

<script type="text/javascript">

  $(function () {

    $('input').blur(function () {

      $(this).val(

        $.trim($(this).val())

      );

    });

  });

</script>



<style type="text/css">

  .color {

    background-color: #d7d2d2;

  }

</style>





<div class="content-wrapper">

  <!-- Main content -->

  <section class="content">

    <div class="card card-default color-palette-bo">

      <div class="card-header">

        <div class="d-inline-block">

          <h3 class="card-title"> <i class="fa fa-pencil"></i> Update Details for - <span style="font-weight:bold;">

              <?= $exam_name[0]['subjectline']; ?>

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

                    <h3 class="mb-0">Step <span class="step-number">1</span></h3>



                  </div>

                  <ul class="progress-bar">

                    <li class="active">School/College/University Information<br>स्कूल/कॉलेज/विश्वविद्यालय विवरण</li>

                    <li>Principal Details<br>प्रधानाचार्य का विवरण</li>

                    <li>Centre Superintendent Details<br>केंद्र अधीक्षक का विवरण</li>

                    <li>Infrastructure Details<br>बुनियादी ढांचे का विवरण</li>

                    <li>Bank Details<br>बैंक विवरण</li>

                    <li>Upload Images<br>तश्वीरें अपलोड करो</li>

                  </ul>

                </div>



                <div class="right-side">



                  <?php echo form_open_multipart(base_url('admin/consent_active/consent_add'), 'id="xin-form" class="form-horizontal" '); ?>

                  <div class="main active">

                    <div class="text">

                      <h2>School/College/University Information (स्कूल/कॉलेज की जानकारी)</h2>

                      <p class="mt-0">Enter your School/College/University Information.</p>

                    </div>

                    
                      <div class="form-group">

                        <label>School/College/University (UKPSC Id) (स्कूल/सेंटर/कॉलेज (यूकेपीएससी आईडी))</label>

                        <input type="text" name="school_registration" id="school_registration_number"

                          class="form-control" required require readonly

                          value="<?php echo $admin[0]['school_registration_number'] ?>">

                      </div>

                        <div class="form-group">

                        <label>School Registration No. (स्कूल पंजीकरण संख्या)</label>

                        <input type="text" name="school_registration" id="school_registration_number"

                          class="form-control" required require readonly

                          value="<?php echo isset($admin[0]['uni_sch_reg'])?$admin[0]['uni_sch_reg']:'' ?>">

                      </div>

                    <div class="input-text">

                      <div class="form-group">

                        <label>School/College/Institute University Name (स्कूल/कॉलेज/विश्वविद्यालय का
                            नाम)</label>

                        <input type="text" name="school_name" class="form-control" id="school_name" readonly

                          value="<?php echo $admin[0]['school_name'] ?>">

                      </div>

                      <div class="form-group">

                        <label>Address (पता)</label>

                        <input type="text" name="address" id="address" class="form-control" readonly require

                          value="<?php echo $admin[0]['address'] ?>">



                      </div>





                      <div class="form-group">

                        <label>Landmark (सीमाचिह्न)</label>

                        <input type="text" name="landmark" id="landmark" class="form-control" readonly require

                          value="<?php echo $admin[0]['landmark'] ?>">



                      </div>



                      <div class="form-group">

                        <label style="font-weight:bold;"> District (ज़िला)</label>

                        <!-- <input type="text"  name="district" id="state"  class="form-control" required readonly require value="<?php echo $admin[0]['district'] ?>"> -->

                        <input type="text" name="district" id="state" class="form-control" required readonly require

                          value="<?= $district[0]->name; ?>">

                      </div>

                      <div class="form-group">

                        <label style="font-weight:bold;"> City (शहर)</label>

                        <!-- <input type="text" name="city" id="district" class="form-control"  required readonly require value="<?php echo $admin[0]['city'] ?>"> -->

                        <input type="text" name="city" id="district" class="form-control" required readonly require

                          value="<?= $city_name[0]->subcityname; ?>">

                      </div>

                      <div class="form-group">

                        <label style="font-weight:bold; display:none;"> exam_name</label>

                        <input type="hidden" name="exam_name" id="exam_name" class="form-control" required readonly

                          require value="<?php echo $exam_name[0]['subjectline'] ?>">

                      </div>



                      <div class="form-group mt-4 mb-0">

                        <!-- <button class="next_button">Next Step</button> -->

                        <?php $segment_value = $this->uri->segment(4);?>

                        <!-- <input type="submit" name="submit" id="submit" class="btn btn-primary btn-block btn-flat next_button" value="Submit And Next"> -->

                        <input type="hidden" name="ci_exam_registrationid" id="ci_exam_registrationid"

                          value="<?= $this->uri->segment(5); ?>">

                        <input type="submit" name="submit" id="submit"

                          class="btn btn-primary next_button" value="Next">



                      </div>

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





        function validateform() {

          validate = true;

          var validate_inputs = document.querySelectorAll(".main.active input");

          validate_inputs.forEach(function (vaildate_input) {

            vaildate_input.classList.remove('warning');

            if (vaildate_input.hasAttribute('require')) {

              if (vaildate_input.value.length == 0) {

                validate = false;

                vaildate_input.classList.add('warning');

              }

            }

          });

          return validate;



        }</script>

      <script type='text/javascript'>var myLink = document.querySelector('a[href="#"]');

        myLink.addEventListener('click', function (e) {

          e.preventDefault();

        });</script>

      </script>