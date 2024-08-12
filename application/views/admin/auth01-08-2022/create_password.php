<style>
    * {
        box-sizing: border-box;
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
      <div class="login-logo"> <img src="<?= base_url(); ?>assets/dist/img/ukpsc_logo.png" /> </div>
      <div class="card-body login-card-body">
        <div class="row">
          <div class="column" style="background-color: #72dfa8; border-radius: 1.25rem; margin:0 auto;">
            <p class="login-box-msg"><?= trans('create_password') ?>(पासवर्ड बनाएं)</p>
            <hr class="style1">
            <?php $this->load->view('admin/includes/_messages.php') ?>
			<?php echo form_open(current_url(), 'class="login-form"  id="xin-form" '); ?>
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
               <label>Password (पासवर्ड)</label>
            <input type="password" name="password" id="password" class="form-control" placeholder="" >
            </div>
            <div class="form-group col-10 atz">
              <label>Confirm Password (पासवर्ड की पुष्टि कीजिये)</label>
            <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="" > </div>

            
            
            <div class="col-6" style="margin: auto;">
                  <label>&nbsp;</label>
                  <input type="submit" name="submit" id="submit" class="btn btn-primary btn-block btn-flat" value="<?= trans('create') ?> (पासवर्ड बनाएं)"></div>
        
            
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
          
            <?php echo form_close(); ?> </div>
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
        // alert('hi');
        // createCaptcha();
        $("#xin-form")["submit"](function() {

            var password = $("#password").val();
            if ($("#password").val() == "") {
                alert("Please fill 'Password' field");
                $("#password").focus();
                return false;
            }
            if ($("#password").val().length < 8) {
                alert(" 'Password' must contain 8 charactor");
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

            if( password != password_confirm ){

                alert('Confirm Password Does Not Match!');
                $("#confirm_password").focus();
                return false;

            }
            // if ($("#cpatchaTextBox").val() != code) {
            //     alert("Invalid Captcha. try Again");
            //     createCaptcha();
            //     document.getElementById("cpatchaTextBox").value = "";
            //     $("#cpatchaTextBox").focus();
            //     return false;
            // }

            ///Validation For CheckBox

            
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
