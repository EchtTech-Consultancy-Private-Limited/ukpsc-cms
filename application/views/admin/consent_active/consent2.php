

<div class="content-wrapper">

<!-- Main content -->

<section class="content">

<div class="card card-default color-palette-bo">

  <div class="card-header">

    <div class="d-inline-block">

       <h3 class="card-title"> <i class="fa fa-pencil"></i> Update Details for - <span style="font-weight:bold;"> <?= $exam_name[0]['subjectline']; ?> </span> </h3>

    </div>

    </div>

  <div class="card-body">

<div class="container">

  <div class="card">

   

    <div class="form">

      <div class="left-side">

        <!-- <div class="left-heading">

          <h3></h3>

        </div> -->

        <div class="steps-content">

          <h3 class="mb-0">Step <span class="step-number">3</span></h3>  

        </div>

        <ul class="progress-bar">

         <li>School/College/University Information<br>स्कूल/कॉलेज/विश्वविद्यालय विवरण</li>

          <li>Principal Details<br>प्रधानाचार्य का विवरण</li>

          <li class="active">Centre Superintendent Details<br>केंद्र अधीक्षक का विवरण</li>

          <li>Infrastructure Details<br>बुनियादी ढांचे का विवरण</li>          

          <li>Bank Details<br>बैंक विवरण</li>

          <li>Upload Images<br>तश्वीरें अपलोड करो</li>

        </ul>

      </div>

   

      <div class="right-side">

 

     

                <?php echo form_open_multipart(base_url('admin/consent_active/consent_add_2'), 'id="xin-form" class="form-horizontal" '); ?> 

        <div class="main active ">

          <div class="text">

            <h2>Centre Superintendent Details (केंद्र अधीक्षक का विवरण)</h2>

            <p>Enter your School/College/University Centre Superintendent Details</p>

          </div>

         <div class="input-text">

            <div class="form-group">

              <label for="mobile_no" class="col-sm- control-label">Centre Superintendent Name <i style="color:#ff0000; font-size:12px;">*</i><br>(केंद्र अधीक्षक का नाम)<i style="color:#ff0000; font-size:12px;">*</i></label>

              <input class="form-control" type="text" name="super_name" value="<?php if ($user['super_name'] != "") {

                                    echo $user['super_name'];

                                } ?>" id="super_name" >

            </div>

              

            <div class="form-group">

                <label for="mobile_no" class="col-sm- control-label">Designation<i style="color:#ff0000; font-size:12px;">*</i><br> (पदनाम)<i style="color:#ff0000; font-size:12px;">*</i></label>

              <input class="form-control" type="text" name="super_design" id="super_design"  value="<?php if ($user['super_design'] != " ") {

                                    echo $user['super_design'];

                                } ?>" >

            </div>

             

            <div class="form-group">

              <label >Alternate Mobile No.<i style="color:#ff0000; font-size:12px;">*</i><br> (मोबाइल नंबर)<i style="color:#ff0000; font-size:12px;">*</i></label>

              <input class="form-control" readonly type="text" name="super_mobile" maxlength="10" 
                value="<?php if ($user['super_mobile'] != " ") {
                              echo $user['super_mobile'];
                                } ?>" id="super_mobile" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" >

              </div>

          

             <div class="form-group">

             <label for="district" class="col-md-12 control-label">Email (used for communication with UKPSC) ईमेल (यूकेपीएससी के साथ संचार के लिए प्रयुक्त)<i style="color:#ff0000; font-size:12px;">*</i></label>

              <input class="form-control" readonly type="text"
               value="<?php echo isset($user['email'])?$user['email']:'' ?>" 
                name="super_email" id="super_email"  >

               </div>

         

            <div class="form-group">

            <label for="district" class="col-md-12 control-label">Whats App No.<i style="color:#ff0000; font-size:12px;">*</i><br> (व्हाट्सएप नंबर)<i style="color:#ff0000; font-size:12px;">*</i></label>

              <input class="form-control" readonly type="text" name="super_whatspp" maxlength="10"  
              value="<?php if ($user['super_mobile'] != " ") {
                              echo $user['super_mobile'];
                                } ?>"  id="super_whatspp"  oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"  >

              

            </div>

          </div>

          <div class="form-group mb-0">

          <?php $segment_value = $this->uri->segment(4);?>

            <input type="hidden" name="ci_exam_registrationid2" id="ci_exam_registrationid2" value="<?= $segment_value; ?>">

           <a  href="<?= base_url("admin/consent_active/consent_add_1/".$segment_value); ?>"   class="btn btn-sec">Back</a>

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

    

//}



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

                     

            if ($("#super_name").val() == "") {

                alert("Please enter 'Centre Superintendent Name'\nकृपया 'केंद्र अधीक्षक का नाम' दर्ज करें");

                $("#super_name").focus();

                return false;

            }

            if ($("#super_design").val() == "") {

                alert("Please enter 'Designation'\nकृपया 'पदनाम' दर्ज करें ");

                $("#super_design").focus();

                return false;

            }     

    

            var fmobileno = $('#super_mobile').val();

            if (fmobileno == "") {

                alert("Please enter 'Mobile No'.\nकृपया 'मोबाइल नंबर' दर्ज करें।'");

                $('#super_mobile').focus();

                return false;

            }

            if (fmobileno.length != 10) {

                alert("Please enter 'Mobile Number' with 10 digit number\nकृपया 10 अंकों की संख्या के साथ 'मोबाइल नंबर' दर्ज करें");

                $('#super_mobile').focus();

                return false;

            }



            //Validation For Emailid

            var femail = $("#super_email").val();

            if (femail == "") {

                alert("Please enter 'Email ID'\nकृपया 'ईमेल आईडी' दर्ज करें");

                $("#super_email").focus();

                return false;

            }

            var mailformat = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

            if (!femail.match(mailformat)) {

                alert("You have entered an invalid email ID!\nआपने एक अमान्य ईमेल आईडी दर्ज की है!");

                $("#super_email").focus();

                return false;

            }

            var fmobileno1 = $('#super_whatspp').val();

            if (fmobileno1 == "") {

                alert("Please enter 'Whats App No.\nकृपया 'व्हाट्सएप नंबर' दर्ज करें।");

                $('#super_whatspp').focus();

                return false;

            }

            if (fmobileno1.length != 10) {

                alert("Please enter 'Whats App No.' with 10 digit number\nकृपया 10 अंकों की संख्या के साथ 'व्हाट्सएप मोबाइल नंबर' दर्ज करें");

                $('#super_whatspp').focus();

                return false;

            }



        });





    });



</script>

