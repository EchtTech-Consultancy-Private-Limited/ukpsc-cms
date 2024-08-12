<!-- DataTables -->

<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/datatables/dataTables.bootstrap4.css"> 

<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper">

    <section class="content">

         <!-- For Messages -->

        <?php $this->load->view('admin/includes/_messages.php') ?>
        

        <div class="card">

            <div class="card-header border-0 row d-flex align-items-center" >

                <div class="d-inline-block text-md-left text-center col-12 col-md-6">

                  <h3 class="card-title  ">

                    <i class="fa fa-list"></i>

                    Candidate wise application (District wise)&nbsp;(उम्मीदवार वार आवेदन (जिलेवार))

                  </h3>

                    

              </div>

              <div class="d-inline-block   col-12 col-md-6 text-md-right text-center pt-2 pt-md-0 pl-0">

          <?php //if($this->rbac->check_operation_permission('country_add')): ?>

            <a   href="<?= base_url('admin/master/candidate_add'); ?>" class="btn btn-admin"> Add Candidates Details&nbsp;(उम्मीदवारों का विवरण जोड़ें)</a>

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

// $(document).ready(function () {
//     window.setTimeout(function() {
//          $("#consent_recieved").fadeTo(500, 0).slideUp(500, function(){
//             $(this).remove();
//             <?php unset($_SESSION['success'])?>
//          });
//       }, 4000);
// });  

//   $(function () {

//     $("#example1").DataTable();

//   });



</script> 



<script>

//------------------------------------------------------------------

function filter_data()

{

$('.data_container').html('<div class="text-center"><img src="<?=base_url('assets/dist/img')?>/loading.png"/></div>');

$.post('<?=base_url('admin/certificate/filterdata')?>',$('.filterdata').serialize(),function(){

	$('.data_container').load('<?=base_url('admin/master/candidate_list_data')?>');

});

}

//------------------------------------------------------------------

function load_records()

{

$('.data_container').html('<div class="text-center"><img src="<?=base_url('assets/dist/img')?>/loading.png"/></div>');

$('.data_container').load('<?=base_url('admin/master/candidate_list_data')?>');

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