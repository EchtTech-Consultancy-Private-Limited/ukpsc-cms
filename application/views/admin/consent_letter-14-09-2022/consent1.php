<script type="text/javascript">

    $(function () {

        $('input').blur(function () {

            $(this).val(

                    $.trim($(this).val())

                    );

        });

    });

</script>

<style type="text/css">

    .color{

        background-color: #d7d2d2;

    }

</style>

 

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

          <h3>Step <span class="step-number">2</span></h3>

          <!--<p class="step-number-content active">Enter your School/College Information.</p>

          <p class="step-number-content d-none">Enter your School/College Principal Details</p>

          <p class="step-number-content d-none">Enter your School/College Centre Superintendent Details</p>

          <p class="step-number-content d-none">Enter your School/College Centre Infrastructure Details.</p>

		  <p class="step-number-content d-none">Add Bank Details</p>

		  <p class="step-number-content d-none">Add your School/College Images as per required filed</p>-->

		   

        </div>

        <ul class="progress-bar">

          <li >School/College/University Information<br>स्कूल/कॉलेज/विश्वविद्यालय विवरण</li>

          <li class="active">Principal Details<br>प्रधानाचार्य का विवरण</li>

          <li>Centre Superintendent Details<br>केंद्र अधीक्षक का विवरण</li>

          <li>Infrastructure Details<br>बुनियादी ढांचे का विवरण</li>		  

		  <li>Bank Details<br>बैंक विवरण</li>

		  <li>Upload Images<br>तश्वीरें अपलोड करो</li>

        </ul>

      </div>

   

      <div class="right-side">

       

        <?php echo form_open_multipart(base_url('admin/step2'), 'id="xin-form" class="form-horizontal" '); ?> 

        <div class="main active">

          <div class="text">

            <h2>Principal's Details (प्राचार्य का विवरण)</h2>

            <p>Enter your School/College/Institute Principal Details</p>

          </div>

          <div class="input-text">

            <div class="input-div">

              

              <label>Principal Name (प्राचार्य का नाम)</label> 

              <input type="text" name="principal_name" class="color"  id="principal_name" required readonly require  value="<?php echo $admin['principal_name'] ?>" >

          </div>

            <div class="input-div">



              <label>Mobile No. (मोबाइल नंबर)</label>

   <input type="text" name="pri_mobile" id="pri_mobile" class="color" required readonly value="<?php echo $admin['pri_mobile'] ?>" >

               </div>

          

		     <div class="input-div">

              

              <label>Email ID (ईमेल आईडी)</label> 

               <input type="text" name="email" id="email" class="color" required readonly require value="<?php echo $admin['email'] ?>" >

          </div>

         

            <div class="input-div">

              

              <label>Whats App No. (व्हाट्सएप नंबर)</label> 

              <input type="text" name="whats_num" class="color" id="whats_num" required readonly require value="<?php echo $admin['whats_num'] ?>" >



            </div>

          </div>

          <div class="buttons button_space col-md-4">

     

             <a  href="<?= base_url("admin/step1/" ); ?>" style="width: 85%x;" title="Download Form"  class="btn btn-success ">Back</a>

       

              <input type="submit" name="submit" id="submit" class="btn btn-primary btn-block btn-flat next_button" value="Next">

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

                                });</script>

</script>

