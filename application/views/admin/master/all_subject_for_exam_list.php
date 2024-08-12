<!-- DataTables -->

<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/datatables/dataTables.bootstrap4.css"> 
<style>
  .view-btn{
    border-color: #384e4a;
    background-color: #384e4a;
    color: #fff;
  }

  .view-btn:hover{
    border-color: #384e4a;
    background-color: #fff;
    color: #384e4a;
  }

  .view-all--button{
    margin-top: 10px !important;
  }
</style>


<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper">

  <section class="content">

    <!-- For Messages -->

    <?php $this->load->view('admin/includes/_messages.php') ?>

    <div class="card">

      <div class="card-header border-0">

        <div class="d-inline-block">

          <!-- <h3 class="card-title"><i class="fa fa-list"></i>&nbsp; <?php //echo trans('establishment_type') ?> List</h3> -->

          <h3 class="card-title"><i class="fa fa-list"></i> <?php echo $title?> &nbsp;</h3>

        </div>

          <div class="d-inline-block float-right">

            <a href="<?php echo base_url('admin/master/addSubjectNew/' . urlencrypt($id))?>" class="btn btn-admin">Add Subject &nbsp;</a>

        </div>

      </div>

    </div>

    <div class="card">

      <div class="card-body table-responsive">

        <table id="na_datatable" class="table table-bordered table-striped" width="100%"  style="border-collapse: collapse !important;">

          <thead>

            <tr>

              <th>S.No.</th>

              <th>Subject English Name</th>

              <th>Subject Hindi Name</th>

               <th>Subject Code</th>

               <!-- <th>Status</th> -->

              <th>Action</th>

            </tr>

          </thead>

          <?php foreach ($subjectList as $key => $value) {?>

              <tr>

              <td><?php echo $key+1 ?></td>

              <td><?php echo $value['sub_name'] ?></td>

              <td><?php echo $value['sub_name_hindi'] ?></td>

              <td><?php echo $value['sub_code'] ?></td>

              <td> <a title="Edit"  class="update btn btn-sm btn-success" href="<?php echo base_url('admin/master/edit_subject_new/' . urlencrypt($value['id']).'/'.urlencrypt($value['exam_id']))?>"> <i class="fa fa-edit"></i></a> </td>

       

            </tr>

          <?php } ?>

        

        </table>
          <div class="view-all--button">
            <button onclick="window.history.go(-1)" class="btn view-btn">Back (पीछे)</button>
        </div>

      </div>
   

    </div>

  

  </section>  

</div>





<!-- DataTables -->

<script src="<?= base_url() ?>assets/plugins/datatables/jquery.dataTables.js"></script>

<script src="<?= base_url() ?>assets/plugins/datatables/dataTables.bootstrap4.js"></script>



<script>

$(document).ready(function () {

    window.setTimeout(function() {

         $("#consent_recieved").fadeTo(500, 0).slideUp(500, function(){

            $(this).remove();

            <?php unset($_SESSION['success'])?>

         });

      }, 4000);

});  

  //---------------------------------------------------

  var table = $('#na_datatable').DataTable( {

    "processing": true,

    "serverSide": false,

 

  });

</script>