jQuery(document).ready(function() {
    var navbreak = 960;
    var $header = jQuery('#header');
    var $banner = jQuery('#banner');
    var $tabs = jQuery('#tabs');
    var $window = jQuery(window);

    jQuery(".col-split-1").wrapAll("<div class='col-6' />");
    jQuery(".col-split-2").wrapAll("<div class='col-6' />");

    jQuery(window).scroll(function () {
        if (jQuery(document).scrollTop() > 150) {
            jQuery('#header').addClass('shrink');
        } else {
            jQuery('#header').removeClass('shrink');
        }
    });

    jQuery('#gallery').on('init', function (event, slick) {
        jQuery('#loader').remove();
    });

    jQuery('#gallery').slick({
        dots: true,
        infinite: true,
        arrows: false,
        speed: 500,
        fade: true,
        cssEase: 'linear',
        autoplay: true,
        autoplaySpeed: 5000
    });

    jQuery('.dropdown-toggle').click(function () {
        if (window.innerWidth <= navbreak) {
            jQuery(this).toggleClass('open');
        }
    });
    /*
    var tabChange = function () {
        var tabs = jQuery('#cycle-tabs .nav-tabs > li');
        var active = tabs.filter('.active');
        var next = active.next('li').length ? active.next('li').find('a') : tabs.filter(':first-child').find('a');
        // Use the Bootsrap tab show method
        next.tab('show');
    };
    // Tab Cycle function
    var tabCycle = setInterval(tabChange, 5000);

    // Tab click event handler
    jQuery('#cycle-tabs .nav-tabs a').on('click', function (e) {
        e.preventDefault();
        // Stop the cycle
        clearInterval(tabCycle);
        // Show the clicked tabs associated tab-pane
        jQuery(this).tab('show');
        // Start the cycle again in a predefined amount of time
        setTimeout(function () {
            //tabCycle = setInterval(tabChange, 5000);
        }, 15000);
    });*/

    jQuery(".clone").clone(true).appendTo(".dropdown-menu");

    jQuery("#nav-toogle").click(function () {
        jQuery(".navbar-collapse").fadeToggle(200);
        jQuery(this).toggleClass('btn-close');
        jQuery('body').toggleClass('menu-open');
    });

    jQuery('#user').attr('placeholder', 'username').attr('required', 'true');
    jQuery('#pass').attr('placeholder', 'password').attr('required', 'true');

    jQuery('.download-form select').on('change', function (e) {
        var $select = jQuery(this);
        var value = $select.val();
        var $link = $select.closest('.download-form').children('a');

        if (value) {
            $link.attr('disabled', false);
            $link.attr('href', value);
        } else {
            $link.attr('disabled', true);
        }
    });


    jQuery('.batch-form select').on('change', function (e) {
        var $select = jQuery(this);
        var value = $select.val();
        console.log(value);
        var $link = $select.closest('.batch-form').children('button');

        if (value.length > 0) {
            $link.attr('disabled', false);
            $link.data('files', value);
        } else {
            $link.attr('disabled', true);
        }
    });

    jQuery('.batch-form button').on('click', function (e) {
        var $button = jQuery(this);
        console.log($button.data('files'));
        var files = $button.data('files');
        window.multiDownload(files);
    });

    jQuery('.hide-this-field').hide();

    jQuery('.hide-field-toggler select').on('change', function (e) {
        var $select = jQuery(this);
        var value = $select.val();
        var $field = jQuery('.hide-this-field');

        if (value == 'Other') {
            $field.show();
        } else {
            $field.hide();
        }
    });


});