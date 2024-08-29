<script type="text/javascript">
    $(function () {
        $('input').blur(function () {
            $(this).val(
                    $.trim($(this).val())
                    );
        });
    });
</script>
 
<div class="content-wrapper">
<!-- Main content -->
<section class="content">
<div class="card card-default color-palette-bo">
  <div class="card-header">
    <div class="d-inline-block">
      <h3 class="card-title"> <i class="fa fa-pencil"></i> Registration for UKPSC Exam Centre (यूके0पी0एस0सी0 परीक्षा केंद्र के लिए पंजीकरण) </h3>
    </div>
    </div>
    <div class="card-body">
<div class="container">
  <div class="card">
   
    <div class="form">
      <div class="left-side">
        <div class="left-heading">
          <h3></h3>
        </div>
        <div class="steps-content">
          <h3>Step <span class="step-number">4</span></h3>
          <!--<p class="step-number-content active">Enter your School/College Information.</p>
          <p class="step-number-content d-none">Enter your School/College Principal Deatils</p>
          <p class="step-number-content d-none">Enter your School/College Centre Superintendent Details</p>
          <p class="step-number-content d-none">Enter your School/College Centre Infrastructure Details.</p>
		  <p class="step-number-content d-none">Add Bank Details</p>
		  <p class="step-number-content d-none">Add your School/College Images as per  filed</p>-->
		   
        </div>
        <ul class="progress-bar">
          <li >School/College/University Information <br>स्कूल/कॉलेज/विश्वविद्यालय विवरण</li>
          <li >Principal Details<br>प्रधानाचार्य का विवरण</li>
          <li >Centre Superintendent Details<br>केंद्र अधीक्षक का विवरण</li>
          <li class="active">Infrastructure Details<br>बुनियादी ढांचे का विवरण</li>		  
		  <li>Bank Details<br>बैंक विवरण</li>
		  <li>Upload Images<br>तश्वीरें अपलोड करो</li>
        </ul>
      </div>
   
      <div class="right-side">
       
     
 
             
             
    <?php echo form_open_multipart(base_url('admin/step4'), 'id="xin-form" class="form-horizontal" '); ?> 
        <div class="main active">
          <div class="text">
            <h2>School/College/University Infrastructure Details (स्कूल/कॉलेज/विश्वविद्यालय विवरण के बुनियादी ढांचे का विवरण)</h2> 
            <p class="mt-0">Enter your School/College/University Infrastructure Details</p>
          </div>
          <span class="mr-1" style="color:red">*</span><label>Marked fields are mandatory (चिह्नित फ़ील्ड अनिवार्य हैं)</label>
		  <div class="input-text">
			   <div class="form-group">
			   <label>Total Number of room<span class="ml-1" style="color:red;">*</span><br>कक्षा की कुल संख्या<span class="ml-1" style="color:red;">*</span></label> 
				  <input type="text"  name="no_room" maxlength="4" class="form-control" value="<?php if (isset($user['no_room'])) {
                                    echo $user['no_room'];
                                } ?>" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" id="no_room" >
				</div>
				<div class="form-group">
				<label>Number of seats (In multiple of 24) for candidates in each room<span class="ml-1" style="color:red;">*</span><br>प्रत्येक कमरे में उम्मीदवारों के लिए सीटों की संख्या (24 के गुणक में)।<span class="ml-1" style="color:red;">*</span></label>
				  <input type="text"  name="no_sheet" maxlength="4" class="form-control" value="<?php if (isset($user['no_sheet'])) {
                                    echo $user['no_sheet'];
                                } ?>"  oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" id="no_sheet"  >
				  
				</div>

                <div class="form-group">
                <label>Maximum number of candidates can be allocated in the center<span class="ml-1" style="color:red;">*</span><br>केन्द्र में आबंटित किये जा सकने वाले अधिकतम् अभ्यर्थियों की संख्या<span class="ml-1" style="color:red;">*</span></label>
                  <input type="text" maxlength="4" class="form-control" value="<?php if (isset($user['max_allocate_candidate'])) {
                                    echo $user['max_allocate_candidate'];
                                } ?>"  oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" name="max_allocate_candidate" id="max_allocate_candidate"  >
                  
                </div>
				
         
			   <div class="form-group">
				     <label for="Address1">Is there sufficient furniture in the rooms for the candidates?<span class="ml-1" style="color:red;">*</span><br>क्या अभ्यर्थियों हेतु कक्षों में फर्नीचर पर्याप्त है?<span class="ml-1" style="color:red;">*</span> </label>
                                     <select class="form-control" name="furniture_avail"  maxlength="60" placeholder="Is Furniture available?"  id="furniture_avail">
                                        <option value=""  >Select</option>
                                         <option value="Yes" <?php if(isset($user['furniture_avail'])){if($user['furniture_avail'] == 'Yes'){ echo "selected";} }?>>Yes (हाँ)</option>
                                        <option value="No"<?php if(isset($user['furniture_avail'])){ if($user['furniture_avail'] == 'No'){ echo "selected";} }?>>No (नहीं)</option>
                                     </select>
				 
				</div>
				<div class="form-group">
				 <label for="Address2">Is proper lighting facility is available in rooms?<span class="ml-1" style="color:red;">*</span> <br>क्या कक्षों में विद्युत की समुचित व्यवस्था है?<span class="ml-1" style="color:red;">*</span></label>
                            <select class="form-control" name="elec_avail" maxlength="60" placeholder="Is Electricity available?" id="elec_avail">
                                <option value=""  >Select</option>
                                <option value="Yes" <?php if(isset($user['elec_avail'])){if($user['elec_avail'] == 'Yes'){ echo "selected";}} ?>>Yes (हाँ)</option>
                                <option value="No" <?php if(isset($user['elec_avail'])){if($user['elec_avail'] == 'No'){ echo "selected";}} ?>>No (नहीं)</option>
                            </select>
				</div>
				
         
			   <div class="form-group">
				 <label for="City" >Does School/College have a Generator facility?<span class="ml-1" style="color:red;">*</span><br>क्या विद्यालय/केन्द्र में जनरेटर उपलब्ध है?<span class="ml-1" style="color:red;">*</span> </label>
                            <select class="form-control" name="gen_avai" maxlength="60" placeholder="Is Electricity available?" id="gen_avai">
                                <option value=""  >Select</option>
                                <option value="Yes"<?php if(isset($user['gen_avai'])){if($user['gen_avai'] == 'Yes'){ echo "selected";}} ?>>Yes (हाँ)</option>
                                <option value="No"<?php if(isset($user['gen_avai'])){if($user['gen_avai'] == 'No'){ echo "selected";}} ?>>No (नहीं)</option>
                            </select> 
				</div>
				<div class="form-group">
				   <label for="Address1">Does school have separate washroom facilities for girls and boys?<span class="ml-1" style="color:red;">*</span><br>क्या विद्यालय/केन्द्र में पुरूष व महिला अभ्यर्थियों के लिए अलग-अलग प्रसाधन की समुचित व्यवस्था है?<span class="ml-1" style="color:red;">*</span></label>
                            <select class="form-control" name="wash_rrom" maxlength="60" placeholder="Is Electricity available?" id="wash_rrom">
                                <option value=""  >Select</option>
                                <option value="Yes"<?php if(isset($user['wash_rrom'])){if($user['wash_rrom'] == 'Yes'){ echo "selected";}} ?>>Yes (हाँ)</option>
                                <option value="No"<?php if(isset($user['wash_rrom'])){if($user['wash_rrom'] == 'No'){ echo "selected";}} ?>>No (नहीं)</option>
                            </select>
				</div>
				
          
			   <div class="form-group">
				 <label for="Address2">Does School have a cloakroom facility for keeping valuables of candidates?<span class="ml-1" style="color:red;">*</span><br>क्या विद्यालय/केन्द्र में अभ्यर्थियों के कीमती सामान रखने के लिए स्कूल में क्लोकरूम की सुविधा है?<span class="ml-1" style="color:red;">*</span></label>
                            <select class="form-control" name="clock_room" maxlength="60" placeholder="Is Electricity available?" id="clock_room">
                                <option value=""  >Select</option>
                                <option value="Yes"<?php if(isset($user['clock_room'])){if($user['clock_room'] == 'Yes'){ echo "selected";}} ?>>Yes (हाँ)</option>
                                <option value="No"<?php if(isset($user['clock_room'])){if($user['clock_room'] == 'No'){ echo "selected";}} ?>>No (नहीं)</option>
                            </select>
				</div>
				<div class="form-group">
				  <label for="City" >Does School have a proper parking facility?<span class="ml-1" style="color:red;">*</span><br>क्या विद्यालय/केन्द्र में अभ्यर्थियों हेतु वाहन पार्किंग की व्यवस्था है?<span class="ml-1" style="color:red;">*</span></label>
                            <select class="form-control" name="vehicle_avail" maxlength="60" placeholder="Is Electricity available?" id="vehicle_avail">
                                <option value=""  >Select</option>
                                <option value="Yes"<?php if(isset($user['vehicle_avail'])){if($user['vehicle_avail'] == 'Yes'){ echo "selected";}} ?>>Yes (हाँ)</option>
                                <option value="No"<?php if(isset($user['vehicle_avail'])){if($user['vehicle_avail'] == 'No'){ echo "selected";}} ?>>No (नहीं)</option>
                            </select>
				</div>
			
			   <div class="form-group">
				 <label for="Address1">Does School have sufficient number of invigilators and staff for exam conduction?<span class="ml-1" style="color:red;">*</span><br>क्या परीक्षा संचालन के लिए अन्तरीक्षक व स्टाफ पर्याप्त संख्या में उपलब्ध हैं?<span class="ml-1" style="color:red;">*</span></label>
                            <select class="form-control" name="staff_suffi" maxlength="60" placeholder="Is Electricity available?" id="staff_suffi">
                                <option value=""  >Select</option>
                                <option value="Yes"<?php if(isset($user['staff_suffi'])){if($user['staff_suffi'] == 'Yes'){ echo "selected";}} ?>>Yes (हाँ)</option>
                                <option value="No"<?php if(isset($user['staff_suffi'])){if($user['staff_suffi'] == 'No'){ echo "selected";}} ?>>No (नहीं)</option>
                            </select>
				</div>
				<div class="form-group">
				  <label for="Address2">Does the school conduct any examination by Uttarakhand public service commission?<span class="ml-1" style="color:red;">*</span> <br>क्या विद्यालय/केन्द्र में पूर्व में उत्तराखण्ड लोक सेवा आयोग की कोई परीक्षा हुई है?<span class="ml-1" style="color:red;">*</span></label>
                            <select class="form-control" name="ukpsc_exxma" maxlength="60" placeholder="Is Electricity available?" id="ukpsc_exxma">
                                <option  value="" >Select</option>
                                <option value="Yes"<?php if(isset($user['ukpsc_exxma'])){if($user['ukpsc_exxma'] == 'Yes'){ echo "selected";}} ?>>Yes (हाँ)</option>
                                <option value="No"<?php if(isset($user['ukpsc_exxma'])){if($user['ukpsc_exxma'] == 'No'){ echo "selected";}} ?>>No (नहीं)</option>
                            </select>
				</div>
			
			   <div class="form-group">
				  <!-- <label for="City" >Ever Debared (क्या कभी वंचित)</label> -->
				  <label> Has school been debarred from any examination?<span class="ml-1" style="color:red;">*</span><br>क्या विद्यालय/केन्द्र कभी परीक्षाओं हेतु प्रतिवारित रहा है?<span class="ml-1" style="color:red;">*</span></label>
                          
                               <select class="form-control" name="debar" maxlength="60" placeholder="Is Electricity available?" id="debar">
                                <option value=""  >Select</option>
                                <option value="Yes"<?php if(isset($user['debar'])){if($user['debar'] == 'Yes'){ echo "selected";}} ?>>Yes (हाँ)</option>
                                <option value="No"<?php if(isset($user['debar'])){if($user['debar'] == 'No'){ echo "selected";}} ?>>No (नहीं)</option>
                            </select>
                            
				</div>
				<div class="form-group">
				<label>Is principal/centre superintendent brass seal is available if not arrange the same as it is  for conducting the examination?<span class="ml-1" style="color:red;">*</span> <br>(क्या प्रधानाचार्य/पर्यवेक्षक की ब्रास सील उपलब्ध है? यदि नही तो विभिन्न लिफाफों को सील्ड करने के लिए इसकी आवश्यकता होगी तथा परीक्षा आयोजन की दशा में इसे तैयार करा लिया जाए?)<span class="ml-1" style="color:red;">*</span> </label>
				 
                    <select class="form-control" name="bras_Seal" maxlength="60" placeholder="Is Electricity available?" id="bras_Seal">
                                <option value="" >Select</option> value="" 
                                <option value="Yes"<?php if(isset($user['bras_Seal'])){if($user['bras_Seal'] == 'Yes'){ echo "selected";}} ?>>Yes (हाँ)</option>
                                <option value="No"<?php if(isset($user['bras_Seal'])){if($user['bras_Seal'] == 'No'){ echo "selected";}} ?>>No (नहीं)</option>
                            </select>
				  
				</div>
                <div class="form-group">
                <label>Remarks if any <br>(उक्त के अतिरिक्त अन्य विवरण जिसे आप उपलब्ध कराना उचित एंव आवश्यक समझे।) </label>
                 
                    <textarea id="remark_if" class="form-control" rows="4"   name="remark_if" style="height: 100% !important;">
