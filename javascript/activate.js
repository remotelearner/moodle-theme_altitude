jQuery(document).ready(function($) {

    // Initialize slidebar functionality.
    $.slidebars();

    // Handle front page background video if present.
    if ($('.jquery-background-video').length >= 1) {
        $('.jquery-background-video').bgVideo({
            fullScreen: false, // Sets the video to be fixed to the full window - your <video> and it's container should be direct descendents of the <body> tag
            fadeIn: 1000, // Milliseconds to fade video in/out (0 for no fade)
            pauseAfter: 120, // Seconds to play before pausing (0 for forever)
            fadeOnPause: false, // For all (including manual) pauses
            fadeOnEnd: true, // When we've reached the pauseAfter time
            showPausePlay: true, // Show pause/play button
            pausePlayXPos: 'right', // left|right|center
            pausePlayYPos: 'top', // top|bottom|center
            pausePlayXOffset: '15px', // pixels or percent from side - ignored if positioned center
            pausePlayYOffset: '15px' // pixels or percent from top/bottom - ignored if positioned center
        });
    }

    // Handle front page banner slider if present.
    if ($('#slider').length >= 1) {
        var slider = $('#slider').leanSlider({
            directionNav: '#slider-direction-nav',
            controlNav: '#slider-control-nav'
        });
    }
    setTimeout(function() {
        $("#banner-nav, #banner-title").show();
        $("#banner-nav .init").addClass("animated fadeInLeft");
        $("#banner-title, #banner-title .init, #slideimg").addClass("animated fadeIn");
    }, 1000);

    /*
     * Quiz navblock link smooth scrolling
     */
    if ($("body.altitude-settings-fixedquizui.path-mod-quiz").length > 0) {

        if ($("body.altitude-settings-fixedquizui .sb-slide").length > 0) {
            $("body.altitude-settings-fixedquizui .sb-slide").addClass("transform-override");
        }

        $('#mod_quiz_navblock .qn_buttons a[href*=#]:not([href=#])').click(function() {
            if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
                if (target.length) {
                    var scrolltoposition = target.offset().top - 20;
                    if ($("#mod_quiz_navblock").css("position") == "fixed") {
                        scrolltoposition -= $("#mod_quiz_navblock").height() + $("header.navbar").height();
                    } else {
                        scrolltoposition -= 2 * $("#mod_quiz_navblock").height() + $("header.navbar").height() + 20;
                    }
                    $('html,body').animate({
                        scrollTop: scrolltoposition
                    }, 600);
                    return false;
                }
            }
        });

        /*
         * Quiz navblock fixed/relative position toggle
         */
        function changeposition() {
            var $headernav = $("header.navbar");
            var $quiznav = $("#mod_quiz_navblock");
            var $page = $("#page");
            if ($quiznav.length > 0 && $page.length > 0) {
                var quiznavoffset = $quiznav.offset();
                var pageoffset = $page.offset();
                if (window.pageYOffset+$headernav.height() >= quiznavoffset.top-$headernav.height() && window.pageYOffset+$headernav.height() > pageoffset.top) {
                    $quiznav.addClass("fixed_mod_quiz_navblock");
                } else {
                    $quiznav.removeClass("fixed_mod_quiz_navblock");
                }
            }
        }
        $(window).scroll(changeposition);
    }

    /*
     * Disable course category links and make them click parent collapse/expand toggle.
     * Open course info when category is expanded.
     */
    if ($('body.altitude-settings-coursecatajax').length > 0) {
        if ($(".course_category_tree .category .categoryname a").length > 0) {
            // Find each category.
            var handle_category_behavior = function($category) {
                // Find each category link and prevent default behavior.
                $category.find(".categoryname a").each(function() {
                    $(this).click(function(e) {
                        e.preventDefault();
                        // Toggle collapse/expand behavior.
                        $(this).parent().click();
                    });
                });
                // Handle additional functionality assignment/activation on .categoryname
                $category.find(".categoryname").each(function() {
                    // If currently collapsed, wait for courses to load and expand info button where present.
                    if ($category.hasClass("collapsed")) {
                        var infocheck = setInterval(function() {
                            if ($category.hasClass("loaded")) {
                                clearInterval(infocheck);
                                setTimeout(function() {
                                    // Check for additional categories and assign functionality.
                                    if ($category.find(".subcategories").length > 0) {
                                        $category.find(".subcategories .category").each(function() {
                                            var $subcategory = $(this);
                                            handle_category_behavior($subcategory);
                                        });
                                    }
                                    // Check for course info boxes, click and display them if present.
                                    if ($category.find(".courses .coursebox").length > 0) {
                                        $category.find(".courses .coursebox").each(function() {
                                            var $course = $(this);
                                            if ($course.hasClass('collapsed')) {
                                                setTimeout(function() {
                                                    if ($course.find(".moreinfo img").length > 0) {
                                                        $course.find(".moreinfo img").click();
                                                        $course.find(".moreinfo img").hide();
                                                    }
                                                }, 100);
                                            }
                                        });
                                    }
                                }, 100);
                            }
                        }, 100);
                    }
                });
            }
            // Assign category behavior to top level categories.
            $(".course_category_tree .category").each(function() {
                handle_category_behavior($(this));
            })
        }
    }
});
