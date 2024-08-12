<?php 
//print_r($establishment_type['name']);
?><div class="content-wrapper">
<section class="content">
    <div class="card">
        <div class="card-header">
        <div class="d-inline-block">
          <h3 class="card-title"><i class="fa fa-plus"></i>&nbsp; Edit</h3>
        </div>
        <div class="d-inline-block float-right">
    
        </div>
      </div>
  <div class="card-body">

            <?php echo validation_errors(); ?>           
            <?php echo form_open(base_url('admin/examshedule_schedule/date_sheet_list_edit/'.$user['id']), 'id="xin-form"  class="form-horizontal"');  ?> 
             
               <div class="after-add-more field_wrapper">
                    <div class="row">
                          <div class="col-md-2">
                <div class="form-group">
                    <label for="name" class="col-sm- control-label">Exam Name</label>
                    <input type="text" name="exam_name" class="form-control" value="<?php echo $user['exam_name']; ?>" placeholder="Exam Name" >
                    </div>
                </div>
                        <div class="col-md-2">
                    <div class="form-group">
                    <label for="name" class="col-sm- control-label">Subject Name </label>
                    					<select name="sub_name[]" id="sub_name" >                        <option value="">Select Subject</option>                        <?php                         $b= $subject;                        foreach ($subject as $k => $subject) { ?>                        <option value="<?= $subject->id ?>"  ><?= $subject->sub_name ?></option>                     <?php   } ?>                     </select>
                    </div>
                </div>
                            <div class="col-md-1">
                    <div class="form-group">
                    <label for="name" class="col-sm- control-label">No. of Candidate</label>
                        <input type="text" name="no_candidate" class="form-control" value="<?php echo $user['no_candidate']; ?>" placeholder="No. of Candidate" >
                    </div>
                </div>
                    <div class="col-md-2">
                    <div class="form-group">
                    <label for="name" class="col-sm- control-label">Exam Date</label>
                        <input type="date" name="date_exam" class="form-control" value="<?php echo $user['date_exam']; ?>" id="date_exam" placeholder="Date Of Exam" >
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                    <label for="name" class="col-sm- control-label">Exam Shift </label>
                        <!-- <input type="text" name="shft_exam" class="form-control" id="shft_exam" placeholder="Shift of Exam" > -->
                        <select name="shft_exam"  class="form-control" id="shft_exam" >
                        <option>Select</option>
                        <option value="Morning"<?php if($user['shft_exam'] =='Morning'){ echo 'selected';}?>>Morning</option>
                        <option  value="Evening"<?php if($user['shft_exam'] =='Evening'){ echo 'selected';}?> >Evening</option>

                        </select>
                    </div>
                </div>  
                  <div class="col-md-2">
                    <div class="form-group">
                    <label for="name" class="col-sm- control-label">Exam Time </label>
                        <input type="text" name="time_exam" class="form-control" value="<?php echo $user['time_exam']; ?>" id="time_exam" placeholder="Time of Exam" >
                    </div>
                </div> 
                    </div>
                </div>  
              <div class="form-group">
                <div class="col-md-12">
                  <input type="submit" name="submit" value="Update" class="btn btn-info pull-right">
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