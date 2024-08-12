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

        <div class="left-heading">

          <h3></h3>

        </div>

        <div class="steps-content">

          <!-- <h3>Step <span class="step-number">6</span></h3> -->

          <!--<p class="step-number-content active">Enter your School/College Information.</p>

          <p class="step-number-content d-none">Enter your School/College Principal Deatils</p>

          <p class="step-number-content d-none">Enter your School/College Centre Superintendent Details</p>

          <p class="step-number-content d-none">Enter your School/College Centre Infrastructure Details.</p>

		  <p class="step-number-content d-none">Add Bank Details</p>

		  <p class="step-number-content d-none">Add your School/College Images as per required filed</p>-->

		   

        </div>

        <ul class="progress-bar">

          <li >School/College/University Information</li>

          <li >Principal Details</li>

          <li >Centre Superintendent Details</li>

          <li >Infrastructure Details</li>		  

		  <li >Bank Details</li>

		  <li >Upload Images</li>

        </ul>

      </div>

   

      <div class="right-side">

	

		<div class="main active" style="text-align:center">

			<svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">

            <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none"/>

            <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"/>

          </svg>

          <div class="text congrats">

            <h2>Congratulations!</h2>

            <p>Thanks Mr./Mrs. <span class="shown_name"> <?php echo $admin['principal_name']; ?>  </span> your information have been submitted successfully for the future reference we will contact you soon.</p>

			

			

			

			

          </div>

		  <p style="color:red;">You will be auto redirected to listing page </p>

        </div>

        </div>



		

		 

 

      </div>

    </div>

  </div>

</div>

</div>

</section>

      </div>

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

 

 

function validateform(){

    validate=true;

    var validate_inputs=document.querySelectorAll(".main.active input");

    validate_inputs.forEach(function(vaildate_input){

        vaildate_input.classList.remove('warning');

        if(vaildate_input.hasAttribute('require')){

            if(vaildate_input.value.length==0){

                validate=false;

                vaildate_input.classList.add('warning');

            }

        }

    });

    return validate;

    

}</script>

<script type='text/javascript'>var myLink = document.querySelector('a[href="#"]');

                                myLink.addEventListener('click', function(e) {

                                  e.preventDefault();

                                });

								

					$(document).ready(function () {

    // Handler for .ready() called.

    window.setTimeout(function () {

        location.href ="<?= base_url('admin/profile/consent_user') ?>";



		

    }, 5000);

});

								

								

								

								</script>

</script>

