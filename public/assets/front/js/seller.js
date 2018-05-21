$(document).ready(function () {

    $('#billing_address').change(function () {
        if (!this.checked) {
            $('#billing_info').show();
            $('#billing_address').val(0);
        } else {
            $('#billing_info').hide();
            $('#billing_address').val(1);
        }
    });


    var b_address = $('#billing_address').val();
    if (b_address == '0') {
        $('#billing_info').show();
    } else {
        $('#billing_info').hide();
    }
    
    $("#sales_tax").click(function(){
        if(!$(this).is(":checked")){ //checks if the checkbox/this is selected or not
            
            $('#gst').val("");
            //$("#payment").val(""); //empty the input value
        }
    });
        //nothing

    var sales_tax = $('#sales_tax').val();
    if (sales_tax == 'Y') {
        $('#sales_div').show();
    } else {
        
        $('#sales_div').hide();
        
    }



    $(":input").inputmask();



    $(".select2_group").select2({});
    $(".select2_multiple").select2({
        maximumSelectionLength: '',
        placeholder: "Select Category",
        allowClear: true
    });

    jQuery('#validateSellerForm').validate({

        // initialize the plugin
        debug: true,
        errorClass: 'text-danger',
        errorElement: 'span',
        rules: {
            name: {
                required: true
            },
            country: {
                required: true
            },
            state: {
                required: true
            },
            city: {
                required: true
            },
            street: {
                required: true
            },
            pincode: {
                required: true,
                rangelength: [6, 6]
            },
            email: {
                required: true,
                email: true
            },
            mobile: {
                required: true,
                rangelength: [10, 10],
            },
            prefer_id: {
                required: true,
                rangelength: [4, 15],
                prefercheck: true
            },
            tin_no: {
                required: true
            },
            tin_photo: {
                required: true
            },
            pan_no: {
                required: true,
                rangelength: [10, 10],
                pancheck: true
            },
            pan_card_photo: {
                required: true
            },
            password: {
                required: true,
                rangelength: [8, 15],
                pwcheck: true
            },
            confirm_password: {
                required: true,
                equalTo: "#password"
            },
            gst: {
                required: true

            },
            
            contact_person: {
                required: true

            },
            designation: {
                required: true

            },
            department: {
                required: true

            },
            country_admin: {
                required: true

            },
            state_admin: {
                required: true

            },
            city_admin: {
                required: true

            },
            street_admin: {
                required: true

            },
            pincode_admin: {
                required: true,
                rangelength: [6, 6]

            },
            branch_name: {
                required: true

            },
            account_type: {
                required: true

            },
            account_no: {
                required: true

            },
            ifsc_code: {
                required: true,
                codecheck: true

            },
             

            billing_person: {
                required: true

            },
            billing_designation: {
                required: true
            },
            billing_department: {
                required: true

            },
            billing_country_admin: {
                required: true
            },
            billing_state_admin: {
                required: true

            },
            billing_city_admin: {
                required: true
            },
            billing_street_admin: {
                required: true
            },
            billing_pincode_admin: {
                required: true,
                rangelength: [6, 6]
            },
            CaptchaCode: {
                required: true
            }

        },
        messages: {

            password: {
                pwcheck: 'This field should contain min 4 and max 15 with atleast 1 number, 1 alphabet, and 1 special character.'
            },

            prefer_id: {
                prefercheck: 'This field should contain only alphanumeric values.'
            },

            pan_no: {
                pancheck: 'This field should contain only alphanumeric values.'
            },
            ifsc_code: {
                codecheck: 'This field should contain only alphanumeric values.'
            },

        },
        submitHandler: function (form) {
            form.submit();
        }

    });

   

    $.validator.addMethod("pwcheck", function (value) {
        return /^(?=.*[A-Za-z])(?=.*\d)(?=.*[$@$!%*#?&])[A-Za-z\d$@$!%*#?&]{8,15}$/.test(value)

    });

    $.validator.addMethod("prefercheck", function(value) {
   return /^[a-zA-Z0-9]+$/.test(value)
       
   });
   $.validator.addMethod("pancheck", function(value) {
   return /^[a-zA-Z0-9]+$/.test(value)
       
   });
   $.validator.addMethod("codecheck", function(value) {
   return /^[a-zA-Z0-9]+$/.test(value)
       
   });
     
 

    $('#country_in').change(function (e) {
        var country_id = $("#country_in").val();
        $.getStateList(country_id);
    });

    $('#state').change(function (e) {
        var state_id = $("#state").val();
        $('#state_1').val(state_id);
        $.getCityList(state_id);
    });
    
    $('#city').change(function (e) {
        var city_id = $("#city").val();
        $('#city_1').val(city_id);
    });


    $.getStateList = function (country_id, state_id) {
        $.ajax({
            url: '/ajax/get-state-list',
            data: {country_id: country_id},
            type: 'GET',
            async: false,
            success: function (data) {
                $("#state").find('option').remove().end().append($('<option/>', {value: '', text: 'Select State'}));
                $("#city").find('option').remove().end().append($('<option/>', {value: '', text: 'Select City'}));
                $.each(data, function (i, item) {
                    $("#state").append($('<option/>', {value: i, text: item}));
                });

                $("#state").val(state_id);

            }
        });
    }

    $.getCityList = function (state_id, city_id) {

        $.ajax({
            url: '/ajax/get-city-list',
            data: {state_id: state_id},
            type: 'GET',
            async: false,
            success: function (data) {

                $("#city").find('option').remove().end().append($('<option/>', {value: '', text: 'Select City'}));
                $.each(data, function (i, item) {
                    $("#city").append($('<option/>', {value: i, text: item}));
                });
                $("#city").val(city_id);

            }
        });
    }

    var state_admin = "";
    var city_admin = "";
    $('#country_admin').change(function (e) {
        var country_id = $("#country_admin").val();
        $.getStateListAdmin(country_id);
    });

    $('#state_admin').change(function (e) {
        var state_admin = $("#state_admin").val();
        $('#state_admin_1').val(state_admin);
        $.getCityListAdmin(state_admin);
    });
    
    $('#city_admin').change(function (e) {
        var city_admin = $("#city_admin").val();
        $('#city_admin_1').val(city_admin);
    });

    $.getStateListAdmin = function (country_id, state_admin) {
        $.ajax({
            url: '/ajax/get-state-list',
            data: {country_id: country_id},
            type: 'GET',
            async: false,
            success: function (data) {
                $("#state_admin").find('option').remove().end().append($('<option/>', {value: '', text: 'Select State'}));
                $("#city_admin").find('option').remove().end().append($('<option/>', {value: '', text: 'Select City'}));
                $.each(data, function (i, item) {
                    $("#state_admin").append($('<option/>', {value: i, text: item}));
                });
                $("#state_admin").val(state_admin);

            }
        });
    }
    $.getCityListAdmin = function (state_id, city_admin) {
        $.ajax({

            url: '/ajax/get-city-list',
            data: {state_id: state_id},
            type: 'GET',
            async: false,
            success: function (data) {

                $("#city_admin").find('option').remove().end().append($('<option/>', {value: '', text: 'Select City'}));
                $.each(data, function (i, item) {
                    $("#city_admin").append($('<option/>', {value: i, text: item}));
                });
                $("#city_admin").val(city_admin);

            }
        });
    }

    var state_billing = "";
    var city_billing = "";

    $('#billing_country_admin').change(function (e) {
        var country_id = $("#billing_country_admin").val();
        $.getStateListAdminBilling(country_id);
    });

    $('#billing_state_admin').change(function (e) {
        var state_billing = $("#billing_state_admin").val();
        $('#state_billing_1').val(state_billing);
        $.getCityListAdminBilling(state_billing);
    });
    
    $('#billing_city_admin').change(function (e) {
        var billing_city_admin = $("#billing_city_admin").val();
        $('#city_billing_1').val(billing_city_admin);
    });

    $.getStateListAdminBilling = function (country_id, state_billing) {
        $.ajax({
            url: '/ajax/get-state-list',
            data: {country_id: country_id},
            type: 'GET',
            async: false,
            success: function (data) {
                $("#billing_state_admin").find('option').remove().end().append($('<option/>', {value: '', text: 'Select State'}));
                $("#billing_city_admin").find('option').remove().end().append($('<option/>', {value: '', text: 'Select City'}));
                $.each(data, function (i, item) {
                    $("#billing_state_admin").append($('<option/>', {value: i, text: item}));
                });
                $("#billing_state_admin").val(state_billing);

            }
        });
    }
    $.getCityListAdminBilling = function (state_id, city_billing) {
        $.ajax({

            url: '/ajax/get-city-list',
            data: {state_id: state_id},
            type: 'GET',
            async: false,
            success: function (data) {

                $("#billing_city_admin").find('option').remove().end().append($('<option/>', {value: '', text: 'Select City'}));
                $.each(data, function (i, item) {
                    $("#billing_city_admin").append($('<option/>', {value: i, text: item}));
                });
                $("#billing_city_admin").val(city_billing);

            }
        });
    }

    $('.submit').click(function (e) {
        var city_1 = $('#city').val();
        var city_admin = $('#city_admin').val();
        var city_billing = $('#billing_city_admin').val();
        $('#city_1').val(city_1);
        $('#city_admin_1').val(city_admin);
        $('#city_billing_1').val(city_billing);
    });

});
 

$(function () {

    var state = $('#state_1').val();
    var city = $('#city_1').val();
    
    var state_admin = $('#state_admin_1').val();
    var city_admin = $('#city_admin_1').val();
    
    var state_billing = $('#state_billing_1').val();
    var city_billing = $('#city_billing_1').val();
    
    if ($("#country_in").val() != "") {

        $.getStateList($("#country_in").val(), state);
        $.getCityList(state, city);
    }
    if ($("#country_admin").val() != "") {

        $.getStateListAdmin($("#country_admin").val(), state_admin);
        $.getCityListAdmin(state_admin, city_admin);
    }
    if ($("#billing_country_admin").val() != "") {

        $.getStateListAdminBilling($("#billing_country_admin").val(), state_billing);
        $.getCityListAdminBilling(state_billing, city_billing);
    }


    
    $('#sales_tax').change(function () {
        if (this.checked) {
            $('#sales_div').show();
            $('#sales_tax').val('Y');
        } else {
            $('#sales_div').hide();
            $('#sales_tax').val('N');
        }
    });


    // text box only accept numbers
    $('.numbers').keydown(function (e) {
        if (e.shiftKey || e.ctrlKey || e.altKey) {
            e.preventDefault();
        } else {
            var key = e.keyCode;
            if (!((key == 8) || (key == 46) || (key >= 35 && key <= 40) || (key >= 48 && key <= 57) || (key >= 96 && key <= 105))) {
                e.preventDefault();
            }
        }
    });

    $('#pan_card_photo').change(function (e) {
        var ext = $('#pan_card_photo').val().split('.').pop().toLowerCase();
        if ($.inArray(ext, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
            alert('invalid extension!');
            $("#pan_card_photo").val('');
        }
    });
    $('#tin_photo').change(function (e) {
        var ext = $('#tin_photo').val().split('.').pop().toLowerCase();
        if ($.inArray(ext, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
            alert('invalid extension!');
            $("#tin_photo").val('');
        }
    });

    $('#tnc_pdf').change(function (e) {
        var ext = $('#tnc_pdf').val().split('.').pop().toLowerCase();
        if ($.inArray(ext, ['pdf']) == -1) {
            alert('invalid extension!');
            $("#tnc_pdf").val('');
        }
    });


});