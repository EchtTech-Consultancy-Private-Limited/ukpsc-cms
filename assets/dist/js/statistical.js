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
    
    $(document).on('change', '.degree', function ()
    {
        let get_val = $(this).val();
        var child_id = $(this).data('child_id');
        var label_name = $(this).data('label_name'); 
        let token = $("input[name=csrf_test_name]").val();
        let get_text = $("#Degree option:selected").text();
        if (get_val != '')
        {
            $.ajax({
                url: base_url + 'admin/certificate/getmedicaldegree',
                data: {'id': get_val, 'label_name':label_name ,  'csrf_test_name': token},
                type: 'post',
                dataType: 'html',
                success: function (result) {
                    $('#' + child_id).html(result);
                }
            });

        }
    });
    //same as owner code  for filling data  
    $('.same_as_above').change(function ()
    {

        var prev_block = $(this).data('prev_block');
        var data_block = $(this).data('data_block');

        if (this.checked) {
            
            $("#" + data_block + "_address1").val($("#" + prev_block + "_address1").val());
            $("#" + data_block + "_address2").val($("#" + prev_block + "_address2").val());
            $("#" + data_block + "_fname").val($("#" + prev_block + "_fname").val());
            $("#" + data_block + "_city").val($("#" + prev_block + "_city").val());
            
            $("#state2").val($("#state").val());
            let city_val = $('#district_establishment').val();

            $("#" + data_block + "_city").val($("#" + prev_block + "_city").val());
            $("#" + data_block + "_mname").val($("#" + prev_block + "_mname").val());
            $("#" + data_block + "_lname").val($("#" + prev_block + "_lname").val());
            $("#" + data_block + "_mobile").val($("#" + prev_block + "_mobile").val());
            $("#" + data_block + "_fax").val($("#" + prev_block + "_fax").val());
            $("#" + data_block + "_web").val($("#" + prev_block + "_web").val());
            $("#" + data_block + "_tele").val($("#" + prev_block + "_tele").val());
            $("#" + data_block + "_email").val($("#" + prev_block + "_email").val());
            $("#" + data_block + "_std").val($("#" + prev_block + "_std").val());
            $("#" + data_block + "_pin").val($("#" + prev_block + "_pin").val());
            let distric_name = $("#state2").data('distric_name');
            changeDis($("#state2").val(), distric_name, city_val, 'district_owner');

        } else {
            $("#" + data_block + "_address1").val('');
            $("#" + data_block + "_address2").val('');
            $("#" + data_block + "_fname").val($("#" + prev_block + "_fname").val());
            $("#" + data_block + "_city").val($("#" + prev_block + "_city").val());
            $("#" + data_block + "_mname").val($("#" + prev_block + "_mname").val());
            $("#" + data_block + "_lname").val($("#" + prev_block + "_lname").val());
            $("#" + data_block + "_mobile").val($("#" + prev_block + "_mobile").val());
            $("#" + data_block + "_fax").val($("#" + prev_block + "_fax").val());
            $("#" + data_block + "_web").val($("#" + prev_block + "_web").val());
            $("#" + data_block + "_tele").val($("#" + prev_block + "_tele").val());
            $("#" + data_block + "_email").val($("#" + prev_block + "_email").val());
            $("#" + data_block + "_std").val($("#" + prev_block + "_std").val());
            $("#" + data_block + "_pin").val($("#" + prev_block + "_pin").val());

            
        }
    })
    
    $("#xin-form")["submit"](function (d)
    {
     
        
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
  
