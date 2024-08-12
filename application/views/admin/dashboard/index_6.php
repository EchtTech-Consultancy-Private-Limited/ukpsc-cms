<div class="content-wrapper">

  <div class="content-header">

    <div class="container-fluid">

      <div class="row">

        <div class="col-sm-6">

          <h3 class="mb-0 text-head">
            <?= trans('dashboard') ?>
          </h3>

        </div>

        <div class="col-sm-6">

          <ol class="breadcrumb float-sm-right">

            <li class="breadcrumb-item"><a href="#">
                <?= trans('home') ?>
              </a></li>

            <li class="breadcrumb-item active">
              <?= trans('dashboard') ?>
            </li>

          </ol>

        </div>

      </div>

    </div>

  </div>

  <section class="content">
    <div class="container-fluid">
      <div class="row d-flex justify-content-around">
        <div class="col-10 col-md-4 pb-2">

          <div class="small-box bg-warning">

            <div class="d-flex justify-content-between p-3 align-items-center">
              <div class="inner">
                <h5 class="text-white mb-0 text-bold">Profile</h5>
                <a style="font-size: 12px;margin-bottom: -20px;margin-top: 10px;color: #091583!important;text-decoration: underline;font-weight: 400;" href="<?php echo base_url("admin/auth/update_user_info")?>">
                Change Credentials
               </a>
              </div>
  
              <div class="img-wrapper">
                <img src=" <?php echo base_url("assets/dist/img/people_2.png")?>" height="100" alt="">
              </div>
            </div>
            <a href=" <?php echo base_url("admin/profile/consent_user")?>" class="small-box-footer">
              <?= trans('more_info') ?> <i class="fa fa-arrow-circle-right"></i>
            </a>


          </div>

        </div>
        <div class="col-10 col-md-4 pb-2">
          <div class="small-box bg-info">
            <div class="d-flex justify-content-between p-3 align-items-center">
              <div class="inner">
                <h5 class="text-white mb-0 text-bold">Consent Recieved <?= $recieve_count?></h5>
              </div>
  
              <div class="img-wrapper">
                <img src=" <?php echo base_url("assets/dist/img/consent_2.png")?>" height="100" alt="">
              </div>
            </div>
            <a href="<?php echo base_url("admin/consent_active/consent_recieved")?>" class="small-box-footer">
              <?= trans('more_info') ?> <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>

        </div>
        <div class="col-10 col-md-4 pb-2">

          <div class="small-box bg-success">
            <div class="d-flex justify-content-between p-3 align-items-center">
              <div class="inner">
  
                <h5 class="text-white mb-0 text-bold">Allocation Recieved <?=$allocation_recieved?></h5>
  
              </div>
  
              <div class="img-wrapper">
                <img src=" <?php echo base_url("assets/dist/img/allocation.png")?>" height="100" alt="">
                
  
              </div>

            </div>


            <a href="<?php echo base_url("admin/allocation_user/allocation_user_list")?>" class="small-box-footer"><?= trans('more_info') ?> <i class="fa fa-arrow-circle-right"></i></a>

          </div>

        </div>
        <!-- <section class="col-md-12 connectedSortable">

          <div class="card">

            <div class="card-header border-0 d-flex align-items-center p-0">

              <h3 class="card-title p-3">

                <i class="fa fa-pie-chart mr-1"></i>

                <?= trans('sales') ?>

              </h3>
              <ul class="nav nav-pills ml-auto p-2">

                <li class="nav-item">

                  <a class="btn btn-admin active" href="<?php echo base_url("admin/profile/consent_user") ?>" >View
                    Consent</a>


                </li>



              </ul>
            </div>
          </div>
        </section> -->
      </div>

    </div>

  </section>

</div>

<!-- Morris.js charts -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>

<script src="<?= base_url() ?>assets/plugins/morris/morris.min.js"></script>

<!-- Sparkline -->

<script src="<?= base_url() ?>assets/plugins/sparkline/jquery.sparkline.min.js"></script>

<!-- jvectormap -->

<script src="<?= base_url() ?>assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>

<script src="<?= base_url() ?>assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>

<!-- jQuery Knob Chart -->

<script src="<?= base_url() ?>assets/plugins/knob/jquery.knob.js"></script>

<!-- daterangepicker -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>

<script src="<?= base_url() ?>assets/plugins/daterangepicker/daterangepicker.js"></script>

<!-- datepicker -->

<script src="<?= base_url() ?>assets/plugins/datepicker/bootstrap-datepicker.js"></script>

<!-- Bootstrap WYSIHTML5 -->

<script src="<?= base_url() ?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->

<script src="<?= base_url() ?>assets/dist/js/pages/dashboard.js"></script>