<?php if (isset($user['remark_if'])) {
                                    echo $user['remark_if'];
                                } ?>
                    </textarea>
                  
                </div>
			</div>
			  
          <div class="">
            <a  href="<?= base_url("admin/step3/" ); ?>"  class="btn btn-sec">Back</a>
       
              <input type="submit" name="submit" id="submit" class="btn btn-primary next_button" value="Save and Next">
          </div>
			  
			  
           
          </div>
          <?php echo form_close(); ?>

        </div>
		 
 
      </div>
    </div>
  </div>
</div>
  </div>
</section>
</div>
     <?php echo form_close(); ?>  
<script type='text/javascript' src='#'></script>
<script type='text/javascript' src='#'></script>
<script type='text/javascript' src='#'></script>
<script type='text/javascript' src='#'></script>
<script type='text/javascript'>
    var next_click=document.querySelectorAll(".next_button");
var main_form=document.querySelectorAll(".main");
var step_list = document.querySelectorAll(".progress-bar li");
var num = document.querySelector(".step-number");
let formnumber=0;

next_click.forEach(function(next_click_form){
    next_click_form.addEventListener('click',function(){
        if(!validateform()){
            return false
        }
       formnumber++;
       updateform();
       progress_forward();
       contentchange();
    });
}); 

var back_click=document.querySelectorAll(".back_button");
back_click.forEach(function(back_click_form){
    back_click_form.addEventListener('click',function(){
       formnumber--;
       updateform();
       progress_backward();
       contentchange();
    });
});

