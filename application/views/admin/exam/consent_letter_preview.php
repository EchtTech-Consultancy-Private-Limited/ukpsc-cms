<?php //echo '<pre>';print_r($admin);exit;?>
<?php
    // $sub_name =  explode(',',$admin['sub_name']);
    // $exam_name =  explode(',',$admin['exam_name']);
    // $no_candidate =  explode(',',$admin['no_candidate']);
    // $shft_exam =  explode(',',$admin['shft_exam']);
    // $date_exam =  explode(',',$admin['date_exam']);
    // $time_exam =  explode(',',$admin['time_exam']);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="form css/dash.css">
    <style>
        .hed {
            text-align: right;
            text-decoration: none;
            font-weight: normal;
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
</head>
<body>
    <div class="content-wrapper">
        <section class="content">
            <div class="card mt-4">
                <div class="card-header bg-white">
                    <div class="row">
                        <div class="col-md-12">
                            <h2 class="card-title fw-bold">Letter List View</h2>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <tbody>
                                        <tr>
                                            <th>Exam Name</th>
                                            <td><?= get_exam_name($admin[0]['exam_name']) ?></td>
                                        </tr>
                                        <tr>
                                            <th>Subject Line</th>
                                            <td><?=$admin[0]['subjectline'] ?></td>
                                        </tr>
                                        
                                        <tr>
                                            <th>Speed Post</th>
                                            <td><?= $admin[0]['speedpost'] ?></td>
                                        </tr>
                                        <tr>
                                            <th>Start Date</th>
                                            <td><?= date("d-m-Y", strtotime( $admin[0]['startdate']));?></td>
                                        </tr>
                                        <tr>
                                            <th>End Date</th>
                                            <td><?= date("d-m-Y", strtotime( $admin[0]['enddate']));?></td>
                                        </tr>
                                        <tr>
                                            <th>Signature</th>
                                            <td><?= $admin[0]['name_designation_mobile'] ?></td>
                                        </tr>
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

</html>