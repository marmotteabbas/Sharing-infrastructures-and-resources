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

defined('MOODLE_INTERNAL') || die();
require_once($CFG->libdir . '/filelib.php');

class block_h_infra_rsc extends block_base {
    function init() {
        $this->title = "H2020";//get_string('pluginname', 'block_h_infra_rsc');
    }

    function get_content() {
        global $USER, $CFG;

        $rows = array();
        $srows = array();
        $prows = array();

        $course = $this->page->course;

        // Create empty content.
        $this->content = new stdClass();
        $this->content->text = '';
        $this->content->footer = '';

        $this->content->text .= "<a href='".$CFG->wwwroot.'/blocks/h_infra_rsc/table_display_interface.php'."'>Access the Sharing infrastructures and resources</a>";
 
        return $this->content;
    }

}


