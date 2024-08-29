<!-- DataTables -->

<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/datatables/dataTables.bootstrap4.css">

<style>

  .table {

    

}

</style> 



<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper">

  <section class="content">

    <!-- For Messages -->

    <?php $this->load->view('admin/includes/_messages.php') ?>

    <div class="card">

      <div class="card-header">

        <div class=" d-flex justify-content-sm-between align-items-center flex-column flex-sm-row">

          <div class="left">

            <div class="d-inline-block">

              <h3 class="card-title m-0"><i class="fa fa-list"></i>&nbsp; Exam List&nbsp;(परीक्षा सूची)</h3>

            </div>



          </div>

          <div class="right">

            <div class="d-sm-block float-sm-right pt-2 pt-sm-0">

              <?php if($this->rbac->check_operation_permission('quetion_paper_add')): ?>

                <a href="<?= base_url('admin/master/exam_add'); ?>" class="btn btn-admin"> Add Exam&nbsp;(परीक्षा जोड़ें)</a>

              <?php endif; ?>

            </div>

          </div>

        </div>

          

      </div>

    </div>

    <div class="card">

      <div class="card-body table-responsive">

        <table id="na_datatable" class="table table-bordered table-striped" width="100%" style="border-collapse: collapse !important;">

          <thead>

            <tr>

              <th>S.No.</th>

              <th>Exam English Name</th>

              <th>Exam Hindi Name</th>

              <th>Advertisement Number</th>

               <th>Total Enrolled Candidates</th>

               <th>Start Date</th>

               <th>End Date</th>

              <th>Add/View Subject</th>

              <th>Action</th>

            </tr>

          </thead>

        </table>

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

    "ajax": "<?=base_url('admin/master/datatable_json_exam')?>",

    "order": [[0,'asc']],

    "columnDefs": [

    { "targets": 0, "name": "id", 'searchable':true, 'orderable':true},

    { "targets": 1, "name": "exam_name", 'searchable':true, 'orderable':true},

    { "targets": 1, "name": "exam_hindi_name", 'searchable':true, 'orderable':true},

    { "targets": 2, "name": "advertise_name", 'searchable':true, 'orderable':true},

    { "targets": 3, "name": "no_of_cand", 'searchable':true, 'orderable':true},

    { "targets": 3, "name": "start_date_exam", 'searchable':true, 'orderable':true},

    { "targets": 3, "name": "end_date_exam", 'searchable':true, 'orderable':true},

    { "targets": 4, "name": "created_at", 'searchable':true, 'orderable':true},

    ]

  });

</script>