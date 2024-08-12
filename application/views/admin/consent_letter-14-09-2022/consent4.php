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

      <h3 class="card-title"> <i class="fa fa-pencil"></i> Registration for UKPSC exam Centre (यूके0पी0एस0सी0 परीक्षा केंद्र के लिए पंजीकरण) </h3>

    </div>

    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet'>

    <link rel="stylesheet" href="http://localhost/uk/assets/dist/css/cerrs.css">

    <style>



</style>

</head>

<body className='snippet-body'>

<div class="container">

  <div class="card">

   

    <div class="form">

      <div class="left-side">

        <div class="left-heading">

          <h3></h3>

        </div>

        <div class="steps-content">

          <h3>Step <span class="step-number">5</span></h3>

          <!--<p class="step-number-content active">Enter your School/College Information.</p>

          <p class="step-number-content d-none">Enter your School/College Principal Deatils</p>

          <p class="step-number-content d-none">Enter your School/College Centre Superintendent Details</p>

          <p class="step-number-content d-none">Enter your School/College Centre Infrastructure Details.</p>

		  <p class="step-number-content d-none">Add Bank Details</p>

		  <p class="step-number-content d-none">Add your School/College Images as per required filed</p>-->

		   

        </div>

        <ul class="progress-bar">

            <li >School/College Information <br>स्कूल/कॉलेज/विश्वविद्यालय विवरण</li>

          <li >Principal Details<br>प्रधानाचार्य का विवरण</li>

          <li >Centre Superintendent Details<br>केंद्र अधीक्षक का विवरण</li>

          <li >Infrastructure Details<br>बुनियादी ढांचे का विवरण</li>       

          <li class="active">Bank Details<br>बैंक विवरण</li>

          <li>Upload Images<br>तश्वीरें अपलोड करो</li>

        </ul>

      </div>

   

      <div class="right-side">

       



    <?php echo form_open_multipart(base_url('admin/step5'), 'id="xin-form" class="form-horizontal" '); ?> 

		  <div class="main active">

          <div class="text">

            <h2>Bank Details</h2>

            <p>Add School Bank Details</p>

          </div>

          <div class="input-text1">

			   <div class="input-div">

			   <label for="Address1">Account Holder Name<br>खाता धारक का नाम</label>

				  <input class="form-control" value="<?php if ($user['acc_holder_name'] != " ") {

                                    echo $user['acc_holder_name'];

                                } ?>" name="acc_holder_name" maxlength="60" id="acc_holder_name" type="text" value="" >

				

				</div>

				<div class="input-div">

				<label for="Address2">

Bank Name<br>बैंक का नाम</label>

				  <input class="form-control" value="<?php if ($user['ban_name'] != " ") {

                                    echo $user['ban_name'];

                                } ?>" name="ban_name"  maxlength="60"  id="ban_name"  type="text" value="" >

				

				</div>

		  </div>

		   <div class="input-text1">

			   <div class="input-div">

			    <label for="Address2">

Bank Branch Name<br>बैंक शाखा का नाम</label>

				   <input class="form-control" value="<?php if ($user['branch_name'] != " ") {

                                    echo $user['branch_name'];

                                } ?>"  name="branch_name" maxlength="60" id="branch_name" type="text" value="" >

				  

				</div>

				<div class="input-div">

				  <label for="Address1">

Bank IFSC Code<br>बैंक IFSC कोड</label>

				  <input class="form-control" value="<?php if ($user['ifsc'] != " ") {

                                    echo $user['ifsc'];

                                } ?>" name="ifsc" maxlength="60"  id="ifsc" type="text" value="" >



				</div>

		  </div>

		   <div class="input-text1">

			   <div class="input-div">

			      <label for="Address2">

Account Number<br>खाता संख्या</label>

				  <input class="form-control" value="<?php if ($user['acc_num'] != " ") {

                                    echo $user['acc_num'];

                                } ?>"  name="acc_num" maxlength="60" minlength="8"  id="acc_num" type="text" value="" >

				  

				</div>

                <div class="input-div">

				 <label for="Address2">

Confirm Account Number<br>

खाता संख्या की पुष्टि करें</label>

                  <input class="form-control" value="<?php if ($user['acc_num_con'] != " ") {

                                    echo $user['acc_num_con'];

                                } ?>" name="acc_num_con" maxlength="60" minlength="8" id="acc_num_con" type="text" value="" >

              

                </div>

				

		  </div>



		  

          <div class="buttons button_space col-md-8">

          <a  href="<?= base_url("admin/step4/" ); ?>" style="width: 85%" class="btn btn-success ">Back</a>

       

              <input type="submit" name="submit" id="submit" class="btn btn-primary btn-block btn-flat next_button" value="Submit">

          </div>

        </div>

          <?php echo form_close(); ?>



        </div>

		 

 

      </div>

    </div>

  </div>

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

                alert("Please enter 'Account Holder Name खाता धारक का नाम' ");

                $("#acc_holder_name").focus();

                return false;

            }

              if ($("#ban_name").val() == "") {

                alert("Please enter 'Bank Name बैंक का नाम' ");

                $("#ban_name").focus();

                return false;

            } 

              if ($("#branch_name").val() == "") {

                alert("Please enter 'Bank Branch Name बैंक शाखा का नाम' ");

                $("#branch_name").focus();

                return false;

            }

              if ($("#ifsc").val() == "") {

                alert("Please enter 'Bank IFSC Code बैंक IFSC कोड' ");

                $("#ifsc").focus();

                return false;

            }

            if ($("#acc_num").val() == "") {

                alert("Please enter 'Account Number खाता संख्या' ");

                $("#acc_num").focus();

                return false;

            } 

              if ($("#acc_num_con").val() == "") {

                alert("Please enter 'Confirm Account Number खाता संख्या की पुष्टि करें' ");

                $("#acc_num_con").focus();

                return false;

            }















          });





    });

    $("form").submit(function() {

  var _txt1 = $('#acc_num').val();

  var _txt2 = $('#acc_num_con').val();

  

              if (_txt1 == _txt2)

              {

                 // alert('Matching!');

                 return true;

              }

              else

              {

                alert('Confirm Account Number  Does Not Match to  Account Number (खाता संख्या)');

                return false;

              }

            });

    $('#acc_num_con').bind('copy paste',function(e) {

    e.preventDefault(); return false; 

});



</script>

