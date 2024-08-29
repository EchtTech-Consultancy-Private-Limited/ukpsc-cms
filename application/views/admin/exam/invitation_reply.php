<?php
    // echo '<pre>';print_r($admin);die;
    if($admin)
    {
        $sub_name =  explode(',',$admin['sub_name']);
        $exam_name =  explode(',',$admin['exam_name']);
        $no_candidate =  explode(',',$admin['no_candidate']);
        $shft_exam =  explode(',',$admin['shft_exam']);
        $date_exam =  explode(',',$admin['date_exam']);
        $time_exam =  explode(',',$admin['time_exam']);
    }
    else
    {
        
        $sub_name =  [];
        $exam_name =  '';
        $no_candidate =  '';
        $shft_exam =  '';
        $date_exam =  '';
        $time_exam =  '';
        $admin["speedpost"] = '';
        $admin["startdate"] = '';
        $admin["enddate"] = '';
        $admin["id"] = '';

    }
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
        .hed{
            text-align: right;
            text-decoration: none;
            font-weight: normal;
        }
        .main-content {
            width: calc(100% - 15.6rem);
            margin-left: 15.6rem;
            padding: 0 1rem;
        }
        .main-footer {
            margin-left: 0 !important;
        }
    </style>
</head>
<body>
    <div class="main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-12">
                            <p class="hed">स्पीड पोस्ट/ईमेल संख्या: <span ><?php echo $admin["speedpost"];?></span></p>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12">
                            <p>प्रेषक,</p><p style="margin-left: 1rem;">सचिव,<br>उत्तराखंड लोक सेवा आयोग,<br>हरिद्वार |<br></p>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12">
                            <p>सेवा में,</p>
                            <p style="margin-left: 1rem;">प्राचार्य / केंद्र व्यवस्थापक,</p>
                            <input type="text" placeholder="---------------------------------------------------------" style="margin-left: 1rem; border: none; text-decoration: none; width:50%;">
                            <input type="text" placeholder="---------------------------------------------------------" style="margin-left: 1rem; border: none; text-decoration: none; width:50%;">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-6">
                            <p>परीक्षा अनुभाग 4</p>
                        </div>
                        <div class="col-6">
                            <div class="text-right">
                                <p>हरिद्वार; दिनांक:-
                                    <span style="font-weight:;"><?php echo date("d-m-Y"); ?></span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row mb-2">
                        <div class="col-12">
                            <p style="margin-left: 1rem;">विषय::    उत्तराखंड संबंधित राज्य कनिष्ठ अभियंता परीक्षा-<span ><?php echo $admin["startdate"]; ?></span>, Date <span ><?php echo $admin["enddate"];?></span> तक आयोजन के सम्बन्ध में परीक्षा केन्द्र निर्धारण सम्बन्धी सहमति कृपया उपर्युक्त विषय के सम्बन्ध में मुझे यह कहने का निदेश हुआ है कि मा० आयोग द्वारा</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                        <p style="margin-left: 1rem;">महोदय,<br>आयोजन दिनांक-<span id="yr"></span>परीक्षा तिथि व दिवस  <span id="dt"></span><span id="dt2"></span>  :------</p>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12">
                                <?php echo form_open_multipart(base_url('admin/examshedule_schedule/invitation_reply/' . urlencrypt($admin['id'])), 'id="xin-form" class="form-horizontal" ') ?>  
                                
                            <table style="width:100%; border: 1px solid black; margin-left:1rem; font-weight: normal !important; text-decoration:none;">
                            <thead>
                                <tr>
                                    <th style="padding:5px;  border: 1px solid black; ">S.No.</th>
                                    <th style="padding:5px;  border: 1px solid black;">Subject Name</th>
                                    <!-- <th style="width:20%; padding:10px;  border: 1px solid black;">No. of Candidates</th> -->
                                    <th style="padding:5px;  border: 1px solid black;">Exam Date</th>
                                    <th style="padding:5px;  border: 1px solid black;">Exam Shift</th>
                                    <th style="padding:5px;  border: 1px solid black;">Exam Time</th>
                                    <th style="padding:5px;  border: 1px solid black;">Candidate No</th>
                                    <th style="padding:5px;  border: 1px solid black;">Select</th>
                                </tr>
                            </thead>
                            <?php for($i=0; $i<count($sub_name);$i++) {  $a= $i ;  ?>
                            <tbody>
                                <tr>
                                    <th style="padding:5px; font-weight: normal !important; border: 1px solid black;">
                                     <?php echo $a+1; ?> 
                                    </th>
                                    <td style="padding:5px;  font-weight: normal !important; border: 1px solid black;">
                                        <input type="text" name="sub_name[]" readonly value="<?php echo get_subject_name($sub_name[$i]) ?>" >
                                    </td>
                                    <td style="padding:5px;  font-weight: normal !important; border: 1px solid black;">
                                        <input type="text" name="date_exam[]" readonly value="<?php echo $date_exam[$i] ?>" >
                                    </td>
                                    <td style="padding:5px;  font-weight: normal !important; border: 1px solid black;"> 
                                        <input type="text" name="shft_exam[]" readonly value="<?php echo $shft_exam[$i] ?>" >
                                    </td>
                                    <td style="padding:5px;  font-weight: normal !important; border: 1px solid black;">
                                        <input type="text" name="time_exam[]" readonly value="<?php echo $time_exam[$i] ?>" >
                                    </td>
                                    <td style="padding:10px;  border: 1px solid black;">
                                        <input type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" maxlength="3" name="cand_no[]"   >
                                    </td>
                                    <td style="padding:5px;  font-weight: normal !important; border: 1px solid black;">
                                        <input type="checkbox" name="examselect[]"  value="<?php echo $a;?>">
                                    </td>
                                </tr>
                            </tbody>
                            <?php } ?>
                            </table>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12">
                            <p style="margin-left: 1rem;">
                                अवगत कराना है कि विगत में भी आपके विद्यालय में आयोग की परीक्षाओं का आयोजन कुशलतापूर्वक किया जाता रहा है। इसी क्रम में अनुरोध है कि कृपया सलग्न सहमति-पत्र एवं ऑनलाइन पेमेन्ट के प्रारूप पर वांछित सूचना प्रदान करते हुए प्रश्नगत परीक्षा के सम्बनध में अपनी सहमति आयोग को email: sorxamfour@gmail.com पर जाने का कष्ट करें।
                                <br>संलग्न :: यथोपरि (03 पृष्ठ)।
                            </p>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12 text-right">
                            <span class="mr-2">
                                Regards
                            </span>
                        </div>
                    </div>
                    <div class="row mb-5">
                        <div class="col-12 text-center">
                            <span >
                                <input type="submit" name="submit" value="Create " class="btn btn-primary pull-center">
                            </span>
                        </div>
                        <?php echo form_close(); ?>
                    </div>

                </div>
            </div>
        </div>
    </div>
</body>
</html>
