/* Copyright (C) YOOtheme GmbH, http://www.gnu.org/licenses/gpl.html GNU/GPL */

jQuery(document).ready(function($) {

    var config = $('html').data('config') || {},
            win    = $(window),
            navbar = $('.tm-navbar'),
            body   = $('body');

    // Social buttons
    $('article[data-permalink]').socialButtons(config);

    $(".drawer_toggle").click(function() {

        if (!$.easing["easeOutExpo"]) {
            $.easing["easeOutExpo"] = function(x, t, b, c, d) {
                return t == d ? b + c : c * (-Math.pow(2, -10 * t / d) + 1) + b
            }
        }
        
        //Expand
        if (drawer_state == 0) {
            $("div#tm-drawer").slideDown(400, 'easeOutExpo');
            $('.drawer_toggle span').removeClass('uk-icon-chevron-down');
            $('.drawer_toggle span').addClass('uk-icon-chevron-up');
            drawer_state = 1;
            //Collapse
        } else if (drawer_state == 1) {
            $("div#tm-drawer").slideUp(400, 'easeOutExpo');
            $('.drawer_toggle span').removeClass('uk-icon-chevron-up');
            $('.drawer_toggle span').addClass('uk-icon-chevron-down');
            drawer_state = 0;
        }
    });

    var drawer_state = 0;


    //to top scroller
    $(window).scroll(function() {
        if ($(this).scrollTop() === 0) {
            $(".tm-totop-scroller").addClass("totop-hidden")
        } else {
            $(".tm-totop-scroller").removeClass("totop-hidden")
        }
    });

    if ($('body').hasClass('header-style3')) {
        var nav      = $('.tm-nav-wrapper'),
            navitems = nav.find('.uk-navbar-nav > li'),
            logo     = $('div.tm-logo-large');

        if (navitems.length && logo.length) {
            navitems.eq(Math.floor(navitems.length/2) - 1).after('<li class="tm-nav-logo-centered" data-uk-dropdown>'+logo[0].outerHTML+'</li>');
            logo.remove();
        }
    };
    
    if ($('body').hasClass('header-default')) {
        navbar.find('.uk-dropdown').addClass('uk-dropdown-center');
    }
    
    if ($('body').hasClass('tm-isblog')) {
        if (!$('body').hasClass('headertype-default')) {
            navbar.find('.uk-navbar-nav li .smooth-scroll').attr('data-uk-smooth-scroll', '{offset: 65}');
        } else {
            navbar.find('.uk-navbar-nav li .smooth-scroll').attr('data-uk-smooth-scroll', '{}');
        }
    }

    if ($('body').find('.heading-wrapper')) {
        $(".breadcrumbs-wrapper" ).insertAfter( ".heading-wrapper .header_text" );
    }
});


    
