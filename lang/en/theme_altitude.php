<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Strings for component 'theme_altitude', language 'en'
 *
 * @package   theme_altitude
 * @copyright 2016 Moodle, moodle.org
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

$string['choosereadme'] = '
<div class="clearfix">
    <div class="well">
        <h2>Custom Altitude Theme</h2>
        <p>Created by <a href="http://www.ryandeberardinis.com">Ryan DeBerardinis</a> and <a href="https://github.com/weixish">Eric Bjella</a> for <a href="http://www.remote-learner.net">Remote-Learner</a></p>
    </div>
</div>';

$string['configtitle'] = 'Altitude';

$string['pluginname'] = 'Altitude';

$string['region-side-post'] = 'Right';
$string['region-side-pre'] = 'Left';

$string['region-sidebar-block'] = 'sidebar-block';
$string['region-action-one'] = 'action-one';
$string['region-action-two'] = 'action-two';
$string['region-action-three'] = 'action-three';
$string['region-footer-one'] = 'footer-one';
$string['region-footer-two'] = 'footer-two';
$string['region-footer-three'] = 'footer-three';
$string['region-footer-four'] = 'footer-four';

$string['tab-design'] = 'Design';
$string['tab-frontpage'] = 'Front Page';
$string['tab-ui'] = 'User Interface';
$string['tab-advanced'] = 'Advanced';

$string['tab-design-title'] = '';
$string['tab-design-description'] = 'Use this area to choose the desired color palette, upload a logo, and add social media links. These settings will be applied globally.';

$string['tab-frontpage-title'] = '';
$string['tab-frontpage-description'] = 'Use this area to administer content on the front page. You can add up to 4 images and text or 1 video to the banner on the front page of your site. The image should be 1920px wide by 500px height.';
$string['tab-frontpage-video'] = '';
$string['tab-frontpage-video-description'] = '<strong>Video Banner</strong><br>Use the settings below to show a video banner instead of the default slider functionality.';
$string['tab-frontpage-subsections'] = '';
$string['tab-frontpage-subsections-description'] = '<strong>Front Page Blocks</strong><br>Use the settings below to administer content to the area below the banner.';

$string['tab-ui-title'] = '';
$string['tab-ui-description'] = 'Use this area to toggle user interface options when this theme is activated.';

$string['tab-advanced-title'] = '';
$string['tab-advanced-description'] = 'Use the custom css settings here to override any styles in this theme.';

$string['themecolor'] = 'Theme Color';
$string['themecolordesc'] = 'Select the color combination you want to use for your theme from the drop down menu. The first color is the main theme color and the second color (if listed) is the accent color.<br><br>Preview the selected theme color here:';
$string['themecolor-default'] = 'Default';
$string['themecolor-red'] = 'Red';
$string['themecolor-blue'] = 'Blue';
$string['themecolor-blue2'] = 'Blue #2';
$string['themecolor-blue3'] = 'Blue #3';
$string['themecolor-green'] = 'Green';
$string['themecolor-green2'] = 'Green #2';
$string['themecolor-green2'] = 'Green #2';
$string['themecolor-blackgold'] = 'Black and Gold';
$string['themecolor-blackyellow'] = 'Black and Yellow';
$string['themecolor-bluegold'] = 'Blue and Gold';
$string['themecolor-bluered'] = 'Blue and Red';
$string['themecolor-blueorange'] = 'Blue and Orange';
$string['themecolor-bluewhite'] = 'Blue and White';
$string['themecolor-greengold'] = 'Green and Gold';
$string['themecolor-puplegold'] = 'Purple and Gold';
$string['themecolor-puplewhite'] = 'Purple and White';
$string['themecolor-blackred'] = 'Black and Red';
$string['themecolor-maroongray'] = 'Maroon and Gray';
$string['themecolor-rltraining'] = 'RL Training';

