<div class="content-wrapper">

    <section class="content">

        <div class="card">

            <div class="card-header">

                <div class="d-inline-block">

                    <h3 class="card-title"><i class="fa fa-plus"></i>&nbsp;Update Letter&nbsp;(पत्र अपडेट करें)</h3>

                </div>

            </div>

            <div class="card-body">
                <?php echo validation_errors(); ?>

                <?php echo form_open_multipart(base_url('admin/examshedule_schedule/date_sheet_update'), 'id="xin-form"  class="form-horizontal"'); ?>
                  
                <div class="after-add-more field_wrapper">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group mb-4">
                                <label for="name" class="col-sm- control-label">Exam Name<span>*</span><br/>(परीक्षा का नाम)<span>*</span></label>
                  
                                <input type="text" id="exam_name" name="exam_name" readonly class="form-control" placeholder="subject line" value="<?= get_exam_name($exam[0]['exam_name'])?>">

                                <!-- <select name="exam_name" class="form-control" id="exam_name">

                                    <option value="">Select Exam Name(परीक्षा का नाम चुनें)</option>

                                    <?php
                                        // foreach ($exam as $k => $exam) { 
                                        //     if($exam->exam_hindi_name == ''){
                                        //         $examination_name = $exam->exam_name;
                                        //     }else{
                                        //         $examination_name = $exam->exam_name.'('.$exam->exam_hindi_name.')';
                                        //     }    
                                        ?>

                                    <option value="<?php //echo $exam->id ?>"><?php //echo $examination_name ?></option>

                                    <?php //} ?>

                                </select> -->
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-4">
                                <label for="name" class="col-sm- control-label">Start Date of exam <span>*</span><br/>(परीक्षा शुरू होने की तिथि)<span>*</span></label>
                                <!-- <input type="date" name="startdate" id="startdate" readonly class="form-control" placeholder="Subject" > -->
                                <input type="text" name="startdate" id="startdate" readonly class="form-control" placeholder="Subject" value="<?= date("d-m-Y", strtotime( $exam[0]['startdate']));?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-4">
                                <label for="name" class="col-sm- control-label">End Date of exam <span>*</span><br/>(परीक्षा की समाप्ति तिथि)<span>*</span></label>
                                <!-- <input type="date" id="end_date" name="enddate" readonly class="form-control" placeholder="Subject"> -->
                               
                                <input type="text" id="end_date" name="enddate" readonly class="form-control" placeholder="Subject"  value="<?= date("d-m-Y", strtotime( $exam[0]['enddate']));?>">
                            </div>
                        </div>
                        <div class="col-md-6">

                            <div class="form-group mb-4">
                                <label for="name" class="col-sm- control-label">Enter Letter/Email/Speed Post Number<span>*</span><br/>(पत्र/ईमेल/स्पीड पोस्ट नंबर दर्ज करें)<span>*</span></label>
                                <input type="text" id="speed_post" name="speedpost" class="form-control" placeholder="Enter Letter/Email/Speed Post Number(पत्र/ईमेल/स्पीड पोस्ट नंबर दर्ज करें)" value="<?= $exam[0]['speedpost']?>">
                            </div>

                        </div>
                        <div class="col-md-6">

                            <div class="form-group mb-4">

                                <label for="name" class="col-sm- control-label">Enter Subject Line of Letter<span>*</span><br/>(पत्र की विषय पंक्ति दर्ज करें)<span>*</span></label>

                                <input type="text" name="subjectline" id="subjectline" class="form-control" placeholder="Enter Subject Line of Letter(पत्र की विषय पंक्ति दर्ज करें)" value="<?= $exam[0]['subjectline']?>">

                            </div>

                        </div>
                        <div class="col-md-12">

                            <div class="form-group mb-4">

                                <label for="name" class="col-sm- control-label">
                                    Enter Your Name, Designation And Mobile number<span>*</span>
                                    <br/>
                                    (अपना नाम, पदनाम और मोबाइल नंबर दर्ज करें)<span>*</span>
                                </label>
                                <textarea class="form-control" id="name_designation_mobile" name="name_designation_mobile" rows="5" placeholder="Enter Your Name, Designation And Mobile number(अपना नाम, पदनाम और मोबाइल नंबर दर्ज करें)" style="height: auto !important;"><?= $exam[0]['name_designation_mobile']?></textarea>
                                <!-- <input type="text" name="name_designation_mobile" id="name_designation_mobile" class="form-control" placeholder="Enter Subject Line of Letter(पत्र की विषय पंक्ति दर्ज करें)"> -->
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-md-12" style="margin-left:20px;    margin-left: 5px;display: none;">

                            <div class="form-group">

                                <label for="name" class="col-sm- control-label ">Subject Name<i
                                        style="color:#ff0000; font-size:12px;">*</i></label>
                                <br>
                                <!-- <input type="text" name="sub_name[]" class="form-control"  placeholder="Subject Name" > -->

                                <select name="sub_name[]" class="form-control sub_name" id="sub_name"
                                    style="width:150px;">

                                    <option value="">Select Subject</option>

                                    <?php
                        $b = $subject;

                        foreach ($subject as $k => $subject) { 
                            if($subject->sub_name_hindi != ''){
                                $examination_name = $subject->sub_name;
                            }else{
                                $examination_name = $subject->exam_name.'('.$subject->exam_hindi_name.')';
                            }    
                        ?>

                                    <option value="<?= $subject->id ?>"><?php echo $examination_name; ?></option>

                                    <?php }
                        ?>

                                </select>

                            </div>

                        </div>





                        <script>
                        $(document).ready(function() {


                            var x = 1; //Initial field counter is 1    

                            var maxField = 10; //Input fields increment limitation

                            var addButton = $('.add-more'); //Add button selector

                            var wrapper = $('.field_wrapper'); //Input field wrapper

                            var fieldHTML = '<div id="' + x +
                                '"> <div class="after-add-more field_wrapper"> <div class="row"> <div class="col-md-1.5" style="margin-left:5px; "value", px;"> <div class="form-group"> <label for="name" class="col-sm- control-label" >Subject Name </label> <br><select name="sub_name[]" class="form-control sub_name" id="sub_name" style="width:150px;"> <option value="">Select Subject</option> <?php foreach (
       $b as $k => $subjects) { ?> <option value="<?php echo $subjects->id; ?>" ><?php echo $subjects->sub_code; ?></option> <?php } ?> </select> </div></div><div class="class="col-md-1.5" style="margin-left:20px;"> <div class="form-group"><label for="name" class="col-sm- control-label">No. of Candidate</label> <input type="text" name="no_candidate[]"style="width:140px;" class="form-control" placeholder="No. of Candidate"/></div></div><div class="col-md-1.5" style="margin-left:20px;"> <div class="form-group"><label for="name" class="col-sm- control-label">Exam Date</label> <input type="date" name="date_exam[]" class="form-control abc " id="date_exam1" style="width:150px;" placeholder="Number of Candidate"/></div></div><div class=col-md-1.5"  style="margin-left:20px;"> <div class="form-group"> <label for="name" class="col-sm- control-label">Exam Shift </label><br> <select  class="form-control" name="shft_exam[]" style="width:140px;" class="" id="shft_exam"> <option value="">Select</option> <option value="Morning">Morning</option> <option value="Evening">Evening</option> </select> </div></div><div class="col-md-2.5" style="margin-left:20px;"> <div class="form-group"><label for="name" class="col-sm- control-label">Exam Time </label> <input type="text" style="width:90%;" name="time_exam[]" class="form-control" id="time_exam" placeholder="Exam Time"/></div></div><a class="btn btn-danger remove_button" style="height:40px ; margin-top:30px; margin-left:7px; padding:12px; text-align:center; color:white; font-weight:bolder;"> - </a> </div></div></div>';



                            $(addButton).click(function() {

                                if (x < maxField) {

                                    x++;

                                    $(wrapper).append(fieldHTML); //Add field html      

                                }

                            });

                            $(wrapper).on('click', '.remove_button', function(e) {

                                e.preventDefault();

                                $(this).parent('div').remove(); //Remove field html

                                x--; //Decrement field counter

                            });
                            var dtToday = new Date();
                            // alert(dtToday);
                            var month = dtToday.getMonth() + 1; // getMonth() is zero-based
                            var day = dtToday.getDate();
                            var year = dtToday.getFullYear();
                            if (month < 10)
                                month = '0' + month.toString();
                            if (day < 10)
                                day = '0' + day.toString();

                            var maxDate = year + '-' + month + '-' + day;
                            $('.abc').attr('min', maxDate);

                        });
                        </script>

                        <div class="col-md-1.5" style="margin-left:20px; display: none;">

                            <div class="form-group">

                                <label for="name" class="col-sm- control-label">No. of Candidate<i
                                        style="color:#ff0000; font-size:12px;">*</i></label>

                                <input type="text" style="width:140px;display: none;" name="no_candidate[]"
                                    id="no_candidate" class="form-control" placeholder="No. of Candidate"
                                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">

                            </div>
                            <div id="a"></div>
                        </div>

                        <div class="col-md-1.5" style="margin-left:20px;display: none;">

                            <div class="form-group">

                                <label for="name" class="col-sm- control-label">Exam Date<i
                                        style="color:#ff0000; font-size:12px;">*</i></label>

                                <input type="date" name="date_exam[]" class="form-control" id="date_exam"
                                    placeholder="Number of Candidate" style="width:150px;">

                            </div>

                        </div>

                        <div class="col-md-1.5" style="margin-left:20px; display: none;">

                            <div class="form-group">

                                <label for="name" class="col-sm- control-label">Exam Shift<i
                                        style="color:#ff0000; font-size:12px;">*</i></label>
                                <!-- <input type="text" name="shft_exam[]" class="form-control" id="shft_exam" placeholder="Shift of Exam" > -->
                                <!-- <br/> -->
                                <select name="shft_exam[]" class="form-control" id="shft_exam" style="width:140px;">
                                    <option value="">Select</option>
                                    <option value="Morning">Morning</option>
                                    <option value="Evening">Evening</option>
                                </select>

                            </div>

                        </div>

                        <div class="col-md-2.5" style="margin-left:20px; display: none;">

                            <div class="form-group">

                                <label for="name" class="col-sm- control-label">Exam Time<i
                                        style="color:#ff0000; font-size:12px;">*</i></label>

                                <input type="text" name="time_exam[]" class="form-control" id="time_exam"
                                    placeholder="Exam Time" style="width:90%;">

                            </div>

                        </div>



                        <div class="col-md-1" style="display: none;">

                            <div class="form-group change">

                                <label for=""><br/></label><br />

                                <a class="btn btn-success add-more"
                                    style="margin-top: 0px;height:40px; padding: 10px; text-align: center; color: white; text-overflow: initial; font-weight: bold;">+
                                </a>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="d-flex">
                            <div class="form-group mb-0">
                                <!-- <input type="submit" name="submit" value="Update Admin" class="btn btn-primary pull-right"> -->
                                <input type="button" onclick="window.history.go(-1)" class="btn btn-sec mr-4" value="Back"></input>
                            </div>
                            <div class="form-group mb-0">
                                <input type="hidden" name="user_id" class="form-control" id="user_id" value="<?= $exam[0]['id']?>">
                                <input type="submit" name="submit" value="Update " class="btn btn-primary pull-center">
                            </div>

                        </div>
                    </div>
                </div>

                <?php echo form_close(); ?>

            </div>



        </div>

    </section>

