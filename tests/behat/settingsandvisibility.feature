@theme @theme_altitude @javascript

Feature: Basic visibility and navigability tests.
    The user can log in and view the header, footer, and page content with the theme enabled.
    The custommenu, when enabled, is displayed.
    The slideout side bar menu, when enabled, is displayed and functional.
    Admin user can select a color scheme from the color theme select.
    Admin user can update social media icons and links, and changes are displayed correctly.

    @altitude_logoutlogin
    Scenario: Admin user can enable the theme, log out, and log in.
        Given the following "users" exist:
            | username | firstname | lastname | email |
            | student | Student | User | student@behat.com |
        And the following "courses" exist:
            | fullname | shortname | category |
            | Course 1 | C1 | 0 |
        And the following "course enrolments" exist:
            | user | course | role |
            | student | C1 | student |
        And I log in as "admin"
        And I enable the "Altitude" theme
        And I log out
        And I log in as "student"
        And I am on homepage
        Then The "header" css element should be visible
        And The "#logo a img" css element should be visible
        And The "#page-footer" css element should be visible
        And The "#page-footer2" css element should be visible
        And The ".block_navigation" css element should be visible
        And The "#region-main" css element should be visible
        And I click on "//a[text()='Course 1']" "xpath_element"
        Then The "header" css element should be visible
        And The "#logo a img" css element should be visible
        And The "#page-footer" css element should be visible
        And The "#page-footer2" css element should be visible
        And The ".block_navigation" css element should be visible
        And The "#region-main" css element should be visible

    @altitude_custommenu
    Scenario: Admin user enables custommenu, and custommenu is displayed.
        Given the following "users" exist:
            | username | firstname | lastname | email |
            | student | Student | User | student@behat.com |
        And I log in as "admin"
        And I enable the "Altitude" theme
        And I am on homepage
        And I navigate to "Theme settings" node in "Site administration > Appearance >Themes"
        And I set the field "Custom menu items" to multiline
            """
            Moodle community|https://moodle.org
            -Moodle free support|https://moodle.org/support
            -###
            -Moodle development|https://moodle.org/development
            --Moodle Docs|http://docs.moodle.org|Moodle Docs
            --German Moodle Docs|http://docs.moodle.org/de|Documentation in German|de
            #####
            Moodle.com|http://moodle.com/
            """
        And I click on "Save changes" "button"
        And I am on site homepage
        Then "Moodle community" "link" in the ".menus ul.nav" "css_element" should be visible
        And I log out
        And I log in as "student"
        And I am on site homepage
        Then "Moodle community" "link" in the ".menus ul.nav" "css_element" should be visible

    @altitude_slideout
    Scenario: Admin use enables theme slideout sidebar. Button is visible.
        Given I log in as "admin"
        And I enable the "Altitude" theme
        And I am on site homepage
        And I navigate to "Altitude" node in "Site administration > Appearance >Themes"
        And I click on "User Interface" "link"
        And I set the following fields to these values:
            | Slideout Block Panel | Yes |
        And I click on "Save changes" "button"
        And I am on site homepage
        And I click on "Turn editing on" "link_or_button"
        Then "a#side-panel-button" "css_element" in the ".menus" "css_element" should be visible
        When I click on "a#side-panel-button" "css_element"
        Then "aside#block-region-sidebar-block" "css_element" should be visible
        ## The following will not work on phantomjs at present.
        ## Implement when fixes for drag and drop are implemented by Moodle.org.
        ## See https://tracker.moodle.org/browse/MDL-44326
        # And I change viewport size to "3560x1600"
        # And I scroll to ".block_calendar_month" css element
        # And I drag "block_calendar_month" "block" and I drop it in "aside#block-region-sidebar-block" "css_element"
        # And I wait "5" seconds
        # Then "block_calendar_month" "block" in the "aside#block-region-sidebar-block" "css_element" should be visible
        # And ".block_action img.block-hider-hide" "css_element" in the ".block_calendar_month .block_action" "css_element" should be visible
        # When I click on ".block_action img.block-hider-hide" "css_element"
        # Then ".block_action img.block-hider-show" "css_element" should be visible
        # And I click on "a#side-panel-button" "css_element"
        # Then "Calendar" "block" should not be visible

    @altitude_socialmedia
    Scenario: Admin user can update social media icons and links, and changes are displayed correctly.
        Given I log in as "admin"
        And I enable the "Altitude" theme
        And I go to Atitude settings
        And I click on "//a[text()='Design']" "xpath_element"
        And I set the field "Social Media Icons" to multiline
            """
            facebook|https://facebook.com
            twitter|https://twitter.com
            google|https://google.com
            """
        And I click on "Save changes" "button"
        When I am on site homepage
        Then ".fa.fa-facebook" "css_element" in the ".social-links" "css_element" should be visible
        And ".fa.fa-twitter" "css_element" in the ".social-links" "css_element" should be visible
        And ".fa.fa-google" "css_element" in the ".social-links" "css_element" should be visible
        And The "header" css element should be visible
        And The "#logo a img" css element should be visible
        And The "#page-footer" css element should be visible
        And The "#page-footer2" css element should be visible
        And The ".block_navigation" css element should be visible
        And The "#region-main" css element should be visible

    @altitude_colorselector
    Scenario: Admin user can use theme color selector when Altitude theme is active.
        Given I log in as "admin"
        And I enable the "Altitude" theme
        And I go to Atitude settings
        And I click on "ul.nav-tabs li:first-of-type a" "css_element"
        And I set the following fields to these values:
            | Theme Color | Black and Yellow |
        Then The element "#admin-themecolor" should have the class "blackyellow-theme"

    @altitude_demooff
    Scenario: Admin user can turn off demo mode, and add slideshow images or video.
        Given I log in as "admin"
        And I enable the "Altitude" theme
        And I go to Atitude settings
        And I click on "//a[text()='Front Page']" "xpath_element"
        And I set the following fields to these values:
            | Demo Mode | Off |
        And I wait "2" seconds
        # Slider image 1 fields.
        Then "#admin-sliderimage1" "css_element" should be visible
        Then "#admin-sliderheader1" "css_element" should be visible
        Then "#admin-slidertext1" "css_element" should be visible
        Then "#admin-sliderbuttonlink1" "css_element" should be visible
        Then "#admin-sliderbuttonlabel1" "css_element" should be visible
        # Slider image 2 fields.
        Then "#admin-sliderimage2" "css_element" should be visible
        Then "#admin-sliderheader2" "css_element" should be visible
        Then "#admin-slidertext2" "css_element" should be visible
        Then "#admin-sliderbuttonlink2" "css_element" should be visible
        Then "#admin-sliderbuttonlabel2" "css_element" should be visible
        # Slider image 3 fields.
        Then "#admin-sliderimage3" "css_element" should be visible
        Then "#admin-sliderheader3" "css_element" should be visible
        Then "#admin-slidertext3" "css_element" should be visible
        Then "#admin-sliderbuttonlink3" "css_element" should be visible
        Then "#admin-sliderbuttonlabel3" "css_element" should be visible
        # Slider image 4 fields.
        Then "#admin-sliderimage4" "css_element" should be visible
        Then "#admin-sliderheader4" "css_element" should be visible
        Then "#admin-slidertext4" "css_element" should be visible
        Then "#admin-sliderbuttonlink4" "css_element" should be visible
        Then "#admin-sliderbuttonlabel4" "css_element" should be visible
        # Video fields.
        Then "#admin-videobackgroundmp4" "css_element" should be visible
        Then "#admin-videobackgroundwebm" "css_element" should be visible
        Then "#admin-videobackgroundogg" "css_element" should be visible
        Then "#admin-videoimage" "css_element" should be visible
        Then "#admin-videoheader" "css_element" should be visible
        Then "#admin-videotext" "css_element" should be visible
        # Block section 1 fields.
        Then "#admin-subsectiontitle1" "css_element" should be visible
        Then "#admin-subsectionicon1" "css_element" should be visible
        Then "#admin-subsectiondescription1" "css_element" should be visible
        Then "#admin-subsectionlink1" "css_element" should be visible
        Then "#admin-subsectionlabel1" "css_element" should be visible
        # Block section 2 fields.
        Then "#admin-subsectiontitle2" "css_element" should be visible
        Then "#admin-subsectionicon2" "css_element" should be visible
        Then "#admin-subsectiondescription2" "css_element" should be visible
        Then "#admin-subsectionlink2" "css_element" should be visible
        Then "#admin-subsectionlabel2" "css_element" should be visible
        # Block section 3 fields.
        Then "#admin-subsectiontitle3" "css_element" should be visible
        Then "#admin-subsectionicon3" "css_element" should be visible
        Then "#admin-subsectiondescription3" "css_element" should be visible
        Then "#admin-subsectionlink3" "css_element" should be visible
        Then "#admin-subsectionlabel3" "css_element" should be visible

    @altitude_banner @javascript @_file_upload
    Scenario: Admin user can turn of demo mode and add custom slider images and text.
        Given I log in as "admin"
        And I enable the "Altitude" theme
        And I go to Atitude settings
        And I click on "//a[text()='Front Page']" "xpath_element"
        And I set the following fields to these values:
            | Demo Mode | Off |
        And I wait "2" seconds
        And I change viewport size to "3560x3560"
        And I set the following fields to these values:
            | Banner 1 Header | Banner 1 Header str |
            | Banner 1 Text | Banner 1 Text str |
            | Banner 1 Button Link | Banner 1 Button Link str |
            | Banner 1 Button Label | Banner 1 Button Label str |
        And I upload the file "theme/altitude/tests/fixtures/test-slide1.jpg" to the field "Banner 1 Image"
        And I click on "Save changes" "button"
        And I am on site homepage
        And I wait "5" seconds
        # Slide 1 elements exist.
        Then "#slider .slide1 img" "css_element" should be visible
        And "#slider .slide1 #banner-title h1" "css_element" should be visible
        And "#slider .slide1 #banner-title p" "css_element" should be visible
        And "#slider .slide1 #banner-title a" "css_element" should be visible

        @altitude_customcss @javascript @_file_upload
        Scenario: Admin user can upload a custom css file to field and css is applied to site.
        Given I log in as "admin"
        And I enable the "Altitude" theme
        And I go to Atitude settings
        And I click on "//a[text()='Advanced']" "xpath_element"
        And I upload the file "theme/altitude/tests/fixtures/custom-css.css" to the field "Custom CSS File"
        And I click on "Save changes" "button"
        And I am on site homepage
        Then "header.navbar" "css_element" should not be visible
