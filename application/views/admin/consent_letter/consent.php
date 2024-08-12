<?php //echo get_district_name($admin['district']) ?>


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
          <h3 class="card-title"> <i class="fa fa-pencil"></i> Registration for UKPSC Exam Centre (यूके0पी0एस0सी0
            परीक्षा केंद्र के लिए पंजीकरण) </h3>
        </div>
      </div>
      <div class="card-body">
        <div class="container">
          <div class="card">

            <div class="form">
              <div class="left-side">
                <div class="steps-content">
                  <h3>Step <span class="step-number">1</span></h3>

                </div>
                <ul class="progress-bar">
                  <li class="active">School/College/University Information<br>स्कूल/कॉलेज/विश्वविद्यालय की जानकारी</li>
                  <li>Principal Details<br>प्रधानाचार्य का विवरण</li>
                  <li>Centre Superintendent Details<br>केंद्र अधीक्षक का विवरण</li>
                  <li>Infrastructure Details<br>बुनियादी ढांचे का विवरण</li>
                  <li>Bank Details<br>बैंक विवरण</li>
                  <li>Upload Images<br>तश्वीरें अपलोड करो</li>
                </ul>
              </div>

              <div class="right-side">

                <?php echo form_open_multipart(base_url('admin/step1'), 'id="xin-form" class="form-horizontal" '); ?>
                <div class="main active">
                  <div class="text">
                    <h2>School/College/University Information (स्कूल/कॉलेज/विश्वविद्यालय की जानकारी)</h2>
                    <p class="mt-0">Enter your School/College/University Information.</p>
                  </div>
                   <div class="form-group">
                    <label>School/College/University (UKPSC Id) (स्कूल/सेंटर/कॉलेज (यूकेपीएससी आईडी))</label>
                    <input type="text" name="school_registration" id="school_registration_number" class="form-control"
                      required require readonly value="<?php echo $admin['school_registration_number'] ?>">
                  </div>
                   <div class="form-group">
                    <label>School Registration No. (स्कूल पंजीकरण संख्या)</label>
                    <input type="text" name="school_registration" id="school_registration_number" class="form-control"
                      required require readonly value="<?php echo $admin['uni_sch_reg']?$admin['uni_sch_reg']:'' ?>">
                  </div>
                  <div class="input-text">
                    <div class="form-group">
                      <label>School/College/Institute University Name (स्कूल/कॉलेज/विश्वविद्यालय का
                            नाम)</label>
                      <input type="text" name="school_name" class="form-control" readonly id="school_name"
                        value="<?php echo $admin['school_name'] ?>">
                    </div>
                    <div class="form-group">
                      <label>Address (पता)</label>
                      <input type="text" name="address" id="address" readonly class="form-control" require
                        value="<?php echo $admin['address'] ?>">

                    </div>


                    <div class="form-group">
                      <label>Landmark (सीमाचिह्न)</label>
                      <input type="text" name="landmark" id="landmark" class="form-control" readonly require
                        value="<?php echo $admin['landmark'] ?>">

                    </div>

                 

                    <div class="form-group">
                      <label style="font-weight:bold;"> District (ज़िला)</label>
                      <input type="text" name="district" id="state" class="form-control" required readonly require
                        value="<?php echo get_district_name($admin['district']) ?>">
                    </div>

                    <div class="form-group">
                      <label style="font-weight:bold;"> City (शहर)</label>
                    
                      <input type="text" name="city" id="district" class="form-control" required readonly require
                        value="<?php echo get_subcity_name($admin['city']) ?>">
                        <!-- get_city_name -->
                    </div>

                    <div class="form-group mt-4 mb-0">
                      <input type="submit" name="submit" id="submit"
                        class="btn btn-primary next_button" value="Save and Next">

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