<style>
.loader {
  border: 16px solid #e0e0e0;
  border-radius: 50%;
  border-top: 16px solid #373250;
  border-bottom: 16px solid #373250;
  width: 120px;
  height: 120px;
  -webkit-animation: spin 2s linear infinite; /* Safari */
  animation: spin 2s linear infinite;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(50%, 50%)
}

/* Safari */
@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
</style>
<div class="datalist">
    <div class="row">
       
       
        <div class="col-md-12">
            <!-- </div> -->
            <?php //if ($hideselectbutton=='ok') { ?>
            <div id="allcheckids" class="mb-5" style="">
                <div class="d-flex justify-centent-between align-items-center">
                    <div class="check-option">
                        <input type="button" class="select_all_count btn btn-success" id="select-all1"
                            value="Select All (सभी चुनें)">
                        <input type="button" class="select_all_uncheck btn btn-success" id="select-all1"
                            value="Uncheck (अनचेक)">
                    </div>
                    <div class="send-option">
                        <input type="button" class="btn btn-success" id="select_all"
                            onclick="return confirm('Are you sure want to send all invitation?\nक्या आप वाकई सभी आमंत्रण भेजना चाहते हैं?')"
                            value="Send to All (सभी को भेजो)">
                        <input type="button" class="btn btn-success" id="select_single_count"
                            onclick="return confirm('Are you sure want to send select user invitation?\nक्या आप वाकई चुनिंदा उपयोगकर्ता आमंत्रण भेजना चाहते हैं?')"
                            value="Send to Selected (चयनित को भेजें)">
                    </div>
                </div>
                <?php //} ?>
            </div>
        </div>
        <div class="col-md-12">
            <div class="table-responsive">
            <table id="allocationTablesend1" class="table table-bordered table-hover dataTable no-footer"
                style="border-collapse: collapse !important;">
                <thead>
                    <tr>
                        <th>S.No.</th>
                        <th>Examination Center Name</th>
                        <th>Consent recieved</th>
                        <th>Examination Center code</th>

                        <?php foreach ($date_exam as $key1 => $date) {?>
                        <th>
                            <?php echo date("d-m-Y", strtotime($date)); ?>
                            <br>
                            (
                            <?php echo $shft_exam[$key1]?>)
                        </th>


                        <?php } ?>

                        <th>
                            <?= trans('action') ?>
                        </th>
                    </tr>


                </thead>
                <tbody>

                    <?php
             
                $i = 1;
                foreach ($info as $row):
                    $admin_role_id = $this->session->userdata('admin_role_id');
                    $admin_id = $this->session->userdata('admin_id');
                //     if (($admin_role_id != 6) && ((in_array($row['file_movement'], array(1))) )) {
                //         continue;
                //   }   
           
          ?>

                    <tr>

                        <td>
                            <?= $i ?>
                        </td>

                        <td>
                            <?php echo $row['school_name'] ?>
                            <input hidden type="text" id="school_id_new<?php echo $i?>"
                                name="school_id_new<?php echo $i?>" value="<?php echo $row['school_id']?>">
                        </td>
                        <td>
                            <?php echo $row['max_allocate_candidate'] ?>
                        </td>
                        <?php $getCenterCode = getCenterCode( $row['school_id'],$row['id']); 
                        
                        ?>
                        <td>
                        <?php echo isset($getCenterCode)?$getCenterCode:''?>
                        </td>

                        <input hidden type="text" id="candidate_value_count<?php echo $i?>"
                            value="<?php echo count($no_candidate)?>">
                        <input hidden type="text" id="admin_id<?php echo $i?>" name="admin_id"
                            value="<?php echo $row['admin_id']?>">

                        <input hidden type="text" id="exam_id" name="exam_id" value="<?php echo $row['id']?>">

                        <?php $candidateNo = getCandidateNumbers( $row['school_id'],$row['id']); ?>

                        <?php foreach ($no_candidate as $key => $value) { 
                            ?>
                        <td>
                        <?php echo isset($candidateNo[$key])?$candidateNo[$key]:''?>
                        </td>
                        <?php } ?>
                        <td>
                            <?php  if ($admin_role_id == 6 )  { ?>

                            </a>
                            <?php }  if ($admin_role_id == 5 )  { ?>

                            <!-- <button class="btn btn-success" onclick="formdataSubmit(<?php echo $i; ?>)"> Submit</button> -->
                            <div class="d-flex">
                                <input type="checkbox" id="a" onclick="getCount(<?php echo $row['school_id']?>)" class="allocation_user_ids mr-2" name="allocation_user_ids"
                                    rel="<?php echo $row['school_id']?>" value="<?php echo $row['school_id']?>">
                                <a title="Send Invitations" class="btn btn-success"
                                    onclick="single_send_allocation(<?php echo $row['school_id']?>)"> <i class="fa fa-paper-plane-o"></i></a>

                            </div>

                            <?php }
                if ($admin_role_id == 5 ) { ?>

                            <?php }
                        ?>

                        </td>
                    </tr>


                    <?php
                $i++;
                endforeach;
                ?>
                    <!-- <?php //echo form_close(); ?> -->
                </tbody>
            </table>
            </div>

        </div>
        <div class="loader d-none"></div>

    </div>
    <!-- Modal -->


