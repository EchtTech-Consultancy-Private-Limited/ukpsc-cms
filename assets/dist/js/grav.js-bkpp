$(document).ready(function () {
    $(document).on('change', '#Ownership', function ()
    {
        let get_val = $(this).val();
        let token = $("input[name=csrf_test_name]").val();
        let get_text = $("#Ownership option:selected").text();
        if (get_val == 0) {
            $('#Ownership_1').hide();
        } else {

            $.ajax({
                url: base_url + 'admin/certificate/getOwnership',
                data: {'id': get_val, 'csrf_test_name': token},
                type: 'post',
                dataType: 'json',
                success: function (result) {
                    $('#base_sector').text(get_text);
                    $('#show_owners').html(result);
                    $('#Ownership_1').show();
                }
            });
        }
    });
    
   
    //same as owner code  for filling data  
  
    
    $("#xin-form")["submit"](function (d)
    {
     

        var btn = $(this).find("input[type=submit]:focus" ).val(); 
       
        if ($("#user_name_grav").val() == "") {
            alert("Please fill 'User Name' field");
            $("#user_name_grav").focus();
            return false;
        }
        if ($("#title_grav").val() == "") {
            alert("Please fill 'Title' field");
            $("#title_grav").focus();
            return false;
        }
      

        var state = $("select#auth_grav option").filter(":selected").val();
        if (state == "") {
            alert("Please fill 'Authority' field");
            $("select#auth_grav").focus();
            return false;
        }
        var state = $("select#state option").filter(":selected").val();
        if (state == "") {
            alert("Please fill 'State' field");
            $("select#state").focus();
            return false;
        }
        var district = $("select#district_establishment option").filter(":selected").val();
        if (district == "") {
            alert("Please fill 'District' field");
            $("select#district_establishment").focus();
            return false;
        }
         var fpin = $("#establishment_pin").val();
        if ($('#establishment_pin').val() == "") {
            alert("Please fill 'Pin Code' field");
            $('#establishment_pin').focus();
            return false;
        }
        if (fpin.length != 6) {
            alert("Please fill 'PIN Number' field with 6 digit number");
            $('#establishment_pin').focus();
            return false;
        }
             
        var fmobileno = $('#mobile_grav').val();
        if (fmobileno == "") {
            alert("Please fill 'Mobile Number' field");
            $('#mobile_grav').focus();
            return false;
        }
        if (fmobileno.length != 10) {
            alert("Please fill 'Mobile Number' field with 10 digit number");
            $('#mobile_grav').focus();
            return false;
        }
       
        //Validation For Emailid
        var femail = $("#email_grav").val();
        if (femail == "") {
            alert("Please fill 'Email Address' field");
            $("#email_grav").focus();
            return false;
        }
        var mailformat = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        if (!femail.match(mailformat)) {
            alert("You have entered an invalid email address!");
            $("#email_grav").focus();
            return false;
        }

        if ($("#complain_grav").val() == "") {
            alert("Please fill 'Complaint Agains' field");
            $("#complain_grav").focus();
            return false;
        }
       
        var extension=$('#fileName1').val().replace(/^.*\./, '');
          if( btn =='Save'){ 
              if( extension=='') {
             $("#fileName1").focus();
              alert("Please select fileName1"); $('#fileName1').val('')
            return false;
           
        }
    }
        if(extension !='' && extension!='pdf') {
             $("#fileName1").focus();
              alert("Please select pdf file in fileName1"); $('#fileName1').val('')
            return false;
           
        }
         var fsize=$('#fileName1')[0].files[0].size;
        
        const file = Math.round((fsize / 1024));
        if( extension !='' && file >1024) {
             $("#fileName1").focus();
              alert("fileName1 should be less than 1Mb"); 
            return false;
           
        }
        
    
           
        function sure_to_submite() {
                        confirm("Are you sure!");
                        }

    });

    $(".Print_preview").click(function ()
    {
        alert("Click Ok");
        window.print();
    });

    $('.dd_state').change(function ()
    {
//        alert("Hi");
        var state_id = $(this).val();
        var distric_name = $(this).data('distric_name');
        changeDis(state_id, distric_name);
    });
    function changeDis(state_id, distric_name, replaceId = false, replaceIdVal = false) {
        
        if (state_id != '') {
            $('#othstate').val('').hide();
            $.ajax({
                type: "POST",
                url: base_url + 'admin/location/get_city_by_state_id',
                dataType: 'html',
                data: {'state_id': state_id, 'csfr_token_name': csfr_token_value},
                success: function (data) {
                    $('#district_' + distric_name).html(data);
                    if(replaceId) {
                        //alert(replaceIdVal);
                        $('#'+replaceIdVal).val(replaceId);
                    }
                }
            });
        } else {
            $('#state').val('').hide();
            $('#othstate').show();
        }
    }
    
    $(document).on('click', '.show_hide_form', function ()
    {
        let input_id = $(this).attr('id');
        let isChecked = $(this).is(':checked');

        if (isChecked) {
            $('#div_' + input_id).show();
        } else {
            $('#div_' + input_id).hide();
        }
    });
//     document.getElementById('certificate_number').innerHTML = create_random_string(6)
//    function create_random_string(string_length) {
//        var random_string = ' ';
//        var characters = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz'
//        for(var i, i=0; i < string_length ; i++){
//            random_string += characters.charAt(Math.floor(Math.random() * characters.length))
//        }
//            return random_string ;
//    }


    

})
  
