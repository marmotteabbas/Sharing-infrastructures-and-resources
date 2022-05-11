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
global $DB;
echo "<link href='style/style.css' rel='stylesheet' type='text/css' />";

$title = "Sharing infrastructures and resources";

$PAGE->set_pagelayout('report');
$PAGE->set_url('/blocks/h_infra_rsc/table_display_interface.php', array());

$PAGE->set_heading($title);

echo "
<style>
.cellule_research {
    background-color:#4472c4;
    color: white;
    border-radius: 3px;
    text-align: center;
}

#table_filter_research_app_theme_filter {
    border-spacing: 2px 1px;
    border-collapse: unset;
}

.thead_filter_research_app_theme_filter {
    text-align: center;
    margin-left: 45px;
    font-weight: bold;
    color:#4472c4;
}

#research_app_theme_filter {
    border: solid 1px #4472c4;
    width: 337px;
    border-radius: 4px;
    padding: 2px;
    display: inline-block;
}

#research_keyword {
    display: inline-block;
    border: solid 1px #4472c4;
    border-radius: 4px;
}

#table_keyword {
    border-spacing: 2px 1px;
    border-collapse: unset;
}

.thead_keyword_filter {
    font-weight: bold;
    color:#4472c4;
    position: relative;
    text-align: center;
}

