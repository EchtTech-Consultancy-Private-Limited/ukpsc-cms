<!-- DataTables -->

<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/datatables/dataTables.bootstrap4.css"> 

<!--  -->
<div class="content-wrapper">
    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Mark Attendance </h3>
            </div>
            <div class="card-body">
                <div class="datalist">
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-hover"
                            style="border-collapse: collapse !important;">
                            <thead>
                                <tr style="text-align: center;">
                                    <th width="50">S.No.</th>
                                    <th>Exam Name</th>
                                    <th>Subject Line of Letter</th>
                                    <th> Start Date of exam</th>
                                    <th>End Date of exam</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    if(count($info)>0){
                                    foreach ($info as $key => $value) {?>
                                <tr>
                                    <td>
                                        <?php echo $key+1 ?>
                                    </td>
                                    <td> <a href="<?= base_url("admin/allocation_user/mark_attendance_allocation/" .
                                            urlencrypt($value['id']))?>" title="View" class="btn btn-sec">
                                            <?php echo get_exam_name($value['exam_name']); ?>
                                        </a></td>
                                    <td>
                                        <?php echo $value['subjectline']; ?>
                                    </td>
                                    <td>
                                        <?php echo date("d-m-Y", strtotime($value['startdate'])); ?>
                                    </td>
                                    <td>
                                        <?php echo date("d-m-Y", strtotime( $value['enddate'])); ?>
                                    </td>
                                </tr>
                                <?php }
                                    }
                            
                                    ?>
                            </tbody>
    
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- Modal -->

<script src="<?= base_url() ?>assets/plugins/datatables/jquery.dataTables.js"></script>

<script src="<?= base_url() ?>assets/plugins/datatables/dataTables.bootstrap4.js"></script>
<script>
    $(document).ready(function () {
        var table = $('#example1').DataTable({
            "processing": true,
            "serverSide": false,
        });
    });
</script>
