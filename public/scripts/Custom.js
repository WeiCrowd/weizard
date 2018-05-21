$(function () {

    // Other Custom Codes

    // Press Slider
    if ($('.press-slider').length > 0) {
        $('.press-slider').owlCarousel({
            loop: true,
            margin: 10,
            nav: false,
            responsive: {
                0: {
                    items: 3
                },
                768: {
                    items: 5
                }
            }

        });
    }
    
    // Banner Headin Slider
    if ($('.banner-heading-slider').length > 0) {
        $('.banner-heading-slider').owlCarousel({
            loop: true,
            margin: 0,
            nav: false,
            singleItem: true,
            items: 1,
            dots: false,
            autoplay: true
        });
    }

    // Dashboard Listing Slider
    if ($('.dashboard-listing-slider').length > 0) {
        $('.dashboard-listing-slider').owlCarousel({
            loop: true,
            margin: 10,
            nav: false,
            dots: false,
            autoplay: true,
            margin: 20,
            responsive: {
                0: {
                    items: 3
                },

                768: {
                    items: 6,
                    autoplay: true
                },
                1024: {
                    items: 8,
                    loop: false
                }
            }

        });
    }

    // Slider Chart
    if ($(".dashboard-range-slider").length > 0) {
        $(".dashboard-range-slider").slider({
            min: 0,
            max: 300000,
            step: 1000,
            range: "min",
            animate: true,
            value: 0,
            slide: function (event, ui) {
                $(this).closest(".dashboard-range-slider-wrap").find(".range-slider-value .text").text(ui.value);
            }
        });
    }

    // User Dashboard Area Chart
    if ($("#user-dashboard-chart").length > 0) {

        Chart.pluginService.register({
            beforeDraw: function (chart, easing) {
                if (chart.config.options.chartArea && chart.config.options.chartArea.backgroundColor) {
                    var ctx = chart.chart.ctx;
                    var chartArea = chart.chartArea;

                    ctx.save();
                    ctx.fillStyle = chart.config.options.chartArea.backgroundColor;
                    ctx.fillRect(chartArea.left, chartArea.top, chartArea.right - chartArea.left, chartArea.bottom - chartArea.top);
                    ctx.restore();
                }
            }
        });

        var config = {
            type: 'line',
            data: {
                labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "July", "Aug", "Sept", "Oct", "Nov", "Dec"],
                datasets: [
                    {
                        data: ["100", "104", "10", "50", "100", "104", "10", "50", "100", "104", "10", "50", "100", "104", "10", "50" ],
                        borderColor: "#326ff9",
                        borderWidth: "3",
                        hoverBorderColor: "#ff7c3f",
                        fill: false
                    }]
            },
            options: {
                responsive: true,
                title: {
                    display: false,
                    text: 'Dashboard Chart'
                },
                legend: {
                    display: false,
                },
                ticks: {
                    autoSkip: false
                },
                tooltips: {
                    mode: 'index',
                    intersect: false,
                    titleFontFamily: 'Montserrat',
                    backgroundColor: 'rgba(0,0,0,0.8)'
                },
                hover: {
                    mode: 'nearest',
                    intersect: true
                },
                scales: {
                    xAxes: [{
                        display: true,
                        scaleLabel: {
                            display: false,
                            labelString: 'Month'
                        }/*,
                        gridLines:{
                            lineWidth: '30',
                             color:"#e8eefa",
                        }*/
                    }],
                    yAxes: [{
                        display: true,
                        scaleLabel: {
                            display: false,
                            labelString: 'Value'
                        }
                        /*,
                            gridLines : {
                            display : false
                            }*/
                    }]
                }
            }
        };

        var ctx = document.getElementById("user-dashboard-chart").getContext("2d");
        new Chart(ctx, config);
    }

    // Custom Selectbox
    if ($(".theme-selectbox").length > 0) {
        $(".theme-selectbox").select2({
            minimumResultsForSearch: Infinity
            /*,
                    allowClear: true*/
        });
    }

    // Dashboard Menu
    $("#dashboardMenu").on("click", function () {
        $(this).toggleClass("active");
        $(".dashboard-sidebar").toggleClass("active");
    });

    // Add More Team Member
    if ($(".team-information-wrap").length > 0) {

        $(".add-member-btn").on("click", function () {
            /* var textToAdd = ' <div class="form-team-block marT25"> <span class="form-team-block-remove">Remove</span> <div class="form-group row"> <div class="col-md-4 col-sm-5"> <label class="form-group-label">Member Name:</label> </div><div class="col-sm-6"> <input type="text" class="form-control"/> </div></div><div class="form-group row"> <div class="col-md-4 col-sm-5"> <label class="form-group-label">Member Designation:</label> </div><div class="col-sm-6"> <input type="text" class="form-control"/> </div></div></div>';*/
            var textToAdd = $(".form-team-block:last-child").clone().addClass("marT25");
            $(textToAdd).insertAfter(".team-information-wrap .form-team-block:last-child").find(".form-control").val('');
        });

        $(".team-information-wrap").on("click", ".form-team-block-remove", function () {
            $(this).closest(".form-team-block").remove();
        });
    }

    //Listing Filters 
    if ($(".section-listing").length > 0) {
        var $grid = $('.listing-items').isotope({
            itemSelector: '.listing-box',
            percentPosition: true
        });
        $('.listing-filters').on('click', 'button', function () {
            var $this = $(this);
            $(".listing-filters button").removeClass("active");
            $this.addClass("active");
            var filterValue = $this.attr('data-filter');

            $grid.isotope({
                filter: filterValue
            });
        });

        $('.listing-filters-select').on('change', function () {

            var filterValue = this.value;

            $grid.isotope({
                filter: filterValue
            });
        });
    }



    // Piechart
    if ($("#token-value-distribution-chart").length > 0) {
        var data = [{
            label: "Token Sale",
            data: 50,
            color: "#26cb6d"
        }, {
            label: "Founders & Team",
            data: 20,
            color: "#9d4bef"
        }, {
            label: "Community",
            data: 20,
            color: "#ffcd00"
        }, {
            label: "Experts",
            data: 10,
            color: "#ff7c3f"
        }];

        $.plot($("#token-value-distribution-chart"), data, {
            series: {
                pie: {
                    show: true,
                    radius: 150,
                    innerRadius: 0.7,
                    label: {
                        show: false,
                        radius: 0.5,
                        formatter: function (label, series) {
                            var percent = Math.round(series.percent);
                            return (percent + "%");
                        }
                    }
                }
            },
            legend: {
                show: true,
                container: $("#token-value-distribution-legend")
            }
        });
    }

    // Countdown
    if ($(".countdown-block").length > 0) {
        $(".countdown-block").each(function (index) {
            var $this = $(this);
            var $targetDate = $this.data("date");

            $this.countdown($targetDate, function (event) {
                $(this).html(event.strftime('' + '<div class="countdown-col"><span class="countdown-time"> %-D </span> <span class="countdown-type"> Days </span></div> ' + '<div class="countdown-col"><span class="countdown-time"> %H </span> <span class="countdown-type">Hours </span></div>' + '<div class="countdown-col"><span class="countdown-time"> %M </span> <span class="countdown-type">Minutes </span></div>' + '<div class="countdown-col"><span class="countdown-time"> %S </span> <span class="countdown-type">Seconds </span></div>'));
            });

        });
    }

    // Initializing Lightbox
    if ($(".skLib-lightboxLink").length > 0) {
        skLib.lightbox.init();
    }

    // Adding wow Attributes to Section
    if ($(".section-heading").length > 0) {
        $(".section .section-heading").not(".no-animation").attr({
            "data-wow-duration": "2s",
            "data-wow-delay": "0s"
        }).addClass("wow fadeInUp");
    }


    // Initializing wow js
    if ($(".wow").length > 0) {
        new WOW().init();
    }

    //Matchheight
    if ($(".equal-col").length > 0) {
        $('.equal-col').matchHeight({
            byRow: true
        });
    }


    // Calling Functions here
    MainNavigation();
    ScrollTo();
    Accordion();
    TabNavigation();
    popup();
    ResponsiveTable();
    ScrollTop();

    // Window Resize
    $(window).bind("debouncedresize", function () {
    });


});


