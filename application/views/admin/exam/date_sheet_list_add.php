<style>

</style>

<div class="content-wrapper">

    <section class="content">

        <div class="card">

            <div class="card-header">

                <div class="d-inline-block">

                    <h3 class="card-title"><i class="fa fa-plus"></i>&nbsp; Add DateSheet</h3>

                </div>

                <div class="d-inline-block float-right">

                    <a href="<?= base_url('admin/master/que_list'); ?>" class="btn btn-success"><i class="fa fa-list"></i>DateSheet List</a>

                </div>

            </div>

            <div class="card-body">



                <?php echo validation_errors(); ?>           

                <?php echo form_open_multipart(base_url('admin/examshedule_schedule/date_sheet_list_add'), 'id="xin-form"  class="form-horizontal"'); ?> 

               

                <div class="after-add-more field_wrapper">

                    <div class="row">

                          <div class="col-md-1.5">

                <div class="form-group">

                    <label for="name" class="col-sm- control-label">Exam Name</label>

                    <input type="text" name="exam_name[]" class="form-control " style="width:100px;" placeholder="Exam Name" >

                    </div>

                </div>

                        <div class="col-md-1.5" style="margin-left:20px;">

                    <div class="form-group">

                    <label for="name" class="col-sm- control-label">Subject Name </label><br>

                        <!-- <input type="text" name="sub_name[]" class="form-control"  placeholder="Subject Name" > -->

                           <select name="sub_name[]" id="sub_name" style="width:150px" >

                        <option value="" >Select Subject</option>

                        <?php 

                        $b= $subject;



                        foreach ($subject as $k => $subject) { ?>

                        <option value="<?= $subject->id ?>"  ><?= $subject->sub_name ?></option>

                     <?php   } ?>

                     </select>

                    </div>

                </div>





                <script> 

            

   $(document).ready(function () {

   var x = 1; //Initial field counter is 1    

   var maxField = 10; //Input fields increment limitation

   var addButton = $('.add-more'); //Add button selector

   var wrapper = $('.field_wrapper'); //Input field wrapper

   var fieldHTML ='<div id="'+x+'"> <div class="after-add-more field_wrapper"> <div class="row"> <div class="col-md-1.5"> <div class="form-group"><label for="name" class="col-sm- control-label">Exam Name</label> <input type="text" name="exam_name[]" class="form-control " style="width:100px;" placeholder="Exam Name" ></div></div><div class="col-md-1.5" style="margin-left:20px;"><div class="form-group"> <label for="name" class="col-sm- control-label">Subject Name </label><br><select name="sub_name[]" id="sub_name"  style="width:150px"><option value="">Select Subject</option> <?php  foreach ($b as $k=> $subjects){ ?> <option value="<?php echo $subjects->id; ?>" ><?php echo $subjects->sub_name; ?></option> <?php } ?> </select> </div></div><div class="col-md-1.5" style="margin-left:20px;"> <div class="form-group"><label for="name" class="col-sm- control-label">No. of Candidate</label> <input type="text"  style="width:140px;" name="no_candidate[]" class="form-control" style="width:140px;" placeholder="No. of Candidate"/></div></div><div class="col-md-1.5" style="margin-left:20px;"><div class="form-group"><label for="name" class="col-sm- control-label">Exam Date</label> <input type="date" name="date_exam[]" style="width:150px;" class="form-control" id="date_exam" placeholder="Number of Candidate"/></div></div><div class="col-md-1.5"  style="margin-left:20px;"><div class="form-group"> <label for="name" class="col-sm- control-label">Exam Shift </label><br><select name="shft_exam[]" class="" id="shft_exam" style="width:140px;"> <option>Select</option> <option value="Morning">Morning</option> <option value="Evening">Evening</option> </select></div></div><div class="col-md-2.5" style="margin-left:20px;"> <div class="form-group"><label for="name" class="col-sm- control-label">Exam Time </label> <input type="text" name="time_exam[]" class="form-control" id="time_exam" style="width:100%"  placeholder="Exam Time"/></div></div><a class="btn btn-danger remove_button but" style="height:40px ; margin-top:30px; margin-left:7px; padding:12px; text-align:center; color:white; font-weight:bolder;">-</a> </div></div></div>';

 

    $(addButton).click(function(){

        if(x < maxField){ 

            x++; 

            $(wrapper).append(fieldHTML); //Add field html      

        }

    });

     $(wrapper).on('click', '.remove_button', function(e){

        e.preventDefault();

        $(this).parent('div').remove(); //Remove field html

        x--; //Decrement field counter

    });

        });

            </script>

                            <div class="col-md-1.5" style="margin-left:20px;">

                    <div class="form-group">

                    <label for="name" class="col-sm- control-label">No. of Candidate</label>

                        <input type="text" name="no_candidate[]" style="width:140px;" class="form-control "  placeholder="No. of Candidate" >

                    </div>

                </div>

                    <div class="col-md-1.5" style="margin-left:20px;">

                    <div class="form-group">

                    <label for="name" class="col-sm- control-label">Exam Date</label>

                        <input type="date" name="date_exam[]" class="form-control " style="width:140px;" id="date_exam" placeholder="Number of Candidate" >

                    </div>

                </div>

                <div class="col-md-1.5"  style="margin-left:20px;">

                    <div class="form-group">

                    <label for="name" class="col-sm- control-label">Exam Shift </label>

                        <!-- <input type="text" name="shft_exam[]" class="form-control" id="shft_exam" placeholder="Shift of Exam" > -->
<br>
                        <select name="shft_exam[]" class="" id="shft_exam" style="width:150px;">

                        <option>Select</option>

                        <option value="Morning" >Morning</option>

                        <option value="Evening">Evening</option>

                        </select>

                    </div>

                </div> 

                  <div class="col-md-2.5"  style="margin-left:20px;">

                    <div class="form-group">

                    <label for="name" class="col-sm- control-label">Exam Time</label>

                        <input type="text" name="time_exam[]" style="width:100%" class="form-control inp" id="time_exam" placeholder="Exam Time" >

                    </div>

                </div> 



                        <div class="col-md-1">

                            <div class="form-group change">

                                <label for="">&nbsp;</label><br/>

                                <a class="btn btn-success add-more but" style="margin-top: 0px;height:40px; padding: 10px; text-align: center; color: white; text-overflow: initial; font-weight: bold;">+</a>

                            </div>

                        </div>

                    </div>

                </div> 

                <div class="form-group">

                    <div class="col-md-6">

                        <input type="submit" name="submit" value="Create " class="btn btn-primary pull-center">

                    </div>

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

   





