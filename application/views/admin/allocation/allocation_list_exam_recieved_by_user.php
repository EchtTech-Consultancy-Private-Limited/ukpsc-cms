<style>
.reply-btn {
    font-size: 14px !important;
    padding: 5px !important;
}

.apply-btn {
    font-size: 15px !important;
    padding: 3px 5px !important;
}

table tbody td h4 {
    font-size: 15px !important;
}
</style>

<div class="datalist table-responsive">

    <table id="example1" class="table table-bordered table-hover"
        style="overflow: auto; border-collapse: collapse !important;">
        <thead>
            <tr style="text-align: center;">
                <th width="50">S.No.</th>
                <th>Exam Name</th>
                <th>Subject Line of Letter</th>
                <th> Start Date of exam</th>
                <th>End Date of exam</th>
            </tr>
        </thead>
            <tbody>
                <?php
                if(count($info)>0){
                    
                 foreach ($info as $key => $value) {?>
                <tr>
                    <td><?php echo $key+1 ?></td>
                    <td> <a href="<?= base_url("admin/allocation_user/allocation_data_recieve_by_user/" . urlencrypt($value['id']))?>" title="View" class="btn btn-sec"><?php echo get_exam_name($value['exam_name']); ?></a></td>
                    <td><?php echo $value['subjectline']; ?></td>
                    <td><?php echo  date("d-m-Y", strtotime($value['startdate'])); ?></td>
                    <td><?php echo date("d-m-Y", strtotime($value['enddate'])); ?></td>
                </tr>
                <?php }
                }
                ?>
            </tbody>

    </table>

    <!-- Modal -->




</div>

</div>



<script>
$(document).ready(function() {

    var table = $('#example1').DataTable({
        "processing": true,
        "serverSide": false,
    });



});
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
    margin-top: 10px;
    border: none !important;
    padding: 4% !important;
    font-weight: lighter !important;
    font-size: 60% !important;

}
</style>