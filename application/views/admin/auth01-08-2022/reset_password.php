<style type="text/css">
  .login-box {
    width: 28%;
    margin: 1% auto;
}
</style>

<div class="form-background"> 

  <div class="login-box">


    <!-- /.login-logo -->

    <div class="card">
      <div class="login-logo">
        <img src="<?= base_url(); ?>assets/dist/img/ukpsc_logo.jpg" />
    </div>
      <div class="card-body login-card-body col-8" style="margin: auto;">

       

         <p class="mb-4 " style="
                   margin: auto;
                   /*background: #007bff;*/
                   color: black;font-size:16px;text-align: center;border-radius: 5px;padding: 5px;"><u><?= trans('reset_password') ?></u></p>

        <?php $this->load->view('admin/includes/_messages.php') ?>

        

         <?php echo form_open(base_url('admin/auth/reset_password/'.$reset_code), 'class="login-form" '); ?>

        
          <div class="form-group has-feedback">

            <input type="password" name="password" id="password" class="form-control" placeholder="<?= trans('password') ?>" >

     
          </div>

       
          <div class="form-group has-feedback ">

            <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="<?= trans('confirm') ?>" >

    
          </div>

          <div class="row">

            <!-- /.col -->

            <div class="col-4" style="margin: auto;">

              <input type="submit" name="submit" id="submit" class="btn btn-primary btn-block btn-flat" value="<?= trans('reset') ?>">

            </div>

            <!-- /.col -->

          </div>

        <?php echo form_close(); ?>



        <p style="text-align: center;" class="mt-3"><a href="<?= base_url('admin/auth/login'); ?>"><?= trans('you_remember_password') ?> </a></p>



      </div>

      <!-- /.login-card-body -->

    </div>

  </div>

  <!-- /.login-box -->

</div>

