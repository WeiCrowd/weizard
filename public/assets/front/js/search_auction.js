$(document).ready(function () {

$('.auction').click(function () {
    
        var link = $(this).data('link');
        $("#validatesearchauctionForm").attr('action', link);
    });


});


