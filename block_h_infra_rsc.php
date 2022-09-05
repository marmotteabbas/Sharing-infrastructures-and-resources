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
        $this->title = get_string('pluginname','block_h_infra_rsc');
    }

    function get_content() {
        global $USER, $CFG, $COURSE, $DB;


        //TODO : Erase duplication and put it an object 
        $addpermission = false;

        $sql = "SELECT * FROM {role_assignments} ra inner join {role} r ON ra.roleid = r.id WHERE ra.userid = ? AND ra.contextid = 1";
        $role_for_user = $DB->get_records_sql($sql ,[$USER->id]);

        foreach ($role_for_user as $rfu) {
            if ($rfu->shortname == "h2020" || $rfu->shortname == "H2020") {
                $addpermission = true;
            }
        }
        /*------------------------------------------*/
        $this->title = "H2020";       

        $rows = array();
        $srows = array();
        $prows = array();

        $course = $this->page->course;

        // Create empty content.
        $this->content = new stdClass();
        $this->content->text = '';
        $this->content->footer = '';

        if ($addpermission == true) {
            $this->content->text .= '<a href="'.$CFG->wwwroot.'/blocks/h_infra_rsc/admin_interface.php?instance_id='.$this->instance->id.'&id_context='.$this->context->id.'"><i class="h_infra_rsc_tool_icon icon fa fa-wrench"></i></a>';
        }

        $this->content->text .= "<a href='".$CFG->wwwroot.'/blocks/h_infra_rsc/table_display_interface.php?id_context='.$this->context->id.'&instance_id='.$this->instance->id."'>Access the Sharing infrastructures and resources</a>";
 
        return $this->content;
    }

    function _self_test() {
        return true;
    }

}


