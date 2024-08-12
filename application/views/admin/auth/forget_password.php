<style type="text/css">
  .group-edit {

    margin: auto auto 1rem auto;

  }
  .retrive {
    padding: 20px;
    text-align: center;
  }
  .login-box-msg {
    /* width: 445px; */
    margin: auto;
    color: black;
    font-size: 16px;
    /*font-weight: bold;*/
    text-align: center;
    border-radius: 5px;
    padding: 5px;
    /*background: #092f58;*/
  }
  /* .login-box{
    max-width:650px !important;
    margin-left:auto;
    margin-rigth:auto;
  } */
  
  .forgot-password-card{
    max-width:500px;
    margin:50px auto;
    
  }
</style>
<div class="form-background">
  <div class="px-3">
    <!-- /.login-logo -->
    <div class="card forgot-password-card">
      <div class="card-body login-card-body"
        style="width: 100%; padding: 10px; margin: 0 auto; background-color: #373250; color: #fff; border-radius: 1.25rem;">
        <div class="login-logo mt-4">
          <img src="<?= base_url(); ?>assets/dist/img/ukpsc_logo.png" height="110" />
        </div>
        <p class="login-box-msg mt-3 p-0 text-bold text-white" class="mb-4 ">Forgot Password (पासवर्ड भूल गए)</p>
        <hr class="style1" style="border-color: #fff;">
        <?php $this->load->view('admin/includes/_messages.php') ?>
        
    <?php if ($this->session->flashdata('error')): ?>

<div class="m-b-15 flasremove" >

    <div class="alert alert-error alert-dismissable">

        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>

        <p>

            <i class="icon fa fa-check"></i>

            <?php echo $this->session->flashdata('error'); ?>

        </p>

    </div>

</div>

<?php endif; ?>
        <?php echo form_open(base_url('admin/auth/forgot_password'), 'id="xin-form"  class="login-form" '); ?>
        <p class="retrive">
          Please provide your Email Id to retrieve the password <br>(पासवर्ड पुनः प्राप्त करने के लिए
          कृपया अपना ईमेल आईडी दर्ज करें)
        </p>

        <div class="form-group has-feedback col-10 group-edit mb-4">
          <label class="text-white">Registered Email ID (पंजीकृत ईमेल आईडी)</label>
          <input type="email" name="email" id="email" class="form-control" placeholder="">
        </div>

        <div class="form-group has-feedback  col-10 group-edit">
          <div class="d-flex align-items-center justify-content-between">
            <div name="captcha" id="captcha" class="fpass" style="margin-right:10px;" placeholder="<?= trans('password') ?>"></div>
            <div class="d-flex" style="cursor:pointer;">
              <i class="fa fa-refresh cursor pt-1" id="captcha_refres" aria-hidden="true"></i> 
              <label class="text-white" class="" style="margin-left: 5px;"> 
                <span class="text-white text-normal">Refresh Captcha </span> 
                <span class="text-white text-normal">(कैप्चा रिफ्रेश करें)</span> 
              </label> 
            </div>
          </div>
          <script type="text/javascript">
            $("#captcha_refres").on('click', function () {
              createCaptcha();
              document.getElementById("cpatchaTextBox").value = "";
            });
          </script>
        </div>
        <div class="form-group has-feedback  col-10 group-edit">
          <label class="text-white">Captcha (कॅप्चा)</label> 
          <input type="text" name="cpatchaTextBox" id="cpatchaTextBox" class="form-control" placeholder="">
        </div>

        <div class="row" style="justify-content: center;">
          <div class="col-3">

            <input type="submit" name="submit" id="submit" class="btn btn-signin btn-block btn-flat"
              value="<?= trans('submit') ?>">

          </div>
        </div>

        <?php echo form_close(); ?>

        <p class="mt-3 hs-pass" style="text-align: center;">
          <a href="<?= base_url('admin/auth/login'); ?>">
            <?= trans('you_remember_password') ?><br />आपको पासवर्ड याद है? साइन इन करें
          </a>
        </p>

      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
  <!-- /.login-box -->
</div>

<script>

  $(document).ready(function () {
    createCaptcha();
    $("#xin-form")["submit"](function (d) {
      if ($("#email").val() == "") {
        alert("Please fill 'Email' field\nकृपया 'ईमेल' फ़ील्ड भरें");
        $("#email").focus();
        return false;
      }
      var femail = $("#email").val();
      var mailformat = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
      if (!femail.match(mailformat)) {
        alert("You have entered an invalid email ID!\nआपने एक अमान्य ईमेल आईडी दर्ज की है!");
        $("#email").focus();
        return false;
      }

      if ($("#cpatchaTextBox").val() == "") {
        alert("Please fill 'Captcha' field\nकृपया 'कैप्चा' फ़ील्ड भरें");
        $("#email").focus();
        return false;
      } else if ($("#cpatchaTextBox").val() != code) {
        alert("Invalid Captcha. try Again");
        createCaptcha();
        document.getElementById("cpatchaTextBox").value = "";
        $("#cpatchaTextBox").focus();
        return false;
      }
    });
  });
  //createCaptcha function code//
  var code;
  function createCaptcha() {
    //clear the contents of captcha div first 
    document.getElementById('captcha').innerHTML = "";
    var charsArray ="0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";

    var lengthOtp = 7;

    var captcha = [];

    for (var i = 0; i < lengthOtp; i++) {

      //below code will not allow Repetition of Characters

      var index = Math.floor(Math.random() * charsArray.length + 1); //get the next character from the array

      if (captcha.indexOf(charsArray[index]) == -1)

        captcha.push(charsArray[index]);

      else i--;

    }

    var canv = document.createElement("canvas");

    canv.id = "captcha";

    canv.width = 100;

    canv.height = 45;

    var ctx = canv.getContext("2d");

    ctx.font = "20px Georgia";

    ctx.strokeText(captcha.join(""), 0, 30);

    //storing captcha so that can validate you can save it somewhere else according to your specific requirements

    code = captcha.join("");

    document.getElementById("captcha").appendChild(canv); // adds the canvas to the body element

  }
</script>