var username=document.querySelector("#principal_name");
var shownname=document.querySelector(".shown_name");
 

var submit_click=document.querySelectorAll(".submit_button");
submit_click.forEach(function(submit_click_form){
    submit_click_form.addEventListener('click',function(){
       shownname.innerHTML= username.value;
       formnumber++;
       updateform(); 
    });
});

var heart=document.querySelector(".fa-heart");
heart.addEventListener('click',function(){
   heart.classList.toggle('heart');
});


var share=document.querySelector(".fa-share-alt");
share.addEventListener('click',function(){
   share.classList.toggle('share');
});

 

function updateform(){
    main_form.forEach(function(mainform_number){
        mainform_number.classList.remove('active');
    })
    main_form[formnumber].classList.add('active');
} 
 
function progress_forward(){
    // step_list.forEach(list => {
        
    //     list.classList.remove('active');
         
    // }); 
    
     
    num.innerHTML = formnumber+1;
    step_list[formnumber].classList.add('active');
}  

function progress_backward(){
    var form_num = formnumber+1;
    step_list[form_num].classList.remove('active');
    num.innerHTML = form_num;
} 
 
var step_num_content=document.querySelectorAll(".step-number-content");

 function contentchange(){
     step_num_content.forEach(function(content){
        content.classList.remove('active'); 
        content.classList.add('d-none');
     }); 
     step_num_content[formnumber].classList.add('active');
 } 
 
 
