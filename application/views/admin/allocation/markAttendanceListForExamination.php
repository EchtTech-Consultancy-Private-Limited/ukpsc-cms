<!-- DataTables -->

<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/datatables/dataTables.bootstrap4.css">

<style>
    button.dt-button.buttons-excel.buttons-html5 {
        padding: 0.3rem 0.5rem;
        background: #373250;
        border: 1px solid #373250;
        color: #fff;
        border-radius: 5px;
        cursor: pointer;
    }
    button.dt-button.buttons-excel.buttons-html5:focus,
    button.dt-button.buttons-excel.buttons-html5:hover {
        background: #e14658;
        border: 1px solid #e14658;
        outline: none;
    }

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

                    <h3 class="card-title mt-0">
                        <i class="fa fa-list"></i>
                        <?php echo $title ."-". $exam_name;?>
                    </h3>
                </div>
                <div class="d-inline-block float-right">
                </div>

            </div>

            <!-- <div class="card-body">

                <?php echo form_open("/",'class="filterdata"') ?>    

                <div class="row">

                    <?php 

                    if (in_array($_SESSION['admin_role_id'], array(1,2,3,4,5,6))){?>

                    <div class="col-md-3">

                        <div class="form-group">

                            <select name="state" class="form-control dd_state" onchange="filter_data()" >

                                <option value="">Select District</option>

                                <?php foreach($states as $state):?>

                                    <option value="<?=$state->id?>"><?=$state->name?></option>

                                <?php endforeach;?>

                            </select>

                        </div>

                    </div>

                    <?php }

                    if (in_array($_SESSION['admin_role_id'], array(1,2,3,4,5,6))){

                        

                             ?>

                    <div class="col-md-3">

                        <div class="form-group">

                            <select name="district" id="city" class="form-control" onchange="filter_data()" >

                                <option value="">Select City</option>

                                <?php 

                                if(isset($districts) and count($districts ) >0){

                                    foreach($districts as $k=> $district){

                                    echo  '<option value="'.$district['id'].'">'.$district['name'].'</option>';

                                     }

                                }?>

                                ?>

                            </select>

                        </div>

                    </div>

                     <?php } ?>

                    <div class="col-md-2">

                        <div class="form-group">

                            <select name="status" class="form-control" onchange="filter_data()" >

                                <option value="">Select Grade</option>

                                

                                <?php foreach(ALLOWED_FILE_MOVEMENT_ROLE_ID[1] as $k=>$v):

                                    if (in_array($_SESSION['admin_role_id'], array(5)) && $k==5)

                                        continue;

                                        ?>



                                    <option value="<?=$k?>"><?=$v?></option>

                                <?php endforeach;?>

                                

                            </select>

                        </div>

                    </div>


                </div>

                <?php echo form_close(); ?> 

            </div>  -->

        </div>

    </section>





    <!-- Main content -->

    <section class="content mt10">
       
        <div class="card">
            
            <div class="card-body table-responsive">
                <table id="na_datatable" class="table table-bordered table-striped" style="border-collapse: collapse !important;">
                    <thead>
                        <tr>
                            <th>S.No.</th>
                            <th>Examination Center</th>
                            <th>Center Code</th>
                            <th>Date</th>
                            <th>Shift</th>
                            <th>Present</th>
                            <th>Absent</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                     <?php foreach ($info   as $key=> $d){?> 
                        <tr>
                            <td><?php echo $key+1;?></td>
                            <td><?php echo $d['examination_center_name'];?></td>
                            <td><?php echo $d['centerCode'];?></td>
                            <td><?= date("d-m-Y", strtotime($d['exam_date']));?></td>
                            <td><?php echo $d['exam_shift'];?></td>
                            <td><?php echo $d['present_candidate'];?></td>
                            <td><?php echo $d['absent_candidate'];?></td>
                            <td><?php echo $d['total_candidates'];?></td>
                        </tr> 
                        <?php }?>                  
                </table>
                <div class="view-all--button ml-1">
            <button onclick="window.history.go(-1)" class="btn view-btn">Back (पीछे)</button>
        </div>
            </div>
        </div>

    </section>

    <!-- /.content -->

</div>
<!-- DataTables -->

<script src="<?= base_url() ?>assets/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables/dataTables.buttons.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables/jszip.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables/buttons.html5.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables/dataTables.bootstrap4.js"></script>

<script>
    $(document).ready(function() {
    $('#na_datatable').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'excel'
        ]
    } );
    $('.dt-buttons .dt-button span').html('Download Report');
} );
</script>