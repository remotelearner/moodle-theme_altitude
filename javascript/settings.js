jQuery(document).ready(function($) {

    /* Assign class to themecolor select to display color box below. */
    if ($("select#id_s_theme_altitude_themecolor").length > 0) {
        var colorsetting = "";
        function showcolorsettingchoice() {
            $("select#id_s_theme_altitude_themecolor").closest("#admin-themecolor").removeClass(colorsetting);
            colorsetting = $("select#id_s_theme_altitude_themecolor").val();
            $("select#id_s_theme_altitude_themecolor").closest("#admin-themecolor").addClass(colorsetting);
        }
        $("select#id_s_theme_altitude_themecolor").change(showcolorsettingchoice);
        showcolorsettingchoice();
    }

    /* Assign keyimage functionality for settings keys. */
    if ($(".keyimage").length > 0 && $(".keytoggle").length > 0) {
        $(".keytoggle").unbind('click');
        $(".keytoggle").click(function(event) {
            var sel = $(this).attr("href");
            var $keytoggle = $(".keyimage"+sel);
            if ($keytoggle.hasClass("closed")) {
                $keytoggle.removeClass("closed");
            } else {
                $keytoggle.addClass("closed");
            }
            event.preventDefault();
        });
    }
});
