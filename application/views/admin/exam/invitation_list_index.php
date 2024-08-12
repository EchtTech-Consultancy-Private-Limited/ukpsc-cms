<!-- DataTables -->

<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/datatables/dataTables.bootstrap4.css"> 

<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper">
    

    <section class="content">

         <!-- For Messages -->

        <?php $this->load->view('admin/includes/_messages.php') ?>

        <div class="card">

            <div class="card-header border-0 d-flex justify-content-sm-between align-items-center flex-column flex-md-row ">

                <div class=" ">

                  <h3 class="card-title">

                    <i class="fa fa-list"></i>

                    Exam Schedule&nbsp;(परीक्षा अनुसूची)
                    <!-- Create Exam Schedule -->

                  </h3>

                    

              </div>

              <div class="d-sm-block float-sm-right mt-2 pt-sm-0">

          <?php //if($this->rbac->check_operation_permission('country_add')): ?>

            <a style="display:block;" href="<?= base_url('admin/master/invitation_add'); ?>" class="btn btn-admin"> Create Exam Schedule&nbsp;(परीक्षा कार्यक्रम बनाएं)  </a>

          <?php //endif; ?>

        </div>

           

             
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

$(document).ready(function () {
    window.setTimeout(function() {
         $("#consent_recieved").fadeTo(500, 0).slideUp(500, function(){
            $(this).remove();
            <?php unset($_SESSION['success'])?>
         });
      }, 4000);
});  

  $(function () {

    $("#example1").DataTable();

  });



</script> 



<script>

//------------------------------------------------------------------

function filter_data()

{

$('.data_container').html('<div class="text-center"><img src="<?=base_url('assets/dist/img')?>/loading.png"/></div>');

$.post('<?=base_url('admin/certificate/filterdata')?>',$('.filterdata').serialize(),function(){

	$('.data_container').load('<?=base_url('admin/examshedule_schedule/invitation_list_data')?>');

});

}

//------------------------------------------------------------------

function load_records()

{

$('.data_container').html('<div class="text-center"><img src="<?=base_url('assets/dist/img')?>/loading.png"/></div>');

$('.data_container').load('<?=base_url('admin/examshedule_schedule/invitation_list_data')?>');

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

        $('.dd_state').change( function() {

            var state_id = $(this).val();



            if (state_id != '') {

           

                $.ajax({

                   type: "POST", 

                   url: base_url+'admin/location/get_city_by_state_id',

                   dataType: 'html',

                   data: { 'state_id' : state_id, 'csfr_token_name':csfr_token_value },

                   success: function(data) {

                       console.log(data);

                       $('#district_filter').html( data );

                   }

                });

            }

            else {

               $('#state').val('').hide();



            }

        });

    });

</script>