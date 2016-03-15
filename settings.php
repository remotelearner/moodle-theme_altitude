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
 * Setttings for component 'theme_altitude'
 *
 * @package   theme_altitude
 * @copyright 2016 Remote Learner  http://www.remote-learner.net/
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require_once(dirname(__FILE__).'/admin_settings.php');

defined('MOODLE_INTERNAL') || die;

// Define tab constants
if (!defined('THEME_ALTITUDE_TAB_DESIGN')) {
    /**
     * THEME_ALTITUDE_TAB_DESIGN - Order/link reference for design tab.
     */
    define('THEME_ALTITUDE_TAB_DESIGN', 0);
    /**
     * THEME_ALTITUDE_TAB_FRONTPAGE - Order/link reference for front page tab.
     */
    define('THEME_ALTITUDE_TAB_FRONTPAGE', 1);
    /**
     * THEME_ALTITUDE_TAB_UI - Order/link reference for UI tab.
     */
    define('THEME_ALTITUDE_TAB_UI', 2);
    /**
     * THEME_ALTITUDE_TAB_ADVANCED - Order/link reference for advanced tab.
     */
    define('THEME_ALTITUDE_TAB_ADVANCED', 3);
}

if ($ADMIN->fulltree) {

    $themename = 'theme_altitude';

    $name = $themename .'/tabs';
    $tabs = new altitude_admin_setting_tabs($name, $settings->name, $reload);
    $tabs->addtab(THEME_ALTITUDE_TAB_DESIGN, get_string('tab-design', $themename));
    $tabs->addtab(THEME_ALTITUDE_TAB_FRONTPAGE, get_string('tab-frontpage', $themename));
    $tabs->addtab(THEME_ALTITUDE_TAB_UI, get_string('tab-ui', $themename));
    $tabs->addtab(THEME_ALTITUDE_TAB_ADVANCED, get_string('tab-advanced', $themename));

    $settings->add($tabs);

    $tab = $tabs->get_setting();

    if ($tab === THEME_ALTITUDE_TAB_DESIGN) {

        // Control Section Heading.
        $name = $themename .'/designtabheading';
        $title = get_string('tab-design-title', $themename);
        $description = html_writer::tag('p', get_string('tab-design-description', $themename));
        $setting = new admin_setting_heading($name, $title, $description);
        $settings->add($setting);

        // Color setting.
        $name = 'theme_altitude/themecolor';
        $title = get_string('themecolor', 'theme_altitude');
        $description = get_string('themecolordesc', 'theme_altitude');
        $setting = new admin_setting_configselect($name, $title, $description, ' ', array(
            ' ' => get_string('themecolor-default', 'theme_altitude'),
            'red-theme' => get_string('themecolor-red', 'theme_altitude'),
            'blue-theme' => get_string('themecolor-blue', 'theme_altitude'),
            'blue-theme-2' => get_string('themecolor-blue2', 'theme_altitude'),
            'blue-theme-3' => get_string('themecolor-blue3', 'theme_altitude'),
            'green-theme' => get_string('themecolor-green', 'theme_altitude'),
            'green-theme-2' => get_string('themecolor-green2', 'theme_altitude'),
            'blackgold-theme' => get_string('themecolor-blackgold', 'theme_altitude'),
            'blackyellow-theme' => get_string('themecolor-blackyellow', 'theme_altitude'),
            'bluegold-theme' => get_string('themecolor-bluegold', 'theme_altitude'),
            'bluered-theme' => get_string('themecolor-bluered', 'theme_altitude'),
            'blueorange-theme' => get_string('themecolor-blueorange', 'theme_altitude'),
            'bluewhite-theme' => get_string('themecolor-bluewhite', 'theme_altitude'),
            'greengold-theme' => get_string('themecolor-greengold', 'theme_altitude'),
            'purplegold-theme' => get_string('themecolor-puplegold', 'theme_altitude'),
            'purplewhite-theme' => get_string('themecolor-puplewhite', 'theme_altitude'),
            'redblack-theme' => get_string('themecolor-blackred', 'theme_altitude'),
            'maroongray-theme' => get_string('themecolor-maroongray', 'theme_altitude'),
            ));
        $setting->set_updatedcallback('theme_reset_all_caches');
        $settings->add($setting);

        // Logo file setting.
        $name = 'theme_altitude/logo';
        $title = get_string('logo', 'theme_altitude');
        $description = get_string('logodesc', 'theme_altitude');
        $setting = new admin_setting_configstoredfile($name, $title, $description, 'logo');
        $setting->set_updatedcallback('theme_reset_all_caches');
        $settings->add($setting);

        // Favicon file setting.
        $name = 'theme_altitude/favicon';
        $title = get_string('favicon', 'theme_altitude');
        $description = get_string('favicondesc', 'theme_altitude');
        $setting = new admin_setting_configstoredfile($name, $title, $description, 'favicon');
        $setting->set_updatedcallback('theme_reset_all_caches');
        $settings->add($setting);

        // Social media icons textarea.
        $name = 'theme_altitude/socialmediaicons';
        $title = get_string('socialmediaicons', 'theme_altitude');
        $description = get_string('socialmediaiconsdesc', 'theme_altitude');
        $default = "facebook|#facebooklink\n";
        $default .= "twitter|#twitterlink";
        $setting = new admin_setting_configtextarea($name, $title, $description, $default);
        $setting->set_updatedcallback('theme_reset_all_caches');
        $settings->add($setting);

    } else if ($tab == THEME_ALTITUDE_TAB_FRONTPAGE) {

        // Front page section heading.
        $name = $themename .'/frontpagetabheading';
        $title = get_string('tab-frontpage-title', $themename);
        $description = html_writer::tag('p', get_string('tab-frontpage-description', $themename));
        $setting = new admin_setting_heading($name, $title, $description);
        $settings->add($setting);

        // Loop over 4 banner image settings.
        for ($i = 1; $i <= 4; $i++) {

            // Slider image header heading
            $name = $themename .'/sliderheading'.$i;
            $title = get_string('sliderheading'.$i, $themename);
            $description = html_writer::tag('div', get_string('sliderheading'.$i.'desc', $themename));
            $setting = new admin_setting_heading($name, $title, $description);
            $settings->add($setting);

            // Slider image file setting.
            $name = 'theme_altitude/sliderimage'.$i;
            $title = get_string('sliderimage'.$i, 'theme_altitude');
            $description = get_string('sliderimage'.$i.'desc', 'theme_altitude');
            $setting = new admin_setting_configstoredfile($name, $title, $description, 'sliderimage'.$i);
            $setting->set_updatedcallback('theme_reset_all_caches');
            $settings->add($setting);

            // Slider header setting.
            $name = 'theme_altitude/sliderheader'.$i;
            $title = get_string('sliderheader'.$i, 'theme_altitude');
            $description = get_string('sliderheader'.$i.'desc', 'theme_altitude');
            $default = '';
            $setting = new admin_setting_configtext($name, $title, $description, $default);
            $setting->set_updatedcallback('theme_reset_all_caches');
            $settings->add($setting);

            // Slider text setting.
            $name = 'theme_altitude/slidertext'.$i;
            $title = get_string('slidertext'.$i, 'theme_altitude');
            $description = get_string('slidertext'.$i.'desc', 'theme_altitude');
            $default = '';
            $setting = new admin_setting_configtext($name, $title, $description, $default);
            $setting->set_updatedcallback('theme_reset_all_caches');
            $settings->add($setting);

            // Slider button link setting.
            $name = 'theme_altitude/sliderbuttonlink'.$i;
            $title = get_string('sliderbuttonlink'.$i, 'theme_altitude');
            $description = get_string('sliderbuttonlink'.$i.'desc', 'theme_altitude');
            $default = '';
            $setting = new admin_setting_configtext($name, $title, $description, $default);
            $setting->set_updatedcallback('theme_reset_all_caches');
            $settings->add($setting);

            // Slider 1 button label setting.
            $name = 'theme_altitude/sliderbuttonlabel'.$i;
            $title = get_string('sliderbuttonlabel'.$i, 'theme_altitude');
            $description = get_string('sliderbuttonlabel'.$i.'desc', 'theme_altitude');
            $default = '';
            $setting = new admin_setting_configtext($name, $title, $description, $default);
            $setting->set_updatedcallback('theme_reset_all_caches');
            $settings->add($setting);
        }

        // Video settings section heading.
        $name = $themename .'/frontpagetabvideoheading';
        $title = get_string('tab-frontpage-video', $themename);
        $description = html_writer::tag('p', get_string('tab-frontpage-video-description', $themename));
        $setting = new admin_setting_heading($name, $title, $description);
        $settings->add($setting);

        // Video banner source mp4.
        $name = 'theme_altitude/videobackgroundmp4';
        $title = get_string('videobackgroundmp4', 'theme_altitude');
        $description = get_string('videobackgroundmp4_desc', 'theme_altitude');
        $default = '';
        $setting = new admin_setting_configtext($name, $title, $description, $default);
        $setting->set_updatedcallback('theme_reset_all_caches');
        $settings->add($setting);

        // Video banner source webm.
        $name = 'theme_altitude/videobackgroundwebm';
        $title = get_string('videobackgroundwebm', 'theme_altitude');
        $description = get_string('videobackgroundwebm_desc', 'theme_altitude');
        $default = '';
        $setting = new admin_setting_configtext($name, $title, $description, $default);
        $setting->set_updatedcallback('theme_reset_all_caches');
        $settings->add($setting);

        // Video banner source ogg.
        $name = 'theme_altitude/videobackgroundogg';
        $title = get_string('videobackgroundogg', 'theme_altitude');
        $description = html_writer::empty_tag('hr').get_string('videobackgroundogg_desc', 'theme_altitude');
        $default = '';
        $setting = new admin_setting_configtext($name, $title, $description, $default);
        $setting->set_updatedcallback('theme_reset_all_caches');
        $settings->add($setting);

        // Video background static image.
        $name = 'theme_altitude/videoimage';
        $title = get_string('videoimage', 'theme_altitude');
        $description = get_string('videoimage_desc', 'theme_altitude');
        $setting = new admin_setting_configstoredfile($name, $title, $description, 'videoimage');
        $setting->set_updatedcallback('theme_reset_all_caches');
        $settings->add($setting);

        // Video banner header setting.
        $name = 'theme_altitude/videoheader';
        $title = get_string('videoheader', 'theme_altitude');
        $description = get_string('videoheader_desc', 'theme_altitude');
        $default = '';
        $setting = new admin_setting_configtext($name, $title, $description, $default);
        $setting->set_updatedcallback('theme_reset_all_caches');
        $settings->add($setting);

        // Video banner text setting.
        $name = 'theme_altitude/videotext';
        $title = get_string('videotext', 'theme_altitude');
        $description = get_string('videotext_desc', 'theme_altitude');
        $default = '';
        $setting = new admin_setting_configtext($name, $title, $description, $default);
        $setting->set_updatedcallback('theme_reset_all_caches');
        $settings->add($setting);

        // Subsection settings section heading.
        $name = $themename .'/subsectionsheading';
        $title = get_string('tab-frontpage-subsections', $themename);
        $description = html_writer::tag('p', get_string('tab-frontpage-subsections-description', $themename));
        $setting = new admin_setting_heading($name, $title, $description);
        $settings->add($setting);

        // Loop over 3 banner image settings.
        for ($i = 1; $i <= 3; $i++) {

            // Subsection settings section heading.
            $name = $themename .'/subsectionheading'.$i;
            $title = get_string('subsectionheading'.$i, $themename);
            $description = html_writer::tag('div', get_string('subsectionheading'.$i.'desc', $themename));
            $setting = new admin_setting_heading($name, $title, $description);
            $settings->add($setting);

            // Subsection header setting.
            $name = 'theme_altitude/subsectiontitle'.$i;
            $title = get_string('subsectiontitle'.$i, 'theme_altitude');
            $description = get_string('subsectiontitle'.$i.'desc', 'theme_altitude');
            $default = '';
            $setting = new admin_setting_configtext($name, $title, $description, $default);
            $setting->set_updatedcallback('theme_reset_all_caches');
            $settings->add($setting);

            // Subsection icon setting.
            $name = 'theme_altitude/subsectionicon'.$i;
            $title = get_string('subsectionicon'.$i, 'theme_altitude');
            $description = get_string('subsectionicon'.$i.'desc', 'theme_altitude');
            $default = '';
            $setting = new admin_setting_configtext($name, $title, $description, $default);
            $setting->set_updatedcallback('theme_reset_all_caches');
            $settings->add($setting);

            // Subsection text setting.
            $name = 'theme_altitude/subsectiondescription'.$i;
            $title = get_string('subsectiondescription'.$i, 'theme_altitude');
            $description = get_string('subsectiondescription'.$i.'desc', 'theme_altitude');
            $default = '';
            $setting = new admin_setting_configtext($name, $title, $description, $default);
            $setting->set_updatedcallback('theme_reset_all_caches');
            $settings->add($setting);

            // Subsection link setting.
            $name = 'theme_altitude/subsectionlink'.$i;
            $title = get_string('subsectionlink'.$i, 'theme_altitude');
            $description = get_string('subsectionlink'.$i.'desc', 'theme_altitude');
            $default = '';
            $setting = new admin_setting_configtext($name, $title, $description, $default);
            $setting->set_updatedcallback('theme_reset_all_caches');
            $settings->add($setting);

            // Slider header setting.
            $name = 'theme_altitude/subsectionlabel'.$i;
            $title = get_string('subsectionlabel'.$i, 'theme_altitude');
            $description = get_string('subsectionlabel'.$i.'desc', 'theme_altitude');
            $default = '';
            $setting = new admin_setting_configtext($name, $title, $description, $default);
            $setting->set_updatedcallback('theme_reset_all_caches');
            $settings->add($setting);

        }

    } else if ($tab == THEME_ALTITUDE_TAB_UI) {

        // UI section heading.
        $name = $themename .'/uitabheading';
        $title = get_string('tab-ui-title', $themename);
        $description = html_writer::tag('p', get_string('tab-ui-description', $themename));
        $setting = new admin_setting_heading($name, $title, $description);
        $settings->add($setting);

        // Custom Course Category AJAX.
        $name = 'theme_altitude/coursecatajax';
        $title = get_string('coursecatajax', 'theme_altitude');
        $description = get_string('coursecatajax_desc', 'theme_altitude');
        $setting = new admin_setting_configcheckbox($name, $title, $description, 1);
        $setting->set_updatedcallback('theme_reset_all_caches');
        $settings->add($setting);

        // Custom quiz UI adjustments.
        $name = 'theme_altitude/fixedquizui';
        $title = get_string('fixedquizui', 'theme_altitude');
        $description = get_string('fixedquizui_desc', 'theme_altitude');
        $setting = new admin_setting_configcheckbox($name, $title, $description, 1);
        $setting->set_updatedcallback('theme_reset_all_caches');
        $settings->add($setting);

        // Sidebar block region setting.
        $name = 'theme_altitude/sidebarblockregion';
        $title = get_string('sidebarblockregion', 'theme_altitude');
        $description = get_string('sidebarblockregiondesc', 'theme_altitude');
        $setting = new admin_setting_configcheckbox($name, $title, $description, 0);
        $setting->set_updatedcallback('theme_reset_all_caches');
        $settings->add($setting);

        // Sidebar block region alignment setting.
        $name = 'theme_altitude/sidebarblockregionalignment';
        $title = get_string('sidebarblockregionalignment', 'theme_altitude');
        $description = get_string('sidebarblockregionalignmentdesc', 'theme_altitude');
        $setting = new admin_setting_configselect($name, $title, $description, 'right', array(
            'right' => get_string('sidebarblockregionalignmentright', 'theme_altitude'),
            'left' => get_string('sidebarblockregionalignmentleft', 'theme_altitude')
        ));
        $setting->set_updatedcallback('theme_reset_all_caches');
        $settings->add($setting);

        // Sidebar block region button display setting.
        $name = 'theme_altitude/sidebarblockregionbuttontype';
        $title = get_string('sidebarblockregionbuttontype', 'theme_altitude');
        $description = get_string('sidebarblockregionbuttontypedesc', 'theme_altitude');
        $setting = new admin_setting_configselect($name, $title, $description, 'icontext', array(
            'icontext' => get_string('sidebarblockregionbuttontypeicontext', 'theme_altitude'),
            'icon' => get_string('sidebarblockregionbuttontypeicon', 'theme_altitude'),
            'text' => get_string('sidebarblockregionbuttontypetext', 'theme_altitude')
        ));
        $setting->set_updatedcallback('theme_reset_all_caches');
        $settings->add($setting);

        // Onetopic course format enhaned style setting.
        $name = 'theme_altitude/onetopicstyle';
        $title = get_string('onetopicstyle', 'theme_altitude');
        $description = get_string('onetopicstyledesc', 'theme_altitude');
        $setting = new admin_setting_configselect($name, $title, $description, '', array(
            '' => get_string('onetopicstylenone', 'theme_altitude'),
            'onetopictabs' => get_string('onetopicstyleenhanced', 'theme_altitude'),
            'onetopicvertical' => get_string('onetopicstylevertical', 'theme_altitude')
        ));
        $setting->set_updatedcallback('theme_reset_all_caches');
        $settings->add($setting);

        // Grid course format enhanced style setting.
        $name = 'theme_altitude/gridstyle';
        $title = get_string('gridstyle', 'theme_altitude');
        $description = get_string('gridstyledesc', 'theme_altitude');
        $setting = new admin_setting_configcheckbox($name, $title, $description, 0);
        $setting->set_updatedcallback('theme_reset_all_caches');
        $settings->add($setting);

    } else if ($tab == THEME_ALTITUDE_TAB_ADVANCED) {

        // Advanced section heading.
        $name = $themename .'/advancedtabheading';
        $title = get_string('tab-advanced-title', $themename);
        $description = html_writer::tag('p', get_string('tab-advanced-description', $themename));
        $setting = new admin_setting_heading($name, $title, $description);
        $settings->add($setting);

        // Custom CSS overrides.
        $name = 'theme_altitude/overridecss';
        $title = get_string('overridecss', 'theme_altitude');
        $description = get_string('overridecssdesc', 'theme_altitude');
        $default = '';
        $setting = new admin_setting_configtextarea($name, $title, $description, $default);
        $setting->set_updatedcallback('theme_reset_all_caches');
        $settings->add($setting);

    }

}
