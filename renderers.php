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
 * Renderer overrides for component 'theme_altitude'
 *
 * @package   theme-altitude
 * @author    Eric Bjella <eric.bjella@remote-learner.net>
 * @copyright 2016 Remote Learner  http://www.remote-learner.net/
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

class theme_altitude_core_renderer extends theme_bootstrapbase_core_renderer {
    protected function render_custom_menu(custom_menu $menu) {
        global $PAGE,$CFG;
        if (isloggedin()) {
            if (empty($PAGE->theme->settings->mycourses) || $PAGE->theme->settings->mycourses == true) {
                $branch = $menu->add(get_string('mycourses'), null, null, 9900);
                if ($courses = enrol_get_my_courses(NULL,'visible DESC,fullname ASC')) {
                    foreach ($courses as $course) {
                        if ($course->id == SITEID) {
                           continue;
                        }
                        $branch->add($course->fullname, new moodle_url('/course/view.php', array('id' => $course->id)), $course->shortname);
                    }
                }
            }
        }
        return parent::render_custom_menu($menu);
    }
}
