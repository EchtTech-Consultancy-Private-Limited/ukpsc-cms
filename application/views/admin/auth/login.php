<?php //echo PHP_VERSION; exit;?>
<style>
    a {
        color: #fff;
        text-decoration: none;
        background-color: transparent;
        -webkit-text-decoration-skip: objects;
    }

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
    .login-container{
        max-width:1140px;
        margin : 36px auto ; 
    }
    .login-img{
        border-radius: 20px 0 0px 20px;
       
    }
    .login-form{
        border-radius: 0 20px 20px 0;
    }
    @media screen and (max-width:750px){
        .login-img{
            border-radius:20px 20px 0 0 ;
        }
        .login-form{
            border-radius: 0 0 20px 20px;
        }
    }
    
</style>

<div class="form-background">
    <div class="login-container">
        <!-- /.login-logo -->
        <div class="">
            <!--<div class="login-logo">
                <img src="<?= base_url(); ?>assets/dist/img/ukpsc_logo.png" />
            </div>-->
            <div class="card-body login-card-body">
                <div class="row" style="border: 1px solid #373250; border-radius: 20px;">

                    <div class="col-lg-7 col-md-6 p-0" style="color:#fff;" >
                    <img style="height: 100%; width: 100%;" class="login-img"
                            src="<?= base_url(); ?>assets/dist/img/side_bg2.jpg" />
                        </div>
                    <div class="col-lg-5 col-md-6 login-form"
                    style="background-color: #373250; color:#fff; padding: 0.98rem 2rem;">

                        <p class="login-box-msg text-bold">User Login (उपयोगकर्ता लॉगिन)</p>
                        <hr class="style1" style="border-color: #fff;">

                        <?php $this->load->view('admin/includes/_messages.php') ?>
                        <?php $this->load->view('admin/includes/_error.php') ?>

                        <?php echo form_open(base_url('admin/auth/login'), 'id="xin-form"  class="login-form" '); ?>
                        <div class="form-group has-feedback col-12 mt-4 mb-4">
                            <!-- <label class="text-white">Enter Username</label> -->
                            <script type="text/javascript">
                                $(function () {
                                    $('input').blur(function () {
                                        $(this).val(
                                            $.trim($(this).val())
                                        );
                                    });
                                });
                            </script>
                            <label class="text-white">Institute ID / Email ID (संस्थान आईडी / ईमेल आईडी)</label>
                            <input type="text" name="username" id="name" class="form-control" placeholder="">
                        </div>
                        <div class="form-group col-12 atz mb-4">
                            <label class="text-white">Password (पासवर्ड)</label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="">

                            <input type='checkbox' class="atz" id='toggle' value='0'
                                onchange='togglePassword(this);'>&nbsp;
                            <span class="tmc" id='toggleText'>Show Password</span>


                        </div>

                        <script type="text/javascript">

                            function togglePassword(el) {
                                var checked = el.checked;

                                if (checked) {
                                    document.getElementById("password").type = 'text';
                                    document.getElementById("toggleText").textContent = "Hide Password";
                                } else {
                                    document.getElementById("password").type = 'password';
                                    document.getElementById("toggleText").textContent = "Show Password";
                                }

                            }

                        </script>

                        <div class="form-group has-feedback col-12">

                            <div class="row">
                                <div class="col-12 mb-2">
                                    <div class="row align-items-center mb-3">
                                        <div class="col-md-5">
                                            <div style="color:#fff; background: #eee; border-radius: 5px;" class="px-1 mb-md-0 mb-3" name="captcha" id="captcha" placeholder="<?= trans('password') ?>"></div>
                                        </div>
                                        <div class="col-md-7">
                                            <div class="ml-md-1 ml-0"> 
                                                <i class="fa fa-refresh cursor" id="captcha_refres" aria-hidden="true"></i>
                                                <label class="text-white" class="mb-0" style="margin-left: 5px;">Refresh Captcha</label> 
                                            </div>
                                        </div>
                                    </div>
                                    

                                    
                                    <script type="text/javascript">

                                        $("#captcha_refres").on('click', function () {
                                            createCaptcha();
                                            document.getElementById("cpatchaTextBox").value = "";
                                        });

                                    </script>
                                </div>
                                <div class="col-12 mb-4">
                                    <div class="row align-items-center">
                                        <div class="col-3">
                                            <label class="text-white" class="mb-0">Captcha</label>
                                        </div>
                                        <div class="col-9">
                                            <input type="text" name="cpatchaTextBox" id="cpatchaTextBox" class="form-control" placeholder="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row mb-5">
                                <div class="col-12" style="margin: auto;">
                                    <input type="submit" name="submit" id="submit" class="btn btn-signin btn-block btn-flat" value="<?= trans('signin') ?> साइन इन करें">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="mb-1 text-white" style="font-size: 16px;">
                                        <a href="<?= base_url('admin/auth/forgot_password'); ?>">
                                            <?= trans('i_forgot_my_password') ?> ? (पासवर्ड भूल गए?)
                                        </a>
                                    </p>
                                    <p class="mb-0" style="font-size: 12px;margin:12px 0 0 0;">
                                        <label class="text-white" class="mb-0" style="font-size: 13px;">
                                            <span class="mb-4" style="color: #c7c7c7;">Don't have a UKPSC ID? (यूकेपीएससी आईडी नहीं है?)</span>
                                            <a
                                                href="<?= base_url('admin/auth/register'); ?>" class="text-center"
                                                style="font-size: 19px; font-weight: 700; text-decoration: underline; color: #e14658;">Register Here! (यहां रजिस्टर करें!)
                                            </a>
                                        </label>

                                    </p>
                                </div>
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
                alert("Please fill 'Username' field\n(कृपया 'संस्थान आईडी/ईमेल आईडी' फ़ील्ड भरें)");
                $("#name").focus();
                return false;
            }
            if ($("#password").val() == "") {
                alert("Please fill 'Password' field\n(कृपया 'पासवर्ड' फ़ील्ड भरें)");
                $("#password").focus();
                return false;
            }

            if ($("#cpatchaTextBox").val() == "") {
                alert("Please fill 'Captcha' field\n(कृपया 'कैप्चा' फ़ील्ड भरें)");
                createCaptcha();
                document.getElementById("cpatchaTextBox").value = "";
                $("#cpatchaTextBox").focus();
                return false;
            } else if ($("#cpatchaTextBox").val() != code) {
                alert("Invalid 'Captcha' try Again (अमान्य 'कैप्चा।' पुनः प्रयास करें)");
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
        canv.width = 150;
        canv.height = 35;
        canv.foreColor = 0xffffff;
        var ctx = canv.getContext("2d");
        ctx.font = "25px Times New Roman";
        ctx.strokeText(captcha.join(""), 0, 30);
        //storing captcha so that can validate you can save it somewhere else according to your specific requirements
        code = captcha.join("");
        document.getElementById("captcha").appendChild(canv); // adds the canvas to the body element
    }
</script>