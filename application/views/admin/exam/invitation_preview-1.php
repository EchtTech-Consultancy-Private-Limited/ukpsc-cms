<?php //echo '<pre>';print_r($admin);exit;?>
<?php


            $sub_name =  explode(',',$admin['sub_name']);
            $exam_name =  explode(',',$admin['exam_name']);
            $no_candidate =  explode(',',$admin['no_candidate']);
            $shft_exam =  explode(',',$admin['shft_exam']);
            $date_exam =  explode(',',$admin['date_exam']);
            $time_exam =  explode(',',$admin['time_exam']);

 ?>


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
    </style>


</head>

<body>
    <div class="content-wrapper" style="">
        <section class="content">
            <div class="card p-4 mt-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <h4 class="text-center text-bold" style="color: #e14658;">
                                <?= $admin['subjectline'] ?>
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
                                <table class="table table-bordered table-hover table-striped">
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
                                        
                                      <!--   <?php for($i=0; $i<count($sub_name);$i++) {  $a= $i+1 ;  ?>
                                        <tr>
                                            <td
                                                style="width:8%; padding:10px; font-weight: normal !important; border: 1px solid #373250;">
                                                <?php echo $a; ?>
                                            </td>
                                            <td
                                                style="width:20%; padding:10px;  font-weight: normal !important; border: 1px solid #373250;">
                                                <?php echo get_subject_name($sub_name[$i]) ?>
                                            </td>
                                            <th style="width:20%; padding:10px;  border: 1px solid #373250;"><?php echo $no_candidate[$i] ?></th>
                                            <td
                                                style="width:20%; padding:10px;  font-weight: normal !important; border: 1px solid #373250;">
                                                <?php echo date("d-m-Y", strtotime($date_exam[$i])); ?>
                                            </td>
                                            <td
                                                style="width:8%; padding:10px;  font-weight: normal !important; border: 1px solid #373250;">
                                                <?php echo $shft_exam[$i] ?>
                                            </td>
                                            <td
                                                style="width:20%; padding:10px;  font-weight: normal !important; border: 1px solid #373250;">
                                                <?php echo $time_exam[$i] ?>
                                            </td>

                                        </tr>
                                        <?php } ?> -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>

</html>