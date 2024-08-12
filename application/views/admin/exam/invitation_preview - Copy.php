<?php

            $sub_name =  explode(',',$admin['sub_name']);
            $exam_name =  explode(',',$admin['exam_name']);
            $no_candidate =  explode(',',$admin['no_candidate']);
            $shft_exam =  explode(',',$admin['shft_exam']);
            $date_exam =  explode(',',$admin['date_exam']);
            $time_exam =  explode(',',$admin['time_exam']);

 ?>



<div class="content-wrapper">

    <section class="content">

        <div class="card">

            <div class="card-header">

                <div class="d-inline-block">

                    <h3 class="card-title"><i class="fa fa-plus"></i>&nbsp; Create Invitation</h3>

                </div>

                <div class="d-inline-block float-right">


                </div>

            </div>

            <div class="card-body">



                <?php echo validation_errors(); ?>           

                <?php echo form_open_multipart(base_url('admin/examshedule_schedule/invitation_add'), 'id="xin-form"  class="form-horizontal"'); ?> 

               

                <div class="after-add-more field_wrapper">
                    <div class="row">
            <div class="col-md-6">

                <div class="form-group">

                    <label for="name" class="col-sm- control-label">Enter Letter/Email/Speed Post Number</label>

                    <input type="text"  disabled  name="speedpost" class="form-control" placeholder=""  value="<?php echo $admin['speedpost'];?>"  >

                    </div>

            </div>
            </div>
        <div class="row">
             <div class="col-md-6">

                <div class="form-group">

                    <label for="name" class="col-sm- control-label">Enter Subject Line of Letter</label>

                    <input type="text"  disabled  name="subjectline" class="form-control" placeholder="" value="<?php echo $admin['subjectline'];?>" >

                    </div>

            </div>
        </div>
            <div class="row">
             <div class="col-md-4">

                <div class="form-group">

                    <label for="name" class="col-sm- control-label">Choose Start Date of exam </label>

                    <input type="text" disabled name="startdate" class="form-control" placeholder="Subject" value="<?php echo $admin['startdate'];?>" >

                    </div>

            </div>
    
             <div class="col-md-4">

                <div class="form-group">

                    <label for="name" class="col-sm- control-label">Choose End Date of exam </label>

                    <input type="text" disabled  name="enddate" class="form-control" placeholder="Subject" value="<?php echo $admin['enddate'];?>"  >

                    </div>

            </div>
        </div>

    
     <?php for($i=0; $i<count($sub_name);$i++) { ?>

            <div class="row">

                <div class="col-md-1.5">

                <div class="form-group">

                    <label for="name" class="col-sm- control-label">Exam Name</label>

                    <input type="text" name="exam_name[]" disabled class="form-control"   value="<?php echo $exam_name[$i] ?>"  placeholder="Exam Name" style="width:100px;">

                    </div>

                </div>

                        <div class="col-md-1.5" style="margin-left:20px;">

                    <div class="form-group">

                    <label for="name" class="col-sm- control-label">Subject Name </label>
                    <br>
                        <input type="text" disabled name="sub_name[]" class="form-control"   value="<?php echo get_subject_name($sub_name[$i]) ?>" placeholder="Subject Name" >

                         

                    </div>

                </div>
     
                            <div class="col-md-1.5" style="margin-left:20px;">

                    <div class="form-group">

                    <label for="name" class="col-sm- control-label">No. of Candidate</label>

                        <input type="text" disabled  style="width:140px;" name="no_candidate[]"    value="<?php echo $no_candidate[$i] ?>" class="form-control"  placeholder="No. of Candidate" >

                    </div>

                </div>

                    <div class="col-md-1.5" style="margin-left:20px;">

                    <div class="form-group">

                    <label for="name" class="col-sm- control-label">Exam Date</label>

                        <input type="text" disabled name="date_exam[]" class="form-control" id="date_exam"   value="<?php echo $date_exam[$i] ?>"  placeholder="Number of Candidate" style="width:150px;">

                    </div>

                </div>

                <div class="col-md-1.5"  style="margin-left:20px;"> 

                    <div class="form-group">

                    <label for="name" class="col-sm- control-label">Exam Shift </label>

                        <input type="text" disabled name="shft_exam[]" class="form-control"  value="<?php echo $shft_exam[$i] ?>"  id="shft_exam" placeholder="Shift of Exam" >
               
                      

                    </div>

                </div> 

                  <div class="col-md-2.5"  style="margin-left:20px;">

                    <div class="form-group">

                    <label for="name" class="col-sm- control-label">Exam Time</label>

                        <input type="text" disabled name="time_exam[]"  value="<?php echo $time_exam[$i] ?>" class="form-control" id="time_exam" placeholder="Exam Time" style="width:90%;">

                    </div>

                </div> 


                    </div>

                <?php } ?>

                </div> 

            

     <?php echo form_close(); ?>

            </div>



        </div>

    </section> 

</div>



<script>

    $("#country").addClass('active');

    $(document).ready(function () {



        $("#xin-form")["submit"](function (d) {

            if ($("#sub_name").val() === "") {

                alert("Please fill 'Subject Name");

                $("#sub_name").focus();

                return false;

            }

            if ($("#sub_name_hindi").val() === "") {

                alert("Please fill 'Subject Name Hindi");

                $("#sub_name_hindi").focus();

                return false;

            }

        });

    });

</script>

   





