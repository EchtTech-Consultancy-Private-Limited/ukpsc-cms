<style>
   * {
   box-sizing: border-box;
   }
   .form-background {
   position: relative;
   height: auto;
   }
   /* .login-box {
   width: 60%;
   margin: 20px auto!important;
   position: relative!important;
   top: auto!important;
   left: auto!important;
   transform: none!important;
   } */
   .login-box {
      width: 78.8%;
      margin: 20px 18px 20px 303px !important;
      position: relative !important;
      top: auto !important;
      left: auto !important;
      transform: none !important;
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
   .form-container {
    display: flex;
    justify-content: center;
    width: 100%;
}
.first-child {
    width: 37%;
}
.second-child {
    width: max-content;
}
.input-field-container{
   float: left;
    width: 90%;
    padding: 10px;
    margin: 0 auto;
    flex: none;
    max-width: 95%;
}

.form-group.col-12.atz.otp-cont {
    display: flex;
    align-items: end;
    justify-content: space-between;
}
.otp-section {
    width: 75%;
}
.otp-button button {
    padding: 10px 12px;
    width: max-content;
    font-size: 13px;
    border-radius: 6px;
    cursor:pointer;
}
.otp-button button:hover{
   background-color: #d8d8d8;
}
input#submit {
    height: 35px;
}
.login-logo{
   margin-bottom:12px !important;
}
.confirm-pass-block{
   margin-top:24px !important;
}
.login-logo img {
    height: 120px;
}
.enter-otp-box {
    margin: 0 6px;
}
#overlay{ 
  position: fixed;
  top: 0;
  z-index: 100;
  width: 100%;
  height:100%;
  display: none;
  background: rgba(0,0,0,0.6);
}
.cv-spinner {
  height: 100%;
  display: flex;
  justify-content: center;
  align-items: center;  
}
.spinner {
  width: 40px;
  height: 40px;
  border: 4px #ddd solid;
  border-top: 4px #2e93e6 solid;
  border-radius: 50%;
  animation: sp-anime 0.8s infinite linear;
}
@keyframes sp-anime {
  100% { 
    transform: rotate(360deg); 
  }
}
.is-hide{
  display:none;
}
#toast-container h3 {
   font-size: 16px;
   height: 12px;
}
</style>
<div class="form-background">
   <div class="login-box">
      <!-- /.login-logo -->
      <div class="card" style="background: #373250; color:#fff;">
         <div class="card-body login-card-body">
            <div id="overlay">
               <div class="cv-spinner">
                  <span class="spinner"></span>
               </div>
            </div>
            <div class="login-logo mb-4">
               <img src="<?= base_url(); ?>assets/dist/img/ukpsc_logo.png" height="150" /> 
            </div>
            <div class="row">
               <div class="column input-field-container col-10">
                  <p class="login-box-msg text-bold">
                     Update user Info
                  </p>
                  <hr class="style1" style="border-color:#fff;">
                  <script type="text/javascript" rel="stylesheet"> 
                     $('document').ready(function(){
                        $(".alert").fadeIn(1000).fadeOut(5000);
                     });
                  </script> 
                  <?php $this->load->view('admin/includes/_messages.php') ?>
                  <?php if($this->session->flashdata ('error')) { ?>
                  <div id="Error_Message" class="alert" style="text-align: center; color:red;">
                        <?php $errormeassage = $this->session->flashdata('error'); echo $errormeassage; ?>
                  </div>
                  <?php  } ?>
                  <?php echo form_open(current_url(), 'class="login-form"  id="xin-form" '); ?>
                  <div class="form-container">
                  <div class="first-child">
                     <div class="form-group col-12 atz">
                        <label class="text-white">Email ID(ईमेल आईडी)</label>
                        <input type="text" name="email" id="email" value="<?php echo $this->session->userdata("email") ?>" class="form-control" maxlength="60" placeholder="">
                     </div>
                     <div class="form-group col-12 atz">
                        <label class="text-white">Mobile No. (मोबाइल नंबर)</label>
                        <input type="text" name="pri_mobile"
                        oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                        id="pri_mobile" value="<?php echo $this->session->userdata("mobile_no") ?>" class="form-control" maxlength="10" placeholder="">
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
                     <label class="text-white">New Password (पासवर्ड)</label>
                     <input type="password" name="password" id="password" class="form-control" placeholder="">
                  </div>
                     
                  </div>
                  <div class="second-child">
                  <div class="form-group col-12 atz otp-cont">
                        <!-- <div class="otp-section">
                           <label class="text-white">Confirm Email ID(ईमेल आईडी)</label>
                           <input type="text" name="email_confirm" id="email_confirm" value="<?php echo $this->session->userdata("email") ?>" class="form-control" maxlength="60" placeholder="">
                        </div> -->
                        <div class="otp-button">
                           <button type="button" onclick="sendmailOTP('mail')">Sent OTP</button>
                        </div>
                        <div class="enter-otp-box">
                           <label class="text-white">Enter OTP</label>
                           <input type="text" name="mail_otp" id="mail_otp">
                        </div>
                        <div class="otp-button">
                           <button type="button" onclick="mailUpdate()" class="btn-signin">Update</button>
                        </div>
                     </div>
                     <div class="form-group col-12 atz otp-cont">
                        <!-- <div class="otp-section">
                           <label class="text-white">Confirm Mobile No. (मोबाइल नंबर)</label>
                           <input type="text" name="pri_mobile_confirm"
                            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                           id="pri_mobile_confirm" value="<//?php echo $this->session->userdata("mobile_no") ?>" class="form-control" maxlength="10" placeholder="">
                        </div> -->
                        <div class="otp-button">
                           <button type="button" onclick="sendmailOTP('mobile')">Sent OTP</button>
                        </div>
                        <div class="enter-otp-box">
                           <label class="text-white">Enter OTP</label>
                           <input type="text" name="mobile_otp" id="mobile_otp">
                        </div>
                        <div class="otp-button">
                           <button type="button" onclick="mobileUpdate()" class="btn-signin">Update</button>
                        </div>
                     </div>
                     <div class="form-group col-12 atz confirm-pass-block otp-cont">
                        <div class="w-100">
                           <label class="text-white">Confirm New Password (पासवर्ड की पुष्टि कीजिये)</label>
                           <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="">
                        </div>
                        <div class="otp-button ml-2">
                           <button type="button" onclick="passwordUpdate()" class="btn-signin">Update</button>
                        </div>
                  </div>
                  </div>
                     </div>
                 
                  <!-- <div class="col-2" style="margin: auto;">
                     <label class="text-white">&nbsp;</label>
                     <input type="submit" name="submit" id="submit" class="btn btn-signin btn-block btn-flat"
                        value="<//?= trans('create') ?> (पासवर्ड बनाएं)">
                  </div> -->
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
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
   
   
    // $("#xin-form")["submit"](function () {
   
      //  var password = $("#password").val();
   
      //  if ($("#password").val() == "") {
   
      //    alert("Please fill 'Password' field");
   
      //    $("#password").focus();
   
      //    return false;
   
      //  }
   
      //  if ($("#password").val().length < 8) {
   
      //    alert(" 'Password' must contain 8 character");
   
      //    $("#password").focus();
   
      //    return false;
   
      //  }
   
      //  var password_confirm = $("#confirm_password").val();
   
      //  // alert(password_confirm)
   
      //  if ($("#confirm_password").val() == "") {
   
      //    alert("Please fill 'Confirm Password' field");
   
      //    $("#confirm_password").focus();
   
      //    return false;
   
      //  }
   
   
   
      //  if (password != password_confirm) {
   
   
   
      //    alert('Confirm Password Does Not Match!');
   
      //    $("#confirm_password").focus();
   
      //    return false;
   
   
   
      // }
       // OTP Fill Mail
      //  var mail_otp = $("#mail_otp").val();
      //    if ($("#mail_otp").val() == "") {
      //       alert("Please fill 'Mail OTP' field");
      //       $("#mail_otp").focus();
      //       return false;
      //       }
      //       if ($("#mail_otp").val().length < 6) {
      //       alert(" 'Mail OTP' must integer 6 number");
      //       $("#mail_otp").focus();
      //       return false;
      //    }
      // OTP Fill Mobile
   //    var mobile_otp = $("#mobile_otp").val();
   //       if ($("#mobile_otp").val() == "") {
   //          alert("Please fill 'Mobile OTP' field");
   //          $("#mobile_otp").focus();
   //          return false;
   //          }
   //          if ($("#mobile_otp").val().length < 6) {
   //          alert(" 'Mobile OTP' must integer 6 number");
   //          $("#mobile_otp").focus();
   //          return false;
   //       }
   //   var fmobileno = $('#pri_mobile').val();
   //   if (fmobileno == "") {
   
   //       alert("Please enter 'Mobile No.'\nकृपया 'मोबाइल नंबर' दर्ज करें।");
   //       $('#pri_mobile').focus();
   //       return false;
   //   } else if (fmobileno.length != 10) {
   
   //       alert(
   //           "Please enter 'Mobile Number' with 10 digit number\nकृपया 10 अंकों की संख्या के साथ 'मोबाइल नंबर' दर्ज करें");
   //       $('#pri_mobile').focus();
   //       return false;
   //   }
   
   //   var cno = $('#pri_mobile_confirm').val();
   //   if (cno == "") {
   
   //       alert("Please enter 'Confirm Mobile No'\nकृपया 'मोबाइल नंबर' दर्ज करें।");
   //       $('#pri_mobile_confirm').focus();
   //       return false;
   //   } else if (cno != fmobileno) {
   
   //       // alert('Mobile No. (मोबाइल नंबर)  Does Not Match to Confirm Mobile No. (मोबाइल नंबर)');
   //       alert(
   //           "'Mobile no' and 'Confirm Mobile No' does not match.\n'मोबाइल नंबर' और 'कन्फर्म मोबाइल नंबर' मेल नहीं खाता।");
   //       $('#pri_mobile_confirm').focus();
   //       return false;
   //   }
   
   //   var femail = $("#email").val();
   //   if (femail == "") {
   
   //       alert("Please enter 'Email Address'\nकृपया 'ईमेल पता' दर्ज करें");
   //       $("#email").focus();
   //       return false;
   //   }
   //   var mailformat =
   //       /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
   //   if (!femail.match(mailformat)) {
   //       alert("You have entered an invalid email ID!\nआपने एक अमान्य ईमेल आईडी दर्ज की है!");
   //       $("#email").focus();
   //       return false;
   //   }
   //   var emailconfirm = $("#email_confirm").val();
   //   if (emailconfirm == "") {
   
   //       alert("Please enter 'Confirm Email id'\nकृपया 'कन्फर्म ईमेल आईडी' दर्ज करें");
   //       $("#email_confirm").focus();
   //       return false;
   //   } else if (femail != emailconfirm) {
   
   //       // alert('Confirm Email ID(ईमेल आईडी)  Does Not Match to  Email ID(ईमेल आईडी की पुष्टि करें, ईमेल आईडी से मेल नहीं खाता)');
   //       alert(
   //           "'Email id' and 'Confirm Email id' does not match.\n'ईमेल आईडी' और 'कन्फर्म ईमेल आईडी' मेल नहीं खाता।");
   //       $('#email_confirm').focus();
   //       return false;
   //   } else if (!emailconfirm.match(mailformat)) {
   //       alert(
   //       "You have entered an invalid 'Confirm email ID'!\nआपने एक अमान्य 'कन्फर्म ईमेल आईडी' दर्ज की है!");
   //       $("#email_confirm").focus();
   //       return false;
   //   }
   
   
    // });
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
   
   function mailUpdate(e){
      var femail = $("#email").val();
      var mail_otp = $("#mail_otp").val();
      var otplength =mail_otp.length;
      var mailformat =/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
      if (femail == "") {
         toastr.error('Please enter Email Address, कृपया ईमेल पता दर्ज करें.');
      }else if(!femail.match(mailformat)){
         toastr.error('You have entered an invalid email ID!');
      }
      else if(mail_otp == ""){
         toastr.error('Please enter OTP!');
      }
      else if(otplength < 6 || otplength > 6){
         toastr.error('Mail OTP must integer 6 number!');
      }
      else{
        $("#overlay").fadeIn(300);　
         $.ajax({
            url: "<?php echo base_url('mail-update'); ?>",
            type: "POST",
            data: {
               mail: femail,mail_otp:mail_otp
            },
            success: function(response) {
               if(response.status == 'success'){
                  toastr.success(response.message);
                  setTimeout(function(){
                     $("#overlay").fadeOut(300);
                  },500);
                  setInterval(() => {
                        location.reload();
                  },500);
               }else{
                  toastr.error(response.message);
                  setTimeout(function(){
                     $("#overlay").fadeOut(300);
                  },500);
                  setInterval(() => {
                        location.reload();
                  },500);
               }
              // $('#response-message').text(response).css('color', true ? 'green' : 'red');
            },
            error: function(response) {
               setTimeout(function(){
                  $("#overlay").fadeOut(300);
               },500);
               toastr.error('An error occurred. Please try again.');
               //$('#response-message').text('An error occurred. Please try again.').css('color', 'red');
            }
           
         });
      }
     }
     function mobileUpdate(e){
      var fmobileno = $("#pri_mobile").val();
      var mobile_otp = $("#mobile_otp").val();
      var otplength =mobile_otp.length;
      if (fmobileno == "") {
         toastr.error('Please enter Mobile No.कृपया मोबाइल नंबर दर्ज करें।');
      }else if(fmobileno.length != 10){
         toastr.error('Please enter Mobile Number with 10 digit number');
      }
      else if(mobile_otp == ""){
         toastr.error('Please enter OTP!');
      }
      else if(otplength < 6 || otplength > 6){
         toastr.error('Mail OTP must integer 6 number!');
      }
      else{
        $("#overlay").fadeIn(300);　
         $.ajax({
            url: "<?php echo base_url('mobile-update'); ?>",
            type: "POST",
            data: {
               data: fmobileno,mobile_otp:mobile_otp
            },
            success: function(response) {
               if(response.status == 'success'){
                  toastr.success(response.message);
                  setTimeout(function(){
                     $("#overlay").fadeOut(300);
                  },500);
                  setInterval(() => {
                        location.reload();
                  },500);
               }else{
                  toastr.error(response.message);
                  setTimeout(function(){
                     $("#overlay").fadeOut(300);
                  },500);
                  setInterval(() => {
                        location.reload();
                  },500);
               }
              // $('#response-message').text(response).css('color', true ? 'green' : 'red');
            },
            error: function(response) {
               setTimeout(function(){
                  $("#overlay").fadeOut(300);
               },500);
               toastr.error('An error occurred. Please try again.');
               //$('#response-message').text('An error occurred. Please try again.').css('color', 'red');
            }
           
         });
      }
     }
     function passwordUpdate(e){
      var password = $("#password").val();
      var password_confirm = $("#confirm_password").val();
      var otplength =mail_otp.length;
      if (password == "") {
         toastr.error('Please fill Password field');
      }else if ($("#password").val().length < 8) {
         toastr.error(" 'Password' must contain 8 character");
      }else if ($("#confirm_password").val() == "") {
         toastr.error("Please fill 'Confirm Password' field");
      }else if (password != password_confirm) {
         toastr.error('Confirm Password Does Not Match!');
      }
      else{
        $("#overlay").fadeIn(300);　
         $.ajax({
            url: "<?php echo base_url('password-update'); ?>",
            type: "POST",
            data: {
               data: password,
            },
            success: function(response) {
               if(response.status == 'success'){
                  toastr.success(response.message);
                  setTimeout(function(){
                     $("#overlay").fadeOut(300);
                  },500);
                  setInterval(() => {
                        location.reload();
                  },500);
               }else{
                  toastr.error(response.message);
                  setTimeout(function(){
                     $("#overlay").fadeOut(300);
                  },500);
                  setInterval(() => {
                        location.reload();
                  },500);
               }
              // $('#response-message').text(response).css('color', true ? 'green' : 'red');
            },
            error: function(response) {
               setTimeout(function(){
                  $("#overlay").fadeOut(300);
               },500);
               toastr.error('An error occurred. Please try again.');
               //$('#response-message').text('An error occurred. Please try again.').css('color', 'red');
            }
           
         });
      }
     }
   function sendmailOTP(e){
        if(e == 'mail'){
         var value = $('#email').val();
        }else{
         var value = $('#pri_mobile').val();
        }
        $("#overlay").fadeIn(300);　
         $.ajax({
            url: "<?php echo base_url('send-otp'); ?>",
            type: "POST",
            data: {
               otptype: e,
               data: value,
            },
            success: function(response) {
               toastr.success(response);
               setTimeout(function(){
                  $("#overlay").fadeOut(300);
                  },500);
              // $('#response-message').text(response).css('color', true ? 'green' : 'red');
            },
            error: function(response) {
               setTimeout(function(){
                  $("#overlay").fadeOut(300);
               },500);
               toastr.error('An error occurred. Please try again.');
               //$('#response-message').text('An error occurred. Please try again.').css('color', 'red');
            }
           
         });
     }
</script>