<style>
  * {
    box-sizing: border-box;
  }
  .form-background {
    position: relative;
  }
  .login-box {
    width: 35%;
    margin: 0;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translateX(-50%) translateY(-50%);
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

    // alert('hi');

    // createCaptcha();

    $("#xin-form")["submit"](function () {

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



      if (password != password_confirm) {



        alert('Confirm Password Does Not Match!');

        $("#confirm_password").focus();

        return false;



      }


    });

  });



</script>