$string['logo'] = 'Logo';
$string['logodesc'] = 'Upload your logo file here. Please note that the maximum width should be no more than 300px and the maximum height for your logo should be no more than 150px.<br><br>Remember to add the links you want in the header <a href="'.$CFG->wwwroot.'/admin/settings.php?section=themesettings">here</a>.';
$string['logoalt'] = 'Logo';

$string['favicon'] = 'Favicon';
$string['favicondesc'] = 'Upload a custom favicon (.ico) file here. A Favicon is an icon associated with your site that is displayed in a browser\'s address bar/tab or next to the site name in a bookmark list.';

$string['mycourses'] = 'My Courses Menu';
$string['mycoursesdesc'] = 'Display a menu item in the main menu that shows a user&#39;s enrolled courses.';

$string['demomode'] = 'Demo Mode';
$string['demomodedesc'] = 'Demo mode displays default content on the front page. Turn it off to configure your own content using the front page settings.';
$string['demomodeon'] = 'On';
$string['demomodeoff'] = 'Off';

for ($i = 1; $i <= 4; $i++) {
    $string['sliderheading'.$i] = '';
    $string['sliderheading'.$i.'desc'] = '<strong>Banner '.$i.'</strong> (<a class="keytoggle" href="#bannerkeyimage'.$i.'">?</a>) <div class="keyimage closed" id="bannerkeyimage'.$i.'"></div>';
    $string['sliderimage'.$i] = 'Banner '.$i.' Image';
    $string['sliderimage'.$i.'desc'] = 'The image used in banner '.$i.'.';
    $string['sliderheader'.$i] = 'Banner '.$i.' Header';
    $string['sliderheader'.$i.'desc'] = 'The header used in banner '.$i.'.';
    $string['slidertext'.$i] = 'Banner '.$i.' Text';
    $string['slidertext'.$i.'desc'] = 'The text used in banner '.$i.'.';
    $string['sliderbuttonlink'.$i] = 'Banner '.$i.' Button Link';
    $string['sliderbuttonlink'.$i.'desc'] = 'The link used in banner '.$i.'.';
    $string['sliderbuttonlabel'.$i] = 'Banner '.$i.' Button Label';
    $string['sliderbuttonlabel'.$i.'desc'] = 'The link label used in banner '.$i.'.';
}

for ($i = 1; $i <= 4; $i++) {
    $string['subsectionheading'.$i] = '';
    $string['subsectionheading'.$i.'desc'] = '<strong>Block '.$i.'</strong> (<a class="keytoggle" href="#blockkeyimage'.$i.'">?</a>) <div class="keyimage closed" id="blockkeyimage'.$i.'"></div>';
    $string['subsectiontitle'.$i] = 'Subsection '.$i.' Header';
    $string['subsectiontitle'.$i.'desc'] = 'The header used in subsection '.$i;
    $string['subsectionicon'.$i] = 'Subsection '.$i.' Icon';
    $string['subsectionicon'.$i.'desc'] = 'The icon used in subsection '.$i.'. See <a href="http://fontawesome.io/icons/" target="_blank">Font Awesome</a> for possible icons. Use only the icon name and omit any "fa-" prefixes.';
    $string['subsectiondescription'.$i] = 'Subsection '.$i.' Description';
    $string['subsectiondescription'.$i.'desc'] = 'The text used in subsection '.$i;
    $string['subsectionlink'.$i] = 'Subsection '.$i.' Link';
    $string['subsectionlink'.$i.'desc'] = 'The link used in subsection '.$i;
    $string['subsectionlabel'.$i] = 'Subsection '.$i.' Label';
    $string['subsectionlabel'.$i.'desc'] = 'The link label used in subsection '.$i;
}

$string['socialmediaicons'] = 'Social Media Icons';
$string['socialmediaiconsdesc'] = 'Underneath your logo, you can add links to social media sites. Use the box below to add the icons and links to the social media sites you want your users to visit.<br><br>Each line consists of icon name and a link URL separated by pipe characters. For example:
<pre>
facebook|https://www.facebook.com/
twitter|https://www.twitter.com/
</pre>
See <a href="http://fontawesome.io/icons/" target="_blank">Font Awesome</a> for possible icons. Use only the icon name and omit any "fa-" prefixes.';

