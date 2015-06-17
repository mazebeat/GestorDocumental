$.noConflict();
var $m = $;

$m(window).load(function ($m) {

    // Page Preloader
    $m('#status').fadeOut();
    $m('#preloader').delay(350).fadeOut(function () {
        $m('body').delay(350).css({'overflow': 'visible'});
    });
});

$m(document).ready(function ($m) {

    // Toggle Left Menu
    $m('.nav-parent > a').click(function () {

        var parent = $m(this).parent();
        var sub = parent.find('> ul');

        // Dropdown works only when leftpanel is not collapsed
        if (!$m('body').hasClass('leftpanel-collapsed')) {
            if (sub.is(':visible')) {
                sub.slideUp(200, function () {
                    parent.removeClass('nav-active');
                    $m('.mainpanel').css({height: ''});
                    adjustmainpanelheight();
                });
            } else {
                closeVisibleSubMenu();
                parent.addClass('nav-active');
                sub.slideDown(200, function () {
                    adjustmainpanelheight();
                });
            }
        }
        return false;
    });

    function closeVisibleSubMenu() {
        $m('.nav-parent').each(function () {
            var t = $m(this);
            if (t.hasClass('nav-active')) {
                t.find('> ul').slideUp(200, function () {
                    t.removeClass('nav-active');
                });
            }
        });
    }

    function adjustmainpanelheight() {
        // Adjust mainpanel height
        var docHeight = $m(document).height();
        if (docHeight > $m('.mainpanel').height())
            $m('.mainpanel').height(docHeight);
    }

    adjustmainpanelheight();

    // Tooltip
    //jQuery('.tooltips').tooltip({container: 'body'});

    // Popover
    //jQuery('.popovers').popover();

    // Close Button in Panels
    $m('.panel .panel-close').click(function () {
        $m(this).closest('.panel').fadeOut(200);
        return false;
    });

    // Minimize Button in Panels
    $m('.minimize').click(function () {
        var t = $m(this);
        var p = t.closest('.panel');
        if (!jQuery(this).hasClass('maximize')) {
            p.find('.panel-body, .panel-footer').slideUp(200);
            t.addClass('maximize');
            t.html('&plus;');
        } else {
            p.find('.panel-body, .panel-footer').slideDown(200);
            t.removeClass('maximize');
            t.html('&minus;');
        }
        return false;
    });

    // Form Toggles
    //jQuery('.toggle').toggles({on: true});

    //jQuery('.toggle-chat1').toggles({on: false});

    // Add class everytime a mouse pointer hover over it
    $m('.nav-bracket > li').hover(function () {
        $m(this).addClass('nav-hover');
    }, function () {
        $m(this).removeClass('nav-hover');
    });

    // Menu Toggle
    $m('.menutoggle').click(function () {

        var body = $m('body');
        var bodypos = body.css('position');

        if (bodypos != 'relative') {

            if (!body.hasClass('leftpanel-collapsed')) {
                body.addClass('leftpanel-collapsed');
                $m('.nav-bracket ul').attr('style', '');

                $m(this).addClass('menu-collapsed');

            } else {
                body.removeClass('leftpanel-collapsed chat-view');
                $m('.nav-bracket li.active ul').css({display: 'block'});

                $m(this).removeClass('menu-collapsed');

            }
        } else {

            if (body.hasClass('leftpanel-show'))
                body.removeClass('leftpanel-show');
            else
                body.addClass('leftpanel-show');

            adjustmainpanelheight();
        }

    });

    // Chat View
    $m('#chatview').click(function () {

        var body = $m('body');
        var bodypos = body.css('position');

        if (bodypos != 'relative') {

            if (!body.hasClass('chat-view')) {
                body.addClass('leftpanel-collapsed chat-view');
                jQuery('.nav-bracket ul').attr('style', '');

            } else {

                body.removeClass('chat-view');

                if (!jQuery('.menutoggle').hasClass('menu-collapsed')) {
                    jQuery('body').removeClass('leftpanel-collapsed');
                    jQuery('.nav-bracket li.active ul').css({display: 'block'});
                } else {

                }
            }

        } else {

            if (!body.hasClass('chat-relative-view')) {

                body.addClass('chat-relative-view');
                body.css({left: ''});

            } else {
                body.removeClass('chat-relative-view');
            }
        }

    });

    reposition_searchform();

    $m(window).resize(function () {

        if ($m('body').css('position') == 'relative') {
            $m('body').removeClass('leftpanel-collapsed chat-view');

        } else {
            $m('body').removeClass('chat-relative-view');
            $m('body').css({left: '', marginRight: ''});
        }

        reposition_searchform();

    });

    function reposition_searchform() {
        if ($m('.searchform').css('position') == 'relative') {
            $m('.searchform').insertBefore('.leftpanelinner .userlogged');
        } else {
            $m('.searchform').insertBefore('.header-right');
        }
    }

    // Sticky Header
    //if (jQuery.cookie('sticky-header'))
    //    jQuery('body').addClass('stickyheader');
    //
    //Sticky Left Panel
    //if (jQuery.cookie('sticky-leftpanel')) {
    //    jQuery('body').addClass('stickyheader');
    //    jQuery('.leftpanel').addClass('sticky-leftpanel');
    //}
    //
    //Left Panel Collapsed
    //if (jQuery.cookie('leftpanel-collapsed')) {
    //    jQuery('body').addClass('leftpanel-collapsed');
    //    jQuery('.menutoggle').addClass('menu-collapsed');
    //}

    // Changing Skin
    //var c = jQuery.cookie('change-skin');
    //if (c) {
    //    jQuery('head').append('<link id="skinswitch" rel="stylesheet" href="css/style.' + c + '.css" />');
    //}

});