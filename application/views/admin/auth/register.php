<?php 
// echo '<pre>';
// print_r($data);
// echo '<hr/>';
// print_r($data['errors']);
// exit;
?>

<link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
<style type="text/css">
.control-sidebar {
    display: none;
}
.head1{
    width:100%;

}
.register-captcha{
    margin-top: -45px; float: right;margin-right: -168px;
}
@media screen and (max-width:750px){
    .register-captcha{
        margin-right:0px;
        margin-top:-5px;
    }
 
}
@media screen and (min-width:750px) and  (max-width:1200px){
    .register-captcha{
    margin-right:-270px;
    margin-top:-50px;
}

}
</style>

<div class="form-background">
    <div class="register-box">
        <div class="card_reg" style="border-color: #373250;">
            <div class="register-logo" style="background-color:#373250; color:#fff; border-radius:20px 20px 0 0;">
                <div style="float:left; margin: 1% 0 0 1%; "><img style="width: 100px;"
                        src="<?= base_url(); ?>assets/dist/img/ukpsc_logo.png" /></div>
                <div style="float:right">
                    <p class="mb-4 head1 text-bold" style="background-color:#373250; margin: 8% 0 0 0%; ">Registration
                        of School/College for UKPSC Exam Centre <br>यू0के0पी0एस0सी0 परीक्षा केंद्र के लिए स्कूल/कॉलेज का
                        पंजीकरण</p>
                </div>
                <!--<h2><a href="<?= base_url('admin'); ?>"><?= $this->general_settings['application_name']; ?></a></h2>-->
            </div>
            <div class="card-body register-card-body custom-register"
                style="border-radius: 0 0 20px 20px; background: #fff;">
                <?php $this->load->view('admin/includes/_messages.php') ?>
                <label class="mb-4" style="font-style: oblique; color: #373250;"><span class="mr-1"
                        style="color:red;font-style: italic;">*</span>Marked fields are mandatory (चिह्नित फ़ील्ड
                    अनिवार्य हैं)</label>
                <?php echo form_open(base_url('admin/auth/register'), 'id="xin-form" class="login-form" '); ?>
                <script type="text/javascript">
                $(function() {
                    $('input').blur(function() {
                        $(this).val(
                            $.trim($(this).val())
                        );
                    });
                });
                </script>

                <div id="Error_Message" style="text-align: center; color:red;">
                    <?php $errormeassage = $this->session->flashdata('allerrorshow'); echo $errormeassage; ?>
                </div>
                <div class="row">


                    <div class="form-group has-feedback col-md-6">
                        <label>School/College/University Registration No. <br>(स्कूल/कॉलेज/विश्वविद्यालय पंजीकरण
                            संख्या)<span>*</span></label>
                        <input type="text" style="text-transform:capitalize;" maxlength="40" name="school_registration"
                            id="school_registration" value="<?php if (old('school_registration') != " ") {
                                    echo old('school_registration');} ?>" class="form-control" placeholder="">
                    </div>
                    <div class="form-group has-feedback col-md-6">
                        <label>School/College/University Name <br>(स्कूल/कॉलेज/विश्वविद्यालय का
                            नाम)<span>*</span></label>
                        <input type="text" name="school_name" maxlength="300" style="text-transform:capitalize;"
                            id="school_name" value="<?php if (old('school_name') != " ") {
                                    echo old('school_name');} ?>" class="form-control" placeholder="">
                    </div>
                    <div class="form-group has-feedback col-md-6">
                        <label>Address Line 1 (पता पंक्ति 1)<span>*</span></label>
                        <input type="text" name="address1" style="text-transform:capitalize;" id="address1"
                         value="<?php if (old('address1') != " ") {
                                    echo old('address1');
                                } ?>" class="form-control" maxlength="255" placeholder="">
                    </div>

                      <div class="form-group has-feedback col-md-6">
                        <label>Address Line 2 (पता पंक्ति 2)</label>
                        <input type="text" name="address2" style="text-transform:capitalize;" id="address2" value="<?php if (old('address2') != " ") {
                                    echo old('address2');
                                } ?>" class="form-control" maxlength="255" placeholder="">
                    </div>

                      <div class="form-group has-feedback col-md-6">
                        <label>Pincode (पिनकोड)<span>*</span></label>
                        <input type="text" name="address3" style="text-transform:capitalize;"  id="address3" maxlength="6" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" value="<?php if (old('address3') != " ") {
                                    echo old('address3');
                                } ?>" class="form-control" maxlength="255" placeholder="">
                    </div>
                    <div class="form-group has-feedback col-md-6">
                        <label>Landmark (सीमाचिह्न)<span>*</span></label>
                        <input type="text" name="landmark" style="text-transform:capitalize;" id="landmark" value="<?php if (old('landmark') != " ") {
                                    echo old('landmark');
                                } ?>" class="form-control" maxlength="60" placeholder="">
                    </div>


                    <div class="form-group has-feedback col-md-6">
                        <label>District (जिला)<span>*</span></label>
                        <select name="district" id="district" class="form-control">
                            <option value=""><?= trans('select_district') ?></option>
                            <?php foreach ($states as $k => $state) { ?>
                            <option value="<?= $state->id ?>"><?= $state->name ?></option>
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
                        <input type="text" name="principal_name" style="text-transform:capitalize;" id="principal_name"
                            value="<?php if (old('principal_name') != " ") {
                                    echo old('principal_name');
                                } ?>" class="form-control" maxlength="155" placeholder="">
                    </div>
                    <div class="form-group has-feedback col-md-6">
                        <label>Whats App No. (व्हाट्सएप नंबर)<span>*</span></label>
                        <input type="text" name="whats_num"
                            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                            id="whats_num" value="<?php if (old('whats_num') != " ") {
                                    echo old('whats_num');
                                } ?>" class="form-control mobileValidation" maxlength="10" placeholder="">
                    </div>
                    
                    <div class="form-group has-feedback col-md-6">
                        <label>Mobile No. (मोबाइल नंबर)<span>*</span> <span style="font-size:9px;">(All communication from
                                UKPSC will be sent to this Mobile.)</span></label>
                        <input type="text" name="pri_mobile"
                            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                            id="pri_mobile" value="<?php if (old('pri_mobile') != " ") {
                                    echo old('pri_mobile');
                                } ?>" class="form-control mobileValidation" maxlength="10" placeholder="">
                    </div>
                    <div class="form-group has-feedback col-md-6">
                        <label>Confirm Mobile No. (मोबाइल नंबर)<span>*</span></label>
                        <input type="text" name="pri_mobile_confirm"
                            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                            id="pri_mobile_confirm" value="<?php if (old('pri_mobile_confirm') != " ") {
                                    echo old('pri_mobile_confirm');
                                } ?>" class="form-control mobileValidation" maxlength="10" placeholder="">
                    </div>
                    <div class="form-group has-feedback col-md-6">
                        <label>Email ID(ईमेल आईडी)<span>*</span> <span style="font-size:9px;">(All communication from
                                UKPSC will be sent to this email address.)</span></label>
                        <input type="text" name="email" id="email" value="<?php if (old('email') != " ") {
                                    echo old('email');
                                } ?>" class="form-control" maxlength="60" placeholder="">
                    </div>
                    <div class="form-group has-feedback col-md-6">
                        <label>Confirm Email ID(ईमेल आईडी)<span>*</span></label>
                        <input type="text" name="email_confirm" id="email_confirm" value="<?php if (old('email_confirm') != " ") {
                                    echo old('email_confirm');
                                } ?>" class="form-control" maxlength="60" placeholder="">
                    </div>



                    <div class="form-group has-feedback col-md-6">

                        <label>Captcha (केप्चा)<span>*</span></label>
                        <div class="row">
                            <!-- <div class="form-group has-feedback col-md-6"> -->
                            <div class="col-md-6">

                                <input type="text" name="cpatchaTextBox" id="cpatchaTextBox" class="form-control"
                                    placeholder="">
                            </div>
                            <div class="col-md-6">
                                <div class="form-group has-feedback  " name="captcha" id="captcha"
                                    style="width: 170px;"></div>
                                <div class="register-captcha" > <i
                                        class="fa fa-refresh cursor" id="captcha_refres"
                                        aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;<label>Refresh Captcha (कैप्चा को
                                        रिफ्रेश करें)</label></div>
                                <script type="text/javascript">
                                $("#captcha_refres").on('click', function() {
                                    createCaptcha();
                                });
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center mb-4">
                    <div class="col-md-12 checkbox icheck">

                        <input type="checkbox" id="i_agree" name="i_agree" style="margin-right: 10px;">
                        <?php // echo trans('i_agree_to_the') ?>
                        <!-- and confirm above data is correct. (मैं सहमत हूं और पुष्टि करता हूं कि उपरोक्त डेटा सही है।) -->
                        <label>
                            I checked the information furnished above and its correct (मैंने ऊपर दी गई जानकारी की जाँच
                            की और यह सही है)
                        </label>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="d-flex flex-md-row flex-column justify-content-center align-items-center">
                            <div class="form-group has-feedback mr-4">
                                <input type="reset" name="" id="" class="btn btn-signin btn-block btn-flat"
                                    value="Reset (रीसेट करें)">
                            </div>
                            <div class="form-group has-feedback">
                                <input type="submit" name="submit" id="submit" class="btn btn-signin btn-block btn-flat"
                                    value="<?= trans('create_form_new') ?> (खाता बनाएं)">
                            </div>
                        </div>

                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="form-group has-feedback col-md-12 text-center">
                        <a href="<?= base_url('admin/auth/login'); ?>"
                            class="text-center"><?= trans('i_already_have_membership') ?> (क्या आपके पास पहले से एक खाता
                            मौजूद है? लॉग इन करें)</a>
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
                <span style="font-size:10px; text-align:center;">Site is best viewed in 1024 X 768 resolution. Content
                    provided by Uttarakhand Public Service Commission <br>साइट को 1024 x 768 रिज़ॉल्यूशन में सबसे अच्छी
                    तरह से देखा जाता है। उत्तराखंड लोक सेवा आयोग द्वारा प्रदान की गई सामग्री</span>

            </div>
            <!-- /.form-box -->
        </div><!-- /.card -->

    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

