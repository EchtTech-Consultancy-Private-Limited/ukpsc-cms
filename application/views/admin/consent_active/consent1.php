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

    .color{

        background-color: #d7d2d2;

    }

</style>

 

<div class="content-wrapper">

<!-- Main content -->

<section class="content">

<div class="card card-default color-palette-bo">

  <div class="card-header">

    <div class="d-inline-block">

      <h3 class="card-title"> <i class="fa fa-pencil"></i> Update Details for - <span style="font-weight:bold;"> <?= $exam_name[0]['subjectline']; ?> </span> </h3>

    </div>

  </div>

  <div class="card-body">

    <div class="table-responsive">

<div class="container">

  <div class="card">

   

    <div class="form">

      <div class="left-side">

        <!-- <div class="left-heading">

          <h3></h3>

        </div> -->

        <div class="steps-content">

          <h3 class="mb-0">Step <span class="step-number">2</span></h3>

          <!--<p class="step-number-content active">Enter your School/College Information.</p>

          <p class="step-number-content d-none">Enter your School/College Principal Deatils</p>

          <p class="step-number-content d-none">Enter your School/College Centre Superintendent Details</p>

          <p class="step-number-content d-none">Enter your School/College Centre Infrastructure Details.</p>

		  <p class="step-number-content d-none">Add Bank Details</p>

		  <p class="step-number-content d-none">Add your School/College Images as per required filed</p>-->

		   

        </div>

        <ul class="progress-bar">

          <li >School/College/University Information<br>स्कूल/कॉलेज/विश्वविद्यालय विवरण</li>

          <li class="active">Principal Details<br>प्रधानाचार्य का विवरण</li>

          <li>Centre Superintendent Details<br>केंद्र अधीक्षक का विवरण</li>

          <li>Infrastructure Details<br>बुनियादी ढांचे का विवरण</li>		  

		  <li>Bank Details<br>बैंक विवरण</li>

		  <li>Upload Images<br>तश्वीरें अपलोड करो</li>

        </ul>

      </div>

   

      <div class="right-side">

       

        <?php echo form_open_multipart(base_url('admin/consent_active/consent_add_1'), 'id="xin-formsubmit" class="form-horizontal" '); ?> 

        <div class="main active">

          <div class="text">

            <h2>Principal's Details (प्राचार्य का विवरण)</h2>

            <p>Enter your School/College/University Principal Details</p>

          </div>

          <div class="input-text">

            <div class="form-group">              

              <label>Principal Name (प्राचार्य का नाम)<i style="color:#ff0000; font-size:12px;">*</i></label>

              <input class="form-control" type="text" name="principal_name"  id="principal_name" value="<?php echo isset($admin['principal_name'])?$admin['principal_name']:'' ?>" >

          </div>

            <div class="form-group">

              <label>Mobile No. (मोबाइल नंबर)<i style="color:#ff0000; font-size:12px;">*</i></label>

              <input class="form-control" type="text" name="pri_mobile" id="pri_mobile" maxlength="10" value="<?php echo isset($admin['pri_mobile'])?$admin['pri_mobile']:'' ?>" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">

            </div>

          

		     <div class="form-group">

              <label>Email (used for communication with UKPSC) ईमेल (यूकेपीएससी के साथ संचार के लिए प्रयुक्त)</label> 

               <input class="form-control" type="text" name="email" id="email" class="color" required readonly value="<?php echo isset($admin['email'])?$admin['email']:'' ?>" >

          </div>

         

            <div class="form-group">

              

              <label>Whats App No. (व्हाट्सएप नंबर)<i style="color:#ff0000; font-size:12px;">*</i></label> 

              <input class="form-control" type="text" name="whats_num" id="whats_num" maxlength="10" value="<?php echo isset($admin['whats_num'])?$admin['whats_num']:'' ?>" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">



            </div>

          </div>

          <div class="form-group mt-4">

          <?php 

            $segment_value = $this->uri->segment(4);

            $admin_id = $this->session->userdata['admin_id'];

          ?>

            <input class="form-control" type="hidden" name="ci_exam_registrationid1" id="ci_exam_registrationid1" value="<?= $segment_value; ?>">

            <a  href="<?= base_url("admin/consent_active/consent_add/".$admin_id.'/'.$segment_value); ?>" title="Download Form"  class="btn btn-sec">Back</a>
             <input type="submit" name="submit" id="submit" class="btn btn-primary next_button" value="Save and Next">

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


<script type='text/javascript'>var myLink = document.querySelector('a[href="#"]');

                                myLink.addEventListener('click', function(e) {

                                  e.preventDefault();

                                });</script>

</script>

<script>

$(document).ready(function () {

  $("#xin-formsubmit")["submit"](function () {

    if ($("#principal_name").val() == "") {

      alert("Please enter 'principal_name'\nकृपया 'प्रिंसिपल_नाम' दर्ज करें");

      $("#principal_name").focus();

      return false;

    }



    var primobile = $('#pri_mobile').val();

    

    if (primobile == "") {

    

      alert("Please enter 'Mobile No'.\nकृपया 'मोबाइल नंबर' दर्ज करें।'");

      $('#pri_mobile').focus();

      return false;



    }else if (primobile.length != 10) {



      alert("Please enter 'Mobile Number' with 10 digit number\nकृपया 10 अंकों की संख्या के साथ 'मोबाइल नंबर' दर्ज करें");

      $('#pri_mobile').focus();

      return false;



    }



    var primobile = $('#whats_num').val();

    

    if (primobile == "") {

    

      alert("Please enter 'Whats App No'.\nकृपया 'व्हाट्सएप नंबर' दर्ज करें।");

      $('#whats_num').focus();

      return false;



    }else if (primobile.length != 10) {



      alert("Please enter 'Whats App No' with 10 digit number\nकृपया 10 अंकों की संख्या के साथ 'व्हाट्सएप नंबर' दर्ज करें");

      $('#whats_num').focus();

      return false;



    }



    // alert(123456);

  });

});

</script>

