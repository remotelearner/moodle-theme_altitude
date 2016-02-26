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
 * @author    Eric Bjella <eric.bjella@remote-learne.net>
 * @copyright 2016 Remote Learner  http://www.remote-learner.net/
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

class theme_altitude_core_renderer extends theme_bootstrapbase_core_renderer {

    protected function render_custom_menu(custom_menu $menu) {
        global $PAGE;
        if (!empty($PAGE->theme->settings->sidebarblockregion)
                && $PAGE->theme->settings->sidebarblockregion == true
                && $PAGE->theme->settings->sidebarblockregionalignment == 'right') {
            $branchlabel = theme_altitude_fetch_sidebar_toggle_button('right');
            $branchurl   = new moodle_url('#sidebar');
            $branchtitle = get_string('sidebarblockregiontogglelabel', 'theme_altitude');
            $branchsort  = 10000;
            $menu->add($branchlabel, $branchurl, $branchtitle, $branchsort);
        }
        return parent::render_custom_menu($menu);
    }

}