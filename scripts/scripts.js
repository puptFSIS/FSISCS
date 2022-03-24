/* Settings
----------------------------------------------------------------------------- */

/*
 * var "packed" (boolean) = choose how to serve scripts packed in one file or separate
 * var "analyticsId" (string) = Google analytics ID string (UA-XXXXX-X)
 * var "floatingHeader" (boolean) = Show or hide floating header
 *
 * var "googleMap" (object) = Google map settings
 *     var "googleMap.address" (string) = Address line (You can pass latitude and longitude if this field is used)
 *     var "googleMap.latitude" (int) = Location's latitude
 *     var "googleMap.longitude" (int) = Location's longitude
 *     var "googleMap.title" (string) = Poiner title
 *     var "googleMap.ballonText" (string) = Text showed in baloon
 *     var "googleMap.zoom" (int) = Zoom level value
 *
 * var "tweet" (object) = Twitter plugin settings
 *     var "tweet.username" (string) = Twitter username
 *     var "tweet.count" (int) = Number of displayed entries
 *
 * var "rss" (object) = Rss plugin settings
 *     var "rss.feed" (string) = Rss feed source
 *     var "rss.count" (int) = Number of displayed entries
 *
 * var "flickr" (object) = Flickr plugin settings
 *     var "flickr.query" (string) = Flickr API query (Info: http://www.flickr.com/services/feeds/)
 *     var "flickr.count" (int) = Number of displayed entries
 */

var dbooomSettings = {
    packed: true,
    analyticsId: "UA-7587752-4",
    floatingHeader: true,
    googleMap: {
        address: "1000 Chopper Circle Denver, CO 80204",
        latitude: 0,
        longitude: 0,
        title: "Main office",
        baloonText: "Here we are!",
        zoom: 15
    },
    tweet: {
        username: "envato",
        count: 3
    },
    rss: {
        feed: "http://themeforest.net/feeds/new-themeforest-items.atom",
        count: 2
    },
    flickr: {
        query: "22980156@N03",
        count: 12
    }
};


/* Get base path to the script files by getting "data-path" value of #js-dispatcher
----------------------------------------------------------------------------- */
var dispatherObject = document.getElementById("js-dispatcher");
var dispatherValue = dispatherObject.getAttribute('src');
var myRe = /(.*)scripts.js/ig;
var scriptsPath = myRe.exec(dispatherValue)[1];


/* Scripts loading bootstrap
----------------------------------------------------------------------------- */
yepnope({
    load: [
        scriptsPath + "libs/jquery/jquery.min.js",
        scriptsPath + "libs/jquery-ui/jquery-ui.min.js",
        "http://maps.google.com/maps/api/js?sensor=false&callback=gmapLoader"
    ],
    complete: function() {
        yepnope({
            test: dbooomSettings.packed,
            yep: [
                scriptsPath + "libs/packed.js",
                scriptsPath + "libs/jquery-cookie/jquery.cookie.js",
                scriptsPath + "libs/switcher/switcher.js"
            ],
            nope: [
                scriptsPath + "libs/swfobject/swfobject.js",
                scriptsPath + "libs/jquery-easing/jquery.easing.js",
                scriptsPath + "libs/jquery-color/jquery.color.js",
                scriptsPath + "libs/prettyphoto/jquery.prettyPhoto.js",
                scriptsPath + "libs/tweet/jquery.tweet.js",
                scriptsPath + "libs/video-js/video.js",
                scriptsPath + "libs/zrssfeed/jquery.zrssfeed.min.js",
                scriptsPath + "libs/jflickrfeed/jflickrfeed.min.js",
                scriptsPath + "libs/tipsy/jquery.tipsy.js",
                scriptsPath + "libs/bxslider/jquery.bxSlider.min.js",
                scriptsPath + "libs/roundabout/jquery.roundabout.js",
                scriptsPath + "libs/jquery-html5form/jquery.html5form.js",
                scriptsPath + "libs/supersized/supersized.core.min.js",
                scriptsPath + "libs/nivo-slider/jquery.nivo.slider.pack.js",
                scriptsPath + "libs/quicksand/jquery.quicksand.js"
            ],
            complete: function () {
                getThemeScripts();
                yepnope(scriptsPath + "user-scripts.js");
            }
        });
    }
});



