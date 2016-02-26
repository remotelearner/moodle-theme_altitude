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
 * @package   theme_altitude
 * @copyright 2016 Moodle, moodle.org
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

$THEME->name = 'altitude';
$THEME->doctype = 'html5';
$THEME->parents = array('clean', 'bootstrapbase');
$THEME->sheets = array('jquery-background-video', 'lean-slider', 'slidebars', 'animate', 'custom-rein', 'colors', 'custom');
$THEME->supportscssoptimisation = false;
$THEME->yuicssmodules = array();
$THEME->enable_dock = false;
$THEME->editor_sheets = array();
$THEME->rendererfactory = 'theme_overridden_renderer_factory';
$THEME->csspostprocess = 'theme_altitude_process_css';

$THEME->layouts = array(
    // Standard layout with blocks, this is recommended for most pages with general information.
    'standard' => array(
        'file' => 'columns2.php',
        'regions' => array('side-pre', 'sidebar-block', 'social-block', 'footer-one', 'footer-two', 'footer-three', 'footer-four'),
        'defaultregion' => 'side-pre',
    ),
    // Main course page.
    'course' => array(
        'file' => 'columns2.php',
        'regions' => array('side-pre', 'sidebar-block', 'social-block', 'footer-one', 'footer-two', 'footer-three', 'footer-four'),
        'defaultregion' => 'side-pre',
        'options' => array('langmenu' => true),
    ),
    'coursecategory' => array(
        'file' => 'columns2.php',
        'regions' => array('side-pre', 'sidebar-block', 'social-block', 'footer-one', 'footer-two', 'footer-three', 'footer-four'),
        'defaultregion' => 'side-pre',
    ),
    // Part of course, typical for modules - default page layout if $cm specified in require_login().
    'incourse' => array(
        'file' => 'columns2.php',
        'regions' => array('side-pre', 'sidebar-block', 'social-block', 'footer-one', 'footer-two', 'footer-three', 'footer-four'),
        'defaultregion' => 'side-pre',
    ),
    // The site home page.
    'frontpage' => array(
        'file' => 'frontpage.php',
        'regions' => array('side-pre', 'sidebar-block', 'social-block',  'action-one', 'action-two', 'action-three', 'footer-one', 'footer-two', 'footer-three', 'footer-four'),
        'defaultregion' => 'side-pre',
    ),
    // Server administration scripts.
    'admin' => array(
        'file' => 'columns2.php',
        'regions' => array('side-pre', 'sidebar-block', 'social-block', 'footer-one', 'footer-two', 'footer-three', 'footer-four'),
        'defaultregion' => 'side-pre',
    ),
    // My dashboard page.
    'mydashboard' => array(
        'file' => 'columns2.php',
        'regions' => array('side-pre', 'sidebar-block', 'social-block', 'footer-one', 'footer-two', 'footer-three', 'footer-four'),
        'defaultregion' => 'side-pre',
        'options' => array('langmenu' => true),
    ),
    // My public page.
    'mypublic' => array(
        'file' => 'columns2.php',
        'regions' => array('side-pre', 'sidebar-block', 'social-block', 'footer-one', 'footer-two', 'footer-three', 'footer-four'),
        'defaultregion' => 'side-pre',
    ),
    // The pagelayout used for reports.
    'report' => array(
        'file' => 'columns2.php',
        'regions' => array('side-pre', 'sidebar-block', 'social-block', 'footer-one', 'footer-two', 'footer-three', 'footer-four'),
        'defaultregion' => 'side-pre',
    ),
    // Custom login page layout.
    'login' => array(
        'file' => 'login.php',
        'regions' => array('side-pre', 'social-block', 'login-block', 'footer-one', 'footer-two', 'footer-three', 'footer-four'),
        'defaultregion' => 'side-pre',
    ),
);

$THEME->javascripts_footer = array(
    'jquery-background-video',
    'lean-slider',
    'slidebars',
    'activate'
);