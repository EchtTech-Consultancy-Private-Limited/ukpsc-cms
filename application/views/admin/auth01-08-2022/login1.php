   <link href="assets/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/style.css">
  <?php echo form_open(base_url('admin/auth/login'), 'id="xin-form"  class="login-form" '); ?>
 <section class="login">
    <div class="container">
      <div class="row ">
	  <div class="col-md-1">
	  </div>
        <div class="col-md-6 login-left border-20-tl ">
            <img src="assets/images/side_bg.png" class="img-fluid" alt="logo" />
        </div>
        <div class="col-md-4 p-0 bg-purple border-20-rb txt-white">
          <div class="login-form">
            <!-- <div class="img-wrapper mb-4">
              <img src="assets/images/ukpcs_logo.png" height="40" alt="">
            </div> -->
            <div class="mb-3 text-center">
			
            <img src="assets/images/ukpcs_logo.png" class="img-fluid" alt="logo" />
           
            </div>
            <?php $this->load->view('admin/includes/_messages.php') ?>
           
            <form class="my-4">
              <div class="mb-3">
                <script type="text/javascript">
                        $(function () {
                            $('input').blur(function () {                     
                                $(this).val(
                                    $.trim($(this).val())
                                );
                            });
                        });
                    </script>
                <label for="email" class="form-label">Institute ID / Email ID (संस्थान आईडी / ईमेल आईडी)</label>
                 <input type="text" name="username" id="name" class="form-control" placeholder="" >
              </div>
              <div class="mb-2">
                <label for="password" class="form-label">Password (पासवर्ड)</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="" > 
              </div>
			   <script type="text/javascript">

                                    function togglePassword(el){
                                    var checked = el.checked;

                                    if(checked){
                                    document.getElementById("password").type = 'text';
                                    document.getElementById("toggleText").textContent= "Hide Password";
                                    }else{
                                    document.getElementById("password").type = 'password';
                                    document.getElementById("toggleText").textContent= "Show Password";
                                    }

                                    }
                                     
                                    </script>
              <div class="mb-3 form-check">
                <input type='checkbox' class="atz" id='toggle' value='0' onchange='togglePassword(this);'>&nbsp;
                              <span class="tmc" id='toggleText'>Show Password</span>
              </div>
              <div class="mb-4 row">
                <div class="col-md-6">
                  <p class="form-check-label">Captcha</p>
                  <div class="d-flex align-items-center">
				          <script type="text/javascript">

                                $("#captcha_refres").on('click',function(){
                                    createCaptcha();
                                    document.getElementById("cpatchaTextBox").value = "";
                                });

                            </script>
                    <i class="fa fa-refresh cursor" id="captcha_refres" aria-hidden="true"></i>  <label style="margin-left: 5px;">Refresh Captcha</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <label for="password" class="form-label">Captcha</label>
                  <input type="text" name="cpatchaTextBox" id="cpatchaTextBox" class="form-control" placeholder="" >
				  
                </div>
              </div>
              <input type="submit" name="submit" id="submit" class="btn btn-primary w-100">Sign In! ( साइन इन करें! )
            </form>
            <div class="bottom">
              <div class="link mb-3">
                <a href="<?= base_url('admin/auth/forgot_password'); ?>">Forgot Password ? (पासवर्ड भूल गए?)</a>
              </div>
              <p class="mb-0 txt-white">
                Don't have a UKPSC ID? (यूकेपीएससी आईडी नहीं है?)
              </p>
              <div class="link">
                <a href="<?= base_url('admin/auth/register'); ?>">Register Here! (यहां रजिस्टर करें!)</a>
              </div>
            </div>
          </div>
        </div>
		<div class="col-md-1">
	  </div>
      </div>
    </div>
  </section>
  <script src="assets/js/bootstrap.bundle.min.js"></script>
   <?php echo form_close(); ?>
   
   <script>
    $(document).ready(function () {
        createCaptcha();

        $("#xin-form")["submit"](function (d) {

            if ($("#name").val() == "") {
                alert("Please fill 'Username' field (कृपया 'उपयोगकर्ता नाम' फ़ील्ड भरें)");
                $("#name").focus();
                return false;
            }
            if ($("#password").val() == "") {
                alert("Please fill 'Password' field (कृपया 'पासवर्ड' फ़ील्ड भरें)");
                $("#password").focus();
                return false;
            }

            if ($("#cpatchaTextBox").val() != code) {
                alert("Invalid Captcha. try Again (अमान्य कैप्चा। पुनः प्रयास करें)");
                createCaptcha();
                document.getElementById("cpatchaTextBox").value = "";
                $("#cpatchaTextBox").focus();
                return false;
            }

            ///Validation For CheckBox

            
        });


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

</script>