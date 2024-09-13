<?php // echo '<pre>'; print_r($admin['city']);exit;?> 
<?php // echo '<pre>'; print_r($sub_info);exit;?> 
<div class="content-wrapper">
  <section class="content">
    <div class="card">
      <div class="card-header">
        <div class="d-inline-block">
          <h3 class="card-title">
            <i class="fa fa-plus"></i>&nbsp;Edit Candidate&nbsp;(उम्मीदवार संपादित करें)
          </h3>
        </div>
        <div class="d-inline-block float-right"></div>
      </div>
      <div class="card-body"> 
            <div id="overlay">
               <div class="cv-spinner">
                  <span class="spinner"></span>
               </div>
            </div>
        <?php echo validation_errors(); ?> 
        <!-- <//?php echo form_open_multipart(base_url('admin/master/candidate_edit/' . urlencrypt($admin['id'])), 'id="xin-form" class="form-horizontal" ') ?> <div class="after-add-more field_wrapper"> -->
        <form id="xin-form-update" class="form-horizontal"> 
            <div class="row">
            <div class="col-md-12 mb-4">
              <div class="form-group">
                <label for="name" class="col-sm- control-label">Exam Name <br />परीक्षा का नाम </label>
                <input type="text" readonly id="exam_name" name="exam_name" class="form-control" maxlength="4" value="<?php echo get_exam_name($admin['exam_name']); ?>" placeholder="">
                <input type="hidden" id="exam_name_id" name="exam_name_id" value="<?php echo get_exam_nameID($admin['exam_name']); ?>">
              </div>
            </div> <?php foreach ($sub_info as $value) {?> <div class="form-group has-feedback col-md-2">
              <label>District <br />जिला </label>
              <input type="text" readonly id="state" name="state" class="form-control" maxlength="4" value="<?php echo get_district_name($value['state_array']); ?>" placeholder="">
            </div>
            <div class="col-md-2">
              <div class="form-group">
                <label for="name" class="col-sm- control-label">District Code <br />जिला कोड </label>
                <input type="text" id="district_code" name="district_code[]" class="form-control" maxlength="4" value="<?php echo $value['district_code_array']; ?>" placeholder="">
              </div>
            </div>
            <div class="form-group has-feedback col-md-2">
              <label>City <br />शहर </label>
              <input type="text" readonly id="state" name="state" class="form-control" maxlength="4" value="<?php echo get_subcity_name($value['city_array']); ?>" placeholder="">
            </div>
            <div class="col-md-2">
              <div class="form-group">
                <label for="name" class="col-sm- control-label">City Code <br />शहर कोड </label>
                <input type="text" id="city_code" name="city_code[]" class="form-control" maxlength="4" value="<?php echo $value['city_code_array']; ?>" placeholder="">
              </div>
            </div>
            <div class="col-md-2">
              <div class="form-group">
                <label for="name" class="col-sm- control-label">Number of Candidates <br />संबंधित की संख्या <span>*</span>
                </label>
                <input type="number" id="number_of_can" min=1 name="number_of_can[]" class="form-control" maxlength="4" value="<?php echo $value['number_of_can_array']; ?>" placeholder="">
              </div>
            </div>
            <div class="col-md-2">
              <div class="form-group">
                <label for="name" class="control-label">Subject Name <br />विषय नाम <span>*</span>
                </label>
                <select name="sub_name[]" class="form-control sub_name" id="sub_name">
                    <?php foreach($subjects as $sub){ ?> 
                        <option value="<?php echo $sub['id']?>" <?php echo $value['sub_name_array']==$sub['id']?'selected':'' ?>> <?php echo $sub['sub_name']?> </option> 
                    <?php }?> 
                </select>
              </div>
            </div> <?php } ?> <div class="col-md-12">
              <div class="form-group mb-0">
                <input type="button" onclick="window.history.go(-1)" class="btn btn-sec" style="margin-top:25px;" value="Back"></input>
                <input type="submit" name="submit" style="margin-top:25px;" value="Update " class="btn btn-primary pull-center">
              </div>
            </div>
          </div>
        </div>
         <!-- <//?php echo form_close(); ?>  -->
        </form>
        </div>
    </div>
  </section>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
