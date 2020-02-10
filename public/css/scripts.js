jQuery(document).ready(function () {
    //on hover box js
    jQuery(".alert-danger").hide();
    jQuery(".accordion div").hide();
    jQuery(".accordion:nth-child(1) div").addClass("showme");
    jQuery('.showme').css('display', 'block');
    jQuery(".accordion li p").hover(function () {
        jQuery('.showme').css('display', 'none');
        jQuery(".accordion div").removeClass("showme");
        jQuery(this).parent().parent().find("div").addClass("showme");
        jQuery('.showme').css('display', 'block')
    });
    jQuery(".arrow-right").click(function () {
        jQuery('.showme').css('display', 'none');
        var index = jQuery(".showme").parent().index();
        index = index + 2;
        jQuery(".showme").removeClass("showme");
        jQuery(".accordion:nth-child(" + index + ") div").addClass("showme");
        jQuery('.showme').css('display', 'block')
    });
    jQuery(".arrow-left").click(function () {
        jQuery('.showme').css('display', 'none');
        var index = jQuery(".showme").parent().index();
        index = index--;
        jQuery(".showme").removeClass("showme");
        jQuery(".accordion:nth-child(" + index + ") div").addClass("showme");
        jQuery('.showme').css('display', 'block')
    });
    ////


    // $(function () {
    //     $(document).on('scroll', function () {
    //         if ($(window).scrollTop() > 100) {
    //             $('.scroll-top-wrapper').addClass('show')
    //         } else {
    //             $('.scroll-top-wrapper').removeClass('show')
    //         }
    //     });
    //     $('.scroll-top-wrapper').on('click', scrollToTop)
    // });
    //
    // function scrollToTop() {
    //     verticalOffset = typeof (verticalOffset) != 'undefined' ? verticalOffset : 0;
    //     element = $('body');
    //     offset = element.offset();
    //     offsetTop = offset.top;
    //     $('html, body').animate({scrollTop: offsetTop}, 500, 'linear')
    // }





//navbar

    if (window.location.pathname != '/') {
        jQuery("nav.navbar.navbar-expand-lg.navbar-light.bg-light ul li a").each(function () {
            if (jQuery(this).attr("href") == '#our-expertise' || jQuery(this).attr("href") == '#why-choose-o2one' || jQuery(this).attr("href") == '#our-portfolio') {
                var href = jQuery(this).attr("href");
                href = '//' + window.location.hostname + '/' + href;
                jQuery(this).attr("href", href);
            }
        })
    }
    $('#topheader .navbar-nav a').on('click', function () {
        $('#topheader .navbar-nav').find('li.active').removeClass('active');
        $(this).parent('li').addClass('active');
    });

//////


//scrooling js in navbar


    var scrollpixel = jQuery(window).scrollTop();
    if (scrollpixel > 20) {
        jQuery(".fixed-top").css('background-color', 'red!important');
        jQuery(".fixed-top").addClass("scrolled");
    } else {
        jQuery(".fixed-top").css('background-color', 'transparent');
        jQuery(".fixed-top").removeClass("scrolled");
    }


    jQuery(window).scroll(function () {
        var scrollpixel = jQuery(window).scrollTop();
        if (scrollpixel > 20) {
            jQuery(".fixed-top").addClass("scrolled");
        } else {
            jQuery(".fixed-top").removeClass("scrolled");
        }
    })
});

/////