<script>
$(document).ready(function() {


    $('#pri_mobile_confirm').bind("cut copy paste", function(e) {
        e.preventDefault();
    });
    $('#email_confirm').bind("cut copy paste", function(e) {
        e.preventDefault();
    });

    $("#Error_Message").show().delay(5000).queue(function(n) {
        $(this).hide();
        n();
    });

    $(function() {
        $('#district').change(function() {
            var district_id = $(this).val();
           
            if (district_id != '') {
                $('#othstate').val('').hide();

                $.ajax({
                    type: "POST",
                    url: base_url + 'admin/location/get_city_by_state_id',
                    dataType: 'html',
                    data: {
                        'district_id': district_id,
                        'csfr_token_name': csfr_token_value
                    },
                    success: function(data) {
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
$("#xin-form")["submit"](function() {
    // d.preventDefault();

    if ($("#school_registration").val() == "") {
        alert(
            "Please enter 'School/College/University Registration No.'\n कृपया 'स्कूल/कॉलेज/विश्वविद्यालय पंजीकरण संख्या' दर्ज करें।");
        $("#school_registration").focus();
        return false;
    }
    // if($("#school_registration").val().length<=40){
    //     alert("School registration number should be of minimum 40 digits.'\n स्कूल पंजीकरण संख्या कम से कम 40 अंकों की होनी चाहिए!");
    //     $("#school_registration").focus();
    //     return false;
    // }

    if ($("#school_name").val() == "") {
        alert(
            "Please enter 'School/College/University Name' \n कृपया 'स्कूल/कॉलेज/विश्वविद्यालय' का नाम दर्ज करें");
        $("#school_name").focus();
        return false;
    }

    // if ($("#school_name").val().length >= 300) {
    //     alert("School name should be 300 characters' \n स्कॉल का नाम 300 अक्षरों का होना चाहिए!");
    //     $("#school_name").focus();
    //     return false;
    // }

    if ($("#address1").val() == "") {
        alert("Please enter  Address Line 1'\n कृपया पता पंक्ति 1 दर्ज करें");
        $("#address").focus();
        return false;
    }
    // if ($("#address2").val() == "") {
    //     alert("Please enter 'Address'\nकृपया 'पता' दर्ज करें");
    //     $("#address").focus();
    //     return false;
    // }
    if ($("#address3").val() == "") {
        alert("Please enter Pincode'\n कृपया पिनकोड दर्ज करें");
        $("#address").focus();
        return false;
    }

    if ($("#landmark").val() == "") {
        alert("Please enter 'Landmark'\nकृपया 'लैंडमार्क' दर्ज करें");
        $("#landmark").focus();
        return false;
    }

    var dis = $("select#district option").filter(":selected").val();
    if (dis == "") {
        alert("Please select 'District'\nकृपया 'जिला' चुनें");
        $("select#district").focus();
        return false;
    }

    var city = $("select#city option").filter(":selected").val();
    if (city == "") {
        alert("Please select 'City'\nकृपया 'शहर' चुनें");
        $("select#city").focus();
        return false;
    }

    if ($("#principal_name").val() == "") {
        alert("Please enter 'Principal' Name\nकृपया 'प्राचार्य' का नाम दर्ज करें");
        $("#principal_name").focus();
        return false;
    }

    var whats_num = $('#whats_num').val();
    if (whats_num == "") {
        alert("Please enter 'Whats App No.'\nकृपया 'व्हाट्सएप नंबर' दर्ज करें।");
        $("#whats_num").focus();
        return false;
    } else if (whats_num.length != 10) {
        alert(
            "Please enter 'Whats App No.' with 10 digit number\nकृपया 10 अंकों की संख्या के साथ 'व्हाट्सएप नंबर' दर्ज करें");
        $('#whats_num').focus();
        return false;
    }

    var fmobileno = $('#pri_mobile').val();
    if (fmobileno == "") {

        alert("Please enter 'Mobile No.'\nकृपया 'मोबाइल नंबर' दर्ज करें।");
        $('#pri_mobile').focus();
        return false;
    } else if (fmobileno.length != 10) {

        alert(
            "Please enter 'Mobile Number' with 10 digit number\nकृपया 10 अंकों की संख्या के साथ 'मोबाइल नंबर' दर्ज करें");
        $('#pri_mobile').focus();
        return false;
    }

    var cno = $('#pri_mobile_confirm').val();
    if (cno == "") {

        alert("Please enter 'Confirm Mobile No'\nकृपया 'मोबाइल नंबर' दर्ज करें।");
        $('#pri_mobile_confirm').focus();
        return false;
    } else if (cno != fmobileno) {

        // alert('Mobile No. (मोबाइल नंबर)  Does Not Match to Confirm Mobile No. (मोबाइल नंबर)');
        alert(
            "'Mobile no' and 'Confirm Mobile No' does not match.\n'मोबाइल नंबर' और 'कन्फर्म मोबाइल नंबर' मेल नहीं खाता।");
        $('#pri_mobile_confirm').focus();
        return false;
    }

    var femail = $("#email").val();
    if (femail == "") {

        alert("Please enter 'Email Address'\nकृपया 'ईमेल पता' दर्ज करें");
        $("#email").focus();
        return false;
    }
    var mailformat =
        /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if (!femail.match(mailformat)) {
        alert("You have entered an invalid email ID!\nआपने एक अमान्य ईमेल आईडी दर्ज की है!");
        $("#email").focus();
        return false;
    }
    var emailconfirm = $("#email_confirm").val();
    if (emailconfirm == "") {

        alert("Please enter 'Confirm Email id'\nकृपया 'कन्फर्म ईमेल आईडी' दर्ज करें");
        $("#email_confirm").focus();
        return false;
    } else if (femail != emailconfirm) {

        // alert('Confirm Email ID(ईमेल आईडी)  Does Not Match to  Email ID(ईमेल आईडी की पुष्टि करें, ईमेल आईडी से मेल नहीं खाता)');
        alert(
            "'Email id' and 'Confirm Email id' does not match.\n'ईमेल आईडी' और 'कन्फर्म ईमेल आईडी' मेल नहीं खाता।");
        $('#email_confirm').focus();
        return false;
    } else if (!emailconfirm.match(mailformat)) {
        alert(
        "You have entered an invalid 'Confirm email ID'!\nआपने एक अमान्य 'कन्फर्म ईमेल आईडी' दर्ज की है!");
        $("#email_confirm").focus();
        return false;
    }


    // var fmobileno1 = $('#whats_num').val();
    // if (fmobileno1 == "") {
    //     alert("Please enter 'Whats App No.(कृपया 'व्हाट्सएप नंबर' दर्ज करें।)'");
    //     $('#whats_num').focus();
    //     return false;
    // }
    // if (fmobileno1.length != 10) {
    //     alert("Please enter 'Mobile Number' with 10 digit number (कृपया 10 अंकों की संख्या के साथ 'मोबाइल नंबर' दर्ज करें)");
    //     $('#whats_num').focus();
    //     return false;
    // }

    if ($("#cpatchaTextBox").val() == "") {
        alert("Please fill 'Captcha' field\n(कृपया 'कैप्चा' फ़ील्ड भरें)");
        createCaptcha();
        document.getElementById("cpatchaTextBox").value = "";
        $("#cpatchaTextBox").focus();
        return false;
    } else if ($("#cpatchaTextBox").val() != code) {
        alert("Invalid 'Captcha' try Again (अमान्य 'कैप्चा।' पुनः प्रयास करें)");
        createCaptcha();
        document.getElementById("cpatchaTextBox").value = "";
        $("#cpatchaTextBox").focus();
        return false;
    }

    if ($("#i_agree").prop("checked") == false) {
        alert(
            "please click the check box I agree to the and confirm above data is correct.\nकृपया चेक बॉक्स पर क्लिक करें  मैं सहमत हूं और पुष्टि करता हूं कि उपरोक्त डेटा सही है।");
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




$('#principal_name,#school_name').keydown(function(er) {
    if (er.altKey) {

        er.preventDefault();
    } else {
        var key = er.keyCode;

        if (!((key == 222)||(key == 8) ||(key===86)|| (key == 9) || (key == 32) || (key == 46) || (key == 189) || (key == 190) || (key >=
                65 && key <= 90))) {
            er.preventDefault();
            // alert("Please Enter Only Alphabets")
        }
    }
});

$('.mobileValidation').keyup(function(){
    let mobile_number = $(this).val().length;
    if(mobile_number===10){
    var mob_regex = /^(?:(?:\+|0{0,2})91(\s*[\-]\s*)?|[0]?)?[6789]\d{9}$/;
        if(mob_regex.test($(this).val())){
            $('#submit').prop("disabled", false);
           return true;
           
        } else {
            $('#submit').prop("disabled", true);
            alert("Invalid Mobile Number")
           return false;
        }
    }
})
</script>