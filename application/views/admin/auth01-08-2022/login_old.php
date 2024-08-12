<div class="form-background">
  <div class="login-box">
    <div class="login-logo">
        <img src="<?= base_url(); ?>assets/dist/img/cerrs-logo.png" />
<!--      <h2><a href="<?= base_url('admin'); ?>"><?= $this->general_settings['application_name']; ?></a></h2>-->
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg"><?= trans('signin_to_start_your_session') ?></p>

        <?php $this->load->view('admin/includes/_messages.php') ?>
        
        <?php echo form_open(base_url('admin/auth/login'), 'id="xin-form"  class="login-form" '); ?>
          <div class="form-group has-feedback">
            <input type="text" name="username" id="name" class="form-control" placeholder="<?= trans('username') ?>" >
          </div>
          <div class="form-group has-feedback">
            <input type="password" name="password" id="password" class="form-control" placeholder="<?= trans('password') ?>" >
          </div>
        
            <div class="form-group has-feedback">
            <div  name="captcha" id="captcha"  placeholder="<?= trans('password') ?>" ></div><input type="text" name="cpatchaTextBox" id="cpatchaTextBox" class="form-control" placeholder="Enter capcha" >
        </div>
          <div class="row">
            <div class="col-8">
              <div class="checkbox icheck">
                <label>
                  <input type="checkbox"> <?= trans('remember_me') ?>
                </label>
              </div>
            </div>
            <!-- /.col -->
            <div class="col-4">
              <input type="submit" name="submit" id="submit" class="btn btn-primary btn-block btn-flat" value="<?= trans('signin') ?>">
            </div>
            <!-- /.col -->
          </div>
        <?php echo form_close(); ?>

        <p class="mb-1">
          <a href="<?= base_url('admin/auth/forgot_password'); ?>"><?= trans('i_forgot_my_password') ?></a>
        </p>
        <p class="mb-0">
          <a href="<?= base_url('admin/auth/register'); ?>" class="text-center"><?= trans('register_new_membership') ?></a>
        </p>
      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
  <!-- /.login-box -->
</div>
<script>
    $( document ).ready(function() {
    createCaptcha() ;
    
    $("#xin-form")["submit"](function(d) {
    
        if ($("#name").val() == "") {
		alert("Please fill 'Username' field");
		$("#name").focus();
		return false;
	}
        if ($("#password").val() == "") {
		alert("Please fill 'Password' field");
		$("#password").focus();
		return false;
	}
    
        if ($("#cpatchaTextBox").val() != code) {
        alert("Invalid Captcha. try Again");
        createCaptcha();
   	$("#cpatchaTextBox").focus();
		return false;
        }
  
	 ///Validation For CheckBox

	if (!this.myform.declare.checked) {
		alert('You must agree to the terms first.');
		return false;
	}
    });





});

//createCaptcha function code//
var code;
function createCaptcha() {
  //clear the contents of captcha div first 
  document.getElementById('captcha').innerHTML = "";
  var charsArray =
  "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ@!#$%^&*";
  var lengthOtp = 6;
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
  canv.height = 50;
  var ctx = canv.getContext("2d");
  ctx.font = "25px Georgia";
  ctx.strokeText(captcha.join(""), 0, 30);
  //storing captcha so that can validate you can save it somewhere else according to your specific requirements
  code = captcha.join("");
  document.getElementById("captcha").appendChild(canv); // adds the canvas to the body element
}

</script>
          