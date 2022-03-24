jQuery(document).ready(function($) {
    /* Wrapper
    ------------------------------------------------------------------------- */
    $('#style-switcher').fadeIn();

    /* Toggle wrapper */
    $('#style-switcher-trigger').toggle(function() {
        $('#style-switcher').animate({left: '0'}, 'slow', 'easeOutQuad');
        $(this).addClass('switcher-opened');
    }, function() {
        $('#style-switcher').animate({left: '-203px'}, 'slow', 'easeOutQuad');
        $(this).removeClass('switcher-opened');
    });

    /* Skin type
    ------------------------------------------------------------------------- */
    if($.cookie('switcher-skin')) {
        $('body').addClass("dark-skin");
        $(".sss-skin-type a").removeClass("active");
        $(".sss-skin-type a.sss-skin-type-dark").addClass("active");
    }

    $(".sss-skin-type a").click(function(event) {
        event.preventDefault();

        if($(this).hasClass("sss-skin-type-dark")) {
            $.cookie('switcher-skin', true);
        } else {
            $.cookie('switcher-skin', null);
        }

        location.reload();
    });

    /* Container type
    ------------------------------------------------------------------------- */
    if($.cookie('switcher-container')) {
        $('body').addClass("page-boxed");
        $(".sss-container-type a").removeClass("active");
        $(".sss-container-type a.sss-container-type-boxed").addClass("active");
    }

    $(".sss-container-type a").click(function(event) {
        event.preventDefault();

        $(this).addClass("active").siblings().removeClass("active");
        $("body").removeClass("page-boxed");

        if($(this).hasClass("sss-container-type-boxed")) {
             $("body").addClass("page-boxed");
             $.cookie('switcher-container', true);
        } else {
            $.cookie('switcher-container', null);
        }
    });

    /* Sidebar type
    ------------------------------------------------------------------------- */
    if($("body").is(".page-sidebar-left, .page-sidebar-right")) {
        if($.cookie('switcher-sidebar')) {
            // Body manipulation
            $("body")
                .removeClass("page-sidebar-left page-sidebar-right")
                .addClass($.cookie('switcher-sidebar'));

            // Links manipulation
            $(".sss-sidebar-type a").removeClass("active");

            if($.cookie('switcher-sidebar') == "page-sidebar-left") {
                $(".sss-sidebar-type a.sss-sidebar-left").addClass("active");
            } else if ($.cookie('switcher-sidebar') == "page-sidebar-right") {
                $(".sss-sidebar-type a.sss-sidebar-right").addClass("active");
            }
        }

        $(".sss-sidebar-type a").click(function(event) {
            event.preventDefault();

            $(this).addClass("active").siblings().removeClass("active");
            $("body").removeClass("page-sidebar-left page-sidebar-right");

            if($(this).hasClass("sss-sidebar-left")) {
                 $("body").addClass("page-sidebar-left");
                 $.cookie("switcher-sidebar", "page-sidebar-left");
            } else if($(this).hasClass("sss-sidebar-right")) {
                 $("body").addClass("page-sidebar-right");
                 $.cookie("switcher-sidebar", "page-sidebar-right");
            }
        });
    }

    /* Pattern texture
    ------------------------------------------------------------------------- */
    $(".sss-pattern-texture a").each(function() {
        $(this).css({backgroundImage: "url(images/textures/" + $(this).data("pattern") + ".png)"})
    });

    $(".sss-pattern-texture a").live('click', function(event) {
        event.preventDefault();

        patternDiv = $("#body-texture");
        patternDiv.attr({style: ""});

        $(this).addClass("active").siblings().removeClass("active");
        patternDiv.css({backgroundImage: "url(images/textures/" + $(this).data("pattern") + ".png)"})
    });


    /* Switcher buttons
    ------------------------------------------------------------------------- */
    $('#style-switcher-reset').click(function(event) {
        event.preventDefault();

        $.cookie('switcher-skin', null);
        $.cookie('switcher-container', null);
        $.cookie('switcher-sidebar', null);

        location.reload();
    });
});

