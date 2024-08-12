<div class="content-wrapper">

    <div class="content-header">

        <div class="container-fluid">

            <div class="row">

                <div class="col-sm-6">

                    <h3 class="text-head mb-0"><?= trans('dashboard') ?> (SECTION) </h3>

                </div>

                <div class="col-sm-6">

                    <ol class="breadcrumb float-sm-right">

                        <li class="breadcrumb-item"><a href="#"><?= trans('home') ?></a></li>

                        <li class="breadcrumb-item active"><?= trans('dashboard') ?></li>

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
                 <!-- <h2> Change Password</h2> -->
              </div>
               <a  href=" <?php echo base_url("admin/Super_user/superUserChangePassword")?>">
                Change Password
               </a>

          </div>

        </div>

   
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