/* Get google map
----------------------------------------------------------------------------- */
function gmapLoader(){
    yepnope({
        load: scriptsPath + "libs/gmap/jquery.gmap.min.js",
        complete: function() {
            if(jQuery(".gmap-holder").length) {
                jQuery(".gmap-holder").gMap({
                    markers: [{
                        latitude: dbooomSettings.googleMap.latitude,
                        longitude: dbooomSettings.googleMap.longitude,
                        address: dbooomSettings.googleMap.address,
                        title: dbooomSettings.googleMap.title,
                        html: dbooomSettings.googleMap.baloonText,
                        popup: true
                    }],
                    zoom: dbooomSettings.googleMap.zoom
                });
            }
        }
    });
}


/* Tempate scripts
----------------------------------------------------------------------------- */
function getThemeScripts() {
    jQuery(document).ready(function($) {

        /* Remove no-js class from html element if JavaScript is enabled
        --------------------------------------------------------------------- */
        $("html").removeClass("no-js");


        /* Add rel value for prettyPhoto plugin from data-rel attribute
        --------------------------------------------------------------------- */
        $('a[data-rel]').each(function() {
            $(this).attr('rel', $(this).data('rel'));
        });


        /* Filterable portfolio
        --------------------------------------------------------------------- */
        if($(".portfolio-filterable, .gallery-filterable").length) {
            var $portfolioSource = $(".portfolio-filterable, .gallery-filterable");
            var $portfolioTarget = $portfolioSource.clone();

            // Portfolio type related vars
            if($('body').hasClass('page-portfolio-2')) {
                var elementIncrement = 2;
            } else if($('body').hasClass('page-portfolio-3')) {
                var elementIncrement = 3;
            } else if($('body').is('.page-portfolio-4, .page-gallery')) {
                var elementIncrement = 4;
            }

            // Fill elements array for last-layout class
            if(elementIncrement) {
                var lastElements = [];
                for(var i = -1; i <= 200; i += elementIncrement) {
                    lastElements.push(i);
                }
            }

            // Filter portfolio on click
            $(".portfolio-filter a").click(function(e) {
                $(this).addClass("current-cat").siblings().removeClass("current-cat");

                // Get selected elelemnts
                if($(this).data('category') == 'all') {
                    var selectedItems = $portfolioTarget.find(".portfolio-item, .gallery-item");
                } else {
                    var selectedItems = $portfolioTarget.find(".portfolio-item[data-category=" + $(this).data('category') + "], .gallery-item[data-category=" + $(this).data('category') + "]");
                }

                // Set layout-last class for last element in a row
                if(elementIncrement) {
                    $portfolioTarget.find(selectedItems).each(function(index, Element) {
                        $(this).removeClass('layout-last');

                        if($.inArray(index, lastElements) > -1) {
                            $(this).addClass('layout-last');
                        }
                    });
                }

                // Quicksand
                $portfolioSource.quicksand(selectedItems, {
                    duration: 800,
                    easing: 'swing'
                }, function() {
                    $("a[rel^='prettyPhoto']").prettyPhoto({
                        deeplinking: false,
                        social_tools: false
                    });
                    animateLinks();
                });

                return false;
            });
        }


        /* Theme backgrounds and elements colors
        --------------------------------------------------------------------- */
        if($("#theme-backgrounds").length) {
            var dbooomSlides = [];
            $("<div id='body-texture'>").appendTo("body");

            // Get images
            $("#theme-backgrounds img").each(function() {
                dbooomSlides.push({ image: $(this).attr("src") });
            });

            // Initialize plugin
            $.supersized({
                fit_portrait: 1,
                start_slide: 0,
                image_protect: 1,
                slide_links: 0,
                thumb_links: 0,
                slides: dbooomSlides
            });

            // Process links color animation
            colorReference = $("#theme-backgrounds img:eq(" + $.supersized.vars.current_slide + ")").data("color");

            if(colorReference.length) {
                animateLinks();
                animateElements();
            }
        }


        /* Tweet widgets
        --------------------------------------------------------------------- */
        if($(".widget-tweets").length){
            $(".widget-tweets .widget-content").tweet({
                username: dbooomSettings.tweet.username,
                count: dbooomSettings.tweet.count,
                loading_text: "Loading. Please wait..."
            });
        }

        if($(".widget-last-tweet").length){
            $(".widget-last-tweet .widget-content").tweet({
                username: dbooomSettings.tweet.username,
                count: 1,
                loading_text: "Loading. Please wait..."
            });
        }

        // Enable links animation
        if(colorReference.length) {
            $(".widget-tweets .widget-content, .widget-last-tweet .widget-content").live("loaded", function(){
                animateLinks();
            });
        }


        /* RSS Reader
        --------------------------------------------------------------------- */
        if($(".widget-rss .widget-content").length){
            $(".widget-rss .widget-content").rssfeed(
                dbooomSettings.rss.feed, {
                limit: dbooomSettings.rss.count,
                header: false,
                titletag: false,
                content: false,
                snippet: false
            });
        }


        /* Flickr gallery
        --------------------------------------------------------------------- */
        if($(".widget-gallery .widget-content").length) {
            $(".widget-gallery .widget-content").jflickrfeed({
                limit: dbooomSettings.flickr.count,
                qstrings: { id: dbooomSettings.flickr.query },
                itemTemplate: "<a href='{{image_b}}' class='element-holder media-image' rel='prettyPhoto[galleryWidget]'><img src='{{image_s}}' alt='{{title}}' /></a>"
            }, function(data) {
                $("a[rel^='prettyPhoto']").prettyPhoto({
                    deeplinking: false,
                    social_tools: false,
                    ie6_fallback: false,
                    overlay_gallery: false
                });

                // Margin clearing for last element in a row
                $(".page-sidebar .widget-gallery .element-holder:nth-child(4n)").addClass("last-element");
                $("#page-body-content .layout-1-3 .widget-gallery .element-holder:nth-child(4n)").addClass("last-element");
                $("#page-body-content .layout-1-4 .widget-gallery .element-holder:nth-child(3n)").addClass("last-element");
                $("#bottom-widgets .layout-1-3 .widget-gallery .element-holder:nth-child(4n)").addClass("last-element");
                $("#bottom-widgets .layout-1-4 .widget-gallery .element-holder:nth-child(4n)").addClass("last-element");
            });
        }


        /* HTML5 Video player
        --------------------------------------------------------------------- */
        VideoJS.setupAllWhenReady();


        /* Slider round ----------------------------------------------------- */
        if($(".slider-round").length) {
            // Slide description
            $(".slide-desc").css({display: "none"});
            $(".roundabout-in-focus .slide-desc").fadeIn();

            // Show description for focused slide
            $('.slider-round li').focus(function() {
                $(this).children(".slide-desc").stop(true,true).fadeIn();
            });

            $('.slider-round li').blur(function() {
                $(".slide-desc").stop(true,true).fadeOut();
            });

            // Slider with interval implementation
            var roundInterval;

            $(".slider-round ul")
            .roundabout({
                minScale: 0.1,
                minOpacity: 0.3,
                duration: 500,
                easing: "easeOutBack"
            });

            // Autoplay function
            function roundStartAutoPlay() {
                return setInterval(function() {
                    $('.slider-round ul').roundabout_animateToNextChild();

                }, 5000);
            }

            roundInterval = roundStartAutoPlay();

            $(".slider-round ul").hover(
                function() { clearInterval(roundInterval); },
                function() { roundInterval = roundStartAutoPlay(); }
            );
        }


        /* Slider nivo ------------------------------------------------------ */
        $('.slider-nivo .slider-container').nivoSlider({
            pauseTime: 10000,
            directionNavHide: false,
            controlNav: false
        });


        /* Slider content --------------------------------------------------- */
        if($(".slider-content").length) {
            $(".slider-content .slide-caption-left, .slider-content .slide-caption-right").css({display: "none"});

            $(".slider-content ul").bxSlider({

                auto: true,
                speed: 600,
                pause: 7000,
                onAfterSlide: function(currentSlideNumber, totalSlideQty, currentSlideHtmlObject) {
                    $(".slider-content .slide-caption-left, .slider-content .slide-caption-right").fadeOut();
                    currentSlideHtmlObject.find(".slide-caption-left, .slide-caption-right").delay(100).fadeIn(1000);
                }
            });
        }

        /* Gallery fading --------------------------------------------------- */
        if($(".gallery-fading").length) {
            $(".gallery-fading .slide-caption-left, .gallery-fading .slide-caption-right").css({display: "none"});

            $(".gallery-fading ul").bxSlider({
                mode: 'fade',
                controls: false,
                pager: true,
                auto: true,
                speed: 1000,
                pause: 5000,
                autoHover: true,
                autoDelay: 5000,
                onAfterSlide: function(currentSlideNumber, totalSlideQty, currentSlideHtmlObject) {
                    $(".gallery-fading .slide-caption-left, .gallery-fading .slide-caption-right").fadeOut();
                    currentSlideHtmlObject.find(".slide-caption-left, .slide-caption-right").delay(100).fadeIn(1000);
                }
            });
        }


        /* Tabs
        --------------------------------------------------------------------- */
        if($(".tabs-block, .widget-tabs").length) {
            $(".tabs-block, .widget-tabs").tabs({
                fx: { opacity: 'toggle' }
            });
        }


        /* Toggles
        --------------------------------------------------------------------- */
        if($(".toggle-block").length) {
            // Hide all toggles content
            $(this).find(".toggle-content").css({display: "none"});

            $(".toggle-trigger").click(function() {
                $(this).toggleClass("active").next().stop(true, true).slideToggle("normal", "easeOutSine");
                // Disable link click
                return false;
            });
        }


        /* Accordions
        --------------------------------------------------------------------- */
        if($(".accordion-block").length) {
            $(".accordion-block").each(function() {
                // Hide all accordions content
                $(this).find(".accordion-content").css({display: "none"});

                // Click on accordion item trigger and show the content
                $(this).find(".accordion-trigger").click(function() {
                    // On click we close all slides and removes "on" class
                    $(".accordion-trigger").removeClass("active");
                    $(".accordion-content").slideUp();

                    // Open next to this trigger slider
                    if($(this).next().is(":hidden") == true) {
                        $(this).addClass("active");
                        $(this).next().slideDown();
                    }
                    // Disable link click
                    return false;
                });
            });
        }


        /* Top navigation
        --------------------------------------------------------------------- */
        $('#header-navigation ul > li:last-child').addClass('last-child');

        /* Second level offset ---------------------------------------------- */
        $("#header-navigation > li > ul").each(function() {
            var offset = $(this).offset();
            var width  = $(this).children('li').width();
            var parent = $(this).parent("li").width();

            if((offset.left + width) > screen.width) {
                $(this).css({left: -(width - parent - 10)});
            }
        });

        /* Third level+ offset ---------------------------------------------- */
        $("#header-navigation ul ul").each(function() {
            var offset = $(this).offset();
            var width  = $(this).children('li').width();

            if((offset.left + width) > screen.width) {
                $(this).css({left: -(width + 2), width: width + 2});
            }
        });

        /* Some init tuning ------------------------------------------------- */
        $("#header-navigation ul").css({display: "none"});
        $("#header-navigation li").css({backgroundColor: "rgba(0,0,0,0.01)"});
        $("#header-navigation li ul").parent("li").addClass("dropdown");
        $("#header-navigation a").removeAttr("title");

        /* Dropdown animation ----------------------------------------------- */
        $("#header-navigation li").hover(function(){
            // IE7 Fix
            if($.browser.msie && $.browser.version == 7.0) {
                $(this).children("ul").css({display: "block"});
            }

            // Main animation
            $(this).children("ul")
                .css({visibility: "visible"})
                .stop(true, true)
                .delay(200)
                .slideDown(400, "easeOutSine");

            // RGBA background animation
            if(Modernizr.rgba) {
                $(this).stop(true, true).animate({backgroundColor: "rgba(0,0,0,0.4)"});
            }
        },function(){
            // Main animation
            $(this).children("ul")
                .stop(true, true)
                .delay(100)
                .fadeOut("fast");

            // RGBA background animation
            if($(Modernizr.rgba).length) {
                $(this).stop(true, true).animate({backgroundColor: "rgba(0,0,0,0.01)"});
            }
        });

        /* Text indentation animation --------------------------------------- */
        $("#header-navigation li li").hover(function(){
            $(this).children("a").animate(
                {textIndent: "5px"},
                {duration: "fast", queue: false}
            );
        }, function() {
            $(this).children("a").animate(
                {textIndent: "0px"},
                {duration: "fast", queue: false}
            );
        });


        /* Elements wrapper
        --------------------------------------------------------------------- */
        // Add wrapper to buttons, form submits and pager elements
        $(".btn,.btn-s,.btn-l,.btn-xl,#pager li > *,input[type=submit],input[type=reset],input[type=button]")
        .not("#subheader-search-submit,#target-action .btn-xl,#site-search input,#site-newsletter input").wrap("<div class='btn-wrapper' />");


        /* Elements background animation
        ----------------------------------------------------------------------------- */
        if(Modernizr.rgba) {
            // Set default rgba color value
            $('.tags-floated-list a,.calendar-holder,.widget-tabs .widget-content,.banner-125,.banner-190,.banner-250,.post-content-tags a,.btn-wrapper,.toggle-block,.tabs-block,.accordion-block,.widget-hint,.widget-tweets li').each(function() {
                if($(this).closest('.dark-skin').length == 0) {
                    $(this).css({backgroundColor: "rgba(0,0,0,0.1)", color: "#333"});

                    // Animation
                    $(this).hover(function() {
                        $(this).stop(true, true).animate({backgroundColor: "rgba(0,0,0,0.15)"});
                    }, function() {
                        $(this).stop(true, true).animate({backgroundColor: "rgba(0,0,0,0.1)"});
                    });
                }
            });
        }


        /* Widgets hint
        --------------------------------------------------------------------- */
        if($(".widget-hint").length) {
            $(".widget-hint").css({display: "none"});

            // Hover animation
            $(".widget-hint").parent().css({position: "relative"}).hover(function() {
                $(this).find(".widget-hint").stop(true).fadeTo("fast", 1);
            }, function() {
                $(this).find(".widget-hint").stop(true).fadeTo("normal", 0);
            });
        }


        /* Message boxes animation
        --------------------------------------------------------------------- */
        var messageBoxes = $(".rgba .box-info .box-content, .rgba .box-success .box-content, .rgba .box-warning .box-content, .rgba .box-error .box-content");

        if(messageBoxes.length && Modernizr.rgba) {
            messageBoxes.css({backgroundColor: "rgba(255,255,255,0.6)"});

            // Animation
            messageBoxes.hover(function() {
                $(this).stop(true).animate({backgroundColor: "rgba(255,255,255,0)"});
            }, function() {
                $(this).stop(true).animate({backgroundColor: "rgba(255,255,255,0.6)"});
            });
        }


        /* Social icons
        --------------------------------------------------------------------- */
        if($(".social-icons-list").length) {
            $(".social-icons-list a").css({opacity: .5});

            // Icon animation
            $(".social-icons-list a").hover(function() {
                $(this).stop(true, true).fadeTo("normal", 1);
            }, function() {
                $(this).stop(true, true).fadeTo("slow", .5);
            });

            // Tipsy applying
            $(".social-icons-list a").tipsy({fade: true, gravity: 's'});
        }


        /* ------------------------------------- */
        $("#contact-form input, #comment-reply input").tipsy({fade: true, gravity: 'w'});
        $(".title-right").tipsy({fade: true, gravity: 'e'});

        /* Related item
        --------------------------------------------------------------------- */
        if($(".post-related-item, .latest-news").length) {
            $(".post-related-item, .latest-news .element-holder").tipsy({fade: true, gravity: 'n'});
        }


        /* Comment item
        --------------------------------------------------------------------- */
        if($(".comment-item").length) {
            $(".comment-reply").css({display: "none"});

            // Animation
            $(".comment-item").hover(function() {
                $(this).find(".comment-reply").stop(true, true).delay(100).fadeTo("400", 1);
            }, function() {
                $(this).find(".comment-reply").stop(true, true).fadeTo(400, 0);
            });
        }


        /* Pricing table - Plan item
        --------------------------------------------------------------------- */
        if($(".plan-item").length) {

            if($("body.dark-skin").length) {
                var priceColor = "#000";
                var priceColorHover = "#555";
            } else {
                var priceColor = "#999";
                var priceColorHover = "#333";
            }

            $(".plan-item").hover(function() {
                $(this).find(".plan-item-price")
                       .stop(true, true)
                       .animate({ color: priceColorHover }, "fast", "easeOutSine");
            }, function() {
                $(this).find(".plan-item-price")
                       .stop(true, true)
                       .animate({ color: priceColor }, "fast", "easeOutSine");
            });
        }


        /* Team member
        --------------------------------------------------------------------- */
        if($(".team-members").length) {
            $('.team-member-info').css({display: "none"});

            // Animation
            $('.team-members li').hover(function() {
                $(this).find('.team-member-info').stop(true, true).slideDown();
            }, function() {
                $(this).find('.team-member-info').stop(true, true).slideUp();
            });
        }


        /* Featured news block
        --------------------------------------------------------------------- */
        if($(".featured-news-text").length) {
            $(".featured-news-text").each(function() {
                var boxElement = $(this);
                var boxHeight = boxElement.height();

                boxElement.children('p').css({display: "none"});
                var boxMinHeight = boxElement.height();

                // Animation
                $(this).parent().hover(function() {
                    boxElement.stop(true, true).animate({height: boxHeight});
                    $(this).find('p').stop(true, true).fadeIn();


                }, function() {
                    boxElement.stop(true, true).animate({height: boxMinHeight});
                    $(this).find('p').stop(true, true).fadeOut();
                });
            });
        }


        /* Floating header
        --------------------------------------------------------------------- */
        if(dbooomSettings.floatingHeader === true) {
            var showHeight = $('#page-body').offset();
            var floatLogo = $('#header-logo a');
            var floatNav = $('#header-navigation');

            // Build Floated header
            $("<div id='floated-header'>\
                <div class='container-aligner'>\
                    <div id='floated-logo'>"+floatLogo.html()+"</div>\
                    <ul id='floated-nav'>"+floatNav.html()+"<li id='scrollTop'><a href='#'>Top</a></li></ul>\
                </div>\
               </div>").appendTo("body");

            $("#floated-header #floated-nav li").css({background: "none"});

            // Check on page load
            if($(window).scrollTop() > (showHeight.top + 80)) {
                $('#floated-header').fadeIn();
            }

            // Check on scroll event
            $(window).scroll(function () {
                if($(window).scrollTop() > (showHeight.top + 80)) {
                    $('#floated-header').fadeIn();
                } else {
                    $('#floated-header').fadeOut();
                }
            });

            // Scroll top link
            var scrollTop = $("#scrollTop a").css({opacity: .3});

            scrollTop.hover(function() {
                scrollTop.stop(true, true).animate({opacity: 1});
            }, function() {
                scrollTop.stop(true, true).animate({opacity: .3});
            });

            scrollTop.click(function() {
                $("html,body").animate({scrollTop: 0}, 2000, "easeOutQuint", function() {
                    $('#floated-header').fadeOut();
                });
                return false;
            });
        }


        /* Process images and elements decorations
        --------------------------------------------------------------------- */
        $("a[rel^='prettyPhoto']").prettyPhoto({
            deeplinking: false,
            social_tools: false
        });

        // Zoom frame ----------------------------------------------------------
        $("a[rel^='prettyPhoto'],.media-image,.media-link,.media-video").live("mouseover mouseout", function(event) {
            var thisItem = $(this);
            var width = thisItem.width();
            var height = thisItem.height();

            // Check if element has zoom frame and append if has not
            thisItem.not(':has(.zoom-frame)')
                   .css({position: "relative"})
                   .append("<span class='zoom-frame'><span class='zoom-frame-icon' /></span>");

            // Set zoom frame dimentions
            var zoomFrame = thisItem.find(".zoom-frame");
            var zoomFrameIcon = thisItem.find(".zoom-frame-icon");

            zoomFrame.width(thisItem.width() - 10).height(thisItem.height() - 10);

            // Animation
            if (event.type == "mouseover") {
                 zoomFrame.stop().fadeTo("slow", 1);
                 zoomFrameIcon.stop().animate({top: "50%"});
            } else {
                zoomFrame.stop().fadeTo("slow", 0);
                zoomFrameIcon.stop().animate({top: "70%"});
            }
        });


        /* Contact form ajax processing
        --------------------------------------------------------------------- */
        if($("#contact-form").length) {
            $("#contact-form").each(function() {
                var form = $(this);
                // Form validation messages
                form.prepend("<div id='contact-messages' />");
                var errors = form.find("#contact-messages");

                // Form submit respond
                form.after("<div id='contact-response' />");
                var response = form.next("#contact-response").css({display: "none"});

                // Validate forms
                form.html5form({
                    messages: "en",
                    async: false,
                    responseDiv: errors
                });

                // Submit contact form via AJAX
                form.submit(function(event) {
                    event.preventDefault();

                    $.ajax({
                        type: "POST",
                        url: $(this).attr("action"),
                        data: $(this).serialize(),
                        success: function(data){
                            form.slideUp();
                            response.html(data).fadeIn("slow");
                        },
                        dataType: "html"
                    });
                });
            });
        }

    });
}

// Animate links
function animateLinks() {
    if(colorReference.length) {
        $("a").each(function() {
            // Get link's default state color
            var linkDefaultColor = $(this).css("color");
            $(this).css({color: linkDefaultColor}).addClass("link-processed");

            // Animate link on hover
            $(this).hover(function() {
                $(this).stop(true).animate({color: colorReference}, "fast");
            }, function() {
                $(this).stop(true).animate({color: linkDefaultColor}, "normal");

            });
        });
    }
}


// Animate elements
function animateElements() {
    $(".btn, .btn-s, .btn-l, .btn-xl, #pager a, .accordion-trigger, .toggle-trigger, button,input[type='submit'],input[type='reset'],input[type='button']").not("#subheader-search-submit,#site-search-submit,#subscribe-submit").each(function() {
        // Get link's default state color
        var elementDefaultBackground = $(this).css("backgroundColor");
        $(this).css({backgroundColor: elementDefaultBackground});

        // Animate link on hover
        $(this).hover(function() {
            $(this).stop(true, true).animate({backgroundColor: colorReference}, "fast");
        }, function() {
            $(this).stop(true, true).animate({backgroundColor: elementDefaultBackground}, "normal");
        });
    });
}

