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
            <hr class="style1" style="border-color:#fff;">
            <h6 style=" color: white; text-align: center"> Token has been Expired </h6>

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
