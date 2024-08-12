<div class="datalist">
    <div class="row">
    <?= isset($info[0]['exam_name'])?get_exam_name_new($info[0]['exam_name']):"No Exam Name" ?>
    <!-- <?php// echo form_open_multipart(base_url('admin/allocation_admin/save'), 'id="xin-form"  class="form-horizontal"'); ?> -->
        <table id="allocationTable" class="table table-bordered table-hover" style="border-collapse: collapse !important;">
            <thead>
                <tr>
                    <th>S.No.</th>
                    <th>ids</th>
                    <th>Examination Center Name</th>
                    <th>Consent recieved</th>
                    <th>Examination Center code</th>
                    
                    <?php foreach ($date_exam as $key1 => $date) {?>
                        <th>
                            <?php echo $date?>
                            <br>
                            (<?php echo $shft_exam[$key1]?>)
                        </th>
                       

                     <?php } ?>
                    
                    <th><?= trans('action') ?></th>
                </tr>
                
            
            </thead>

        </table>
       
    </div>
    <!-- Modal -->


</div>
</div>
<!-- DataTables -->

<script src="<?= base_url() ?>assets/plugins/datatables/jquery.dataTables.js"></script>

<script src="<?= base_url() ?>assets/plugins/datatables/dataTables.bootstrap4.js"></script>
<script>
var table = $('#allocationTable').DataTable({
    "processing": true,
    "serverSide": false,
    "ajax": "<?=base_url('admin/Allocation_admin/allocation_list_datacopy/48')?>",
    "order": [
        [0, 'asc']
    ],
        "columnDefs": [{"targets": 0,"name": "id",'searchable': true,'orderable': true},
            {"targets": 1,"name": "school_name", 'searchable': true,'orderable': true },
            {"targets": 2,"name": "district",'searchable': true,'orderable': true},
            {"targets": 3,"name": "city",'searchable': true,'orderable': true},
            {"targets": 4,"name": "principal_name",'searchable': true,'orderable': true},
            {"targets": 5,"name": "ranking_admin",'searchable': true,'orderable': true},
            {"targets": 6,"name": "max_allocate_candidate",'max_allocate_candidate': true,'orderable': true},
            {"targets": 7,"name": "created_at",'searchable': true,'orderable': true},
        ]
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

function formdataSubmit(id)
{   
  var school_id = $('#school_id_new'+id).val();
  var exam_center_code = $('#exam_center_code'+id).val();
  var admin_id = $('#admin_id'+id).val();
  var exam_id = $('#exam_id').val();
  var candidate_value_count = $('#candidate_value_count'+id).val();
  var candidate_array = [];
  for (let k = 0; k < candidate_value_count; k++) {
    var candi_count = $('#candidate_value_school_id_new'+id+k).val();
    candidate_array.push(candi_count);   
}
    $.ajax({
                type: "GET", 
                url: base_url+'admin/allocation_admin/save',
                data: { 'school_id' : school_id,'exam_center_code':exam_center_code,'admin_id':admin_id,'exam_id':exam_id,'candidate_array':candidate_array,'csfr_token_name':csfr_token_value },
                success: function(data) {
                   if (data ==='200') {
                    alert('Allocation Created Successfully');
                    window.location.reload();
                   } else {
                    alert('Allocation Updated Successfully');
                    window.location.reload();
                   }
                }

        });
  
}
</script>
<script>
    function onlyNumberKey(evt) {
          
        // Only ASCII character in that range allowed
        var ASCIICode = (evt.which) ? evt.which : evt.keyCode
        if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
            return false;
        return true;
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