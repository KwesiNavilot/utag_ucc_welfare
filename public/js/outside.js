$(document).ready(function () {
    // Smooth scroll for the navigation menu and links with .scrollto classes
    $(document).on('click', '.nav-menu a', '.scrollto', function(e) {
        if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
            var target = $(this.hash);
            if (target.length) {
                e.preventDefault();

                var scrollto = target.offset().top;

                if ($(this).attr("href") === '#header') {
                    scrollto = 0;
                }

                $('html, body').animate({
                    scrollTop: scrollto
                }, 1500);

                if ($(this).parents('.nav-menu, .mobile-nav').length) {
                    $('.nav-menu .active, .mobile-nav .active').removeClass('active');
                    $(this).closest('li').addClass('active');
                }

                if ($('body').hasClass('mobile-nav-active')) {
                    $('body').removeClass('mobile-nav-active');
                }

                return false;
            }
        }
    });

    // Activate smooth scroll on page load with hash links in the url
    $(document).ready(function() {
        if (window.location.hash) {
            var initial_nav = window.location.hash;
            if ($(initial_nav).length) {
                var scrollto = $(initial_nav).offset().top - scrolltoOffset;
                $('html, body').animate({
                    scrollTop: scrollto
                }, 1500, 'easeInOutExpo');
            }
        }
    });

    // Navigation active state on scroll
    var nav_sections = $('section');
    var main_nav = $('.nav-menu, .mobile-nav');
    $(window).on('scroll', function() {
        var cur_pos = $(this).scrollTop() + 200;

        nav_sections.each(function() {
            var top = $(this).offset().top,
                bottom = top + $(this).outerHeight();

            if (cur_pos >= top && cur_pos <= bottom) {
                if (cur_pos <= bottom) {
                    main_nav.find('li').removeClass('active');
                }
                main_nav.find('a[href="#' + $(this).attr('id') + '"]').parent('li').addClass('active');
            }
            if (cur_pos < 300) {
                $(".nav-menu ul:first li:first, .mobile-nav ul:first li:first").addClass('active');
            }
        });
    });

    // Back to top button
    $(window).scroll(function() {
        if ($(this).scrollTop() > 100) {
            $('.back-to-top').fadeIn('slow');
        } else {
            $('.back-to-top').fadeOut('slow');
        }
    });

    $('.back-to-top').click(function() {
        $('html, body').animate({
            scrollTop: 0
        }, 1500, 'easeInOutExpo');
        return false;
    });


    //Mobile navigation anew
    $('#sidebar-toggle').click(
        function() {
            // alert('Yes!');
            $('.hidden-nav').css("max-width", "100%");
            $('#sidebar-toggle').removeClass('hide-hidden-nav');
            $('#sidebar-toggle').addClass('show-hidden-nav');

        }
    );

    $('#hide-nav, #about-h, #contact-h, #claims-h').click(
        function() {
            //alert('No!');
            $('.hidden-nav').css("max-width", "0%");
            $('#hide-nav').removeClass('show-hidden-nav');
            $('#hide-nav').addClass('hide-hidden-nav');
        }
    );

    $('#i-sidebar-toggle').click(
        function() {
            //alert(screen.width);

            if(screen.width > 560) {
                $('.i-hidden-nav').css("max-width", "45%");
                $('#i-sidebar-toggle').removeClass('hide-hidden-nav');
                $('#i-sidebar-toggle').addClass('show-hidden-nav');
            } else {
                $('.i-hidden-nav').css("max-width", "360px");
                $('#i-sidebar-toggle').removeClass('hide-hidden-nav');
                $('#i-sidebar-toggle').addClass('show-hidden-nav');
            }

        }
    );

    $('#i-hide-nav').click(
        function() {
            $('.i-hidden-nav').css("max-width", "0%");
            $('#i-hide-nav').removeClass('show-hidden-nav');
            $('#i-hide-nav').addClass('hide-hidden-nav');
        }
    );
});
