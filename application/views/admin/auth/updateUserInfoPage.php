<style>
  * {
    box-sizing: border-box;
  }
  .form-background {
    position: relative;
    height: auto;
  }
  .login-box {
    width: 35%;
    margin: 20px auto!important;
    position: relative!important;
    top: auto!important;
    left: auto!important;
    transform: none!important;
  }
  .column {
    float: left;
    width: 80%;
    padding: 10px;
    margin: 0 auto;
  }
  .row::after {
    content: "";
    clear: both;
    display: table;
  }
  .login-edit {
    text-align: inherit;
    font-size: 14px;
  }
  .form-group {
    margin: 0 auto 1rem auto;
  }
  .remeber-edit {
    display: flex;
    justify-content: center;
  }
  .forget-edit {
    text-align: center;
  }
  .atz {
    margin-top: 7px;
  }
  .tmc {
    margin: 6px 0px 0px 2px;
    /*border: 1px solid;*/
    position: absolute;
  }
  .hhm {
    margin: -1px 2px 20px 3px;
    position: absolute;
  }
  .cursor {
    cursor: pointer;
  }
</style>
<div class="form-background">
  <div class="login-box">
    <!-- /.login-logo -->
    <div class="card" style="background: #373250; color:#fff;">
      <div class="card-body login-card-body">
        <div class="login-logo mb-4">
          <img src="<?= base_url(); ?>assets/dist/img/ukpsc_logo.png" height="150" /> 
        </div>

        <div class="row">

          <div class="column col-10">

            <p class="login-box-msg text-bold">
              Update user Info
            </p>

            <hr class="style1" style="border-color:#fff;">

            <?php $this->load->view('admin/includes/_messages.php') ?>

            <?php echo form_open(current_url(), 'class="login-form"  id="xin-form" '); ?>

           

          
                <div class="form-group col-12 atz">
                    <label class="text-white">Email ID(ईमेल आईडी)</label>
                    <input type="text" name="email" id="email" value="<?php if (old('email') != " ") {
                                echo old('email');
                            } ?>" class="form-control" maxlength="60" placeholder="">
                </div>
                <div class="form-group col-12 atz">
                    <label class="text-white">Confirm Email ID(ईमेल आईडी)</label>
                    <input type="text" name="email_confirm" id="email_confirm" value="<?php if (old('email_confirm') != " ") {
                                echo old('email_confirm');
                            } ?>" class="form-control" maxlength="60" placeholder="">
                </div>
                   <div class="form-group col-12 atz">
                  <label class="text-white">Mobile No. (मोबाइल नंबर)</label>
                    <input type="text" name="pri_mobile"
                        oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                        id="pri_mobile" value="<?php if (old('pri_mobile') != " ") {
                                echo old('pri_mobile');
                            } ?>" class="form-control" maxlength="10" placeholder="">
              </div>
                <div class="form-group col-12 atz">
                  <label class="text-white">Confirm Mobile No. (मोबाइल नंबर)</label>
                    <input type="text" name="pri_mobile_confirm"
                        oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                        id="pri_mobile_confirm" value="<?php if (old('pri_mobile_confirm') != " ") {
                                echo old('pri_mobile_confirm');
                            } ?>" class="form-control" maxlength="10" placeholder="">
                </div>
                 <div class="form-group has-feedback col-12 mt-4">
              <script type="text/javascript">

                $(function () {

                  $('input').blur(function () {

                    $(this).val(

                      $.trim($(this).val())

                    );

                  });

                });

              </script>

              <label class="text-white">Password (पासवर्ड)</label>

              <input type="password" name="password" id="password" class="form-control" placeholder="">

            </div>

            <div class="form-group col-12 atz">

              <label class="text-white">Confirm Password (पासवर्ड की पुष्टि कीजिये)</label>

              <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="">
            </div>







            <div class="col-6" style="margin: auto;">

              <label class="text-white">&nbsp;</label>

              <input type="submit" name="submit" id="submit" class="btn btn-signin btn-block btn-flat"
                value="<?= trans('create') ?> (पासवर्ड बनाएं)">
            </div>





            <div class="row">

              <div class="col-12">

                <div class="checkbox icheck ">

                </div>

              </div>

              <!-- /.col -->

              <!-- /.col -->

            </div>



            <?php echo form_close(); ?>
          </div>

        </div>

      </div>

    </div>
  </div>
</div>

<!-- /.login-box -->

</div>