.cellule_keyword {
    font-size: 0.8em;
}
</style>
";
echo $OUTPUT->header();

    echo html_writer::start_span('zombie') . '<h1>H2020</h1>' . html_writer::end_span();
    
    //Research filter 1
    echo html_writer::start_tag('div', array('id' => 'research_app_theme_filter'));
    echo html_writer::start_span('thead_filter_research_app_theme_filter')."Research application themes filters". html_writer::end_span();
        echo html_writer::start_tag('table', array("id" => "table_filter_research_app_theme_filter"));
            echo html_writer::start_tag('tbody');
                echo html_writer::start_tag('tr');
                        echo html_writer::start_tag('td', array("class" => "cellule_research"));
                            echo "Energy";
                        echo html_writer::end_tag('td');
                        echo html_writer::start_tag('td', array("class" => "cellule_research"));
                        echo "Environment";
                        echo html_writer::end_tag('td');
                echo html_writer::end_tag('tr');
                echo html_writer::start_tag('tr');
                        echo html_writer::start_tag('td', array("class" => "cellule_research"));
                            echo "Health Engineering";
                        echo html_writer::end_tag('td');
                        echo html_writer::start_tag('td', array("class" => "cellule_research"));
                        echo "Industry 4.0";
                        echo html_writer::end_tag('td');
                echo html_writer::end_tag('tr');
                echo html_writer::start_tag('tr');
                        echo html_writer::start_tag('td', array("class" => "cellule_research"));
                            echo "IT, Electronics & Telecom";
                        echo html_writer::end_tag('td');
                        echo html_writer::start_tag('td');
                        //nada
                        echo html_writer::end_tag('td');
                echo html_writer::end_tag('tr');
            echo html_writer::end_tag('tbody');
        echo html_writer::end_tag('table');
    echo html_writer::end_tag('div');

    //Keywords filter
    echo html_writer::start_tag('div', array('id' => 'research_keyword'));
    echo html_writer::start_div('thead_keyword_filter')."Keywords Filter". html_writer::end_div();
        echo html_writer::start_tag('table', array("id" => "table_keyword"));
            echo html_writer::start_tag('tr');
                echo html_writer::start_tag('td', array("class" => "cellule_keyword cellule_research"));
                    echo "Characterisation";
                echo html_writer::end_tag('td');
                echo html_writer::start_tag('td', array("class" => "cellule_keyword cellule_research"));
                    echo "Sustainable Technologies";
                echo html_writer::end_tag('td');
                echo html_writer::start_tag('td', array("class" => "cellule_keyword cellule_research"));
                    echo "Multimedia";
                echo html_writer::end_tag('td');
            echo html_writer::end_tag('tr');

            echo html_writer::start_tag('tr');
                echo html_writer::start_tag('td', array("class" => "cellule_keyword cellule_research"));
                    echo "Materials";
                echo html_writer::end_tag('td');
                echo html_writer::start_tag('td', array("class" => "cellule_keyword cellule_research"));
                    echo "Animal Experimentation";
                echo html_writer::end_tag('td');
                echo html_writer::start_tag('td', array("class" => "cellule_keyword cellule_research"));
                    echo "Optical";
                echo html_writer::end_tag('td');
            echo html_writer::end_tag('tr');

            echo html_writer::start_tag('tr');
                echo html_writer::start_tag('td', array("class" => "cellule_keyword cellule_research"));
                    echo "Biological";
                echo html_writer::end_tag('td');
                echo html_writer::start_tag('td', array("class" => "cellule_keyword cellule_research"));
                    echo "Helth, miscellaneous";
                echo html_writer::end_tag('td');
                echo html_writer::start_tag('td', array("class" => "cellule_keyword cellule_research"));
                    echo "Production 4.0";
                echo html_writer::end_tag('td');
            echo html_writer::end_tag('tr');

            echo html_writer::start_tag('tr');
                echo html_writer::start_tag('td', array("class" => "cellule_keyword cellule_research"));
                    echo "Energy Efficiency";
                echo html_writer::end_tag('td');
                echo html_writer::start_tag('td', array("class" => "cellule_keyword cellule_research"));
                    echo "Technological applications for Health";
                echo html_writer::end_tag('td');
                echo html_writer::start_tag('td', array("class" => "cellule_keyword cellule_research"));
                    echo "Robotics";
                echo html_writer::end_tag('td');
            echo html_writer::end_tag('tr');

            echo html_writer::start_tag('tr');
                echo html_writer::start_tag('td', array("class" => "cellule_keyword cellule_research"));
                    echo "Living Lab";
                echo html_writer::end_tag('td');
                echo html_writer::start_tag('td', array("class" => "cellule_keyword cellule_research"));
                    echo "Design";
                echo html_writer::end_tag('td');
                echo html_writer::start_tag('td', array("class" => "cellule_keyword cellule_research"));
                    echo "Space";
                echo html_writer::end_tag('td');
            echo html_writer::end_tag('tr');

            echo html_writer::start_tag('tr');
                echo html_writer::start_tag('td', array("class" => "cellule_keyword cellule_research"));
                    echo "Renewable Energy";
                echo html_writer::end_tag('td');
                echo html_writer::start_tag('td', array("class" => "cellule_keyword cellule_research"));
                    echo "Electromagnetic/Magnetic";
                echo html_writer::end_tag('td');
                echo html_writer::start_tag('td', array("class" => "cellule_keyword cellule_research"));
                    echo "Artifical Intelligence";
                echo html_writer::end_tag('td');
            echo html_writer::end_tag('tr');

            echo html_writer::start_tag('tr');
                echo html_writer::start_tag('td', array("class" => "cellule_keyword cellule_research"));
                    echo "Smart Grids";
                echo html_writer::end_tag('td');
                echo html_writer::start_tag('td', array("class" => "cellule_keyword cellule_research"));
                    echo "Electronics";
                echo html_writer::end_tag('td');
                echo html_writer::start_tag('td', array("class" => "cellule_keyword cellule_research"));
                    echo "Data processing";
                echo html_writer::end_tag('td');
            echo html_writer::end_tag('tr');

            echo html_writer::start_tag('tr');
                echo html_writer::start_tag('td', array("class" => "cellule_keyword cellule_research"));
                    echo "Electrical";
                echo html_writer::end_tag('td');
                echo html_writer::start_tag('td', array("class" => "cellule_keyword cellule_research"));
                    echo "Mechanical Engineering";
                echo html_writer::end_tag('td');
                echo html_writer::start_tag('td', array("class" => "cellule_keyword cellule_research"));
                    echo "High Performance Computing";
                echo html_writer::end_tag('td');
            echo html_writer::end_tag('tr');

            echo html_writer::start_tag('tr');
                echo html_writer::start_tag('td', array("class" => "cellule_keyword cellule_research"));
                    echo "Observation and/or Modelling of Nature";
                echo html_writer::end_tag('td');
                echo html_writer::start_tag('td', array("class" => "cellule_keyword cellule_research"));
                    echo "Micro-/-nano-";
                echo html_writer::end_tag('td');
                echo html_writer::start_tag('td', array("class" => "cellule_keyword cellule_research"));
                    echo "Telecommunications";
                echo html_writer::end_tag('td');
            echo html_writer::end_tag('tr');


        echo html_writer::end_tag('table');
    echo html_writer::end_tag('div');

    // Big Table
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

        $rec_infra = $DB->get_records("h_infra_src");

        foreach ($rec_infra as $rec) {
            $url = $rec->researchinfrastructure;

            $i_slash=strrpos($url, '/')+1;
            $i_ext= strrpos($url, '.jpg')-$i_slash;
   
            echo html_writer::start_tag('tr');
                echo html_writer::start_tag('td'/*, array('colspan' => '2')*/);
                    echo "<a href='".$url."'>".substr($url, $i_slash, $i_ext)."</a>"; //  echo "data 1";
                echo html_writer::end_tag('td');
                echo html_writer::start_tag('td');
                    echo  $rec->applicationthemes;
                echo html_writer::end_tag('td');
                echo html_writer::start_tag('td');
                    echo  str_replace("<>", " - ", $rec->keywords);
                echo html_writer::end_tag('td');
                echo html_writer::start_tag('td');
                    echo  $rec->homepartnerinstitution;
                echo html_writer::end_tag('td');
            echo html_writer::end_tag('tr');
        }

        echo html_writer::end_tag('tbody');

    echo html_writer::end_tag('table');

echo $OUTPUT->footer();