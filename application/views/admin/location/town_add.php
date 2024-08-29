<div class="content-wrapper">
<section class="content">
    <div class="card">
        <div class="card-header">
        <div class="d-inline-block">
          <h3 class="card-title"><i class="fa fa-plus"></i>&nbsp; Add New District</h3>
        </div>
        <div class="d-inline-block float-right">
          <!-- <a href="<?= base_url('admin/location/city'); ?>" class="btn btn-success"><i class="fa fa-list"></i> District List</a> -->
        </div>
      </div>
  <div class="card-body">

            <?php echo validation_errors(); ?>           
            <?php echo form_open(base_url('admin/location/town_add'), 'class="form-horizontal"');  ?> 
              <div class="form-group">
                <label for="name" class="col-sm-3 control-label">District</label>
                 <div class="col-md-12">
                        <select class="form-control" required  name="name">
                            <option>Select District</option>
                            <?php 
                           
                            foreach($town as $town){?>
                                    <option value="<?= $town['id']; ?>"> <?= $town['name']; ?> </option>
                            <?php }  ?>
                        </select>
                    </div>
              </div>
              <div class="form-group">
                <label for="name" class="col-sm-3 control-label">City Name</label>
                <div class="col-md-12">
                  <input type="text" name="city" class="form-control" id="name1" placeholder="" required>
                </div>
                 <div id="x" style="color:red"></div>
              </div>
              <div class="form-group">
                <div class="col-md-12">
                  <input type="submit" name="submit" value="Add City" class="btn btn-info pull-right">
                </div>
              </div>
            <?php echo form_close( ); ?>
          </div>

    </div>
</section> 
</div>
<script>
  $("#country").addClass('active');

    $(function () {
       $('input').blur(function () {                     
          $(this).val(
             $.trim($(this).val())
          );
       });
    });

$("#name1").on('keyup',function(){
var string= $("#name1").val();
var pattern=/^[a-zA-Z ]*$/ ;
  if (!pattern.test(string)) {
   $("#x").html('Please enter only text');
  } 
  else{
$("#x").html(' ');
  }
  });

  </script>