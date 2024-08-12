<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!DOCTYPE html>

<html>

<head>

  <meta charset="utf-8">

  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title><?= isset($title)? $title.' - ' : 'Title -' ?> <?= $this->general_settings['application_name']; ?></title>

  <!-- Tell the browser to be responsive to screen width -->

  <meta name="viewport" content="width=device-width, initial-scale=1">

  <meta name="<?= $this->security->get_csrf_token_name() ?>" content="<?= $this->security->get_csrf_hash() ?>" />

  <!-- Font Awesome -->

  <link rel="stylesheet" href="<?= base_url()?>assets/plugins/font-awesome/css/font-awesome.min.css">

  <!-- Ionicons -->

  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

  <!-- Theme style -->

  <link rel="stylesheet" href="<?= base_url()?>assets/dist/css/cerrs.css">

  <!-- iCheck -->

  <link rel="stylesheet" href="<?= base_url()?>assets/plugins/iCheck/flat/blue.css">

  <!-- Morris chart -->

  <link rel="stylesheet" href="<?= base_url()?>assets/plugins/morris/morris.css">

  <!-- jvectormap -->

  <link rel="stylesheet" href="<?= base_url()?>assets/plugins/jvectormap/jquery-jvectormap-1.2.2.css">

  <!-- Date Picker -->

  <link rel="stylesheet" href="<?= base_url()?>assets/plugins/datepicker/datepicker3.css">

  <!-- Daterange picker -->

  <link rel="stylesheet" href="<?= base_url()?>assets/plugins/daterangepicker/daterangepicker-bs3.css">

  <!-- bootstrap wysihtml5 - text editor -->

  <link rel="stylesheet" href="<?= base_url()?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <!-- DropZone -->

  <link rel="stylesheet" href="<?= base_url()?>assets/plugins/dropzone/dropzone.css">

  <!-- Google Font: Source Sans Pro -->

  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <!-- ujjwal -->
  <link rel="stylesheet" href="<?= base_url()?>assets/dist/css/custom.css">

  <!-- jQuery -->

  <script src="<?= base_url()?>assets/plugins/jquery/jquery.min.js"></script>

 <script>

    var base_url = "<?php echo base_url();?>";

    var csfr_token_name = '<?php echo $this->security->get_csrf_token_name(); ?>';

    var csfr_token_value = '<?php echo $this->security->get_csrf_hash(); ?>';

    </script>

</head>

<body class="bg-cover">

<body>



<!-- Main Wrapper Start -->

<div class="wrapper">



  <!-- Navbar -->



  <?php if(!isset($navbar)): ?>



  <nav class="">

    <!-- Left navbar links -->

    <ul class="navbar-nav" style="display:none;">

      <li class="nav-item">

        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>

      </li>

      <li class="nav-item d-none d-sm-inline-block">

        <a href="<?= base_url('admin') ?>/dashboard" class="nav-link"><?= trans('home') ?></a>

      </li>

<!--      <li class="nav-item d-none d-sm-inline-block">

        <a href="#" class="nav-link"><?= trans('contact') ?></a>

      </li>-->

      <li class="nav-item d-none d-sm-inline-block">

        <a href="<?= base_url('admin/auth/logout') ?>" class="nav-link"><?= trans('logout') ?></a>

      </li>

    </ul>



    <!-- SEARCH FORM -->





    <!-- Right navbar links -->

    <ul class="navbar-nav ml-auto">

      <!-- Languages -->

      <?php  $languages = get_language_list(); ?>

      <!-- Notifications Dropdown Menu -->

     <!--  <li class="nav-item dropdown">

        <a class="nav-link" data-toggle="dropdown" href="#">

          <i class="fa fa-bell-o"></i>

          <span class="badge badge-warning navbar-badge">15</span>

        </a>

        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">

          <span class="dropdown-item dropdown-header">15 Notifications</span>

          <div class="dropdown-divider"></div>

          <a href="#" class="dropdown-item">

            <i class="fa fa-envelope mr-2"></i> 4 new messages

            <span class="float-right text-muted text-sm">3 mins</span>

          </a>

          <div class="dropdown-divider"></div>

          <a href="#" class="dropdown-item">

            <i class="fa fa-users mr-2"></i> 8 friend requests

            <span class="float-right text-muted text-sm">12 hours</span>

          </a>

          <div class="dropdown-divider"></div>

          <a href="#" class="dropdown-item">

            <i class="fa fa-file mr-2"></i> 3 new reports

            <span class="float-right text-muted text-sm">2 days</span>

          </a>

          <div class="dropdown-divider"></div>

          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>

        </div>

      </li> -->



    </ul>

  </nav>



  <?php endif; ?>

 