<script src="jquery-3.6.0.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>

  $(document).ready(function () {

    $('#email_confirm').bind("cut copy paste", function(e) {
        e.preventDefault();
    });
    $('#pri_mobile_confirm').bind("cut copy paste", function(e) {
        e.preventDefault();
    });
    $('#confirm_password').bind("cut copy paste", function(e) {
        e.preventDefault();
    });


    $("#xin-form")["submit"](function () {

      var password = $("#password").val();

      if ($("#password").val() == "") {

        alert("Please fill 'Password' field");

        $("#password").focus();

        return false;

      }

      if ($("#password").val().length < 8) {

        alert(" 'Password' must contain 8 character");

        $("#password").focus();

        return false;

      }

      var password_confirm = $("#confirm_password").val();

      // alert(password_confirm)

      if ($("#confirm_password").val() == "") {

        alert("Please fill 'Confirm Password' field");

        $("#confirm_password").focus();

        return false;

      }



      if (password != password_confirm) {



        alert('Confirm Password Does Not Match!');

        $("#confirm_password").focus();

        return false;



      }

    
    var fmobileno = $('#pri_mobile').val();
    if (fmobileno == "") {

        alert("Please enter 'Mobile No.'\nकृपया 'मोबाइल नंबर' दर्ज करें।");
        $('#pri_mobile').focus();
        return false;
    } else if (fmobileno.length != 10) {

        alert(
            "Please enter 'Mobile Number' with 10 digit number\nकृपया 10 अंकों की संख्या के साथ 'मोबाइल नंबर' दर्ज करें");
        $('#pri_mobile').focus();
        return false;
    }

    var cno = $('#pri_mobile_confirm').val();
    if (cno == "") {

        alert("Please enter 'Confirm Mobile No'\nकृपया 'मोबाइल नंबर' दर्ज करें।");
        $('#pri_mobile_confirm').focus();
        return false;
    } else if (cno != fmobileno) {

        // alert('Mobile No. (मोबाइल नंबर)  Does Not Match to Confirm Mobile No. (मोबाइल नंबर)');
        alert(
            "'Mobile no' and 'Confirm Mobile No' does not match.\n'मोबाइल नंबर' और 'कन्फर्म मोबाइल नंबर' मेल नहीं खाता।");
        $('#pri_mobile_confirm').focus();
        return false;
    }

    var femail = $("#email").val();
    if (femail == "") {

        alert("Please enter 'Email Address'\nकृपया 'ईमेल पता' दर्ज करें");
        $("#email").focus();
        return false;
    }
    var mailformat =
        /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if (!femail.match(mailformat)) {
        alert("You have entered an invalid email ID!\nआपने एक अमान्य ईमेल आईडी दर्ज की है!");
        $("#email").focus();
        return false;
    }
    var emailconfirm = $("#email_confirm").val();
    if (emailconfirm == "") {

        alert("Please enter 'Confirm Email id'\nकृपया 'कन्फर्म ईमेल आईडी' दर्ज करें");
        $("#email_confirm").focus();
        return false;
    } else if (femail != emailconfirm) {

        // alert('Confirm Email ID(ईमेल आईडी)  Does Not Match to  Email ID(ईमेल आईडी की पुष्टि करें, ईमेल आईडी से मेल नहीं खाता)');
        alert(
            "'Email id' and 'Confirm Email id' does not match.\n'ईमेल आईडी' और 'कन्फर्म ईमेल आईडी' मेल नहीं खाता।");
        $('#email_confirm').focus();
        return false;
    } else if (!emailconfirm.match(mailformat)) {
        alert(
        "You have entered an invalid 'Confirm email ID'!\nआपने एक अमान्य 'कन्फर्म ईमेल आईडी' दर्ज की है!");
        $("#email_confirm").focus();
        return false;
    }






    });









    //createCaptcha function code//

    var code;

    function createCaptcha() {

      //clear the contents of captcha div first 

      document.getElementById('captcha').innerHTML = "";

      var charsArray =

        "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";

      var lengthOtp = 7;

      var captcha = [];

      for (var i = 0; i < lengthOtp; i++) {

        //below code will not allow Repetition of Characters

        var index = Math.floor(Math.random() * charsArray.length + 1); //get the next character from the array

        if (captcha.indexOf(charsArray[index]) == -1)

          captcha.push(charsArray[index]);

        else

          i--;

      }

      var canv = document.createElement("canvas");

      canv.id = "captcha";

      canv.width = 100;

      canv.height = 50;

      canv.foreColor = 0xffffff;

      var ctx = canv.getContext("2d");

      ctx.font = "20px Times New Roman";

      ctx.strokeText(captcha.join(""), 0, 30);

      //storing captcha so that can validate you can save it somewhere else according to your specific requirements

      code = captcha.join("");

      document.getElementById("captcha").appendChild(canv); // adds the canvas to the body element

    }

  });



</script>