</div>
<!-- DataTables -->

<script>
var table = $('#allocationTablesend1').DataTable({
    "retrieve": true,
    "processing": true,
    "serverSide": false,
});
</script>
<script>
function myfunction(id) {
    $.ajax({
        url: 'send_mail/',
        type: 'get',
        dataType: 'html',
        // data : {data:id},
        success: function(result) {
            alert('Mail Sent Sucessfully!')
        }
    });
}



$('#publish_permanent').click(function(event) {


});
</script>
<script>
$('#select_all').click(function(event) {
    
        if (confirm("Are you sure you want to send an invitation to all users?\nक्या आप वाकई सभी उपयोगकर्ताओं को निमंत्रण भेजना चाहते हैं?")) {
        var exam_id = $("#exam_id").val()
        var school_ids = new Array();
            let rows = table.rows({
                'search': 'applied'
            }).nodes();
            // Check checkboxes for all rows in the table
            $('input[type="checkbox"]', rows).prop('checked', true);
            rows.each((row) => {
                if ($('input[type="checkbox"]', row).attr('rel')) {
                    school_ids.push($('input[type="checkbox"]', row).attr('rel'))
                }
            })
            alert(school_ids.length);
            if(school_ids.length!=0){
                $('.loaderWrap').removeClass('d-none');
                $('.loaderWrap').removeClass('d-none');

        var url = "<?php echo base_url('admin/Allocation_admin/send_allocation_to_user/')?>"
        $.ajax({
            url: url,
            type:'GET',
            data : {school_ids:school_ids,'exam_id':exam_id},
                success:function(result){
                    if(result){
                    $('.loaderWrap').addClass('d-none');
                    alert("Send allocation sucessfully");
                    window.location.reload();
            }
            } 

        });  
        } else {

        alert('Please click on send at least one  checkbox\n(कृपया कम से कम दो चेकबॉक्स भेजें पर क्लिक करें)');
        $("#allcheckids").focus();
        return false;

    }
    }
});



$('#select_single_count').click(function(event) {
        if (confirm("Are you sure you want to send invitation to only selected users?\nक्या आप वाकई केवल चयनित उपयोगकर्ताओं को ही आमंत्रण भेजना चाहते हैं?")) {
            if (arr.length > 0) {
                $('.loaderWrap').removeClass('d-none');
                var exam_id = $("#exam_id").val();
                var url = "<?php echo base_url('admin/Allocation_admin/send_allocation_to_user/')?>"
                $.ajax({
                    url: url,
                    type:'GET',
                    data : {'school_ids':arr,'exam_id':exam_id},
                    success: function(result) {
                        if (result) {
                            $('.loaderWrap').addClass('d-none');
                            alert("Consent sent sucessfully ");
                            window.location.reload();
                        }
                    }
                });
            } else {
                alert('Please click on send at least one checkbox\n(कृपया कम से कम दो चेकबॉक्स भेजें पर क्लिक करें)');
                $("#allcheckids").focus();
                return false;
            }
        } else {
            return false;
        }

    });

$('.select_all_count').click(function(event) {
        arr = []
        let rows = table.rows({
            'search': 'applied'
        }).nodes();
        // Check checkboxes for all rows in the table
        $('input[type="checkbox"]', rows).prop('checked', true);
        rows.each((row) => {
            if ($('input[type="checkbox"]', row).attr('rel')) {
                arr.push($('input[type="checkbox"]', row).attr('rel'))
            }
        })
    });

    $('.select_all_uncheck').click(function(event) {
        let rows = table.rows({
            'search': 'applied'
        }).nodes();
        $('input[type="checkbox"]', rows).prop('checked', false);
        arr = []
        $('#schoolCount').addClass("d-none");
        $('#schoolWiseCounts').html('');
    });

    function single_send_allocation(id) {
        let schoolIds = [];
        schoolIds.push(id);
        $('.loaderWrap').removeClass('d-none');
        var exam_id = $("#exam_id").val();
        var url = "<?php echo base_url('admin/Allocation_admin/send_allocation_to_user/')?>"
        $.ajax({
            url: url,
            type:'GET',
            data : {'school_ids':schoolIds,'exam_id':exam_id},
            success: function(result) {
                if (result) {
                    $('.loaderWrap').addClass('d-none');
                    alert("Send allocation sucessfully");
                    return false;
                    // window.location.reload();
                }

            }
        });
    }

    let arr = []
    function getCount(id) {
        if (arr.indexOf(id) === -1) {
            arr.push(id)
        } else {
            arr = arr.filter(item => item !== id)
        }
    }
</script>
<style type="text/css">
.permanent_info {
    margin-bottom: 05px;
}

.remarkss {
    padding: 15px;
    /*font-size: 12px;*/
}

.his {
    margin: 0 0 10px 0;
}

.mr5 {
    margin-bottom: 5px;

}
</style>