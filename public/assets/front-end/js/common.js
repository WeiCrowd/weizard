$(document).ready(function () {

$('span.text-danger').addClass('njb');


$('.panel-heading').on('click',function(){
	//alert('dfd')
	$(this).find('span').toggleClass('active-t')
	});

	
    var type = $('input:radio[name=terms]:checked').val();
    if (type == "accept") {
        $('.btn-reg').prop("disabled", false); // Element(s) are now enabled.
    }

    $('.menu-btn').on('click', function () {
        $('.main_menu').slideToggle()
    });

    $('.top-arrow').on('click', function () {
        $('html,body').animate({
            scrollTop: 0
        }, 800)
    })



    $('.owl-carousel').owlCarousel({
        loop: true,
        margin: 10,
        responsiveClass: true,

        responsive: {
            0: {
                items: 2,
                nav: true
            },
            600: {
                items: 3,
                nav: false
            },
            1000: {
                items: 4,
                nav: true,
                loop: false
            }
        }
    })

    $("input[name='terms']").change(function () {
        if ($('input:radio[name=terms]:checked').val() == "accept") {
            $('.btn-reg').prop("disabled", false); // Element(s) are now enabled.

        } else {
            window.location = "/";
        }
    });

    $("#i_agree").click(function () {
        if ($('#i_agree').prop('checked')) {

            $('.login_btn').prop("disabled", false);
        } else {

            $('.login_btn').prop("disabled", true); // Element(s) are now enabled.
        }
    });

    $('.btn-reg').click(function () {
        var link = $(this).data('value');
        window.location.href = link;
         
    });
   
   
	
	
	
});



///waoo js
new WOW().init();
//grid




     