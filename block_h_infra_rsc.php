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

echo "
<style>
.h_infra_rsc_tool_icon:hover {
    opacity: 0.8;
    cursor: pointer;
}
</style>
";

class block_h_infra_rsc extends block_base {
    function init() {
        global $USER, $CFG;
    }

    function get_content() {
        global $USER, $CFG;
        $this->title = "H2020".'<a href="'.$CFG->wwwroot.'/blocks/h_infra_rsc/admin_interface.php?id_context='.$this->context->id.'"><i class="h_infra_rsc_tool_icon icon fa fa-wrench" style="left:5px;position:relative;"></i></a>';//get_string('pluginname', 'block_h_infra_rsc');
        
        $rows = array();
        $srows = array();
        $prows = array();

        $course = $this->page->course;

        // Create empty content.
        $this->content = new stdClass();
        $this->content->text = '';
        $this->content->footer = '';

        $this->content->text .= "<a href='".$CFG->wwwroot.'/blocks/h_infra_rsc/table_display_interface.php?id_context='.$this->context->id."'>Access the Sharing infrastructures and resources</a>";
 
        return $this->content;
    }

}


