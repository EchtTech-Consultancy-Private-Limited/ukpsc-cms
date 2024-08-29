<!-- DataTables -->
<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/datatables/dataTables.bootstrap4.css"> 
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  
    <section class="content">
         <!-- For Messages -->
        <?php $this->load->view('admin/includes/_messages.php') ?>
        <div class="card">
            <div class="card-body">
                <div class="d-inline-block">
                  <h3 class="card-title">
                    <i class="fa fa-list"></i>
                    Consent Letter List&nbsp;सहमति पत्र सूची
                  </h3>
                    
              </div>
                <div class="d-inline-block float-right">
          <?php //if($this->rbac->check_operation_permission('country_add')): ?>
            <a style="display:none;" href="<?= base_url('admin/consent_letter/consent_add'); ?>" class="btn btn-success"> Apply for Consent Letter </a>
          <?php //endif; ?>
        </div>
              
            </div>
           
        </div>
    </section>

    <section class="content">

         <!-- For Messages -->

        <?php $this->load->view('admin/includes/_messages.php') ?>

        <div class="card">

            <div class="card-body">

                <!-- <div class="d-inline-block">

                  <h3 class="card-title">

                    <i class="fa fa-list"></i>

                    Consent List for Sending Invitations

                  </h3>

                    

              </div> -->

           

              <div class="d-inline-block float-right">

                

              </div>

            </div>

            <div class="card-body">

                <?php echo form_open("/",'class="filterdata"') ?>    

                <div class="row">
                  
                    <?php 

                    if (in_array($_SESSION['admin_role_id'], array(1,2,3,4,5,6))){?>

                    <div class="col-md-3">
                    <label>District&nbsp;ज़िला</label>
                        <div class="form-group">

                            <!-- <select name="state" class="form-control dd_state" onchange="filter_data()" > -->
                            <select id="state" name="state" class="form-control dd_state">

                                <option value="">Select District</option>

                                <?php foreach($states as $state):?>

                                    <option value="<?=$state->id?>"><?=$state->name?></option>

                                <?php endforeach;?>

                            </select>

                        </div>

                    </div>

                    <?php }

                    if (in_array($_SESSION['admin_role_id'], array(1,2,3,4,5,6))){

                        

                             ?>

                    <div class="col-md-3">
                        <label>City&nbsp;शहर</label>
                        <div class="form-group">
                            <select name="district" id="district" class="form-control">
                                <option value=""> Select City</option>
                            </select>
                            <!-- <select name="district" id="city" class="form-control" onchange="filter_data()" > -->
                            <!-- <select name="district" id="district" class="form-control" >

                                <option value="">Select City</option>

                                <?php 

                                // if(isset($districts) and count($districts ) >0){

                                //     foreach($districts as $k=> $district){

                                //     echo  '<option value="'.$district['id'].'">'.$district['subcityname'].'</option>';

                                //      }

                                // }?>

                                ?>

                            </select> -->

                        </div>

                    </div>

                     <?php } ?>

                    <div class="col-md-2">
                    <label>Grade&nbsp;श्रेणी</label>
                        <div class="form-group">

                            <!-- <select name="status" class="form-control" onchange="filter_data()" > -->
                            <select id="grade"  name="status" class="form-control">

                                <option value="">Select Grade</option>

                                

                                <?php foreach(ALLOWED_FILE_MOVEMENT_ROLE_ID[1] as $k=>$v):

                                    if (in_array($_SESSION['admin_role_id'], array(5)) && $k==5)

                                        continue;

                                        ?>



                                    <!-- <option value="<?=$k?>"><?=$v?></option> -->
                                    <option value="<?=$v?>"><?=$v?></option>

                                <?php endforeach;?>

                                

                            </select>

                        </div>

                    </div>


                </div>

                <?php echo form_close(); ?> 

            </div> 

        </div>

    </section>


    <!-- Main content -->
    <section class="content mt10">
    	<div class="card">
    		<div class="card-body">
               <!-- Load Admin list (json request)-->
               <div class="data_container"></div>
           </div>
       </div>
    </section>
    <!-- /.content -->
</div>



