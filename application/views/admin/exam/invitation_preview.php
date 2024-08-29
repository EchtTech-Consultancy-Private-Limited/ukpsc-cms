<?php //echo '<pre>';print_r($admin);exit;?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="form css/dash.css">
    <style>
        .hed {
            text-align: right;
            text-decoration: none;
            font-weight: normal;
        }
        
        .table thead th {
            color: #373250;
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
    
<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/datatables/dataTables.bootstrap4.css"> 


</head>

<body>
    <div class="content-wrapper" style="">
        <section class="content">
            <div class="card p-4 mt-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <h4 class="text-center text-bold" style="color: #e14658;">
                                <?= get_exam_name($admin[0]['exam_name']) ?>
                            </h4>
                            </div>
                        </div>
                        <!-- <div class="col-12">
                            <h6 class="text-center text-bold">
                                <?= trans('written_examination') ?>
                            </h6>
                        </div> -->
                        <div class="col-12">
                            <p style="text-align: center;"><b>
                                    <?= trans('exam_schedule_vew') ?>
                                </b></p>
                        </div>
                        <div class="col-12">
                            <div class="table-responsive">
                            <table id="subjectTable" class="table table-bordered table-hover  " style="overflow: auto; border-collapse: collapse !important;">
                                <!-- <table class="table table-bordered table-hover dataTable sunbjectTable" style="overflow: auto; border-collapse: collapse !important;"> -->
                                    <thead>
                                        <tr>
                                            <th style="width:8%; padding:10px;  border: 1px solid #373250; ">S.No:</th>
                                            <th style="width:20%; padding:10px;  border: 1px solid #373250;">Subject Name
                                            </th>
                                            <th style="width:20%; padding:10px;  border: 1px solid #373250;">No. of Candidates</th>
                                            <th style="width:8%; padding:10px;  border: 1px solid #373250;">Exam Date</th>
                                            <th style="width:20%; padding:10px;  border: 1px solid #373250;">Exam Shift
                                            </th>
                                            <th style="width:20%; padding:10px;  border: 1px solid #373250;">Exam Time</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        <?php
                                          $b = 1;
                                         for($i=0; $i<count($admin);$i++) {    ?>

                                       <?php 
                
                                         
                                           $sub_name = explode(',',$admin[$i]['sub_name']);
                                                
                                            $exam_name =  explode(',',$admin[$i]['exam_name']);
                                            $no_candidate =  explode(',',$admin[$i]['no_candidate']);
                                            $shft_exam =  explode(',',$admin[$i]['shft_exam']);
                                            $date_exam =  explode(',',$admin[$i]['date_exam']);
                                            $time_exam =  explode(',',$admin[$i]['time_exam']);
                                    
                                        if(count($sub_name)==1){
                                       ?>
                                        <tr>
                                            <td
                                                style="width:8%; padding:10px; font-weight: normal !important; border: 1px solid #373250;">
                                                <?php echo $b ?>
                                            </td>
                                            <td
                                                style="width:20%; padding:10px;  font-weight: normal !important; border: 1px solid #373250;">
                                                <?php echo get_subject_name($admin[$i]['sub_name']) ?>
                                            </td>
                                            <th style="width:20%; padding:10px;  border: 1px solid #373250;"><?php echo $admin[$i]['no_candidate'] ?></th>
                                            <td
                                                style="width:20%; padding:10px;  font-weight: normal !important; border: 1px solid #373250;">
                                                <?php echo date("d-m-Y", strtotime($admin[$i]['date_exam'])); ?>
                                            </td>
                                            <td
                                                style="width:8%; padding:10px;  font-weight: normal !important; border: 1px solid #373250;">
                                                <?php echo $admin[$i]['shft_exam'] ?>
                                            </td>
                                            <td
                                                style="width:20%; padding:10px;  font-weight: normal !important; border: 1px solid #373250;">
                                                <?php echo $admin[$i]['time_exam'] ?>
                                            </td>

                                        </tr>
                                    <?php  $b +=1;}else{?>
                                             <?php for($j=0; $j<count($sub_name);$j++) { ?>

                                        <tr>
                                            <td
                                                style="width:8%; padding:10px; font-weight: normal !important; border: 1px solid #373250;">
                                                <?php echo $b; ?>
                                            </td>

                                            <td
                                                style="width:20%; padding:10px;  font-weight: normal !important; border: 1px solid #373250;">
                                                <?php echo get_subject_name($sub_name[$j]) ?>
                                            </td>
                                            <th style="width:20%; padding:10px;  border: 1px solid #373250;"><?php echo $no_candidate[$j] ?></th>
                                            <td
                                                style="width:20%; padding:10px;  font-weight: normal !important; border: 1px solid #373250;">
                                                <?php echo date("d-m-Y", strtotime($date_exam[$j])); ?>
                                            </td>
                                            <td
                                                style="width:8%; padding:10px;  font-weight: normal !important; border: 1px solid #373250;">
                                                <?php echo $shft_exam[$j] ?>
                                            </td>
                                            <td
                                                style="width:20%; padding:10px;  font-weight: normal !important; border: 1px solid #373250;">
                                                <?php echo $time_exam[$j] ?>
                                            </td>

                                        </tr>

                                        <?php  $b = $b+1; } ?>
                                        <?php }  ?>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                                <div class="view-all--button">
                                    <button onclick="window.history.go(-1)" class="btn view-btn">Back (पीछे)</button>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

</body>
<script src="<?= base_url() ?>assets/plugins/datatables/jquery.dataTables.js"></script>

<script src="<?= base_url() ?>assets/plugins/datatables/dataTables.bootstrap4.js"></script>
<script>
    $(document).ready( function () {
    $('#subjectTable').DataTable();
} );
</script>
</html>