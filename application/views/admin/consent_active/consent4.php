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

   <h3 class="card-title"> <i class="fa fa-pencil"></i> Update Details for - <span style="font-weight:bold;"> <?php echo $user['exam_name']; ?> </span> </h3>

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

        <h3 class="mb-0">Step <span class="step-number">5</span></h3>

     

      </div>

      <ul class="progress-bar">

          <li >School/College/University Information <br>स्कूल/कॉलेज/विश्वविद्यालय विवरण</li>

        <li >Principal Details<br>प्रधानाचार्य का विवरण</li>

        <li >Centre Superintendent Details<br>केंद्र अधीक्षक का विवरण</li>

        <li >Infrastructure Details<br>बुनियादी ढांचे का विवरण</li>       

        <li class="active">Bank Details<br>बैंक विवरण</li>

        <li>Upload Images<br>तश्वीरें अपलोड करो</li>

      </ul>

    </div>

 

    <div class="right-side">

     



  <?php echo form_open_multipart(base_url('admin/consent_active/consent_add_4'), 'id="xin-form" class="form-horizontal" '); ?> 

    <div class="main active">

        <div class="text">

          <h2>Bank Details</h2>

          <p>Add School Bank Details</p>

        </div>

        <div class="row">

          <div class="form-group col-md-6">

            <label for="Address1">School/College/University Account Name<i style="color:#ff0000; font-size:12px;">*</i><br>(स्कूल / कॉलेज / संस्थान / विश्वविद्यालय खाता नाम)<i style="color:#ff0000; font-size:12px;">*</i></label>

            <input class="form-control" value="<?php if ($user['acc_holder_name'] != " ") {

                                  echo $user['acc_holder_name'];

                              } ?>" name="acc_holder_name" maxlength="60" id="acc_holder_name" type="text" value="" >

          </div>

          <div class="form-group col-md-6">

            <label for="Address2">Bank Name<i style="color:#ff0000; font-size:12px;">*</i><br>बैंक का नाम<i style="color:#ff0000; font-size:12px;">*</i></label>

            <input class="form-control" value="<?php if ($user['ban_name'] != " ") {

                                  echo $user['ban_name'];

                              } ?>" name="ban_name"  maxlength="60"  id="ban_name"  type="text" value="" >

          </div>

        </div>

     <div class="row">

       <div class="form-group col-md-6">

        <label for="Address2">Bank Branch Name<i style="color:#ff0000; font-size:12px;">*</i><br>बैंक शाखा का नाम<i style="color:#ff0000; font-size:12px;">*</i></label>

         <input class="form-control" value="<?php if ($user['branch_name'] != " ") {

                                  echo $user['branch_name'];

                              } ?>"  name="branch_name" maxlength="60" id="branch_name" type="text" value="" >

        

      </div>

      <div class="form-group col-md-6">

        <label for="Address1">Bank IFSC Code<i style="color:#ff0000; font-size:12px;">*</i><br>बैंक IFSC कोड<i style="color:#ff0000; font-size:12px;">*</i></label>

        <input class="form-control" value="<?php if ($user['ifsc'] != " ") {

                                  echo $user['ifsc'];

                              } ?>" name="ifsc" maxlength="60"  id="ifsc" type="text" value="" >



      </div>

    </div>

     <div class="row">

       <div class="form-group col-md-6 mb-5">

          <label for="Address2">Account Number<i style="color:#ff0000; font-size:12px;">*</i><br>खाता संख्या<i style="color:#ff0000; font-size:12px;">*</i></label>

        <input class="form-control" value="<?php if ($user['acc_num'] != " ") {

                                  echo $user['acc_num'];

                              } ?>"  name="acc_num" maxlength="60" minlength="8"  id="acc_num" type="text" value="" >

        

      </div>

              <div class="form-group col-md-6 mb-5">

       <label for="Address2">Confirm Account Number<i style="color:#ff0000; font-size:12px;">*</i><br>खाता संख्या की पुष्टि करें<i style="color:#ff0000; font-size:12px;">*</i></label>

                <input class="form-control" value="<?php if ($user['acc_num_con'] != " ") {

                                  echo $user['acc_num_con'];

                              } ?>" name="acc_num_con" maxlength="60" minlength="8" id="acc_num_con" type="text" value="" >

            

              </div>

      

    </div>



    

        <div class="foem-group mb-0">

        <?php $segment_value = $this->uri->segment(4);?>

            <input type="hidden" name="ci_exam_registrationid4" id="ci_exam_registrationid4" value="<?= $segment_value; ?>">

            <a  href="<?= base_url("admin/consent_active/consent_add_3".'/'.$segment_value ); ?>" class="btn btn-sec">Back</a>

     

            <!-- <input type="submit" name="submit" id="submit" class="btn btn-primary btn-block btn-flat next_button" value="Submit"> -->

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

                   

          if ($("#acc_holder_name").val() == "") {



            alert("Please enter 'School/College/Institute/University Account Name'\nकृपया 'स्कूल / कॉलेज / संस्थान / विश्वविद्यालय खाता नाम");

            $("#acc_holder_name").focus();

            return false;

          }



          if ($("#ban_name").val() == "") {



            alert("Please enter 'Bank Name'\nकृपया 'बैंक का नाम' दर्ज करें");

            $("#ban_name").focus();

            return false;

          }



          if ($("#branch_name").val() == "") {



            alert("Please enter 'Bank Branch Name'\nकृपया 'बैंक शाखा का नाम' दर्ज करें");

            $("#branch_name").focus();

            return false;

          }



          if ($("#ifsc").val() == "") {



            alert("Please enter 'Bank IFSC Code'\nकृपया 'बैंक IFSC कोड' दर्ज करें");

            $("#ifsc").focus();

            return false;

          }



          if ($("#acc_num").val() == "") {



            alert("Please enter 'Account Number'\nकृपया 'खाता संख्या' दर्ज करें");

            $("#acc_num").focus();

            return false;

          }



          if ($("#acc_num_con").val() == "") {



            alert("Please enter 'Confirm Account Number'\nकृपया 'खाता संख्या की पुष्टि करें' दर्ज करें");

            $("#acc_num_con").focus();

            return false;

          }

        });





  });

  $("form").submit(function() {

  var _txt1 = $('#acc_num').val();

  var _txt2 = $('#acc_num_con').val();



            if (_txt1 == _txt2){

               // alert('Matching!');

               return true;

            } else {

              alert("Please enter 'Confirm Account Number'\nकृपया 'खाता संख्या की पुष्टि करें' दर्ज करें");

              $("#acc_num").focus();

              // $(".acc_num_con").focus();

              return false;

            }

          });

  $('#acc_num_con').bind('copy paste',function(e) {

  e.preventDefault(); return false; 

});



</script>