$string['coursecatajax'] = 'Course Category AJAX';
$string['coursecatajax_desc'] = 'If enabled, this setting adjusts the AJAX behavior of the course category view so that categories and course info are fully navigable on a single page. (<a class="keytoggle" href="#coursecatkeyimage">?</a>) <div class="keyimage closed" id="coursecatkeyimage"></div>';

$string['fixedquizui'] = 'Simple Quiz Navigation';
$string['fixedquizui_desc'] = 'If enabled, this setting adjusts the quiz module user interface to a single column with a fixed quiz navigation. (<a class="keytoggle" href="#quizlayoutkeyimage">?</a>) <div class="keyimage closed" id="quizlayoutkeyimage"></div>';

$string['sidebarblockregion'] = 'Slideout Block Panel';
$string['sidebarblockregiondesc'] = 'If enabled, this setting adds a hidden slideout block panel. (<a class="keytoggle" href="#slideoutpanelkeyimage">?</a>) <div class="keyimage closed" id="slideoutpanelkeyimage"></div>';
$string['sidebarblockregionalignment'] = 'Slideout Block Panel Alignment';
$string['sidebarblockregionalignmentdesc'] = 'The alignment of the hidden slideout block panel. This setting also controls where the menu toggle button appears.';
$string['sidebarblockregionalignmentleft'] = 'Left';
$string['sidebarblockregionalignmentright'] = 'Right';
$string['sidebarblockregionbuttontype'] = 'Slideout Toggle Button Type';
$string['sidebarblockregionbuttontypedesc'] = 'Choose to display an icon, text, or both. The text for the menu button can be customized using the "sidebarblockregiontogglelabel" language string associated with this theme.';
$string['sidebarblockregionbuttontypeicontext'] = 'Icon and text';
$string['sidebarblockregionbuttontypeicon'] = 'Icon';
$string['sidebarblockregionbuttontypetext'] = 'Text';
$string['sidebarblockregiontogglelabel'] = 'Menu';

$string['onetopicstyle'] = 'One Topic Enhanced Style';
$string['onetopicstyledesc'] = 'Select the desired enhanced one topic course format style. (<a class="keytoggle" href="#onetopickeyimage">?</a>) <div class="keyimage closed" id="onetopickeyimage"></div>';
$string['onetopicstylenone'] = 'None';
$string['onetopicstyleenhanced'] = 'Enhanced Tabs';
$string['onetopicstylevertical'] = 'Vertical';

$string['gridstyle'] = 'Grid Enhanced Style';
$string['gridstyledesc'] = 'The enhanced styles adds color settings to the grid course format consistent with the color palette selection made in the design settings area.';
$string['enhancedgridhovertext'] = 'Access This Lesson';

$string['videobackgroundmp4'] = 'Video Background mp4';
$string['videobackgroundmp4_desc'] = 'URL to the mp4 file for video background';
$string['videobackgroundwebm'] = 'Video Background webm';
$string['videobackgroundwebm_desc'] = 'URL to the webm file for video background';
$string['videobackgroundogg'] = 'Video Background ogg';
$string['videobackgroundogg_desc'] = 'URL to the ogg file for video background';
$string['videoimage'] = 'Video Background Static Image';
$string['videoimage_desc'] = 'Upload a fallback static image for the video background';
$string['videoheader'] = 'Video Header Text';
$string['videoheader_desc'] = 'The text for the header that overlays the video background';
$string['videotext'] = 'Video Paragraph Text';
$string['videotext_desc'] = 'The text for the description that overlays the video background';

$string['overridecssfile'] = 'Custom CSS File';
$string['overridecssfiledesc'] = 'Whatever CSS rules you add to a CSS file uploaded here will be reflected in every page, making for easier customization of this theme.';

$string['overridecss'] = 'Custom CSS';
$string['overridecssdesc'] = 'Whatever CSS rules you add to this textarea will be reflected in every page, making for easier customization of this theme.';
