$(document).ready(function () {

    jQuery('#validatelotForm').validate({
        // initialize the plugin
        debug: true,
        errorClass: 'text-danger',
        errorElement: 'span',
        rules: {
            lot_name: {
                required: true
            },
            lot_desc: {
                required: true
            },
            minimum_bid_inc: {
                required: true
            },
            quantity: {
                required: true
            },
            measurement: {
                required: true
            },
            pcb_group: {
                required: true
            },
            ed: {
                required: true
            },
            st_vat: {
                required: true
            },
            state_id: {
                required: true
            },
            city_id: {
                required: true
            },
            address: {
                required: true
            },
            pincode: {
                required: true
            },
            status: {
                required: true
            }

        },
        submitHandler: function (form) {
            form.submit();
        }

    });
    
     

});


