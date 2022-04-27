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


require_once(__DIR__.'/../../config.php');
//require_once("{$CFG->libdir}/completionlib.php");
// Load data.
/* $id = required_param('course', PARAM_INT);
$userid = optional_param('user', 0, PARAM_INT);
*/

echo "<link href='style/style.css' rel='stylesheet' type='text/css' />";

//$PAGE->set_context(context_course::instance($course->id));

// Print header.
//$page = get_string('completionprogressdetails', 'block_completionstatus');
$title = "Sharing infrastructures and resources";

//$cfg->wwwroot;
//$PAGE->navbar->add($page);
$PAGE->set_pagelayout('report');
$PAGE->set_url('/blocks/h_infra_rsc/table_display_interface.php', array());
//$PAGE->set_title("Sharing infrastructures and resources");
$PAGE->set_heading($title);

echo $OUTPUT->header();

    echo html_writer::start_span('zombie') . '<h1>H2020</h1>' . html_writer::end_span();

    echo html_writer::start_tag('table', array('class' => 'all_datas_infra_rsc', "style" => "margin-right:10px;width:100%;"));

        echo html_writer::start_tag('thead');
            echo html_writer::start_tag('tr');
                echo html_writer::start_tag('th');
                    echo "Research infrastructure (links to details)";
                echo html_writer::end_tag('th');
                echo html_writer::start_tag('th');
                    echo "Application theme(s)";
                echo html_writer::end_tag('th');
                echo html_writer::start_tag('th');
                    echo "Keywords";
                echo html_writer::end_tag('th');
                echo html_writer::start_tag('th');
                    echo "Home partner institution";
                echo html_writer::end_tag('th');
            echo html_writer::end_tag('tr');
        echo html_writer::end_tag('thead');

        echo html_writer::start_tag('tbody');
            echo html_writer::start_tag('tr');
                echo html_writer::start_tag('td'/*, array('colspan' => '2')*/);
                    echo "data 1";
                echo html_writer::end_tag('td');
                echo html_writer::start_tag('td');
                    echo "data 2";
                echo html_writer::end_tag('td');
                echo html_writer::start_tag('td');
                    echo "data 3";
                echo html_writer::end_tag('td');
                echo html_writer::start_tag('td');
                    echo "data 4";
                echo html_writer::end_tag('td');
            echo html_writer::end_tag('tr');
        echo html_writer::end_tag('tbody');

    echo html_writer::end_tag('table');

echo $OUTPUT->footer();