</div>


<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<script>
$("#country").addClass('active');

$(document).ready(function() {



    $("#xin-form")["submit"](function(d) {

        if ($("#exam_name").val() === "") {

            alert("Please fill 'Exam Name'\n(कृपया 'परीक्षा का नाम' भरें");
            $("#exam_name").focus();
            return false;

        }
        
        if ($("#startdate").val() === "") {

            alert("Please fill 'Start Date'\n(कृपया 'आरंभ तिथि' भरें");
            $("#startdate").focus();
            return false;

        }
        
        if ($("#end_date").val() === "") {

            alert("Please fill 'End Date'\n(कृपया 'समाप्ति तिथि' भरें");
            $("#end_date").focus();
            return false;

        }
        
        if ($("#speed_post").val() === "") {

            alert("Please fill 'Enter Letter/Email/Speed Post Number'\n(कृपया 'पत्र/ईमेल/स्पीड पोस्ट नंबर' भरें");
            $("#speed_post").focus();
            return false;

        }
        
        if ($("#subjectline").val() === "") {

            alert("Please fill 'Enter Subject Line of Letter'\n(कृपया 'पत्र की विषय पंक्ति' भरें");
            $("#subjectline").focus();
            return false;

        }
        
        // if ($("#name_designation_mobile").val() === "") {

        //     alert("Please fill 'Enter Your Name, Designation And Mobile number'\n(कृपया 'अपना नाम, पदनाम और मोबाइल नंबर दर्ज करें' भरें");
        //     $("#name_designation_mobile").focus();
        //     return false;

        // }

        if($("#name_designation_mobile").val().trim().length < 1)
        {
            alert("Please fill 'Enter Your Name, Designation And Mobile number'\n(कृपया 'अपना नाम, पदनाम और मोबाइल नंबर दर्ज करें' भरें");
            $("#name_designation_mobile").focus();
            return false;
        }

        // if ($("#sub_name").val() === "") {

        //     alert("Please fill 'Subject Name' \n(कृपया 'विषय का नाम' भरें");

        //     $("#sub_name").focus();

        //     return false;

        // }
        
        

        // if ($("#no_candidate").val() === "") {

        //     alert("Please fill 'Number Candidate' \n(कृपया 'नंबर उम्मीदवार' भरें");

        //     $("#no_candidate").focus();

        //     return false;

        // }

        // if ($("#date_exam").val() === "") {

        //     alert("Please fill 'Date Exam'\n(कृपया 'तिथि परीक्षा' भरें");

        //     $("#date_exam").focus();

        //     return false;

        // }

        // if ($("#shft_exam").val() === '') {

        //     alert("Please fill 'Shft Exam'\n(कृपया 'शिफ्ट परीक्षा' भरें");

        //     $("#shft_exam").focus();

        //     return false;

        // }

        // if ($("#time_exam").val() === "") {

        //     alert("Please fill 'Time Exam'\n(कृपया 'समय परीक्षा' भरें");

        //     $("#time_exam").focus();

        //     return false;

        // }

        // if ($("#sub_name_hindi").val() === "") {

        //     alert("Please fill 'Subject Name Hindi");

        //     $("#sub_name_hindi").focus();

        //     return false;

        // }

    });
    $("#xin-form").validate();

});
</script>
<script>
var dtToday = new Date();
// alert(dtToday);
var month = dtToday.getMonth() + 1; // getMonth() is zero-based
var day = dtToday.getDate();
var year = dtToday.getFullYear();
if (month < 10)
    month = '0' + month.toString();
if (day < 10)
    day = '0' + day.toString();

var maxDate = year + '-' + month + '-' + day;
$('.date_disable').attr('min', maxDate);

$("#exam_name").change(function() {
    var id = $('select[name=exam_name]').val();
    var url = "<?php echo base_url('admin/examshedule_schedule/fetch_examname_data/');?>"
    // alert(id); 
    $.ajax({
        url: url + id,
        type: 'get',
        dataType: 'json',
        data: {
            id: id
        },
        success: function(data) {

            // $('#no_candidate').val(data.no_of_cand); 
            $('#startdate').val(data.start_date_exam);
            $('#end_date').val(data.end_date_exam);
            // alert(data.id)

        }
    });
});
    // $('document').ready(function() {
    //     $('textarea').each(function() {
    //         $(this).val($(this).val().trim());
    //     });
    // });
</script>