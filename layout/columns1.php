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
 * The one column layout.
 *
 * @package   theme_altitude
 * @copyright 2016 Moodle, moodle.org
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

// Get the HTML for the settings bits.
$html = theme_clean_get_html_for_settings($OUTPUT, $PAGE);

$themefiles = theme_altitude_setting_files($PAGE->theme->settings);

// Fetch additional body classes from settings.
$settingsbodyclasses = theme_altitude_fetch_bodyclass_settings($PAGE->theme->settings);
if (!isset($PAGE->theme->settings->sidebarblockregionalignment)) {
    $PAGE->theme->settings->sidebarblockregionalignment = "left";
}

// Fetch HTML for social media icons.
$socialicons = theme_altitude_fetch_socialicons($PAGE->theme->settings);

echo $OUTPUT->doctype() ?>
<html <?php echo $OUTPUT->htmlattributes(); ?>>
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $OUTPUT->page_title(); ?></title>
    <?php echo theme_altitude_fetch_favicon($PAGE->theme->settings); ?>
    <?php echo $OUTPUT->standard_head_html() ?>
    <link href='//fonts.googleapis.com/css?family=Open+Sans:300,400,700,800' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Oswald:400,700' rel='stylesheet' type='text/css'>
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body <?php echo $OUTPUT->body_attributes('custom-theme '.$PAGE->theme->settings->themecolor.$settingsbodyclasses); ?>>

<?php echo $OUTPUT->standard_top_of_body_html() ?>

<header role="banner" class="navbar navbar-fixed-top moodle-has-zindex sb-slide">

    <nav role="navigation" class="navbar-inner">
        <div class="container-fluid">
            <div id="logo">
                <a href="<?php echo $CFG->wwwroot;?>">
                    <?php if (isset($themefiles['logo'])) {
                        echo html_writer::empty_tag('img', array('alt' => get_string('logoalt', 'theme_altitude'), 'src' => $themefiles['logo']));
                    } else { ?>
                        <img src="<?php echo $OUTPUT->pix_url('logo', 'theme'); ?>" alt="<?php echo get_string('logoalt', 'theme_altitude')?>" />
                    <?php } ?>
                </a>
            </div>
            <div>
                <?php echo $OUTPUT->custom_menu(); ?>
                <ul class="nav pull-right">
                    <li><?php echo $OUTPUT->page_heading_menu(); ?></li>
                </ul>
            </div>
        </div>
    </nav>

    <div id="top-header-wrap">
        <div id="top-header" class="container-fluid">
            <?php echo theme_altitude_fetch_sidebar_toggle_button('left'); ?>
            <div id="top-header-info">
                <div class="social-links">
                    <?php echo $socialicons ?>
                </div>
            </div>
            <div class="usermenu">
                <?php echo $OUTPUT->login_info() ?>
            </div>
        </div>
    </div>

</header>

<div class="sb-slide">

    <section id="page-header-wrap">
        <div class="container-fluid">
            <header id="page-header" class="clearfix">
                <?php echo $OUTPUT->page_heading(); ?>
                <div id="page-navbar" class="clearfix">
                    <nav class="breadcrumb-nav"><?php echo $OUTPUT->navbar(); ?></nav>
                    <div class="breadcrumb-button"><?php echo $OUTPUT->page_heading_button(); ?></div>
                </div>
                <div id="course-header">
                    <?php echo $OUTPUT->course_header(); ?>
                </div>
            </header>
        </div>
    </section>

    <div id="page" class="container-fluid">

        <div id="page-content" class="row-fluid">
            <section id="region-main" class="span12">
                <?php
                echo $OUTPUT->course_content_header();
                echo $OUTPUT->main_content();
                echo $OUTPUT->course_content_footer();
                ?>
            </section>
        </div>

    </div>

    <footer id="page-footer">
        <div class="footer-content container-fluid">
            <div class="row-fluid">
                <?php echo $OUTPUT->blocks('footer-one', 'span4'); ?>
                <?php echo $OUTPUT->blocks('footer-two', 'span4'); ?>
                <?php echo $OUTPUT->blocks('footer-three', 'span4'); ?>
            </div>
        </div>
    </footer>

    <footer id="page-footer2">
        <div class="footer-content container-fluid">
            <div class="row-fluid">
                <?php echo $OUTPUT->blocks('footer-four', 'span12'); ?>
            </div>
        </div>
    </footer>

</div>

<div id="sidebar-block" class="sb-slidebar sb-<?php echo $PAGE->theme->settings->sidebarblockregionalignment; ?> sb-style-push">
    <?php echo $OUTPUT->blocks('sidebar-block', 'sidebar-block'); ?>
</div>

<?php echo $OUTPUT->standard_end_of_body_html() ?>

</body>
</html>