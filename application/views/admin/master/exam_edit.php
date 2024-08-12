
<div class="content-wrapper">
    <section class="content">
        <div class="card">
            <div class="card-header">
                <div class="d-inline-block">
                    <h3 class="card-title"><i class="fa fa-plus"></i>&nbsp; Edit Exam&nbsp;(परीक्षा संपादित करें)</h3>
                </div>
                <div class="d-inline-block float-right">
                    <a href="<?= base_url('admin/master/exam_list'); ?>" class="btn btn-admin"><i class="fa fa-list"></i>&nbsp; Exam List&nbsp;(परीक्षा सूची)</a>
                </div>
            </div>
            <div class="card-body">

                <?php echo validation_errors(); ?>           
              
              <?php echo form_open_multipart(base_url('admin/master/exam_edit/' .urlencrypt($admin['id'])), 'id="xin-form" class="form-horizontal" ')?>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="name" class="col-sm- control-label">Exam English Name&nbsp;(परीक्षा अंग्रेजी नाम)<i style="color:#ff0000; font-size:12px;">*</i></label>
                            <input type="text" style="text-transform: capitalize;" name="exam_name" class="form-control" id="exam_name" placeholder="Exam Name"  value="<?php echo $admin['exam_name'];?>" >
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="name" class="col-sm- control-label">Exam Hindi Name&nbsp;(परीक्षा हिंदी नाम)<i style="color:#ff0000; font-size:12px;">*</i></label>
                            <input type="text"style="text-transform: capitalize;" name="exam_hindi_name" class="form-control" id="exam_hindi_name" placeholder="Exam Hindi Name" value="<?php echo $admin['exam_hindi_name'];?>">

                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="name" class="col-sm- control-label">Advertisement Number&nbsp;(विज्ञापन संख्या)<i style="color:#ff0000; font-size:12px;">*</i></label>
                            <input type="text"style="text-transform: capitalize;" name="advertise_name" class="form-control" id="advertise_name" placeholder="Advertisement Number/Number" value="<?php echo $admin['advertise_name'];?>" >
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="name" class="col-sm- control-label">No of Candidates&nbsp;(उम्मीदवारों की संख्या)<i style="color:#ff0000; font-size:12px;">*</i></label>
                            <input type="text" style="text-transform: capitalize;" name="no_of_cand" class="form-control" value="<?php echo $admin['no_of_cand'];?>" id="no_of_cand" placeholder="No of Candidates" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="name" class="col-sm- control-label">Start Date&nbsp;(आरंभ करने की तिथि)<i style="color:#ff0000; font-size:12px;">*</i></label>
                            <input type="date" value="<?php echo $admin['start_date_exam'];?>" name="start_date_exam" class="form-control date_disable" id="start_date_exam" placeholder=""  >
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="form-group">
                            <label for="name" class="col-sm- control-label">End Date&nbsp;(अंतिम तिथि)<i style="color:#ff0000; font-size:12px;">*</i></label>
                            <input type="date" value="<?php echo $admin['end_date_exam'];?>" name="end_date_exam" class="form-control date_disable" id="end_date_exam" placeholder="">
                        </div>
                    </div> 
                    <div class="col-12">
                        <div class="d-flex">
                            <div class="form-group mb-0" >
                                <input type="button" onclick="window.history.go(-1)" class="btn btn-sec mr-4" value="Back&nbsp;(पीछे)"></input>
                            </div>
        
                            <div class="form-group mb-0">
                                <input type="submit" name="submit" value="Update&nbsp;(नवीनतम बनाना)" class="btn btn-primary">
                            </div>

                        </div>
                    </div>
                </div>
                <!-- <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="name" class="col-sm- control-label">Start Date</label>
                            <input type="date" style="text-transform: capitalize;" value="<?php echo $admin['start_date_exam'];?>" name="start_date_exam" class="form-control" id="start_date_exam" placeholder=""  >
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="name" class="col-sm- control-label">End Date</label>
                            <input type="date"style="text-transform: capitalize;" value="<?php echo $admin['end_date_exam'];?>" name="end_date_exam" class="form-control" id="end_date_exam" placeholder="">
                        </div>
                    </div>                   
                </div> -->
                <div class="row">
                    
                </div>
                <!-- <div class="row">
                    <div class="col-md-12">
                        <input type="button" onclick="window.history.go(-1)" class="btn btn-primary " value="Back&nbsp;(पीछे)"></input>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="submit" name="submit" value="Update&nbsp;(नवीनतम बनाना)" class="btn btn-info pull-right">
                        </div>
                    </div>
                </div> -->
     <?php echo form_close(); ?>
            </div>

        </div>
    </section> 
</div>

<script>
    $("#country").addClass('active');
    $(document).ready(function () {
    
        var dtToday = new Date();
        // alert(dtToday);
        var month = dtToday.getMonth() + 1;     // getMonth() is zero-based
        var day = dtToday.getDate();
        var year = dtToday.getFullYear();
        if(month < 10)
        month = '0' + month.toString();
        if(day < 10)
        day = '0' + day.toString();

        var maxDate = year + '-' + month + '-' + day;
        $('.date_disable').attr('min', maxDate);

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

        $("#xin-form")["submit"](function(d){

            if ($("#exam_name").val() === "") {

                alert("Please fill 'Exam English Name'\nकृपया 'परीक्षा अंग्रेजी नाम' भरें");
                $("#exam_name").focus();
                return false;

            }

            if ($("#exam_hindi_name").val() === "") {

                alert("Please fill 'Exam Hindi Name'\nकृपया 'परीक्षा हिंदी नाम' भरें");
                $("#exam_hindi_name").focus();
                return false;

            }

            if ($("#advertise_name").val() === "") {

                alert("Please fill 'Advertise Name'\nकृपया 'विज्ञापन नाम' भरें");
                $("#advertise_name").focus();
                return false;

            }

            if ($("#no_of_cand").val() === "") {

                alert("Please fill 'No of Candidates'\nकृपया 'उम्मीदवारों की संख्या' भरें");
                $("#no_of_cand").focus();
                return false;

            }

            if ($("#start_date_exam").val() === "") {

                alert("Please Select 'Start Date'\nकृपया 'आरंभ तिथि' चुनें");
                $("#start_date_exam").focus();
                return false;

            }

            if ($("#end_date_exam").val() === "") {

                alert("Please Select 'End Date'\nकृपया 'अंतिम तिथि' चुनें");
                $("#end_date_exam").focus();
                return false;

            }

        });

    });
</script>