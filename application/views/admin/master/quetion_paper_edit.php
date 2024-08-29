<?php 
//print_r($establishment_type['name']);
?><div class="content-wrapper">
<section class="content">
    <div class="card">
        <div class="card-header">
        <div class="d-inline-block">
          <h3 class="card-title"><i class="fa fa-plus"></i>&nbsp; Edit New Establishment Type</h3>
        </div>
        <div class="d-inline-block float-right">
          <a href="<?= base_url('admin/master/establishment_type_list'); ?>" class="btn btn-success"><i class="fa fa-list"></i> Establishment Type List</a>
        </div>
      </div>
  <div class="card-body">

            <?php echo validation_errors(); ?>           
            <?php echo form_open(base_url('admin/master/quetion_paper_edit/'.urlencrypt($subject['id'])), 'id="xin-form"  class="form-horizontal"');  ?> 
                 <div class="row">
                    <div class="col-md-4">
                <div class="form-group">
                    <label for="name" class="col-sm- control-label">Subject Name</label>
                    <input type="text" style="text-transform: capitalize;" name="sub_name" value="<?php echo $subject['sub_name']?>" class="form-control" id="sub_name" placeholder="Subject Name" >
                    </div>
                </div>
                    <div class="col-md-4">
                    <div class="form-group">
                    <label for="name" class="col-sm- control-label">Subject Name Hindi</label>
                        <input type="text"style="text-transform: capitalize;" name="sub_name_hindi" value="<?php echo $subject['sub_name_hindi']?>" class="form-control" id="sub_name_hindi" placeholder="Subject Name Hindi" >
                    </div>
                </div>
                      <div class="col-md-4">
                    <div class="form-group">
                    <label for="name" class="col-sm- control-label">Subject Code</label>
                        <input type="text" style="text-transform: capitalize;" name="sub_code" value="<?php echo $subject['sub_code']?>" class="form-control" id="sub_code" placeholder="Subject Code"  >
                    </div>
                </div>
                
                </div>  
              <div class="form-group">
                <div class="col-md-12">
                  <input type="submit" name="submit" value="Update Subject" class="btn btn-info pull-right">
                </div>
              </div>
            <?php echo form_close( ); ?>
          </div>

    </div>
</section> 
</div>

<script>
  $("#country").addClass('active');
   $( document ).ready(function() {

       $("#xin-form")["submit"](function(d) {
	if ($("#EstablishmentType").val() === "") {
		alert("Please fill 'Establishment Type' field");
		$("#EstablishmentType").focus();
		return false;
	}
    });
   });
  </script>