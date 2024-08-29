<style>
    * {
        box-sizing: border-box;
    }

    .column {
        float: left;
        /*width: 80%;*/
        padding: 10px;
		margin: 0 auto;
    }

    .row::after {
        content: "";
        clear: both;
        display: table;
    }
    
   
     .login-edit{
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
    .tmc{
    margin: 6px 0px 0px 2px;
    /*border: 1px solid;*/
    position: absolute;
    }
    .hhm{
    margin: -1px 2px 20px 3px;
    position: absolute;
    }
    .cursor{
        cursor: pointer;
    }
</style>

<div class="form-background">
    <div class="login-box">
       
        <!-- /.login-logo -->
        <div class="card">
             <div class="login-logo">
           <img src="<?= base_url(); ?>assets/dist/img/ukpsc_logo.png" width="150" />
    
        </div>
            <div class="card-body login-card-body">   


                <div class="row">

                   
                    <div class="column" style="background-color: #72dfa8; border-radius: 1.25rem;">

                        <p class="login-box-msg">User Login (उपयोगकर्ता लॉगिन)</p>
                        <hr class="style1">
                        <?php $this->load->view('admin/includes/_messages.php') ?>

                        <?php echo form_open(base_url('admin/auth/login'), 'id="xin-form"  class="login-form" '); ?>
                        <div class="form-group has-feedback col-10">
                        <!-- <label>Enter Username</label> -->
                         <script type="text/javascript">
                        $(function () {
                            $('input').blur(function () {                     
                                $(this).val(
                                    $.trim($(this).val())
                                );
                            });
                        });
                    </script>
                            <label>Institute ID / Email ID (संस्थान आईडी / ईमेल आईडी)</label>
                            <input type="text" name="username" id="name" class="form-control" placeholder="" >
                        </div>
                        <div class="form-group col-10 atz">
                            <label>Password (पासवर्ड)</label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="" > 

                              <input type='checkbox' class="atz" id='toggle' value='0' onchange='togglePassword(this);'>&nbsp;
                              <span class="tmc" id='toggleText'>Show Password</span>
                              
							    
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

                        <div class="form-group has-feedback col-10">
						

                            <div style="color:#fff;" name="captcha"  id="captcha"  placeholder="<?= trans('password') ?>" ></div>

                            <div style="margin-top: -40px;float: right;margin-right: 46px;"> <i class="fa fa-refresh cursor" id="captcha_refres" aria-hidden="true"></i>  <label style="margin-left: 5px;">Refresh Captcha</label> </div>
                            <script type="text/javascript">

                                $("#captcha_refres").on('click',function(){
                                    createCaptcha();
                                    document.getElementById("cpatchaTextBox").value = "";
                                });

                            </script>
                          
							
                        </div>
						  <div class="row">
                                <div class="col-md-6">
								<label>Captcha</label>
								<input type="text" name="cpatchaTextBox" id="cpatchaTextBox" class="form-control" placeholder="" >
							</div>
							<div class="col-6" style="margin: auto;">
							<label>&nbsp;</label>
                                <input type="submit" name="submit" id="submit" class="btn btn-primary btn-block btn-flat" value="<?= trans('signin') ?> साइन इन करें"</div>
							</div>
						
                        <div class="row">
                            <div class="col-12">
                                <div class="checkbox icheck ">
								
								
                                    <label>
                                      <!--   <input  type="checkbox"> -->
                                    </label>
                                    <!-- <span class="hhm"> // trans('remember_me') ?></span> -->
                                </div>
                            </div>
                            <!-- /.col -->
                          
                            <!-- /.col -->
                        </div>
                        <div class="row">
                                <div class="col-md-12">
								<p class="mb-1"  style="font-size: 14px;">
                            <a  href="<?= base_url('admin/auth/forgot_password'); ?>"><?= trans('i_forgot_my_password') ?> ?  (पासवर्ड भूल गए?)</a>
                        </p>
                        <p class="mb-0"  style="font-size: 12px;margin:10px 0 0 0;">
                            <label style="font-size: 12px; font-weight:bold">
                                        Don't have a UKPSC ID? (यूकेपीएससी आईडी नहीं है?)<br><a href="<?= base_url('admin/auth/register'); ?>" class="text-center" style="font-size: 14px;">Register Here! (यहां रजिस्टर करें!)</a>
                                    </label>
                            
                        </p></div>
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
                "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ@!#$%^&*";
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

