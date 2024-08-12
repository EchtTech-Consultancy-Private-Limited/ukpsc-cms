<style type="text/css">
    
</style>

<div class="form-background"> 
    <div class="register-box">
      

        <div class="card_reg">
              <div class="register-logo">
            <img src="<?= base_url(); ?>assets/dist/img/ukpsc_logo.png" />
    <!--      <h2><a href="<?= base_url('admin'); ?>"><?= $this->general_settings['application_name']; ?></a></h2>-->
        </div>
            <div class="card-body register-card-body custom-register">
                <p class="mb-4 head1">Registration of School/College for UKPSC Exam Centre <br>यूके0पी0एस0सी0 परीक्षा केंद्र के लिए स्कूल/कॉलेज का पंजीकरण</p>

                <?php $this->load->view('admin/includes/_messages.php') ?>
                <label style="font-style: oblique;"><span style="color:red;font-style: italic;">*</span>Marked fields are mandatory (चिह्नित फ़ील्ड अनिवार्य हैं)</label>
                <?php echo form_open(base_url('admin/auth/register'), 'id="xin-form" class="login-form" '); ?>
                <script type="text/javascript">
                    $(function () {
                        $('input').blur(function () {
                            $(this).val(
                                    $.trim($(this).val())
                                    );
                        });
                    });
                </script>
                <div class="row">


                    <div class="form-group has-feedback col-md-6">
                        <label>School/College/University Registration No. <br>(स्कूल/कॉलेज/विश्वविद्यालय पंजीकरण संख्या)<span>*</span></label>
                        <input type="text"  style="text-transform:capitalize;"  maxlength="12" name="school_registration" id="school_registration" value=""  class="form-control" placeholder="" >
                    </div>
                    <div class="form-group has-feedback col-md-6">
                        <label>School/College/University Name <br>(स्कूल/कॉलेज/विश्वविद्यालय का नाम)<span>*</span></label>
                        <input type="text" name="school_name" maxlength="100" style="text-transform:capitalize;"  id="school_name" value="<?php if (old('school_name') != " ") {
                                    echo old('school_name');
                                } ?>"  class="form-control" placeholder="" >
                    </div>
                    <div class="form-group has-feedback col-md-6">
                        <label>Complete Address with Pincode (पिनकोड के साथ पूरा पता)<span>*</span></label>
                        <input type="text" name="address" style="text-transform:capitalize;"  id="address" value="<?php if (old('address') != " ") {
                                    echo old('address');
                                } ?>"  class="form-control" maxlength="255" placeholder="" >
                    </div>
                    <div class="form-group has-feedback col-md-6">
                        <label>Landmark (सीमाचिह्न)</label>
                        <input type="text" name="landmark" style="text-transform:capitalize;"  id="landmark" value="<?php if (old('landmark') != " ") {
                                    echo old('landmark');
                                } ?>"  class="form-control" maxlength="60" placeholder="" >
                    </div>


                    <div class="form-group has-feedback col-md-6">
                        <label>District (जिला)<span>*</span></label>
                          <select name="state" id="state" class="form-control">
                            <option value=""><?= trans('select_state') ?></option>
                            <?php foreach ($states as $k => $state) { ?>
                    <option value="<?= $state->id ?>"  ><?= $state->name ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group has-feedback col-md-6">
                        <label>City (शहर )<span>*</span></label>
                         <select name="city" id="city" class="form-control">
                            <option value=""> Select City</option>
                        </select>
                    </div>
                     <div class="form-group has-feedback col-md-6">
                        <label>Principal Name (प्राचार्य का नाम) <span>*</span></label>
                        <input type="text" name="principal_name" style="text-transform:capitalize;"  id="principal_name" value="<?php if (old('principal_name') != " ") {
                                    echo old('principal_name');
                                } ?>"  class="form-control" maxlength="155" placeholder="" >
                    </div> 
					 <div class="form-group has-feedback col-md-6">
                        <label>Whats App No. (व्हाट्सएप नंबर)<span >*</span></label>
                        <input type="text" name="whats_num" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"   id="whats_num" value="<?php if (old('whats_num') != " ") {
                                    echo old('whats_num');
                                } ?>"  class="form-control" maxlength="10" placeholder="" >
                    </div>
                    <div class="form-group has-feedback col-md-6">
                        <label>Mobile No. (मोबाइल नंबर)<span >*</span></label>
                        <input type="text" name="pri_mobile" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"   id="pri_mobile" value="<?php if (old('pri_mobile') != " ") {
                                    echo old('pri_mobile');
                                } ?>"  class="form-control" maxlength="10" placeholder="" >
                    </div>
					  <div class="form-group has-feedback col-md-6">
                        <label>Confirm Mobile No. (मोबाइल नंबर)<span >*</span></label>
                        <input type="text" name="pri_mobile_confirm" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"  id="pri_mobile_confirm" value="<?php if (old('pri_mobile_confirm') != " ") {
                                    echo old('pri_mobile_confirm');
                                } ?>"  class="form-control" maxlength="10" placeholder="" >
                    </div>
                    <div class="form-group has-feedback col-md-6">
                        <label>Email ID(ईमेल आईडी)<span >*</span> <span style="font-size:9px">(All communication from UKPSC will be sent to this email address.)</span></label>
                        <input type="text" name="email" id="email" value="<?php if (old('email') != " ") {
                                    echo old('email');
                                } ?>"  class="form-control" maxlength="60" placeholder="" >
                    </div> 
					<div class="form-group has-feedback col-md-6">
                        <label>Confirm Email ID(ईमेल आईडी)<span >*</span></label>
                        <input type="text" name="email_confirm" id="email_confirm" value="<?php if (old('email_confirm') != " ") {
                                    echo old('email_confirm');
                                } ?>"  class="form-control" maxlength="60" placeholder="" >
                    </div> 
                   


                    <div class="form-group has-feedback col-md-6">
						
                        <label>Captcha (केप्चा)<span>*</span></label>
                        <div class="row">
                            <!-- <div class="form-group has-feedback col-md-6"> -->
                            <div class="col-md-6">

                                <input type="text" name="cpatchaTextBox" id="cpatchaTextBox" class="form-control" placeholder="" >
                            </div>
                            <div class="col-md-6">
                                <div class="form-group has-feedback  " name="captcha" id="captcha" style="width: 170px;" ></div>
                                <div style="margin-top: -45px; float: right;margin-right: -168px;"> <i class="fa fa-refresh cursor" id="captcha_refres" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;<label>Refresh Captcha (कैप्चा को रिफ्रेश करें)</label></div>
                                <script type="text/javascript">

                                    $("#captcha_refres").on('click', function () {
                                        createCaptcha();
                                    });

                                </script>
                            </div>
                        </div>   
					</div>
                </div>
				<div class="row justify-content-center">
						 <div class="col-md-9 checkbox icheck">
                                    <label >
                                        <input type="checkbox" id="i_agree" style="margin-right: 10px;"> <?= trans('i_agree_to_the') ?> and confirm above data is correct. (मैं सहमत हूं और पुष्टि करता हूं कि उपरोक्त डेटा सही है।)
                                    </label>
                         </div>
						 </div> 
						 <div class="row justify-content-center">
							 <div class="form-group has-feedback col-md-2">
							 <input type="reset" name="" id="" class="btn btn-primary btn-block btn-flat" value="Reset (रीसेट करें)"> 
							 </div>
							  <div class="form-group has-feedback col-md-3">
							 <input type="submit" name="submit" id="submit" class="btn btn-primary btn-block btn-flat" value="<?= trans('create_form_new') ?> (खाता बनाएं)">
							 </div>
						</div> 
						 <div class="row justify-content-center">
							 <div class="form-group has-feedback col-md-8">
							 <a href="<?= base_url('admin/auth/login'); ?>" class="text-center "><?= trans('i_already_have_membership') ?> (क्या आपके पास पहले से एक खाता मौजूद है? लॉग इन करें)</a>
							 </div>
							 
						</div> 
				<div class="row justify-content-center">

                   
                    
