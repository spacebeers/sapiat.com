jQuery(document).ready(function () {
    var $header = jQuery("#header");
    var $window = jQuery(window);
    var $document = jQuery(document);
    var $body = jQuery('body');
    var nav = jQuery('#nav');
    var close = jQuery('#close');

    nav.on('click', function (e) {
        $header.addClass('open')
    })

    close.on('click', function (e) {
        $header.removeClass('open')
    })

    var headCheck = function () {
        if ($document.scrollTop() > 45) {
            $header.addClass('stuck');
        } else {
            $header.removeClass('stuck');
        }
    }

    headCheck()

    jQuery(window).scroll(function () {
        headCheck()

        if ($document.scrollTop() > 150) {
            $body.addClass('scrolled');
        } else {
            $body.removeClass('scrolled');
        }
    });

    jQuery('#user').attr('placeholder', 'Enter your username').attr('required', 'true');
    jQuery('#pass').attr('placeholder', 'Enter your password').attr('required', 'true');

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