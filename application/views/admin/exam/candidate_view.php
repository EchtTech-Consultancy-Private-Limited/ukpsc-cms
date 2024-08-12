
<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/datatables/dataTables.bootstrap4.css"> 
<div class="content-wrapper">



    <section class="content">



        <div class="card">



            <div class="card-header">



                <div class="d-inline-block">



                    <h3 class="card-title">&nbsp; Candidate List &nbsp;(उम्मीदवार सूची)</h3>



                </div>



                <div class="d-inline-block float-right">





                </div>



            </div>



            <div class="card-body">







                <?php echo validation_errors(); ?>



                <?php echo form_open_multipart(base_url('admin/master/candidate_edit/' . urlencrypt($admin['id'])), 'id="xin-form" class="form-horizontal" ') ?>





                <div class="after-add-more field_wrapper">



                    <div class="row">

                        <div class="col-md-12 mb-4">



                            <div class="form-group d-flex align-items-center">



                                <h6 class="text-dark mr-3">

                                    <strong>Exam Name :- </strong>

                                    <br />परीक्षा का नाम

                                </h6>

                                    <br/>

                                <h2 class="text-bold" style="font-size: 30px; color: #373250;"><?php echo get_exam_name($admin['exam_name']); ?></h2>



                            </div>





                        </div>

                            <?php //echo '<pre>'; print_r($value);?>

                            

                            <div class="col-md-12">

                                <div class="table-responsive">

                                    <table id="candidateView" class="table table-bordered table-hover  " style="overflow: auto; border-collapse: collapse !important;">

                                        <thead>

                                            <tr>

                                                <th>S.No.</th>

                                                <th>

                                                    District 

                                                    <br>

                                                    जिला

                                                </th>

                                                <th>

                                                    District Code 

                                                    <br> 

                                                    जिला कोड

                                                </th>

                                                <th>

                                                    City 

                                                    <br>

                                                    शहर

                                                </th>

                                                <th>

                                                    City Code 

                                                    <br>

                                                    शहर कोड

                                                </th>

                                                <th>

                                                    Number of Candidates

                                                    <br>

                                                    संबंधित की संख्या

                                                </th>


                                                <th>

                                                    Subect Name

                                                    <br>

                                                    विषय नाम

                                                </th>

                                            </tr>

                                        </thead>

                                        <tbody>

                                            <?php 
                                         
                                                foreach ($sub_info as $key=> $value) {

                                            ?>

                                            <tr>

                                                <td><?php echo $key+1 ?></td>

                                                <td>

                                                    <?php echo get_district_name($value['state_array']); ?>

                                                </td>

                                                <td>

                                                    <?php echo $value['district_code_array']; ?>

                                                </td>

                                                <td>

                                                    <?php echo get_subcity_name($value['city_array']); ?>

                                                </td>

                                                <td>

                                                    <?php echo $value['city_code_array']; ?>

                                                </td>

                                                 <td>

                                                    <?php echo $value['number_of_can_array'];  ?>

                                                </td>

                                                <td>

                                                    <?php echo get_subject_name($value['subjectname']);  ?>

                                                </td>

                                            </tr>

                                            <?php } ?>

                                        </tbody>

                                    </table>

                                </div>

                            </div>

                        <div class="col-md-12 mt-4">

                            <div class="form-group mb-0">

                                <input type="button" onclick="window.history.go(-1)" class="btn btn-sec" value="Back"></input>

                                <!-- <input type="submit" name="submit" style="margin-top:25px; margin-left: 15px;" value="Update " class="btn btn-primary pull-center"> -->

                            </div>

                        </div>

                    </div>



                </div>







                <?php echo form_close(); ?>



            </div>







        </div>



    </section>



</div>




<script src="<?= base_url() ?>assets/plugins/datatables/jquery.dataTables.js"></script>

<script src="<?= base_url() ?>assets/plugins/datatables/dataTables.bootstrap4.js"></script>


<script>

var table = $('#candidateView').DataTable();

    $("#country").addClass('active');



    $(document).ready(function() {







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