<?php if ($this->recaptcha_status): ?>
                        <div class="recaptcha-cnt">
    <?php generate_recaptcha(); ?>
                        </div>
<?php endif; ?>
                    <!-- /.col -->

                    <!-- /.col -->
                </div>
<?php echo form_close(); ?>
  <hr>
                <span style="font-size:10px; text-align:center;">Site is best viewed in 1024 X 768 resolution. Content provided by Uttarakhand Public Service Commission <br>साइट को 1024 x 768 रिज़ॉल्यूशन में सबसे अच्छी तरह से देखा जाता है। उत्तराखंड लोक सेवा आयोग द्वारा प्रदान की गई सामग्री</span>

            </div>
            <!-- /.form-box -->
        </div><!-- /.card -->

    </div>
</div>

<script>
    $(document).ready(function () {

         $(function () {
            $('#state').change(function () {
                var district_id = $(this).val();
                if (district_id != '') {
                    $('#othstate').val('').hide();

                    $.ajax({
                        type: "POST",
                        url: base_url + 'admin/location/get_city_by_state_id',
                        dataType: 'html',
                        data: {'district_id': district_id, 'csfr_token_name': csfr_token_value},
                        success: function (data) {
                            $('#city').html(data);
                        }
                    });
                } else {
                    $('#state').val('').hide();
                    $('#othstate').show();
                }
            });
        });
    });

        
        createCaptcha();
        $("#xin-form")["submit"](function () {
            // d.preventDefault();
           
            if ($("#school_registration_number").val() == "") {
                alert("Please enter 'School Registration No.(कृपया 'स्कूल/कॉलेज/संस्थान पंजीकरण संख्या' दर्ज करें।)' ");
                $("#school_registration_number").focus();
                return false;
            }
            if ($("#school_name").val() == "") {
                alert("Please enter 'School/College/Institute Name(कृपया 'स्कूल/कॉलेज/संस्थान का नाम' दर्ज करें)' ");
                $("#school_name").focus();
                return false;
            } 
             if ($("#address").val() == "") {
                alert("Please enter 'Address(कृपया 'पता' दर्ज करें)");
                $("#address").focus();
                return false;
            }
              
                if ($("#landmark").val() == "") {
                alert("Please enter 'Landmark (कृपया 'लैंडमार्क' दर्ज करें)'");
                $("#landmark").focus();
                return false;
            }

            var dis = $("select#district option").filter(":selected").val();
            if (dis == "") {
                alert("Please select 'District(कृपया 'जिला' चुनें)'");
                $("select#district").focus();
                return false;
            }
             var city = $("select#city option").filter(":selected").val();
            if (city == "") {
                alert("Please select 'City(कृपया 'शहर' चुनें)'");
                $("select#city").focus();
                return false;
            }

             if ($("#principal_name").val() == "") {
                alert("Please enter 'Principal Name(कृपया प्राचार्य का नाम दर्ज करें)");
                $("#principal_name").focus();
                return false;
            }
            if ($("#whats_num").val() == "") {
                alert("Please enter 'Whats App No. (व्हाट्सएप नंबर)");
                $("#whats_num").focus();
                return false;
            }
        
            var fmobileno = $('#pri_mobile').val();
            if (fmobileno == "") {
                alert("Please enter 'Mobile No.(कृपया 'मोबाइल नंबर' दर्ज करें।)'");
                $('#pri_mobile').focus();
                return false;
            }
            if (fmobileno.length != 10) {
                alert("Please enter 'Mobile Number' with 10 digit number (कृपया 10 अंकों की संख्या के साथ 'मोबाइल नंबर' दर्ज करें)");
                $('#pri_mobile').focus();
                return false;
            }
            var cno = $('#pri_mobile_confirm').val();
            
            if(cno != fmobileno  ) {

                alert('Mobile No. (मोबाइल नंबर)  Does Not Match to  Confirm Mobile No. (मोबाइल नंबर)');
                $('#pri_mobile_confirm').focus();
                return false;
            }

            var femail = $("#email").val();
                     if (femail == "") {
                alert("Please enter 'Email Address'(कृपया 'ईमेल पता' दर्ज करें)");
                $("#email").focus();
                return false;
            }
             var emailconfirm = $("#email_confirm").val();
         
            if(femail != emailconfirm  ) {

                alert('Confirm Email ID(ईमेल आईडी)  Does Not Match to  Email ID(ईमेल आईडी की पुष्टि करें, ईमेल आईडी से मेल नहीं खाता)');
                $('#email_confirm').focus();
                return false;
            }
            var mailformat = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            if (!femail.match(mailformat)) {
                alert("You have entered an invalid email ID! (आपने एक अमान्य ईमेल आईडी दर्ज की है!)");
                $("#email").focus();
                return false;
            }

         
            var fmobileno1 = $('#whats_num').val();
            if (fmobileno1 == "") {
                alert("Please enter 'Whats App No.(कृपया 'व्हाट्सएप नंबर' दर्ज करें।)'");
                $('#whats_num').focus();
                return false;
            }
            if (fmobileno1.length != 10) {
                alert("Please enter 'Mobile Number' with 10 digit number (कृपया 10 अंकों की संख्या के साथ 'मोबाइल नंबर' दर्ज करें)");
                $('#whats_num').focus();
                return false;
            }

            if ($("#cpatchaTextBox").val() != code) {
                alert("Invalid Captcha. try Again");
                createCaptcha();
                document.getElementById("cpatchaTextBox").value = "";
                $("#cpatchaTextBox").focus();
                return false;
            }

            if ($("#i_agree").prop("checked") == false) {
                alert("please click the check box I agree to the and confirm above data is correct. (कृपया चेक बॉक्स पर क्लिक करें  मैं सहमत हूं और पुष्टि करता हूं कि उपरोक्त डेटा सही है।)");
                $("#i_agree").focus();
                return false;
            }
        });

       
