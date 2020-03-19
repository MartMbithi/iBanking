(function($) {
    "use strict";

    /*----------------------------
     wow js active
    ------------------------------ */
    new WOW().init();

    /*------------- preloader js --------------*/
    $(window).on('load', function() { // makes sure the whole site is loaded
        $('.preloder-wrap').fadeOut(); // will first fade out the loading animation
        $('.loader').delay(150).fadeOut('slow'); // will fade out the white DIV that covers the website.
        $('body').delay(150).css({ 'overflow': 'visible' })
    })
  
  // responsive-menu tigger
    $(".menu").on('click', function() {
        $(".responsive-menu-area").toggleClass("active");
    });

    $('ul.metismenu').metisMenu({
    });

    // slider-active
    $('.slider-active').owlCarousel({
        margin: 0,
        loop: true,
        nav: true,
        smartSpeed: 1200,
        navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
        URLhashListener: true,
        startPosition: 'URLHash',
        responsive: {
            0: {
                items: 1,
            },
            450: {
                items: 1,
            },
            768: {
                items: 1
            },
            1000: {
                items: 1
            }
        }
    });

    // slider-active
    $(".slider-active").on('translate.owl.carousel', function() {
        $('.slider-items h2').removeClass('slideInUp animated').hide();
        $('.slider-items p').removeClass('slideInUp animated').hide();
        $('.slider-items ul').removeClass('slideInUp animated').hide();
    });

    $(".slider-active").on('translated.owl.carousel', function() {
        $('.owl-item.active .slider-items h2').addClass('slideInUp animated').show();
        $('.owl-item.active .slider-items p').addClass('slideInUp animated').show();
        $('.owl-item.active .slider-items ul').addClass('slideInUp animated').show();
    });

    //slider-area background setting
    function sliderBgSetting() {
        if ($(".slider-active .slider-items,.slider-active2 .slider-items").length) {
            $(".slider-active .slider-items,.slider-active2 .slider-items").each(function() {
                var $this = $(this);
                var img = $this.find(".slider").attr("src");

                $this.css({
                    backgroundImage: "url(" + img + ")",
                    backgroundSize: "cover",
                    backgroundPosition: "center center"
                })
            });
        }
    }
    sliderBgSetting()

    // test-active
    $('.test-active').owlCarousel({
        margin: 0,
        loop: true,
        autoplay: true,
        autoplayTimeout: 4000,
        nav: true,
        smartSpeed: 800,
        navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
        responsive: {
            0: {
                items: 1
            },
            450: {
                items: 1
            },
            768: {
                items: 1
            },
            1000: {
                items: 1
            }
        }
    });

    // test-active
    $('.test-active2').owlCarousel({
        margin: 0,
        loop: true,
        autoplay: true,
        autoplayTimeout: 4000,
        nav: false,
        smartSpeed: 800,
        navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
        responsive: {
            0: {
                items: 1
            },
            450: {
                items: 1
            },
            768: {
                items: 1
            },
            1000: {
                items: 1
            }
        }
    });
    // brand-active
    $('.banner-active').owlCarousel({
        margin: 30,
        loop: true,
        autoplay: true,
        autoplayTimeout: 4000,
        nav: true,
        smartSpeed: 800,
        navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
        responsive: {
            0: {
                items: 2
            },
            450: {
                items: 2
            },
            768: {
                items: 3
            },
            1000: {
                items: 4
            }
        }
    });


    /*==========================================================================
        WHEN DOCUMENT LOADING
    ==========================================================================*/

    
    // Single gallery slider
    function productGallary() {
        if ($('.slider-active2').length && $('.slider-thumbnil-active').length) {

            var $sync1 = $(".slider-active2"),
                $sync2 = $(".slider-thumbnil-active"),
                flag = false,
                duration = 500;

            $sync1
                .owlCarousel({
                    items: 1,
                    margin: 0,
                    nav: false,
                    dots: false
                })
                .on('changed.owl.carousel', function(e) {
                    if (!flag) {
                        flag = true;
                        $sync2.trigger('to.owl.carousel', [e.item.index, duration, true]);
                        flag = false;
                    }
                });

            $sync2
                .owlCarousel({
                    margin: 10,
                    items: 5,
                    nav: false,
                    dots: false,
                    navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
                    center: false,
                    responsive: {
                        0: {
                            items: 2,
                            autoWidth: false
                        },
                        400: {
                            items: 2,
                            autoWidth: false
                        },
                        500: {
                            items: 2,
                            center: false,
                            autoWidth: false
                        },
                        600: {
                            items: 3,
                            autoWidth: false
                        },
                        1200: {
                            items: 3,
                            autoWidth: false
                        }
                    },
                })
                .on('click', '.owl-item', function() {
                    $sync1.trigger('to.owl.carousel', [$(this).index(), duration, true]);

                })
                .on('changed.owl.carousel', function(e) {
                    if (!flag) {
                        flag = true;
                        $sync1.trigger('to.owl.carousel', [e.item.index, duration, true]);
                        flag = false;
                    }
                });

        };
    }

    productGallary();


    // // stickey menu
    $(window).on('scroll', function() {
        var scroll = $(window).scrollTop(),
            mainHeader = $('#sticky-header'),
            mainHeaderHeight = mainHeader.innerHeight();

        // console.log(mainHeader.innerHeight());
        if (scroll > 0) {
            $("#sticky-header").addClass("sticky-menu");
        } else {
            $("#sticky-header").removeClass("sticky-menu");
        }
    });

    /*--------------------------
     scrollUp
    ---------------------------- */
    $.scrollUp({
        scrollText: '<i class="fa fa-arrow-up"></i>',
        easingType: 'linear',
        scrollSpeed: 900,
        animation: 'fade'
    });

    /*--
    Magnific Popup
    ------------------------*/
    $('.popup').magnificPopup({
        type: 'image',
        gallery: {
            enabled: true
        }

    });

    $('.video-popup').magnificPopup({
        type: 'iframe',
        gallery: {
            enabled: true
        }

    });

    // counter up
    $('.counter').counterUp({
        delay: 10,
        time: 1000
    });



    $('.grid').imagesLoaded(function() {
        // init Isotope
        var $grid = $('.grid').isotope({
            itemSelector: '.project',
            percentPosition: true,
            masonry: {
                // use outer width of grid-sizer for columnWidth
                columnWidth: '.project',
            }
        });
    });

    /*-------------------------------------------------------
        blog details
    -----------------------------------------------------*/
    if ($(".choos-area").length) {
        var post = $(".choost-img");

        post.each(function() {
            var $this = $(this);
            var entryMedia = $this.find("img");
            var entryMediaPic = entryMedia.attr("src");

            $this.css({
                backgroundImage: "url(" + entryMediaPic + ")",
                backgroundSize: "cover",
                backgroundPosition: "center center",
            })
        })
    }

    function setTwoColEqHeight($col1, $col2) {
        var firstCol = $col1,
            secondCol = $col2,
            firstColHeight = $col1.innerHeight(),
            secondColHeight = $col2.innerHeight();

        if (firstColHeight > secondColHeight) {
            secondCol.css({
                "height": firstColHeight + 1 + "px"
            })
        } else {
            firstCol.css({
                "height": secondColHeight + 1 + "px"
            })
        }
    }


    $(window).on("load", function() {
        setTwoColEqHeight($(".choost-img"), $(".choos-content"));

    });


    /*---------------------
     countdown
    --------------------- */
    $('[data-countdown]').each(function() {
        var $this = $(this),
            finalDate = $(this).data('countdown');
        $this.countdown(finalDate, function(event) {
            $this.html(event.strftime('<span class="cdown days"><span class="time-count">%-D</span> <p>Days</p></span> <span class="cdown hour"><span class="time-count">%-H</span> <p>Hour</p></span> <span class="cdown minutes"><span class="time-count">%M</span> <p>Min</p></span> <span class="cdown second"> <span><span class="time-count">%S</span> <p>Sec</p></span>'));
        });
    });

    /*==================================
            LOAD MORE JQUERY
    ================================== */
    var list1 = $(".moreload");
    var numToShow1 = 2;
    var button1 = $(".loadmore-btn");
    var numInList1 = list1.length;

    list1.hide();
    if (numInList1 > numToShow1) {
        button1.show();
    }
    list1.slice(0, numToShow1).show();
    button1.on('click', function() {
        var showing1 = list1.filter(':visible').length;
        list1.slice(showing1 - 1, showing1 + numToShow1).fadeIn();
        var nowShowing1 = list1.filter(':visible').length;
        if (nowShowing1 >= numInList1) {
            button1.hide();
        }
    });


    /*---------------------
    // Ajax Contact Form
    --------------------- */

    $('.cf-msg').hide();
    $('form#cf button#submit').on('click', function() {
        var fname = $('#fname').val();
        var subject = $('#subject').val();
        var email = $('#email').val();
        var msg = $('#msg').val();
        var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;

        if (!regex.test(email)) {
            alert('Please enter valid email');
            return false;
        }

        fname = $.trim(fname);
        subject = $.trim(subject);
        email = $.trim(email);
        msg = $.trim(msg);

        if (fname != '' && email != '' && msg != '') {
            var values = "fname=" + fname + "&subject=" + subject + "&email=" + email + " &msg=" + msg;
            $.ajax({
                type: "POST",
                url: "mail.php",
                data: values,
                success: function() {
                    $('#fname').val('');
                    $('#subject').val('');
                    $('#email').val('');
                    $('#msg').val('');

                    $('.cf-msg').fadeIn().html('<div class="alert alert-success"><strong>Success!</strong> Email has been sent successfully.</div>');
                    setTimeout(function() {
                        $('.cf-msg').fadeOut('slow');
                    }, 4000);
                }
            });
        } else {
            $('.cf-msg').fadeIn().html('<div class="alert alert-danger"><strong>Warning!</strong> Please fillup the informations correctly.</div>')
        }
        return false;
    });

})(jQuery);