<!-- DataTables -->
<script src="<?= base_url() ?>assets/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables/dataTables.bootstrap4.js"></script>
<script>
$('document').ready(function()
{
//   $(function () {
//     $("#consent_list").DataTable();
//   });
  function filter_data()
{
$('.data_container').html('<div class="text-center"><img src="<?=base_url('assets/dist/img')?>/loading.png"/></div>');
$.post('<?=base_url('admin/certificate/filterdata')?>',$('.filterdata').serialize(),function(){
	$('.data_container').load('<?=base_url('admin/consent_letter/cosent_list_data')?>');
});
}
//------------------------------------------------------------------
function load_records()
{
$('.data_container').html('<div class="text-center"><img src="<?=base_url('assets/dist/img')?>/loading.png"/></div>');
$('.data_container').load('<?=base_url('admin/consent_letter/cosent_list_data')?>');
}
load_records();

//---------------------------------------------------------------------
$("body").on("change",".tgl_checkbox",function(){
$.post('<?=base_url("admin/certificate/change_status")?>',
{
    '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
	id : $(this).data('id'),
	status : $(this).is(':checked')==true?1:0
},
function(data){
	$.notify("Status Changed Successfully", "success");
});
});

      $(function() {
        $('#state').change( function() {
          // var grade = $('#grade').val();
          // console.log('grade',grade);
          // return false;
              var district_id = $(this).val();
              console.log("district",district_id);
              // return false;
                if (district_id != '') {
                    $('#othstate').val('').hide();

                    $.ajax({
                        type: "POST",
                        url: base_url + 'admin/location/get_city_by_state_id',
                        dataType: 'html',
                        data: {'district_id': district_id, 'csfr_token_name': csfr_token_value},
                        success: function (data) {
                            $('#district').html(data);
                        }
                    });
                } 
                // else {
                //     $('#state_id').val('').hide();
                //     $('#othstate').show();
                // }

          // var district_id = $('#district').val();
          // console.log("district",district_id);
          // return false;
          var state_id = $('#state').val();
          var grade = $('#grade').val();
          var district_id =  $('#district').val();;
          // console.log("district_id",district_id);
          // return false;
            if (state_id != '') {
              console.log("state_id asfeasfd",state_id);
              // return false;
 
              
              
                $.ajax({
                   type: "GET", 
                   url: base_url+'admin/consent_letter/cosent_list_data',
                   dataType: 'html',
                   data: { 'state_id' : state_id, 'district_id':district_id,'grade':grade, 'csfr_token_name':csfr_token_value },
                   success: function(data) {
                       console.log("data 31",data);
                       $('#consent_list').html(data);
                   }
                });
            }
            else {
                location.reload();

            }
        });
        
        $('#district').change( function() {

          var state_id = $('#state').val();
          var grade = $('#grade').val();
          var district_id = $(this).val();
          // console.log("grade",grade);
          // return false;
            if (district_id != '') {
           
                $.ajax({
                   type: "GET", 
                   url: base_url+'admin/consent_letter/cosent_list_data',
                   dataType: 'html',
                   data: { 'district_id' : district_id, 'state_id':state_id, 'grade':grade, 'csfr_token_name':csfr_token_value },
                   success: function(data) {
                      
                       $('#consent_list').html(data);
                   }
                });
            }
            else {
                location.reload();

            }
        });

        $('#grade').change( function() {
          var grade = $(this).val();
          var state_id = $('#state').val();
          var district_id = $('#district').val();
            if (grade != '') {
              // console.log("grade_id",grade_id);
              // return false;
           
                $.ajax({
                   type: "GET", 
                   url: base_url+'admin/consent_letter/cosent_list_data',
                   dataType: 'html',
                   data: { 'district_id' : district_id, 'state_id':state_id, 'grade' : grade, 'csfr_token_name':csfr_token_value },
                   success: function(data) {
                      //  console.log("data",data);
                       $('#consent_list').html(data);
                   }
                });
            }
            else {
                location.reload();

            }
        });
    });
});
</script>
<script>
  

</script> 

<script>
//------------------------------------------------------------------

</script>