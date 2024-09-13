<div class="content-wrapper">
  <section class="content">
    <div class="card">
      <div class="card-header">
        <div class="d-inline-block">
          <h3 class="card-title">
            <i class="fa fa-plus"></i>&nbsp; Add Candidates&nbsp;(उम्मीदवार जोड़ें)
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
        <!-- <//?php echo form_open_multipart(base_url('admin/master/candidate_add'), 'id="xin-form-update"  class="form-horizontal"'); ?> <div> -->
        <form id="xin-form-add" class="form-horizontal">  
            <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <input type="text" hidden id="totalCounts" value="" class="form-control" />
                <label for="name" class="col-sm- control-label">Exam Name <br />परीक्षा का नाम <i style="color:#ff0000; font-size:12px;">*</i>
                </label>
                <select name="exam_name" class="form-control" id="exam_name">
                  <option value="">Select Exam Name</option> <?php
                    foreach ($exam as $k => $exam) {
                        if ($exam->exam_hindi_name == '') {
                            $examination_name = $exam->exam_name;
                        } else {
                            $examination_name = $exam->exam_name . '(' . $exam->exam_hindi_name . ')';
                        }
                        ?> 
                        <option value="<?= $exam->id ?>"> <?= $examination_name ?> </option>
                     <?php } ?>
                </select>
              </div>
            </div>
            <div class="col-md-2">
              <div class="form-group has-feedback">
                <label>District <br />जिला <span>*</span>
                </label>
                <select class="state form-control" name="state[]" id="state">
                  <option value="">Select District</option> 
                    <?php foreach ($states as $k => $state) { ?> 
                        <option value="<?= $state->id ?>"> <?= $state->name ?> </option> 
                    <?php } ?>
                </select>
              </div>
            </div>
            <div class="col-md-2">
              <div class="form-group">
                <label for="name" class="col-sm-control-label">District Code <br />जिला कोड <span>*</span>
                </label>
                <input type="text" id="district_code" name="district_code[]" class="form-control" placeholder="District Code">
              </div>
            </div>
            <div class="col-md-2">
              <div class="form-group has-feedback ">
                <label>City <br />शहर <span>*</span>
                </label>
                <select class="citymain form-control" name="city[]" id="city">
                  <option value=""> Select City</option>
                </select>
              </div>
            </div>
            <div class="col-md-1">
              <div class="form-group">
                <label for="name" class="col-sm- control-label">City Code <br />शहर कोड <span>*</span>
                </label>
                <input type="text" id="city_code" name="city_code[]" class="form-control" placeholder="City Code">
              </div>
            </div>
            <div class="col-md-2">
              <div class="form-group has-feedback">
                <label for="name" class="control-label">Subject Name <br />विषय नाम <span>*</span>
                </label>
                <select name="sub_name[]" class="form-control sub_name" id="sub_name">
                  <option value="">Select Subject</option>
                </select>
              </div>
            </div>
            <div class="col-md-2">
              <div class="form-group">
                <label for="name" class="col-sm- control-label">Number of Candidates <br />संबंधित की संख्या <span>*</span>
                </label>
                <input type="number" id="number_of_can" name="number_of_can[]" min=1 class="form-control number_of_can" placeholder="Number of Candidates">
              </div>
            </div>
            <div class="col-md-1 text-right">
              <a class="btn btn-success add-more" style="margin-top: 56px;height:32px; padding: 0 8px; text-align: center; color: white; text-overflow: initial; font-size: 19px;">
                <i class="fa fa-plus"></i>
              </a>
            </div>
            <div class="after-add-more field_wrapper  col-md-12"></div>
            <div class="col-md-12">
              <div class="d-flex">
                <div class="form-group mb-0">
                  <input type="button" style="margin-top:25px; " onclick="window.history.go(-1)" class="btn btn-sec" value="Back"></input>
                </div>
                <div class="form-group mb-0" style="margin-left:25px;">
                  <input type="submit" name="submit" style="margin-top:25px;" value="Add Candidates" class="btn btn-primary">
                </div>
              </div>
            </div>
          </div>
        <!-- </div> <//?php echo form_close(); ?> </div> -->
        </form>
    </div>
  </section>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
