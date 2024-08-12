<!-- DataTables -->

<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/datatables/dataTables.bootstrap4.css">

<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper">


    <!-- Main content -->

    <section class="content mt10">
        <div class="card">
            <div class="card-body table-responsive">
               
                <table id="exam_list_by_super_user" class="table table-bordered table-striped "
                    style="border-collapse: collapse !important;">
                    <thead>
                        <tr>
                            <th>S.No.</th>
                            <th>Exam Name </th>
                            <th>Total Enrolled Candidates</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                                                 
                        </tr>
                    </thead>
                     <?php 
                      foreach ($data   as $key=> $d){?> 
                        <tr>
                        <!-- ."==". echo $d['no_candidate']; -->
                            <td><?php echo $key+1;?></td>
                            <td><a href="<?= base_url('admin/Super_user/consent_recieved_by_super_user/'.base64_encode($d['exam_name'])); ?>" target="_blank"><?php echo get_exam_name($d['exam_name']);?></a></td>
                            <td><?php   echo get_exam_name_details($d['exam_name'])['no_of_cand']?></td>
                            <td><?php   echo  date('d-m-Y', strtotime(get_exam_name_details($d['exam_name'])['start_date_exam']));?></td>
                            <td><?php   echo  date('d-m-Y', strtotime(get_exam_name_details($d['exam_name'])['end_date_exam']));?> </td>
                          

                        </tr> 
                        <?php }?> 

                </table>
            </div>
        </div>

    </section>

    <!-- /.content -->

</div>
<!-- DataTables -->

<script src="<?= base_url() ?>assets/plugins/datatables/jquery.dataTables.js"></script>

<script src="<?= base_url() ?>assets/plugins/datatables/dataTables.bootstrap4.js"></script>
<script>

  $(function () {

    $("#exam_list_by_super_user").DataTable();

  });
</script> 