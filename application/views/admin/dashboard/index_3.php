  <div class="content-wrapper">

    <div class="content-header">

      <div class="container-fluid">

        <div class="row">

          <div class="col-sm-6">

            <h3 class="mb-0 text-head"><?= trans('dashboard') ?> (State Council)</h3>

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

        <div class="row">

          <div class="col-lg-3 col-6">

            <div class="small-box bg-warning">

              <div class="inner">

                <h3><?= $all_users; ?></h3>

                <p><?= trans('user_registrations') ?></p>

              </div>

              <div class="icon">

                <i class="ion ion-person-add"></i>

              </div>

              <a href="#" class="small-box-footer"><?= trans('more_info') ?> <i class="fa fa-arrow-circle-right"></i></a>

            </div>

          </div>

          <div class="col-lg-3 col-6">

            <div class="small-box bg-info">

              <div class="inner">

                <h3><?= $active_users; ?></h3>

                <p><?= trans('active_users') ?></p>

              </div>

              <div class="icon">

                <i class="ion ion-bag"></i>

              </div>

              <a href="#" class="small-box-footer"><?= trans('more_info') ?> <i class="fa fa-arrow-circle-right"></i></a>

            </div>

          </div>

<!--          <div class="col-lg-3 col-6">

            <div class="small-box bg-success">

              <div class="inner">

                <h3><?= $deactive_users; ?></h3>

                <p><?= trans('inactive_users') ?></p>

              </div>

              <div class="icon">

                <i class="ion ion-stats-bars"></i>

              </div>

              <a href="#" class="small-box-footer"><?= trans('more_info') ?> <i class="fa fa-arrow-circle-right"></i></a>

            </div>

          </div>

          

          <div class="col-lg-3 col-6">

            <div class="small-box bg-danger">

              <div class="inner">

                <h3>65</h3>

                <p><?= trans('unique_visitors') ?></p>

              </div>

              <div class="icon">

                <i class="ion ion-pie-graph"></i>

              </div>

              <a href="#" class="small-box-footer"><?= trans('more_info') ?> <i class="fa fa-arrow-circle-right"></i></a>

            </div>

          </div>-->

        </div>

        <div class="row">

          <section class="col-lg-7 connectedSortable">

            <div class="card">

              <div class="card-header d-flex p-0">

                <h3 class="card-title p-3">

                  <i class="fa fa-pie-chart mr-1"></i>

                  <?= trans('sales') ?>

                </h3>

                <ul class="nav nav-pills ml-auto p-2">

                  <li class="nav-item">

                    <a class="nav-link active" href="#revenue-chart" data-toggle="tab"><?= trans('area') ?></a>

                  </li>

                  <li class="nav-item">

                    <a class="nav-link" href="#sales-chart" data-toggle="tab"><?= trans('donut') ?></a>

                  </li>

                </ul>

              </div>

              <div class="card-body">

                <div class="tab-content p-0">

                  <div class="chart tab-pane active" id="revenue-chart"

                       style="position: relative; height: 300px;"></div>

                  <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;"></div>

                </div>

              </div>

            </div>

          </section>

          <section class="col-lg-5 connectedSortable">

            <!-- solid sales graph -->

            <div class="card bg-info-gradient">

              <div class="card-header no-border">

                <h3 class="card-title">

                  <i class="fa fa-th mr-1"></i>

                  <?= trans('sales_graph') ?>

                </h3>

                <div class="card-tools">

                  <button type="button" class="btn bg-info btn-sm" data-widget="collapse">

                    <i class="fa fa-minus"></i>

                  </button>

                  <button type="button" class="btn bg-info btn-sm" data-widget="remove">

                    <i class="fa fa-times"></i>

                  </button>

                </div>

              </div>

              <div class="card-body">

                <div class="chart" id="line-chart" style="height: 250px;"></div>

              </div>

              <div class="card-footer bg-transparent">

                <div class="row">

                  <div class="col-4 text-center">

                    <input type="text" class="knob" data-readonly="true" value="50" data-width="60" data-height="60"

                           data-fgColor="#39CCCC">

                    <div class="text-white">Received</div>

                  </div>

                  <div class="col-4 text-center">

                    <input type="text" class="knob" data-readonly="true" value="20" data-width="60" data-height="60"

                           data-fgColor="#39CCCC">

                    <div class="text-white">Approved</div>

                  </div>

                  <div class="col-4 text-center">

                    <input type="text" class="knob" data-readonly="true" value="30" data-width="60" data-height="60"

                           data-fgColor="#39CCCC">

                    <div class="text-white">Pending</div>

                  </div>

                </div>

              </div>

            </div>

          </section>

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

