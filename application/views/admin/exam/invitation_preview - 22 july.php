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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="form css/dash.css">
    <style>
        .hed{
            text-align: right;
            text-decoration: none;
            font-weight: normal;
        }
    </style>
    
    
</head>
<body>
    <div class="container-fluid">
        <br>
                <div class="row">
                    <div class="col-4">
                    </div>
                    <div class="col-8">
                        <p class="hed">स्पीड पोस्ट/ईमेल क्रमांक/ईआरपी/20XX-XX</p>
                        
                        <span style="text-align: right; margin-left: 72%;font-weight: bold;"><?php echo $admin["speedpost"];?></span>
                    </div>
                </div>


                <div class="row">
                    <div class="col-2">
                    </div>
                    <div class="col-4">
                        <p style="margin-left: 10%;">प्रेषक,</p><p style="margin-left: 20%;">सचिव,<br>उत्तराखंड लोक सेवा आयोग,<br>हरिद्वार |<br></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                    </div>
                    <div class="col-4">
                        <p style="margin-left: 10%;">सेवा में,</p><p style="margin-left: 20%;">प्राचार्य / केंद्र व्यवस्थापक,</p><input type="text" placeholder="------------------------------------------"style="margin-left: 20%; border: none; text-decoration: none; width:50%;">
                        <input type="text" placeholder="---------------------------------------------------------"style="margin-left: 20%; border: none; text-decoration: none; width:50%;">
                    </div>
                </div>


               <div class="row">
                    <div class="col-2">
                    </div>
                    <div class="col-3">
                        <p style="margin-left: 10%;">परीक्षा अनुभाग 4</p>
                    </div>
                    <div class="col-4">
                    </div>
                    <div class="col-3">
                        <div class="row">
                            <div class="col-2"></div>
                            <div class="col-8">
                                <p>हरिद्वार  - <span style="font-weight:bolder"><?php echo date("d-m-Y h:i:sa"); ?></span></p>
                            </div>
                        
                        </div>
                    </div>
                </div>

                <!--<div class="row">
                    <div class="col-2"></div>
                    <div class="col-10">
                    <p style="margin-left: 10%;"></p>
                    <p style=",a    Subject::  Uttrakhand hthdt ff hfsgh gd paper ugducgg-<span id="yr"></span>, Date <span id="dt"></span> to <span id="dt2"></span>  dgbhycvy  ydyefdy ydtyfd yyedf ftyfdbd vffddjn gthh gthhy hyhh vvggdvx vyfd dxyfwtf cfdcv wrsxw stdrst byggs|</p>
                </div>-->
                <br>
                <div class="row">
                    <div class="col-2"></div>
                    <div class="col-10">
                    <p style="margin-left: 5%;">विषय::    उत्तराखंड संबंधित राज्य कनिष्ठ अभियंता परीक्षा-<span ><?php echo $admin["startdate"]; ?></span>, Date <span ><?php echo $admin["enddate"];?></span> तक आयोजन के सम्बन्ध में परीक्षा केन्द्र निर्धारण सम्बन्धी सहमति कृपया उपर्युक्त विषय के सम्बन्ध में मुझे यह कहने का निदेश हुआ है कि मा० आयोग द्वारा</p>
                </div>
            </div>


                <div class="row">
                    <div class="col-2"></div>
                    <div class="col-10">
                    <p style="margin-left: 5%;">महोदय,,<br>आयोजन दिनांक-<span id="yr"></span>परीक्षा तिथि व दिवस  <span id="dt"></span><span id="dt2"></span>  :------</p>
                </div>
                <div class="row">
                    <div class="col-2">
                    </div>
                    <div class="col-10">

                        <table style="width:90%; border: 1px solid black; margin-left:8%">
                        <tr>
                            <th style="width:8%; padding:10px;  border: 1px solid black;">S.No:</th>
                            <th style="width:20%; padding:10px;  border: 1px solid black;">Subject Name</th>
                            <!-- <th style="width:20%; padding:10px;  border: 1px solid black;">No. of Candidates</th> -->
                            <th style="width:8%; padding:10px;  border: 1px solid black;">Exam Date</th>
                            <th style="width:20%; padding:10px;  border: 1px solid black;">Exam Shift</th>
                            <th style="width:20%; padding:10px;  border: 1px solid black;">Exam Time</th>
                        </tr>
                        <?php for($i=0; $i<count($sub_name);$i++) {  $a= $i+1 ;  ?>
                        <tr>
                            <th style="width:8%; padding:10px;  border: 1px solid black;"> <?php echo $a; ?> </th>
                            <th style="width:20%; padding:10px;  border: 1px solid black;"><?php echo get_subject_name($sub_name[$i]) ?></th>
                            <!-- <th style="width:20%; padding:10px;  border: 1px solid black;"><?php //echo $no_candidate[$i] ?></th> -->
                            <th style="width:8%; padding:10px;  border: 1px solid black;"><?php echo $date_exam[$i] ?></th>
                            <th style="width:20%; padding:10px;  border: 1px solid black;"><?php echo $shft_exam[$i] ?></th>
                            <th style="width:20%; padding:10px;  border: 1px solid black;"><?php echo $time_exam[$i] ?></th>

                        </tr>
                    <?php } ?>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                    </div>
                    <div class="col-10">
                        <p style="padding:5%">अवगत कराना है कि विगत में भी आपके विद्यालय में आयोग की परीक्षाओं का आयोजन कुशलतापूर्वक किया जाता रहा है। इसी क्रम में अनुरोध है कि कृपया सलग्न सहमति-पत्र एवं ऑनलाइन पेमेन्ट के प्रारूप पर वांछित सूचना प्रदान करते हुए प्रश्नगत परीक्षा के सम्बनध में अपनी सहमति आयोग को email: sorxamfour@gmail.com पर जाने का कष्ट करें।
                            <br>संलग्न :: यथोपरि (03 पृष्ठ)।
    </p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-10">
                    </div>
                    <div class="col-2">
                        Regards,<br><span ></span>
                    </div>
                </div>
            </div>
</body>
</html>


