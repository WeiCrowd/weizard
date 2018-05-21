 // text box only accept numbers
    $('.nums').keydown(function (e) {
        if (e.shiftKey || e.ctrlKey || e.altKey) {
            e.preventDefault();
        } else {
            var key = e.keyCode;
            if (this.value.length == 0 && e.which == 48) {
                return false;
            }

            if (!((key == 190) || (key == 8) || (key == 46) || (key >= 35 && key <= 40) || (key >= 48 && key <= 57) || (key >= 96 && key <= 105))) {
                e.preventDefault();
            }
        }


    });
    
    
$(document).ready(function () {
    
 
    var tax = $('#tax').val();
    if (tax == 'Y') {
        $('#tax_div').show();
    } else {
        
        $('#tax_div').hide();
        
    }
    
    if($('#tcs').val() != '' || $('#cgst').val() != '' || $('#sgst').val() != '' || $('#igst').val() != ''){
        $('#tax').prop('checked', true);
        $('#tax_div').show();
        $('#tax_div').val('Y'); 
    }
    $('#tax').change(function () {
        if (this.checked) {
            $('#tax_div').show();
            $('#tax_div').val('Y');
        } else {
            $('#tax_div').hide();
            $('#tax_div').val('N');
        }
    });
    
    
    
    var office = $('#office_type').val();
    if (office == 'RO') {
       $('#city_code').show();
       //$("#ro_code").val('<?php echo @$auction[0]->region_code; ?>'); 
    } else {
        $('#city_code').hide();
    }

    jQuery('#validateauctionForm').validate({
        // initialize the plugin
        debug: true,
        errorClass: 'text-danger',
        errorElement: 'span',
        rules: {
            seller_id: {
                required: true
            },
            office_type: {
                required: true
            },
            ro_code: {
                required: true
            },
            date: {
                required: true
            },
            start_time: {
                required: true
            },
            end_time: {
                required: true
            },
            inspection_date: {
                required: true
            },
            status: {
                required: true
            },
            service_charge_type: {
                required: true
            },
            service_charge: {
                required: true
            },
            'category[]': {
                required: true
            }
        },
        submitHandler: function (form) {
            form.submit();
        }

    });

    
    $('#single_cal4').daterangepicker(
            {
                singleDatePicker: true,
                singleClasses: "picker_4",
                locale: {
                    format: 'YYYY-MM-DD',
                    //cancelLabel: 'Clear'
                },
            }, function (start, end, label) {
        console.log(start.toISOString(), end.toISOString(), label);
    });
    
    
    $('#timepicker2').timepicker({
        minuteStep: 1,
        showInputs: false,
        disableFocus: true,
    });
    
    $('#timepicker3').timepicker({
        showInputs: false,
        disableFocus: true,
        showDuration: true,
    });
    
    

    $(".select2_group").select2({});
    $(".select2_multiple").select2({
        maximumSelectionLength: '',
        placeholder: "--Select Auction Category--",
        allowClear: true
    });

    $('#reservation-time').daterangepicker({
        
          autoUpdateInput: false,
          timePicker: true,
          timePickerIncrement: 30,
          locale: {
            format: 'YYYY-MM-DD h:mm A'
          }
        });
    $('input[name="inspection_date"]').on('apply.daterangepicker', function (ev, picker) {
        $(this).val(picker.startDate.format('YYYY-MM-DD h:mm A') + ' - ' + picker.endDate.format('YYYY-MM-DD h:mm A'));
    });

    $('input[name="inspection_date"]').on('cancel.daterangepicker', function (ev, picker) {
        $(this).val('');
    });
    
 
});