<script>
$("#country").addClass('active');
    $(document).ready(function() {
        $('#xin-form-update').on('submit', function(e) {
            e.preventDefault();
            if($("#exam_name").val() === "") {
            toastr.error('Please Select Exam Name कृपया परीक्षा का नाम चुनें');
            }else if($("#state").val() === "") {
                toastr.error('Please fill state कृपया राज्य भरें');
            }else if($("#district_code").val() === "") {
                toastr.error('Please fill District Code कृपया जिला का कोड भरें');
            }else if($("#city").val() === "") {
                toastr.error('Please fill city कृपया शहर भरें');
            }else if($("#city_code").val() === "") {
                toastr.error('Please fill city Code कृपया शहर का कोड भरें');
            }else if($("#sub_name").val() === "") {
                toastr.error('Please fill Subject Name कृपया विषय का नाम भरें');
            }else if($("#number_of_can").val() === "") {
                toastr.error('Please fill No Candidate कृपया कोई उम्मीदवार नहीं भरें');
            }else{
                $("#overlay").fadeIn(300);　
                var formData = new FormData(this);
                $.ajax({
                    url: "<?php echo base_url('admin/master/candidateUpdate/'); ?><?php echo urlencrypt($admin['id']) ?>",  // URL of the server-side script
                    type: 'POST',            // Use POST method
                    data: formData,          // Pass the form data
                    contentType: false,      // Don't set any content-type header
                    processData: false,      // Don't process the data (especially for files)
                    success: function(response) {
                        // Handle the response
                        if(response.status == 'success'){
                            toastr.success(response.message);
                            setTimeout(function(){
                                $("#overlay").fadeOut(300);
                            },500);
                            setInterval(() => {
                                // location.reload();
                            },500);
                        }else{
                            toastr.error(response.message);
                            setTimeout(function(){
                                $("#overlay").fadeOut(300);
                            },500);
                            setInterval(() => {
                                //  location.reload();
                            },500);
                        }
                    },
                    error: function(response) {
                        // Handle errors
                        toastr.error('An error occurred. Please try again.');
                    }
                });
                }
            });
            
    $("#xin-form")["submit"](function(d) {



        if ($("#exam_name").val() === "") {



            alert("Please fill 'Exam Name'\nकृपया 'परीक्षा का नाम' भरें");



            $("#exam_name").focus();



            return false;



        }



        if ($("#state").val() === "") {



            alert("Please fill 'state'\n(कृपया 'राज्य' भरें)");



            $("#state").focus();



            return false;



        }



        if ($("#district_code").val() === "") {



            alert("Please fill 'District Code'\n(कृपया 'जिला कोड' भरें)");



            $("#district_code").focus();



            return false;



        }

        if ($("#city").val() === "") {



            alert("Please fill 'city'\n(कृपया 'सिटी' भरें)");



            $("#city").focus();



            return false;



        }



        if ($("#city_code").val() === "") {



            alert("Please fill 'City Code'\n(कृपया 'सिटी कोड' भरें)");



            $("#city_code").focus();



            return false;



        }



        if ($("#number_of_can").val() === "") {



            alert("Please fill 'Number Of Can'\n(कृपया 'कैन की संख्या' भरें)");



            $("#number_of_can").focus();



            return false;



        }



    });



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



$(document).ready(function() {



    $(function() {

        $('#state').change(function() {

            var district_id = $(this).val();

            if (district_id != '') {

                $('#othstate').val('').hide();



                $.ajax({

                    type: "POST",

                    url: base_url + 'admin/location/get_city_by_state_id',

                    dataType: 'html',

                    data: {

                        'district_id': district_id,

                        'csfr_token_name': csfr_token_value

                    },

                    success: function(data) {

                        // $('#city').html(data);

                    }

                });

            } else {

                $('#state').val('').hide();

                $('#othstate').show();

            }

        });

    });

});
</script>