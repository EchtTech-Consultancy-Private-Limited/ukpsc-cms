<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="card card-default color-palette-bo">
        <div class="card-header">
          <div class="d-inline-block">
              <h3 class="card-title"> <i class="fa fa-pencil"></i>
              &nbsp; <?= trans('change_password') ?> </h3>
          </div>
        </div>
        <div class="card-body">   
           <!-- For Messages -->
            <?php $this->load->view('admin/includes/_messages.php'); ?>
           
            <?php echo form_open(base_url('admin/profile/change_pwd'), 'id="xin-form" class="form-horizontal"'); ?> 

           <script type="text/javascript">
                function submitMe() {
                      var pass = document.getElementById('userPwd').value;
                      var enc = hashCode(pass);
                      document.getElementById('userPwd').value = enc;
                      console.log(enc);   //for debug
                      console.log(document.getElementById('userPwd').value);   // for debug
                    }
                    $('#abc').keyup(function(){
                       var value = $(this).val();
                    $('#1').val(value);
                    })

              </script>

              <div class="form-group">

                <label class="col-sm-3 control-label">New Password<span style="color:red;font-weight:bold">*</span>&nbsp;<span title="* Password minimum length is 8.
* Password maximum length is 15.
* Password must include at least 1-number,
1-small letter character,1-capital letter character,
and 1-special character
                    "style="font-weight:normal;font-size: 10px;cursor:pointer;">(Password Policy)</span></label>


              

                <div class="col-md-4">
                  <input type="password" required name="password" class="form-control" minlength="8" id="txtPassword" placeholder="Enter Your New Password">
                  </div>
                  <div id="strengthMessage"></div>  
              </div>

              <div class="form-group">
                <label for="confirm_pwd" class="col-sm-3 control-label"><?= trans('confirm_password') ?></label>

                <div class="col-md-4">
                  <input type="text" required name="confirm_pwd" class="form-control" id="txtConfirmPassword" placeholder="Confirm Password">
                </div>
              </div>

              <div class="row">
                <div class="form-group" >
                    <div class="col-md-3">
                        <!-- <input type="submit" name="submit" value="Update Admin" class="btn btn-primary pull-right"> -->
                        <input type="button" onclick="window.history.go(-1)" class="btn btn-primary " value="Back"></input>
                    </div>
                </div>
                <div class="col-md-2">      
                  <input type="submit" name="submit" id="submit" class="btn btn-primary btn-block btn-flat" value="<?= trans('change_password') ?>">
                </div>
              </div>
            <?php echo form_close(); ?>
        </div>

          <!-- /.box-body -->
      </div>
    </section> 
</div>
<script type="text/javascript">
//password matching -
$(document).ready(function () {  
    $('#txtPassword').keyup(function () {  
        $('#strengthMessage').html(checkStrength($('#txtPassword').val()))  
    })  

    function checkStrength(password) {  
        var strength = 0  
        if (password.length < 6) {  
            $('#strengthMessage').removeClass()  
            $('#strengthMessage').addClass('Short')  
            return 'Too short'  
        }  
        if (password.length > 7) strength += 1  
        // If password contains both lower and uppercase characters, increase strength value.  
        if (password.match(/([a-z].*[A-Z])|([A-Z].*[a-z])/)) strength += 1  
        // If it has numbers and characters, increase strength value.  
        if (password.match(/([a-zA-Z])/) && password.match(/([0-9])/)) strength += 1  
        // If it has one special character, increase strength value.  
        if (password.match(/([!,%,&,@,#,$,^,*,?,_,~])/)) strength += 1  
        // If it has two special characters, increase strength value.  
        if (password.match(/(.*[!,%,&,@,#,$,^,*,?,_,~].*[!,%,&,@,#,$,^,*,?,_,~])/)) strength += 1  
        // Calculated strength value, we can return messages  
        // If value is less than 2  
        if (strength < 2) {  
            $('#strengthMessage').removeClass()  
            $('#strengthMessage').addClass('Weak')  
            return 'Weak'  
        } else if (strength == 2) {  
            $('#strengthMessage').removeClass()  
            $('#strengthMessage').addClass('Good')  
            return 'Good'  
        } else {  
            $('#strengthMessage').removeClass()  
            $('#strengthMessage').addClass('Strong')  
            return 'Strong'  
        }  
    }  
});


  </script>
  <style type="text/css">
    /*Pass-Strength Colorcode*/
.Short {  
    width: 20%;  
    background-color: #dc3545;  
    margin: 5px 2px 2px 12px;  
    height: 3px;  
    color: #dc3545;  
    font-weight: 500;  
    font-size: 12px;  
}  
.Weak {  
    width: 20%;  
    background-color: #ffc107;  
    margin: 5px 2px 2px 12px;  
    height: 3px;  
    color: #ffc107;  
    font-weight: 500;  
    font-size: 12px;  
}  
.Good {  
    width: 20%;  
    background-color: #28a745;  
    margin: 5px 2px 2px 12px;  
    height: 3px;  
    color: #28a745;  
    font-weight: 500;  
    font-size: 12px;  
}  
.Strong {  
    width: 20%;  
    background-color: green;  
    margin: 5px 2px 2px 12px;  
    height: 3px;  
    color: green;  
    font-weight: 500;  
    font-size: 12px;  
}
</style>
  