// On Scroll Function
$(window).on("scroll", function () {
    ScrollTop();

});

// On Load Function
$(window).on("load", function () {

});

function ScrollTop() {
   var scrollTop = $(window).scrollTop();
    if (scrollTop >= 80) {
        $("#header").addClass("scrolled").find(".primary-btn").addClass('has-shadow');

    } else {
        $("#header").removeClass("scrolled");
    } 
}


function MainNavigation() {
    $("#MobileMenu").off("click").on("click", function () {
        $("#main-navigation").slideToggle();
        $(this).toggleClass("active");
    });

    $("#main-navigation .has-dropdown > a").off("click").on("click", function () {
        $this = $(this);
        if (!$this.hasClass("active")) {

            $this.addClass("active").next(".dropdown").slideDown();
        } else {
            $this.removeClass("active").next(".dropdown").slideUp();
        }
    });
}

function ScrollTo() {
    if ($(".ScrollTo").length > 0) {
        $('.ScrollTo[href*=#]:not([href=#])').click(function () {
            if (location.pathname.replace(/^\//, '') === this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {

                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                if (target.length) {
                    $('html,body').animate({
                        scrollTop: target.offset().top
                    }, 2000);
                    return false;
                }
            }
        });
    }
}

function TabNavigation() {
    if ($(".tab-navigation").length > 0) {

        $(".tab-navigation").on('click', ".tab-head-item", function (e) {
            var $this = $(this);
            var $target = $this.data("tab");
            console.log($target);
            $this.closest(".tab-navigation").find(".tab-head-item").removeClass('active');
            $this.closest(".tab-navigation").find(".tab-pane:visible").removeClass('active').hide();
            $($target).addClass('active').show();
            $this.addClass('active');
            e.preventDefault();
        });


        if ($(".tab-navigation").hasClass("is-responsive")) {

            if (screen.width <= 767) {
                $(".tab-navigation").each(function (index) {
                    var $this = $(this);

                    $this.addClass("responsive-tabs-active");
                    var ActiveVal = $this.find(".tab-head-item.active").text();
                    if ($(".nav-trigger").length < 1) {
                        $this.prepend("<div class='nav-trigger text-center'><span class='nav-trigger-text'>" + ActiveVal + "</span></div>");
                    }
                    $this.find(".tab-head").off("click").on("click", ".tab-head-item", function () {
                        var TabText = $(this).text();
                        $this.find(".nav-trigger-text").html(TabText);
                        $this.find(".tab-head").slideUp();
                    });
                    $(".nav-trigger").on("click", function () {
                        $(this).toggleClass("active").closest(".tab-navigation").find(".tab-head").slideToggle();
                    });
                });
            } else {
                $(".tab-navigation").removeClass("responsive-tabs-active");
            }
        }



    }

}

function Accordion() {
    if ($(".site-accordion").length > 0) {
        $('.site-accordion .accordion-block-content').hide();
        $('.site-accordion .accordion-block-heading').on("click", function () {
            var $trigger = $(this);

            if (!$trigger.hasClass('active')) {
                $('.site-accordion .accordion-block-heading').removeClass("active");

                $trigger.closest(".site-accordion").find(".accordion-block-content").stop(0, 0).slideUp("slow");
                $trigger.addClass("active").next().stop(0, 0).slideDown("slow");
                $trigger.next(".accordion-block-content").addClass("active");
            } else {
                $trigger.removeClass("active").next().stop(0, 0).slideUp("slow");
                $trigger.next(".accordion-block-content").removeClass("active");
            }

            return false;
        });

        if ($(".accordion-block-heading").hasClass("active-on-load")) {
            $(".accordion-block-heading.active-on-load").trigger("click");
        }
    }
}

function ResponsiveTable() {
    if ($(".responsive-table").length > 0) {
        $(".responsive-table tbody td").each(function (index) {
            cell = this.cellIndex;

            var ThValue = $(this).closest('table').find('th:eq(' + cell + ')').text();
            var dataLabelValue = "";

            if (ThValue !== "")
                dataLabelValue = ThValue;

            $(this).attr("data-label", dataLabelValue);
        });
    }
}

function popup() {
    $(".popup-trigger").on("click", function () {
        var formPopup = $(this).data("popup");
        $(".site-popup").fadeOut();
        $(".fs-overlay").fadeIn();
        $("." + formPopup).fadeIn();
    });
    $(".fs-overlay, .site-popup .site-popup-close").on("click", function () {
        $(".fs-overlay").fadeOut();
        $(".site-popup").fadeOut();
    });
}

function siteContent() {
    var headerHeight = $("#header").outerHeight();
    $("#body-content").css("margin-top", headerHeight - 12);
}