// function validateform(){
//     validate=true;
//     var validate_inputs=document.querySelectorAll(".main.active input");
//     validate_inputs.forEach(function(vaildate_input){
//         vaildate_input.classList.remove('warning');
//         if(vaildate_input.hasAttribute('require')){
//             if(vaildate_input.value.length==0){
//                 validate=false;
//                 vaildate_input.classList.add('warning');
//             }
//         }
//     });
//     return validate;
    
// }
</script>
<script type='text/javascript'>var myLink = document.querySelector('a[href="#"]');
                                myLink.addEventListener('click', function(e) {
                                  e.preventDefault();
                                });</script>
</script>
<script>
    $(document).ready(function () {
        // alert('Hi');
        
        $("#xin-form")["submit"](function () {
                     
            if ($("#no_room").val() == "") {
                alert("Please enter 'Total Number of room \nकृपया 'कमरे की कुल संख्या' दर्ज करें ");
                $("#no_room").focus();
                return false;
            }
            if ($("#no_sheet").val() == "") {
                alert("Please enter 'Number of seats for candidates in each room'.\nकृपया 'प्रत्येक कमरे में उम्मीदवारों के लिए सीटों की संख्या' दर्ज करें। ");
                $("#no_sheet").focus();
                return false;
            }     
    
            var furniture = $("select#furniture_avail option").filter(":selected").val();
            if (furniture == "") {
                alert("Please select Is there sufficient furniture in the rooms for the candidates?\nकृपया चुनें कि क्या उम्मीदवारों के लिए कमरों में पर्याप्त फर्नीचर है?");
                $("select#furniture_avail").focus();
                return false;
            }
             var electricity = $("select#elec_avail option").filter(":selected").val();
            if (electricity == "") {
                alert("Please select 'Is proper lighting facility is available in rooms?\nकृपया चुनें 'क्या कमरों में उचित प्रकाश व्यवस्था उपलब्ध है?'");
                $("select#elec_avail").focus();
                return false;
            }
            var generator = $("select#gen_avai option").filter(":selected").val();
            if (generator == "") {
                alert("Please select 'Does School/College have a Generator facility?\nकृपया चुनें 'क्या स्कूल/कॉलेज में जेनरेटर की सुविधा है?");
                $("select#gen_avai").focus();
                return false;
            }
            var washroom = $("select#wash_rrom option").filter(":selected").val();
            if (washroom == "") {
                alert("Please select 'Does school have separate washroom facilities for girls and boys?\nकृपया चुनें 'क्या स्कूल में लड़कियों और लड़कों के लिए अलग शौचालय की सुविधा है?");
                $("select#wash_rrom").focus();
                return false;
            }
            var clock_room = $("select#clock_room option").filter(":selected").val();
            if (clock_room == "") {
                alert("Please select 'Does School have a cloakroom facility for keeping valuables of candidates?\nकृपया 'क्या स्कूल में उम्मीदवारों के कीमती सामान रखने के लिए क्लोकरूम की सुविधा है?");
                $("select#clock_room").focus();
                return false;
            }
             var vehicle_avail = $("select#vehicle_avail option").filter(":selected").val();
            if (vehicle_avail == "") {
                alert("Please select 'Does School have a proper parking facility'?\nकृपया चुनें 'क्या स्कूल में पार्किंग की उचित सुविधा है?'");
                $("select#vehicle_avail").focus();
                return false;
            }
     var staff_suffi = $("select#staff_suffi option").filter(":selected").val();
            if (staff_suffi == "") {
                alert("Please select 'Does School have sufficient number of invigilators and staff for exam conduction'.\nकृपया 'क्या स्कूल में परीक्षा संचालन के लिए पर्याप्त संख्या में निरीक्षक और कर्मचारी हैं' का चयन करें।");
                $("select#staff_suffi").focus();
                return false;
            } 
             var ukpsc_exxma = $("select#ukpsc_exxma option").filter(":selected").val();
            if (ukpsc_exxma == "") {
                alert("Please select 'Does the school conduct any examination by Uttarakhand public service commission'?\nकृपया 'क्या स्कूल उत्तराखंड लोक सेवा आयोग द्वारा कोई परीक्षा आयोजित करता है' का चयन करें?");
                $("select#ukpsc_exxma").focus();
                return false;
            } 
            var ukpsc_exxma = $("select#ukpsc_exxma option").filter(":selected").val();
            if (ukpsc_exxma == "") {
                alert("Please select 'Does the school conduct any examination by Uttarakhand public service commission'?\nकृपया 'क्या स्कूल उत्तराखंड लोक सेवा आयोग द्वारा कोई परीक्षा आयोजित करता है' का चयन करें?");
                $("select#ukpsc_exxma").focus();
                return false;
            }
            var debar = $("select#debar option").filter(":selected").val();
            if (debar == "") {
                alert("Please select 'Has school been debarred from any examination'?\nकृपया 'क्या स्कूल को किसी परीक्षा से वंचित कर दिया गया है' चुनें?");
                $("select#debar").focus();
                return false;
            }   
            var bras_Seal = $("select#bras_Seal option").filter(":selected").val();
            if (bras_Seal == "") {
                alert("Please select 'Is principal/centre superintendent brass seal is available if not arrange the same as it is for conducting the examination?'\n कृपया चुनें 'क्या प्राचार्य/केंद्र अधीक्षक पीतल की मुहर उपलब्ध है यदि परीक्षा आयोजित करने के लिए इसकी व्यवस्था नहीं की गई है?'");
                $("select#bras_Seal").focus();
                return false;
            }

        });


    });

</script>