//createCaptcha function code//
    var code;
    function createCaptcha() {
        //clear the contents of captcha div first 
        document.getElementById('captcha').innerHTML = "";
        var charsArray =
                "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        var lengthOtp = 7;
        var captcha = [];
        for (var i = 0; i < lengthOtp; i++) {
            //below code will not allow Repetition of Characters
            var index = Math.floor(Math.random() * charsArray.length + 1); //get the next character from the array
            if (captcha.indexOf(charsArray[index]) == -1)
                captcha.push(charsArray[index]);
            else
                i--;
        }
        var canv = document.createElement("canvas");
        canv.id = "captcha";
        canv.width = 100;
        canv.height = 30;
        var ctx = canv.getContext("2d");
        ctx.font = "20px Georgia";
        ctx.strokeText(captcha.join(""), 0, 22);
        //storing captcha so that can validate you can save it somewhere else according to your specific requirements
        code = captcha.join("");
        document.getElementById("captcha").appendChild(canv); // adds the canvas to the body element
    }


     $('#principal_name,#school_name').keydown(function(er)
            {
            if(er.altKey||er.ctrlKey)
            {
            er.preventDefault();
            }
            else
            {var key=er.keyCode;
            if(!((key==8)||(key==9)||(key==32)||(key==46)||(key>=65 && key<=90)))
                {
                     er.preventDefault();
                     // alert("Please Enter Only Alphabets")
                }
            }
         });
 
</script>