<script>
    $('document').ready(function() {
        $('#xin-form-add').on('submit', function(e) {
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
                    url: "<?php echo base_url('admin/master/candidateAdd'); ?>",  // URL of the server-side script
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
                               location.reload();
                           },500);
                        }else{
                           toastr.error(response.message);
                           setTimeout(function(){
                              $("#overlay").fadeOut(300);
                           },500);
                           setInterval(() => {
                              location.reload();
                           },500);
                        }
                    },
                    error: function(response) {
                        setTimeout(function(){
                              $("#overlay").fadeOut(300);
                           },500);
                        // Handle errors
                        toastr.error('An error occurred. Please try again.');
                    }
                });
               }
            });

        // valiation 

        const subjects = JSON.parse('<?php echo json_encode($subject); ?>' || [])
        // $("#xin-form-update")["submit"](function(d) {
        //     if ($("#exam_name").val() === "") {
        //         alert("Please fill 'Exam Name'\nकृपया 'परीक्षा का नाम' भरें");
        //         $("#exam_name").focus();
        //         return false;
        //     }



        //     if ($("#state").val() === "") {
        //         alert("Please fill 'District'\n(कृपया 'ज़िला' भरें)");
        //         $("#state").focus();
        //         return false;
        //     }
        //     if ($("#district_code").val() === "") {
        //         alert("Please fill 'District Code'\n(कृपया 'जिला कोड' भरें)");
        //         $("#district_code").focus();
        //         return false;

        //     }
        //     if ($("#city").val() === "") {
        //         alert("Please fill 'city'\n(कृपया 'सिटी' भरें)");
        //         $("#city").focus();
        //         return false;
        //     }
        //     if ($("#city_code").val() === "") {
        //         alert("Please fill 'City Code'\n(कृपया 'सिटी कोड' भरें)");
        //         $("#city_code").focus();
        //         return false;
        //     }
        //     if ($("#sub_name").val() === "") {
        //         alert("Please fill 'Subject Name'\n(कृपया 'विषय नाम*' भरें)");
        //         $("#sub_name").focus();
        //         return false;

        //     }

        //     if ($("#number_of_can").val() === "") {
        //         alert("Please fill 'Number of Candidates'\n(कृपया 'उम्मीदवारों की संख्या' भरें)");
        //         $("#number_of_can").focus();
        //         return false;
        //     }

        //     var sum = 0;
        //     $('.number_of_can').each(function() {
        //         sum += parseFloat(this.value);
        //     });
        //     let total_studentCount =  $('#totalCounts').val();
        //     if(sum>Number(total_studentCount)){
        //         alert(`Number of Candidate should be less then or equal ${total_studentCount.trim()}`);
        //         return false;
        //     }
         

        // });

        // Exam Change

        $("#exam_name").change(function() {

            var id = $('select[name=exam_name]').val();
           

            document.cookie = `exam_id=${$('select[name=exam_name]').val()}`;

            var url = "<?php echo base_url('admin/Examshedule_schedule/getSubjectNameNew/'); ?>"

            // 22-09-2022

            $.ajax({

                url: url,

                type: 'get',

                dataType: 'html',

                data: {
                    'exam_id': id,
                    'csfr_token_name': csfr_token_value
                },

                success: function(data) {

                    $('.sub_name').html(data);
                    var urlTotalCount = "<?php echo base_url('admin/Examshedule_schedule/totalCountNumber/'); ?>";

                    $.ajax({

                        url: urlTotalCount,

                        type: 'get',

                        data: {
                            'exam_id': id,
                            'csfr_token_name': csfr_token_value
                        },

                        success: function(count) {

                            $('#totalCounts').val(count);

                        }

                    });


                }

            });

        });

        // 


        $('#state').change(function() {

            var district_id = $(this).val();

            if (district_id != '') {

                $.ajax({

                    type: "POST",

                    url: base_url + 'admin/location/get_city_by_state_id',

                    dataType: 'html',

                    "processing": true,

                    "serverSide": false,

                    data: {
                        'district_id': district_id,
                        'csfr_token_name': csfr_token_value
                    },

                    success: function(data) {

                        // console.log(data);

                        $('#city').html(data);

                    }

                });

            } else {



                $('#state').val('').hide();

                // $('#othstate').show();

            }

        });

        //

        var x = 1; //Initial field counter is 1    

        var maxField = 100; //Input fields increment limitation

        var addButton = $('.add-more'); //Add button selector

        var wrapper = $('.field_wrapper'); //Input field wrapper


        $(addButton).click(function() {

            var id = $('select[name=exam_name]').val();

            if (id) {

                const count = $('div[class="after-add-more field_wrapper count"]').length || 0



                // console.log(subjects,id)
                if ((count + 1) < maxField) {

                    var fieldHTML = '<div id="' + x + '"><div class="after-add-more field_wrapper count"><div class="row"><div class="col-md-2"><div class="form-group"><label for="name" class="col-sm- control-label">District<i style="color:#ff0000; font-size:12px;">*</i></label> <select class="state form-control" name="state[]" id="state' + x + '" onchange="getval(this,' + x + ');"><option value="">Select District</option><?php foreach ($states as $k => $state) { ?><option value="<?= $state->id ?>"><?= $state->name ?></option><?php } ?></select></div></div><div class="col-md-2"><div class="form-group"><label for="name" class="col-sm- control-label">District Code<i style="color:#ff0000; font-size:12px;">*</i></label> <input type="text" name="district_code[]" id="district_code' + x + '" min=1 class="form-control" required placeholder="District Code"/></div></div><div class="col-md-2"><div class="form-group"><label for="name" class="col-sm- control-label">City<i style="color:#ff0000; font-size:12px;">*</i></label> <select name="city[]" id="city' + x + '" class="form-control"><option value=""> Select City</option></select></div></div><div class="col-md-1"><div class="form-group"><label for="name" class="col-sm- control-label">City Code<i style="color:#ff0000; font-size:12px;">*</i></label> <input type="text" name="city_code[]" id="city_code' + x + '" min=1 class="form-control" required placeholder="City Code"/></div></div><div class="col-md-2"><div class="form-group"><label for="name" class="col-sm- control-label">Subject Name <i style="color:#ff0000; font-size:12px;">*</i></label> <br/><select name="sub_name[]" class="form-control sub_name" id="sub_name' + x + '" required><option value="">Select Subject</option>'

                    subjects.forEach((sub) => {
                        if (sub.exam_id == id) {
                            fieldHTML += `<option value="${sub.id}" >${sub.sub_name}(${sub.sub_name_hindi})</option>`
                        }
                    })
                    fieldHTML += '</select></div></div><div class="col-md-2"><div class="form-group"><label for="name" class="col-sm- control-label">No. of Candidate<i style="color:#ff0000; font-size:12px;">*</i></label> <input type="number" name="number_of_can[]" id="number_of_can' + x + '" min=1 class="form-control number_of_can" required placeholder="No. of Candidate"/></div></div><div class="col-md-1 text-right"><a class="btn btn-danger remove_button" style="margin-top: 33px;height:28px; padding: 0 8px; text-align: center; color: white; text-overflow: initial; font-size: 19px;"><i class="fa fa-minus"></i></a></div></div> </div>';

                    x++;

                    $(wrapper).append(fieldHTML); //Add field html      

                }

            } else {

                alert('Please first select the exam')

            }



        });



        $(wrapper).on('click', '.remove_button', function(e) {



            e.preventDefault();

            $(this).parent('div').parent('div').parent('div').parent('div').remove(); //Remove field html

            // x--; //Decrement field counter

        });

    });

    function getval(sel, id) {

        var district_id = sel.value;

        if (district_id != '') {



            $.ajax({

                type: "POST",

                url: base_url + 'admin/location/get_city_by_state_id',

                dataType: 'html',

                data: {
                    'district_id': district_id,
                    'csfr_token_name': csfr_token_value
                },

                success: function(data) {

                    $('#city' + id).html(data);

                }

            });

        } else {

            // $('#state'+id).val('').hide();

            // $('#othstate').show();

        }

    }
</script>