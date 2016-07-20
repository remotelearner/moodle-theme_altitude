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
 * The two column layout.
 *
 * @package   theme_altitude
 * @copyright 2016 Moodle, moodle.org
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

// Get the HTML for the settings bits.
$html = theme_clean_get_html_for_settings($OUTPUT, $PAGE);

// Set default (LTR) layout mark-up for a two column page (side-pre-only).
$regionmain = 'span9 pull-right';
$sidepre = 'span3 desktop-first-column';

// Reset layout mark-up for RTL languages.
if (right_to_left()) {
    $regionmain = 'span9';
    $sidepre = 'span3 pull-right';
}

$themefiles = theme_altitude_setting_files($PAGE->theme->settings);
if (!isset($PAGE->theme->settings->sidebarblockregionalignment)) {
    $PAGE->theme->settings->sidebarblockregionalignment = "left";
}

// Fetch additional body classes from settings.
$settingsbodyclasses = theme_altitude_fetch_bodyclass_settings($PAGE->theme->settings);

// Fetch HTML for social media icons.
$socialicons = theme_altitude_fetch_socialicons($PAGE->theme->settings);

// Fetch HTML for banner background, either slider or video.
$banner = theme_altitude_fetch_banner($PAGE->theme->settings);

// Fetch HTML for sub-banner.
$subbanner = theme_altitude_fetch_subbanner($PAGE->theme->settings);
$enable1alert = 0;
$enable2alert = 0;
$enable3alert = 0;

if (isset($PAGE->theme->settings->enablealert)  && $PAGE->theme->settings->enablealert == 1) {
    $enable1alert =1;
}
if (isset($PAGE->theme->settings->enable2alert)  && $PAGE->theme->settings->enable2alert == 1) {
    $enable2alert =1;
}
if (isset($PAGE->theme->settings->enable3alert)  && $PAGE->theme->settings->enable3alert == 1) {
    $enable3alert =1;
}
if ($enable1alert || $enable2alert || $enable3alert) {
    $alertinfo = '<span class="fa-stack"><span aria-hidden="true" class="fa fa-info fa-stack-1x "></span></span>';
    $alerterror = '<span class="fa-stack"><span aria-hidden="true" class="fa fa-warning fa-stack-1x "></span></span>';
    $alertsuccess = '<span class="fa-stack"><span aria-hidden="true" class="fa fa-bullhorn fa-stack-1x "></span></span>';
}

echo $OUTPUT->doctype() ?>
<html <?php echo $OUTPUT->htmlattributes(); ?>>
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $OUTPUT->page_title(); ?></title>
    <?php echo theme_altitude_fetch_favicon($PAGE->theme->settings); ?>
    <?php echo $OUTPUT->standard_head_html() ?>
    <link href='//fonts.googleapis.com/css?family=Open+Sans:300,400,700,800' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Oswald:400,700' rel='stylesheet' type='text/css'>
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body <?php echo $OUTPUT->body_attributes('two-column custom-theme '.$PAGE->theme->settings->themecolor.$settingsbodyclasses); ?>>

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
            <?php echo $OUTPUT->user_menu(); ?>
        </div>
    </div>

</header>

<div class="sb-slide">

    <section id="banner-wrap">
        <?php echo $banner ?>
    </section>

    <section id="action-blocks">
        <div class="container">
            <div class="row-fluid">
            <?php
            //Start Alerts
            //Alert #1
            if ($enable1alert) { ?>
                <div class="useralerts alert alert-<?php echo $PAGE->theme->settings->alert1type; ?>">
                <a class="close" data-dismiss="alert" href="#"><span aria-hidden="true" class="fa fa-times-circle"></a>
                <?php
                $alert1icon = 'alert' . $PAGE->theme->settings->alert1type;
                echo $$alert1icon.'<span class="title"><b>'. $PAGE->theme->settings->alert1title;
                echo '</b> </span><p>'.$PAGE->theme->settings->alert1text. '</p>';?>
                </div>
                <?php
            }
            //Alert #2 -->
            if ($enable2alert) { ?>
                <div class="useralerts alert alert-<?php echo $PAGE->theme->settings->alert2type; ?>">
                <a class="close" data-dismiss="alert" href="#"><span aria-hidden="true" class="fa fa-times-circle"></span></a>
                <?php
                $alert2icon = 'alert' . $PAGE->theme->settings->alert2type;
                echo $$alert2icon.'<span class="title"><b>'. $PAGE->theme->settings->alert2title;
                echo '</b> </span><p>'.$PAGE->theme->settings->alert2text .'</p>';?>
                </div>
                <?php
            }
            //Alert #3
            if ($enable3alert) { ?>
                <div class="useralerts alert alert-<?php echo $PAGE->theme->settings->alert3type; ?>">
                <a class="close" data-dismiss="alert" href="#"><span aria-hidden="true" class="fa fa-times-circle"></span></a>
                <?php
                $alert3icon = 'alert' . $PAGE->theme->settings->alert3type;
                echo $$alert3icon.'<span class="title"><b>'. $PAGE->theme->settings->alert3title;
                echo '</b> </span><p>' . $PAGE->theme->settings->alert3text.'</p>'; ?>
                </div>
                <?php
             }
            ?>
            </div>
            <div class="row-fluid">
                <?php echo $subbanner ?>
            </div>

            <div class="row-fluid">
                <?php echo $OUTPUT->blocks('action-one', 'span4'); ?>
                <?php echo $OUTPUT->blocks('action-two', 'span4'); ?>
                <?php echo $OUTPUT->blocks('action-three', 'span4'); ?>
            </div>
        </div>
    </section>

    <div id="page" class="container">
        <div id="page-content" class="row-fluid">
            <section id="region-main" class="<?php echo $regionmain; ?>">
                <?php
                echo $OUTPUT->course_content_header();
                
                echo $OUTPUT->main_content();
                echo $OUTPUT->course_content_footer();
                ?>
            </section>
            <?php echo $OUTPUT->blocks('side-pre', $sidepre);
            ?>
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
