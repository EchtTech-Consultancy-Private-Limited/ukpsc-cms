
<div class="content-wrapper">
    <section class="content">
        <div class="card">
            <div class="card-header">
                <div class="d-inline-block">
                    <h3 class="card-title"><i class="fa fa-plus"></i>&nbsp; Add subject&nbsp;(विषय जोड़ें)</h3>
                </div>
                <div class="d-inline-block float-right">
                    <a href="<?= base_url('admin/master/que_list'); ?>" class="btn btn-success"><i class="fa fa-list"></i>Subject List&nbsp;(विषय सूची)</a>
                </div>
            </div>
            <div class="card-body">
                
                <?php echo validation_errors(); ?>           
                <?php echo form_open(base_url('admin/master/quetion_paper_add'), 'id="xin-form"  class="form-horizontal"'); ?> 
                <div class="row">
                    <div class="col-md-4">
                <div class="form-group">
                    <label for="name" class="col-sm- control-label">Subject Name English&nbsp;(विषय का नाम अंग्रेजी)<i style="color:#ff0000; font-size:12px;">*</i></label>
                    <input type="text" style="text-transform: capitalize;" name="sub_name" class="form-control" id="sub_name" placeholder="Subject Name" >
                    </div>
                </div>
                    <div class="col-md-4">
                    <div class="form-group">
                    <label for="name" class="col-sm- control-label">Subject Name Hindi&nbsp;(विषय का नाम हिंदी)<i style="color:#ff0000; font-size:12px;">*</i></label>
                        <input type="text"style="text-transform: capitalize;" name="sub_name_hindi" class="form-control" id="sub_name_hindi" placeholder="Subject Name Hindi" >
                    </div>
                </div>
                      <div class="col-md-4">
                    <div class="form-group">
                    <label for="name" class="col-sm- control-label">Subject Code&nbsp;(विषय कोड)<i style="color:#ff0000; font-size:12px;">*</i></label>
                        <input type="text" style="text-transform: capitalize;" name="sub_code" class="form-control" id="sub_code" placeholder="Subject Code"  >
                    </div>
                </div>
                
                </div>
                <div class="row">
                    <div class="col-8"></div>
                    <div class="form-group" >
                    <div class="col-md-12">
                        <!-- <input type="submit" name="submit" value="Update Admin" class="btn btn-primary pull-right"> -->
                        <input type="button" onclick="window.history.go(-1)" class="btn btn-primary " value="Back&nbsp;(पीछे)"></input>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-12">
                        <input type="submit" name="submit" value="Add Subject&nbsp;(विषय जोड़ने)" class="btn btn-info pull-right">
                    </div>
                </div>
            </div>
     <?php echo form_close(); ?>
            </div>

        </div>
    </section> 
</div>

<script>

    $("#country").addClass('active');
    
    $(document).ready(function () {

        $("#xin-form")["submit"](function(d){
        
            if ($("#sub_name").val() === "") {
        
                alert("Please fill 'Subject English Name'\nकृपया 'विषय अंग्रेजी नाम' भरें");
                $("#sub_name").focus();
                return false;
        
            }
        
            if ($("#sub_name_hindi").val() === "") {
        
                alert("Please fill 'Subject Name Hindi'\nकृपया 'विषय का नाम हिंदी' भरें");
                $("#sub_name_hindi").focus();
                return false;
        
            }
            
            if (($("#sub_code").val() === "") || $("#sub_code").val() === "-") {
        
                alert("Please fill 'Subject Code'\nकृपया 'विषय कोड' भरें");
                $("#sub_code").focus();
                return false;
        
            }
        });

        $("#sub_name").focusout(function(){
        
            var text = $("#sub_name").val()+'-'; 
            $("#sub_code").val(text);
        
        }); 

    });

</script>