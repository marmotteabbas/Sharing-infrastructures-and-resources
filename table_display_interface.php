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

echo "<link href='style/style.css' rel='stylesheet' type='text/css' />";

$title = "Sharing infrastructures and resources";

$PAGE->set_pagelayout('report');
$PAGE->set_url('/blocks/h_infra_rsc/table_display_interface.php', array());

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
                    echo get_file_infra_url(); //  echo "data 1";
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


// Here because I can't requiere_once, I don't know why yet ...
function get_file_infra_url() {

    $fs = get_file_storage();
    $files = $fs->get_area_files($_GET['id_context'], 'block_h_infra_rsc', 'content', 0, 'sortorder', false);

    $file = reset($files);

    $path = '/'.$_GET['id_context'].'/block_h_infra_rsc/content/'.'0'./*$resource->revision.*/$file->get_filepath().$file->get_filename();
    $fullurl = moodle_url::make_file_url('/pluginfile.php', $path, $displaytype == RESOURCELIB_DISPLAY_DOWNLOAD);

    return $fullurl;
}